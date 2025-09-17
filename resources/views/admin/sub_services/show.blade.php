@extends('admin.layouts.app')

@section('title', $subService->name)

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">{{ $subService->name }}</h1>
            <p class="text-gray-600">Sub Service Details</p>
        </div>
        <div class="flex space-x-2">
            <a href="{{ route('admin.sub_services.edit', $subService) }}" class="bg-[#265478] hover:bg-[#1e4260] text-white px-4 py-2 rounded-lg">
                <i class="fas fa-edit mr-2"></i>
                Edit
            </a>
            <a href="{{ route('admin.sub_services.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg">
                <i class="fas fa-arrow-left mr-2"></i>
                Back
            </a>
        </div>
    </div>

    <!-- Sub Service Details -->
    <div class="bg-white shadow rounded-lg overflow-hidden">
        <!-- Image -->
        @if($subService->image)
        <div class="h-64 bg-gray-200">
            <img src="{{ $subService->image_url }}" alt="{{ $subService->name }}" class="w-full h-full object-cover">
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
                            <label class="text-sm font-medium text-gray-500">Name</label>
                            <p class="text-gray-900">{{ $subService->name }}</p>
                        </div>
                        
                        <div>
                            <label class="text-sm font-medium text-gray-500">Main Service</label>
                            <p class="text-gray-900">{{ $subService->service->name ?? 'N/A' }}</p>
                        </div>
                        
                        <div>
                            <label class="text-sm font-medium text-gray-500">Parent</label>
                            <p class="text-gray-900">
                                @if($subService->parent)
                                    {{ $subService->parent->name }}
                                @else
                                    <span class="text-gray-400">Top Level</span>
                                @endif
                            </p>
                        </div>
                        
                        <div>
                            <label class="text-sm font-medium text-gray-500">Type</label>
                            <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full {{ $subService->isSubSubService() ? 'bg-blue-100 text-blue-800' : 'bg-green-100 text-green-800' }}">
                                {{ $subService->isSubSubService() ? 'Sub-Sub Service' : 'Sub Service' }}
                            </span>
                        </div>
                        
                        <div>
                            <label class="text-sm font-medium text-gray-500">Status</label>
                            <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full {{ $subService->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ $subService->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </div>
                        
                        <div>
                            <label class="text-sm font-medium text-gray-500">Sort Order</label>
                            <p class="text-gray-900">{{ $subService->sort_order }}</p>
                        </div>
                    </div>
                </div>

                <!-- Additional Details -->
                <div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Additional Details</h3>
                    
                    <div class="space-y-3">
                        @if($subService->icon)
                        <div>
                            <label class="text-sm font-medium text-gray-500">Icon</label>
                            <p class="text-gray-900">{{ $subService->icon }}</p>
                        </div>
                        @endif
                        
                        @if($subService->children->count() > 0)
                        <div>
                            <label class="text-sm font-medium text-gray-500">Sub-Sub Services</label>
                            <div class="space-y-1">
                                @foreach($subService->children as $child)
                                    <div class="text-sm text-gray-900">{{ $child->name }}</div>
                                @endforeach
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Description -->
            @if($subService->description)
            <div class="mt-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Description</h3>
                <div class="prose max-w-none">
                    {!! nl2br(e($subService->description)) !!}
                </div>
            </div>
            @endif

            <!-- Content -->
            @if($subService->content)
            <div class="mt-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Content</h3>
                <div class="prose max-w-none">
                    {!! nl2br(e($subService->content)) !!}
                </div>
            </div>
            @endif

            <!-- Timestamps -->
            <div class="mt-6 pt-6 border-t border-gray-200">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm text-gray-500">
                    <div>
                        <span class="font-medium">Created:</span> {{ $subService->created_at->format('F d, Y \a\t g:i A') }}
                    </div>
                    <div>
                        <span class="font-medium">Last Updated:</span> {{ $subService->updated_at->format('F d, Y \a\t g:i A') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
