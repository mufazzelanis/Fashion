<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\Page;
use App\Models\Product;

class ProductController extends Controller
{
    // READ ALL
    public function index()
    {
        $categories = Category::where('status', 1)->get();
        $brands = Brand::where('status', 1)->get();
        $products = Product::where('status', 1)->paginate(6);
        $data = Page::where('slug', 'shop')->first();

        return view('front.products.index', compact('categories', 'brands', 'products', 'data'));
    }

    public function productDetails($slug)
    {
        $product = Product::with('galleries')->where('slug', $slug)
            ->where('status', 1)
            ->firstOrFail();

         $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->where('status', 1)
            ->latest()
            ->take(4)
            ->get();

        $productImages = Gallery::where('product_id', $product->id)->get();
        $data = Page::where('slug', 'product-details')->first();

        return view('front.products.details', compact('product', 'relatedProducts', 'productImages', 'data'));
    }
}
