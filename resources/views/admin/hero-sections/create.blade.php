@extends('admin.layouts.app')

@section('title', 'Create Hero Section')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Create Hero Section</h1>
            <p class="text-gray-600">Add a new hero section for your homepage</p>
        </div>
        <a href="{{ route('admin.hero-sections.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg flex items-center">
            <i class="fas fa-arrow-left mr-2"></i>
            Back to List
        </a>
    </div>

    <!-- Form -->
    <div class="bg-white rounded-lg shadow-sm">
        <form action="{{ route('admin.hero-sections.store') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
            @csrf
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Left Column -->
                <div class="space-y-6">
                    <!-- Title -->
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Main Title *</label>
                        <input type="text" name="title" id="title" value="{{ old('title') }}" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#265478] focus:border-transparent @error('title') border-red-500 @enderror"
                               placeholder="e.g., Leading Maritime">
                        <p class="mt-1 text-sm text-gray-500">The main title text (before accent text)</p>
                        @error('title')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Accent Text -->
                    <div>
                        <label for="accent_text" class="block text-sm font-medium text-gray-700 mb-2">Accent Text</label>
                        <input type="text" name="accent_text" id="accent_text" value="{{ old('accent_text') }}" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#265478] focus:border-transparent @error('accent_text') border-red-500 @enderror"
                               placeholder="e.g., Solutions">
                        <p class="mt-1 text-sm text-gray-500">This will be highlighted with accent color</p>
                        @error('accent_text')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Hero Description -->
                    <div>
                        <label for="hero_description" class="block text-sm font-medium text-gray-700 mb-2">Hero Description</label>
                        <textarea name="hero_description" id="hero_description" rows="3" 
                                  class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#265478] focus:border-transparent @error('hero_description') border-red-500 @enderror"
                                  placeholder="Main description text for the hero section">{{ old('hero_description') }}</textarea>
                        @error('hero_description')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Right Column -->
                <div class="space-y-6">
                    <!-- Primary Button -->
                    <div class="border-b border-gray-200 pb-4">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Primary Button</h3>
                        <div class="space-y-4">
                            <div>
                                <label for="button_text" class="block text-sm font-medium text-gray-700 mb-2">Button Text</label>
                                <input type="text" name="button_text" id="button_text" value="{{ old('button_text') }}" 
                                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#265478] focus:border-transparent @error('button_text') border-red-500 @enderror"
                                       placeholder="e.g., Request a Quote">
                                @error('button_text')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="button_url" class="block text-sm font-medium text-gray-700 mb-2">Button URL</label>
                                <input type="url" name="button_url" id="button_url" value="{{ old('button_url') }}" 
                                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#265478] focus:border-transparent @error('button_url') border-red-500 @enderror"
                                       placeholder="https://example.com or leave empty for contact page">
                                @error('button_url')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Secondary Button -->
                    <div class="border-b border-gray-200 pb-4">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Secondary Button</h3>
                        <div class="space-y-4">
                            <div>
                                <label for="secondary_button_text" class="block text-sm font-medium text-gray-700 mb-2">Button Text</label>
                                <input type="text" name="secondary_button_text" id="secondary_button_text" value="{{ old('secondary_button_text') }}" 
                                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#265478] focus:border-transparent @error('secondary_button_text') border-red-500 @enderror"
                                       placeholder="e.g., Contact Us">
                                @error('secondary_button_text')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="secondary_button_url" class="block text-sm font-medium text-gray-700 mb-2">Button URL</label>
                                <input type="url" name="secondary_button_url" id="secondary_button_url" value="{{ old('secondary_button_url') }}" 
                                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#265478] focus:border-transparent @error('secondary_button_url') border-red-500 @enderror"
                                       placeholder="https://example.com or leave empty for contact page">
                                @error('secondary_button_url')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Background Video Upload -->
                    {{-- <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Background Video</label>
                        <div id="video-upload-area" class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-[#265478] transition-colors cursor-pointer">
                            <div id="video-upload-content">
                                <i class="fas fa-video text-4xl text-gray-400 mb-4"></i>
                                <p class="text-sm text-gray-600 mb-2">Drag and drop a video here, or click to select</p>
                                <p class="text-xs text-gray-500">MP4, MOV, AVI up to 10MB</p>
                                <input type="file" name="background_video" id="background_video" accept="video/*" class="hidden">
                            </div>
                            <div id="video-preview" class="hidden">
                                <video id="preview-video" controls class="max-w-full h-auto rounded-lg mx-auto mb-4 max-h-64">
                                    <source src="" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                                <button type="button" id="remove-video" class="text-red-600 hover:text-red-800 text-sm">
                                    <i class="fas fa-trash mr-1"></i>Remove Video
                                </button>
                            </div>
                        </div>
                        @error('background_video')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div> --}}

                    <!-- Active Status -->
                    <div>
                        <label class="flex items-center">
                            <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active') ? 'checked' : '' }}
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
                    Create Hero Section
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const uploadArea = document.getElementById('video-upload-area');
    const input = document.getElementById('background_video');
    const preview = document.getElementById('video-preview');
    const previewVideo = document.getElementById('preview-video');
    const removeBtn = document.getElementById('remove-video');
    const uploadContent = document.getElementById('video-upload-content');

    // Click to open file selector
    uploadArea.addEventListener('click', () => input.click());

    // Drag & Drop
    uploadArea.addEventListener('dragover', (e) => {
        e.preventDefault();
        uploadArea.classList.add('border-[#265478]', 'bg-blue-50');
    });

    uploadArea.addEventListener('dragleave', (e) => {
        e.preventDefault();
        uploadArea.classList.remove('border-[#265478]', 'bg-blue-50');
    });

    uploadArea.addEventListener('drop', (e) => {
        e.preventDefault();
        uploadArea.classList.remove('border-[#265478]', 'bg-blue-50');
        if (e.dataTransfer.files.length) {
            input.files = e.dataTransfer.files;
            showPreview(e.dataTransfer.files[0]);
        }
    });

    // File selected
    input.addEventListener('change', (e) => {
        if (e.target.files.length) {
            showPreview(e.target.files[0]);
        }
    });

    // Remove video
    removeBtn.addEventListener('click', (e) => {
        e.stopPropagation();
        input.value = '';
        previewVideo.src = '';
        preview.classList.add('hidden');
        uploadContent.classList.remove('hidden');
    });

    function showPreview(file) {
        // Validate file type
        if (!file.type.startsWith('video/')) {
            alert('Please select a video file.');
            return;
        }

        // Validate file size (10MB)
        if (file.size > 10 * 1024 * 1024) {
            alert('File size must be less than 10MB.');
            return;
        }

        const url = URL.createObjectURL(file);
        previewVideo.src = url;
        preview.classList.remove('hidden');
        uploadContent.classList.add('hidden');
    }

    // Form validation
    const form = document.querySelector('form');
    form.addEventListener('submit', function(e) {
        const title = document.getElementById('title').value.trim();
        if (!title) {
            e.preventDefault();
            alert('Please enter a title for the hero section.');
            document.getElementById('title').focus();
            return false;
        }
    });
});
</script>
@endpush
