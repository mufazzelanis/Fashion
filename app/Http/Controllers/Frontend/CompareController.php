<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Compare;

class CompareController extends Controller
{
    public function index()
    {
        // $compares = Compare::where('user_id', Auth::id())->get();

        return view('front.compare.index');
    }

    // public function store(Request $request)
    // {
    //     return Compare::create([
    //         'user_id'=>auth()->id(),
    //         'product_id'=>$request->product_id
    //     ]);
    // }

    // public function destroy(Compare $compare)
    // {
    //     $compare->delete();
    //     return response()->json(['message'=>'Compare removed']);
    // }
}
