<?php

use App\Enums\Lang;
use App\Http\Controllers\StripePaymentTest;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

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

//Route::view('/paypal_payment', 'checkout');
//Route::get('paypal', [StripePaymentTest::class, 'processPayment'])->name('paypal');
//Route::get('paypal/success', [StripePaymentTest::class, 'success'])->name('paypal.success');
//Route::get('paypal/cancel', [StripePaymentTest::class, 'cancel'])->name('paypal.cancel');
//Route::get('/refund', function () {
//    try {
//        $provider = new PayPalClient;
//        $provider->setApiCredentials(config('paypal'));
//        $provider->getAccessToken();
//        $test = $provider->refundCapturedPayment('7P252449GY310412V', '9HJ8545014520951J', '10', 'testing..');
//        dd($test);
//    } catch (Exception $exception) {
//        dd($exception->getMessage());
//    }
//});
