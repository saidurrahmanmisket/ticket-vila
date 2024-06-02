<?php

namespace App\Http\Controllers\Web\User;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\Order;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
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

            $userOrder = Order::with('campaign:id,name,thumbnail,price,ebook')->where('campaign_id', $campaign->id)
                ->where('user_id', $user->id)
                ->where('payment_status', 'completed')
                ->get();

            // return $userOrder;
            $data = [
                'campaign' => $campaign,
                'userTickets' => $userTickets,
                'userOrder' => $userOrder,
            ];

            return view('user.layouts.tickets', compact('data'));
        } else {
            $data = [
                'campaign' => null,
                'userTickets' => null,
                'userOrder' => null,
            ];

            return view('user.layouts.tickets', compact('data'));
        }
    }

    public function tickets()
    {
        // return $ticket;
    }
}
