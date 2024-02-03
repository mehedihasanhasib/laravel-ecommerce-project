<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'price',
        'category'
    ];

    public function productVariant()
    {
        return $this->hasMany(ProductVariant::class, 'product_id');
    }

    public function order()
    {
        return $this->hasMany(Order::class, 'product_id');
    }
}
