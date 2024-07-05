<?php

use App\Http\Controllers\Auth\OTPVerificationController;
use App\Http\Controllers\Payment\PaypalController;
use App\Http\Controllers\Payment\StripeController;
use App\Http\Controllers\Web\Frontend\PageController;
use App\Http\Controllers\Web\User\ChatController;
use App\Http\Controllers\Web\User\CheckoutController;
use App\Http\Controllers\Web\User\DashboardController;
use App\Http\Controllers\Web\User\SettingsController;
use App\Http\Controllers\Web\User\TheHouseController;
use App\Http\Controllers\Web\User\TicketController;
use Illuminate\Support\Facades\Route;

//-----all page route ------by: saidur

Route::controller(PageController::class)->name('frontend.')->group(function () {

    Route::get('/', 'index')->name('/');
    Route::get('/home', 'index')->name('home');
    Route::get('/about', 'about')->name('about');
    Route::get('/contact', 'contact')->name('contact');
    Route::post('/contact', 'submitContact')->name('contact.submit');
    Route::get('/imprint', 'imprint')->name('imprint');
    Route::get('/privacy', 'privacy')->name('privacy');
    Route::get('/rules', 'rules')->name('rules');
    Route::get('/support', 'support')->name('support');
    Route::get('/terms', 'terms')->name('terms');
    Route::get('/the-house', 'theHouse')->name('the-house');
    Route::get('/verify-email', 'verifyEmail')->name('verify-email');
    Route::get('/how-it-works', 'howItWorks')->name('how-it-works');
    Route::get('page/{page_slug}', 'dynamicPage')->name('custom.page');
    Route::get('/faqs', 'faq')->name('faqs');

});

// Route to handle OTP verification by : saidur
Route::controller(OTPVerificationController::class)->group(function () {

    // Route to show OTP verification form
    Route::get('/verify-otp/{email}', 'showVerificationForm')->name('verify.otp');
    // Route to handle OTP verification
    Route::post('/verify-otp', 'verify')->name('verify.otp.post');

});

//-----user dashboard route start from here =====================================------by: saidur
Route::middleware(['auth', 'auth.verify', 'user.route'])->name('user.')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/buy-tickets', [DashboardController::class, 'buyTickets'])->name('buy-tickets');
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
    Route::get('/user/tickets', [TicketController::class, 'index'])->name('tickets');

    //static page views
    Route::view('/user/dashboard', 'user.layouts.dashboard-purchase')->name('dashboard-purchase');
    Route::view('/user/expose', 'user.layouts.expose')->name('expose');
    Route::get('/user/house', [TheHouseController::class, 'index'])->name('house');
    Route::get('/user/change-house-url', [TheHouseController::class, 'changeHouseLink'])->name('change-house-url');
    Route::get('user/download/house-file/{id}', [TheHouseController::class, 'downloadHouseFile'])->name('download-house-file');
    Route::view('/user/statistics', 'user.layouts.statistics')->name('statistics');
    Route::view('/user/help-center', 'user.layouts.help-center')->name('help-center');
    Route::get('/user/live-chat', [ChatController::class, 'index'])->name('live-chat');
    Route::post('/user/live-chat', [ChatController::class, 'store'])->name('live-chat.store');
    Route::post('/user/live-chat/reply/store', [ChatController::class, 'chatReplyStore'])->name('live-chat.reply.store');
    Route::get('/user/live-chat/details/{random_chat_id}', [ChatController::class, 'chatDetails'])->name('live-chat.reply.details');



    //stripe payment routes
    Route::post('/stripe/payment', [StripeController::class, 'checkout'])->name('stripe.payment');
    Route::get('/stripe/payment/success', [StripeController::class, 'success'])->name('stripe.success');
    Route::get('/stripe/payment/cancel', [StripeController::class, 'cancel'])->name('stripe.cancel');

    //Paypal payment routes
    Route::post('/paypal/payment', [PaypalController::class, 'checkout'])->name('paypal.payment');
    Route::get('/paypal/payment/success', [PaypalController::class, 'success'])->name('paypal.success');
    Route::get('/paypal/payment/cancel', [PaypalController::class, 'cancel'])->name('paypal.cancel');

    //success message
    Route::get('/payment/success/message', function () {
        if (! session()->has('payment_success')) {
            abort(404);
        }

        return view('user.layouts.stripe_success');
    })->name('payment.success.message');

    //Profile routes
    Route::controller(SettingsController::class)->group(function () {
        Route::get('/user/settings', 'index')->name('settings');
        Route::patch('user/settings/personal-info/update', 'infoUpdate')->name('settings.personal-info.update');
        Route::patch('user/settings/password/update', 'passwordUpdate')->name('settings.password.update');
        // Route::patch('/user/change','updatePassword')->name('user.profile.change');
    });

});

//-----user dashboard route end  here ===========================================------by: saidur
