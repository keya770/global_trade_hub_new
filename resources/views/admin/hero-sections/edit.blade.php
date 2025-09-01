@extends('admin.layouts.app')

@section('title', 'Edit Hero Section')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Edit Hero Section</h1>
            <p class="text-gray-600">Update hero section: {{ $heroSection->title }}</p>
        </div>
        <a href="{{ route('admin.hero-sections.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg flex items-center">
            <i class="fas fa-arrow-left mr-2"></i>
            Back to List
        </a>
    </div>

    <!-- Form -->
    <div class="bg-white rounded-lg shadow-sm">
        <form action="{{ route('admin.hero-sections.update', $heroSection) }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Left Column -->
                <div class="space-y-6">
                    <!-- Title -->
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Title *</label>
                        <input type="text" name="title" id="title" value="{{ old('title', $heroSection->title) }}" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#265478] focus:border-transparent @error('title') border-red-500 @enderror"
                               placeholder="Enter hero section title">
                        @error('title')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Subtitle -->
                    <div>
                        <label for="subtitle" class="block text-sm font-medium text-gray-700 mb-2">Subtitle</label>
                        <input type="text" name="subtitle" id="subtitle" value="{{ old('subtitle', $heroSection->subtitle) }}" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#265478] focus:border-transparent @error('subtitle') border-red-500 @enderror"
                               placeholder="Enter subtitle">
                        @error('subtitle')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                        <textarea name="description" id="description" rows="4" 
                                  class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#265478] focus:border-transparent @error('description') border-red-500 @enderror"
                                  placeholder="Enter description">{{ old('description', $heroSection->description) }}</textarea>
                        @error('description')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Button Text -->
                    <div>
                        <label for="button_text" class="block text-sm font-medium text-gray-700 mb-2">Button Text</label>
                        <input type="text" name="button_text" id="button_text" value="{{ old('button_text', $heroSection->button_text) }}" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#265478] focus:border-transparent @error('button_text') border-red-500 @enderror"
                               placeholder="e.g., Learn More, Get Started">
                        @error('button_text')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Button URL -->
                    <div>
                        <label for="button_url" class="block text-sm font-medium text-gray-700 mb-2">Button URL</label>
                        <input type="url" name="button_url" id="button_url" value="{{ old('button_url', $heroSection->button_url) }}" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#265478] focus:border-transparent @error('button_url') border-red-500 @enderror"
                               placeholder="https://example.com">
                        @error('button_url')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Right Column -->
                <div class="space-y-6">
                    <!-- Background Image Upload -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Background Image</label>
                        <div id="image-upload-area" class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-[#265478] transition-colors cursor-pointer">
                            <div id="upload-content" class="{{ $heroSection->background_image ? 'hidden' : '' }}">
                                <i class="fas fa-cloud-upload-alt text-4xl text-gray-400 mb-4"></i>
                                <p class="text-sm text-gray-600 mb-2">Drag and drop an image here, or click to select</p>
                                <p class="text-xs text-gray-500">PNG, JPG, GIF up to 2MB</p>
                                <input type="file" name="background_image" id="background_image" accept="image/*" class="hidden">
                            </div>
                            <div id="image-preview" class="{{ $heroSection->background_image ? '' : 'hidden' }}">
                                <img id="preview-img" src="{{ $heroSection->background_image ? Storage::url($heroSection->background_image) : '' }}" alt="Preview" class="max-w-full h-auto rounded-lg mx-auto mb-4 max-h-64">
                                <button type="button" id="remove-image" class="text-red-600 hover:text-red-800 text-sm">
                                    <i class="fas fa-trash mr-1"></i>Remove Image
                                </button>
                            </div>
                        </div>
                        @error('background_image')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Sort Order -->
                    <div>
                        <label for="sort_order" class="block text-sm font-medium text-gray-700 mb-2">Sort Order</label>
                        <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', $heroSection->sort_order) }}" min="0"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#265478] focus:border-transparent @error('sort_order') border-red-500 @enderror">
                        <p class="mt-1 text-sm text-gray-500">Lower numbers appear first</p>
                        @error('sort_order')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Active Status -->
                    <div>
                        <label class="flex items-center">
                            <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', $heroSection->is_active) ? 'checked' : '' }}
                                   class="rounded border-gray-300 text-[#265478] focus:ring-[#265478]">
                            <span class="ml-2 text-sm text-gray-700">Active</span>
                        </label>
                        <p class="mt-1 text-sm text-gray-500">Only active hero sections will be displayed</p>
                    </div>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="flex justify-end space-x-4 pt-6 border-t border-gray-200">
                <a href="{{ route('admin.hero-sections.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded-lg">
                    Cancel
                </a>
                <button type="submit" class="bg-[#265478] hover:bg-[#a9c1d4ff] text-white px-6 py-2 rounded-lg flex items-center">
                    <i class="fas fa-save mr-2"></i>
                    Update Hero Section
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
    const fileInput = $('#background_image');
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

    // Form validation
    $('form').on('submit', function(e) {
        const title = $('#title').val().trim();
        if (!title) {
            e.preventDefault();
            alert('Please enter a title for the hero section.');
            $('#title').focus();
            return false;
        }
    });
});
</script>
@endpush
