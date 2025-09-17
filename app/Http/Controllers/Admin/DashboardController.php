<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\ContactInquiry;
use App\Models\HeroSection;
use App\Models\Job;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\Vessel;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display the admin dashboard.
     */
    public function index()
    {
        // Get dashboard statistics
        $stats = [
            'hero_sections' => HeroSection::count(),
            'services' => Service::count(),
            'vessels' => Vessel::count(),
            'blog_posts' => BlogPost::count(),
            'testimonials' => Testimonial::count(),
            'jobs' => Job::count(),
            'contact_inquiries' => ContactInquiry::count(),
            'new_inquiries' => ContactInquiry::where('status', 'new')->count(),
        ];

        // Get recent data
        $recentData = [
            'blog_posts' => BlogPost::latest()->take(5)->get(),
            'contact_inquiries' => ContactInquiry::latest()->take(5)->get(),
            'vessels' => Vessel::latest()->take(5)->get(),
        ];

        return view('admin.dashboard', compact('stats', 'recentData'));
    }
}
