@extends('admin.layouts.app')

@section('title', 'Vessel Inquiries Management')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Vessel Inquiries Management</h1>
            <p class="text-gray-600">Manage vessel sale & purchase and chartering inquiries</p>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <div class="bg-white rounded-lg shadow-lg p-6 text-center">
            <div class="text-3xl font-bold text-[#265478] mb-2">{{ $totalInquiries ?? 0 }}</div>
            <div class="text-gray-600">Total Inquiries</div>
        </div>
        <div class="bg-white rounded-lg shadow-lg p-6 text-center">
            <div class="text-3xl font-bold text-green-600 mb-2">{{ $pendingInquiries ?? 0 }}</div>
            <div class="text-gray-600">Pending</div>
        </div>
        <div class="bg-white rounded-lg shadow-lg p-6 text-center">
            <div class="text-3xl font-bold text-blue-600 mb-2">{{ $processedInquiries ?? 0 }}</div>
            <div class="text-gray-600">Processed</div>
        </div>
        <div class="bg-white rounded-lg shadow-lg p-6 text-center">
            <div class="text-3xl font-bold text-purple-600 mb-2">{{ $todayInquiries ?? 0 }}</div>
            <div class="text-gray-600">Today</div>
        </div>
    </div>

    <!-- Inquiry Filters -->
    <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
        <h2 class="text-xl font-bold text-gray-900 mb-4">Filter Inquiries</h2>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <!-- Search -->
            <div>
                <label for="inquiry-search" class="block text-sm font-medium text-gray-700 mb-2">Search</label>
                <input type="text" id="inquiry-search" placeholder="Search inquiries..." 
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#265478] focus:border-transparent">
            </div>

            <!-- Status Filter -->
            <div>
                <label for="inquiry-status-filter" class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                <select id="inquiry-status-filter" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#265478] focus:border-transparent">
                    <option value="">All Status</option>
                    <option value="pending">Pending</option>
                    <option value="processing">Processing</option>
                    <option value="completed">Completed</option>
                    <option value="cancelled">Cancelled</option>
                </select>
            </div>

            <!-- Inquiry Type Filter -->
            <div>
                <label for="inquiry-type-filter" class="block text-sm font-medium text-gray-700 mb-2">Inquiry Type</label>
                <select id="inquiry-type-filter" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#265478] focus:border-transparent">
                    <option value="">All Types</option>
                    <option value="sale_purchase">Sale & Purchase</option>
                    <option value="chartering">Chartering</option>
                </select>
            </div>

            <!-- Date Range -->
            <div>
                <label for="inquiry-date-filter" class="block text-sm font-medium text-gray-700 mb-2">Date Range</label>
                <select id="inquiry-date-filter" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#265478] focus:border-transparent">
                    <option value="">All Dates</option>
                    <option value="today">Today</option>
                    <option value="week">This Week</option>
                    <option value="month">This Month</option>
                    <option value="quarter">This Quarter</option>
                </select>
            </div>
        </div>
        
        <!-- Clear Filters -->
        <div class="mt-4">
            <button id="clear-inquiry-filters" class="text-[#265478] hover:text-[#a9c1d4ff] text-sm font-medium">
                <i class="fas fa-times mr-1"></i>Clear all filters
            </button>
        </div>
    </div>

    <!-- Inquiries Table -->
    <div class="bg-white rounded-lg shadow-sm overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200">
            <h2 class="text-xl font-bold text-gray-900">Vessel Inquiries</h2>
        </div>
        
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            <input type="checkbox" id="select-all-inquiries" class="rounded border-gray-300 text-[#265478] focus:ring-[#265478]">
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Contact Info
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Inquiry Type
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Vessel Details
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Status
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Date
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200" id="inquiries-table-body">
                    @forelse($inquiries ?? [] as $inquiry)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <input type="checkbox" class="inquiry-checkbox rounded border-gray-300 text-[#265478] focus:ring-[#265478]" value="{{ $inquiry->id }}">
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <div class="h-10 w-10 rounded-full bg-[#265478] flex items-center justify-center">
                                            <span class="text-white font-semibold text-sm">{{ substr($inquiry->full_name, 0, 2) }}</span>
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">{{ $inquiry->full_name }}</div>
                                        <div class="text-sm text-gray-500">{{ $inquiry->email }}</div>
                                        <div class="text-sm text-gray-500">{{ $inquiry->phone }}</div>
                                        @if($inquiry->company_name)
                                            <div class="text-sm text-gray-500">{{ $inquiry->company_name }}</div>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @php
                                    $typeColors = [
                                        'sale_purchase' => 'bg-blue-100 text-blue-800',
                                        'chartering' => 'bg-purple-100 text-purple-800'
                                    ];
                                @endphp
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $typeColors[$inquiry->inquiry_type] ?? 'bg-gray-100 text-gray-800' }}">
                                    {{ $inquiry->inquiry_type_label }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $inquiry->vessel_type }}</div>
                                <div class="text-sm text-gray-500">{{ $inquiry->vessel_specs }}</div>
                                @if($inquiry->formatted_budget !== 'Not specified')
                                    <div class="text-sm text-gray-500">{{ $inquiry->formatted_budget }}</div>
                                @endif
                                @if($inquiry->organisation_type)
                                    <div class="text-sm text-gray-500">{{ ucfirst(str_replace('_', ' ', $inquiry->organisation_type)) }}</div>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @php
                                    $statusColors = [
                                        'pending' => 'bg-yellow-100 text-yellow-800',
                                        'processing' => 'bg-blue-100 text-blue-800',
                                        'completed' => 'bg-green-100 text-green-800',
                                        'cancelled' => 'bg-red-100 text-red-800'
                                    ];
                                @endphp
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $statusColors[$inquiry->status] ?? 'bg-gray-100 text-gray-800' }}">
                                    {{ ucfirst($inquiry->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $inquiry->created_at->format('Y-m-d H:i') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <div class="flex space-x-2">
                                    <button onclick="viewInquiry({{ $inquiry->id }})" class="text-[#265478] hover:text-[#a9c1d4ff]" title="View Details">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button onclick="editInquiry({{ $inquiry->id }})" class="text-blue-600 hover:text-blue-800" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button onclick="deleteInquiry({{ $inquiry->id }})" class="text-red-600 hover:text-red-800" title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-4 text-center text-gray-500">
                                <div class="flex flex-col items-center">
                                    <i class="fas fa-inbox text-4xl text-gray-400 mb-2"></i>
                                    <p>No inquiries found</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination for Inquiries -->
        @if(isset($inquiries) && $inquiries->hasPages())
            <div class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6">
                <div class="flex-1 flex justify-between sm:hidden">
                    @if($inquiries->onFirstPage())
                        <span class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-400 bg-white cursor-not-allowed">
                            Previous
                        </span>
                    @else
                        <a href="{{ $inquiries->previousPageUrl() }}" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                            Previous
                        </a>
                    @endif
                    
                    @if($inquiries->hasMorePages())
                        <a href="{{ $inquiries->nextPageUrl() }}" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                            Next
                        </a>
                    @else
                        <span class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-400 bg-white cursor-not-allowed">
                            Next
                        </span>
                    @endif
                </div>
                <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                    <div>
                        <p class="text-sm text-gray-700">
                            Showing <span class="font-medium">{{ $inquiries->firstItem() }}</span> to <span class="font-medium">{{ $inquiries->lastItem() }}</span> of <span class="font-medium">{{ $inquiries->total() }}</span> results
                        </p>
                    </div>
                    <div>
                        {{ $inquiries->links() }}
                    </div>
                </div>
            </div>
        @endif
    </div>

    <!-- Bulk Actions for Inquiries -->
    <div class="mt-6 bg-white rounded-lg shadow-sm p-6">
        <h3 class="text-lg font-bold text-gray-900 mb-4">Bulk Actions</h3>
        <div class="flex flex-wrap gap-4">
            <button onclick="bulkExportInquiries()" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition-colors">
                <i class="fas fa-download mr-2"></i>
                Export Selected
            </button>
            <button onclick="bulkMarkProcessed()" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                <i class="fas fa-check mr-2"></i>
                Mark as Processed
            </button>
            <button onclick="bulkDeleteInquiries()" class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition-colors">
                <i class="fas fa-trash mr-2"></i>
                Delete Selected
            </button>
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

<!-- Inquiry Modal -->
<div id="inquiry-modal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
    <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-3/4 lg:w-1/2 shadow-lg rounded-md bg-white">
        <div class="mt-3">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-bold text-gray-900">Inquiry Details</h3>
                <button onclick="closeInquiryModal()" class="text-gray-400 hover:text-gray-600">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>
            <div id="inquiry-modal-content" class="space-y-4">
                <!-- Dynamic content will be loaded here -->
            </div>
            <div class="flex justify-end mt-6">
                <button onclick="closeInquiryModal()" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition-colors">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Inquiry Modal -->
<div id="edit-inquiry-modal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
    <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-3/4 lg:w-2/3 shadow-lg rounded-md bg-white">
        <div class="mt-3">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-bold text-gray-900">Edit Inquiry</h3>
                <button onclick="closeEditInquiryModal()" class="text-gray-400 hover:text-gray-600">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>
            <form id="edit-inquiry-form" method="POST">
                @csrf
                @method('PUT')
                <div id="edit-inquiry-form-content" class="space-y-4">
                    <!-- Dynamic form content will be loaded here -->
                </div>
                <div class="flex justify-end mt-6 space-x-3">
                    <button type="button" onclick="closeEditInquiryModal()" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition-colors">
                        Cancel
                    </button>
                    <button type="submit" class="bg-[#265478] text-white px-4 py-2 rounded-lg hover:bg-[#a9c1d4ff] transition-colors">
                        Update Inquiry
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    // Search functionality for inquiries
    $('#inquiry-search').on('keyup', function() {
        filterInquiries();
    });

    // Filter functionality for inquiries
    $('#inquiry-status-filter, #inquiry-type-filter, #inquiry-date-filter').on('change', function() {
        filterInquiries();
    });

    // Clear filters for inquiries
    $('#clear-inquiry-filters').on('click', function() {
        $('#inquiry-search').val('');
        $('#inquiry-status-filter').val('');
        $('#inquiry-type-filter').val('');
        $('#inquiry-date-filter').val('');
        filterInquiries();
    });

    // Select all inquiries
    $('#select-all-inquiries').on('change', function() {
        $('.inquiry-checkbox').prop('checked', this.checked);
    });

    // Individual inquiry checkbox change
    $('.inquiry-checkbox').on('change', function() {
        const checkedBoxes = $('.inquiry-checkbox:checked').length;
        const totalBoxes = $('.inquiry-checkbox').length;
        $('#select-all-inquiries').prop('checked', checkedBoxes === totalBoxes);
    });

    function filterInquiries() {
        const search = $('#inquiry-search').val().toLowerCase();
        const status = $('#inquiry-status-filter').val();
        const type = $('#inquiry-type-filter').val();
        const dateRange = $('#inquiry-date-filter').val();

        $('#inquiries-table-body tr').each(function() {
            const row = $(this);
            const contactInfo = row.find('td:nth-child(2)').text().toLowerCase();
            const inquiryType = row.find('td:nth-child(3) span').text().toLowerCase();
            const inquiryStatus = row.find('td:nth-child(5) span').text().toLowerCase();
            const inquiryDate = row.find('td:nth-child(6)').text();

            let show = true;

            // Search filter
            if (search && !contactInfo.includes(search)) {
                show = false;
            }

            // Status filter
            if (status && !inquiryStatus.includes(status.toLowerCase())) {
                show = false;
            }

            // Type filter
            if (type && !inquiryType.includes(type.replace('_', ' ').toLowerCase())) {
                show = false;
            }

            // Date filter (simplified - you can enhance this)
            if (dateRange && dateRange !== '') {
                const today = new Date();
                const inquiryDateObj = new Date(inquiryDate);
                
                switch(dateRange) {
                    case 'today':
                        if (inquiryDateObj.toDateString() !== today.toDateString()) {
                            show = false;
                        }
                        break;
                    case 'week':
                        const weekAgo = new Date(today.getTime() - 7 * 24 * 60 * 60 * 1000);
                        if (inquiryDateObj < weekAgo) {
                            show = false;
                        }
                        break;
                    case 'month':
                        const monthAgo = new Date(today.getTime() - 30 * 24 * 60 * 60 * 1000);
                        if (inquiryDateObj < monthAgo) {
                            show = false;
                        }
                        break;
                }
            }

            row.toggle(show);
        });
    }

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

// Inquiry CRUD Functions
function viewInquiry(id) {
    const modal = document.getElementById('inquiry-modal');
    const content = document.getElementById('inquiry-modal-content');
    
    // Find the inquiry row data
    const row = document.querySelector(`input[value="${id}"]`).closest('tr');
    const cells = row.querySelectorAll('td');
    
    // Extract data from the table row
    const contactInfo = cells[1].textContent.trim();
    const inquiryType = cells[2].textContent.trim();
    const vesselDetails = cells[3].textContent.trim();
    const status = cells[4].textContent.trim();
    const date = cells[5].textContent.trim();
    
    // Create modal content with actual data
    content.innerHTML = `
        <div class="space-y-4">
            <div class="border-b pb-4">
                <h4 class="font-semibold text-gray-900">Contact Information</h4>
                <div class="text-gray-600 whitespace-pre-line">${contactInfo}</div>
            </div>
            <div class="border-b pb-4">
                <h4 class="font-semibold text-gray-900">Inquiry Type</h4>
                <p class="text-gray-600">${inquiryType}</p>
            </div>
            <div class="border-b pb-4">
                <h4 class="font-semibold text-gray-900">Vessel Details</h4>
                <div class="text-gray-600 whitespace-pre-line">${vesselDetails}</div>
            </div>
            <div class="border-b pb-4">
                <h4 class="font-semibold text-gray-900">Status & Date</h4>
                <p class="text-gray-600">Status: ${status}</p>
                <p class="text-gray-600">Submitted: ${date}</p>
            </div>
            <div>
                <h4 class="font-semibold text-gray-900">Actions</h4>
                <div class="flex gap-2 mt-2">
                    <button onclick="editInquiry(${id})" class="bg-blue-600 text-white px-3 py-1 rounded text-sm hover:bg-blue-700">
                        <i class="fas fa-edit mr-1"></i>Edit
                    </button>
                    <button onclick="markAsProcessed(${id})" class="bg-green-600 text-white px-3 py-1 rounded text-sm hover:bg-green-700">
                        <i class="fas fa-check mr-1"></i>Mark Processed
                    </button>
                </div>
            </div>
        </div>
    `;
    
    modal.classList.remove('hidden');
}

function editInquiry(id) {
    const modal = document.getElementById('edit-inquiry-modal');
    const form = document.getElementById('edit-inquiry-form');
    const content = document.getElementById('edit-inquiry-form-content');
    
    // Set form action
    form.action = `/admin/inquiries/${id}`;
    
    // Create edit form content
    content.innerHTML = `
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                <select name="status" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#265478] focus:border-transparent">
                    <option value="pending">Pending</option>
                    <option value="processing">Processing</option>
                    <option value="completed">Completed</option>
                    <option value="cancelled">Cancelled</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Assigned To</label>
                <select name="assigned_to" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#265478] focus:border-transparent">
                    <option value="">Unassigned</option>
                    <!-- Add user options here -->
                </select>
            </div>
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-2">Admin Notes</label>
                <textarea name="admin_notes" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#265478] focus:border-transparent" placeholder="Add admin notes..."></textarea>
            </div>
        </div>
    `;
    
    modal.classList.remove('hidden');
}

function deleteInquiry(id) {
    if (confirm('Are you sure you want to delete this inquiry?')) {
        $.ajax({
            url: `/admin/inquiries/${id}`,
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                if (response.success) {
                    // Remove the row from table
                    $(`input[value="${id}"]`).closest('tr').fadeOut(function() {
                        $(this).remove();
                    });
                    showAlert('Inquiry deleted successfully!', 'success');
                }
            },
            error: function() {
                showAlert('Failed to delete inquiry. Please try again.', 'error');
            }
        });
    }
}

function markAsProcessed(id) {
    if (confirm('Mark this inquiry as processed?')) {
        $.ajax({
            url: `/admin/inquiries/${id}/mark-processed`,
            method: 'PATCH',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                if (response.success) {
                    // Update status in table
                    const statusSpan = $(`input[value="${id}"]`).closest('tr').find('td:nth-child(5) span');
                    statusSpan.removeClass('bg-yellow-100 text-yellow-800').addClass('bg-green-100 text-green-800');
                    statusSpan.text('Completed');
                    showAlert('Inquiry marked as processed!', 'success');
                    closeInquiryModal();
                }
            },
            error: function() {
                showAlert('Failed to update inquiry status. Please try again.', 'error');
            }
        });
    }
}

function closeInquiryModal() {
    document.getElementById('inquiry-modal').classList.add('hidden');
}

function closeEditInquiryModal() {
    document.getElementById('edit-inquiry-modal').classList.add('hidden');
}

// Bulk actions for inquiries
function bulkExportInquiries() {
    const checkedBoxes = document.querySelectorAll('.inquiry-checkbox:checked');
    if (checkedBoxes.length === 0) {
        alert('Please select inquiries to export');
        return;
    }
    console.log('Export selected inquiries');
}

function bulkMarkProcessed() {
    const checkedBoxes = document.querySelectorAll('.inquiry-checkbox:checked');
    if (checkedBoxes.length === 0) {
        alert('Please select inquiries to mark as processed');
        return;
    }
    console.log('Mark selected as processed');
}

function bulkDeleteInquiries() {
    const checkedBoxes = document.querySelectorAll('.inquiry-checkbox:checked');
    if (checkedBoxes.length === 0) {
        alert('Please select inquiries to delete');
        return;
    }
    if (confirm(`Are you sure you want to delete ${checkedBoxes.length} selected inquiries?`)) {
        console.log('Delete selected inquiries');
    }
}
</script>
@endpush
