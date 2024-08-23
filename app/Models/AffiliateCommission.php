<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AffiliateCommission extends Model
{
    use HasFactory;

    protected $fillable = ['amount', 'affiliate_user_id', 'order_id', 'commission_rate', 'referrer_user_id'];

    public function referralUser(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'referrer_user_id');
    }

    public function order(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function previousCommissions(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(AffiliateCommission::class, 'referrer_user_id', 'referrer_user_id');
    }
}
