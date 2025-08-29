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
                               placeholder="Enter service name">
                        @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Slug -->
                    <div>
                        <label for="slug" class="block text-sm font-medium text-gray-700 mb-2">Slug</label>
                        <input type="text" name="slug" id="slug" value="{{ old('slug', $service->slug) }}" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#265478] focus:border-transparent @error('slug') border-red-500 @enderror"
                               placeholder="service-slug">
                        <p class="mt-1 text-sm text-gray-500">Leave empty to auto-generate from name</p>
                        @error('slug')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Short Description *</label>
                        <textarea name="description" id="description" rows="3" 
                                  class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#265478] focus:border-transparent @error('description') border-red-500 @enderror"
                                  placeholder="Brief description of the service">{{ old('description', $service->description) }}</textarea>
                        @error('description')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Icon -->
                    <div>
                        <label for="icon" class="block text-sm font-medium text-gray-700 mb-2">Icon Class</label>
                        <input type="text" name="icon" id="icon" value="{{ old('icon', $service->icon) }}" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#265478] focus:border-transparent @error('icon') border-red-500 @enderror"
                               placeholder="fas fa-ship">
                        <p class="mt-1 text-sm text-gray-500">Font Awesome icon class (e.g., fas fa-ship)</p>
                        @error('icon')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Right Column -->
                <div class="space-y-6">
                    <!-- Service Image Upload -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Service Image</label>
                        <div id="image-upload-area" class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-[#265478] transition-colors cursor-pointer">
                            <div id="upload-content" class="{{ $service->image ? 'hidden' : '' }}">
                                <i class="fas fa-cloud-upload-alt text-4xl text-gray-400 mb-4"></i>
                                <p class="text-sm text-gray-600 mb-2">Drag and drop an image here, or click to select</p>
                                <p class="text-xs text-gray-500">PNG, JPG, GIF up to 2MB</p>
                                <input type="file" name="image" id="image" accept="image/*" class="hidden">
                            </div>
                            <div id="image-preview" class="{{ $service->image ? '' : 'hidden' }}">
                                <img id="preview-img" src="{{ $service->image ? Storage::url($service->image) : '' }}" alt="Preview" class="max-w-full h-auto rounded-lg mx-auto mb-4 max-h-64">
                                <button type="button" id="remove-image" class="text-red-600 hover:text-red-800 text-sm">
                                    <i class="fas fa-trash mr-1"></i>Remove Image
                                </button>
                            </div>
                        </div>
                        @error('image')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

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

            <!-- Content -->
            <div>
                <label for="content" class="block text-sm font-medium text-gray-700 mb-2">Full Content *</label>
                <textarea name="content" id="content" rows="8" 
                          class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#265478] focus:border-transparent @error('content') border-red-500 @enderror"
                          placeholder="Detailed description of the service...">{{ old('content', $service->content) }}</textarea>
                <p class="mt-1 text-sm text-gray-500">Full service description with details, features, and benefits</p>
                @error('content')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- SEO Section -->
            <div class="border-t border-gray-200 pt-6">
                <h3 class="text-lg font-medium text-gray-900 mb-4">SEO Settings</h3>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <div>
                        <label for="meta_title" class="block text-sm font-medium text-gray-700 mb-2">Meta Title</label>
                        <input type="text" name="meta_title" id="meta_title" value="{{ old('meta_title', $service->meta_title) }}" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#265478] focus:border-transparent @error('meta_title') border-red-500 @enderror"
                               placeholder="SEO title for search engines">
                        @error('meta_title')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="meta_description" class="block text-sm font-medium text-gray-700 mb-2">Meta Description</label>
                        <textarea name="meta_description" id="meta_description" rows="3" 
                                  class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#265478] focus:border-transparent @error('meta_description') border-red-500 @enderror"
                                  placeholder="SEO description for search engines">{{ old('meta_description', $service->meta_description) }}</textarea>
                        @error('meta_description')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="flex justify-end space-x-4 pt-6 border-t border-gray-200">
                <a href="{{ route('admin.services.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded-lg">
                    Cancel
                </a>
                <button type="submit" class="bg-[#265478] hover:bg-[#1e4260] text-white px-6 py-2 rounded-lg flex items-center">
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
$(document).ready(function() {
    const uploadArea = $('#image-upload-area');
    const uploadContent = $('#upload-content');
    const imagePreview = $('#image-preview');
    const previewImg = $('#preview-img');
    const fileInput = $('#image');
    const removeBtn = $('#remove-image');

    // Click to upload
    uploadArea.on('click', function() {
        fileInput.click();
    });

    // Drag and drop functionality
    uploadArea.on('dragover', function(e) {
        e.preventDefault();
        $(this).addClass('border-[#265478] bg-blue-50');
    });

    uploadArea.on('dragleave', function(e) {
        e.preventDefault();
        $(this).removeClass('border-[#265478] bg-blue-50');
    });

    uploadArea.on('drop', function(e) {
        e.preventDefault();
        $(this).removeClass('border-[#265478] bg-blue-50');
        
        const files = e.originalEvent.dataTransfer.files;
        if (files.length > 0) {
            handleFile(files[0]);
        }
    });

    // File input change
    fileInput.on('change', function() {
        if (this.files.length > 0) {
            handleFile(this.files[0]);
        }
    });

    // Remove image
    removeBtn.on('click', function(e) {
        e.stopPropagation();
        resetImageUpload();
    });

    function handleFile(file) {
        // Validate file type
        if (!file.type.startsWith('image/')) {
            alert('Please select an image file.');
            return;
        }

        // Validate file size (2MB)
        if (file.size > 2 * 1024 * 1024) {
            alert('File size must be less than 2MB.');
            return;
        }

        // Create preview
        const reader = new FileReader();
        reader.onload = function(e) {
            previewImg.attr('src', e.target.result);
            uploadContent.addClass('hidden');
            imagePreview.removeClass('hidden');
        };
        reader.readAsDataURL(file);
    }

    function resetImageUpload() {
        fileInput.val('');
        uploadContent.removeClass('hidden');
        imagePreview.addClass('hidden');
        previewImg.attr('src', '');
    }

    // Auto-generate slug from name
    $('#name').on('keyup', function() {
        const name = $(this).val();
        const slug = name.toLowerCase()
            .replace(/[^a-z0-9 -]/g, '')
            .replace(/\s+/g, '-')
            .replace(/-+/g, '-')
            .trim('-');
        
        if ($('#slug').val() === '') {
            $('#slug').val(slug);
        }
    });

    // Form validation
    $('form').on('submit', function(e) {
        const name = $('#name').val().trim();
        const description = $('#description').val().trim();
        const content = $('#content').val().trim();
        
        if (!name) {
            e.preventDefault();
            alert('Please enter a service name.');
            $('#name').focus();
            return false;
        }
        
        if (!description) {
            e.preventDefault();
            alert('Please enter a description.');
            $('#description').focus();
            return false;
        }
        
        if (!content) {
            e.preventDefault();
            alert('Please enter the full content.');
            $('#content').focus();
            return false;
        }
    });
});
</script>
@endpush
