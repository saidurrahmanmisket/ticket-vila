<?php

namespace App\Services;

class PromoCodeService
{
    public function validatePromoCode($promoCode, $quantity): true|\Illuminate\Http\RedirectResponse
    {
        if (empty($promoCode->min_quantity) || empty($promoCode->max_quantity)) {
            flash()->addError('Invalid Promo Code');

            return redirect()->back()->withInput();
        }

        if ($promoCode->max_quantity == $promoCode->min_quantity && $promoCode->max_quantity != $quantity) {
            flash()->addError('For using promo code. The quantity must be '.$promoCode->max_quantity.'.');

            return redirect()->back()->withInput();
        }

        if ($quantity < $promoCode->min_quantity || $quantity > $promoCode->max_quantity) {
            flash()->addError('For using promo code. The quantity must be between '.$promoCode->min_quantity.' and '.$promoCode->max_quantity.'.');

            return redirect()->back()->withInput();
        }

        return true;
    }
}
