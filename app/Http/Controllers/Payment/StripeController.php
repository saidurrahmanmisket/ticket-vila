<?php

namespace App\Http\Controllers\Payment;

use App\Enums\NotificationType;
use App\Enums\PaymentMethod;
use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Http\Requests\GuestPaymentRequest;
use App\Mail\TicketMail;
use App\Models\Campaign;
use App\Models\Order;
use App\Models\User;
use App\Notifications\NewNotification;
use App\Services\PaymentService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session as LaravelSession;
use Stripe\Checkout\Session as StripeSession;
use Stripe\Stripe;

class StripeController extends Controller
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

            // Set the Stripe API key
            Stripe::setApiKey(config('stripe.sk'));

            if (! empty($campaign->discount_percent) && Carbon::parse($campaign->discount_expire_date)->greaterThan(now())) {
                $campaign_price = calculateDiscount($campaign->price, $campaign->discount_percent);
            } else {
                $campaign_price = $campaign->price;
            }

            // Create the Stripe checkout session
            $redirectUrl = route('user.stripe.success').'?session_id={CHECKOUT_SESSION_ID}';
            $session = StripeSession::create([
                'payment_method_types' => ['card'],
                'line_items' => [[
                    'price_data' => [
                        'currency' => 'eur',
                        'product_data' => [
                            'name' => $campaign->name_en,
                        ],
                        'unit_amount' => $campaign_price * 100,
                    ],
                    'quantity' => $quantity,
                ]],
                'mode' => 'payment',
                'success_url' => $redirectUrl,
                'cancel_url' => route('user.paypal.cancel'),
            ]);

            //remove cart session item
            if ($request->cart == 'true') {
                session()->forget('cartData');
            }

            // Redirect the user to the Stripe checkout page
            return redirect()->away($session->url);

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
            $stripe = new \Stripe\StripeClient(Config::get('stripe.sk'));
            $session = $stripe->checkout->sessions->retrieve($request->session_id);
            //check transaction has already
            $order = Order::where('transaction_id', $session->payment_intent)->first();
            //check has session & payment status
            if (! empty($session) && $session->payment_status == 'paid' && empty($order)) {
                DB::beginTransaction(); // Start transaction to ensure data integrity

                $quantity = LaravelSession::get('quantity');
                $campaign_id = LaravelSession::get('campaign_id');
                $user_id = LaravelSession::get('user_id');
                $user = ! empty(Auth::user()) ? Auth::user() : User::findOrFail($user_id);
                $campaign = Campaign::with(['ebooks'])->findOrFail($campaign_id);

                $discountQuantity = calculateFreeTicket($quantity, $campaign->how_many_buy, $campaign->how_many_free);
                // Store order in the database
                $order = $paymentService->orderCreate([
                    'user_id' => $user->id,
                    'transaction_id' => $session->payment_intent,
                    'quantity' => $quantity,
                    'discount_quantity' => $discountQuantity,
                    'discount_percent' => $campaign->discount_percent,
                    'discount_expire_date' => $campaign->discount_expire_date,
                    'total_price' => $campaign->price * $quantity,
                    'payment_method' => PaymentMethod::STRIPE,
                    'campaign_id' => $campaign->id,
                    'payment_status' => Status::COMPLETED,
                ]);
                // Generate the ticket numbers and create ticket entries
                $ticketNumbers = $paymentService->ticketCreate($order->id, $user->id, $quantity, $campaign->id, $discountQuantity, $campaign->unique_text);
                DB::commit(); // Commit transaction

                // Send the email with tickets and ebook
                Mail::to($user->email)->send(new TicketMail($order, $ticketNumbers, $campaign->ebooks->pluck('file')->toArray()));
                //send notification to the user
                $user->notify(new NewNotification(
                    subject: "Payment Complete",
                    message: "We received your payment, Thank you for purchasing!",
                    actionText: 'View Your Ticket',
                    actionUrl: route('user.tickets'),
                    channels: [ 'mail', 'database'],
                    type: NotificationType::PURCHASE
                ));
                //send notification to the admin
                $admin = User::where('role', 'admin')->first();
                $admin->notify(new NewNotification(
                    subject: "New Payment",
                    message: $user->first_name." ".$user->last_name." purchasing ".$order->quantity ." tickets and total pay:  ".$order->total_price,
                    actionText: 'See Invoice',
                    actionUrl: route('admin.invoice.index'),
                    channels: [ 'mail', 'database'],
                    type: NotificationType::PURCHASE
                ));

                // Clear session
                LaravelSession::forget(['quantity', 'campaign_id', 'user_id']);

                flash()->addSuccess('Payment Success');

                if (Auth::user()) {
                    return redirect()->route('user.buy-tickets')->with('payment_success', 'true')
                        ->with('buy_ticket', $quantity)
                        ->with('free_ticket', $discountQuantity)
                        ->with('buy_time', $order->created_at);
                } else {
                    return redirect()->route('frontend.web-shop.buy-ebook')
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

    public function cancel()
    {
        flash()->addError('Something went wrong');

        return redirect()->route('user.buy-tickets');
    }

    //Web Shop Payment

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

            //Store data to session
            LaravelSession::put([
                'quantity' => $quantity,
                'user_id' => $user->id,
                'campaign_id' => $campaign->id,
            ]);

            // Set the Stripe API key
            Stripe::setApiKey(config('stripe.sk'));

            //calculate campaign price
            if (! empty($campaign->discount_percent) && Carbon::parse($campaign->discount_expire_date)->greaterThan(now())) {
                $campaign_price = calculateDiscount($campaign->price, $campaign->discount_percent);
            } else {
                $campaign_price = $campaign->price;
            }
            // Create the Stripe checkout session
            $redirectUrl = route('frontend.web-shop.stripe.success').'?session_id={CHECKOUT_SESSION_ID}';
            $session = StripeSession::create([
                'payment_method_types' => ['card'],
                'line_items' => [[
                    'price_data' => [
                        'currency' => 'eur',
                        'product_data' => [
                            'name' => $campaign->name_en,
                        ],
                        'unit_amount' => $campaign_price * 100,
                    ],
                    'quantity' => $quantity,
                ]],
                'mode' => 'payment',
                'success_url' => $redirectUrl,
                'cancel_url' => route('frontend.web-shop.paypal.cancel'),
            ]);

            //remove cart session item
            if ($request->cart == 'true') {
                session()->forget('cartData');
            }

            // Redirect the user to the Stripe checkout page
            return redirect()->away($session->url);
        } catch (\Exception $exception) {
            flash()->addError($exception->getMessage());

            return redirect()->back();
        }
    }
}
