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
            $campaign = Campaign::withCount('tickets')->latest()->where('status', 'published')->first();

            if (! $campaign) {
                return redirect()->back()->with('error', 'No campaign found');
            }

            $ticket = Ticket::where('campaign_id', $campaign->id);
            $quantity = ! empty($request->quantity) && (int) $request->quantity > 0 ? $request->quantity : 1;
            $totalTicketSold = $ticket->count();

            $ticketRemain = $campaign->limit - $totalTicketSold;

            if ($ticketRemain < $quantity) {
                if ($ticketRemain <= 0) {
                    $ticketRemain = '0';
                }
                flash()->addWarning('Only '.$ticketRemain.' Tickets Are Available');

                return redirect()->route('user.buy-tickets');
            }

            $totalPrice = $campaign->price * $quantity;
            if (! $quantity) {
                flash()->addError('Quantity Required');

                return redirect()->back();
            }

            return view('user.layouts.checkout', compact('campaign', 'totalPrice', 'quantity'));
        } catch (\Exception $e) {
            // Handle the exception
            Log::error($e->getMessage());

            return redirect()->back()->with('error', 'Something went wrong ');
        }
    }
}
