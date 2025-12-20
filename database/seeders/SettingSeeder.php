<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        Setting::truncate(); // only one row needed

        Setting::create([
            'site_name' => 'Fashion',
            'logo' => 'logo.png',
            'favicon' => 'favicon.png',
            'address' => 'Dhaka, Bangladesh',
            'phone' => '+8801518303867',
            'email' => 'mufazzelanis@gmail.com',
            'fb' => 'https://facebook.com/example',
            'twitter' => 'https://twitter.com/example',
            'linkedin' => 'https://linkedin.com/example',
            'instagram' => 'https://instagram.com/example',
            'copyright' => '© '.date('Y').' My Website',
            'map_iframe' => '<iframe src="https://maps.google.com"></iframe>',
            'meta_title' => 'Best Laravel Website',
            'meta_desc' => 'This is a Laravel powered website',
            'meta_keywords' => 'laravel, php, ecommerce',
            'og_image' => 'og-image.jpg',
        ]);
    }
}
