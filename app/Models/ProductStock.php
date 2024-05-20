<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductStock extends Model
{
    use HasFactory;
    protected $table = 'product_stock';

    protected $fillable = [
        'branch_id',
        'branch_product_id',
        'product_specification_id',
        'product_color_id',
        'product_size_id',
        'product_id',
        'stock'
    ];

    public function productSpecification()
    {
        return $this->belongsTo(ProductSpecification::class);
    }

    public function productColor()
    {
        return $this->belongsTo(ProductColor::class);
    }

    public function productSize()
    {
        return $this->belongsTo(ProductSize::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
