<?php

namespace App\Http\Controllers\Payment;

use App\Enums\PaymentMethod;
use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Mail\TicketMail;
use App\Models\Campaign;
use App\Models\Order;
use App\Services\PaymentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session as LaravelSession;
use Illuminate\Support\Facades\Validator;
use Stripe\Checkout\Session as StripeSession;
use Stripe\Stripe;

class StripeController extends Controller
{
    public function checkout(Request $request)
    {
        try {

            // Define validation rules
            $rules = [
                'productName' => 'required|string|max:255',
                'productId' => 'required|integer',
                'perPrice' => 'required|numeric|min:0',
                'quantity' => 'required|integer|min:1',
                'terms_and_condition' => 'required',
            ];

            // Create validator instance
            $validator = Validator::make($request->all(), $rules);

            // Check for validation failures
            if ($validator->fails()) {
                $errors = $validator->errors();

                // Flash specific error messages
                foreach ($errors->all() as $error) {
                    flash()->addError($error);
                }

                // Redirect back with input and errors
                return redirect()->back();
            }

            $productName = $request->productName;
            $productId = $request->productId;
            $productPrice = $request->perPrice;
            $quantity = $request->quantity;
            $totalPrice = $productPrice * (int) $quantity;
            $productPriceInCents = $productPrice * 100;

            // Generate a unique ID and store data in session
            LaravelSession::put([
                'productId' => $productId,
                'productName' => $productName,
                'perPrice' => $productPrice,
                'totalPrice' => $totalPrice,
                'quantity' => $quantity,
            ]);

            // Set the Stripe API key
            Stripe::setApiKey(config('stripe.sk'));

            // Create the Stripe checkout session
            $redirectUrl = route('user.stripe.success').'?session_id={CHECKOUT_SESSION_ID}';
            $session = StripeSession::create([
                'payment_method_types' => ['card'],
                'line_items' => [[
                    'price_data' => [
                        'currency' => 'eur',
                        'product_data' => [
                            'name' => $productName,
                        ],
                        'unit_amount' => $productPriceInCents,
                    ],
                    'quantity' => $quantity,
                ]],
                'mode' => 'payment',
                'success_url' => $redirectUrl,
                'cancel_url' => route('user.checkout'),
            ]);

            // Redirect the user to the Stripe checkout page
            //            dd($session);

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
            $order = Order::where('transaction_id', $session->payment_intent)->first();
            if (! empty($session) && $session->payment_status == 'paid' && empty($order)) {
                DB::beginTransaction(); // Start transaction to ensure data integrity
                // Retrieve session data
                $campaign = Campaign::latest()->with(['ebooks'])->where('status', 'published')->first();
                $quantity = LaravelSession::get('quantity');
                $discountQuantity = calculateFreeTicket($quantity, $campaign->how_many_buy, $campaign->how_many_free);
                $paymentInfo = [
                    'user_id' => Auth::id(),
                    'transaction_id' => $session->payment_intent,
                    'quantity' => LaravelSession::get('quantity'),
                    'discount_quantity' => $discountQuantity,
                    'discount_percent' => $campaign->discount_percent,
                    'total_price' => LaravelSession::get('totalPrice'),
                    'payment_method' => PaymentMethod::STRIPE,
                    'campaign_id' => $campaign->id,
                    'payment_status' => Status::COMPLETED,
                ];
                //                dd('okk');
                // Store order in the database
                $order = $paymentService->orderCreate($paymentInfo);
                // Generate the ticket numbers and create ticket entries
                $ticketNumbers = $paymentService->ticketCreate($order->id, $quantity, $campaign->id, $discountQuantity, $campaign->unique_text);
                DB::commit(); // Commit transaction

                // Send the email with tickets and ebook
                Mail::to(Auth::user()->email)->send(new TicketMail($order, $ticketNumbers, $campaign->ebooks->pluck('file')->toArray()));

                // Clear session
                LaravelSession::forget(['productId', 'productName', 'perPrice', 'totalPrice', 'quantity']);

                flash()->addSuccess('Payment Success');

                return redirect()->route('user.payment.success.message')->with('payment_success', 'Payment success');
            } else {
                flash()->addError('Something went wrong');

                return redirect()->route('user.buy-tickets');
            }
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback transaction in case of error
            Log::error($e->getMessage());
            flash()->addError($e->getMessage());

            return redirect()->route('user.buy-tickets');
        }
    }

    public function cancel()
    {
        flash()->addError('Something went wrong');
        redirect()->route('user.buy-tickets');

    }
}
