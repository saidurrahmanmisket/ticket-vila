<?php

use App\Http\Controllers\Web\Admin\CampaignController;
use App\Http\Controllers\Web\Admin\CMS\AboutPageController;
use App\Http\Controllers\Web\Admin\CMS\HeroController;
use App\Http\Controllers\Web\Admin\CMS\HomePageController;
use App\Http\Controllers\Web\Admin\CMS\RaffleRulesController;
use App\Http\Controllers\Web\Admin\CMS\TheProcessController;
use App\Http\Controllers\Web\Admin\CMS\ThreeDViewController;
use App\Http\Controllers\Web\Admin\DashboardController;
use App\Http\Controllers\Web\Admin\GiftController;
use App\Http\Controllers\Web\Admin\NotificationController;
use App\Http\Controllers\Web\Admin\PaymentController;
use App\Http\Controllers\Web\Admin\ProfileController;
use App\Http\Controllers\Web\Admin\SettingController;
use App\Http\Controllers\Web\Admin\StatisticsController;
use App\Http\Controllers\Web\Admin\TicketController;
use App\Http\Controllers\Web\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified', 'admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/statistics', [StatisticsController::class, 'index'])->name('statistics.index');
    Route::get('/ticket', [TicketController::class, 'index'])->name('ticket.index');
    Route::get('/ticket/download/{id}', [TicketController::class, 'download'])->name('ticket.download');
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/show/{id}', [UserController::class, 'show'])->name('user.show');

    //Profile routes
    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'index')->name('profile.index');
        Route::patch('/profile/update', 'update')->name('profile.update');
        Route::patch('/profile/change', 'updatePassword')->name('profile.change');
    });

    //Gift routes
    Route::resource('/gift', GiftController::class);
    //    Route::get('/gift/')

    //Campaign routes
    Route::resource('/campaign', CampaignController::class);
    Route::post('/campaign/status/{id}', [CampaignController::class, 'status'])->name('campaign.status');
    Route::delete('/campaign/ebook/destroy/{id}', [CampaignController::class, 'destroyEbook'])->name('campaign.destroyEbook');

    Route::prefix('cms')->name('cms.')->group(function () {
        //CMS Hero Section routes
        Route::resource('hero', HeroController::class)->except('show');
        Route::post('/hero/status/{id}', [HeroController::class, 'status'])->name('hero.status');
        //CSM The process routes
        Route::resource('/the-process', TheProcessController::class)->except('show');
        Route::post('/the-process/status/{id}', [TheProcessController::class, 'status'])->name('the-process.status');
        Route::post('/the-process/order-update', [TheProcessController::class, 'orderUpdate'])->name('the-process.order-update');
        //CMS Raffle Rules
        Route::resource('/raffle-rules', RaffleRulesController::class)->except('show');
        Route::post('/raffle-rules/status/{id}', [RaffleRulesController::class, 'status'])->name('raffle-rules.status');
        Route::post('/raffle-rules/order-update', [RaffleRulesController::class, 'orderUpdate'])->name('raffle-rules.order-update');
        Route::post('/raffle-rules/the_transparency', [RaffleRulesController::class, 'theTransparency'])->name('raffle-rules.the-transparency');

        //Pages
        Route::get('/home', [HomePageController::class, 'index'])->name('home-page.index');
        Route::post('/home/update_or_create/ticket_chance', [HomePageController::class, 'updateOrCreateChance'])->name('home-page.update-or-create-chance');
        Route::post('/home/update_or_create/win_spin', [HomePageController::class, 'updateOrCreateWinSpin'])->name('home-page.update-or-create-win-spin');

        Route::get('/about', [AboutPageController::class, 'index'])->name('about.index');
        Route::post('/about/the_mission', [AboutPageController::class, 'theMission'])->name('about.the-mission');
        Route::post('/about/the_transparency', [AboutPageController::class, 'theTransparency'])->name('about.the-transparency');

        //ThreeD view routes
        Route::get('/3d_map_or_video_section', [ThreeDViewController::class, 'mapOrVideo'])->name('three-d-map-or-video');
        Route::post('/3d_map_or_video_section/house_tour', [ThreeDViewController::class, 'updateOrCreateHoursTour'])->name('three-d-map-or-video.house-tour');
        Route::post('/3d_map_or_video_section/property_view', [ThreeDViewController::class, 'updateOrCreatePropertyView'])->name('three-d-map-or-video.property-view');
    });

    //Notification Routes
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
    //Settings Routes
    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
    Route::get('/settings/help', [SettingController::class, 'help'])->name('help');

    //User payment refund
    Route::post('/user/payment/refund/{id}', [PaymentController::class, 'refund'])->name('payment.refund');
});
