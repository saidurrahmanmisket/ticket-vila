<?php

use App\Http\Controllers\Web\Admin\ConfigurationSettingController;
use App\Http\Controllers\Web\Admin\FaqController;
use App\Http\Controllers\Web\Admin\GiftController;
use App\Http\Controllers\Web\Admin\SocialMediaController;
use App\Http\Controllers\Web\Admin\SystemSettingController;
use App\Http\Controllers\Web\Admin\TeamController;
use App\Http\Controllers\Web\User\ProfileController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified', 'admin'])->group(function () {

    Route::resource('/faq', FaqController::class);
    Route::resource('/team', TeamController::class);
    Route::resource('/social-media', SocialMediaController::class);
    Route::get('/system-setting', [SystemSettingController::class, 'index'])->name('system-setting.index');
    Route::post('/system-setting', [SystemSettingController::class, 'update'])->name('system-setting.update');

    Route::get('/configuration-setting', [ConfigurationSettingController::class, 'index'])->name('configuration.index');
    Route::post('/mailSettingUpdate', [ConfigurationSettingController::class, 'mailSettingUpdate'])->name('mailSettingUpdate');
    Route::post('/paymentConfigurationUpdate', [ConfigurationSettingController::class, 'paymentConfigurationUpdate'])->name('paymentConfigurationUpdate');
    Route::post('/delete-gift-gallary-image', [GiftController::class, 'deleteGiftGallaryImage'])->name('deleteGiftGallaryImage');
    Route::post('/delete-gift-feature-item', [GiftController::class, 'deleteGifFeatureItem'])->name('deleteGifFeatureItem');


});
