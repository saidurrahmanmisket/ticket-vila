<?php

use App\Http\Controllers\Web\Admin\ChatController;
use App\Http\Controllers\Web\Admin\ConfigurationSettingController;
use App\Http\Controllers\Web\Admin\DynamicPageController;
use App\Http\Controllers\Web\Admin\EbookDescriptionController;
use App\Http\Controllers\Web\Admin\FaqController;
use App\Http\Controllers\Web\Admin\GiftController;
use App\Http\Controllers\Web\Admin\HighlightImageController;
use App\Http\Controllers\Web\Admin\HouseFileController;
use App\Http\Controllers\Web\Admin\KeyFeatureController;
use App\Http\Controllers\Web\Admin\NewsController;
use App\Http\Controllers\Web\Admin\SocialMediaController;
use App\Http\Controllers\Web\Admin\SystemSettingController;
use App\Http\Controllers\Web\Admin\TeamController;
use App\Http\Controllers\Web\User\InvoiceController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified', 'admin'])->group(function () {

    Route::resource('/faq', FaqController::class);
    Route::post('/faq/status/{id}', [FaqController::class, 'status'])->name('faq.status');
    Route::resource('/team', TeamController::class);
    Route::post('/team/status/{id}', [TeamController::class, 'status'])->name('team.status');

    Route::resource('/social-media', SocialMediaController::class)->names('settings.social-media');
    Route::get('/system-setting', [SystemSettingController::class, 'index'])->name('settings.system-setting.index');
    Route::post('/system-setting', [SystemSettingController::class, 'update'])->name('settings.system-setting.update');

    Route::get('/configuration-setting', [ConfigurationSettingController::class, 'index'])->name('settings.configuration.index');
    Route::post('/mailSettingUpdate', [ConfigurationSettingController::class, 'mailSettingUpdate'])->name('mailSettingUpdate');
    Route::post('/paymentConfigurationUpdate', [ConfigurationSettingController::class, 'paymentConfigurationUpdate'])->name('paymentConfigurationUpdate');
    Route::post('/delete-gift-gallary-image', [GiftController::class, 'deleteGiftGallaryImage'])->name('deleteGiftGallaryImage');
    Route::post('/delete-gift-feature-item', [GiftController::class, 'deleteGifFeatureItem'])->name('deleteGifFeatureItem');

    Route::resource('/dynamic-page', DynamicPageController::class);
    Route::resource('/key-feature', KeyFeatureController::class)->except('show');
    Route::post('/key-feature/status/{id}', [KeyFeatureController::class, 'status'])->name('key-feature.status');
    Route::resource('/house-files', HouseFileController::class)->except('show');
    Route::post('/house-file/status/{id}', [HouseFileController::class, 'status'])->name('house-files.status');
    Route::resource('/highlight-image', HighlightImageController::class)->except('show');
    Route::post('/highlight-image/status/{id}', [HighlightImageController::class, 'status'])->name('highlight-image.status');
    Route::resource('/news', NewsController::class)->except('show');
    Route::post('/news/status/{id}', [NewsController::class, 'status'])->name('news.status');
    Route::get('/settings/help', [ChatController::class, 'index'])->name('help');
    Route::get('/settings/help/show/{id}', [ChatController::class, 'show'])->name('help.show');
    Route::get('/live-chat/details/{random_chat_id}', [ChatController::class, 'chatDetails'])->name('live-chat.reply.details');
    Route::post('/live-chat/reply/store', [ChatController::class, 'chatReplyStore'])->name('live-chat.reply.store');
    Route::post('/live-chat/status/{id}', [ChatController::class, 'status'])->name('chat.status');
    //invoice download
    Route::get('/invoice', [InvoiceController::class, 'index'])->name('invoice.index');
    Route::get('/invoice/download/{id}', [InvoiceController::class, 'downloadInvoice'])->name('invoice.download');
    //ebook description
    Route::resource('/cms/ebook-descriptions', EbookDescriptionController::class)->names('cms.ebook-description')->except('show');
    Route::post('/cms/ebook-descriptions/status/{id}', [EbookDescriptionController::class, 'status'])->name('cms.ebook-description.status');

});
