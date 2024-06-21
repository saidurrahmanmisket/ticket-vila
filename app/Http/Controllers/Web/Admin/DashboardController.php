<?php

namespace App\Http\Controllers\Web\Admin;

use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $campaign = Campaign::withCount('tickets')->latest()->where('status', 'published')->first();

        if (! empty($campaign)) {
            $totalTicketSold = $campaign->tickets_count;
            $limit = $campaign->limit ?? 0;
            $soldPercentage = ($totalTicketSold / $limit) * 100;
        } else {
            $totalTicketSold = 0;
            $soldPercentage = 0;
        }
        $payment_count = Order::where('payment_status', Status::COMPLETED)->count();
        $total_users_count = User::where('role', 'user')->count();
        $today_users_count = User::whereDate('created_at', Carbon::today())->count();

        $usersInfo = [
            'payment_count' => $payment_count,
            'total_users_count' => $total_users_count,
            'today_users_count' => $today_users_count,
        ];

        return view('admin.layouts.dashboard', compact('campaign', 'totalTicketSold', 'soldPercentage', 'usersInfo'));

    }
}
