<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Faq;

class FaqSeeder extends Seeder
{
    public function run()
    {
        // 10 dummy FAQs
        Faq::factory()->count(10)->create();
    }
}
