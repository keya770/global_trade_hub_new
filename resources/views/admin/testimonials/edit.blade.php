@extends('admin.layouts.app')

@section('title', 'Edit Testimonial')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Edit Testimonial</h1>
            <p class="text-gray-600">Update testimonial information</p>
        </div>
        <a href="{{ route('admin.testimonials.index') }}" 
           class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-4 py-2 rounded-lg">
            <i class="fas fa-arrow-left mr-2"></i> Back
        </a>
    </div>

    <!-- Form -->
    <div class="bg-white shadow rounded-lg p-6">
        <form action="{{ route('admin.testimonials.update', $testimonial->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Client Name -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Client Name</label>
                <input type="text" name="client_name" value="{{ old('client_name', $testimonial->client_name) }}" 
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
            </div>

            <!-- Client Position -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Client Position</label>
                <input type="text" name="client_position" value="{{ old('client_position', $testimonial->client_position) }}" 
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
            </div>

            <!-- Company Name -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Company Name</label>
                <input type="text" name="company_name" value="{{ old('company_name', $testimonial->company_name) }}" 
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
            </div>

            <!-- Testimonial -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Testimonial</label>
                <textarea name="testimonial" rows="4" 
                          class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">{{ old('testimonial', $testimonial->testimonial) }}</textarea>
            </div>

            <!-- Client Image -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Client Image</label>
                @if($testimonial->client_image)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $testimonial->client_image) }}" class="h-16 w-16 rounded-full object-cover">
                    </div>
                @endif
                <input type="file" name="client_image" class="mt-1 block w-full text-sm text-gray-500">
            </div>

            <!-- Company Logo -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Company Logo</label>
                @if($testimonial->company_logo)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $testimonial->company_logo) }}" class="h-16 w-16 object-contain">
                    </div>
                @endif
                <input type="file" name="company_logo" class="mt-1 block w-full text-sm text-gray-500">
            </div>

            <!-- Rating -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Rating</label>
                <select name="rating" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    @for($i = 1; $i <= 5; $i++)
                        <option value="{{ $i }}" {{ $testimonial->rating == $i ? 'selected' : '' }}>{{ $i }}</option>
                    @endfor
                </select>
            </div>

            <!-- Service Type -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Service Type</label>
                <input type="text" name="service_type" value="{{ old('service_type', $testimonial->service_type) }}" 
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
            </div>

            <!-- Featured -->
            <div class="flex items-center space-x-2">
                <input type="checkbox" name="is_featured" value="1" {{ $testimonial->is_featured ? 'checked' : '' }} class="rounded border-gray-300">
                <label class="text-sm text-gray-700">Featured</label>
            </div>

            <!-- Active -->
            <div class="flex items-center space-x-2">
                <input type="checkbox" name="is_active" value="1" {{ $testimonial->is_active ? 'checked' : '' }} class="rounded border-gray-300">
                <label class="text-sm text-gray-700">Active</label>
            </div>

            <!-- Sort Order -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Sort Order</label>
                <input type="number" name="sort_order" value="{{ old('sort_order', $testimonial->sort_order) }}" 
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
            </div>

            <!-- Submit -->
            <div>
                <button type="submit" class="bg-[#265478] hover:bg-[#1e4260] text-white px-4 py-2 rounded-lg">
                    Update Testimonial
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
