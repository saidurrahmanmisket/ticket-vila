<?php

namespace App\Http\Controllers\Payment;

use App\Enums\PaymentMethod;
use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Mail\TicketMail;
use App\Models\Campaign;
use App\Services\PaymentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session as LaravelSession;
use Illuminate\Support\Facades\Validator;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PaypalController extends Controller
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

            // Generate a unique ID and store data in session
            LaravelSession::put([
                'productId' => $productId,
                'productName' => $productName,
                'perPrice' => $productPrice,
                'totalPrice' => $totalPrice,
                'quantity' => $quantity,
            ]);

            $provider = new PayPalClient;
            $provider->setApiCredentials(config('paypal'));
            $provider->getAccessToken();

            $response = $provider->createOrder([
                'intent' => 'CAPTURE',
                'application_context' => [
                    'return_url' => route('user.paypal.success'),
                    'cancel_url' => route('user.paypal.cancel'),
                ],
                'purchase_units' => [
                    0 => [
                        'amount' => [
                            'currency_code' => 'EUR',
                            'value' => $totalPrice,
                        ],
                    ],
                ],
            ]);
            if (isset($response['id']) && $response['id'] != null) {

                // redirect to approve href
                foreach ($response['links'] as $links) {
                    if ($links['rel'] == 'approve') {
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
                $campaign = Campaign::latest()->with(['ebooks'])->where('status', 'published')->first();
                $quantity = LaravelSession::get('quantity');
                $discountQuantity = calculateFreeTicket($quantity, $campaign->how_many_buy, $campaign->how_many_free);
                $paymentInfo = [
                    'user_id' => Auth::id(),
                    'transaction_id' => $response['purchase_units'][0]['payments']['captures'][0]['id'] ?? '',
                    'quantity' => LaravelSession::get('quantity'),
                    'discount_quantity' => $discountQuantity,
                    'discount_percent' => $campaign->discount_percent,
                    'discount_expire_date' => $campaign->discount_expire_date,
                    'total_price' => LaravelSession::get('totalPrice'),
                    'payment_method' => PaymentMethod::PAYPAL,
                    'campaign_id' => $campaign->id,
                    'payment_status' => Status::COMPLETED,
                    'invoice_no' => $response['id'] ?? null,
                ];
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

            return redirect()->route('user.buy-tickets')->with('error', $e->getMessage());
        }
    }

    public function cancel()
    {
        flash()->addError('Something went wrong');
        redirect()->route('user.buy-tickets');

    }
}
