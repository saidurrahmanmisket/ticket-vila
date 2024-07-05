<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;

    protected $fillable = ['name_en', 'name_de', 'name_hu', 'target_type', 'thumbnail', 'limit', 'end_time', 'purchase_limit', 'price', 'ebook', 'unique_text', 'gift_id', 'status'];

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function ebooks(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Ebook::class);
    }
}
