<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = Job::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.jobs.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:career_jobs',
            'description' => 'required|string',
            'requirements' => 'required|string',
            'responsibilities' => 'required|string',
            'location' => 'required|string|max:255',
            'department' => 'required|string|max:100',
            'employment_type' => 'required|string|max:50',
            'experience_level' => 'required|string|max:50',
            'salary_min' => 'nullable|numeric|min:0',
            'salary_max' => 'nullable|numeric|min:0',
            'salary_currency' => 'nullable|string|max:10',
            'is_remote' => 'boolean',
            'is_active' => 'boolean',
            'application_deadline' => 'nullable|date|after:today',
        ]);

        // Generate slug if not provided
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        $validated['is_remote'] = $request->has('is_remote');
        $validated['is_active'] = $request->has('is_active');
        $validated['applications_count'] = 0;

        Job::create($validated);

        return redirect()->route('admin.jobs.index')
            ->with('success', 'Job created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $job = Job::findOrFail($id);
        return view('admin.jobs.show', compact('job'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $job = Job::findOrFail($id);
        return view('admin.jobs.edit', compact('job'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $job = Job::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:career_jobs,slug,' . $id,
            'description' => 'required|string',
            'requirements' => 'required|string',
            'responsibilities' => 'required|string',
            'location' => 'required|string|max:255',
            'department' => 'required|string|max:100',
            'employment_type' => 'required|string|max:50',
            'experience_level' => 'required|string|max:50',
            'salary_min' => 'nullable|numeric|min:0',
            'salary_max' => 'nullable|numeric|min:0',
            'salary_currency' => 'nullable|string|max:10',
            'is_remote' => 'boolean',
            'is_active' => 'boolean',
            'application_deadline' => 'nullable|date',
        ]);

        // Generate slug if not provided
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        $validated['is_remote'] = $request->has('is_remote');
        $validated['is_active'] = $request->has('is_active');

        $job->update($validated);

        return redirect()->route('admin.jobs.index')
            ->with('success', 'Job updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $job = Job::findOrFail($id);
        $job->delete();

        return redirect()->route('admin.jobs.index')
            ->with('success', 'Job deleted successfully.');
    }

    /**
     * Toggle the active status of a job.
     */
    public function toggleActive(string $id)
    {
        $job = Job::findOrFail($id);
        $job->update(['is_active' => !$job->is_active]);

        return response()->json([
            'success' => true,
            'is_active' => $job->is_active,
            'message' => 'Active status updated successfully.'
        ]);
    }

    /**
     * Toggle the remote status of a job.
     */
    public function toggleRemote(string $id)
    {
        $job = Job::findOrFail($id);
        $job->update(['is_remote' => !$job->is_remote]);

        return response()->json([
            'success' => true,
            'is_remote' => $job->is_remote,
            'message' => 'Remote status updated successfully.'
        ]);
    }

    /**
     * Increment the applications count for a job.
     */
    public function incrementApplications(string $id)
    {
        $job = Job::findOrFail($id);
        $job->increment('applications_count');

        return response()->json([
            'success' => true,
            'applications_count' => $job->applications_count
        ]);
    }
}
