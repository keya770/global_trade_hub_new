@extends('admin.layouts.app')

@section('title', 'Testimonial Details')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Testimonial Details</h1>
            <p class="text-gray-600">Full information about this testimonial</p>
        </div>
        <a href="{{ route('admin.testimonials.index') }}" 
           class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-4 py-2 rounded-lg">
            <i class="fas fa-arrow-left mr-2"></i> Back
        </a>
    </div>

    <!-- Card -->
    <div class="bg-white shadow rounded-lg p-6 space-y-6">
        <!-- Client Info -->
        <div class="flex items-center space-x-4">
            @if($testimonial->client_image)
                <img src="{{ asset('storage/' . $testimonial->client_image) }}" 
                     class="h-16 w-16 rounded-full object-cover" alt="Client">
            @else
                <div class="h-16 w-16 rounded-full bg-gray-200 flex items-center justify-center text-gray-400">
                    <i class="fas fa-user text-xl"></i>
                </div>
            @endif
            <div>
                <h2 class="text-lg font-semibold">{{ $testimonial->client_name }}</h2>
                <p class="text-sm text-gray-600">{{ $testimonial->client_position }}</p>
            </div>
        </div>

        <!-- Company Info -->
        <div>
            <h3 class="text-sm font-semibold text-gray-500">Company</h3>
            <div class="flex items-center mt-2">
                @if($testimonial->company_logo)
                    <img src="{{ asset('storage/' . $testimonial->company_logo) }}" 
                         class="h-10 w-10 object-contain mr-2" alt="Company Logo">
                @endif
                <span class="text-gray-800 font-medium">{{ $testimonial->company_name }}</span>
            </div>
        </div>

        <!-- Testimonial -->
        <div>
            <h3 class="text-sm font-semibold text-gray-500">Testimonial</h3>
            <p class="mt-2 text-gray-700">{{ $testimonial->testimonial }}</p>
        </div>

        <!-- Rating -->
        <div>
            <h3 class="text-sm font-semibold text-gray-500">Rating</h3>
            <div class="flex mt-2 text-yellow-400">
                @for($i = 1; $i <= 5; $i++)
                    <i class="fas fa-star {{ $i <= $testimonial->rating ? '' : 'text-gray-300' }}"></i>
                @endfor
            </div>
        </div>

        <!-- Service Type -->
        <div>
            <h3 class="text-sm font-semibold text-gray-500">Service Type</h3>
            <p class="mt-1 text-gray-700">{{ $testimonial->service_type }}</p>
        </div>

        <!-- Status -->
        <div class="grid grid-cols-2 gap-4">
            <div>
                <h3 class="text-sm font-semibold text-gray-500">Featured</h3>
                <p class="mt-1">
                    @if($testimonial->is_featured)
                        <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-800">Yes</span>
                    @else
                        <span class="px-2 py-1 text-xs rounded-full bg-gray-100 text-gray-800">No</span>
                    @endif
                </p>
            </div>
            <div>
                <h3 class="text-sm font-semibold text-gray-500">Active</h3>
                <p class="mt-1">
                    @if($testimonial->is_active)
                        <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-800">Active</span>
                    @else
                        <span class="px-2 py-1 text-xs rounded-full bg-red-100 text-red-800">Inactive</span>
                    @endif
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
