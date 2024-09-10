<?php

namespace App\Http\Controllers\Web\Affiliate;

use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Models\AffiliateCommission;
use App\Models\AffiliateFile;
use App\Models\AffiliateTrips;
use App\Models\AffiliateUser;
use App\Models\AffiliateUserWithdrawalRequest;
use App\Models\Order;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(Request $request)
    {
        $affiliate_user_id = auth()->user()->load('affiliate')->affiliate->id;
        $userWithTotalCommissions = AffiliateCommission::where('affiliate_user_id', $affiliate_user_id)->select('referrer_user_id', DB::raw('SUM(amount) as total_amount'))
            ->join('orders', 'orders.id', '=', 'affiliate_commissions.order_id')
            ->where('orders.payment_status', 'completed')
            ->with(['referralUser'])
            ->groupBy('referrer_user_id')
            ->orderBy('total_amount', 'desc')
            ->get();

        $ticketCounts = DB::table('tickets')
            ->join('orders', 'tickets.order_id', '=', 'orders.id')
            ->where('orders.payment_status', 'completed')
            ->join('affiliate_commissions', 'affiliate_commissions.order_id', '=', 'orders.id')
            ->where('affiliate_commissions.affiliate_user_id', $affiliate_user_id)
            ->whereDate('affiliate_commissions.created_at', today())
            ->select(DB::raw('COUNT(tickets.id) as total_tickets'))
            ->first();

        $profitQuery = AffiliateCommission::query()
            ->join('orders', 'affiliate_commissions.order_id', '=', 'orders.id')
            ->where('orders.payment_status', 'completed')
            ->where('affiliate_commissions.affiliate_user_id', $affiliate_user_id);

        $profitDetails = $profitQuery->select(
            DB::raw('COUNT(DISTINCT affiliate_commissions.referrer_user_id) as referrer_user'),
        )->first();
        $profitDetails->total_amount = AffiliateUser::find($affiliate_user_id)->balance;
        $toDayProfitDetails = $profitQuery->whereDate('affiliate_commissions.created_at', today())->select(
            DB::raw('SUM(affiliate_commissions.amount) as total_amount'),
            DB::raw('COUNT(DISTINCT affiliate_commissions.referrer_user_id) as referrer_user'),
        )->first();
        $toDayProfitDetails->total_tickets = $ticketCounts->total_tickets;

        $rankQuery = DB::table(DB::raw('(SELECT user_id, balance, RANK() OVER (ORDER BY balance DESC) as user_rank FROM affiliate_users) as affiliate_users'))
            ->join('users', 'users.id', '=', 'affiliate_users.user_id')
            ->select('users.id as user_id', 'users.first_name as first_name', 'users.last_name as last_name', 'users.email as email', 'balance', 'user_rank');
        $rank = clone $rankQuery;
        $rank = $rank->where('user_id', auth()->id())->first();
        $rankList = clone $rankQuery->take(10)->get();

        //earning analytics
        $earningData = $this->getEarningData('last_week', $affiliate_user_id);

        if ($request->ajax()) {
            $earningData = $this->getEarningData($request->earningDateRange, $affiliate_user_id);

            return response()->json([
                'earningData' => $earningData,
            ]);
        }

        return view('affiliate-dashboard.layouts.dashboard', compact('userWithTotalCommissions', 'profitDetails', 'toDayProfitDetails', 'rank', 'rankList', 'earningData'));
    }

    public function promotion()
    {
        $toolkits = AffiliateFile::where('status', Status::ACTIVE)->get();
        $trips = AffiliateTrips::with(['user'])->where('status', Status::ACTIVE)->get();

        return view('affiliate-dashboard.layouts.promotion', compact('toolkits', 'trips'));
    }

    public function ticketSold()
    {
        $affiliate_user_id = auth()->user()->load('affiliate')->affiliate->id;
        $ticketCounts = DB::table('tickets')
            ->join('orders', 'tickets.order_id', '=', 'orders.id')
            ->where('orders.payment_status', 'completed')
            ->join('affiliate_commissions', 'affiliate_commissions.order_id', '=', 'orders.id')
            ->where('affiliate_commissions.affiliate_user_id', $affiliate_user_id)
            ->whereDate('affiliate_commissions.created_at', today())
            ->select(DB::raw('COUNT(tickets.id) as total_tickets'))
            ->first();
        $profitQuery = AffiliateCommission::query()
            ->join('orders', 'affiliate_commissions.order_id', '=', 'orders.id')
            ->where('orders.payment_status', 'completed')
            ->where('affiliate_commissions.affiliate_user_id', $affiliate_user_id);

        $profitDetails = $profitQuery->select(
            DB::raw('COUNT(DISTINCT affiliate_commissions.referrer_user_id) as referrer_user'),
        )->first();
        $profitDetails->total_amount = AffiliateUser::find($affiliate_user_id)->balance;
        $toDayProfitDetails = $profitQuery->whereDate('affiliate_commissions.created_at', today())->select(
            DB::raw('SUM(affiliate_commissions.amount) as total_amount'),
            DB::raw('COUNT(DISTINCT affiliate_commissions.referrer_user_id) as referrer_user'),
        )->first();
        $toDayProfitDetails->total_tickets = $ticketCounts->total_tickets;
        $toDayProfitDetails = $profitQuery->whereDate('affiliate_commissions.created_at', today())->select(
            DB::raw('SUM(affiliate_commissions.amount) as total_amount'),
            DB::raw('COUNT(DISTINCT affiliate_commissions.referrer_user_id) as referrer_user'),
        )->first();
        $toDayProfitDetails->total_tickets = $ticketCounts->total_tickets;

        $tickets = AffiliateCommission::with(['order' => function ($query) {
            $query->withCount('tickets');
        }])->latest()->paginate(20);

        return view('affiliate-dashboard.layouts.ticket-sold', compact('profitDetails', 'toDayProfitDetails', 'tickets'));
    }

    public function statistics(Request $request)
    {
        $affiliate_user_id = auth()->user()->load('affiliate')->affiliate->id;
        $ticketQuery = DB::table('tickets')
            ->join('orders', 'tickets.order_id', '=', 'orders.id')
            ->where('orders.payment_status', 'completed')
            ->join('affiliate_commissions', 'affiliate_commissions.order_id', '=', 'orders.id')
            ->where('affiliate_commissions.affiliate_user_id', $affiliate_user_id);
        $ticketCounts = clone $ticketQuery;
        $ticketCounts = $ticketCounts->whereDate('affiliate_commissions.created_at', today())
            ->select(DB::raw('COUNT(tickets.id) as total_tickets'))
            ->first();
        $ticketCountResult = $ticketCounts->total_tickets;
        $profitQuery = AffiliateCommission::query()
            ->join('orders', 'affiliate_commissions.order_id', '=', 'orders.id')
            ->where('orders.payment_status', 'completed')
            ->where('affiliate_commissions.affiliate_user_id', $affiliate_user_id);

        $profitDetails = $profitQuery->select(
            DB::raw('COUNT(DISTINCT affiliate_commissions.referrer_user_id) as referrer_user'),
        )->first();
        $total_balance = AffiliateUser::find($affiliate_user_id)->balance;
        $profitDetails->total_amount = $total_balance;
        $toDayProfitDetails = $profitQuery->whereDate('affiliate_commissions.created_at', today())->select(
            DB::raw('SUM(affiliate_commissions.amount) as total_amount'),
            DB::raw('COUNT(DISTINCT affiliate_commissions.referrer_user_id) as referrer_user'),
        )->first();
        $toDayProfitDetails->total_tickets = $ticketCountResult;
        $toDayProfitDetails = $profitQuery->whereDate('affiliate_commissions.created_at', today())->select(
            DB::raw('SUM(affiliate_commissions.amount) as total_amount'),
            DB::raw('COUNT(DISTINCT affiliate_commissions.referrer_user_id) as referrer_user'),
        )->first();
        $toDayProfitDetails->total_tickets = $ticketCountResult;

        //revenue details
        $revenueDetails['total_amount'] = $total_balance;
        $revenueDetails['complete_order'] = AffiliateCommission::where('affiliate_user_id', $affiliate_user_id)->whereHas('order', function ($query) {
            $query->where('payment_status', Status::COMPLETED);
        })->count();
        $revenueDetails['pending_order'] = AffiliateCommission::where('affiliate_user_id', $affiliate_user_id)->whereHas('order', function ($query) {
            $query->where('payment_status', Status::PENDING);
        })->count();
        $revenueDetails['refunded_order'] = AffiliateCommission::where('affiliate_user_id', $affiliate_user_id)->whereHas('order', function ($query) {
            $query->where('payment_status', Status::REFUND);
        })->count();
        //        dd('okk');
        //today's users
        $newUserCount = AffiliateCommission::where('affiliate_user_id', $affiliate_user_id)
            ->whereDate('created_at', Carbon::today())->whereDoesntHave('previousCommissions', function ($query) {
                $query->whereColumn('referrer_user_id', 'affiliate_commissions.referrer_user_id')
                    ->whereColumn('affiliate_user_id', 'affiliate_commissions.affiliate_user_id')
                    ->whereDate('created_at', '<', Carbon::today());
            })->distinct('referrer_user_id')->count();

        ///ticket sales analytics

        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();
        $startOfLastWeek = Carbon::now()->subWeek()->startOfWeek();
        $endOfLastWeek = Carbon::now()->subWeek()->endOfWeek();
        $ticketsThisWeek = clone $ticketQuery;
        $ticketsThisWeek = $ticketsThisWeek->whereBetween('affiliate_commissions.created_at', [$startOfWeek, $endOfWeek])->select(DB::raw('COUNT(tickets.id) as total_tickets'))
            ->first()?->total_tickets;
        $ticketsLastWeek = clone $ticketQuery;

        $ticketsLastWeek = $ticketsLastWeek->whereBetween('affiliate_commissions.created_at', [$startOfLastWeek, $endOfLastWeek])->select(DB::raw('COUNT(tickets.id) as total_tickets'))
            ->first()?->total_tickets;

        // Avoid division by zero
        if ($ticketsLastWeek > 0) {
            $percentageChange = (($ticketsThisWeek - $ticketsLastWeek) / $ticketsLastWeek) * 100;
        } else {
            // If no tickets were sold last week, we assume a 100% increase
            $percentageChange = $ticketsThisWeek > 0 ? 100 : 0;
        }

        //sales analytics
        $salesData = $this->getOrderData('last_week', $affiliate_user_id);

        if ($request->ajax()) {
            $salesData = $this->getOrderData($request->slesDateRange, $affiliate_user_id);

            return response()->json([
                'salesData' => $salesData,
            ]);
        }

        return view('affiliate-dashboard.layouts.statistics', compact('profitDetails', 'toDayProfitDetails', 'revenueDetails', 'newUserCount', 'percentageChange', 'salesData'));
    }

    public function getOrderData($range, $affiliate_user_id)
    {
        $query = Order::whereHas('affiliate_commissions', function ($query) use ($affiliate_user_id) {
            $query->where('affiliate_user_id', $affiliate_user_id);
        });
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

    public function getEarningData($range, $affiliate_user_id)
    {
        $query = AffiliateCommission::where('affiliate_user_id', $affiliate_user_id);
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
            $earning = $query->selectRaw('DATE(created_at) as date, SUM(amount) as total')
                ->groupBy('date')
                ->orderBy('date', 'asc')
                ->get();
        } else {
            $earning = $query->get();
        }

        // Format the data for ApexCharts
        return $earning->map(function ($earn) use ($dateFormat) {
            return [
                'x' => Carbon::parse($earn->date)->format($dateFormat),
                'y' => $earn->total,
            ];
        });
    }

    public function withdraw()
    {
        $affiliate_user_id = auth()->user()->load('affiliate')->affiliate->id;
        $ticketQuery = DB::table('tickets')
            ->join('orders', 'tickets.order_id', '=', 'orders.id')
            ->where('orders.payment_status', 'completed')
            ->join('affiliate_commissions', 'affiliate_commissions.order_id', '=', 'orders.id')
            ->where('affiliate_commissions.affiliate_user_id', $affiliate_user_id);
        $ticketCounts = clone $ticketQuery;
        //        $ticketCounts = $
        $ticketCountResult = $ticketCounts->count();
        $profitQuery = AffiliateCommission::query()
            ->join('orders', 'affiliate_commissions.order_id', '=', 'orders.id')
            ->where('orders.payment_status', 'completed')
            ->where('affiliate_commissions.affiliate_user_id', $affiliate_user_id);

        $profitDetails = $profitQuery->select(
            DB::raw('COUNT(DISTINCT affiliate_commissions.referrer_user_id) as referrer_user'),
        )->first();
        $total_balance = AffiliateUser::find($affiliate_user_id)->balance;
        $profitDetails->total_amount = $total_balance;
        $toDayProfitDetails = $profitQuery->whereDate('affiliate_commissions.created_at', today())->select(
            DB::raw('SUM(affiliate_commissions.amount) as total_amount'),
            DB::raw('COUNT(DISTINCT affiliate_commissions.referrer_user_id) as referrer_user'),
        )->first();
        $toDayProfitDetails->total_tickets = $ticketCountResult;
        $toDayProfitDetails = $profitQuery->whereDate('affiliate_commissions.created_at', today())->select(
            DB::raw('SUM(affiliate_commissions.amount) as total_amount'),
            DB::raw('COUNT(DISTINCT affiliate_commissions.referrer_user_id) as referrer_user'),
        )->first();
        $toDayProfitDetails->total_tickets = $ticketCountResult;

        //revenue details
        $revenueDetails['total_amount'] = $total_balance;
        $revenueDetails['complete_order'] = AffiliateCommission::where('affiliate_user_id', $affiliate_user_id)->whereHas('order', function ($query) {
            $query->where('payment_status', Status::COMPLETED);
        })->count();
        $revenueDetails['pending_order'] = AffiliateCommission::where('affiliate_user_id', $affiliate_user_id)->whereHas('order', function ($query) {
            $query->where('payment_status', Status::PENDING);
        })->count();
        $revenueDetails['refunded_order'] = AffiliateCommission::where('affiliate_user_id', $affiliate_user_id)->whereHas('order', function ($query) {
            $query->where('payment_status', Status::REFUND);
        })->count();
        //today's users
        $newUserCount = AffiliateCommission::where('affiliate_user_id', $affiliate_user_id)
            ->whereDate('created_at', Carbon::today())->whereDoesntHave('previousCommissions', function ($query) {
                $query->whereColumn('referrer_user_id', 'affiliate_commissions.referrer_user_id')
                    ->whereColumn('affiliate_user_id', 'affiliate_commissions.affiliate_user_id')
                    ->whereDate('created_at', '<', Carbon::today());
            })->distinct('referrer_user_id')->count();

        $allWithdrawRequest = AffiliateUserWithdrawalRequest::where('affiliate_user_id', $affiliate_user_id)->latest()->paginate(10);

        return view('affiliate-dashboard.layouts.withdraw', compact('profitDetails', 'toDayProfitDetails', 'revenueDetails', 'newUserCount', 'allWithdrawRequest'));
    }
}
