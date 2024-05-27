<?php

use App\Http\Controllers\Web\Admin\ProfileController;
use App\Http\Controllers\Web\Admin\StatisticsController;
use App\Http\Controllers\Web\Admin\TicketController;
use App\Http\Controllers\Web\Admin\UserController;
use Illuminate\Support\Facades\Route;
Route::middleware(['auth','verified','admin'])->group(function (){
    Route::view('/dashboard','admin.layouts.dashboard')->name('dashboard');


    Route::get('/statistics',[StatisticsController::class,'index'])->name('statistics.index');
    Route::get('/ticket',[TicketController::class,'index'])->name('ticket.index');
    Route::get('/user',[UserController::class,'index'])->name('user.index');
    Route::get('/user/show/{id}',[UserController::class,'show'])->name('user.show');

    //Profile routes
    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile','index')->name('profile.index');
        Route::patch('/profile/update','update')->name('profile.update');
        Route::patch('/profile/change','updatePassword')->name('profile.change');
    });


});
