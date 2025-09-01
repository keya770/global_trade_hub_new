<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the job applications.
     */
    public function index()
    {
        // Fetch all applications with related job info
        $applications = Job::with('job')->latest()->paginate(10);

        return view('admin.jobs.index', compact('applications'));
    }

    /**
     * Display the specified job application.
     */
    public function show(Job $jobApplication)
    {
        return view('admin.jobs.show', compact('jobApplication'));
    }

    /**
     * Remove the specified job application from storage.
     */
    public function destroy(Job $jobApplication)
    {
        // If resume file exists, delete it from storage
        if ($jobApplication->resume && \Storage::exists('public/' . $jobApplication->resume)) {
            \Storage::delete('public/' . $jobApplication->resume);
        }

        $jobApplication->delete();

        return redirect()->route('admin.jobs.index')
                         ->with('success', 'Job application deleted successfully.');
    }
}
