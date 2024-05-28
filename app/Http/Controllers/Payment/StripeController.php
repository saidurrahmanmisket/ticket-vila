<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use Stripe\Checkout\Session;
use Stripe\Stripe;

class StripeController extends Controller
{
    public function checkout()
    {
        $productName = "test name";
        $productPrice = 500; // price in cents, so this is 5 GBP
        $quantity = 5;

        // Set the Stripe API key
        Stripe::setApiKey(env('STRIPE_SECRET'));

        // Create the Stripe checkout session
        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'gbp',
                    'product_data' => [
                        'name' => $productName,
                    ],
                    'unit_amount' => $productPrice, // Stripe expects the price in cents
                ],
                'quantity' => $quantity,
            ]],
            'mode' => 'payment',
            'success_url' => route('user.dashboard'),
            'cancel_url' => route('user.checkout'),
        ]);

        // Redirect the user to the Stripe checkout page
        return redirect()->away($session->url);
    }
}
