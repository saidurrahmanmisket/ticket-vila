<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Mail\TicketMail;
use App\Models\Campaign;
use App\Models\Order;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session as LaravelSession;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
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
            $unique_id = (string) Str::uuid();
            LaravelSession::put([
                'unique_id' => $unique_id,
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
                'success_url' => route('user.stripe.success', ['reference' => $unique_id]),
                'cancel_url' => route('user.checkout'),
            ]);
            // Redirect the user to the Stripe checkout page
            return redirect()->away($session->url);
        } catch (\Exception $e) {
            // Handle the exception
            Log::error($e->getMessage());
            flash()->addError($e->getMessage());
            return redirect()->route('user.buy-tickets')->with($e->getMessage());
        }
    }
    public function success($reference)
    {
        try {
            $unique_id = $reference;

            if (LaravelSession::get('unique_id') == $unique_id) {
                DB::beginTransaction(); // Start transaction to ensure data integrity

                // Retrieve session data
                $userId = Auth::id();
                $campaign = Campaign::latest()->where('status', 'published')->first();
                $orderNumber = $unique_id;
                $quantity = LaravelSession::get('quantity');
                $discountQuantity = $quantity == 9 ? 1 : 0;
                $totalPrice = LaravelSession::get('totalPrice');
                $paymentMethod = LaravelSession::get('paymentMethod');
                $campaignId = $campaign->id;
                $paymentStatus = 'completed';

                // Store order in the database
                $order = Order::create([
                    'user_id' => $userId,
                    'order_number' => $orderNumber,
                    'quantity' => $quantity,
                    'discount_quantity' => $discountQuantity,
                    'total_price' => $totalPrice,
                    'payment_method' => $paymentMethod,
                    'campaign_id' => $campaignId,
                    'payment_status' => $paymentStatus,
                ]);

                // Generate the ticket numbers and create ticket entries
                $prefix = $campaign->unique_text;
                $lastTicket = Ticket::where('user_id', $userId)
                    ->where('campaign_id', $campaignId)
                    ->where('ticket_number', 'like', $prefix . '%')
                    ->orderBy('id', 'desc')
                    ->first();

                $last_sequence = $lastTicket ? $lastTicket->ticket_number : $prefix . '-000000';
                $ticketNumbers = [];

                for ($i = 0; $i < $quantity + $discountQuantity; $i++) {
                    $newTicketNumber = unique_ticket_number($prefix, $last_sequence);

                    Ticket::create([
                        'ticket_number' => $newTicketNumber,
                        'user_id' => $userId,
                        'order_id' => $order->id,
                        'campaign_id' => $campaignId,
                    ]);

                    $last_sequence = $newTicketNumber; // Update last sequence for next iteration
                    $ticketNumbers[] = $newTicketNumber;
                }

                DB::commit(); // Commit transaction

                // Send the email with tickets and ebook
                Mail::to(Auth::user()->email)->send(new TicketMail($order, $ticketNumbers));

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
