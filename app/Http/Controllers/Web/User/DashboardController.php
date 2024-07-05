<?php

namespace App\Http\Controllers\Web\User;

use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\News;
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
            $campaign = null;
            $userTickets = null;
        }

        $news = News::with('user')->where('status', Status::ACTIVE)->get();

        $data = [
            'campaign' => $campaign,
            'userTickets' => $userTickets,
            'news' => $news,
        ];

        return view('user.layouts.dashboard', compact('data'));
    }

    public function buyTickets()
    {
        $campaign = Campaign::latest()->where('status', 'published')->first();

        return view('user.layouts.buy-tickets', compact('campaign'));
    }
}
