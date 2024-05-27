<?php


use Illuminate\Support\Facades\Route;
Route::middleware(['auth','verified'])->name('user.')->prefix('user.')->group(function (){
    Route::view('/dashboard','user.layouts.dashboard')->name('dashboard');


    // Route::get('/statistics',[StatisticsController::class,'index'])->name('statistics.index');
    // Route::get('/ticket',[TicketController::class,'index'])->name('ticket.index');
    // Route::get('/user',[UserController::class,'index'])->name('user.index');
    // Route::get('/user/show/{id}',[UserController::class,'show'])->name('user.show');

});