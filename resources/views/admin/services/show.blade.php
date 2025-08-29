@extends('admin.layouts.app')

@section('title', 'Service Details')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">{{ $service->name }}</h1>
            <p class="text-gray-600">Service details and information</p>
        </div>
        <div class="flex space-x-3">
            <a href="{{ route('admin.services.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg flex items-center">
                <i class="fas fa-arrow-left mr-2"></i>
                Back to List
            </a>
            <a href="{{ route('admin.services.edit', $service->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg flex items-center">
                <i class="fas fa-edit mr-2"></i>
                Edit
            </a>
        </div>
    </div>

    <!-- Service Details -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Main Content -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Basic Information -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Basic Information</h2>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Service Name</label>
                        <p class="text-lg text-gray-900">{{ $service->name }}</p>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Slug</label>
                        <p class="text-gray-900 font-mono bg-gray-100 px-2 py-1 rounded">{{ $service->slug }}</p>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Short Description</label>
                        <p class="text-gray-900">{{ $service->description }}</p>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Icon</label>
                        <div class="flex items-center space-x-2">
                            @if($service->icon)
                                <i class="{{ $service->icon }} text-2xl text-[#265478]"></i>
                                <span class="text-gray-900 font-mono">{{ $service->icon }}</span>
                            @else
                                <span class="text-gray-500">No icon set</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Full Content -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Full Content</h2>
                <div class="prose max-w-none">
                    {!! nl2br(e($service->content)) !!}
                </div>
            </div>

            <!-- SEO Information -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">SEO Settings</h2>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Meta Title</label>
                        <p class="text-gray-900">{{ $service->meta_title ?: 'Not set' }}</p>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Meta Description</label>
                        <p class="text-gray-900">{{ $service->meta_description ?: 'Not set' }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="space-y-6">
            <!-- Service Image -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Service Image</h3>
                @if($service->image)
                    <img src="{{ Storage::url($service->image) }}" alt="{{ $service->name }}" class="w-full h-auto rounded-lg">
                @else
                    <div class="bg-gray-100 rounded-lg p-8 text-center">
                        <i class="fas fa-image text-4xl text-gray-400 mb-2"></i>
                        <p class="text-gray-500">No image uploaded</p>
                    </div>
                @endif
            </div>

            <!-- Status & Settings -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Status & Settings</h3>
                <div class="space-y-4">
                    <div class="flex items-center justify-between">
                        <span class="text-sm font-medium text-gray-500">Status</span>
                        <button type="button" 
                                class="toggle-status-btn px-3 py-1 rounded-full text-sm font-medium {{ $service->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}"
                                data-id="{{ $service->id }}"
                                data-current-status="{{ $service->is_active }}">
                            {{ $service->is_active ? 'Active' : 'Inactive' }}
                        </button>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Sort Order</label>
                        <p class="text-gray-900">{{ $service->sort_order }}</p>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Created</label>
                        <p class="text-gray-900">{{ $service->created_at->format('M d, Y \a\t g:i A') }}</p>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Last Updated</label>
                        <p class="text-gray-900">{{ $service->updated_at->format('M d, Y \a\t g:i A') }}</p>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Quick Actions</h3>
                <div class="space-y-3">
                    <a href="{{ route('admin.services.edit', $service->id) }}" 
                       class="w-full bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg flex items-center justify-center">
                        <i class="fas fa-edit mr-2"></i>
                        Edit Service
                    </a>
                    
                    <button type="button" 
                            class="w-full bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg flex items-center justify-center delete-btn"
                            data-id="{{ $service->id }}"
                            data-name="{{ $service->name }}">
                        <i class="fas fa-trash mr-2"></i>
                        Delete Service
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
            <p class="text-gray-600 mb-6">Are you sure you want to delete "<span id="delete-service-name"></span>"? This action cannot be undone.</p>
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
        const serviceId = btn.data('id');
        const currentStatus = btn.data('current-status');
        
        $.ajax({
            url: `/admin/services/${serviceId}/toggle-status`,
            method: 'PATCH',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                if (response.success) {
                    // Update button appearance
                    if (response.is_active) {
                        btn.removeClass('bg-red-100 text-red-800').addClass('bg-green-100 text-green-800');
                        btn.text('Active');
                    } else {
                        btn.removeClass('bg-green-100 text-green-800').addClass('bg-red-100 text-red-800');
                        btn.text('Inactive');
                    }
                    
                    // Update data attributes
                    btn.data('current-status', response.is_active);
                    
                    // Show success message
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
        const serviceId = $(this).data('id');
        const serviceName = $(this).data('name');
        
        $('#delete-service-name').text(serviceName);
        $('#delete-form').attr('action', `/admin/services/${serviceId}`);
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
        const alert = $(`
            <div class="fixed top-4 right-4 ${alertClass} px-6 py-3 rounded-lg shadow-lg z-50">
                ${message}
            </div>
        `);
        
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
