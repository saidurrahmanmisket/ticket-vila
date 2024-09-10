<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class KeyFeature extends Model
{
    use HasFactory,HasTranslations;

    protected $guarded = ['id'];

    public $translatable = ['title'];

    public function gift()
    {
        return $this->belongsTo(Gift::class);
    }
}
