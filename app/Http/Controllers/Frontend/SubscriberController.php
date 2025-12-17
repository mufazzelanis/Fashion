<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubscriberRequest;
use App\Models\Subscriber;
use App\Services\MailchimpService;

class SubscriberController extends Controller
{
    // public function index()
    // {
    //     // return Subscriber::all();
    //     return view('front.subscribe.index');
    // }

    public function store(SubscriberRequest $request, MailchimpService $mailchimp)
    {
        try {
            // Save subscriber in database
            Subscriber::create([
                'email' => $request->email,
            ]);

            // Subscribe to Mailchimp
            $mailchimp->subscribe(
                $request->email,
            );

            return redirect()->back()->with('success', 'Subscribed successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

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
