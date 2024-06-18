<?php

namespace App\Http\Controllers\Payment;

use App\Enums\PaymentMethod;
use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Services\PaymentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
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
                'totalPrice' => 'required|numeric|min:0',
                'quantity' => 'required|integer|min:1',
                'paymentMethod' => 'required|string|max:255',
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
                return redirect()->route('user.buy-tickets');
            }

            $productName = $request->productName;
            $productId = $request->productId;
            $productPrice = $request->perPrice;
            $totalPrice = $request->totalPrice;
            $productPriceInCents = $productPrice * 100;
            $quantity = $request->quantity;
            $paymentMethod = $request->paymentMethod;

            // Generate a unique ID and store data in session
            LaravelSession::put([
                'productId' => $productId,
                'productName' => $productName,
                'perPrice' => $productPrice,
                'totalPrice' => $totalPrice,
                'quantity' => $quantity,
                'paymentMethod' => $paymentMethod,
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

            return redirect()->route('user.buy-tickets')->with($e->getMessage());
        }
    }

    public function success(Request $request, PaymentService $paymentService)
    {
        try {
            $stripe = new \Stripe\StripeClient(Config::get('stripe.sk'));
            $session = $stripe->checkout->sessions->retrieve($request->session_id);
            if (! empty($session) && $session->payment_status == 'paid') {
                DB::beginTransaction(); // Start transaction to ensure data integrity
                // Retrieve session data
                $campaign = Campaign::latest()->where('status', 'published')->first();
                $quantity = LaravelSession::get('quantity');
                $discountQuantity = $quantity == 9 ? 1 : 0;
                $paymentInfo = [
                    'user_id' => Auth::id(),
                    'transaction_id' => $session->payment_intent,
                    'quantity' => LaravelSession::get('quantity'),
                    'discount_quantity' => $discountQuantity,
                    'total_price' => LaravelSession::get('totalPrice'),
                    'payment_method' => PaymentMethod::STRIPE,
                    'campaign_id' => $campaign->id,
                    'payment_status' => Status::COMPLETED,
                ];
                // Store order in the database
                $order = $paymentService->orderCreate($paymentInfo);
                // Generate the ticket numbers and create ticket entries
                $ticketNumbers = $paymentService->ticketCreate($order->id, $quantity, $campaign->id, $discountQuantity, $campaign->unique_text);
                DB::commit(); // Commit transaction

                // Send the email with tickets and ebook
                //                Mail::to(Auth::user()->email)->send(new TicketMail($order, $ticketNumbers));

                // Clear session
                LaravelSession::forget(['unique_id', 'productId', 'productName', 'perPrice', 'totalPrice', 'quantity', 'paymentMethod']);

                flash()->addSuccess('Payment Success');

                return view('user.layouts.stripe_success');
            } else {
                return redirect()->route('user.buy-tickets')->with('error', 'Something went wrong');
            }
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback transaction in case of error
            Log::error($e->getMessage());

            return redirect()->route('user.buy-tickets')->with('error', $e->getMessage());
        }
    }
}
