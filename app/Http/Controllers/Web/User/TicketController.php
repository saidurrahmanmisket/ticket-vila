<?php

namespace App\Http\Controllers\Web\User;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $campaign = Campaign::withCount('tickets')->latest()->where('status', 'published')->first();
        if ($campaign) {

            //for live statistics
            $totalTicketSold = $campaign->tickets_count ?? 0;

            // all tickets
            $tickets = Ticket::with('user', 'order');

            // user running campaign ticket
            $userTickets = $tickets->where('campaign_id', $campaign->id)
                ->where('user_id', '=', $user->id)
                ->get();
            // dd($userTickets);

            $data = [
                'campaign' => $campaign,
                'userTickets' => $userTickets,
            ];

            return view('user.layouts.tickets', compact('data'));
        } else {
            $data = [
                'campaign' => null,
                'userTickets' => null,
            ];

            return view('user.layouts.tickets', compact('data'));
        }
    }

    public function tickets()
    {
        // return $ticket;
    }
}
