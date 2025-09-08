@extends('admin.layouts.app')

@section('title', 'Create Sub Service')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Create Sub Service</h1>
            <p class="text-gray-600">Add a new sub service or sub-sub service</p>
        </div>
        <a href="{{ route('admin.sub_services.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg">
            <i class="fas fa-arrow-left mr-2"></i>
            Back to Sub Services
        </a>
    </div>

    <!-- Form -->
    <div class="bg-white shadow rounded-lg p-6">
        <form action="{{ route('admin.sub_services.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Service -->
                <div>
                    <label for="service_id" class="block text-sm font-medium text-gray-700 mb-2">Main Service *</label>
                    <select name="service_id" id="service_id" 
                            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#265478] focus:border-transparent">
                        <option value="">Select a service</option>
                        @foreach($services as $service)
                            <option value="{{ $service->id }}" {{ old('service_id') == $service->id ? 'selected' : '' }}>
                                {{ $service->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('service_id')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Parent Sub Service -->
                <div>
                    <label for="parent_id" class="block text-sm font-medium text-gray-700 mb-2">Parent Sub Service</label>
                    <select name="parent_id" id="parent_id" 
                            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#265478] focus:border-transparent">
                        <option value="">Top Level (No Parent)</option>
                        @foreach($parentSubServices as $parentSubService)
                            <option value="{{ $parentSubService->id }}" {{ old('parent_id') == $parentSubService->id ? 'selected' : '' }}>
                                {{ $parentSubService->name }} ({{ $parentSubService->service->name }})
                            </option>
                        @endforeach
                    </select>
                    <p class="text-sm text-gray-500 mt-1">Leave empty for top-level sub service, or select to create a sub-sub service</p>
                    @error('parent_id')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Name -->
                <div class="md:col-span-2">
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Name *</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" 
                           class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#265478] focus:border-transparent" 
                           placeholder="e.g., Tanker Chartering">
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description -->
                <div class="md:col-span-2">
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                    <textarea name="description" id="description" rows="3" 
                              class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#265478] focus:border-transparent" 
                              placeholder="Brief description...">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Content -->
                <div class="md:col-span-2">
                    <label for="content" class="block text-sm font-medium text-gray-700 mb-2">Content</label>
                    <textarea name="content" id="content" rows="6" 
                              class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#265478] focus:border-transparent" 
                              placeholder="Detailed content...">{{ old('content') }}</textarea>
                    @error('content')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Icon -->
                <div>
                    <label for="icon" class="block text-sm font-medium text-gray-700 mb-2">Icon</label>
                    <input type="text" name="icon" id="icon" value="{{ old('icon') }}" 
                           class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#265478] focus:border-transparent" 
                           placeholder="e.g., fas fa-ship">
                    <p class="text-sm text-gray-500 mt-1">FontAwesome icon class</p>
                    @error('icon')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Sort Order -->
                <div>
                    <label for="sort_order" class="block text-sm font-medium text-gray-700 mb-2">Sort Order</label>
                    <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', 0) }}" 
                           class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#265478] focus:border-transparent" 
                           min="0">
                    @error('sort_order')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Image -->
                <div class="md:col-span-2">
                    <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Image</label>
                    <input type="file" name="image" id="image" 
                           class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#265478] focus:border-transparent" 
                           accept="image/*">
                    <p class="text-sm text-gray-500 mt-1">Upload an image for this sub service (optional)</p>
                    @error('image')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Status -->
                <div class="md:col-span-2">
                    <label class="flex items-center">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }} 
                               class="rounded border-gray-300 text-[#265478] focus:ring-[#265478]">
                        <span class="ml-2 text-sm text-gray-700">Active</span>
                    </label>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end mt-6">
                <button type="submit" class="bg-[#265478] hover:bg-[#1e4260] text-white px-6 py-2 rounded-lg">
                    <i class="fas fa-save mr-2"></i>
                    Create Sub Service
                </button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    // Dynamic parent sub services loading based on selected service
    document.getElementById('service_id').addEventListener('change', function() {
        const serviceId = this.value;
        const parentSelect = document.getElementById('parent_id');
        
        if (serviceId) {
            fetch(`{{ route('admin.sub_services.get-by-service') }}?service_id=${serviceId}`)
                .then(response => response.json())
                .then(data => {
                    parentSelect.innerHTML = '<option value="">Top Level (No Parent)</option>';
                    data.forEach(item => {
                        parentSelect.innerHTML += `<option value="${item.id}">${item.name}</option>`;
                    });
                });
        } else {
            parentSelect.innerHTML = '<option value="">Top Level (No Parent)</option>';
        }
    });
</script>
@endpush
@endsection
