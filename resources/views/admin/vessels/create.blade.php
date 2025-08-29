@extends('admin.layouts.app')

@section('title', 'Create Vessel Listing')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Create Vessel Listing</h1>
            <p class="text-gray-600">Add a new vessel to your listings</p>
        </div>
        <a href="{{ route('admin.vessels.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg flex items-center">
            <i class="fas fa-arrow-left mr-2"></i>
            Back to List
        </a>
    </div>

    <!-- Form -->
    <div class="bg-white rounded-lg shadow-sm">
        <form action="{{ route('admin.vessels.store') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
            @csrf
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Left Column -->
                <div class="space-y-6">
                    <!-- Name -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Vessel Name *</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" 
                               class="w-full px-3 py-2 border rounded-lg @error('name') border-red-500 @enderror"
                               placeholder="Enter vessel name">
                        @error('name')<p class="text-red-600 text-sm">{{ $message }}</p>@enderror
                    </div>

                    <!-- Type -->
                    <div>
                        <label for="type" class="block text-sm font-medium text-gray-700 mb-2">Vessel Type *</label>
                        <select name="type" id="type" class="w-full px-3 py-2 border rounded-lg">
                            <option value="">Select type</option>
                            <option value="Cargo">Cargo</option>
                            <option value="Tanker">Tanker</option>
                            <option value="Passenger">Passenger</option>
                            <option value="Fishing">Fishing</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>

                    <!-- Description -->
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description *</label>
                        <textarea name="description" id="description" rows="3"
                                  class="w-full px-3 py-2 border rounded-lg">{{ old('description') }}</textarea>
                    </div>

                    <!-- Capacity -->
                    <div>
                        <label for="capacity" class="block text-sm font-medium text-gray-700 mb-2">Capacity</label>
                        <input type="text" name="capacity" id="capacity" value="{{ old('capacity') }}"
                               class="w-full px-3 py-2 border rounded-lg">
                    </div>

                    <!-- Length -->
                    <div>
                        <label for="length" class="block text-sm font-medium text-gray-700 mb-2">Length</label>
                        <input type="text" name="length" id="length" value="{{ old('length') }}"
                               class="w-full px-3 py-2 border rounded-lg">
                    </div>

                    <!-- Width -->
                    <div>
                        <label for="width" class="block text-sm font-medium text-gray-700 mb-2">Width</label>
                        <input type="text" name="width" id="width" value="{{ old('width') }}"
                               class="w-full px-3 py-2 border rounded-lg">
                    </div>

                    <!-- Draft -->
                    <div>
                        <label for="draft" class="block text-sm font-medium text-gray-700 mb-2">Draft</label>
                        <input type="text" name="draft" id="draft" value="{{ old('draft') }}"
                               class="w-full px-3 py-2 border rounded-lg">
                    </div>
                </div>

                <!-- Right Column -->
                <div class="space-y-6">
                    <!-- Image -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Vessel Image</label>
                        <input type="file" name="image" id="image" class="w-full">
                    </div>

                    <!-- Daily Rate -->
                    <div>
                        <label for="daily_rate" class="block text-sm font-medium text-gray-700 mb-2">Daily Rate</label>
                        <input type="number" step="0.01" name="daily_rate" id="daily_rate" value="{{ old('daily_rate') }}"
                               class="w-full px-3 py-2 border rounded-lg">
                    </div>

                    <!-- Flag -->
                    <div>
                        <label for="flag" class="block text-sm font-medium text-gray-700 mb-2">Flag</label>
                        <input type="text" name="flag" id="flag" value="{{ old('flag') }}"
                               class="w-full px-3 py-2 border rounded-lg">
                    </div>

                    <!-- Built Year -->
                    <div>
                        <label for="built_year" class="block text-sm font-medium text-gray-700 mb-2">Built Year</label>
                        <input type="number" name="built_year" id="built_year" value="{{ old('built_year') }}"
                               class="w-full px-3 py-2 border rounded-lg">
                    </div>

                    <!-- IMO Number -->
                    <div>
                        <label for="imo_number" class="block text-sm font-medium text-gray-700 mb-2">IMO Number</label>
                        <input type="text" name="imo_number" id="imo_number" value="{{ old('imo_number') }}"
                               class="w-full px-3 py-2 border rounded-lg">
                    </div>

                    <!-- Sort Order -->
                    <div>
                        <label for="sort_order" class="block text-sm font-medium text-gray-700 mb-2">Sort Order</label>
                        <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', 0) }}" min="0"
                               class="w-full px-3 py-2 border rounded-lg">
                    </div>

                    <!-- Availability -->
                    <div class="flex items-center">
                        <input type="checkbox" name="is_available" id="is_available" value="1" {{ old('is_available') ? 'checked' : '' }}>
                        <label for="is_available" class="ml-2">Available</label>
                    </div>

                    <!-- Featured -->
                    <div class="flex items-center">
                        <input type="checkbox" name="is_featured" id="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }}>
                        <label for="is_featured" class="ml-2">Featured</label>
                    </div>
                </div>
            </div>

            <!-- Submit -->
            <div class="flex justify-end space-x-4">
                <a href="{{ route('admin.vessels.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded-lg">
                    Cancel
                </a>
                <button type="submit" class="bg-[#265478] hover:bg-[#1e4260] text-white px-6 py-2 rounded-lg">
                    Create Vessel
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
