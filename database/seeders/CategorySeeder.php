<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        // Dummy categories
        // Category::factory()->count(10)->create();
        Category::factory()
            ->count(10)
            ->withProducts(8) // 👈 8 products per category
            ->create();

    }
}
