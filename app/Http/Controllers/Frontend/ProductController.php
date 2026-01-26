<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Gallery;
use App\Models\Page;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // READ ALL
    public function index(Request $request)
    {
        $categories = Category::where('status', 1)->get();
        $brands = Brand::where('status', 1)->get();
        $data = Page::where('slug', 'shop')->first();
        $colors = Color::all();
        $sizes = Size::all();

        

        $query = Product::where('status', 1);

        if ($request->has('keywords') && ! empty($request->keywords)) {
            $query->where('en_name', 'LIKE', '%'.$request->keywords.'%');
        }

        // Price range filter
        if ($request->has('min_price') && ! empty($request->min_price)) {
            $query->where('discounted_price', '>=', $request->min_price);
        }
        if ($request->has('max_price') && ! empty($request->max_price)) {
            $query->where('discounted_price', '<=', $request->max_price);
        }
        // if ($request->has('brands') && ! empty($request->brands)) {
        //     $brandsID = explode(',', $request->brands);
        //     $query->whereIn('brand_id', $brandsID);
        // }

        $products = $query->paginate(6);

        return view('front.products.index', compact('categories', 'brands', 'products', 'data', 'colors', 'sizes'));
    }

    public function productDetails($slug)
    {
        $product = Product::with('galleries')->where('slug', $slug)
            ->where('status', 1)
            ->firstOrFail();
        $products = Product::with('sizes')->with('colors')->where('slug', $slug)
            ->where('status', 1)
            ->first();

        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->where('status', 1)
            ->latest()
            ->take(4)
            ->get();

        $productImages = Gallery::where('product_id', $product->id)->get();
        $data = Page::where('slug', 'product-details')->first();

        return view('front.products.details', compact('product', 'relatedProducts', 'productImages', 'data', 'products'));
    }

    public function productsByCategory($slug)
    {
        $categories = Category::where('status', 1)->get();
        $brands = Brand::where('status', 1)->get();
        $colors = Color::all();
        $sizes = Size::all();

        $selectedCat = Category::where('status', 1)->where('slug', $slug)->first();
        $products = Product::where('status', 1)->where('category_id', $selectedCat->id)->paginate(6);

        return view('front.products.bycategory', compact('categories', 'brands', 'products', 'selectedCat', 'colors', 'sizes'));
    }
}
