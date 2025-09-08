<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    /**
     * Display a listing of testimonials.
     */
    public function index()
    {
        // Get featured testimonials first, then active ones
        $featuredTestimonials = Testimonial::featured()
            ->active()
            ->ordered()
            ->take(6)
            ->get();

        // Get all active testimonials for pagination
        $allTestimonials = Testimonial::active()
            ->ordered()
            ->paginate(12);

        // Get statistics
        $stats = [
            'total' => Testimonial::active()->count(),
            'featured' => Testimonial::featured()->active()->count(),
            'average_rating' => Testimonial::active()->avg('rating') ?? 0,
        ];

        return view('testimonials', compact('featuredTestimonials', 'allTestimonials', 'stats'));
    }

    /**
     * Display the specified testimonial.
     */
    public function show(Testimonial $testimonial)
    {
        // Get related testimonials
        $relatedTestimonials = Testimonial::active()
            ->where('id', '!=', $testimonial->id)
            ->where('service_type', $testimonial->service_type)
            ->take(3)
            ->get();

        return view('testimonials.show', compact('testimonial', 'relatedTestimonials'));
    }
}
