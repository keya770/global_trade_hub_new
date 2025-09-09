@extends('admin.layouts.app')

@section('title', 'View Hero Section')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Hero Section Details</h1>
            <p class="text-gray-600">View hero section information</p>
        </div>
        <div class="flex space-x-3">
            <a href="{{ route('admin.hero-sections.edit', $heroSection->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg flex items-center">
                <i class="fas fa-edit mr-2"></i>
                Edit
            </a>
            <a href="{{ route('admin.hero-sections.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg flex items-center">
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
                    <h3 class="text-lg font-medium text-gray-900 mb-2">Title Information</h3>
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <p class="text-sm text-gray-600 mb-1">Main Title</p>
                        <p class="text-lg font-semibold text-gray-900">{{ $heroSection->title }}</p>
                        
                        @if($heroSection->accent_text)
                            <p class="text-sm text-gray-600 mb-1 mt-3">Accent Text</p>
                            <p class="text-lg font-semibold text-blue-600">{{ $heroSection->accent_text }}</p>
                        @endif
                    </div>
                </div>

                <div>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">Description</h3>
                    <div class="bg-gray-50 p-4 rounded-lg">
                        @if($heroSection->hero_description)
                            <p class="text-gray-900">{{ $heroSection->hero_description }}</p>
                        @else
                            <p class="text-gray-500 italic">No description provided</p>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Right Column -->
            <div class="space-y-6">
                <!-- Primary Button -->
                <div>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">Primary Button</h3>
                    <div class="bg-gray-50 p-4 rounded-lg">
                        @if($heroSection->button_text)
                            <p class="text-sm text-gray-600 mb-1">Button Text</p>
                            <p class="text-lg font-semibold text-gray-900">{{ $heroSection->button_text }}</p>
                            
                            @if($heroSection->button_url)
                                <p class="text-sm text-gray-600 mb-1 mt-3">Button URL</p>
                                <a href="{{ $heroSection->button_url }}" target="_blank" class="text-blue-600 hover:text-blue-800 break-all">
                                    {{ $heroSection->button_url }}
                                </a>
                            @endif
                        @else
                            <p class="text-gray-500 italic">No primary button configured</p>
                        @endif
                    </div>
                </div>

                <!-- Secondary Button -->
                <div>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">Secondary Button</h3>
                    <div class="bg-gray-50 p-4 rounded-lg">
                        @if($heroSection->secondary_button_text)
                            <p class="text-sm text-gray-600 mb-1">Button Text</p>
                            <p class="text-lg font-semibold text-gray-900">{{ $heroSection->secondary_button_text }}</p>
                            
                            @if($heroSection->secondary_button_url)
                                <p class="text-sm text-gray-600 mb-1 mt-3">Button URL</p>
                                <a href="{{ $heroSection->secondary_button_url }}" target="_blank" class="text-blue-600 hover:text-blue-800 break-all">
                                    {{ $heroSection->secondary_button_url }}
                                </a>
                            @endif
                        @else
                            <p class="text-gray-500 italic">No secondary button configured</p>
                        @endif
                    </div>
                </div>

                <!-- Background Video -->
                <div>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">Background Video</h3>
                    <div class="bg-gray-50 p-4 rounded-lg">
                        @if($heroSection->background_video)
                            <video controls class="w-full rounded-lg">
                                <source src="{{ asset('storage/' . $heroSection->background_video) }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                            <p class="text-sm text-gray-600 mt-2">Video file: {{ basename($heroSection->background_video) }}</p>
                        @else
                            <p class="text-gray-500 italic">No background video uploaded</p>
                        @endif
                    </div>
                </div>

                <!-- Status -->
                <div>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">Status</h3>
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <div class="flex items-center">
                            @if($heroSection->is_active)
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
                    </div>
                </div>
            </div>
        </div>

        <!-- Created/Updated Info -->
        <div class="mt-8 pt-6 border-t border-gray-200">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm text-gray-600">
                <div>
                    <p><strong>Created:</strong> {{ $heroSection->created_at->format('F j, Y \a\t g:i A') }}</p>
                </div>
                <div>
                    <p><strong>Last Updated:</strong> {{ $heroSection->updated_at->format('F j, Y \a\t g:i A') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
