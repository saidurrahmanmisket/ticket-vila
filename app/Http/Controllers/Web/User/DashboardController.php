<?php

namespace App\Http\Controllers\Web\User;

use App\Http\Controllers\Controller;
use App\Models\Campaign;

class DashboardController extends Controller
{
    public function index()
    {

        $campaign = Campaign::withCount('tickets')->latest()->where('status', 'published')->first();
        $totalTicketSold = $campaign->tickets_count;
        $campaign->limit ?? 0;
        $soldPercentage = ($totalTicketSold / $campaign->limit) * 100;
        $soldPercentage ?? 0;
        // dd($soldPercentage);

        return view('user.layouts.dashboard', compact('campaign', 'totalTicketSold', 'soldPercentage'));
    }

}
