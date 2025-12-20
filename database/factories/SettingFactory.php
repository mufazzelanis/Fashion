<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SettingFactory extends Factory
{
    public function definition(): array
    {
        return [
            'site_name' => $this->faker->company,
            'logo' => 'logo.png',
            'favicon' => 'favicon.png',
            'address' => $this->faker->address,
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->companyEmail,
            'fb' => 'https://facebook.com',
            'twitter' => 'https://twitter.com',
            'linkedin' => 'https://linkedin.com',
            'instagram' => 'https://instagram.com',
            'copyright' => '© '.date('Y').' All Rights Reserved',
            'map_iframe' => '<iframe src="https://maps.google.com"></iframe>',
            'meta_title' => $this->faker->sentence(5),
            'meta_desc' => $this->faker->sentence(10),
            'meta_keywords' => 'laravel, ecommerce, fashion',
            'og_image' => 'og-image.jpg',
        ];
    }
}
