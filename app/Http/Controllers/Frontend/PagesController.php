<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;

class PagesController extends Controller
{
    public function aboutUs()
    {
        return view('front.pages.about-us');
    }
    
    //contact store method
    public function storeContact(ContactRequest $request)
    {
        Contact::create($request->validated());

        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }

    public function tremsCondition()
    {
        return view('front.pages.trems-condition');
    }

    public function privacyPolicy()
    {
        return view('front.pages.privacy-policy');
    }

    public function contactUs()
    {
        return view('front.pages.contact-us');
    }

    public function faq()
    {
        return view('front.pages.faq');
    }
}
