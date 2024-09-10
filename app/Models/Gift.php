<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Gift extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = [];

    protected $guarded = ['id'];

    public function giftGallary()
    {
        return $this->hasMany(GiftGallary::class, 'gift_id');
    }

    public function giftFeaturedItem()
    {
        return $this->hasMany(GiftFeaturedItem::class, 'gift_id');
    }

    public function keyFeatures()
    {
        return $this->hasMany(KeyFeature::class);
    }
}
