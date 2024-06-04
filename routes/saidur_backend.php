<?php

use App\Http\Controllers\Web\Admin\FaqController;
use App\Http\Controllers\Web\Admin\SystemSetting;
use App\Http\Controllers\Web\Admin\TeamController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified', 'admin'])->group(function () {

    Route::resource('/faq', FaqController::class);
    Route::resource('/team', TeamController::class);
    Route::resource('/system-setting', SystemSetting::class);
    

});
