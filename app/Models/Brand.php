<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $table = 'brand';
    protected $fillable = [
        'product_category_id',
        'name',
        'image',
        'description',
        'is_show'
    ];

    public function productCategory()
    {
        return $this->belongsTo(ProductCategory::class);
    }
}