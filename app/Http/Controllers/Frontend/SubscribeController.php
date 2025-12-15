<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;

class SubscribeController extends Controller
{
    public function index()
    {
        // return Subscriber::all();
        return view('front.subscribe.index');
    }

    // public function store(Request $request)
    // {
    //     return Subscriber::create([
    //         'email'=>$request->email,
    //         'status'=>1
    //     ]);
    // }

    // public function update(Request $request, Subscriber $subscriber)
    // {
    //     $subscriber->update($request->all());
    //     return $subscriber;
    // }

    // public function destroy(Subscriber $subscriber)
    // {
    //     $subscriber->delete();
    //     return response()->json(['message'=>'Subscriber deleted']);
    // }
}
