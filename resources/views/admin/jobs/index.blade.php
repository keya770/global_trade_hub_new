@extends('admin.layouts.app')

@section('title', 'Job Applications')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Job Applications</h1>
            <p class="text-gray-600">Manage all submitted career applications</p>
        </div>
    </div>

    <!-- Applications Table -->
    <div class="bg-white shadow rounded-lg overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Name</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Email</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Phone</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Position</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Resume</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Submitted At</th>
                    <th class="px-6 py-3 text-right text-sm font-medium text-gray-700">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 bg-white">
                @forelse($applications as $application)
                    <tr>
                        <td class="px-6 py-4 text-sm font-medium text-gray-900">
                            {{ $application->first_name }} {{ $application->last_name }}
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600">{{ $application->email }}</td>
                        <td class="px-6 py-4 text-sm text-gray-600">{{ $application->phone }}</td>
                        <td class="px-6 py-4 text-sm text-gray-600">
                            {{ optional($application->job)->title }}
                        </td>
                        <td class="px-6 py-4 text-sm text-blue-600">
                            @if($application->resume)
                                <a href="{{ asset('storage/'.$application->resume) }}" target="_blank" class="hover:underline">
                                    Download
                                </a>
                            @else
                                <span class="text-gray-400">No File</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600">{{ $application->created_at->format('d M, Y') }}</td>
                        <td class="px-6 py-4 text-right text-sm font-medium">
                            <a href="{{ route('admin.job-applications.show', $application->id) }}"
                               class="text-indigo-600 hover:text-indigo-900">View</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-6 py-4 text-center text-gray-500">No applications found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
