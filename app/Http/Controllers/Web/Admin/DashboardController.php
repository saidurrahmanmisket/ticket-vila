<?php

namespace App\Http\Controllers\Web\Admin;

use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\Order;
use App\Models\Ticket;
use App\Models\User;
use App\Models\Visitor;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $payment_count = Order::where('payment_status', Status::COMPLETED)->count();
        $total_users_count = User::where('role', 'user')->count();
        $today_users_count = User::whereDate('created_at', Carbon::today())->count();
        $averageTotalPrice = Order::where('payment_status', Status::COMPLETED)
            ->selectRaw('SUM(total_price) / COUNT(DISTINCT user_id) as average_total_price')
            ->pluck('average_total_price')
            ->first();
        $totalProfit = Order::where('payment_status', Status::COMPLETED)->sum('total_price');
        $todayProfit = Order::where('payment_status', Status::COMPLETED)
            ->whereDate('created_at', Carbon::today())
            ->sum('total_price');

        $usersInfo = [
            'payment_count' => $payment_count,
            'total_users_count' => $total_users_count,
            'today_users_count' => $today_users_count,
            'averageTotalPrice' => $averageTotalPrice,
        ];

        $revenueInfo = [
            'totalProfit' => $totalProfit,
            'todayProfit' => $todayProfit,
        ];

        $campaign = Campaign::where('status', Status::PUBLISHED)->first();
        $ticketsSoldToday = Ticket::whereDate('created_at', today())->count();
        if (! empty($campaign)) {
            $previousDaySold = Ticket::where('campaign_id', $campaign->id)
                ->whereDate('created_at', today()->subDays(1))
                ->count();

            $todayProgress = ($previousDaySold > 0)
                ? (($ticketsSoldToday - $previousDaySold) / $previousDaySold) * 100
                : 0;
            $todayProgress = number_format($todayProgress, 2);

        } else {
            $todayProgress = 0;
        }

        $countryVisits = Visitor::select('country', \DB::raw('count(*) as total'))->groupBy('country')->get()->map(function (Visitor $visitor) {
            return [$visitor->country, $visitor->total];
        })->toArray();

        $loginVisitors = Visitor::whereNotNull('user_id')->count();
        $guestVisitors = Visitor::whereNull('user_id')->count();

        return view('admin.layouts.dashboard', compact('usersInfo', 'revenueInfo', 'ticketsSoldToday', 'todayProgress', 'countryVisits', 'loginVisitors', 'guestVisitors'));

    }
}
