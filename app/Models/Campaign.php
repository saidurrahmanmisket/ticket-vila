<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Campaign extends Model
{
    use HasFactory,HasTranslations;

    public $translatable = ['name', 'promotion_banner', 'mobile_promotion_banner'];

    protected $fillable = ['name', 'target_type', 'thumbnail', 'how_many_buy', 'how_many_free', 'discount_percent', 'discount_expire_date', 'promotion_banner', 'mobile_promotion_banner', 'limit', 'end_time', 'purchase_limit', 'price', 'ebook', 'unique_text', 'gift_id', 'status'];

    protected $casts = [
        'discount_expire_date' => 'datetime',
    ];

    public function tickets(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Ticket::class);
    }

    public function ebooks(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Ebook::class);
    }
}
