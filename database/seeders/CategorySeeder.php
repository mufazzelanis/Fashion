<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        // Dummy categories
        Category::factory()->count(10)->create();

        // Optional: Fixed category
        Category::create([
            'en_category_name' => 'Men Fashion',
            'en_short_info'    => 'Trendy fashion for men',
            'slug'             => 'men-fashion',
            'icon'             => 'blezer.png',
            'desc'             => 'All kinds of men fashion items available here.',
            'status'           => 1,
        ]);
    }
}
