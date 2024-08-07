<?php

namespace App\Helpers;

use App\Models\Campaign;
use App\Models\PromoCode;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class Helper
{
    public static function fileUpload($file, $folder, $name)
    {
        if (! $file->isValid()) {
            return null;
        }

        $imageName = Str::slug($name).'.'.$file->extension();
        $path = public_path('uploads/'.$folder);
        if (! file_exists($path)) {
            mkdir($path, 0755, true);
        }
        $file->move($path, $imageName);

        return 'uploads/'.$folder.'/'.$imageName;
    }

    public static function deleteFile($filePath)
    {
        if (File::exists($filePath)) {
            return File::delete($filePath);
        }

        return false;
    }

    // Make Slug
    public static function makeSlug($model, string $title): string
    {
        $slug = Str::slug($title);
        while ($model::where('slug', $slug)->exists()) {
            $randomString = Str::random(5);
            $slug = Str::slug($title).'-'.$randomString;
        }

        return $slug;
    }

    public static function isValidPromoCode(PromoCode $promoCode, Campaign $campaign): bool
    {
        if (! empty($campaign->discount_percent) && Carbon::parse($campaign->discount_expire_date)->greaterThan(now())) {
            $campaign_price = calculateDiscount($campaign->price, $campaign->discount_percent);
        } else {
            $campaign_price = $campaign->price;
        }

        $discount_price = calculateDiscount($campaign_price, $promoCode->discount_percentage);
        if (! $promoCode->expires_at->greaterThan(now()) || ($promoCode->usage_limit < $promoCode->times_used) || $discount_price < 0) {
            return false;
        } else {
            return true;
        }
    }

    public static function promoCodeDiscountPrice(PromoCode $promoCode, Campaign $campaign)
    {
        if (! empty($campaign->discount_percent) && Carbon::parse($campaign->discount_expire_date)->greaterThan(now())) {
            $campaign_price = calculateDiscount($campaign->price, $campaign->discount_percent);
        } else {
            $campaign_price = $campaign->price;
        }

        $discount_price = calculateDiscount($campaign_price, $promoCode->discount_percentage);
        if (! $promoCode->expires_at->greaterThan(now()) || ($promoCode->usage_limit < $promoCode->times_used) || $discount_price < 0) {
            return $campaign_price;
        } else {
            return $discount_price;
        }
    }
}
