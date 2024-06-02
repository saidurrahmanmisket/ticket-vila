<?php

namespace App\Http\Controllers\Web\User;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CheckoutController extends Controller
{
    public function index(Request $request)
    {
        try {
            $quantity = $request->quantity;
            $campaign = Campaign::withCount('tickets')->latest()->where('status', 'published')->first();
            $ticket = Ticket::where('campaign_id', $campaign->id);
            $totalTicketSold = $ticket->count();

            $ticketRemain = $campaign->limit - $totalTicketSold;

            if ($ticketRemain < $quantity) {
                if ($ticketRemain <= 0) {
                    $ticketRemain = '0';
                }
                flash()->addWarning('Only ' . $ticketRemain . ' Tickets Are Available');
                return redirect()->route('user.buy-tickets');
            }

            $totalPrice = $campaign->price * $quantity;

            if (!$quantity) {
                flash()->addError('Quantity Required');
                return redirect()->back();
            }

            return view('user.layouts.checkout', compact('campaign', 'totalPrice', 'quantity'));
        } catch (\Exception $e) {
            // Handle the exception
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
}
