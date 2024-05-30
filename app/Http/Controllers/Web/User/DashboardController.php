<?php

namespace App\Http\Controllers\Web\User;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $campaign = Campaign::withCount('tickets')->latest()->where('status', 'published')->first();

        //for live statistics
        $totalTicketSold = $campaign->tickets_count;
        $campaign->limit = $campaign->limit ?? 0;
        $soldPercentage = ($totalTicketSold / $campaign->limit) * 100;
        $soldPercentage = $soldPercentage ?? 0;

        // all tickets
        $tickets = Ticket::with('user', 'order');

        //how many person buy tickets
        $totalUserPurchasing = $tickets->where('campaign_id', $campaign->id)
            ->distinct('user_id')
            ->count('user_id');

        // user running campaign ticket
        $userTickets = $tickets->where('campaign_id', $campaign->id)
            ->where('user_id', '=', $user->id)
            ->get();

        // cool facts statistics
        $userWiningChance = floor(($userTickets->count() ?? 0 / $totalTicketSold) * 100);

        // logic for user rank
        $ticketCounts = DB::table('tickets')
            ->select('user_id', DB::raw('COUNT(*) as ticket_count'))
            ->where('campaign_id', $campaign->id)
            ->groupBy('user_id')
            ->orderBy('ticket_count', 'desc')
            ->get();
        $ticketCountsArray = $ticketCounts->toArray();
        $userCurrentRank = null;

        // Iterate through the array to find the current user's rank
        foreach ($ticketCountsArray as $index => $record) {
            if ($record->user_id == $user->id) {
                $userCurrentRank = $index + 1; // Rank is index + 1 (since ranks start from 1)
                break;
            }
        }

        $data = [
            'campaign' => $campaign,
            'totalTicketSold' => $totalTicketSold,
            'soldPercentage' => $soldPercentage,
            'userTickets' => $userTickets,
            'userWiningChance' => $userWiningChance,
            'userCurrentRank' => $userCurrentRank,
            'totalUserPurchasing' => $totalUserPurchasing,
        ];

        return view('user.layouts.dashboard', compact('data'));
    }

}
