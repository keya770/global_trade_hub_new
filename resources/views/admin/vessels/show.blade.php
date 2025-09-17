@extends('admin.layouts.app')

@section('title', 'Vessel Details')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">{{ $vessel->name }}</h1>
            <p class="text-gray-600">Vessel details and information</p>
        </div>
        <div class="flex space-x-3">
            <a href="{{ route('admin.vessels.index') }}" 
               class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg flex items-center">
                <i class="fas fa-arrow-left mr-2"></i>
                Back to List
            </a>
            <a href="{{ route('admin.vessels.edit', $vessel->id) }}" 
               class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg flex items-center">
                <i class="fas fa-edit mr-2"></i>
                Edit
            </a>
        </div>
    </div>

    <!-- Vessel Details -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Main Content -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Basic Information -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Basic Information</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Vessel Name</label>
                        <p class="text-lg text-gray-900">{{ $vessel->name }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Type</label>
                        <p class="text-gray-900">{{ $vessel->type }}</p>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-500">Description</label>
                        <p class="text-gray-900">{{ $vessel->description }}</p>
                    </div>
                </div>
            </div>

            <!-- Specifications -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Specifications</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Capacity</label>
                        <p class="text-gray-900">{{ $vessel->capacity ?: 'N/A' }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Length</label>
                        <p class="text-gray-900">{{ $vessel->length ?: 'N/A' }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Width</label>
                        <p class="text-gray-900">{{ $vessel->width ?: 'N/A' }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Draft</label>
                        <p class="text-gray-900">{{ $vessel->draft ?: 'N/A' }}</p>
                    </div>
                </div>
            </div>

            <!-- Additional Info -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Additional Information</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Daily Rate</label>
                        <p class="text-gray-900">{{ $vessel->daily_rate ? '$'.number_format($vessel->daily_rate,2) : 'N/A' }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Flag</label>
                        <p class="text-gray-900">{{ $vessel->flag ?: 'N/A' }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Built Year</label>
                        <p class="text-gray-900">{{ $vessel->built_year ?: 'N/A' }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-500">IMO Number</label>
                        <p class="text-gray-900">{{ $vessel->imo_number ?: 'N/A' }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="space-y-6">
            <!-- Vessel Image -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Vessel Image</h3>
                @if($vessel->image)
                    <img src="{{ asset($vessel->image) }}" alt="{{ $vessel->name }}" class="w-full h-auto rounded-lg">
                @else
                    <div class="bg-gray-100 rounded-lg p-8 text-center">
                        <i class="fas fa-ship text-4xl text-gray-400 mb-2"></i>
                        <p class="text-gray-500">No image uploaded</p>
                    </div>
                @endif
            </div>

            <!-- Status & Settings -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Status & Settings</h3>
                <div class="space-y-4">
                    <div class="flex items-center justify-between">
                        <span class="text-sm font-medium text-gray-500">Availability</span>
                        <span class="px-3 py-1 rounded-full text-sm font-medium {{ $vessel->is_available ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            {{ $vessel->is_available ? 'Available' : 'Unavailable' }}
                        </span>
                    </div>

                    <div class="flex items-center justify-between">
                        <span class="text-sm font-medium text-gray-500">Featured</span>
                        <span class="px-3 py-1 rounded-full text-sm font-medium {{ $vessel->is_featured ? 'bg-blue-100 text-blue-800' : 'bg-gray-100 text-gray-800' }}">
                            {{ $vessel->is_featured ? 'Yes' : 'No' }}
                        </span>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-500">Sort Order</label>
                        <p class="text-gray-900">{{ $vessel->sort_order }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-500">Created</label>
                        <p class="text-gray-900">{{ $vessel->created_at->format('M d, Y \a\t g:i A') }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-500">Last Updated</label>
                        <p class="text-gray-900">{{ $vessel->updated_at->format('M d, Y \a\t g:i A') }}</p>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Quick Actions</h3>
                <div class="space-y-3">
                    <a href="{{ route('admin.vessels.edit', $vessel->id) }}" 
                       class="w-full bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg flex items-center justify-center">
                        <i class="fas fa-edit mr-2"></i>
                        Edit Vessel
                    </a>

                    <button type="button" 
                            class="w-full bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg flex items-center justify-center delete-btn"
                            data-id="{{ $vessel->id }}"
                            data-name="{{ $vessel->name }}">
                        <i class="fas fa-trash mr-2"></i>
                        Delete Vessel
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
            <p class="text-gray-600 mb-6">Are you sure you want to delete "<span id="delete-vessel-name"></span>"? This action cannot be undone.</p>
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
    // Delete confirmation
    $('.delete-btn').on('click', function() {
        const vesselId = $(this).data('id');
        const vesselName = $(this).data('name');
        
        $('#delete-vessel-name').text(vesselName);
        $('#delete-form').attr('action', `/admin/vessels/${vesselId}`);
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
});
</script>
@endpush
