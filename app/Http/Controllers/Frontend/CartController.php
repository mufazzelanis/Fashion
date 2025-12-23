<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GrahamCampbell\ResultType\Success;

class CartController extends Controller
{
    // READ
    public function index()
    {
        // return Cart::where('user_id', auth()->id())->get();
        return view('front.cart.index');
    }


    public function addToCart(Request $request)
    {
        $product = Product::findOrFail($request->product_id);
        $quantity = $request->input('quantity', 1);

        //session()->forget('cart');

        $product = Product::find($request->product_id);

        if (!$product) {
            return response()->json([
                'status' => 'success',
                'message' => 'Product not found.'
            ], 404);
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity']+= $quantity;
        } else {
            $cart[$product->id] = [
                'name'  => $product->en_name,
                'regularPrice'  => $product->price,
                'discountedPrice'  => $product->discounted_price,
                'image' => $product->thumb,
                'quantity'   => $quantity
            ];
        }

        session()->put('cart', $cart);

        $cartCount = collect($cart)->sum('quantity');
        $totalprice = collect($cart)->sum(fn($item) => $item['discountedPrice'] * $item['quantity']);

        return response()->json([
            'status'     => 'success',
            'message'     => 'Product added to cart successfully!',
            'cart_count'  => $cartCount,
            'total_price' => number_format($totalprice, 2),
        ]);
    }
}
