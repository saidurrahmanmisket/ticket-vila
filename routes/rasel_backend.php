<?php

use App\Http\Controllers\Web\Admin\CampaignController;
use App\Http\Controllers\Web\Admin\CMS\HeroController;
use App\Http\Controllers\Web\Admin\CMS\TheProcessController;
use App\Http\Controllers\Web\Admin\DashboardController;
use App\Http\Controllers\Web\Admin\GiftController;
use App\Http\Controllers\Web\Admin\NotificationController;
use App\Http\Controllers\Web\Admin\ProfileController;
use App\Http\Controllers\Web\Admin\SettingController;
use App\Http\Controllers\Web\Admin\StatisticsController;
use App\Http\Controllers\Web\Admin\TicketController;
use App\Http\Controllers\Web\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth','verified','admin'])->group(function (){
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');


    Route::get('/statistics',[StatisticsController::class,'index'])->name('statistics.index');
    Route::get('/ticket',[TicketController::class,'index'])->name('ticket.index');
    Route::get('/ticket/download/{id}',[TicketController::class,'download'])->name('ticket.download');
    Route::get('/user',[UserController::class,'index'])->name('user.index');
    Route::get('/user/show/{id}',[UserController::class,'show'])->name('user.show');

    //Profile routes
    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile','index')->name('profile.index');
        Route::patch('/profile/update','update')->name('profile.update');
        Route::patch('/profile/change','updatePassword')->name('profile.change');
    });

    //Gift routes
    Route::resource('/gift', GiftController::class);
//    Route::get('/gift/')

    //Campaign routes
    Route::resource('/campaign', CampaignController::class);


    Route::prefix('cms')->name('cms.')->group(function () {
        //CMS Hero Section routes
        Route::resource('hero', HeroController::class)->except('show');
        Route::post('/hero/status/{id}',[HeroController::class,'status'])->name('hero.status');
        //CSM The process routes
        Route::resource('/the-process', TheProcessController::class)->except('show');
        Route::post('/the-process/status/{id}',[TheProcessController::class,'status'])->name('the-process.status');
        Route::post('/the-process/order-update',[TheProcessController::class,'orderUpdate'])->name('the-process.order-update');

    });


    //Notification Routes
    Route::get('/notifications',[NotificationController::class,'index'])->name('notifications.index');

    //Settings Routes
    Route::get('/settings',[SettingController::class,'index'])->name('settings.index');
    Route::get('/settings/help',[SettingController::class,'help'])->name('settings.help');


});
