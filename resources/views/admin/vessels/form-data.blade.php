@extends('admin.layouts.app')

@section('title', 'Vessel Form Data - SMA Ship Brokers')
@section('description', 'View and manage vessel form submissions and inquiries')

@section('content')
    <!-- Form Data Hero -->
    <section class="relative py-20 bg-gradient-to-br from-primary-color to-primary-dark overflow-hidden">
        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-4xl mx-auto text-center">
                <div class="fade-in">
                    <!-- Use text-black, remove invalid style -->
                    <h1 class="text-4xl md:text-5xl font-bold mb-6 text-black">Vessel Form Data</h1>
                    <p class="text-xl max-w-2xl mx-auto text-black">
                        View and manage all vessel inquiry submissions and form data
                    </p>
                </div>
            </div>
        </div>
    </section>


    <!-- Form Data Section -->
    <section class="section bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                
                <!-- Statistics Cards -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                    <div class="bg-white rounded-lg shadow-lg p-6 text-center">
                        <div class="text-3xl font-bold text-primary-color mb-2">{{ $totalInquiries ?? 0 }}</div>
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

                <!-- Filters -->
                <div class="bg-white rounded-lg shadow-lg p-6 mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Filter Form Data</h2>
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                        <!-- Search -->
                        <div>
                            <label for="search" class="block text-sm font-medium text-gray-700 mb-2">Search</label>
                            <input type="text" id="search" placeholder="Search inquiries..." 
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-color focus:border-transparent">
                        </div>

                        <!-- Status Filter -->
                        <div>
                            <label for="status-filter" class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                            <select id="status-filter" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-color focus:border-transparent">
                                <option value="">All Status</option>
                                <option value="pending">Pending</option>
                                <option value="processing">Processing</option>
                                <option value="completed">Completed</option>
                                <option value="cancelled">Cancelled</option>
                            </select>
                        </div>

                        <!-- Inquiry Type Filter -->
                        <div>
                            <label for="type-filter" class="block text-sm font-medium text-gray-700 mb-2">Inquiry Type</label>
                            <select id="type-filter" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-color focus:border-transparent">
                                <option value="">All Types</option>
                                <option value="sale_purchase">Sale & Purchase</option>
                                <option value="chartering">Chartering</option>
                            </select>
                        </div>

                        <!-- Date Range -->
                        <div>
                            <label for="date-filter" class="block text-sm font-medium text-gray-700 mb-2">Date Range</label>
                            <select id="date-filter" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-color focus:border-transparent">
                                <option value="">All Dates</option>
                                <option value="today">Today</option>
                                <option value="week">This Week</option>
                                <option value="month">This Month</option>
                                <option value="quarter">This Quarter</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Form Data Table -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <h2 class="text-2xl font-bold text-gray-900">Form Submissions</h2>
                    </div>
                    
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        <input type="checkbox" id="select-all" class="rounded border-gray-300 text-primary-color focus:ring-primary-color">
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
                            <tbody class="bg-white divide-y divide-gray-200" id="form-data-table">
                                @forelse($inquiries as $inquiry)
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <input type="checkbox" class="rounded border-gray-300 text-primary-color focus:ring-primary-color" value="{{ $inquiry->id }}">
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 h-10 w-10">
                                                    <div class="h-10 w-10 rounded-full bg-primary-color flex items-center justify-center">
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
                                            @if($inquiry->vessel)
                                                <div class="text-sm text-blue-600 font-semibold mt-1">
                                                    <i class="fas fa-ship mr-1"></i>
                                                    {{ $inquiry->vessel->name }}
                                                </div>
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
                                                <button onclick="viewInquiry({{ $inquiry->id }})" class="text-primary-color hover:text-primary-dark" title="View Details">
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

                    <!-- Pagination -->
                    @if($inquiries->hasPages())
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

                <!-- Bulk Actions -->
                <div class="mt-6 bg-white rounded-lg shadow-lg p-6">
                    <h3 class="text-lg font-bold text-gray-900 mb-4">Bulk Actions</h3>
                    <div class="flex flex-wrap gap-4">
                        <button onclick="bulkExport()" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition-colors">
                            <i class="fas fa-download mr-2"></i>
                            Export Selected
                        </button>
                        <button onclick="bulkMarkProcessed()" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                            <i class="fas fa-check mr-2"></i>
                            Mark as Processed
                        </button>
                        <button onclick="bulkDelete()" class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition-colors">
                            <i class="fas fa-trash mr-2"></i>
                            Delete Selected
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal for Viewing Inquiry Details -->
    <div id="inquiryModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
        <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-3/4 lg:w-1/2 shadow-lg rounded-md bg-white">
            <div class="mt-3">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-bold text-gray-900">Inquiry Details</h3>
                    <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>
                <div id="modalContent" class="space-y-4">
                    <!-- Dynamic content will be loaded here -->
                </div>
                <div class="flex justify-end mt-6">
                    <button onclick="closeModal()" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition-colors">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Filter functionality
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('search');
            const statusFilter = document.getElementById('status-filter');
            const typeFilter = document.getElementById('type-filter');
            const dateFilter = document.getElementById('date-filter');
            const selectAllCheckbox = document.getElementById('select-all');
            const checkboxes = document.querySelectorAll('tbody input[type="checkbox"]');

            // Select all functionality
            selectAllCheckbox.addEventListener('change', function() {
                checkboxes.forEach(checkbox => {
                    checkbox.checked = this.checked;
                });
            });

            // Individual checkbox change
            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    const checkedBoxes = document.querySelectorAll('tbody input[type="checkbox"]:checked');
                    selectAllCheckbox.checked = checkedBoxes.length === checkboxes.length;
                });
            });

            // Filter functions (implement actual filtering logic)
            function applyFilters() {
                // Implementation for filtering table data
                console.log('Applying filters...');
            }

            searchInput.addEventListener('input', applyFilters);
            statusFilter.addEventListener('change', applyFilters);
            typeFilter.addEventListener('change', applyFilters);
            dateFilter.addEventListener('change', applyFilters);
        });

        // Modal functions
        function viewInquiry(id) {
            const modal = document.getElementById('inquiryModal');
            const content = document.getElementById('modalContent');
            
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

        function closeModal() {
            document.getElementById('inquiryModal').classList.add('hidden');
        }

        function editInquiry(id) {
            // Implement edit functionality
            console.log('Edit inquiry:', id);
        }

        function deleteInquiry(id) {
            if (confirm('Are you sure you want to delete this inquiry?')) {
                // Implement delete functionality
                console.log('Delete inquiry:', id);
            }
        }

        function markAsProcessed(id) {
            if (confirm('Mark this inquiry as processed?')) {
                // Implement mark as processed functionality
                console.log('Mark as processed:', id);
                // You can add AJAX call here to update the status
                alert('Inquiry marked as processed!');
                closeModal();
            }
        }

        function bulkExport() {
            const checkedBoxes = document.querySelectorAll('tbody input[type="checkbox"]:checked');
            if (checkedBoxes.length === 0) {
                alert('Please select inquiries to export');
                return;
            }
            console.log('Export selected inquiries');
        }

        function bulkMarkProcessed() {
            const checkedBoxes = document.querySelectorAll('tbody input[type="checkbox"]:checked');
            if (checkedBoxes.length === 0) {
                alert('Please select inquiries to mark as processed');
                return;
            }
            console.log('Mark selected as processed');
        }

        function bulkDelete() {
            const checkedBoxes = document.querySelectorAll('tbody input[type="checkbox"]:checked');
            if (checkedBoxes.length === 0) {
                alert('Please select inquiries to delete');
                return;
            }
            if (confirm(`Are you sure you want to delete ${checkedBoxes.length} selected inquiries?`)) {
                console.log('Delete selected inquiries');
            }
        }
    </script>
@endsection
