<?php

use App\Http\Controllers\Web\Admin\AdminUserController;
use App\Http\Controllers\Web\Admin\AffiliateToolkitFile;
use App\Http\Controllers\Web\Admin\AffiliateTripsAndTricksController;
use App\Http\Controllers\Web\Admin\AffiliateUsersController;
use App\Http\Controllers\Web\Admin\AffiliateWithdrawController;
use App\Http\Controllers\Web\Admin\CampaignController;
use App\Http\Controllers\Web\Admin\CMS\AboutPageController;
use App\Http\Controllers\Web\Admin\CMS\HeroController;
use App\Http\Controllers\Web\Admin\CMS\HomePageController;
use App\Http\Controllers\Web\Admin\CMS\RaffleRulesController;
use App\Http\Controllers\Web\Admin\CMS\TheProcessController;
use App\Http\Controllers\Web\Admin\CMS\ThreeDViewController;
use App\Http\Controllers\Web\Admin\ConfigurationSettingController;
use App\Http\Controllers\Web\Admin\DashboardController;
use App\Http\Controllers\Web\Admin\GiftController;
use App\Http\Controllers\Web\Admin\NotificationController;
use App\Http\Controllers\Web\Admin\PaymentController;
use App\Http\Controllers\Web\Admin\ProfileController;
use App\Http\Controllers\Web\Admin\PromoCodeController;
use App\Http\Controllers\Web\Admin\RolePermissionController;
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

    Route::resource('/role', RolePermissionController::class)->except('show');
    Route::resource('/admin-user', AdminUserController::class)->except('show', 'destroy');

    //Profile routes
    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'index')->name('profile.index');
        Route::patch('/profile/update', 'update')->name('profile.update');
        Route::patch('/profile/change', 'updatePassword')->name('profile.change');
    });

    //Gift routes
    Route::resource('/gift', GiftController::class);

    //Promo Code
    Route::resource('/promo-code', PromoCodeController::class)->except('show');
    Route::post('/promo-code/status/{id}', [PromoCodeController::class, 'status'])->name('promo-code.status');

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
        Route::post('/3d_map_or_video_section/street_view', [ThreeDViewController::class, 'updateOrCreateStreetView'])->name('three-d-map-or-video.street-view');
        Route::post('/3d_map_or_video_section/visit_your_new_home', [ThreeDViewController::class, 'updateOrCreateVisitYourNewHome'])->name('three-d-map-or-video.visit-your-new-home');
        Route::post('/3d_map_or_video_section/video-presentation-one', [ThreeDViewController::class, 'videoPresentationOne'])->name('three-d-map-or-video.video-presentation-one');
        Route::post('/3d_map_or_video_section/video-presentation-two', [ThreeDViewController::class, 'videoPresentationTwo'])->name('three-d-map-or-video.video-presentation-two');
    });
    //Affiliate Toolkit routes
    Route::resource('/affiliate-toolkit', AffiliateToolkitFile::class)->except(['show']);
    Route::post('/affiliate-toolkit/status/{id}', [AffiliateToolkitFile::class, 'status'])->name('affiliate-toolkit.status');
    Route::get('/affiliate-toolkit/download/{affiliateFile}', [AffiliateToolkitFile::class, 'download'])->name('affiliate-toolkit.download');
    Route::get('/affiliate/withdraw-request', [AffiliateWithdrawController::class, 'show'])->name('affiliate-withdraw-request.show');
    Route::post('/affiliate/withdraw-request/status/{id}', [AffiliateWithdrawController::class, 'status'])->name('affiliate-withdraw-request.status');
    Route::delete('/affiliate/withdraw-request/destroy/{id}', [AffiliateWithdrawController::class, 'destroy'])->name('affiliate-withdraw-request.destroy');

    //Affiliate trips and tricks routes
    Route::resource('/affiliate-trips', AffiliateTripsAndTricksController::class)->except(['show']);
    Route::post('/affiliate-trips/status/{id}', [AffiliateTripsAndTricksController::class, 'status'])->name('affiliate-trips.status');

    //Affiliate users routes
    Route::get('/affiliate-users', [AffiliateUsersController::class, 'index'])->name('affiliate-users.index');
    Route::post('/affiliate-users/update-commission', [AffiliateUsersController::class, 'updateCommission'])->name('affiliate-users.update-commission');

    //Notification Routes
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
    Route::post('/notifications/mark-all-as-read', [NotificationController::class, 'markAllAsRead'])->name('notifications.markAllAsRead');
    Route::delete('/notifications/{id}', [NotificationController::class, 'destroy'])->name('notifications.destroy');
    //User payment refund
    Route::post('/user/payment/refund/{id}', [PaymentController::class, 'refund'])->name('payment.refund');

    //Google login configuration
    Route::post('/google-login-configuration', [ConfigurationSettingController::class, 'googleLoginConfig'])->name('google-login-config');
    //Mailchimp configuration
    Route::post('/mailchimp-configuration', [ConfigurationSettingController::class, 'mailchimpConfig'])->name('mailchimp-config');
});
