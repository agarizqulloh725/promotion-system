<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product';

    protected $fillable = [
        'name', 'slug', 'description', 'price', 
        'link_video', 'link_tokopedia', 
        'is_show', 'is_popular','brand', 'year', 'brand_id'
    ];

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
    public function promo()
    {
        return $this->hasOne(ProductPromo::class);
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
