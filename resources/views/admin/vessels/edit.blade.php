@extends('admin.layouts.app')

@section('title', 'Service Details')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">{{ $service->name }}</h1>
            <p class="text-gray-600">Service details and information</p>
        </div>
        <div class="flex space-x-3">
            <a href="{{ route('admin.services.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg flex items-center">
                <i class="fas fa-arrow-left mr-2"></i>
                Back to List
            </a>
            <a href="{{ route('admin.services.edit', $service->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg flex items-center">
                <i class="fas fa-edit mr-2"></i>
                Edit
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Main Content -->
        <div class="lg:col-span-2 space-y-6">
            
            <!-- Basic Information -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Basic Information</h2>
                <div class="space-y-4">
                    <x-admin.detail label="Service Name" :value="$service->name" />
                    <x-admin.detail label="Slug" :value="$service->slug" mono />
                    <x-admin.detail label="Short Description" :value="$service->description" />
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Icon</label>
                        <div class="flex items-center space-x-2">
                            @if($service->icon)
                                <i class="{{ $service->icon }} text-2xl text-[#265478]"></i>
                                <span class="text-gray-900 font-mono">{{ $service->icon }}</span>
                            @else
                                <span class="text-gray-500">No icon set</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Full Content -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Full Content</h2>
                <div class="prose max-w-none">
                    {!! nl2br(e($service->content)) !!}
                </div>
            </div>

            <!-- SEO Information -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">SEO Settings</h2>
                <x-admin.detail label="Meta Title" :value="$service->meta_title ?: 'Not set'" />
                <x-admin.detail label="Meta Description" :value="$service->meta_description ?: 'Not set'" />
            </div>
        </div>

        <!-- Sidebar -->
        <div class="space-y-6">
            
            <!-- Service Image -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Service Image</h3>
                @if($service->image)
                    <img src="{{ Storage::url($service->image) }}" alt="{{ $service->name }}" class="w-full h-auto rounded-lg">
                @else
                    <div class="bg-gray-100 rounded-lg p-8 text-center">
                        <i class="fas fa-image text-4xl text-gray-400 mb-2"></i>
                        <p class="text-gray-500">No image uploaded</p>
                    </div>
                @endif
            </div>

            <!-- Status & Settings -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Status & Settings</h3>
                <div class="space-y-4">
                    <div class="flex items-center justify-between">
                        <span class="text-sm font-medium text-gray-500">Status</span>
                        <button type="button" 
                            class="toggle-status-btn px-3 py-1 rounded-full text-sm font-medium {{ $service->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}"
                            data-id="{{ $service->id }}"
                            data-current-status="{{ $service->is_active }}">
                            {{ $service->is_active ? 'Active' : 'Inactive' }}
                        </button>
                    </div>
                    <x-admin.detail label="Sort Order" :value="$service->sort_order" />
                    <x-admin.detail label="Created" :value="$service->created_at->format('M d, Y \a\t g:i A')" />
                    <x-admin.detail label="Last Updated" :value="$service->updated_at->format('M d, Y \a\t g:i A')" />
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Quick Actions</h3>
                <div class="space-y-3">
                    <a href="{{ route('admin.services.edit', $service->id) }}" 
                        class="w-full bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg flex items-center justify-center">
                        <i class="fas fa-edit mr-2"></i>
                        Edit Service
                    </a>
                    <button type="button" 
                        class="w-full bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg flex items-center justify-center delete-btn"
                        data-id="{{ $service->id }}"
                        data-name="{{ $service->name }}">
                        <i class="fas fa-trash mr-2"></i>
                        Delete Service
                    </button>
                </div>
            </div>

        </div>
    </div>
</div>

@include('admin.partials.delete-modal', ['entity' => 'service'])
@endsection
