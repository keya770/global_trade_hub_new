<?php

namespace App\Http\Controllers;

use App\Models\SiteSetting;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display the contact page with dynamic data
     */
    public function index()
    {
        // Fetch site settings for contact information
        $siteSettings = SiteSetting::first();
        
        return view('contact', compact('siteSettings'));
    }
}
