<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SubServiceController extends Controller
{
    // Show form
    public function create()
    {
        $services = Service::where('type', 'service')->pluck('name', 'id');
        return view('admin.sub_services.create', compact('services'));
    }

    // Store sub-service (with optional sub-sub-services)
    public function store(Request $request)
    {
        $validated = $request->validate([
            'service_id' => 'required|exists:services,id',
            'name'       => 'required|string|max:255',
            'description'=> 'nullable|string',
            'content'    => 'nullable|string',
            'icon'       => 'nullable|string|max:255',
            'image'      => 'nullable|image|max:2048',
            'is_active'  => 'nullable|boolean',
            'sort_order' => 'nullable|integer',
            'has_sub_sub_services' => 'nullable|boolean',
        ]);

        return DB::transaction(function () use ($request, $validated) {
            $parentService = Service::findOrFail($validated['service_id']);

            // Handle sub-service image
            if ($request->hasFile('image')) {
                $validated['image'] = $request->file('image')->store('services', 'public');
            }

            // Create sub-service
            $subService = Service::create([
                'parent_id'   => $parentService->id,
                'service_id'  => $parentService->id,
                'name'        => $validated['name'],
                'description' => $request->has('has_sub_sub_services') ? null : ($validated['description'] ?? null),
                'image'       => $validated['image'] ?? null,
                'type'        => 'sub_service',
            ]);

            // If has sub-sub-services → create them
            if ($request->has('has_sub_sub_services') && $request->sub_sub_services) {
                foreach ($request->sub_sub_services as $subSub) {
                    $subSubData = [
                        'parent_id'   => $subService->id,
                        'service_id'  => $parentService->id,
                        'name'        => $subSub['name'] ?? '',
                        'description' => $subSub['description'] ?? '',
                        'type'        => 'sub_sub_service',
                        'image'       => null,
                    ];

                    if (isset($subSub['image']) && $subSub['image'] instanceof \Illuminate\Http\UploadedFile) {
                        $subSubData['image'] = $subSub['image']->store('services', 'public');
                    }

                    Service::create($subSubData);
                }
            }

            return redirect()->route('admin.sub_services.index')
                ->with('success', 'Sub Service created successfully');
        });
    }

    // List all sub-services
    public function index()
    {
        $subServices = Service::where('type', 'sub_service')
            ->with('subSubServices')
            ->paginate(15);

        return view('admin.sub_services.index', compact('subServices'));
    }
}
