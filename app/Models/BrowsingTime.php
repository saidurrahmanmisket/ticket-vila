<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrowsingTime extends Model
{
    use HasFactory;

    protected $fillable = ['browsing_time', 'user_id'];
}
