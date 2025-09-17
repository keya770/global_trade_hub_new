@extends('admin.layouts.app')

@section('title', 'Edit Service')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Edit Service</h1>
            <p class="text-gray-600">Update service information</p>
        </div>
        <a href="{{ route('admin.services.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg flex items-center">
            <i class="fas fa-arrow-left mr-2"></i>
            Back to List
        </a>
    </div>

    <!-- Form -->
    <div class="bg-white rounded-lg shadow-sm">
        <form action="{{ route('admin.services.update', $service->id) }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Left Column -->
                <div class="space-y-6">
                    <!-- Name -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Service Name *</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $service->name) }}" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#265478] focus:border-transparent @error('name') border-red-500 @enderror"
                               placeholder="Enter service name" required>
                        @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                        <textarea name="description" id="description" rows="3" 
                                  class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#265478] focus:border-transparent @error('description') border-red-500 @enderror"
                                  placeholder="Brief description of the service">{{ old('description', $service->description) }}</textarea>
                        @error('description')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Content -->
                    <div>
                        <label for="content" class="block text-sm font-medium text-gray-700 mb-2">Content</label>
                        <textarea name="content" id="content" rows="6" 
                                  class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#265478] focus:border-transparent @error('content') border-red-500 @enderror"
                                  placeholder="Detailed content about the service">{{ old('content', $service->content) }}</textarea>
                        @error('content')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Rich Content Editor -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Rich Content Editor</label>
                        <div contenteditable="true" id="richContent" 
                             class="w-full min-h-48 px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#265478] focus:border-transparent bg-white"
                             style="outline: none;">
                            {!! old('content', $service->content) ?: '<p>Start writing here...</p>' !!}
                        </div>
                        <p class="mt-1 text-sm text-gray-500">Use this editor for rich text formatting. Content will be saved to the content field above.</p>
                    </div>

                    <!-- Icon -->
                    <div>
                        <label for="icon" class="block text-sm font-medium text-gray-700 mb-2">Icon Class</label>
                        <input type="text" name="icon" id="icon" value="{{ old('icon', $service->icon) }}" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#265478] focus:border-transparent @error('icon') border-red-500 @enderror"
                               placeholder="e.g., fas fa-ship">
                        <p class="mt-1 text-sm text-gray-500">FontAwesome icon class (optional)</p>
                        @error('icon')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Right Column -->
                <div class="space-y-6">
                    <!-- Image Upload -->
                    <x-admin.image-upload 
                        name="image" 
                        label="Service Image" 
                        :currentImage="$service->image"
                        :required="false"
                    />

                    <!-- Sort Order -->
                    <div>
                        <label for="sort_order" class="block text-sm font-medium text-gray-700 mb-2">Sort Order</label>
                        <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', $service->sort_order) }}" min="0"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#265478] focus:border-transparent @error('sort_order') border-red-500 @enderror">
                        <p class="mt-1 text-sm text-gray-500">Lower numbers appear first</p>
                        @error('sort_order')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Active Status -->
                    <div>
                        <label class="flex items-center">
                            <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', $service->is_active) ? 'checked' : '' }}
                                   class="rounded border-gray-300 text-[#265478] focus:ring-[#265478]">
                            <span class="ml-2 text-sm text-gray-700">Active</span>
                        </label>
                        <p class="mt-1 text-sm text-gray-500">Only active services will be displayed</p>
                    </div>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="flex justify-end space-x-4 pt-6 border-t border-gray-200">
                <a href="{{ route('admin.services.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded-lg">
                    Cancel
                </a>
                <button type="submit" class="bg-[#265478] hover:bg-[#a9c1d4ff] text-white px-6 py-2 rounded-lg flex items-center">
                    <i class="fas fa-save mr-2"></i>
                    Update Service
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const richContent = document.getElementById('richContent');
    const contentTextarea = document.getElementById('content');
    
    // Sync content from textarea to rich editor on page load
    if (contentTextarea.value.trim()) {
        richContent.innerHTML = contentTextarea.value;
    }
    
    // Sync content from rich editor to textarea on input
    richContent.addEventListener('input', function() {
        contentTextarea.value = this.innerHTML;
    });
    
    // Sync content from textarea to rich editor when textarea changes
    contentTextarea.addEventListener('input', function() {
        richContent.innerHTML = this.value;
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
    
    richContent.parentNode.insertBefore(toolbar, richContent);
});

function formatText(command) {
    document.execCommand(command, false, null);
    document.getElementById('richContent').focus();
}
</script>
@endpush
