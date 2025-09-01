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
}
