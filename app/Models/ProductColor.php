<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductColor extends Model
{
    use HasFactory;
    protected $table = 'product_color';
    protected $fillable = ['branch_product_id','color_id','product_id'];

    public function color()
    {
        return $this->belongsTo(Color::class, 'color_id');
    }
}
