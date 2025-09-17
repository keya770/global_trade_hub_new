<?php

namespace App\Http\Controllers;

use App\Models\SiteSetting;
use App\Models\HeroSection;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function about()
    {
        $siteSettings = SiteSetting::first();
        $heroSection = HeroSection::active()->first();
        return view('about', compact('siteSettings', 'heroSection'));
    }

    public function contact()
    {
        $siteSettings = SiteSetting::first();
        return view('contact', compact('siteSettings'));
    }

    public function careers()
    {
        $siteSettings = SiteSetting::first();
        return view('careers', compact('siteSettings'));
    }

    public function legal()
    {
        $siteSettings = SiteSetting::first();
        return view('legal', compact('siteSettings'));
    }

    public function sectors()
    {
        $siteSettings = SiteSetting::first();
        return view('sectors', compact('siteSettings'));
    }
}
