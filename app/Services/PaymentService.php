<?php

namespace App\Services;

use App\Models\Order;
use App\Models\Ticket;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class PaymentService
{
    public function orderCreate($orderInfo)
    {

        if (Carbon::parse($orderInfo['discount_expire_date'])->greaterThan(now())) {
            $discount_totalPrice = calculateDiscount($orderInfo['total_price'] ?? 0, $orderInfo['discount_percent'] ?? 0);
        } else {
            $discount_totalPrice = $orderInfo['total_price'];
        }

        return Order::create([
            'user_id' => $orderInfo['user_id'],
            'transaction_id' => $orderInfo['transaction_id'],
            'quantity' => $orderInfo['quantity'],
            'discount_quantity' => $orderInfo['discount_quantity'],
            'discount_percent' => $orderInfo['discount_percent'],
            'total_price' => $discount_totalPrice,
            'payment_method' => $orderInfo['payment_method'],
            'campaign_id' => $orderInfo['campaign_id'],
            'payment_status' => $orderInfo['payment_status'],
            'invoice_no' => $orderInfo['invoice_no'] ?? null,
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
                'payment_status' => $i < $quantity ? 'paid' : 'free',
            ]);

            $last_sequence = $newTicketNumber; // Update last sequence for next iteration
            $ticketNumbers[] = $newTicketNumber;
        }

        return $ticketNumbers;
    }
}
