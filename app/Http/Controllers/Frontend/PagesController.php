<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function aboutUs()
    {
        return view('front.pages.about-us');
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
