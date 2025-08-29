<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LegalDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class LegalDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $legalDocuments = LegalDocument::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.legal-documents.index', compact('legalDocuments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.legal-documents.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:legal_documents',
            'description' => 'nullable|string',
            'content' => 'nullable|string',
            'document_type' => 'required|string|max:100',
            'file' => 'nullable|file|mimes:pdf,doc,docx,txt|max:10240', // 10MB max
            'version' => 'nullable|string|max:20',
            'is_active' => 'boolean',
            'requires_consent' => 'boolean',
            'effective_date' => 'nullable|date',
            'expiry_date' => 'nullable|date|after:effective_date',
        ]);

        // Generate slug if not provided
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        // Handle file upload
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('legal-documents', $fileName, 'public');
            
            $validated['file_path'] = $filePath;
            $validated['file_name'] = $file->getClientOriginalName();
            $validated['file_size'] = $file->getSize();
        }

        $validated['is_active'] = $request->has('is_active');
        $validated['requires_consent'] = $request->has('requires_consent');
        $validated['downloads_count'] = 0;

        LegalDocument::create($validated);

        return redirect()->route('admin.legal-documents.index')
            ->with('success', 'Legal document created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $legalDocument = LegalDocument::findOrFail($id);
        return view('admin.legal-documents.show', compact('legalDocument'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $legalDocument = LegalDocument::findOrFail($id);
        return view('admin.legal-documents.edit', compact('legalDocument'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $legalDocument = LegalDocument::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:legal_documents,slug,' . $id,
            'description' => 'nullable|string',
            'content' => 'nullable|string',
            'document_type' => 'required|string|max:100',
            'file' => 'nullable|file|mimes:pdf,doc,docx,txt|max:10240', // 10MB max
            'version' => 'nullable|string|max:20',
            'is_active' => 'boolean',
            'requires_consent' => 'boolean',
            'effective_date' => 'nullable|date',
            'expiry_date' => 'nullable|date|after:effective_date',
        ]);

        // Generate slug if not provided
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        // Handle file upload
        if ($request->hasFile('file')) {
            // Delete old file if exists
            if ($legalDocument->file_path) {
                Storage::disk('public')->delete($legalDocument->file_path);
            }
            
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('legal-documents', $fileName, 'public');
            
            $validated['file_path'] = $filePath;
            $validated['file_name'] = $file->getClientOriginalName();
            $validated['file_size'] = $file->getSize();
        }

        $validated['is_active'] = $request->has('is_active');
        $validated['requires_consent'] = $request->has('requires_consent');

        $legalDocument->update($validated);

        return redirect()->route('admin.legal-documents.index')
            ->with('success', 'Legal document updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $legalDocument = LegalDocument::findOrFail($id);

        // Delete file if exists
        if ($legalDocument->file_path) {
            Storage::disk('public')->delete($legalDocument->file_path);
        }

        $legalDocument->delete();

        return redirect()->route('admin.legal-documents.index')
            ->with('success', 'Legal document deleted successfully.');
    }

    /**
     * Download a legal document.
     */
    public function download(string $id)
    {
        $legalDocument = LegalDocument::findOrFail($id);

        if (!$legalDocument->file_path || !Storage::disk('public')->exists($legalDocument->file_path)) {
            abort(404, 'File not found.');
        }

        // Increment download count
        $legalDocument->incrementDownloads();

        return Storage::disk('public')->download($legalDocument->file_path, $legalDocument->file_name);
    }

    /**
     * Toggle the active status of a legal document.
     */
    public function toggleActive(string $id)
    {
        $legalDocument = LegalDocument::findOrFail($id);
        $legalDocument->update(['is_active' => !$legalDocument->is_active]);

        return response()->json([
            'success' => true,
            'is_active' => $legalDocument->is_active,
            'message' => 'Active status updated successfully.'
        ]);
    }

    /**
     * Toggle the consent requirement of a legal document.
     */
    public function toggleConsent(string $id)
    {
        $legalDocument = LegalDocument::findOrFail($id);
        $legalDocument->update(['requires_consent' => !$legalDocument->requires_consent]);

        return response()->json([
            'success' => true,
            'requires_consent' => $legalDocument->requires_consent,
            'message' => 'Consent requirement updated successfully.'
        ]);
    }
}
