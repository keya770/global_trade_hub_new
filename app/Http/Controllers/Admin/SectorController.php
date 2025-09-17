<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sector;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SectorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sectors = Sector::latest()->paginate(10);
        return view('admin.sectors.index', compact('sectors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sectors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'vessel_sizes' => 'nullable|string',
            'cargo_types' => 'nullable|string',
            'services' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'boolean',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->title);

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('sectors', 'public');
            $data['image'] = $imagePath;
        }

        Sector::create($data);

        return redirect()->route('admin.sectors.index')
            ->with('success', 'Sector created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sector $sector)
    {
        return view('admin.sectors.show', compact('sector'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sector $sector)
    {
        return view('admin.sectors.edit', compact('sector'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sector $sector)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'vessel_sizes' => 'nullable|string',
            'cargo_types' => 'nullable|string',
            'services' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'boolean',
        ]);

        $data = $request->all();
        
        // Update slug only if title changed
        if ($sector->title !== $request->title) {
            $data['slug'] = Str::slug($request->title);
        }

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image
            if ($sector->image) {
                Storage::disk('public')->delete($sector->image);
            }
            
            $imagePath = $request->file('image')->store('sectors', 'public');
            $data['image'] = $imagePath;
        }

        $sector->update($data);

        return redirect()->route('admin.sectors.index')
            ->with('success', 'Sector updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sector $sector)
    {
        // Delete image if exists
        if ($sector->image) {
            Storage::disk('public')->delete($sector->image);
        }

        $sector->delete();

        return redirect()->route('admin.sectors.index')
            ->with('success', 'Sector deleted successfully.');
    }

    /**
     * Toggle sector status.
     */
    public function toggleStatus(Sector $sector)
    {
        $sector->update(['status' => !$sector->status]);

        return redirect()->route('admin.sectors.index')
            ->with('success', 'Sector status updated successfully.');
    }
}
