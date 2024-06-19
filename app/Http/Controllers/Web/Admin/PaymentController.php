<?php

namespace App\Http\Controllers\Web\Admin;

use App\Enums\PaymentMethod;
use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Ticket;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Stripe\StripeClient;

class PaymentController extends Controller
{
    public function refund($id)
    {
        try {
            $order = Order::with('tickets')->findOrFail($id);
            if ($order) {
                if ($order->payment_status === Status::COMPLETED) {
                    if ($order->payment_method === PaymentMethod::STRIPE) {
                        $stripe = new StripeClient(config('stripe.sk'));
                        $stripe->refunds->create([
                            'payment_intent' => $order->transaction_id,
                        ]);
                    } else {
                        $provider = new PayPalClient;
                        $provider->setApiCredentials(config('paypal'));
                        $provider->getAccessToken();
                        $provider->refundCapturedPayment($order->transaction_id, $order->invoice_no, $order->total_price, 'Payment refund');
                    }

                    $order->payment_status = Status::REFUND;
                    $order->save();
                    Ticket::whereIn('id', $order->tickets->pluck('id')->toArray())->delete();
                    flash()->addSuccess('Payment refunded.');

                    return redirect()->back();
                } elseif ($order->payment_status === Status::REFUND) {
                    flash()->addWarning('Payment already refunded.');

                    return redirect()->back();
                } else {
                    flash()->addWarning("Payment in pending or processing. You can't refund this order");
                }
            } else {
                flash()->addWarning('Order not found!');

                return redirect()->back();
            }
        } catch (\Exception $exception) {
            flash()->addError($exception->getMessage());

            return redirect()->back();
        }
    }
}
