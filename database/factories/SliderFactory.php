<?php

namespace Database\Factories;

use App\Models\Slider;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Slider>
 */
class SliderFactory extends Factory
{
    protected $model = Slider::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),
            'subtitle' => $this->faker->sentence(5),
            'desc' => $this->faker->paragraph(),
            'image' => 'slider' . $this->faker->numberBetween(1, 5) . '.jpg', // example images
            'link' => $this->faker->url(),
            'status' => $this->faker->boolean(80), // 80% chance active
        ];
    }
}
