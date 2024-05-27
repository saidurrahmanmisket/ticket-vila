<?php

use App\Http\Controllers\OTPVerificationController;
use App\Http\Controllers\Web\Frontend\PageController;
use Illuminate\Support\Facades\Route;

//-----all page route ------by: saidur

Route::controller(PageController::class)->name('frontend.')->group(function () {
    
    Route::get('/', 'index')->name('/');
    Route::get('/home', 'index')->name('home');
    Route::get('/about', 'about')->name('about');
    Route::get('/contact', 'contact')->name('contact');
    Route::get('/imprint', 'imprint')->name('imprint');
    Route::get('/privacy', 'privacy')->name('privacy');
    Route::get('/rules', 'rules')->name('rules');
    Route::get('/support', 'support')->name('support');
    Route::get('/terms', 'terms')->name('terms');
    Route::get('/the-house', 'theHouse')->name('the-house');
    Route::get('/verify-email', 'verifyEmail')->name('verify-email');
    Route::get('/how-it-works', 'howItWorks')->name('how-it-works');
    
});

// Route to handle OTP verification by : saidur
Route::controller(OTPVerificationController::class)->group(function () {

    // Route to show OTP verification form
    Route::get('/verify-otp/{email}', 'showVerificationForm')->name('verify.otp');
    // Route to handle OTP verification
    Route::post('/verify-otp', 'verify')->name('verify.otp.post');
    
});