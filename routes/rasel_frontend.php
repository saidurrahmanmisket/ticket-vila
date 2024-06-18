<?php

use App\Enums\Lang;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use Stripe\StripeClient;

Route::get('/', function () {
    return view('frontend.layouts.index');
});

//Change Language route
Route::get('/set-locale/{locale}', function ($locale) {
    //check valid lang code
    if (! in_array($locale, Lang::values())) {
        //set default language
        App::setLocale(Config::get('app.locale'));
    } else {
        //set language
        App::setLocale($locale);
        session(['locale' => $locale]);
    }

    //is previous url exist
    if (URL::previous()) {
        return redirect()->back();
    } else {
        return redirect()->route('/');
    }

})->name('setLocale');

Route::get('/checkout/test', function () {
    return view('checkout');
});
Route::post('/checkout/test', [\App\Http\Controllers\StripePaymentTest::class, 'processPayment'])->name('checkout.process');

Route::get('/refund', function () {
    $stripe = new StripeClient(env('STRIPE_SK'));
    $stripe->refunds->create([
        'payment_intent' => 'pi_3PSZWEIQ2pUmxoSJ1Pjjsdex',
    ]);
    flash()->addSuccess('Stripe payment refunded!');
});
