<?php

namespace Database\Seeders;

use App\Models\ColorProduct;
use Illuminate\Database\Seeder;

class ColorProductSeeder extends Seeder
{
    public function run(): void
    {
        // Create 20 random pivot entries
        ColorProduct::factory()->count(20)->create();
    }
}
