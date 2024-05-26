<?php

use App\Http\Controllers\Web\Frontend\HomeController;
use App\Http\Controllers\Web\Frontend\PageController;
use Illuminate\Support\Facades\Route;

Route::controller(HomeController::class)->name('frontend.')->group(function () {

    Route::get('/', [PageController::class, 'index'])->name('home');
    Route::get('/about', [PageController::class, 'about'])->name('about');
    Route::get('/contact', [PageController::class, 'contact'])->name('contact');
    Route::get('/imprint', [PageController::class, 'imprint'])->name('imprint');
    Route::get('/login', [PageController::class, 'login'])->name('login');
    Route::get('/privacy', [PageController::class, 'privacy'])->name('privacy');
    Route::get('/rules', [PageController::class, 'rules'])->name('rules');
    Route::get('/sign-up', [PageController::class, 'signUp'])->name('sign-up');
    Route::get('/support', [PageController::class, 'support'])->name('support');
    Route::get('/terms', [PageController::class, 'terms'])->name('terms');
    Route::get('/the-house', [PageController::class, 'theHouse'])->name('the-house');
    Route::get('/verify-email', [PageController::class, 'verifyEmail'])->name('verify-email');
    Route::get('/how-it-works', [PageController::class, 'howItWorks'])->name('how-it-works');

    
});
