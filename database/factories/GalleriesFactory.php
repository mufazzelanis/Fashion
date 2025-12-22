<?php

namespace Database\Factories;

use App\Models\Galleries;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class GalleriesFactory extends Factory
{
    protected $model = Galleries::class;

    public function definition()
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'product_id' => Product::inRandomOrder()->first()->id,
            'img' => 'tshirt.png',
        ];
    }
}
