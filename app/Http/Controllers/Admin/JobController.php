<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CareerApplication;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the jobs.
     */
    public function index()
    {
        $jobs = CareerApplication::latest()->paginate(15);
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
            'requirements' => 'nullable|string',
            'responsibilities' => 'nullable|string',
            'location' => 'nullable|string|max:255',
            'department' => 'nullable|string|max:255',
            'employment_type' => 'nullable|string|max:100',
            'experience_level' => 'nullable|string|max:100',
            'salary_min' => 'nullable|numeric|min:0',
            'salary_max' => 'nullable|numeric|min:0',
            'salary_currency' => 'nullable|string|max:10',
            'is_remote' => 'boolean',
            'is_active' => 'boolean',
            'application_deadline' => 'nullable|date',
        ]);

        $validated['is_remote'] = $request->has('is_remote');
        $validated['is_active'] = $request->has('is_active');
        $validated['applications_count'] = 0;

        CareerApplication::create($validated);

        return redirect()->route('admin.jobs.index')
            ->with('success', 'Job created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(CareerApplication $job)
    {
        return view('admin.jobs.show', compact('job'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CareerApplication $job)
    {
        return view('admin.jobs.edit', compact('job'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CareerApplication $job)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:career_jobs,slug,' . $job->id,
            'description' => 'required|string',
            'requirements' => 'nullable|string',
            'responsibilities' => 'nullable|string',
            'location' => 'nullable|string|max:255',
            'department' => 'nullable|string|max:255',
            'employment_type' => 'nullable|string|max:100',
            'experience_level' => 'nullable|string|max:100',
            'salary_min' => 'nullable|numeric|min:0',
            'salary_max' => 'nullable|numeric|min:0',
            'salary_currency' => 'nullable|string|max:10',
            'is_remote' => 'boolean',
            'is_active' => 'boolean',
            'application_deadline' => 'nullable|date',
        ]);

        $validated['is_remote'] = $request->has('is_remote');
        $validated['is_active'] = $request->has('is_active');

        $job->update($validated);

        return redirect()->route('admin.jobs.index')
            ->with('success', 'Job updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CareerApplication $job)
    {
        $job->delete();

        return redirect()->route('admin.jobs.index')
            ->with('success', 'Job deleted successfully.');
    }

    /**
     * Toggle the active status of a job.
     */
    public function toggleActive(CareerApplication $job)
    {
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
    public function toggleRemote(CareerApplication $job)
    {
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
    public function incrementApplications(CareerApplication $job)
    {
        $job->increment('applications_count');

        return response()->json([
            'success' => true,
            'applications_count' => $job->applications_count
        ]);
    }
}
