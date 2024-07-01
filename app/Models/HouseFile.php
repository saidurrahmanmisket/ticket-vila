<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HouseFile extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function gift()
    {
        return $this->belongsTo(Gift::class);
    }
}
