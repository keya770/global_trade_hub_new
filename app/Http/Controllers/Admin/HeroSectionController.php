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
            'accent_text' => 'nullable|string|max:100',
            'hero_description' => 'nullable|string|max:1000',
            'background_video' => 'nullable|mimes:mp4,mov,avi|max:10240', // 10MB max for video
            'button_text' => 'nullable|string|max:100',
            'button_url' => 'nullable|url|max:255',
            'secondary_button_text' => 'nullable|string|max:100',
            'secondary_button_url' => 'nullable|url|max:255',
            'is_active' => 'boolean',
        ], [
            'title.required' => 'The main title is required.',
            'background_video.mimes' => 'The background video must be a file of type: mp4, mov, avi.',
            'background_video.max' => 'The background video may not be greater than 10MB.',
            'button_url.url' => 'The primary button URL must be a valid URL.',
            'secondary_button_url.url' => 'The secondary button URL must be a valid URL.',
        ]);

        // Handle background video upload
        if ($request->hasFile('background_video')) {
            $videoPath = $request->file('background_video')->store('hero-sections', 'public');
            $validated['background_video'] = $videoPath;
        }

        $validated['is_active'] = $request->has('is_active');
        $validated['sort_order'] = 0; // Default sort order

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
            'accent_text' => 'nullable|string|max:100',
            'hero_description' => 'nullable|string|max:1000',
            'background_video' => 'nullable|mimes:mp4,mov,avi|max:10240',
            'button_text' => 'nullable|string|max:100',
            'button_url' => 'nullable|url|max:255',
            'secondary_button_text' => 'nullable|string|max:100',
            'secondary_button_url' => 'nullable|url|max:255',
            'is_active' => 'boolean',
        ], [
            'title.required' => 'The main title is required.',
            'background_video.mimes' => 'The background video must be a file of type: mp4, mov, avi.',
            'background_video.max' => 'The background video may not be greater than 10MB.',
            'button_url.url' => 'The primary button URL must be a valid URL.',
            'secondary_button_url.url' => 'The secondary button URL must be a valid URL.',
        ]);

        // Handle background video upload
        if ($request->hasFile('background_video')) {
            // Delete old video if exists
            if ($heroSection->background_video) {
                Storage::disk('public')->delete($heroSection->background_video);
            }
            
            $videoPath = $request->file('background_video')->store('hero-sections', 'public');
            $validated['background_video'] = $videoPath;
        }

        $validated['is_active'] = $request->has('is_active');

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

        // Delete video if exists
        if ($heroSection->background_video) {
            Storage::disk('public')->delete($heroSection->background_video);
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
