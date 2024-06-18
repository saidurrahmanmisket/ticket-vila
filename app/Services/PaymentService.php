<?php

namespace App\Services;

use App\Models\Order;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;

class PaymentService
{
    public function orderCreate($orderInfo)
    {
        return Order::create([
            'user_id' => $orderInfo['user_id'],
            'transaction_id' => $orderInfo['transaction_id'],
            'quantity' => $orderInfo['quantity'],
            'discount_quantity' => $orderInfo['discount_quantity'],
            'total_price' => $orderInfo['total_price'],
            'payment_method' => $orderInfo['payment_method'],
            'campaign_id' => $orderInfo['campaign_id'],
            'payment_status' => $orderInfo['payment_status'],
        ]);
    }

    public function ticketCreate($order_id, $quantity, $campaign_id, $discount_quantity, $prefix): array
    {
        $lastTicket = Ticket::where('campaign_id', $campaign_id)->latest()->first();
        $last_sequence = $lastTicket ? $lastTicket->ticket_number : $prefix.'-000000';
        $ticketNumbers = [];

        for ($i = 0; $i < $quantity + $discount_quantity; $i++) {
            $newTicketNumber = unique_ticket_number($prefix, $last_sequence);
            Ticket::create([
                'ticket_number' => $newTicketNumber,
                'user_id' => Auth::user()->id,
                'order_id' => $order_id,
                'campaign_id' => $campaign_id,
            ]);

            $last_sequence = $newTicketNumber; // Update last sequence for next iteration
            $ticketNumbers[] = $newTicketNumber;
        }

        return $ticketNumbers;
    }
}
