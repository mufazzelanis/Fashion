<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    // READ ALL
    public function index()
    {
        // $product = Product::all();

        return view('front.products.index');

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
