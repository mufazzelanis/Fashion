<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;

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

        // session()->forget('cart');

        $product = Product::find($request->product_id);

        if (! $product) {
            return response()->json([
                'status' => 'success',
                'message' => 'Product not found.',
            ], 404);
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] += $quantity;
        } else {
            $cart[$product->id] = [
                'name' => $product->en_name,
                'regularPrice' => $product->price,
                'discountedPrice' => $product->discounted_price,
                'image' => $product->thumb,
                'quantity' => $quantity,
                'color' => $color ?? "Any Color",
                'size' => $size ?? "Any Size",
            ];
        }

        session()->put('cart', $cart);

        $cartCount = collect($cart)->sum('quantity');
        $totalprice = collect($cart)->sum(fn ($item) => $item['discountedPrice'] * $item['quantity']);

        return response()->json([
            'status' => 'success',
            'message' => 'Product added to cart successfully!',
            'cart_count' => $cartCount,
            'total_price' => number_format($totalprice, 2),
        ]);
    }

    public function removeCart(Request $request)
    {
        // Retrieve cart from session
        $cart = session()->get('cart', []);

        // Get product ID from form input
        $product_id = $request->input('product_id');

        // Remove the product from the cart
        if (isset($cart[$product_id])) {
            unset($cart[$product_id]);
            session()->put('cart', $cart);
        }

        // Redirect back with success message
        return redirect()->back()->with('success', 'Product removed from cart!');
    }

    public function increaseQuantity(Request $request)
    {
        $cart = session()->get('cart', []);
        $product_id = $request->input('product_id');

        if (isset($cart[$product_id])) {
            $cart[$product_id]['quantity']++;
            session()->put('cart', $cart);

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false]);
    }

    // Decrease Quantity
    public function decreaseQuantity(Request $request)
    {
        $cart = session()->get('cart', []);
        $product_id = $request->input('product_id');

        if (isset($cart[$product_id])) {
            if ($cart[$product_id]['quantity'] > 1) {
                $cart[$product_id]['quantity']--;
            } else {
                unset($cart[$product_id]);
            }
            session()->put('cart', $cart);

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false]);
    }
}
