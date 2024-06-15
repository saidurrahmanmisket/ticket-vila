<?php

namespace App\Providers;

use App\Models\Campaign;
use App\Models\DynamicPage;
use App\Models\SocialMedia;
use App\Models\SystemSetting;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();

        View::composer('admin.partials.sidebar', function ($view) {
            $systemSetting = SystemSetting::first();
            $view->with('systemSetting', $systemSetting);
        });

        // for user dashboard ticket statistics component
        View::composer('components.user.live-ticket-statistics', function ($view) {
            // Fetch campaign and related data
            $campaign = Campaign::withCount('tickets')->latest()->where('status', 'published')->first();
            $totalTicketSold = $campaign->tickets_count ?? 0;
            $soldPercentage = ($totalTicketSold / ($campaign->limit ?? 1)) * 100;

            // Prepare data array
            $data = [
                'campaign' => $campaign,
                'totalTicketSold' => $totalTicketSold,
                'soldPercentage' => $soldPercentage,
                // Add any other data needed
            ];
            $view->with('data', $data);
        });

        //Footer data
        View::composer('frontend.partials.footer', function ($view) {
            $socialMedia = SocialMedia::where('status', 'active')->get();

            $pageData = DynamicPage::where('status', 'active')->get();

            $view->with(['socialMedia' => $socialMedia, 'pageData' => $pageData]);
        });
    }
}
