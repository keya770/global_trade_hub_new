<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SubService;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SubServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subServices = SubService::with(['service', 'parent', 'children'])
            ->latest()
            ->paginate(15);
            
        return view('admin.sub_services.index', compact('subServices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $services = Service::active()->ordered()->get();
        $parentSubServices = SubService::topLevel()->active()->ordered()->get();
        
        return view('admin.sub_services.create', compact('services', 'parentSubServices'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'parent_id' => 'nullable|exists:sub_services,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'content' => 'nullable|string',
            'icon' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_active' => 'boolean',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        $data = $request->all();

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('sub-services', 'public');
            $data['image'] = $imagePath;
        }

        // Set default sort order if not provided
        if (!isset($data['sort_order'])) {
            $data['sort_order'] = SubService::where('service_id', $data['service_id'])
                ->where('parent_id', $data['parent_id'] ?? null)
                ->max('sort_order') + 1;
        }

        SubService::create($data);

        return redirect()->route('admin.sub_services.index')
            ->with('success', 'Sub service created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(SubService $subService)
    {
        $subService->load(['service', 'parent', 'children']);
        return view('admin.sub_services.show', compact('subService'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubService $subService)
    {
        $services = Service::active()->ordered()->get();
        $parentSubServices = SubService::topLevel()
            ->where('id', '!=', $subService->id)
            ->active()
            ->ordered()
            ->get();
            
        return view('admin.sub_services.edit', compact('subService', 'services', 'parentSubServices'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SubService $subService)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'parent_id' => [
                'nullable',
                'exists:sub_services,id',
                function ($attribute, $value, $fail) use ($subService) {
                    if ($value == $subService->id) {
                        $fail('A sub service cannot be its own parent.');
                    }
                }
            ],
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'content' => 'nullable|string',
            'icon' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_active' => 'boolean',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        $data = $request->all();

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image
            if ($subService->image) {
                Storage::disk('public')->delete($subService->image);
            }
            
            $imagePath = $request->file('image')->store('sub-services', 'public');
            $data['image'] = $imagePath;
        }

        $subService->update($data);

        return redirect()->route('admin.sub_services.index')
            ->with('success', 'Sub service updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubService $subService)
    {
        // Delete image if exists
        if ($subService->image) {
            Storage::disk('public')->delete($subService->image);
        }

        // Delete children first (cascade)
        $subService->children()->delete();
        
        $subService->delete();

        return redirect()->route('admin.sub_services.index')
            ->with('success', 'Sub service deleted successfully.');
    }

    /**
     * Toggle sub service status.
     */
    public function toggleStatus(SubService $subService)
    {
        $subService->update(['is_active' => !$subService->is_active]);

        return redirect()->route('admin.sub_services.index')
            ->with('success', 'Sub service status updated successfully.');
    }

    /**
     * Get sub services for a specific service (AJAX).
     */
    public function getByService(Request $request)
    {
        $serviceId = $request->get('service_id');
        $subServices = SubService::where('service_id', $serviceId)
            ->topLevel()
            ->active()
            ->ordered()
            ->get(['id', 'name']);
            
        return response()->json($subServices);
    }
}
