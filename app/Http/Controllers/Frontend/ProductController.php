<?php 


namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::where('status', 1)->paginate(12);
        return view('front.product.index', compact('products'));
    }

    // public function show($slug)
    // {
    //     $product = Product::where('slug', $slug)->firstOrFail();
    //     return view('front.product.show', compact('product'));
    // }
}
