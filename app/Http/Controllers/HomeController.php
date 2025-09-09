<?php

namespace App\Http\Controllers;

use App\Models\HeroSection;
use App\Models\Service;
use App\Models\Vessel;
use App\Models\Testimonial;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display the home page with dynamic data
     */
    public function index()
    {
        // Fetch active hero section
        $heroSection = HeroSection::active()->first();
        
        // Fetch services for overview section
        $services = Service::active()
            ->ordered()
            // ->take(4)
            ->get();
        
        // Fetch featured vessels
        $featuredVessels = Vessel::featured()
            ->available()
            ->ordered()
            ->take(3)
            ->get();
        
        // Fetch active testimonials
        $testimonials = Testimonial::active()
            ->ordered()
            // ->take(3)
            ->get();
        
        // Fetch site settings for contact information
        $siteSettings = SiteSetting::first();
        
        // Company highlights/statistics (you can make these dynamic too)
        $highlights = [
            'years_experience' => 25,
            'deals_completed' => 2500,
            'global_partners' => 150,
            'countries_served' => 50
        ];
        
        return view('home', compact(
            'heroSection',
            'services', 
            'featuredVessels',
            'testimonials',
            'siteSettings',
            'highlights'
        ));
    }
}
