<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactInquiry;
use Illuminate\Http\Request;

class ContactInquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contactInquiries = ContactInquiry::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.contact-inquiries.index', compact('contactInquiries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.contact-inquiries.create');
    }

    /**
     * Store a newly created resource in storage.
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
            'status' => 'nullable|in:new,in_progress,completed',
            'admin_notes' => 'nullable|string',
        ]);

        $validated['status'] = $validated['status'] ?? 'new';
        $validated['ip_address'] = $request->ip();
        $validated['user_agent'] = $request->userAgent();

        ContactInquiry::create($validated);

        return redirect()->route('admin.contact-inquiries.index')
            ->with('success', 'Contact inquiry created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $contactInquiry = ContactInquiry::findOrFail($id);
        return view('admin.contact-inquiries.show', compact('contactInquiry'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $contactInquiry = ContactInquiry::findOrFail($id);
        return view('admin.contact-inquiries.edit', compact('contactInquiry'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $contactInquiry = ContactInquiry::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'company' => 'nullable|string|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
            'inquiry_type' => 'nullable|string|max:100',
            'service_interest' => 'nullable|string|max:100',
            'status' => 'required|in:new,in_progress,completed',
            'admin_notes' => 'nullable|string',
        ]);

        $contactInquiry->update($validated);

        return redirect()->route('admin.contact-inquiries.index')
            ->with('success', 'Contact inquiry updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $contactInquiry = ContactInquiry::findOrFail($id);
        $contactInquiry->delete();

        return redirect()->route('admin.contact-inquiries.index')
            ->with('success', 'Contact inquiry deleted successfully.');
    }

    /**
     * Mark a contact inquiry as responded.
     */
    public function markAsResponded(string $id)
    {
        $contactInquiry = ContactInquiry::findOrFail($id);
        $contactInquiry->markAsResponded();

        return response()->json([
            'success' => true,
            'status' => $contactInquiry->status,
            'responded_at' => $contactInquiry->responded_at,
            'message' => 'Inquiry marked as responded successfully.'
        ]);
    }

    /**
     * Update the status of a contact inquiry.
     */
    public function updateStatus(Request $request, string $id)
    {
        $contactInquiry = ContactInquiry::findOrFail($id);

        $validated = $request->validate([
            'status' => 'required|in:new,in_progress,completed',
            'admin_notes' => 'nullable|string',
        ]);

        $contactInquiry->update($validated);

        return response()->json([
            'success' => true,
            'status' => $contactInquiry->status,
            'message' => 'Status updated successfully.'
        ]);
    }

    /**
     * Get statistics for contact inquiries.
     */
    public function statistics()
    {
        $stats = [
            'total' => ContactInquiry::count(),
            'new' => ContactInquiry::where('status', 'new')->count(),
            'in_progress' => ContactInquiry::where('status', 'in_progress')->count(),
            'completed' => ContactInquiry::where('status', 'completed')->count(),
            'today' => ContactInquiry::whereDate('created_at', today())->count(),
            'this_week' => ContactInquiry::whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->count(),
            'this_month' => ContactInquiry::whereMonth('created_at', now()->month)->count(),
        ];

        return response()->json($stats);
    }
}
