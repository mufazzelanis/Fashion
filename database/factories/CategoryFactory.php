<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoryFactory extends Factory
{
    protected $model = Category::class;

    public function definition(): array
    {
        $name = $this->faker->unique()->words(2, true);

        return [
            'en_category_name' => ucfirst($name),
            'en_short_info' => $this->faker->sentence(6),
            'prd_count' => $this->faker->numberBetween(0, 1000),
            'slug' => Str::slug($name),
            'icon' => 'blezer.png',
            'desc' => $this->faker->paragraph(),
            'status' => $this->faker->boolean(90), // mostly active
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

    public function withProducts($count = 5)
    {
        return $this->has(
            Product::factory()->count($count),
            'products'
        );
    }
}
