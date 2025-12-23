<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'en_category_name',
        'en_short_info',
        'slug',
        'icon',
        'desc',
        'status',
    ];

    // Relationship with Product
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
