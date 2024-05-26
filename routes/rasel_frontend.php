<?php


use Illuminate\Support\Facades\Route;

Route::get('/',function (){
   return view('frontend.layouts.index');
});

Route::middleware(['auth','verified'])->name('user.')->group(function(){
    Route::view('/dashboard','user.layouts.dashboard')->name('dashboard');
});
