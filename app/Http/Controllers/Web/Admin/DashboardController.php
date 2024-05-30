<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $campaign = Campaign::withCount('tickets')->latest()->where('status', 'published')->first();

        if (!empty($campaign)){
            $totalTicketSold = $campaign->tickets_count;
            $limit = $campaign->limit ?? 0;
            $soldPercentage = ($totalTicketSold / $limit) * 100;
        }else{
            $totalTicketSold = 0;
            $soldPercentage = 0;
        }

        return view('admin.layouts.dashboard',compact('campaign','totalTicketSold','soldPercentage'));

    }
}
