<?php

namespace App\Providers;

use App\Models\SystemSetting;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {
    /**
     * Register any application services.
     */
    public function register(): void {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void {
        Paginator::useBootstrap();

        View::composer('admin.partials.sidebar',function ($view){
            $systemSetting = SystemSetting::first();
            $view->with('systemSetting',$systemSetting);
        });
    }
}
