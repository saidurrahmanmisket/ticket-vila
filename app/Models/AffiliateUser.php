<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AffiliateUser extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'affiliate_code', 'commission_rate'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function commissions(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(AffiliateCommission::class);
    }

    public function getTotalOrderAmount($affiliateUsers)
    {
        return $affiliateUsers->commissions->reduce(function ($carry, $commission) {
            return $carry + $commission->order->total_price;
        }, 0);
    }
}
