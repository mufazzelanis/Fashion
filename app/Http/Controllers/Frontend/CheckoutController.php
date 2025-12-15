<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        // return Order::where('user_id',auth()->id())->get();
        return view('front.checkout.index');
    }

    // public function show(Order $order)
    // {
    //     return $order;
    // }

    // public function store(Request $request)
    // {
    //     return Order::create([
    //         'user_id'=>auth()->id(),
    //         'total_amount'=>$request->total_amount,
    //         'status'=>'pending'
    //     ]);
    // }

    // public function update(Request $request, Order $order)
    // {
    //     $order->update($request->all());
    //     return $order;
    // }

    // public function destroy(Order $order)
    // {
    //     $order->delete();
    //     return response()->json(['message'=>'Order deleted']);
    // }
}
