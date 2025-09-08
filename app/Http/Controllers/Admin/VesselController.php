<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Vessel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VesselController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vessels = Vessel::orderBy('sort_order', 'asc')->paginate(10);
        return view('admin.vessels.index', compact('vessels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.vessels.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:100',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'capacity' => 'nullable|numeric|min:0',
            'length' => 'nullable|numeric|min:0',
            'width' => 'nullable|numeric|min:0',
            'draft' => 'nullable|numeric|min:0',
            'daily_rate' => 'nullable|numeric|min:0',
            'flag' => 'nullable|string|max:100',
            'built_year' => 'nullable|integer|min:1900|max:' . (date('Y') + 1),
            'imo_number' => 'nullable|string|max:50',
            'is_available' => 'boolean',
            'is_featured' => 'boolean',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('vessels', 'public');
            $validated['image'] = $imagePath;
        }

        $validated['is_available'] = $request->has('is_available');
        $validated['is_featured'] = $request->has('is_featured');
        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        Vessel::create($validated);

        return redirect()->route('admin.vessels.index')
            ->with('success', 'Vessel created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $vessel = Vessel::findOrFail($id);
        return view('admin.vessels.show', compact('vessel'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $vessel = Vessel::findOrFail($id);
        return view('admin.vessels.edit', compact('vessel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $vessel = Vessel::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:100',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'capacity' => 'nullable|numeric|min:0',
            'length' => 'nullable|numeric|min:0',
            'width' => 'nullable|numeric|min:0',
            'draft' => 'nullable|numeric|min:0',
            'daily_rate' => 'nullable|numeric|min:0',
            'flag' => 'nullable|string|max:100',
            'built_year' => 'nullable|integer|min:1900|max:' . (date('Y') + 1),
            'imo_number' => 'nullable|string|max:50',
            'is_available' => 'boolean',
            'is_featured' => 'boolean',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($vessel->image) {
                Storage::disk('public')->delete($vessel->image);
            }
            
            $imagePath = $request->file('image')->store('vessels', 'public');
            $validated['image'] = $imagePath;
        }

        $validated['is_available'] = $request->has('is_available');
        $validated['is_featured'] = $request->has('is_featured');

        $vessel->update($validated);

        return redirect()->route('admin.vessels.index')
            ->with('success', 'Vessel updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $vessel = Vessel::findOrFail($id);

        // Delete image if exists
        if ($vessel->image) {
            Storage::disk('public')->delete($vessel->image);
        }

        $vessel->delete();

        return redirect()->route('admin.vessels.index')
            ->with('success', 'Vessel deleted successfully.');
    }

    /**
     * Toggle the availability status of a vessel.
     */
    public function toggleAvailability(string $id)
    {
        $vessel = Vessel::findOrFail($id);
        $vessel->update(['is_available' => !$vessel->is_available]);

        return response()->json([
            'success' => true,
            'is_available' => $vessel->is_available,
            'message' => 'Availability updated successfully.'
        ]);
    }

    /**
     * Toggle the featured status of a vessel.
     */
    public function toggleFeatured(string $id)
    {
        $vessel = Vessel::findOrFail($id);
        $vessel->update(['is_featured' => !$vessel->is_featured]);

        return response()->json([
            'success' => true,
            'is_featured' => $vessel->is_featured,
            'message' => 'Featured status updated successfully.'
        ]);
    }
}
