@extends('admin.layouts.app')

@section('title', 'Create Testimonial')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Create Testimonial</h1>
            <p class="text-gray-600">Add a client testimonial for your services</p>
        </div>
        <a href="{{ route('admin.testimonials.index') }}" 
           class="bg-[#265478] hover:bg-[#1e4260] text-white px-4 py-2 rounded-lg flex items-center">
            <i class="fas fa-arrow-left mr-2"></i>
            Back to Testimonials
        </a>
    </div>

    <!-- Form -->
    <div class="bg-white rounded-lg shadow-sm p-6">
        <form action="{{ route('admin.testimonials.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Client Name -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Client Name</label>
                <input type="text" name="client_name" value="{{ old('client_name') }}" 
                       class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-[#265478] focus:border-[#265478]">
                @error('client_name') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Client Position -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Client Position</label>
                <input type="text" name="client_position" value="{{ old('client_position') }}" 
                       class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-[#265478] focus:border-[#265478]">
                @error('client_position') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Company Name -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Company Name</label>
                <input type="text" name="company_name" value="{{ old('company_name') }}" 
                       class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-[#265478] focus:border-[#265478]">
                @error('company_name') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Testimonial -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Testimonial</label>
                <textarea name="testimonial" rows="4" 
                          class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-[#265478] focus:border-[#265478]">{{ old('testimonial') }}</textarea>
                @error('testimonial') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Client Image -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Client Image</label>
                <input type="file" name="client_image" accept="image/*"
                       class="mt-1 block w-full text-sm text-gray-700 border border-gray-300 rounded-lg cursor-pointer focus:outline-none">
                @error('client_image') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Company Logo -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Company Logo</label>
                <input type="file" name="company_logo" accept="image/*"
                       class="mt-1 block w-full text-sm text-gray-700 border border-gray-300 rounded-lg cursor-pointer focus:outline-none">
                @error('company_logo') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Rating -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Rating</label>
                <select name="rating" 
                        class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-[#265478] focus:border-[#265478]">
                    <option value="">Select Rating</option>
                    @for($i = 1; $i <= 5; $i++)
                        <option value="{{ $i }}" {{ old('rating') == $i ? 'selected' : '' }}>
                            {{ $i }} Star{{ $i > 1 ? 's' : '' }}
                        </option>
                    @endfor
                </select>
                @error('rating') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Service Type -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Service Type</label>
                <input type="text" name="service_type" value="{{ old('service_type') }}" 
                       class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-[#265478] focus:border-[#265478]">
                @error('service_type') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Featured -->
            <div class="flex items-center">
                <input type="checkbox" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }}
                       class="h-4 w-4 text-[#265478] border-gray-300 rounded focus:ring-[#265478]">
                <label class="ml-2 block text-sm text-gray-700">Featured Testimonial</label>
            </div>

            <!-- Active -->
            <div class="flex items-center">
                <input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}
                       class="h-4 w-4 text-[#265478] border-gray-300 rounded focus:ring-[#265478]">
                <label class="ml-2 block text-sm text-gray-700">Active</label>
            </div>

            <!-- Sort Order -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Sort Order</label>
                <input type="number" name="sort_order" value="{{ old('sort_order', 0) }}" 
                       class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-[#265478] focus:border-[#265478]">
                @error('sort_order') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Submit Button -->
            <div class="pt-4">
                <button type="submit" 
                        class="bg-[#265478] hover:bg-[#1e4260] text-white px-6 py-2 rounded-lg shadow">
                    Create Testimonial
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
