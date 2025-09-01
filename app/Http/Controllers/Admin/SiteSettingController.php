<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class SiteSettingController extends Controller
{
    public function index()
    {
        $settings = SiteSetting::first();
        return view('admin.site-settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'facebook' => 'nullable|url',
            'twitter' => 'nullable|url',
            'instagram' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'youtube' => 'nullable|url',
            'whatsapp' => 'nullable|string|max:20',
            'email' => 'nullable|email',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'map' => 'nullable|string',
            'business_hours' => 'nullable|string|max:255',
        ]);

        $settings = SiteSetting::first();
        if (!$settings) {
            $settings = SiteSetting::create($validated);
        } else {
            $settings->update($validated);
        }

        return redirect()->back()->with('success', 'Site settings updated successfully.');
    }
}
