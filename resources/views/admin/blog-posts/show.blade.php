@extends('admin.layouts.app')

@section('title', 'Blog Post Details')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">{{ $blogPost->title }}</h1>
            <p class="text-gray-600">Blog post details and information</p>
        </div>
        <div class="flex space-x-3">
            <a href="{{ route('admin.blog-posts.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg flex items-center">
                <i class="fas fa-arrow-left mr-2"></i>
                Back to List
            </a>
            <a href="{{ route('admin.blog-posts.edit', $blogPost->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg flex items-center">
                <i class="fas fa-edit mr-2"></i>
                Edit
            </a>
        </div>
    </div>

    <!-- Blog Details -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Main Content -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Basic Information -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Basic Information</h2>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Title</label>
                        <p class="text-lg text-gray-900">{{ $blogPost->title }}</p>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Slug</label>
                        <p class="text-gray-900 font-mono bg-gray-100 px-2 py-1 rounded">{{ $blogPost->slug }}</p>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Excerpt</label>
                        <p class="text-gray-900">{{ $blogPost->excerpt }}</p>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Category</label>
                        <p class="text-gray-900">{{ $blogPost->category ?? 'Uncategorized' }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-500">Tags</label>
                        <div class="flex flex-wrap gap-2">
                            @forelse($blogPost->tags as $tag)
                                <span class="px-3 py-1 bg-gray-200 text-gray-800 rounded-full text-sm">{{ $tag }}</span>
                            @empty
                                <span class="text-gray-500">No tags</span>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>

            <!-- Full Content -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Full Content</h2>
                <div class="prose max-w-none">
                    {!! nl2br(e($blogPost->content)) !!}
                </div>
            </div>

            <!-- SEO Information -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">SEO Settings</h2>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Meta Title</label>
                        <p class="text-gray-900">{{ $blogPost->meta_title ?: 'Not set' }}</p>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Meta Description</label>
                        <p class="text-gray-900">{{ $blogPost->meta_description ?: 'Not set' }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="space-y-6">
            <!-- Featured Image -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Featured Image</h3>
                @if($blogPost->featured_image)
                    <img src="{{ Storage::url($blogPost->featured_image) }}" alt="{{ $blogPost->title }}" class="w-full h-auto rounded-lg">
                @else
                    <div class="bg-gray-100 rounded-lg p-8 text-center">
                        <i class="fas fa-image text-4xl text-gray-400 mb-2"></i>
                        <p class="text-gray-500">No featured image uploaded</p>
                    </div>
                @endif
            </div>

            <!-- Extra Images -->
            @if($blogPost->images && count($blogPost->images))
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Additional Images</h3>
                <div class="grid grid-cols-2 gap-4">
                    @foreach($blogPost->images as $image)
                        <img src="{{ Storage::url($image->path) }}" alt="Blog Image" class="rounded-lg shadow">
                    @endforeach
                </div>
            </div>
            @endif

            <!-- Status & Settings -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Status & Settings</h3>
                <div class="space-y-4">
                    <div class="flex items-center justify-between">
                        <span class="text-sm font-medium text-gray-500">Status</span>
                        <button type="button" 
                                class="toggle-status-btn px-3 py-1 rounded-full text-sm font-medium {{ $blogPost->is_published ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}"
                                data-id="{{ $blogPost->id }}"
                                data-current-status="{{ $blogPost->is_published }}">
                            {{ $blogPost->is_published ? 'Published' : 'Draft' }}
                        </button>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Author</label>
                        <p class="text-gray-900">{{ $blogPost->author_name ?? ($blogPost->author->name ?? 'Unknown') }}</p>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Created</label>
                        <p class="text-gray-900">{{ $blogPost->created_at->format('M d, Y \a\t g:i A') }}</p>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Last Updated</label>
                        <p class="text-gray-900">{{ $blogPost->updated_at->format('M d, Y \a\t g:i A') }}</p>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Quick Actions</h3>
                <div class="space-y-3">
                    <a href="{{ route('admin.blog-posts.edit', $blogPost->id) }}" 
                       class="w-full bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg flex items-center justify-center">
                        <i class="fas fa-edit mr-2"></i>
                        Edit Blog Post
                    </a>
                    
                    <button type="button" 
                            class="w-full bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg flex items-center justify-center delete-btn"
                            data-id="{{ $blogPost->id }}"
                            data-name="{{ $blogPost->title }}">
                        <i class="fas fa-trash mr-2"></i>
                        Delete Blog Post
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div id="delete-modal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="bg-white rounded-lg max-w-md w-full p-6">
            <div class="flex items-center mb-4">
                <i class="fas fa-exclamation-triangle text-red-500 text-2xl mr-3"></i>
                <h3 class="text-lg font-semibold text-gray-900">Confirm Delete</h3>
            </div>
            <p class="text-gray-600 mb-6">Are you sure you want to delete "<span id="delete-blog-title"></span>"? This action cannot be undone.</p>
            <div class="flex justify-end space-x-3">
                <button type="button" id="cancel-delete" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg">
                    Cancel
                </button>
                <form id="delete-form" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg">
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    // Toggle status
    $('.toggle-status-btn').on('click', function() {
        const btn = $(this);
        const postId = btn.data('id');
        
        $.ajax({
            url: `/admin/blog-posts/${postId}/toggle-status`,
            method: 'PATCH',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                if (response.success) {
                    if (response.is_published) {
                        btn.removeClass('bg-red-100 text-red-800').addClass('bg-green-100 text-green-800');
                        btn.text('Published');
                    } else {
                        btn.removeClass('bg-green-100 text-green-800').addClass('bg-red-100 text-red-800');
                        btn.text('Draft');
                    }
                    btn.data('current-status', response.is_published);
                    showAlert('Status updated successfully!', 'success');
                }
            },
            error: function() {
                showAlert('Failed to update status. Please try again.', 'error');
            }
        });
    });

    // Delete confirmation
    $('.delete-btn').on('click', function() {
        const postId = $(this).data('id');
        const postTitle = $(this).data('name');
        
        $('#delete-blog-title').text(postTitle);
        $('#delete-form').attr('action', `/admin/blog-posts/${postId}`);
        $('#delete-modal').removeClass('hidden');
    });

    // Cancel delete
    $('#cancel-delete').on('click', function() {
        $('#delete-modal').addClass('hidden');
    });

    // Close modal on background click
    $('#delete-modal').on('click', function(e) {
        if (e.target === this) {
            $(this).addClass('hidden');
        }
    });

    function showAlert(message, type) {
        const alertClass = type === 'success' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800';
        const alert = $(`<div class="fixed top-4 right-4 ${alertClass} px-6 py-3 rounded-lg shadow-lg z-50">${message}</div>`);
        $('body').append(alert);
        setTimeout(function() {
            alert.fadeOut(function() {
                $(this).remove();
            });
        }, 3000);
    }
});
</script>
@endpush
