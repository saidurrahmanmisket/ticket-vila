<?php

namespace App\Http\Controllers\Web\User;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $campaign = Campaign::withCount('tickets')->latest()->where('status', 'published')->first();
        if ($campaign) {

            // all tickets
            $userTickets = Ticket::where('campaign_id', $campaign->id)
                ->where('user_id', '=', $user->id)
                ->get();

            $data = [
                'campaign' => $campaign,
                'userTickets' => $userTickets,
            ];

            return view('user.layouts.dashboard', compact('data'));

        } else {
            $data = [
                'campaign' => null,
                'userTickets' => null,
            ];

            return view('user.layouts.dashboard', compact('data'));
        }
    }

    public function buyTickets()
    {
        $campaign = Campaign::latest()->where('status', 'published')->first();

        return view('user.layouts.buy-tickets', compact('campaign'));
    }
}
