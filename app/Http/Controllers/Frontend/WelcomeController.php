<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Models\Testimonial;

class WelcomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::where('status', 1)->latest()->get();

        $testimonials = Testimonial::where('status', 1)
            ->latest()
            ->take(6) // homepage e koyta dekhate chai
            ->get();

        return view('welcome', compact('sliders', 'testimonials'));
    }
}
