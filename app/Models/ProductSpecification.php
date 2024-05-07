<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSpecification extends Model
{
    use HasFactory;
    protected $table = 'product_specification';

    protected $fillable = ['specification_id', 'name', 'harga', 'description'];

    public function specification()
    {
        return $this->belongsTo(Specification::class, 'specification_id');
    }
}
