@extends('admin.layouts.app')

@section('title', 'View Service')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Service Details</h1>
            <p class="text-gray-600">View service information</p>
        </div>
        <div class="flex space-x-3">
            <a href="{{ route('admin.services.edit', $service->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg flex items-center">
                <i class="fas fa-edit mr-2"></i>
                Edit
            </a>
            <a href="{{ route('admin.services.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg flex items-center">
                <i class="fas fa-arrow-left mr-2"></i>
                Back to List
            </a>
        </div>
    </div>

    <!-- Content -->
    <div class="bg-white rounded-lg shadow-sm p-6">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Left Column -->
            <div class="space-y-6">
                <div>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">Basic Information</h3>
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <p class="text-sm text-gray-600 mb-1">Service Name</p>
                        <p class="text-lg font-semibold text-gray-900">{{ $service->name }}</p>
                        
                        @if($service->description)
                            <p class="text-sm text-gray-600 mb-1 mt-3">Description</p>
                            <p class="text-gray-900">{{ $service->description }}</p>
                        @endif
                    </div>
                </div>

                @if($service->content)
                    <div>
                        <h3 class="text-lg font-medium text-gray-900 mb-2">Content</h3>
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <p class="text-gray-900">{{ $service->content }}</p>
                        </div>
                    </div>
                @endif

                @if($service->icon)
                    <div>
                        <h3 class="text-lg font-medium text-gray-900 mb-2">Icon</h3>
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <i class="{{ $service->icon }} text-2xl text-blue-600"></i>
                            <p class="text-sm text-gray-600 mt-2">{{ $service->icon }}</p>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Right Column -->
            <div class="space-y-6">
                <!-- Service Image -->
                @if($service->image)
                    <div>
                        <h3 class="text-lg font-medium text-gray-900 mb-2">Service Image</h3>
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <img src="{{ $service->image_url }}" alt="{{ $service->name }}" class="w-full h-auto rounded-lg max-h-64 object-cover">
                            <p class="text-sm text-gray-600 mt-2">Image file: {{ basename($service->image) }}</p>
                        </div>
                    </div>
                @endif

                <!-- Status -->
                <div>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">Status</h3>
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <div class="flex items-center">
                            @if($service->is_active)
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    <i class="fas fa-check-circle mr-1"></i>
                                    Active
                                </span>
                            @else
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                    <i class="fas fa-times-circle mr-1"></i>
                                    Inactive
                                </span>
                            @endif
                        </div>
                        <p class="text-sm text-gray-600 mt-2">Sort Order: {{ $service->sort_order }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Created/Updated Info -->
        <div class="mt-8 pt-6 border-t border-gray-200">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm text-gray-600">
                <div>
                    <p><strong>Created:</strong> {{ $service->created_at->format('F j, Y \a\t g:i A') }}</p>
                </div>
                <div>
                    <p><strong>Last Updated:</strong> {{ $service->updated_at->format('F j, Y \a\t g:i A') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
