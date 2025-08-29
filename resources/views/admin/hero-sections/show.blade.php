@extends('admin.layouts.app')

@section('title', 'View Hero Section')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Hero Section Details</h1>
            <p class="text-gray-600">View hero section information</p>
        </div>
        <div class="flex space-x-3">
            <a href="{{ route('admin.hero-sections.edit', $heroSection) }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex items-center">
                <i class="fas fa-edit mr-2"></i>
                Edit
            </a>
            <a href="{{ route('admin.hero-sections.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg flex items-center">
                <i class="fas fa-arrow-left mr-2"></i>
                Back to List
            </a>
        </div>
    </div>

    <!-- Hero Section Details -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Main Information -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Basic Information -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Basic Information</h2>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Title</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $heroSection->title }}</p>
                    </div>
                    
                    @if($heroSection->subtitle)
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Subtitle</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $heroSection->subtitle }}</p>
                        </div>
                    @endif
                    
                    @if($heroSection->description)
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Description</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $heroSection->description }}</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Button Information -->
            @if($heroSection->button_text || $heroSection->button_url)
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <h2 class="text-lg font-semibold text-gray-900 mb-4">Button Information</h2>
                    <div class="space-y-4">
                        @if($heroSection->button_text)
                            <div>
                                <label class="block text-sm font-medium text-gray-500">Button Text</label>
                                <p class="mt-1 text-sm text-gray-900">{{ $heroSection->button_text }}</p>
                            </div>
                        @endif
                        
                        @if($heroSection->button_url)
                            <div>
                                <label class="block text-sm font-medium text-gray-500">Button URL</label>
                                <a href="{{ $heroSection->button_url }}" target="_blank" class="mt-1 text-sm text-blue-600 hover:text-blue-800 break-all">
                                    {{ $heroSection->button_url }}
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            @endif

            <!-- Background Image -->
            @if($heroSection->background_image)
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <h2 class="text-lg font-semibold text-gray-900 mb-4">Background Image</h2>
                    <div class="aspect-w-16 aspect-h-9">
                        <img src="{{ Storage::url($heroSection->background_image) }}" 
                             alt="{{ $heroSection->title }}" 
                             class="w-full h-auto rounded-lg object-cover">
                    </div>
                </div>
            @endif
        </div>

        <!-- Sidebar Information -->
        <div class="space-y-6">
            <!-- Status and Settings -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Status & Settings</h2>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Status</label>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $heroSection->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            {{ $heroSection->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Sort Order</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $heroSection->sort_order }}</p>
                    </div>
                </div>
            </div>

            <!-- Timestamps -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Timestamps</h2>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Created</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $heroSection->created_at->format('M d, Y \a\t g:i A') }}</p>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Last Updated</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $heroSection->updated_at->format('M d, Y \a\t g:i A') }}</p>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Quick Actions</h2>
                <div class="space-y-3">
                    <a href="{{ route('admin.hero-sections.edit', $heroSection) }}" 
                       class="w-full bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex items-center justify-center">
                        <i class="fas fa-edit mr-2"></i>
                        Edit Hero Section
                    </a>
                    
                    <button onclick="toggleStatus({{ $heroSection->id }})" 
                            class="w-full bg-yellow-600 hover:bg-yellow-700 text-white px-4 py-2 rounded-lg flex items-center justify-center">
                        <i class="fas fa-toggle-on mr-2"></i>
                        Toggle Status
                    </button>
                    
                    <button onclick="deleteHeroSection({{ $heroSection->id }}, '{{ $heroSection->title }}')" 
                            class="w-full bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg flex items-center justify-center">
                        <i class="fas fa-trash mr-2"></i>
                        Delete Hero Section
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div id="delete-modal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
        <div class="mt-3 text-center">
            <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100">
                <i class="fas fa-exclamation-triangle text-red-600"></i>
            </div>
            <h3 class="text-lg leading-6 font-medium text-gray-900 mt-4">Delete Hero Section</h3>
            <div class="mt-2 px-7 py-3">
                <p class="text-sm text-gray-500">
                    Are you sure you want to delete "<span id="delete-title"></span>"? This action cannot be undone.
                </p>
            </div>
            <div class="items-center px-4 py-3">
                <form id="delete-form" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg mr-2">
                        Delete
                    </button>
                </form>
                <button id="cancel-delete" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-lg">
                    Cancel
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
function toggleStatus(id) {
    $.ajax({
        url: '/admin/hero-sections/' + id + '/toggle-status',
        method: 'PATCH',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            if (response.success) {
                location.reload();
            }
        },
        error: function() {
            alert('Error updating status');
        }
    });
}

function deleteHeroSection(id, title) {
    $('#delete-title').text(title);
    $('#delete-form').attr('action', '/admin/hero-sections/' + id);
    $('#delete-modal').removeClass('hidden');
}

$(document).ready(function() {
    $('#cancel-delete').on('click', function() {
        $('#delete-modal').addClass('hidden');
    });

    $('#delete-modal').on('click', function(e) {
        if (e.target === this) {
            $(this).addClass('hidden');
        }
    });
});
</script>
@endpush
