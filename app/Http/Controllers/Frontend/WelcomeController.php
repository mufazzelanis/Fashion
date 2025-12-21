<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\Product;
use App\Models\Slider;
use App\Models\Testimonial;

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
        $products = Product::where('status', 1)->latest()->take(4)->get();

        $data['featured'] = Product::where(['status', 1], ['is_featured', 1])->latest()->take(4)->get();
        $data['onsale'] = Product::where(['status', 1], ['is_onsale', 1])->latest()->take(4)->get();
        $data['bestselling'] = Product::where(['status', 1], ['is_best_selling', 1])->latest()->take(4)->get();
        $data['newarrival'] = Product::where(['status', 1], ['is_new_arrival', 1])->latest()->take(4)->get();

        return view('welcome', compact('sliders', 'testimonials', 'categories', 'products', 'data'));
    }
}
