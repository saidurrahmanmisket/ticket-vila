<?php

namespace App\Http\Controllers\Web\Frontend;

use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\PromoCode;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PromoCodeController extends Controller
{
    public function applyPromoCode(Request $request)
    {
        $request->validate([
            'code' => 'required|max:255',
        ]);

        $promoCode = PromoCode::where('code', $request->code)->first();
        $campaign = Campaign::where('status', Status::PUBLISHED)->first();

        if (empty($campaign)) {
            return response()->json([
                'success' => 'false',
                'message' => 'Not running any campaign.',
            ], 422);
        }

        if (! $promoCode) {
            return response()->json([
                'success' => 'false',
                'message' => 'Invalid promo code.',
            ], 422);
        }

        if (! $promoCode->expires_at->greaterThan(now())) {
            return response()->json([
                'success' => 'false',
                'message' => 'Promo code has expired.',
            ], 422);
        }

        if ($promoCode->usage_limit < $promoCode->times_used) {
            return response()->json([
                'success' => 'false',
                'message' => 'Promo code usage limit reached.',
            ], 422);
        }

        if (! empty($campaign->discount_percent) && Carbon::parse($campaign->discount_expire_date)->greaterThan(now())) {
            $campaign_price = calculateDiscount($campaign->price, $campaign->discount_percent);
        } else {
            $campaign_price = $campaign->price;
        }

        $discount_price = calculateDiscount($campaign_price, $promoCode->discount_percentage);

        if ($discount_price < 0) {
            return response()->json([
                'success' => 'false',
                'message' => 'Something went wrong.',
            ], 422);
        }

        return response()->json([
            'success' => 'true',
            'message' => 'Promo code applied successfully.',
            'data' => [
                'code' => $promoCode->code,
                'value' => round($campaign_price - $discount_price, 2),
                'percent' => $promoCode->discount_percentage,
            ],
        ]);

    }
}
