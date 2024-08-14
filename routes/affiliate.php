<?php

Route::get('/dashboard', function () {
    return view('affiliate-dashboard.layouts.dashboard');
})->name('dashboard');
