<?php

use App\Enums\Lang;
use App\Http\Controllers\Payment\PaypalController;
use App\Http\Controllers\Payment\StripeController;
use App\Http\Controllers\Web\Frontend\NewsletterController;
use App\Http\Controllers\Web\Frontend\PageController;
use App\Http\Controllers\Web\Frontend\PromoCodeController;
use App\Http\Controllers\Web\LogBrowsingTime;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

Route::get('/', function () {
    return view('frontend.layouts.index');
});

Route::get('/soechau-haus', [PageController::class, 'landingPage'])->name('landing-page');

Route::post('/add-to-news-latter', [NewsletterController::class, 'add'])->name('add-to-news-latter');
Route::prefix('web-shop')->name('frontend.web-shop.')->group(function () {
    Route::get('/buy-ebook', [PageController::class, 'buyEbook'])->name('buy-ebook');
    Route::get('/add-to-cart', [PageController::class, 'cart'])->name('cart');
    Route::post('/add-to-cart/{id}', [PageController::class, 'add_to_cart'])->name('add-to-cart');
    Route::get('/remove-cart', [PageController::class, 'remove_cart'])->name('remove-cart');
    Route::post('/cart/quantity/change', [PageController::class, 'quantity_change'])->name('quantity-change');
});
Route::prefix('web-shop')->middleware('guest')->name('frontend.web-shop.')->group(function () {
    //web shop view
    Route::get('/checkout', [PageController::class, 'checkout'])->name('checkout');

    //Stripe payment for web shop
    Route::post('/stripe/payment', [StripeController::class, 'web_shop_payment'])->name('stripe.payment');
    Route::get('/stripe/payment/success', [StripeController::class, 'success'])->name('stripe.success');

    //PayPal's payment for web shop routes
    Route::post('/paypal/payment', [PaypalController::class, 'web_shop_payment'])->name('paypal.payment');
    Route::get('/paypal/payment/success', [PaypalController::class, 'success'])->name('paypal.success');
});

Route::post('/apply-promo-code', [PromoCodeController::class, 'applyPromoCode'])->name('apply-promo-code');

Route::post('/log-browsing-time', [LogBrowsingTime::class, 'store'])->name('log-browsing-time');
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
