<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    // READ
    public function index()
    {
        // return Cart::where('user_id', auth()->id())->get();
        return view('front.cart.index');
    }

    // // CREATE
    // public function store(Request $request)
    // {
    //     return Cart::create([
    //         'user_id' => auth()->id(),
    //         'product_id' => $request->product_id,
    //         'quantity' => $request->quantity,
    //     ]);
    // }

    // // UPDATE
    // public function update(Request $request, Cart $cart)
    // {
    //     $cart->update(['quantity'=>$request->quantity]);
    //     return $cart;
    // }

    // // DELETE
    // public function destroy(Cart $cart)
    // {
    //     $cart->delete();
    //     return response()->json(['message'=>'Removed from cart']);
    // }
}
