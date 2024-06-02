<?php

namespace App\Http\Controllers\Web\User;

use App\Http\Controllers\Controller;

class TicketController extends Controller
{
    public function index()
    {
        // $campaign = Campaign::latest()->where('status', 'published')->first();

        // return view('user.layouts.tickets', compact('campaign'));
        // dd("odata");
        return view('user.layouts.tickets');
    }

    public function tickets()
    {
        // return $ticket;
    }
}
