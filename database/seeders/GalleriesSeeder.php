<?php

namespace Database\Seeders;

use App\Models\Galleries;
use Illuminate\Database\Seeder;

class GalleriesSeeder extends Seeder
{
    public function run()
    {
        Galleries::factory()->count(20)->create();
    }
}
