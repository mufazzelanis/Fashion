<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Models\Testimonial;
use App\Models\category;

class WelcomeController extends Controller
{
    public function index()
    {
        $categories = Category::where('status', 1)->limit(6)->orderBy('en_category_name', 'ASC')->get();
        $sliders = Slider::where('status', 1)->latest()->get();

        $testimonials = Testimonial::where('status', 1)
            ->latest()
            ->take(6) // homepage e koyta dekhate chai
            ->get();

        return view('welcome', compact('sliders', 'testimonials', 'categories'));
    }
}
