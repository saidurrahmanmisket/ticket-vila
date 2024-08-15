<?php

use App\Http\Controllers\Web\Affiliate\PageController;

Route::controller(PageController::class)->group(function () {
    Route::get('/dashboard', 'index')->name('dashboard');
    Route::get('/promotions', 'promotion')->name('promotion');
    Route::get('/ticket-sold', 'ticketSold')->name('ticket-sold');
    Route::get('/statistics', 'statistics')->name('statistics');
});
