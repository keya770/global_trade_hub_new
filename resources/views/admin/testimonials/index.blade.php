@extends('admin.layouts.app')

@section('title', 'Testimonials')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Testimonials</h1>
            <p class="text-gray-600">Manage client testimonials</p>
        </div>
        <a href="{{ route('admin.testimonials.create') }}" 
           class="bg-[#265478] hover:bg-[#1e4260] text-white px-4 py-2 rounded-lg flex items-center">
            <i class="fas fa-plus mr-2"></i>
            Add Testimonial
        </a>
    </div>

    <!-- Table -->
    <div class="bg-white rounded-lg shadow-sm overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">#</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Client</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Company</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Rating</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Service Type</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Featured</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Active</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 bg-white">
                @forelse($testimonials as $testimonial)
                    <tr>
                        <!-- ID -->
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $testimonial->id }}
                        </td>

                        <!-- Client Info -->
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                @if($testimonial->client_image)
                                    <img src="{{ asset('storage/' . $testimonial->client_image) }}" 
                                         class="h-10 w-10 rounded-full object-cover mr-3" alt="Client">
                                @else
                                    <div class="h-10 w-10 rounded-full bg-gray-200 mr-3 flex items-center justify-center text-gray-400">
                                        <i class="fas fa-user"></i>
                                    </div>
                                @endif
                                <div>
                                    <div class="text-sm font-medium text-gray-900">{{ $testimonial->client_name }}</div>
                                    <div class="text-sm text-gray-500">{{ $testimonial->client_position }}</div>
                                </div>
                            </div>
                        </td>

                        <!-- Company -->
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                @if($testimonial->company_logo)
                                    <img src="{{ asset('storage/' . $testimonial->company_logo) }}" 
                                         class="h-8 w-8 object-contain mr-2" alt="Logo">
                                @endif
                                <span class="text-sm text-gray-700">{{ $testimonial->company_name }}</span>
                            </div>
                        </td>

                        <!-- Rating -->
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex text-yellow-400">
                                @for($i = 1; $i <= 5; $i++)
                                    <i class="fas fa-star {{ $i <= $testimonial->rating ? '' : 'text-gray-300' }}"></i>
                                @endfor
                            </div>
                        </td>

                        <!-- Service Type -->
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                            {{ $testimonial->service_type }}
                        </td>

                        <!-- Featured -->
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($testimonial->is_featured)
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    Yes
                                </span>
                            @else
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                    No
                                </span>
                            @endif
                        </td>

                        <!-- Active -->
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($testimonial->is_active)
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    Active
                                </span>
                            @else
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                    Inactive
                                </span>
                            @endif
                        </td>

                        <!-- Actions -->
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium flex space-x-2">
                            <a href="{{ route('admin.testimonials.show', $testimonial->id) }}" 
                               class="text-blue-600 hover:text-blue-900">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.testimonials.edit', $testimonial->id) }}" 
                               class="text-green-600 hover:text-green-900">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.testimonials.destroy', $testimonial->id) }}" 
                                  method="POST" onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="px-6 py-4 text-center text-gray-500">
                            No testimonials found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div>
        {{ $testimonials->links() }}
    </div>
</div>
@endsection
