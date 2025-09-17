<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VesselInquiry;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class InquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inquiries = VesselInquiry::with(['vessel', 'assignedUser'])->latest()->paginate(10);
        $totalInquiries = VesselInquiry::count();
        $pendingInquiries = VesselInquiry::pending()->count();
        $processedInquiries = VesselInquiry::completed()->count();
        $todayInquiries = VesselInquiry::today()->count();

        return view('admin.vessels.form-data', compact(
            'inquiries',
            'totalInquiries',
            'pendingInquiries', 
            'processedInquiries',
            'todayInquiries'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Not needed for inquiries as they come from forms
        return redirect()->route('admin.vessels.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Not needed for inquiries as they come from forms
        return redirect()->route('admin.vessels.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(VesselInquiry $inquiry)
    {
        $inquiry->load(['vessel', 'assignedUser']);
        return response()->json($inquiry);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VesselInquiry $inquiry)
    {
        $users = User::where('role_id', 1)->get(); // Admin users
        return response()->json([
            'inquiry' => $inquiry,
            'users' => $users
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, VesselInquiry $inquiry)
    {
        try {
            $validated = $request->validate([
                'status' => 'required|in:pending,processing,completed,cancelled',
                'assigned_to' => 'nullable|exists:users,id',
                'admin_notes' => 'nullable|string|max:2000',
            ]);

            $inquiry->update($validated);

            if ($validated['status'] === 'completed') {
                $inquiry->update(['processed_at' => now()]);
            }

            Log::info('Inquiry updated', [
                'inquiry_id' => $inquiry->id,
                'updated_by' => Auth::id(),
                'changes' => $validated
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Inquiry updated successfully!',
                'inquiry' => $inquiry->fresh()
            ]);

        } catch (\Exception $e) {
            Log::error('Inquiry update error', [
                'inquiry_id' => $inquiry->id,
                'error' => $e->getMessage(),
                'request' => $request->all()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Failed to update inquiry. Please try again.'
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VesselInquiry $inquiry)
    {
        try {
            Log::info('Inquiry deleted', [
                'inquiry_id' => $inquiry->id,
                'deleted_by' => Auth::id(),
                'inquiry_data' => $inquiry->toArray()
            ]);

            $inquiry->delete();

            return response()->json([
                'success' => true,
                'message' => 'Inquiry deleted successfully!'
            ]);

        } catch (\Exception $e) {
            Log::error('Inquiry deletion error', [
                'inquiry_id' => $inquiry->id,
                'error' => $e->getMessage()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Failed to delete inquiry. Please try again.'
            ], 500);
        }
    }

    /**
     * Mark inquiry as processed
     */
    public function markProcessed(VesselInquiry $inquiry)
    {
        try {
            $inquiry->update([
                'status' => 'completed',
                'processed_at' => now()
            ]);

            Log::info('Inquiry marked as processed', [
                'inquiry_id' => $inquiry->id,
                'processed_by' => Auth::id()
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Inquiry marked as processed successfully!',
                'inquiry' => $inquiry->fresh()
            ]);

        } catch (\Exception $e) {
            Log::error('Mark processed error', [
                'inquiry_id' => $inquiry->id,
                'error' => $e->getMessage()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Failed to mark inquiry as processed. Please try again.'
            ], 500);
        }
    }
}