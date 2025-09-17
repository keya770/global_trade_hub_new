@extends('admin.layouts.app')

@section('title', $sector->title)

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">{{ $sector->title }}</h1>
            <p class="text-gray-600">Sector Details</p>
        </div>
        <div class="flex space-x-2">
            <a href="{{ route('admin.sectors.edit', $sector) }}" class="bg-[#265478] hover:bg-[#1e4260] text-white px-4 py-2 rounded-lg">
                <i class="fas fa-edit mr-2"></i>
                Edit
            </a>
            <a href="{{ route('admin.sectors.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg">
                <i class="fas fa-arrow-left mr-2"></i>
                Back
            </a>
        </div>
    </div>

    <!-- Sector Details -->
    <div class="bg-white shadow rounded-lg overflow-hidden">
        <!-- Image -->
        @if($sector->image)
        <div class="h-64 bg-gray-200">
            <img src="{{ $sector->image_url }}" alt="{{ $sector->title }}" class="w-full h-full object-cover">
        </div>
        @endif

        <!-- Content -->
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Basic Info -->
                <div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Basic Information</h3>
                    
                    <div class="space-y-3">
                        <div>
                            <label class="text-sm font-medium text-gray-500">Title</label>
                            <p class="text-gray-900">{{ $sector->title }}</p>
                        </div>
                        
                        <div>
                            <label class="text-sm font-medium text-gray-500">Slug</label>
                            <p class="text-gray-900">{{ $sector->slug }}</p>
                        </div>
                        
                        <div>
                            <label class="text-sm font-medium text-gray-500">Status</label>
                            <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full {{ $sector->status ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ $sector->status ? 'Active' : 'Inactive' }}
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Sector Details -->
                <div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Sector Details</h3>
                    
                    <div class="space-y-3">
                        @if($sector->vessel_sizes)
                        <div>
                            <label class="text-sm font-medium text-gray-500">Vessel Sizes</label>
                            <p class="text-gray-900">{{ $sector->vessel_sizes }}</p>
                        </div>
                        @endif
                        
                        @if($sector->cargo_types)
                        <div>
                            <label class="text-sm font-medium text-gray-500">Cargo Types</label>
                            <p class="text-gray-900">{{ $sector->cargo_types }}</p>
                        </div>
                        @endif
                        
                        @if($sector->services)
                        <div>
                            <label class="text-sm font-medium text-gray-500">Services</label>
                            <p class="text-gray-900">{{ $sector->services }}</p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Description -->
            <div class="mt-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Description</h3>
                <div class="prose max-w-none">
                    {!! nl2br(e($sector->description)) !!}
                </div>
            </div>

            <!-- Timestamps -->
            <div class="mt-6 pt-6 border-t border-gray-200">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm text-gray-500">
