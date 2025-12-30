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
        'delivery_duration',
        'meta_title',
        'meta_description',
        'meta_keywords',
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

    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }

    public function colors()
    {
        return $this->belongsToMany(Color::class, 'color_product', 'product_id', 'color_id');
    }
    

    public function sizes()
    {
        return $this->belongsToMany(Size::class, 'size_product', 'product_id', 'size_id');
    }


}
