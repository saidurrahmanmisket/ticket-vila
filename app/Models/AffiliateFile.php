<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class AffiliateFile extends Model
{
    use HasFactory,HasTranslations;

    public $translatable = ['title'];

    protected $fillable = ['file', 'title_en', 'title_hu', 'title_de', 'status', 'icon', 'file_type', 'title'];
}
