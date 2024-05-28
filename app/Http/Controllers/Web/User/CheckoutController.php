<?php

namespace App\Http\Controllers\Web\User;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use Flasher\Laravel\Http\Request;

class CheckoutController extends Controller
{
    public function index($quantity )
    {
        $ticket = Campaign::latest()->where('status', 'published')->first();
        $ticket->price = 99;
        // $totalPrice = $ticket->price * $quantity;
        $totalPrice = 99 * $quantity;
        return view('user.layouts.checkout',compact('ticket', 'totalPrice', 'quantity'));
    }
}
