<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\Page;
use App\Services\MailchimpService;

class PagesController extends Controller
{
    public function aboutUs()
    {
        $data = Page::where('slug', 'about-us')->first();

        return view('front.pages.about-us', compact('data'));
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
        $data = Page::where('slug', 'terms-conditions')->first();

        return view('front.pages.trems-condition', compact('data'));
    }

    public function privacyPolicy()
    {
        $data = Page::where('slug', 'privacy-policy')->first();

        return view('front.pages.privacy-policy', compact('data'));
    }

    public function contactUs()
    {
        $data = Page::where('slug', 'contact-us')->first();

        return view('front.pages.contact-us', compact('data'));
    }

    public function faq()
    {
        return view('front.pages.faq');
    }
}
