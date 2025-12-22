<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Page;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Http\Controllers\Controller;

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
        $product = Product::where('slug', $slug)->first();
        return view('front.products.details', compact('product'));
    }

    // // READ SINGLE
    // public function show(Product $product)
    // {
    //     return $product;
    // }

    // // CREATE
    // public function store(Request $request)
    // {
    //     return Product::create([
    //         'name' => $request->name,
    //         'slug' => Str::slug($request->name),
    //         'price' => $request->price,
    //         'stock' => $request->stock,
    //         'description' => $request->description,
    //         'status' => 1,
    //     ]);
    // }

    // // UPDATE
    // public function update(Request $request, Product $product)
    // {
    //     $product->update($request->all());
    //     return $product;
    // }

    // // DELETE
    // public function destroy(Product $product)
    // {
    //     $product->delete();
    //     return response()->json(['message'=>'Product deleted']);
    // }
}
