<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\SubService;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of services.
     */
    public function index()
    {
        $services = Service::active()
            ->ordered()
            ->with('subServices')
            ->get();

        return view('services', compact('services'));
    }

    /**
     * Display the specified service.
     */
    public function show(Service $service)
    {
        // Get sub-services for this service
        $subServices = SubService::active()
            ->where('service_id', $service->id)
            ->topLevel()
            ->ordered()
            ->get();

        // Get related services
        $relatedServices = Service::active()
            ->where('id', '!=', $service->id)
            ->ordered()
            ->take(3)
            ->get();

        return view('services_details', compact('service', 'subServices', 'relatedServices'));
    }

    /**
     * Display the specified sub-service.
     */
    public function showSubService(SubService $subService)
    {
        // Get sub-sub-services for this sub-service
        $subSubServices = SubService::active()
            ->where('parent_id', $subService->id)
            ->ordered()
            ->get();

        // Get related sub-services from the same service
        $relatedSubServices = SubService::active()
            ->where('service_id', $subService->service_id)
            ->where('id', '!=', $subService->id)
            ->topLevel()
            ->ordered()
            ->take(3)
            ->get();

        return view('services_sub_details', compact('subService', 'subSubServices', 'relatedSubServices'));
    }
}
