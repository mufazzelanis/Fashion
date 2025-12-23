<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Gallery;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        $price = $this->faker->randomFloat(2, 100, 5000);
        $discount = $this->faker->boolean(60)
            ? $this->faker->randomFloat(2, 50, 500)
            : null;

        return [
            'category_id' => Category::factory(),
            'brand_id' => Brand::factory(),

            'en_name' => $this->faker->words(3, true),
            'slug' => Str::slug($this->faker->unique()->words(3, true)),

            'en_desc' => $this->faker->paragraph,
            'en_shipping' => $this->faker->sentence,
            'en_additionalinfo' => $this->faker->sentence,

            'thumb' => 'tshirt.png',

            'is_featured' => $this->faker->boolean(),
            'is_best_selling' => $this->faker->boolean(),
            'is_new_arrival' => $this->faker->boolean(),
            'is_onsale' => $discount !== null,

            'price' => $price,
            'discount' => $discount,
            'discounted_price' => $discount
                ? max($price - $discount, 1)
                : $price,

            'quantity' => $this->faker->numberBetween(0, 200),
            'delivery_duration' => '3-5 days',

            'meta_title' => $this->faker->sentence,
            'meta_description' => $this->faker->sentence,
            'meta_keywords' => implode(',', $this->faker->words(5)),

            'status' => true,
        ];
    }

    /**
     * Create galleries automatically after product creation
     */
    public function configure()
    {
        return $this->afterCreating(function (Product $product) {

            $user = User::first() ?? User::factory()->create();

            $product->galleries()->createMany(
                Gallery::factory()
                    ->count(4)
                    ->make([
                        'user_id' => $user->id,
                    ])
                    ->toArray()
            );
        });
    }
}
