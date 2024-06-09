<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gift extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'video_link_inside', 'video_link_outside','image', 'thumbnail_image','status'];


    public function giftGallary() {
        return $this->hasMany( GiftGallary::class, 'gift_id');
    }

    public function giftFeaturedItem() {
        return $this->hasMany( GiftFeaturedItem::class, 'gift_id');
    }




}
