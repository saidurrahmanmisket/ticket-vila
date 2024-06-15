<?php

use App\Http\Controllers\Web\Admin\ConfigurationSettingController;
use App\Http\Controllers\Web\Admin\DynamicPageController;
use App\Http\Controllers\Web\Admin\FaqController;
use App\Http\Controllers\Web\Admin\GiftController;
use App\Http\Controllers\Web\Admin\SocialMediaController;
use App\Http\Controllers\Web\Admin\SystemSettingController;
use App\Http\Controllers\Web\Admin\TeamController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified', 'admin'])->group(function () {

    Route::resource('/faq', FaqController::class);
    Route::resource('/team', TeamController::class);
    Route::resource('/social-media', SocialMediaController::class)->names('settings.social-media');
    Route::get('/system-setting', [SystemSettingController::class, 'index'])->name('settings.system-setting.index');
    Route::post('/system-setting', [SystemSettingController::class, 'update'])->name('settings.system-setting.update');

    Route::get('/configuration-setting', [ConfigurationSettingController::class, 'index'])->name('settings.configuration.index');
    Route::post('/mailSettingUpdate', [ConfigurationSettingController::class, 'mailSettingUpdate'])->name('mailSettingUpdate');
    Route::post('/paymentConfigurationUpdate', [ConfigurationSettingController::class, 'paymentConfigurationUpdate'])->name('paymentConfigurationUpdate');
    Route::post('/delete-gift-gallary-image', [GiftController::class, 'deleteGiftGallaryImage'])->name('deleteGiftGallaryImage');
    Route::post('/delete-gift-feature-item', [GiftController::class, 'deleteGifFeatureItem'])->name('deleteGifFeatureItem');

    Route::resource('/dynamic-page', DynamicPageController::class);

});
