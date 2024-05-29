<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Stripe\Charge;
use Stripe\Stripe;

Route::get('/', function () {
    return view('frontend.layouts.index');
});
