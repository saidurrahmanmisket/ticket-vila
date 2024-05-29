<?php

namespace App\Http\Controllers\Web\User;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CheckoutController extends Controller
{
    public function index(Request $request)
    {
        try {
            $quantity = $request->quantity;
            $ticket = Campaign::withCount('tickets')->latest()->where('status', 'published')->first();
            $totalPrice = $ticket->price * $quantity;

            if (!$quantity) {
                flash()->addError('Quantity Required');
                return redirect()->back();
            }
            if ($ticket->limit < $ticket->tickets_count) {
                flash()->addWarning('Ticket limit exceeded');
                return redirect()->route('user.tickets');
            }

            return view('user.layouts.checkout', compact('ticket', 'totalPrice', 'quantity'));
        } catch (\Exception $e) {
            // Handle the exception
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
}
