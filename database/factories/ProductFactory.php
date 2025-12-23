<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    protected $model = \App\Models\Product::class;

    public function definition()
    {
        $name = $this->faker->words(3, true);
        $price = $this->faker->randomFloat(2, 10, 500);

        // 50% chance of discount
        $discount = $this->faker->boolean(50) ? $this->faker->randomFloat(2, 1, 50) : 0;

        $discountedPrice = round($price - $discount);

        return [
            'category_id' => Category::inRandomOrder()->first()?->id ?? 1,
            'brand_id' => Brand::inRandomOrder()->first()?->id ?? 1,
            'en_name' => $name,
            'slug' => Str::slug($name).'-'.Str::random(5),
            'en_desc' => $this->faker->paragraph(),
            'en_shipping' => $this->faker->sentence(),
            'en_additionalinfo' => $this->faker->sentence(),
            'thumb' => 'tshirt.png',
            'is_featured' => $this->faker->boolean(),
            'is_best_selling' => $this->faker->boolean(),
            'is_new_arrival' => $this->faker->boolean(),
            'is_onsale' => $this->faker->boolean(),
            'price' => $price,
            'discount' => $discount,
            'discounted_price' => $discountedPrice,
            'quantity' => $this->faker->numberBetween(0, 100),
            'delivery_duration' => $this->faker->randomElement(['1-2 Days', '2-3 Days', '3-5 Days']),
            'meta_title' => $this->faker->sentence(6),
            'meta_description' => $this->faker->sentence(15),
            'meta_keywords' => implode(',', $this->faker->words(5)),
            'status' => $this->faker->boolean(100),
        ];
    }
}
