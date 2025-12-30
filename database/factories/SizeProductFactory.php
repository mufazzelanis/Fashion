<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Size;
use App\Models\SizeProduct;
use Illuminate\Database\Eloquent\Factories\Factory;

class SizeProductFactory extends Factory
{
    protected $model = SizeProduct::class;

    public function definition(): array
    {
        return [
            'size_id' => Size::inRandomOrder()->first(),
            'product_id' => Product::inRandomOrder()->first()?->id ?? Product::factory(),
        ];
    }
}
