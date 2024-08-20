<?php

use App\Http\Controllers\Web\Affiliate\AffiliateController;
use App\Http\Controllers\Web\Affiliate\PageController;

Route::middleware(['isAffiliate'])->group(function () {
    Route::controller(PageController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('dashboard');
        Route::get('/promotions', 'promotion')->name('promotion');
        Route::get('/ticket-sold', 'ticketSold')->name('ticket-sold');
        Route::get('/statistics', 'statistics')->name('statistics');
    });
    Route::post('/send_invitation', [AffiliateController::class, 'sendInvitation'])->name('send-invitation');
    Route::get('/toolkit/download/{type}', [AffiliateController::class, 'downloadFile'])->name('download-file');
});

//join affiliate
Route::post('/join-affiliate', [AffiliateController::class, 'join'])->name('join');
