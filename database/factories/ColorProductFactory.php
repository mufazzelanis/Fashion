<?php

namespace Database\Factories;

use App\Models\Color;
use App\Models\ColorProduct;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ColorProductFactory extends Factory
{
    protected $model = ColorProduct::class;

    public function definition(): array
    {
        return [
            'color_id' => Color::inRandomOrder()->first()?->id ?? Color::factory(),
            'product_id' => Product::inRandomOrder()->first()?->id ?? Product::factory(),
        ];
    }
}
