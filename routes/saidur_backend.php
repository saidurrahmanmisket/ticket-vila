<?php

use App\Http\Controllers\Web\Admin\FaqController;
use App\Http\Controllers\Web\Admin\SocialMediaController;
use App\Http\Controllers\Web\Admin\SystemSettingController;
use App\Http\Controllers\Web\Admin\TeamController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified', 'admin'])->group(function () {

    Route::resource('/faq', FaqController::class);
    Route::resource('/team', TeamController::class);
    Route::resource('/social-media', SocialMediaController::class);
    Route::get('/system-setting', [SystemSettingController::class, 'index'])->name('system-setting.index');
    Route::post('/system-setting', [SystemSettingController::class, 'update'])->name('system-setting.update');

});
