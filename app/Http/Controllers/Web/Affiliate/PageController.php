<?php

namespace App\Http\Controllers\Web\Affiliate;

use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function index()
    {
        return view('affiliate-dashboard.layouts.dashboard');
    }

    public function promotion()
    {
        return view('affiliate-dashboard.layouts.promotion');
    }

    public function ticketSold()
    {
        return view('affiliate-dashboard.layouts.ticket-sold');
    }

    public function statistics()
    {
        return view('affiliate-dashboard.layouts.statistics');
    }
}
