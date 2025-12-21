<?php

namespace Database\Factories;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BrandFactory extends Factory
{
    protected $model = Brand::class;

    public function definition()
    {
        $name = $this->faker->company;

        return [
            'en_brand_name' => $name,
            'prd_count' => $this->faker->numberBetween(0, 1000),
            'slug' => Str::slug($name).'-'.Str::random(5),
            'image' => 'tshirt.png', // or you can use faker image if you want
            'status' => $this->faker->boolean(90), // 90% chance to be active
        ];
    }
}
