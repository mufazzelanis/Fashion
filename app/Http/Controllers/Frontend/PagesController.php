<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Services\MailchimpService;

class PagesController extends Controller
{
    public function aboutUs()
    {
        return view('front.pages.about-us');
    }

    // contact US Form store method
    public function storeContact(ContactRequest $request, MailchimpService $mailchimp)
    {
        try {
            // Save contact message
            Contact::create($request->validated());

            // Add to Mailchimp audience
            $mailchimp->contact(
                $request->email,
                $request->first_name,
                $request->last_name,
                $request->contact_number
            );

            return redirect()->back()->with('success', 'Your message has been sent successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
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
