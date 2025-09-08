@extends('admin.layouts.app')

@section('title', 'Edit Sector')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Edit Sector</h1>
            <p class="text-gray-600">Update sector information</p>
        </div>
        <a href="{{ route('admin.sectors.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg">
            <i class="fas fa-arrow-left mr-2"></i>
            Back to Sectors
        </a>
    </div>

    <!-- Form -->
    <div class="bg-white shadow rounded-lg p-6">
        <form action="{{ route('admin.sectors.update', $sector) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Title -->
                <div class="md:col-span-2">
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Title *</label>
                    <input type="text" name="title" id="title" value="{{ old('title', $sector->title) }}" 
                           class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#265478] focus:border-transparent" 
                           placeholder="e.g., Dry Bulk Carriers">
                    @error('title')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description -->
                <div class="md:col-span-2">
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description *</label>
                    <textarea name="description" id="description" rows="4" 
                              class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#265478] focus:border-transparent" 
                              placeholder="Describe this sector...">{{ old('description', $sector->description) }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Vessel Sizes -->
                <div>
                    <label for="vessel_sizes" class="block text-sm font-medium text-gray-700 mb-2">Vessel Sizes</label>
                    <input type="text" name="vessel_sizes" id="vessel_sizes" value="{{ old('vessel_sizes', $sector->vessel_sizes) }}" 
                           class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#265478] focus:border-transparent" 
                           placeholder="e.g., Handysize, Panamax, Capesize">
                    @error('vessel_sizes')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Cargo Types -->
                <div>
                    <label for="cargo_types" class="block text-sm font-medium text-gray-700 mb-2">Cargo Types</label>
                    <input type="text" name="cargo_types" id="cargo_types" value="{{ old('cargo_types', $sector->cargo_types) }}" 
                           class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#265478] focus:border-transparent" 
                           placeholder="e.g., Iron Ore, Coal, Grain">
                    @error('cargo_types')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Services -->
                <div class="md:col-span-2">
                    <label for="services" class="block text-sm font-medium text-gray-700 mb-2">Services</label>
                    <input type="text" name="services" id="services" value="{{ old('services', $sector->services) }}" 
                           class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#265478] focus:border-transparent" 
                           placeholder="e.g., Chartering, Sale & Purchase, Valuation">
                    @error('services')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Current Image -->
                @if($sector->image)
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Current Image</label>
                    <img src="{{ $sector->image_url }}" alt="{{ $sector->title }}" class="h-32 w-auto object-cover rounded-lg">
                </div>
                @endif

                <!-- New Image -->
                <div class="md:col-span-2">
                    <label for="image" class="block text-sm font-medium text-gray-700 mb-2">New Image</label>
                    <input type="file" name="image" id="image" 
                           class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#265478] focus:border-transparent" 
                           accept="image/*">
                    <p class="text-sm text-gray-500 mt-1">Upload a new banner image for this sector (optional)</p>
                    @error('image')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Status -->
                <div class="md:col-span-2">
                    <label class="flex items-center">
                        <input type="checkbox" name="status" value="1" {{ old('status', $sector->status) ? 'checked' : '' }} 
                               class="rounded border-gray-300 text-[#265478] focus:ring-[#265478]">
                        <span class="ml-2 text-sm text-gray-700">Active</span>
                    </label>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end mt-6">
                <button type="submit" class="bg-[#265478] hover:bg-[#1e4260] text-white px-6 py-2 rounded-lg">
                    <i class="fas fa-save mr-2"></i>
                    Update Sector
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
```
