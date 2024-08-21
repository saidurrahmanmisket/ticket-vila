<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AffiliateTrips extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_en',
        'title_de',
        'title_hu',
        'description_en',
        'description_de',
        'description_hu',
        'image',
        'user_id',
        'status',
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
