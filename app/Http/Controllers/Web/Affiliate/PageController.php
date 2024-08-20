<?php

namespace App\Http\Controllers\Web\Affiliate;

use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Models\AffiliateCommission;
use App\Models\AffiliateFile;
use DB;

class PageController extends Controller
{
    public function index()
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
            DB::raw('SUM(affiliate_commissions.amount) as total_amount'),
            DB::raw('COUNT(DISTINCT affiliate_commissions.referrer_user_id) as referrer_user'),
        )->first();
        $toDayProfitDetails = $profitQuery->whereDate('affiliate_commissions.created_at', today())->select(
            DB::raw('SUM(affiliate_commissions.amount) as total_amount'),
            DB::raw('COUNT(DISTINCT affiliate_commissions.referrer_user_id) as referrer_user'),
        )->first();
        $toDayProfitDetails->total_tickets = $ticketCounts->total_tickets;

        $rankQuery = DB::table(DB::raw('(SELECT users.id as user_id, users.first_name, users.last_name, COALESCE(SUM(affiliate_commissions.amount), 0) as total_commission, RANK() OVER (ORDER BY COALESCE(SUM(affiliate_commissions.amount), 0) DESC) as user_rank
                     FROM affiliate_users
                     LEFT JOIN users ON users.id = affiliate_users.user_id
                     LEFT JOIN affiliate_commissions ON affiliate_users.id = affiliate_commissions.affiliate_user_id
                     GROUP BY users.id, users.first_name, users.last_name) as ranked_users'));
        $rank = clone $rankQuery;
        $rank = $rank->where('user_id', auth()->id())->first();
        $rankList = clone $rankQuery->take(10)->get();

        return view('affiliate-dashboard.layouts.dashboard', compact('userWithTotalCommissions', 'profitDetails', 'toDayProfitDetails', 'rank', 'rankList'));
    }

    public function promotion()
    {
        $toolkits = AffiliateFile::where('status', Status::ACTIVE)->get();

        return view('affiliate-dashboard.layouts.promotion', compact('toolkits'));
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
            DB::raw('SUM(affiliate_commissions.amount) as total_amount'),
            DB::raw('COUNT(DISTINCT affiliate_commissions.referrer_user_id) as referrer_user'),
        )->first();
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

    public function statistics()
    {
        return view('affiliate-dashboard.layouts.statistics');
    }
}
