<?php

namespace Database\Factories;

use App\Models\Gallery;
use Illuminate\Database\Eloquent\Factories\Factory;

class GalleryFactory extends Factory
{
    protected $model = Gallery::class;

    public function definition()
    {
        return [
            'img' => 'tshirt.png',
        ];
    }

    /**
     * Configure the factory to create galleries after a product is created.
     */
    public function configure()
    {
        return $this->afterCreating(function ($product) {
            // Create between 2 to 5 gallery images for each product
            Gallery::factory()->count(rand(2, 5))->create([
                'product_id' => $product->id,
                'user_id' => $product->user_id, // Assuming the product has a user_id field
            ]);
        });
    }
}
