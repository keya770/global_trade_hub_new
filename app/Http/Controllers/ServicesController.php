<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function index()
    {
        $services = Service::active()->ordered()->get();
        return view('services', compact('services'));
    }

    public function show($id)
    {
        $service = Service::active()
            ->with(['subServices' => function ($query) {
                $query->active()->ordered();
            }])
            ->findOrFail($id);

        $relatedServices = Service::active()
            ->where('id', '!=', $service->id)
            ->ordered()
            ->limit(5)
            ->get();

        return view('services_details', compact('service', 'relatedServices'));
    }
}
