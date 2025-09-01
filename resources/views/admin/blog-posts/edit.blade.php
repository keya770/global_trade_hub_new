@extends('admin.layouts.app')

@section('title', 'Edit Blog Post')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Edit Blog Post</h1>
            <p class="text-gray-600">Update blog post details</p>
        </div>
        <a href="{{ route('admin.blog-posts.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg flex items-center">
            <i class="fas fa-arrow-left mr-2"></i>
            Back to List
        </a>
    </div>

    <!-- Form -->
    <div class="bg-white rounded-lg shadow-sm">
        <form action="{{ route('admin.blog-posts.update', $blogPost->id) }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Left Column -->
                <div class="space-y-6">
                    <!-- Title -->
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Title *</label>
                        <input type="text" name="title" id="title" value="{{ old('title', $blogPost->title) }}"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#265478] focus:border-transparent @error('title') border-red-500 @enderror"
                               placeholder="Enter blog title">
                        @error('title')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Slug -->
                    <div>
                        <label for="slug" class="block text-sm font-medium text-gray-700 mb-2">Slug</label>
                        <input type="text" name="slug" id="slug" value="{{ old('slug', $blogPost->slug) }}"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#265478] focus:border-transparent @error('slug') border-red-500 @enderror"
                               placeholder="auto-generated">
                        <p class="mt-1 text-sm text-gray-500">Leave empty to auto-generate</p>
                        @error('slug')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Excerpt -->
                    <div>
                        <label for="excerpt" class="block text-sm font-medium text-gray-700 mb-2">Excerpt *</label>
                        <textarea name="excerpt" id="excerpt" rows="3"
                                  class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#265478] focus:border-transparent @error('excerpt') border-red-500 @enderror"
                                  placeholder="Short summary">{{ old('excerpt', $blogPost->excerpt) }}</textarea>
                        @error('excerpt')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Right Column -->
                <div class="space-y-6">
                    <!-- Featured Image -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Featured Image</label>
                        <div id="image-upload-area" class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-[#265478] transition-colors cursor-pointer">
                            <div id="upload-content" class="{{ $blogPost->featured_image ? 'hidden' : '' }}">
                                <i class="fas fa-cloud-upload-alt text-4xl text-gray-400 mb-4"></i>
                                <p class="text-sm text-gray-600 mb-2">Drag & drop or click to select</p>
                                <p class="text-xs text-gray-500">PNG, JPG up to 2MB</p>
                                <input type="file" name="featured_image" id="image" accept="image/*" class="hidden">
                            </div>
                            <div id="image-preview" class="{{ $blogPost->featured_image ? '' : 'hidden' }}">
                                <img id="preview-img" src="{{ $blogPost->featured_image ? Storage::url($blogPost->featured_image) : '' }}" alt="Preview" class="max-w-full h-auto rounded-lg mx-auto mb-4 max-h-64">
                                <button type="button" id="remove-image" class="text-red-600 hover:text-red-800 text-sm">
                                    <i class="fas fa-trash mr-1"></i>Remove Image
                                </button>
                            </div>
                        </div>
                        @error('featured_image')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Gallery Images -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Gallery Images</label>
                        <input type="file" name="images[]" multiple accept="image/*"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#265478] focus:border-transparent">
                        <p class="mt-1 text-sm text-gray-500">You can upload multiple images</p>
                        @if($blogPost->images && count($blogPost->images))
                            <div class="grid grid-cols-2 md:grid-cols-3 gap-4 mt-4">
                                @foreach($blogPost->images as $image)
                                    <div class="relative">
                                        <img src="{{ Storage::url($image->path) }}" class="rounded-lg shadow">
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Content -->
            <div>
                <label for="content" class="block text-sm font-medium text-gray-700 mb-2">Content *</label>
                <textarea name="content" id="content" rows="8"
                          class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#265478] focus:border-transparent @error('content') border-red-500 @enderror"
                          placeholder="Full blog content...">{{ old('content', $blogPost->content) }}</textarea>
                @error('content')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Meta Information -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <div>
                    <label for="author_name" class="block text-sm font-medium text-gray-700 mb-2">Author</label>
                    <input type="text" name="author_name" id="author_name" value="{{ old('author_name', $blogPost->author_name) }}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#265478] focus:border-transparent">
                </div>
                <div>
                    <label for="category" class="block text-sm font-medium text-gray-700 mb-2">Category</label>
                    <input type="text" name="category" id="category" value="{{ old('category', $blogPost->category) }}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#265478] focus:border-transparent">
                </div>
                <div>
                    <label for="tags" class="block text-sm font-medium text-gray-700 mb-2">Tags (comma separated)</label>
                    <input type="text" name="tags" id="tags" value="{{ old('tags', is_array($blogPost->tags) ? implode(',', $blogPost->tags) : $blogPost->tags) }}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#265478] focus:border-transparent">
                </div>
                <div>
                    <label class="flex items-center">
                        <input type="checkbox" name="is_published" id="is_published" value="1" {{ old('is_published', $blogPost->is_published) ? 'checked' : '' }}
                               class="rounded border-gray-300 text-[#265478] focus:ring-[#265478]">
                        <span class="ml-2 text-sm text-gray-700">Published</span>
                    </label>
                    <p class="mt-1 text-sm text-gray-500">Check to make post public</p>
                </div>
            </div>

            <!-- SEO Section -->
            <div class="border-t border-gray-200 pt-6">
                <h3 class="text-lg font-medium text-gray-900 mb-4">SEO Settings</h3>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <div>
                        <label for="meta_title" class="block text-sm font-medium text-gray-700 mb-2">Meta Title</label>
                        <input type="text" name="meta_title" id="meta_title" value="{{ old('meta_title', $blogPost->meta_title) }}"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#265478] focus:border-transparent">
                    </div>
                    <div>
                        <label for="meta_description" class="block text-sm font-medium text-gray-700 mb-2">Meta Description</label>
                        <textarea name="meta_description" id="meta_description" rows="3"
                                  class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#265478] focus:border-transparent">{{ old('meta_description', $blogPost->meta_description) }}</textarea>
                    </div>
                </div>
            </div>

            <!-- Actions -->
            <div class="flex justify-end space-x-4 pt-6 border-t border-gray-200">
                <a href="{{ route('admin.blog-posts.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded-lg">
                    Cancel
                </a>
                <button type="submit" class="bg-[#265478] hover:bg-[#a9c1d4ff] text-white px-6 py-2 rounded-lg flex items-center">
                    <i class="fas fa-save mr-2"></i>
                    Update Post
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

    // Drag and drop
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
        if (files.length > 0) handleFile(files[0]);
    });

    fileInput.on('change', function() {
        if (this.files.length > 0) handleFile(this.files[0]);
    });

    removeBtn.on('click', function(e) {
        e.stopPropagation();
        resetImageUpload();
    });

    function handleFile(file) {
        if (!file.type.startsWith('image/')) { alert('Please select an image'); return; }
        if (file.size > 2 * 1024 * 1024) { alert('Max 2MB allowed'); return; }
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

    // Auto slug
    $('#title').on('keyup', function() {
        const title = $(this).val();
        const slug = title.toLowerCase()
            .replace(/[^a-z0-9 -]/g, '')
            .replace(/\s+/g, '-')
            .replace(/-+/g, '-')
            .trim('-');
        if ($('#slug').val() === '') $('#slug').val(slug);
    });

    // Validation
    $('form').on('submit', function(e) {
        if (!$('#title').val().trim()) { alert('Enter title'); $('#title').focus(); e.preventDefault(); return false; }
        if (!$('#excerpt').val().trim()) { alert('Enter excerpt'); $('#excerpt').focus(); e.preventDefault(); return false; }
        if (!$('#content').val().trim()) { alert('Enter content'); $('#content').focus(); e.preventDefault(); return false; }
    });
});
</script>
@endpush
