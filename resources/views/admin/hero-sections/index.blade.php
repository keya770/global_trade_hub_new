@extends('admin.layouts.app')

@section('title', 'Hero Sections')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Hero Sections</h1>
            <p class="text-gray-600">Manage your homepage hero sections and banners</p>
        </div>
        <a href="{{ route('admin.hero-sections.create') }}" class="bg-[#265478] hover:bg-[#a9c1d4ff] text-white px-4 py-2 rounded-lg flex items-center">
            <i class="fas fa-plus mr-2"></i>
            Add Hero Section
        </a>
    </div>

    <!-- Search and Filters -->
    <div class="bg-white rounded-lg shadow-sm p-6">
        <div class="flex flex-col md:flex-row gap-4">
            <div class="flex-1">
                <input type="text" id="search" placeholder="Search hero sections..." class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#265478] focus:border-transparent">
            </div>
            <div class="flex gap-2">
                <select id="status-filter" class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#265478] focus:border-transparent">
                    <option value="">All Status</option>
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
                <button id="clear-filters" class="px-4 py-2 text-gray-600 hover:text-gray-900 border border-gray-300 rounded-lg hover:bg-gray-50">
                    Clear
                </button>
            </div>
        </div>
    </div>

    <!-- Hero Sections Table -->
    <div class="bg-white rounded-lg shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            <a href="#" class="sortable" data-sort="title">Title</a>
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            <a href="#" class="sortable" data-sort="sort_order">Order</a>
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Status
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Image
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Created
                        </th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200" id="hero-sections-table">
                    @forelse($heroSections as $heroSection)
                        <tr class="hero-section-row" data-title="{{ strtolower($heroSection->title) }}" data-status="{{ $heroSection->is_active ? '1' : '0' }}">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        @if($heroSection->background_image)
                                            <img class="h-10 w-10 rounded-lg object-cover" src="{{ Storage::url($heroSection->background_image) }}" alt="{{ $heroSection->title }}">
                                        @else
                                            <div class="h-10 w-10 rounded-lg bg-gray-200 flex items-center justify-center">
                                                <i class="fas fa-image text-gray-400"></i>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">{{ $heroSection->title }}</div>
                                        @if($heroSection->subtitle)
                                            <div class="text-sm text-gray-500">{{ Str::limit($heroSection->subtitle, 50) }}</div>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                {{ $heroSection->sort_order }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <button class="status-toggle inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $heroSection->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}" 
                                        data-id="{{ $heroSection->id }}" data-status="{{ $heroSection->is_active ? '1' : '0' }}">
                                    {{ $heroSection->is_active ? 'Active' : 'Inactive' }}
                                </button>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                @if($heroSection->background_image)
                                    <span class="text-green-600">✓</span>
                                @else
                                    <span class="text-gray-400">✗</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $heroSection->created_at->format('M d, Y') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <div class="flex items-center justify-end space-x-2">
                                    <a href="{{ route('admin.hero-sections.show', $heroSection) }}" class="text-[#265478] hover:text-[#a9c1d4ff]">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.hero-sections.edit', $heroSection) }}" class="text-blue-600 hover:text-blue-900">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button class="delete-btn text-red-600 hover:text-red-900" data-id="{{ $heroSection->id }}" data-title="{{ $heroSection->title }}">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-4 text-center text-gray-500">
                                No hero sections found. <a href="{{ route('admin.hero-sections.create') }}" class="text-[#265478] hover:text-[#a9c1d4ff]">Create your first one</a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        @if($heroSections->hasPages())
            <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
                {{ $heroSections->links() }}
            </div>
        @endif
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
$(document).ready(function() {
    // Search functionality
    $('#search').on('keyup', function() {
        var value = $(this).val().toLowerCase();
        $('.hero-section-row').filter(function() {
            $(this).toggle($(this).data('title').indexOf(value) > -1)
        });
    });

    // Status filter
    $('#status-filter').on('change', function() {
        var status = $(this).val();
        if (status === '') {
            $('.hero-section-row').show();
        } else {
            $('.hero-section-row').hide();
            $('.hero-section-row[data-status="' + status + '"]').show();
        }
    });

    // Clear filters
    $('#clear-filters').on('click', function() {
        $('#search').val('');
        $('#status-filter').val('');
        $('.hero-section-row').show();
    });

    // Status toggle
    $('.status-toggle').on('click', function() {
        var button = $(this);
        var id = button.data('id');
        var currentStatus = button.data('status');
        
        $.ajax({
            url: '/admin/hero-sections/' + id + '/toggle-status',
            method: 'PATCH',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                if (response.success) {
                    var newStatus = response.is_active ? '1' : '0';
                    button.data('status', newStatus);
                    button.text(response.is_active ? 'Active' : 'Inactive');
                    button.removeClass('bg-green-100 text-green-800 bg-red-100 text-red-800');
                    button.addClass(response.is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800');
                    
                    // Update the row data attribute
                    button.closest('tr').attr('data-status', newStatus);
                }
            },
            error: function() {
                alert('Error updating status');
            }
        });
    });

    // Delete functionality
    $('.delete-btn').on('click', function() {
        var id = $(this).data('id');
        var title = $(this).data('title');
        
        $('#delete-title').text(title);
        $('#delete-form').attr('action', '/admin/hero-sections/' + id);
        $('#delete-modal').removeClass('hidden');
    });

    $('#cancel-delete').on('click', function() {
        $('#delete-modal').addClass('hidden');
    });

    // Close modal when clicking outside
    $('#delete-modal').on('click', function(e) {
        if (e.target === this) {
            $(this).addClass('hidden');
        }
    });
});
</script>
@endpush
