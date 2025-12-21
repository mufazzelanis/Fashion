<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'brand_id',
        'en_name',
        'slug',
        'en_desc',
        'en_shipping',
        'en_additionalinfo',
        'is_featured',
        'is_best_selling',
        'is_new_arrival',
        'is_onsale',
        'price',
        'discount',
        'discounted_price',
        'quantity',
        'status',
    ];

    // Relationship with Brand
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    // Relationship with Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
