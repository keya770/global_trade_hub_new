@extends('admin.layouts.app')

@section('title', 'Edit Sub Service')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Edit Sub Service</h1>
            <p class="text-gray-600">Update sub service information</p>
        </div>
        <a href="{{ route('admin.sub_services.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg">
            <i class="fas fa-arrow-left mr-2"></i>
            Back to Sub Services
        </a>
    </div>

    <!-- Form -->
    <div class="bg-white shadow rounded-lg p-6">
        <form action="{{ route('admin.sub_services.update', $subService) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Service -->
                <div>
                    <label for="service_id" class="block text-sm font-medium text-gray-700 mb-2">Main Service *</label>
                    <select name="service_id" id="service_id" 
                            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#265478] focus:border-transparent">
                        <option value="">Select a service</option>
                        @foreach($services as $service)
                            <option value="{{ $service->id }}" {{ old('service_id', $subService->service_id) == $service->id ? 'selected' : '' }}>
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
                            <option value="{{ $parentSubService->id }}" {{ old('parent_id', $subService->parent_id) == $parentSubService->id ? 'selected' : '' }}>
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
                    <input type="text" name="name" id="name" value="{{ old('name', $subService->name) }}" 
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
                              placeholder="Brief description...">{{ old('description', $subService->description) }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Content -->
                <div class="md:col-span-2">
                    <label for="content" class="block text-sm font-medium text-gray-700 mb-2">Content</label>
                    <textarea name="content" id="content" rows="6" 
                              class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#265478] focus:border-transparent" 
                              placeholder="Detailed content...">{{ old('content', $subService->content) }}</textarea>
                    @error('content')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Rich Content Editor -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Rich Content Editor</label>
                    <div id="editor" contenteditable="true" 
                         class="w-full min-h-48 px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#265478] focus:border-transparent bg-white"
                         style="outline: none;">
                        {!! old('content', $subService->content) ?: '<p>Start writing here...</p>' !!}
                    </div>
                    <p class="mt-1 text-sm text-gray-500">Use this editor for rich text formatting. Content will be saved to the content field above.</p>
                </div>

                <!-- Icon -->
                <div>
                    <label for="icon" class="block text-sm font-medium text-gray-700 mb-2">Icon</label>
                    <input type="text" name="icon" id="icon" value="{{ old('icon', $subService->icon) }}" 
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
                    <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', $subService->sort_order) }}" 
                           class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#265478] focus:border-transparent" 
                           min="0">
                    @error('sort_order')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Current Image -->
                @if($subService->image)
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Current Image</label>
                    <img src="{{ $subService->image_url }}" alt="{{ $subService->name }}" class="h-32 w-auto object-cover rounded-lg">
                </div>
                @endif

                <!-- New Image -->
                <div class="md:col-span-2">
                    <label for="image" class="block text-sm font-medium text-gray-700 mb-2">New Image</label>
                    <input type="file" name="image" id="image" 
                           class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#265478] focus:border-transparent" 
                           accept="image/*">
                    <p class="text-sm text-gray-500 mt-1">Upload a new image for this sub service (optional)</p>
                    @error('image')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Status -->
                <div class="md:col-span-2">
                    <label class="flex items-center">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', $subService->is_active) ? 'checked' : '' }} 
                               class="rounded border-gray-300 text-[#265478] focus:ring-[#265478]">
                        <span class="ml-2 text-sm text-gray-700">Active</span>
                    </label>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end mt-6">
                <button type="submit" class="bg-[#265478] hover:bg-[#1e4260] text-white px-6 py-2 rounded-lg">
                    <i class="fas fa-save mr-2"></i>
                    Update Sub Service
                </button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    // Rich Content Editor functionality
    document.addEventListener('DOMContentLoaded', function() {
        const editor = document.getElementById('editor');
        const contentTextarea = document.getElementById('content');
        
        // Sync content from textarea to rich editor on page load
        if (contentTextarea.value.trim()) {
            editor.innerHTML = contentTextarea.value;
        }
        
        // Sync content from rich editor to textarea on input
        editor.addEventListener('input', function() {
            contentTextarea.value = this.innerHTML;
        });
        
        // Sync content from textarea to rich editor when textarea changes
        contentTextarea.addEventListener('input', function() {
            editor.innerHTML = this.value;
        });
        
        // Add some basic formatting buttons
        const toolbar = document.createElement('div');
        toolbar.className = 'mb-2 flex gap-2';
        toolbar.innerHTML = `
            <button type="button" onclick="formatText('bold')" class="px-2 py-1 bg-gray-200 hover:bg-gray-300 rounded text-sm">
                <strong>B</strong>
            </button>
            <button type="button" onclick="formatText('italic')" class="px-2 py-1 bg-gray-200 hover:bg-gray-300 rounded text-sm">
                <em>I</em>
            </button>
            <button type="button" onclick="formatText('underline')" class="px-2 py-1 bg-gray-200 hover:bg-gray-300 rounded text-sm">
                <u>U</u>
            </button>
            <button type="button" onclick="formatText('insertUnorderedList')" class="px-2 py-1 bg-gray-200 hover:bg-gray-300 rounded text-sm">
                • List
            </button>
            <button type="button" onclick="formatText('insertOrderedList')" class="px-2 py-1 bg-gray-200 hover:bg-gray-300 rounded text-sm">
                1. List
            </button>
        `;
        
        editor.parentNode.insertBefore(toolbar, editor);
    });

    function formatText(command) {
        document.execCommand(command, false, null);
        document.getElementById('editor').focus();
    }
</script>
@endpush
@endsection
