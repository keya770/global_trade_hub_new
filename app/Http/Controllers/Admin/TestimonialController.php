<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonials = Testimonial::orderBy('sort_order', 'asc')->paginate(10);
        return view('admin.testimonials.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.testimonials.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'client_name' => 'required|string|max:255',
            'client_position' => 'nullable|string|max:255',
            'company_name' => 'nullable|string|max:255',
            'testimonial' => 'required|string',
            'client_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'company_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'rating' => 'nullable|integer|min:1|max:5',
            'service_type' => 'nullable|string|max:100',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        // Handle client image upload
        if ($request->hasFile('client_image')) {
            $clientImagePath = $request->file('client_image')->store('testimonials/clients', 'public');
            $validated['client_image'] = $clientImagePath;
        }

        // Handle company logo upload
        if ($request->hasFile('company_logo')) {
            $companyLogoPath = $request->file('company_logo')->store('testimonials/companies', 'public');
            $validated['company_logo'] = $companyLogoPath;
        }

        $validated['is_featured'] = $request->has('is_featured');
        $validated['is_active'] = $request->has('is_active');
        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        Testimonial::create($validated);

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Testimonial created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $testimonial = Testimonial::findOrFail($id);
        return view('admin.testimonials.show', compact('testimonial'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $testimonial = Testimonial::findOrFail($id);
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $testimonial = Testimonial::findOrFail($id);

        $validated = $request->validate([
            'client_name' => 'required|string|max:255',
            'client_position' => 'nullable|string|max:255',
            'company_name' => 'nullable|string|max:255',
            'testimonial' => 'required|string',
            'client_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'company_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'rating' => 'nullable|integer|min:1|max:5',
            'service_type' => 'nullable|string|max:100',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        // Handle client image upload
        if ($request->hasFile('client_image')) {
            // Delete old image if exists
            if ($testimonial->client_image) {
                Storage::disk('public')->delete($testimonial->client_image);
            }
            
            $clientImagePath = $request->file('client_image')->store('testimonials/clients', 'public');
            $validated['client_image'] = $clientImagePath;
        }

        // Handle company logo upload
        if ($request->hasFile('company_logo')) {
            // Delete old logo if exists
            if ($testimonial->company_logo) {
                Storage::disk('public')->delete($testimonial->company_logo);
            }
            
            $companyLogoPath = $request->file('company_logo')->store('testimonials/companies', 'public');
            $validated['company_logo'] = $companyLogoPath;
        }

        $validated['is_featured'] = $request->has('is_featured');
        $validated['is_active'] = $request->has('is_active');

        $testimonial->update($validated);

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Testimonial updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $testimonial = Testimonial::findOrFail($id);

        // Delete images if exist
        if ($testimonial->client_image) {
            Storage::disk('public')->delete($testimonial->client_image);
        }
        if ($testimonial->company_logo) {
            Storage::disk('public')->delete($testimonial->company_logo);
        }

        $testimonial->delete();

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Testimonial deleted successfully.');
    }

    /**
     * Toggle the active status of a testimonial.
     */
    public function toggleActive(string $id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $testimonial->update(['is_active' => !$testimonial->is_active]);

        return response()->json([
            'success' => true,
            'is_active' => $testimonial->is_active,
            'message' => 'Status updated successfully.'
        ]);
    }

    /**
     * Toggle the featured status of a testimonial.
     */
    public function toggleFeatured(string $id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $testimonial->update(['is_featured' => !$testimonial->is_featured]);

        return response()->json([
            'success' => true,
            'is_featured' => $testimonial->is_featured,
            'message' => 'Featured status updated successfully.'
        ]);
    }
}
