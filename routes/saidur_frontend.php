<?php

use App\Http\Controllers\Auth\OTPVerificationController;
use App\Http\Controllers\Payment\PaypalController;
use App\Http\Controllers\Payment\StripeController;
use App\Http\Controllers\Web\Frontend\PageController;
use App\Http\Controllers\Web\User\ChatController;
use App\Http\Controllers\Web\User\CheckoutController;
use App\Http\Controllers\Web\User\DashboardController;
use App\Http\Controllers\Web\User\InvoiceController;
use App\Http\Controllers\Web\User\NotificationController;
use App\Http\Controllers\Web\User\SettingsController;
use App\Http\Controllers\Web\User\StatisticsController;
use App\Http\Controllers\Web\User\TheHouseController;
use App\Http\Controllers\Web\User\TicketController;
use App\Models\Visitor;
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
    Route::get('/payment/success/message', 'paymentSuccessMessage')->name('payment-success-message');
    Route::get('/payment/cancel/message', 'paymentCancelMessage')->name('payment-cancel-message');
});

// Route to handle OTP verification by : saidur
Route::controller(OTPVerificationController::class)->middleware('auth')->group(function () {
    // Route to show OTP verification form
    Route::get('/verify-otp', 'showVerificationForm')->name('verify.otp');
    // Route to handle OTP verification
    Route::post('/verify-otp', 'verify')->name('verify.otp.post');
    Route::post('/verify-otp/resend', 'resend')->name('verify-otp.resend');
});

//-----user dashboard route start from here =====================================------by: saidur
Route::middleware(['auth', 'auth.verify', 'user.route', 'profile.completed'])->name('user.')->group(function () {

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
    Route::get('/user/statistics', [StatisticsController::class, 'index'])->name('statistics');
    Route::get('/user/statistics/sales-data', [StatisticsController::class, 'getSalesData'])->name('statistics.getSalesData');
    Route::view('/user/help-center', 'user.layouts.help-center')->name('help-center');
    Route::get('/user/live-chat', [ChatController::class, 'index'])->name('live-chat');
    Route::post('/user/live-chat', [ChatController::class, 'store'])->name('live-chat.store');
    Route::post('/user/live-chat/reply/store', [ChatController::class, 'chatReplyStore'])->name('live-chat.reply.store');
    Route::get('/user/live-chat/details/{random_chat_id}', [ChatController::class, 'chatDetails'])->name('live-chat.reply.details');

    //stripe payment routes
    Route::post('/stripe/payment', [StripeController::class, 'checkout'])->name('stripe.payment');
    Route::get('/stripe/payment/success', [StripeController::class, 'success'])->name('stripe.success');

    //Paypal payment routes
    Route::post('/paypal/payment', [PaypalController::class, 'checkout'])->name('paypal.payment');
    Route::get('/paypal/payment/success', [PaypalController::class, 'success'])->name('paypal.success');

    //success message page
    Route::get('/user/payment/success/message', function () {
        if (! session()->has('payment_success')) {
            abort(404);
        }

        return view('user.layouts.payment_success');
    })->name('payment.success.message');

    //invoice download
    Route::get('/invoice/download/{id}', [InvoiceController::class, 'downloadInvoice'])->name('invoice.download');
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
    Route::post('/notifications/mark-all-as-read', [NotificationController::class, 'markAllAsRead'])->name('notifications.markAllAsRead');
    Route::delete('/notifications/{id}', [NotificationController::class, 'destroy'])->name('notifications.destroy');

});
//Profile routes
Route::controller(SettingsController::class)->name('user.')->middleware(['auth', 'auth.verify', 'user.route'])->group(function () {
    Route::get('/user/settings', 'index')->name('settings');
    Route::patch('user/settings/personal-info/update', 'infoUpdate')->name('settings.personal-info.update');
    Route::patch('user/settings/password/update', 'passwordUpdate')->name('settings.password.update');
    // Route::patch('/user/change','updatePassword')->name('user.profile.change');
});
//-----user dashboard route end  here ===========================================------by: saidur

//Modify visitors
Route::get('/modify', function () {
    $visitors = \App\Models\Visitor::get();
    $visitors->map(function (Visitor $visitor) {
        $countryCode = \App\Models\Country::where('name', $visitor->country)->first()?->code;
        $visitor->update([
            'code' => $countryCode,
        ]);
    });

    return response()->json([
        'success' => 'true',
        'message' => 'visitors updated successfully',
    ]);
});
