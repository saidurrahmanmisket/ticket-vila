<?php


use Illuminate\Support\Facades\Route;
Route::middleware(['auth','verified'])->name('user.')->prefix('user.')->group(function (){
    Route::view('/dashboard','user.layouts.dashboard')->name('dashboard');
});