@extends('admin.layouts.app')

@section('title', 'Edit Vessel')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Edit Vessel</h1>
            <p class="text-gray-600">Update vessel details</p>
        </div>
        <a href="{{ route('admin.vessels.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg flex items-center">
            <i class="fas fa-arrow-left mr-2"></i>
            Back to List
        </a>
    </div>

    <!-- Form -->
    <div class="bg-white rounded-lg shadow-sm">
        <form action="{{ route('admin.vessels.update', $vessel->id) }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Left Column -->
                <div class="space-y-6">
                    <!-- Vessel Name -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Vessel Name *</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $vessel->name) }}" 
                               class="w-full px-3 py-2 border rounded-lg @error('name') border-red-500 @enderror"
                               placeholder="Enter vessel name">
                        @error('name')<p class="text-red-600 text-sm">{{ $message }}</p>@enderror
                    </div>

                    <!-- Vessel Type -->
                    <div>
                        <label for="type" class="block text-sm font-medium text-gray-700 mb-2">Vessel Type *</label>
                        <select name="type" id="type" class="w-full px-3 py-2 border rounded-lg">
                            <option value="">Select type</option>
                            <option value="Cargo" {{ old('type', $vessel->type) == 'Cargo' ? 'selected' : '' }}>Cargo</option>
                            <option value="Tanker" {{ old('type', $vessel->type) == 'Tanker' ? 'selected' : '' }}>Tanker</option>
                            <option value="Passenger" {{ old('type', $vessel->type) == 'Passenger' ? 'selected' : '' }}>Passenger</option>
                            <option value="Fishing" {{ old('type', $vessel->type) == 'Fishing' ? 'selected' : '' }}>Fishing</option>
                            <option value="Other" {{ old('type', $vessel->type) == 'Other' ? 'selected' : '' }}>Other</option>
                        </select>
                        @error('type')<p class="text-red-600 text-sm">{{ $message }}</p>@enderror
                    </div>

                    <!-- Description -->
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description *</label>
                        <textarea name="description" id="description" rows="3"
                                  class="w-full px-3 py-2 border rounded-lg">{{ old('description', $vessel->description) }}</textarea>
                        @error('description')<p class="text-red-600 text-sm">{{ $message }}</p>@enderror
                    </div>

                    <!-- Capacity -->
                    <div>
                        <label for="capacity" class="block text-sm font-medium text-gray-700 mb-2">Capacity</label>
                        <input type="text" name="capacity" id="capacity" value="{{ old('capacity', $vessel->capacity) }}"
                               class="w-full px-3 py-2 border rounded-lg">
                    </div>

                    <!-- Length -->
                    <div>
                        <label for="length" class="block text-sm font-medium text-gray-700 mb-2">Length</label>
                        <input type="text" name="length" id="length" value="{{ old('length', $vessel->length) }}"
                               class="w-full px-3 py-2 border rounded-lg">
                    </div>

                    <!-- Width -->
                    <div>
                        <label for="width" class="block text-sm font-medium text-gray-700 mb-2">Width</label>
                        <input type="text" name="width" id="width" value="{{ old('width', $vessel->width) }}"
                               class="w-full px-3 py-2 border rounded-lg">
                    </div>

                    <!-- Draft -->
                    <div>
                        <label for="draft" class="block text-sm font-medium text-gray-700 mb-2">Draft</label>
                        <input type="text" name="draft" id="draft" value="{{ old('draft', $vessel->draft) }}"
                               class="w-full px-3 py-2 border rounded-lg">
                    </div>
                </div>

                <!-- Right Column -->
                <div class="space-y-6">
                    <!-- Image Upload -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Vessel Image</label>
                        <input type="file" name="image" id="image" accept="image/*"
                               class="w-full px-3 py-2 border rounded-lg @error('image') border-red-500 @enderror">
                        <div class="mt-2">
                            @if($vessel->image)
                                <img src="{{ asset($vessel->image) }}" 
                                    id="preview-image" 
                                    class="w-full h-48 object-cover rounded-lg border" />
                            @else
                                <img id="preview-image" 
                                    class="hidden w-full h-48 object-cover rounded-lg border" />
                            @endif
                        </div>
                        @error('image')<p class="text-red-600 text-sm">{{ $message }}</p>@enderror
                    </div>

                    <!-- Daily Rate -->
                    <div>
                        <label for="daily_rate" class="block text-sm font-medium text-gray-700 mb-2">Daily Rate</label>
                        <input type="number" step="0.01" name="daily_rate" id="daily_rate" value="{{ old('daily_rate', $vessel->daily_rate) }}"
                               class="w-full px-3 py-2 border rounded-lg">
                    </div>

                    <!-- Flag -->
                    <div>
                        <label for="flag" class="block text-sm font-medium text-gray-700 mb-2">Flag</label>
                        <input type="text" name="flag" id="flag" value="{{ old('flag', $vessel->flag) }}"
                               class="w-full px-3 py-2 border rounded-lg">
                    </div>

                    <!-- Built Year -->
                    <div>
                        <label for="built_year" class="block text-sm font-medium text-gray-700 mb-2">Built Year</label>
                        <input type="number" name="built_year" id="built_year" value="{{ old('built_year', $vessel->built_year) }}"
                               class="w-full px-3 py-2 border rounded-lg">
                    </div>

                    <!-- IMO Number -->
                    <div>
                        <label for="imo_number" class="block text-sm font-medium text-gray-700 mb-2">IMO Number</label>
                        <input type="text" name="imo_number" id="imo_number" value="{{ old('imo_number', $vessel->imo_number) }}"
                               class="w-full px-3 py-2 border rounded-lg">
                    </div>

                    <!-- Sort Order -->
                    <div>
                        <label for="sort_order" class="block text-sm font-medium text-gray-700 mb-2">Sort Order</label>
                        <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', $vessel->sort_order) }}" min="0"
                               class="w-full px-3 py-2 border rounded-lg">
                    </div>

                    <!-- Availability -->
                    <div class="flex items-center">
                        <input type="checkbox" name="is_available" id="is_available" value="1" {{ old('is_available', $vessel->is_available) ? 'checked' : '' }}>
                        <label for="is_available" class="ml-2">Available</label>
                    </div>

                    <!-- Featured -->
                    <div class="flex items-center">
                        <input type="checkbox" name="is_featured" id="is_featured" value="1" {{ old('is_featured', $vessel->is_featured) ? 'checked' : '' }}>
                        <label for="is_featured" class="ml-2">Featured</label>
                    </div>
                </div>
            </div>

            <!-- Submit -->
            <div class="flex justify-end space-x-4">
                <a href="{{ route('admin.vessels.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded-lg">
                    Cancel
                </a>
                <button type="submit" class="bg-[#265478] hover:bg-[#a9c1d4] text-white px-6 py-2 rounded-lg">
                    Update Vessel
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Image Preview JS -->
<script>
document.getElementById('image').addEventListener('change', function (event) {
    const file = event.target.files[0];
    const preview = document.getElementById('preview-image');
    if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
            preview.src = e.target.result;
            preview.classList.remove('hidden');
        };
        reader.readAsDataURL(file);
    }
});
</script>
@endsection
