<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AffiliateFile extends Model
{
    use HasFactory;

    protected $fillable = ['file', 'status', 'icon', 'file_type', 'title_en', 'title_de', 'title_hu'];
}
