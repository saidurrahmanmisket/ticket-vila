<?php

namespace App\Http\Controllers\Web\Admin;

use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\Country;
use App\Models\Order;
use App\Models\Ticket;
use App\Models\User;
use App\Models\Visitor;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

class StatisticsController extends Controller
{
    public function index(Request $request)
    {

        if (! auth()->user()->hasAnyPermission([
            'statistics live statics',
            'statistics revenue details',
            'statistics users details',
            'statistics sales analytics',
            'statistics Sold Today',
            'statistics average details',
            'statistics top country visits',
            'statistics top country income',
            'statistics top affiliates user',
            'statistics total affiliates sales',
        ])) {
            abort(403, 'Permission denied: you don\'t have permission to access this page.');
        }
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

        //salesData
        $salesData = $this->getOrderData();

        if ($request->ajax()) {
            $salesData = $this->getOrderData($request->slesDateRange);

            return response()->json([
                'salesData' => $salesData,
            ]);
        }

        //today login user count
        $todayLoginUsersCount = User::whereDate('last_login_at', Carbon::today())->count();
        //sitevisits
        $totalSiteVisits = Visitor::count();

        //top country visits count
        $topCountryVisits = Visitor::select('country', DB::raw('count(*) as total'))
            ->groupBy('country')
            ->orderByDesc('total')
            ->first();
        $topCountryCode = Country::where('name', $topCountryVisits?->country)->first()?->code;
        $topTenCountryVisits = Visitor::select('country', 'code', DB::raw('count(*) as total'))->groupBy('country', 'code')->orderByDesc('total')->take(10)->get();
        $topCountryIncomes = DB::table('orders')
            ->join('users', 'orders.user_id', '=', 'users.id')
            ->join('countries', 'users.country_id', '=', 'countries.id')
            ->select('countries.name as country', 'countries.code as code', DB::raw('SUM(orders.total_price) as total_income'))
            ->groupBy('countries.name')
            ->orderByDesc('total_income')
            ->take(10)
            ->get();
        $analyticsData = [
            'todayLoginUsersCount' => $todayLoginUsersCount,
            'totalSiteVisits' => $totalSiteVisits,
            'topCountryVisits' => [
                'code' => strtolower($topCountryCode),
                'name' => $topCountryVisits?->country,
                'visits' => $topCountryVisits?->total,
            ],
            'topTenCountryVisits' => $topTenCountryVisits,
            'topCountryIncomes' => $topCountryIncomes,
        ];

        //top 10 affiliate users
        $affiliateUsersRankingList = DB::table(DB::raw('(SELECT affiliate_users.user_id, SUM(orders.total_price) as total_amount, RANK() OVER (ORDER BY SUM(orders.total_price) DESC) as user_rank FROM affiliate_users LEFT JOIN affiliate_commissions ON affiliate_commissions.affiliate_user_id = affiliate_users.id LEFT JOIN orders ON orders.id = affiliate_commissions.order_id GROUP BY affiliate_users.user_id) as affiliate_users'))
            ->join('users', 'users.id', '=', 'affiliate_users.user_id')
            ->select('users.id as user_id', 'users.first_name as first_name', 'users.last_name as last_name', 'users.avatar as avatar', 'users.email as email', 'total_amount', 'user_rank')
            ->take(10)
            ->get();

        //top countries
        $topCountries = DB::table(DB::raw('(SELECT countries.id as country_id, countries.name as country_name,countries.code as country_code,SUM(orders.total_price) as total_amount,RANK() OVER (ORDER BY SUM(orders.total_price) DESC) as country_rank FROM countries JOIN users ON users.country_id = countries.id JOIN affiliate_users ON affiliate_users.user_id = users.id LEFT JOIN affiliate_commissions ON affiliate_commissions.affiliate_user_id = affiliate_users.id LEFT JOIN orders ON orders.id = affiliate_commissions.order_id GROUP BY countries.id, countries.name) as country_data'))
            ->select('country_data.country_id', 'country_data.country_name', 'country_code', 'total_amount', 'country_rank')
            ->take(10)
            ->get();

        return view('admin.layouts.statistics.index', compact('usersInfo', 'revenueInfo', 'todayProgress', 'ticketsSoldToday', 'salesData', 'analyticsData', 'affiliateUsersRankingList', 'topCountries'));
    }

    public function getOrderData($range = 'last_week')
    {
        $query = Order::query();
        $dateFormat = 'Y-m-d';

        switch ($range) {
            case 'last_week':
                $query->where('created_at', '>=', Carbon::now()->subWeek());
                break;

            case 'last_month':
                $query->where('created_at', '>=', Carbon::now()->subMonth());
                break;

            case 'last_year':
                $query->where('created_at', '>=', Carbon::now()->subYear());
                break;
            default:

                break;
        }

        if (in_array($range, ['last_week', 'last_month', 'last_year', 'since_start', 'day'])) {
            $orders = $query->selectRaw('DATE(created_at) as date, SUM(total_price) as total')
                ->groupBy('date')
                ->orderBy('date', 'asc')
                ->get();
        } else {
            $orders = $query->get();
        }

        // Format the data for ApexCharts
        return $orders->map(function ($order) use ($dateFormat) {
            return [
                'x' => Carbon::parse($order->date)->format($dateFormat),
                'y' => $order->total,
            ];
        });
    }
}
