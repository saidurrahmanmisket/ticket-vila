<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Charge;
use Stripe\Stripe;

class StripePaymentTest extends Controller
{
    public function processPayment(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SK'));

        try {
            $charge = Charge::create([
                'amount' => $request->amount * 100, // amount in cents
                'currency' => 'usd',
                'source' => $request->stripeToken,
                'description' => 'Example charge',
                'quantity' => 1,
            ]);

            // Handle successful payment (e.g., update database, send confirmation email)

            return $charge->id;
        } catch (\Exception $e) {
            // Handle Stripe exceptions (e.g., card declined, insufficient funds)
            dd($e);

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
