<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class HeroSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $heroSections = HeroSection::orderBy('sort_order', 'asc')->paginate(10);
        return view('admin.hero-sections.index', compact('heroSections'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.hero-sections.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:500',
            'description' => 'nullable|string',
            'background_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'button_text' => 'nullable|string|max:100',
            'button_url' => 'nullable|url|max:255',
            'is_active' => 'boolean',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        // Handle file upload
        if ($request->hasFile('background_image')) {
            $imagePath = $request->file('background_image')->store('hero-sections', 'public');
            $validated['background_image'] = $imagePath;
        }

        $validated['is_active'] = $request->has('is_active');
        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        HeroSection::create($validated);

        return redirect()->route('admin.hero-sections.index')
            ->with('success', 'Hero section created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $heroSection = HeroSection::findOrFail($id);
        return view('admin.hero-sections.show', compact('heroSection'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $heroSection = HeroSection::findOrFail($id);
        return view('admin.hero-sections.edit', compact('heroSection'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $heroSection = HeroSection::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:500',
            'description' => 'nullable|string',
            'background_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'button_text' => 'nullable|string|max:100',
            'button_url' => 'nullable|url|max:255',
            'is_active' => 'boolean',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        // Handle file upload
        if ($request->hasFile('background_image')) {
            // Delete old image if exists
            if ($heroSection->background_image) {
                Storage::disk('public')->delete($heroSection->background_image);
            }
            
            $imagePath = $request->file('background_image')->store('hero-sections', 'public');
            $validated['background_image'] = $imagePath;
        }

        $validated['is_active'] = $request->has('is_active');
        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        $heroSection->update($validated);

        return redirect()->route('admin.hero-sections.index')
            ->with('success', 'Hero section updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $heroSection = HeroSection::findOrFail($id);

        // Delete image if exists
        if ($heroSection->background_image) {
            Storage::disk('public')->delete($heroSection->background_image);
        }

        $heroSection->delete();

        return redirect()->route('admin.hero-sections.index')
            ->with('success', 'Hero section deleted successfully.');
    }

    /**
     * Toggle the active status of a hero section.
     */
    public function toggleStatus(string $id)
    {
        $heroSection = HeroSection::findOrFail($id);
        $heroSection->update(['is_active' => !$heroSection->is_active]);

        return response()->json([
            'success' => true,
            'is_active' => $heroSection->is_active,
            'message' => 'Status updated successfully.'
        ]);
    }
}
