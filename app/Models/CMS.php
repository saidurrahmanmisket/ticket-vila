<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class CMS extends Model
{
    use HasFactory,HasTranslations;

    protected $guarded = ['id'];

    public $translatable = ['title', 'sub_title', 'description', 'links'];
}
