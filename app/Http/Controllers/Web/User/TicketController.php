<?php

namespace App\Http\Controllers\Web\User;

use App\Http\Controllers\Controller;
use App\Models\Campaign;

class TicketController extends Controller
{
    public function index()
    {
        $campaign = Campaign::latest()->where('status', 'published')->first();

        return view('user.layouts.tickets', compact('campaign'));
    }

    public function tickets()
    {
        // return $ticket;
    }
}
