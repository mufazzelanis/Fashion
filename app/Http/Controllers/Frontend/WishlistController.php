<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;

class WishlistController extends Controller
{
    public function index()
    {
        // return Wishlist::where('user_id',auth()->id())->get();
        return view('front.wishlist.index');
    }

    // public function store(Request $request)
    // {
    //     return Wishlist::create([
    //         'user_id'=>auth()->id(),
    //         'product_id'=>$request->product_id
    //     ]);
    // }

    // public function destroy(Wishlist $wishlist)
    // {
    //     $wishlist->delete();
    //     return response()->json(['message'=>'Wishlist removed']);
    // }
}
