@extends('admin.layouts.app')

@section('title', 'Vessels Management')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Vessels Management</h1>
            <p class="text-gray-600">Manage your fleet of vessels and ships</p>
        </div>
        <a href="{{ route('admin.vessels.create') }}" class="bg-[#265478] hover:bg-[#1e4260] text-white px-4 py-2 rounded-lg flex items-center">
            <i class="fas fa-plus mr-2"></i>
            Add Vessel
        </a>
    </div>

    <!-- Filters and Search -->
    <div class="bg-white rounded-lg shadow-sm p-6">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <!-- Search -->
            <div>
                <label for="search" class="block text-sm font-medium text-gray-700 mb-2">Search</label>
                <input type="text" id="search" placeholder="Search vessels..." 
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#265478] focus:border-transparent">
            </div>

            <!-- Type Filter -->
            <div>
                <label for="type-filter" class="block text-sm font-medium text-gray-700 mb-2">Type</label>
                <select id="type-filter" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#265478] focus:border-transparent">
                    <option value="">All Types</option>
                    <option value="Bulk Carrier">Bulk Carrier</option>
                    <option value="Container Ship">Container Ship</option>
                    <option value="Tanker">Tanker</option>
                    <option value="General Cargo">General Cargo</option>
                    <option value="Passenger Ship">Passenger Ship</option>
                </select>
            </div>

            <!-- Availability Filter -->
            <div>
                <label for="availability-filter" class="block text-sm font-medium text-gray-700 mb-2">Availability</label>
                <select id="availability-filter" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#265478] focus:border-transparent">
                    <option value="">All</option>
                    <option value="1">Available</option>
                    <option value="0">Not Available</option>
                </select>
            </div>

            <!-- Featured Filter -->
            <div>
                <label for="featured-filter" class="block text-sm font-medium text-gray-700 mb-2">Featured</label>
                <select id="featured-filter" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#265478] focus:border-transparent">
                    <option value="">All</option>
                    <option value="1">Featured</option>
                    <option value="0">Not Featured</option>
                </select>
            </div>
        </div>

        <!-- Clear Filters -->
        <div class="mt-4">
            <button id="clear-filters" class="text-[#265478] hover:text-[#1e4260] text-sm font-medium">
                <i class="fas fa-times mr-1"></i>Clear all filters
            </button>
        </div>
    </div>

    <!-- Vessels Table -->
    <div class="bg-white rounded-lg shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Vessel
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Type
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Capacity
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Daily Rate
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Status
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200" id="vessels-table-body">
                    @forelse($vessels as $vessel)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-12 w-12">
                                    @if($vessel->image)
                                        <img class="h-12 w-12 rounded-lg object-cover" src="{{ Storage::url($vessel->image) }}" alt="{{ $vessel->name }}">
                                    @else
                                        <div class="h-12 w-12 rounded-lg bg-gray-200 flex items-center justify-center">
                                            <i class="fas fa-ship text-gray-400"></i>
                                        </div>
                                    @endif
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">{{ $vessel->name }}</div>
                                    <div class="text-sm text-gray-500">{{ Str::limit($vessel->description, 50) }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">
                                {{ $vessel->type }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            {{ $vessel->capacity ?: 'N/A' }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            @if($vessel->daily_rate)
                                ${{ number_format($vessel->daily_rate, 2) }}
                            @else
                                N/A
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex space-x-2">
                                <button type="button" 
                                        class="toggle-availability-btn px-2 py-1 text-xs font-medium rounded-full {{ $vessel->is_available ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}"
                                        data-id="{{ $vessel->id }}"
                                        data-current-status="{{ $vessel->is_available }}">
                                    {{ $vessel->is_available ? 'Available' : 'Not Available' }}
                                </button>
                                <button type="button" 
                                        class="toggle-featured-btn px-2 py-1 text-xs font-medium rounded-full {{ $vessel->is_featured ? 'bg-yellow-100 text-yellow-800' : 'bg-gray-100 text-gray-800' }}"
                                        data-id="{{ $vessel->id }}"
                                        data-current-status="{{ $vessel->is_featured }}">
                                    {{ $vessel->is_featured ? 'Featured' : 'Not Featured' }}
                                </button>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex space-x-2">
                                <a href="{{ route('admin.vessels.show', $vessel->id) }}" 
                                   class="text-blue-600 hover:text-blue-900" title="View">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.vessels.edit', $vessel->id) }}" 
                                   class="text-indigo-600 hover:text-indigo-900" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button type="button" 
                                        class="delete-btn text-red-600 hover:text-red-900" 
                                        data-id="{{ $vessel->id }}"
                                        data-name="{{ $vessel->name }}"
                                        title="Delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                            <i class="fas fa-ship text-4xl mb-4"></i>
                            <p class="text-lg font-medium">No vessels found</p>
                            <p class="text-sm">Get started by adding your first vessel.</p>
                            <a href="{{ route('admin.vessels.create') }}" class="mt-4 inline-flex items-center px-4 py-2 bg-[#265478] text-white rounded-lg hover:bg-[#1e4260]">
                                <i class="fas fa-plus mr-2"></i>
                                Add Vessel
                            </a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($vessels->hasPages())
        <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
            {{ $vessels->links() }}
        </div>
        @endif
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
    // Search functionality
    $('#search').on('keyup', function() {
        filterVessels();
    });

    // Filter functionality
    $('#type-filter, #availability-filter, #featured-filter').on('change', function() {
        filterVessels();
    });

    // Clear filters
    $('#clear-filters').on('click', function() {
        $('#search').val('');
        $('#type-filter').val('');
        $('#availability-filter').val('');
        $('#featured-filter').val('');
        filterVessels();
    });

    function filterVessels() {
        const search = $('#search').val().toLowerCase();
        const type = $('#type-filter').val();
        const availability = $('#availability-filter').val();
        const featured = $('#featured-filter').val();

        $('#vessels-table-body tr').each(function() {
            const row = $(this);
            const vesselName = row.find('td:first .text-gray-900').text().toLowerCase();
            const vesselType = row.find('td:nth-child(2) span').text();
            const isAvailable = row.find('.toggle-availability-btn').data('current-status');
            const isFeatured = row.find('.toggle-featured-btn').data('current-status');

            let show = true;

            // Search filter
            if (search && !vesselName.includes(search)) {
                show = false;
            }

            // Type filter
            if (type && vesselType !== type) {
                show = false;
            }

            // Availability filter
            if (availability !== '' && isAvailable.toString() !== availability) {
                show = false;
            }

            // Featured filter
            if (featured !== '' && isFeatured.toString() !== featured) {
                show = false;
            }

            row.toggle(show);
        });
    }

    // Toggle availability
    $('.toggle-availability-btn').on('click', function() {
        const btn = $(this);
        const vesselId = btn.data('id');
        
        $.ajax({
            url: `/admin/vessels/${vesselId}/toggle-availability`,
            method: 'PATCH',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                if (response.success) {
                    if (response.is_available) {
                        btn.removeClass('bg-red-100 text-red-800').addClass('bg-green-100 text-green-800');
                        btn.text('Available');
                    } else {
                        btn.removeClass('bg-green-100 text-green-800').addClass('bg-red-100 text-red-800');
                        btn.text('Not Available');
                    }
                    btn.data('current-status', response.is_available);
                    showAlert('Availability updated successfully!', 'success');
                }
            },
            error: function() {
                showAlert('Failed to update availability. Please try again.', 'error');
            }
        });
    });

    // Toggle featured
    $('.toggle-featured-btn').on('click', function() {
        const btn = $(this);
        const vesselId = btn.data('id');
        
        $.ajax({
            url: `/admin/vessels/${vesselId}/toggle-featured`,
            method: 'PATCH',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                if (response.success) {
                    if (response.is_featured) {
                        btn.removeClass('bg-gray-100 text-gray-800').addClass('bg-yellow-100 text-yellow-800');
                        btn.text('Featured');
                    } else {
                        btn.removeClass('bg-yellow-100 text-yellow-800').addClass('bg-gray-100 text-gray-800');
                        btn.text('Not Featured');
                    }
                    btn.data('current-status', response.is_featured);
                    showAlert('Featured status updated successfully!', 'success');
                }
            },
            error: function() {
                showAlert('Failed to update featured status. Please try again.', 'error');
            }
        });
    });

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
