<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductPromo extends Model
{
    use HasFactory;

    protected $table = 'product_promo';
    protected $fillable = ['product_id', 'name', 'discount', 'cashback', 'bonus', 'promo_front', 'promo_start','promo_end'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
