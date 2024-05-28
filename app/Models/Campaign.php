<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;

    protected $fillable = ['name','target_type','thumbnail','limit','end_time','purchase_limit','price','ebook','unique_text','gift_id','status'];
}
