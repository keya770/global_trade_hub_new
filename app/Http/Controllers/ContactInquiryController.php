<?php

namespace App\Http\Controllers;

use App\Models\ContactInquiry;
use Illuminate\Http\Request;

class ContactInquiryController extends Controller
{
    /**
     * Store a newly created contact inquiry.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'company' => 'nullable|string|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
            'inquiry_type' => 'nullable|string|max:100',
            'service_interest' => 'nullable|string|max:100',
        ]);

        $validated['status'] = 'new';
        $validated['ip_address'] = $request->ip();
        $validated['user_agent'] = $request->userAgent();

        ContactInquiry::create($validated);

        return redirect()->back()->with('success', 'Your message has been sent successfully. We will get back to you soon.');
    }
}
