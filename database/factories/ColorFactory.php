<?php

namespace Database\Factories;

use App\Models\Color;
use Illuminate\Database\Eloquent\Factories\Factory;

class ColorFactory extends Factory
{
    protected $model = Color::class;

    public function definition(): array
    {
        return [
            'color' => $this->faker->safeColorName(), // example: "red", "blue", "green"
            'color_code' => $this->faker->hexColor(), // example: "#FF5733"
            'price' => $this->faker->randomFloat(2, 10, 200), // price between 10-200
            'count' => $this->faker->numberBetween(1, 100), // stock count
        ];
    }
}
