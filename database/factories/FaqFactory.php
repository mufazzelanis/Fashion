<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Faq>
 */
class FaqFactory extends Factory
{
    protected $model = \App\Models\Faq::class;

    public function definition()
    {
        return [
            'en_question' => $this->faker->sentence(6),
            'en_answer'   => $this->faker->paragraph(3),
        ];
    }
}
