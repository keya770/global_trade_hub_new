<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactInquiry;
use Illuminate\Http\Request;

class ContactInquiryController extends Controller
{
    /**
     * Display a listing of the contact inquiries.
     */
    public function index()
    {
        $contactInquiries = ContactInquiry::latest()->paginate(15);
        return view('admin.contact-inquiries.index', compact('contactInquiries'));
    }

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

    /**
     * Display the specified contact inquiry.
     */
    public function show(ContactInquiry $contactInquiry)
    {
        return view('admin.contact-inquiries.show', compact('contactInquiry'));
    }

    /**
     * Show the form for editing the specified contact inquiry.
     */
    public function edit(ContactInquiry $contactInquiry)
    {
        return view('admin.contact-inquiries.edit', compact('contactInquiry'));
    }

    /**
     * Update the specified contact inquiry in storage.
     */
    public function update(Request $request, ContactInquiry $contactInquiry)
    {
        $validated = $request->validate([
            'status' => 'required|in:new,in_progress,completed',
            'admin_notes' => 'nullable|string',
        ]);

        $contactInquiry->update($validated);

        return redirect()->route('admin.contact-inquiries.index')
            ->with('success', 'Contact inquiry updated successfully.');
    }

    /**
     * Remove the specified contact inquiry from storage.
     */
    public function destroy(ContactInquiry $contactInquiry)
    {
        $contactInquiry->delete();

        return redirect()->route('admin.contact-inquiries.index')
            ->with('success', 'Contact inquiry deleted successfully.');
    }

    /**
     * Mark contact inquiry as responded.
     */
    public function markAsResponded(ContactInquiry $contactInquiry)
    {
        $contactInquiry->markAsResponded();

        return redirect()->route('admin.contact-inquiries.index')
            ->with('success', 'Contact inquiry marked as responded.');
    }

    /**
     * Update contact inquiry status.
     */
    public function updateStatus(Request $request, ContactInquiry $contactInquiry)
    {
        $validated = $request->validate([
            'status' => 'required|in:new,in_progress,completed',
        ]);

        $contactInquiry->update($validated);

        return response()->json([
            'success' => true,
            'status' => $contactInquiry->status,
            'message' => 'Status updated successfully.'
        ]);
    }

    /**
     * Get contact inquiry statistics.
     */
    public function statistics()
    {
        $stats = [
            'total' => ContactInquiry::count(),
            'new' => ContactInquiry::where('status', 'new')->count(),
            'in_progress' => ContactInquiry::where('status', 'in_progress')->count(),
            'completed' => ContactInquiry::where('status', 'completed')->count(),
            'recent' => ContactInquiry::where('created_at', '>=', now()->subDays(7))->count(),
        ];

        return response()->json($stats);
    }
}
