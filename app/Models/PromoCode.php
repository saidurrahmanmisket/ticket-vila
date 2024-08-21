<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PromoCode extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'discount_percentage', 'expires_at', 'usage_limit', 'times_used', 'status', 'min_quantity', 'max_quantity'];

    protected $casts = [
        'expires_at' => 'datetime',
    ];
}
