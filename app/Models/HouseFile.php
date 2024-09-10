<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class HouseFile extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = ['file_name'];

    protected $guarded = ['id'];

    public function gift()
    {
        return $this->belongsTo(Gift::class);
    }
}
