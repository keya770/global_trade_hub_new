<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Vessel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VesselController extends Controller
{
    public function index()
    {
        $vessels = Vessel::orderBy('sort_order', 'asc')->paginate(10);
        return view('admin.vessels.index', compact('vessels'));
    }

    public function create()
    {
        return view('admin.vessels.create');
    }

    public function store(Request $request)
    {
        $validated = $this->validateData($request);

        if ($request->hasFile('image')) {
            // get file
            $file = $request->file('image');

            // create unique name
            $filename = time() . '-' . $file->getClientOriginalName();

            // move to public/vessel-imgs
            $file->move(public_path('vessel-imgs'), $filename);

            // save only path or filename in db
            $validated['image'] = 'vessel-imgs/' . $filename;
        }

        Vessel::create($validated);

        return redirect()->route('admin.vessels.index')
            ->with('success', 'Vessel created successfully.');
    }


    public function show(Vessel $vessel)
    {
        return view('admin.vessels.show', compact('vessel'));
    }

    public function edit(Vessel $vessel)
    {
        return view('admin.vessels.edit', compact('vessel'));
    }

    public function update(Request $request, Vessel $vessel)
    {
        $validated = $this->validateData($request, $vessel->id);

        if ($request->hasFile('image')) {
            if ($vessel->image) {
                Storage::disk('public')->delete($vessel->image);
            }
            $validated['image'] = $request->file('image')->store('vessels', 'public');
        }

        $vessel->update($validated);

        return redirect()->route('admin.vessels.index')
            ->with('success', 'Vessel updated successfully.');
    }

    public function destroy(Vessel $vessel)
    {
        if ($vessel->image) {
            Storage::disk('public')->delete($vessel->image);
        }
        $vessel->delete();

        return redirect()->route('admin.vessels.index')
            ->with('success', 'Vessel deleted successfully.');
    }

    public function toggleAvailability(Vessel $vessel)
    {
        $vessel->update(['is_available' => !$vessel->is_available]);

        return response()->json([
            'success' => true,
            'is_available' => $vessel->is_available,
            'message' => 'Availability updated successfully.'
        ]);
    }

    public function toggleFeatured(Vessel $vessel)
    {
        $vessel->update(['is_featured' => !$vessel->is_featured]);

        return response()->json([
            'success' => true,
            'is_featured' => $vessel->is_featured,
            'message' => 'Featured status updated successfully.'
        ]);
    }

    private function validateData(Request $request, $id = null)
    {
        return $request->validate([
            'name'        => 'required|string|max:255',
            'type'        => 'required|string|max:100',
            'description' => 'required|string',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'capacity'    => 'nullable|numeric|min:0',
            'length'      => 'nullable|numeric|min:0',
            'width'       => 'nullable|numeric|min:0',
            'draft'       => 'nullable|numeric|min:0',
            'daily_rate'  => 'nullable|numeric|min:0',
            'flag'        => 'nullable|string|max:100',
            'built_year'  => 'nullable|integer|min:1900|max:' . (date('Y') + 1),
            'imo_number'  => 'nullable|string|max:50',
            'is_available'=> 'boolean',
            'is_featured' => 'boolean',
            'sort_order'  => 'nullable|integer|min:0',
        ]);
    }
}
