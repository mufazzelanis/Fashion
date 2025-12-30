<?php

namespace Database\Seeders;

use App\Models\SizeProduct;
use Illuminate\Database\Seeder;

class SizeProductSeeder extends Seeder
{
    public function run(): void
    {
        // Generate 20 pivot entries
        SizeProduct::factory()->count(20)->create();
    }
}
