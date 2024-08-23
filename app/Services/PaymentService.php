<?php

namespace App\Services;

use App\Models\AffiliateCommission;
use App\Models\AffiliateUser;
use App\Models\Order;
use App\Models\PromoCode;
use App\Models\Ticket;

class PaymentService
{
    public function orderCreate($orderInfo)
    {

        $totalAmount = $orderInfo['campaign']->price * $orderInfo['quantity'];
        $discountAmount = ! empty($orderInfo['campaign']->discount_percent) && $orderInfo['campaign']->discount_expire_date->greaterThan(now()) ? calculateDiscount($totalAmount, $orderInfo['campaign']->discount_percent) : $totalAmount;
        if (! empty($orderInfo['promo_code_id'])) {
            $promoCode = PromoCode::findOrFail($orderInfo['promo_code_id']);
            if (! empty($promoCode)) {
                $code = $promoCode->code;
                $promo_discount_percent = $promoCode->discount_percentage;
                $promo_discount_amount = calculateDiscount($discountAmount, $promoCode->discount_percentage);
                $promoCode->increment('times_used');
            } else {
                $code = null;
                $promo_discount_percent = null;
                $promo_discount_amount = $discountAmount;
            }
        } else {
            $code = null;
            $promo_discount_percent = null;
            $promo_discount_amount = $discountAmount;
        }

        return Order::create([
            'user_id' => $orderInfo['user_id'],
            'transaction_id' => $orderInfo['transaction_id'],
            'quantity' => $orderInfo['quantity'],
            'discount_quantity' => $orderInfo['discount_quantity'],
            'discount_percent' => $orderInfo['discount_percent'] ?? 0,
            'discount_amount' => $totalAmount - $discountAmount,
            'promo_discount_percent' => $promo_discount_percent,
            'promo_discount_amount' => $discountAmount - $promo_discount_amount,
            'total_price' => $promo_discount_amount,
            'promo_discount_code' => $code,
            'payment_method' => $orderInfo['payment_method'],
            'campaign_id' => $orderInfo['campaign']->id,
            'payment_status' => $orderInfo['payment_status'],
            'invoice_no' => $orderInfo['invoice_no'] ?? null,
        ]);
    }

    public function ticketCreate($order_id, $user_id, $quantity, $campaign_id, $discount_quantity, $prefix): array
    {
        $lastTicket = Ticket::where('campaign_id', $campaign_id)->latest()->first();
        $last_sequence = $lastTicket ? $lastTicket->ticket_number : $prefix.'-000000';
        $ticketNumbers = [];

        for ($i = 0; $i < $quantity + $discount_quantity; $i++) {
            $newTicketNumber = unique_ticket_number($prefix, $last_sequence);
            Ticket::create([
                'ticket_number' => $newTicketNumber,
                'user_id' => $user_id,
                'order_id' => $order_id,
                'campaign_id' => $campaign_id,
                'payment_status' => $i < $quantity ? 'paid' : 'free',
            ]);

            $last_sequence = $newTicketNumber; // Update last sequence for next iteration
            $ticketNumbers[] = $newTicketNumber;
        }

        return $ticketNumbers;
    }

    public function AffiliateCommission($referrerId, Order $order, $current_user_id): void
    {
        $affiliateUser = AffiliateUser::find($referrerId);

        if ($affiliateUser && $affiliateUser->user_id != $current_user_id) {
            // Get the affiliate's custom commission rate
            $commissionRate = $affiliateUser->commission_rate;

            // Calculate the commission
            $commission = $order->total_price * ($commissionRate / 100);

            $affiliateUser->balance += $commission;
            $affiliateUser->save();
            // Save the commission in the database
            AffiliateCommission::create([
                'affiliate_user_id' => $affiliateUser->id,
                'order_id' => $order->id,
                'referrer_user_id' => $current_user_id,
                'commission_rate' => $commissionRate,
                'amount' => $commission,
            ]);
        }
    }
}
