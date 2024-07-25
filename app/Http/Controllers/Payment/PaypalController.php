<?php

namespace App\Http\Controllers\Payment;

use App\Enums\NotificationType;
use App\Enums\PaymentMethod;
use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Http\Requests\GuestPaymentRequest;
use App\Mail\TicketMail;
use App\Models\Campaign;
use App\Models\User;
use App\Notifications\NewNotification;
use App\Services\PaymentService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session as LaravelSession;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PaypalController extends Controller
{
    public function checkout(Request $request)
    {
        $request->validate([
            'terms_and_condition' => 'required',
        ]);
        try {
            $campaign = Campaign::where('status', Status::PUBLISHED)->first();
            if (empty($campaign)) {
                flash()->addWarning('Campaign not found.');

                return redirect()->back();
            }
            $quantity = $request->quantity ?? 1;

            //check has ticket
            $soldTicket = $campaign->tickets()->count();
            $ticketRemain = $campaign->limit - $soldTicket;
            if ($ticketRemain < $quantity) {
                if ($ticketRemain <= 0) {
                    $ticketRemain = '0';
                }
                flash()->addWarning('Only '.$ticketRemain.' Tickets Are Available');

                return redirect()->back();
            }
            // Store data in session
            LaravelSession::put([
                'quantity' => $quantity,
                'campaign_id' => $campaign->id,
            ]);

            $provider = new PayPalClient;
            $provider->setApiCredentials(config('paypal'));
            $provider->getAccessToken();

            if (! empty($campaign->discount_percent) && Carbon::parse($campaign->discount_expire_date)->greaterThan(now())) {
                $campaign_price = calculateDiscount($campaign->price, $campaign->discount_percent);
            } else {
                $campaign_price = $campaign->price;
            }

            $response = $provider->createOrder([
                'intent' => 'CAPTURE',
                'application_context' => [
                    'return_url' => route('user.paypal.success', ['user_id' => Auth::id(), 'campaign_id' => $campaign->id, 'quantity' => $quantity, 'email' => Auth::user()->email]),
                    'cancel_url' => route('frontend.payment-cancel-message'),
                ],
                'purchase_units' => [
                    0 => [
                        'amount' => [
                            'currency_code' => 'EUR',
                            'value' => $campaign_price * $quantity,
                        ],
                    ],
                ],
            ]);
            if (isset($response['id']) && $response['id'] != null) {

                // redirect to approve href
                foreach ($response['links'] as $links) {
                    if ($links['rel'] == 'approve') {
                        //remove cart session item
                        if ($request->cart == 'true') {
                            session()->forget('cartData');
                        }

                        return redirect()->away($links['href']);
                    }
                }
                flash()->addError('Something went wrong.');

                return redirect()
                    ->route('user.buy-tickets');

            } else {
                flash()->addError('Something went wrong.');

                return redirect()
                    ->route('user.buy-tickets');
            }
        } catch (\Exception $e) {
            // Handle the exception
            Log::error($e->getMessage());
            flash()->addError($e->getMessage());

            return redirect()->back()->with($e->getMessage());
        }
    }

    public function success(Request $request, PaymentService $paymentService)
    {

        try {
            $provider = new PayPalClient;
            $provider->setApiCredentials(config('paypal'));
            $provider->getAccessToken();
            $response = $provider->capturePaymentOrder($request['token']);
            if (isset($response['status']) && $response['status'] == 'COMPLETED') {
                DB::beginTransaction(); // Start transaction to ensure data integrity
                // Retrieve session data
                $quantity = ! empty(LaravelSession::get('quantity')) ? LaravelSession::get('quantity') : $request->quantity;
                $campaign_id = ! empty(LaravelSession::get('campaign_id')) ? LaravelSession::get('campaign_id') : $request->campaign_id;
                $user_id = ! empty(LaravelSession::get('user_id')) ? LaravelSession::get('user_id') : $request->user_id;
                $user = Auth::check() ? Auth::user() : User::findOrFail($user_id);

                if (empty($user)) {
                    $user = User::where('email', $request->email)->first();
                }
                $campaign = Campaign::with(['ebooks'])->findOrFail($campaign_id);
                $discountQuantity = calculateFreeTicket($quantity, $campaign->how_many_buy, $campaign->how_many_free);
                // Store order in the database
                $order = $paymentService->orderCreate([
                    'user_id' => $user->id,
                    'transaction_id' => $response['purchase_units'][0]['payments']['captures'][0]['id'] ?? '',
                    'quantity' => $quantity,
                    'discount_quantity' => $discountQuantity,
                    'discount_percent' => $campaign->discount_percent,
                    'discount_expire_date' => $campaign->discount_expire_date,
                    'total_price' => $campaign->price * $quantity,
                    'payment_method' => PaymentMethod::PAYPAL,
                    'campaign_id' => $campaign->id,
                    'payment_status' => Status::COMPLETED,
                    'invoice_no' => $response['id'] ?? null,
                ]);
                // Generate the ticket numbers and create ticket entries
                $ticketNumbers = $paymentService->ticketCreate($order->id, $user->id, $quantity, $campaign->id, $discountQuantity, $campaign->unique_text);
                DB::commit(); // Commit transaction

                // Send the email with tickets and ebook
                Mail::to($user->email)->send(new TicketMail($order, $ticketNumbers, $campaign->ebooks->pluck('file')->toArray()));
                //send notification to the user
                $user->notify(new NewNotification(
                    subject: 'Payment Complete',
                    message: 'We received your payment, Thank you for purchasing!',
                    actionText: 'View Your Ticket',
                    actionUrl: route('user.tickets'),
                    channels: ['mail', 'database'],
                    type: NotificationType::PURCHASE
                ));
                //send notification to the admin
                $admin = User::where('role', 'admin')->first();
                $admin->notify(new NewNotification(
                    subject: 'New Payment',
                    message: $user->first_name.' '.$user->last_name.' purchasing '.$order->quantity.' tickets and total pay :  '.$order->total_price,
                    actionText: 'See Invoice',
                    actionUrl: route('admin.invoice.index'),
                    channels: ['mail', 'database'],
                    type: NotificationType::PURCHASE
                ));

                // Clear session
                LaravelSession::forget(['quantity', 'campaign_id', 'user_id']);

                flash()->addSuccess('Payment Success');

                if (Auth::user()) {
                    return redirect()->route('user.payment.success.message')->with('payment_success', 'true')
                        ->with('buy_ticket', $quantity)
                        ->with('free_ticket', $discountQuantity)
                        ->with('buy_time', $order->created_at);
                } else {
                    return redirect()->route('frontend.payment-success-message')
                        ->with('payment_success', 'true')
                        ->with('buy_ticket', $quantity)
                        ->with('free_ticket', $discountQuantity)
                        ->with('buy_time', $order->created_at);
                }
            } else {
                flash()->addError('Something went wrong');

                if (Auth::user()) {
                    return redirect()->route('user.buy-tickets');
                } else {
                    return redirect()->route('frontend.web-shop.buy-ebook');
                }
            }
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback transaction in case of error
            Log::error($e->getMessage());

            flash()->addError($e->getMessage());

            if (Auth::user()) {
                return redirect()->route('user.buy-tickets');
            } else {
                return redirect()->route('frontend.web-shop.buy-ebook');
            }
        }
    }

    public function web_shop_payment(GuestPaymentRequest $request)
    {
        try {
            $user = User::where('email', $request->email)->first();

            //check user and create user
            if (empty($user)) {
                $user = User::create([
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'birthday' => $request->birth_date,
                    'city' => $request->city,
                    'city_of_birthday' => $request->birth_state,
                    'phone' => $request->phone,
                    'email' => $request->email,
                    'address_1' => $request->address,
                    'zip_code' => $request->zip,
                    'country_id' => $request->country_id,
                    'state' => $request->state,
                    'country_of_birthday' => $request->country_of_birthday,
                    'gender' => $request->gender,
                    'password' => bcrypt($request->password),
                ]);
            }
            $campaign = Campaign::where('status', Status::PUBLISHED)->first();

            //check campaign is exist & ticket limit
            if (empty($campaign)) {
                flash()->addWarning('Campaign not found.');

                return redirect()->back();
            }

            $quantity = $request->quantity ?? 1;
            $soldTicket = $campaign->tickets()->count();
            $ticketRemain = $campaign->limit - $soldTicket;

            if ($ticketRemain < $quantity) {
                if ($ticketRemain <= 0) {
                    $ticketRemain = '0';
                }
                flash()->addWarning('Only '.$ticketRemain.' Tickets Are Available');

                return redirect()->route('frontend.web-shop.checkout');
            }

            if (empty($user)) {
                flash()->addError('Something was wrong.');

                return redirect()->back();
            }

            //Store data to session
            LaravelSession::put([
                'quantity' => $quantity,
                'user_id' => $user->id,
                'campaign_id' => $campaign->id,
            ]);

            $provider = new PayPalClient;
            $provider->setApiCredentials(config('paypal'));
            $provider->getAccessToken();

            if (! empty($campaign->discount_percent) && Carbon::parse($campaign->discount_expire_date)->greaterThan(now())) {
                $campaign_price = calculateDiscount($campaign->price, $campaign->discount_percent);
            } else {
                $campaign_price = $campaign->price;
            }

            $response = $provider->createOrder([
                'intent' => 'CAPTURE',
                'application_context' => [
                    'return_url' => route('frontend.web-shop.paypal.success', ['user_id' => $user->id, 'campaign_id' => $campaign->id, 'quantity' => $quantity, 'email' => $user->email]),
                    'cancel_url' => route('frontend.payment-cancel-message'),
                ],
                'purchase_units' => [
                    0 => [
                        'amount' => [
                            'currency_code' => 'EUR',
                            'value' => $campaign_price * $quantity,
                        ],
                    ],
                ],
            ]);
            if (isset($response['id']) && $response['id'] != null) {

                // redirect to approve href
                foreach ($response['links'] as $links) {
                    if ($links['rel'] == 'approve') {
                        //remove cart session item
                        if ($request->cart == 'true') {
                            session()->forget('cartData');
                        }

                        return redirect()->away($links['href']);
                    }
                }
                flash()->addError('Something went wrong.');

                return redirect()
                    ->route('frontend.web-shop.checkout');

            } else {
                flash()->addError('Something went wrong.');

                return redirect()
                    ->route('frontend.web-shop.checkout');
            }
        } catch (\Exception $e) {
            // Handle the exception
            Log::error($e->getMessage());
            flash()->addError($e->getMessage());

            return redirect()->route('frontend.web-shop.checkout')->with($e->getMessage());
        }
    }
}
