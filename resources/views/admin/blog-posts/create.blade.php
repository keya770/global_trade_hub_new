@extends('admin.layouts.app')

@section('title', 'Create Blog')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Create Blog</h1>
            <p class="text-gray-600">Add a new blog post</p>
        </div>
        <a href="{{ route('admin.blog-posts.index') }}" 
           class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg flex items-center">
            <i class="fas fa-arrow-left mr-2"></i>
            Back to List
        </a>
    </div>

    <!-- Form -->
    <div class="bg-white rounded-lg shadow-sm">
        <form action="{{ route('admin.blog-posts.store') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
            @csrf

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Left Column -->
                <div class="space-y-6">
                    <!-- Blog Title -->
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Title *</label>
                        <input type="text" name="title" id="title" value="{{ old('title') }}" 
                               class="w-full px-3 py-2 border rounded-lg @error('title') border-red-500 @enderror"
                               placeholder="Enter blog title">
                        @error('title')<p class="text-red-600 text-sm">{{ $message }}</p>@enderror
                    </div>

                    <!-- Blog Content -->
                    <div>
                        <label for="content" class="block text-sm font-medium text-gray-700 mb-2">Content *</label>
                        <textarea name="content" id="content" rows="6"
                                  class="w-full px-3 py-2 border rounded-lg @error('content') border-red-500 @enderror"
                                  placeholder="Write your blog content...">{{ old('content') }}</textarea>
                        @error('content')<p class="text-red-600 text-sm">{{ $message }}</p>@enderror
                    </div>

                    <!-- Tags -->
                    <div>
                        <label for="tags" class="block text-sm font-medium text-gray-700 mb-2">Tags</label>
                        <input type="text" name="tags" id="tags" value="{{ old('tags') }}"
                               class="w-full px-3 py-2 border rounded-lg"
                               placeholder="e.g. shipping, logistics, marine">
                        <p class="text-gray-500 text-sm mt-1">Separate tags with commas.</p>
                    </div>
                </div>

                <!-- Right Column -->
                <div class="space-y-6">
                    <!-- Featured Image -->
                    <div>
                        <label for="featured_image" class="block text-sm font-medium text-gray-700 mb-2">Featured Image</label>
                        <input type="file" name="featured_image" id="featured_image" accept="image/*"
                               class="w-full px-3 py-2 border rounded-lg @error('featured_image') border-red-500 @enderror">
                        <div class="mt-2">
                            <img id="preview-featured" class="hidden w-full h-48 object-cover rounded-lg border" />
                        </div>
                        @error('featured_image')<p class="text-red-600 text-sm">{{ $message }}</p>@enderror
                    </div>

                    <!-- Multiple Images -->
                    <div>
                        <label for="images" class="block text-sm font-medium text-gray-700 mb-2">Gallery Images</label>
                        <input type="file" name="images[]" id="images" accept="image/*" multiple
                               class="w-full px-3 py-2 border rounded-lg @error('images') border-red-500 @enderror">
                        <div id="preview-multiple" class="mt-3 grid grid-cols-2 md:grid-cols-3 gap-3"></div>
                        @error('images')<p class="text-red-600 text-sm">{{ $message }}</p>@enderror
                        @error('images.*')<p class="text-red-600 text-sm">{{ $message }}</p>@enderror
                    </div>

                    <!-- Publish Status -->
                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                        <select name="status" id="status" class="w-full px-3 py-2 border rounded-lg">
                            <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                            <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Published</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Submit -->
            <div class="flex justify-end space-x-4">
                <a href="{{ route('admin.blog-posts.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded-lg">
                    Cancel
                </a>
                <button type="submit" class="bg-[#265478] hover:bg-[#a9c1d4] text-white px-6 py-2 rounded-lg">
                    Create Blog
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Image Preview JS -->
<script>
    // Featured Image Preview
    document.getElementById('featured_image').addEventListener('change', function (event) {
        const file = event.target.files[0];
        const preview = document.getElementById('preview-featured');
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                preview.src = e.target.result;
                preview.classList.remove('hidden');
            };
            reader.readAsDataURL(file);
        } else {
            preview.src = '';
            preview.classList.add('hidden');
        }
    });

    // Multiple Images Preview
    document.getElementById('images').addEventListener('change', function (event) {
        const files = event.target.files;
        const previewContainer = document.getElementById('preview-multiple');
        previewContainer.innerHTML = '';
        if (files.length > 0) {
            Array.from(files).forEach(file => {
                const reader = new FileReader();
                reader.onload = function (e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.classList.add('w-full', 'h-32', 'object-cover', 'rounded-lg', 'border');
                    previewContainer.appendChild(img);
                };
                reader.readAsDataURL(file);
            });
        }
    });
</script>
@endsection
