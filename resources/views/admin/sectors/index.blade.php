@extends('admin.layouts.app')

@section('title', 'Sectors')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Sectors</h1>
            <p class="text-gray-600">Manage your business sectors (Dry Bulk Carriers, Tankers, etc.)</p>
        </div>
        <a href="{{ route('admin.sectors.create') }}" class="bg-[#265478] hover:bg-[#1e4260] text-white px-4 py-2 rounded-lg flex items-center">
            <i class="fas fa-plus mr-2"></i>
            Add Sector
        </a>
    </div>

    <!-- Sectors Table -->
    <div class="bg-white shadow rounded-lg overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Image
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Title
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Vessel Sizes
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Status
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Created
                        </th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($sectors as $sector)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($sector->image)
                                <img src="{{ $sector->image_url }}" alt="{{ $sector->title }}" class="h-12 w-12 object-cover rounded-lg">
                            @else
                                <div class="h-12 w-12 bg-gray-200 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-image text-gray-400"></i>
                                </div>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div>
                                <div class="text-sm font-medium text-gray-900">{{ $sector->title }}</div>
                                <div class="text-sm text-gray-500">{{ Str::limit($sector->description, 50) }}</div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">
                                @if($sector->vessel_sizes)
                                    {{ Str::limit($sector->vessel_sizes, 30) }}
                                @else
                                    <span class="text-gray-400">Not specified</span>
                                @endif
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full {{ $sector->status ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ $sector->status ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $sector->created_at->format('M d, Y') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <div class="flex items-center justify-end space-x-2">
                                <a href="{{ route('admin.sectors.show', $sector) }}" class="text-[#265478] hover:text-[#1e4260]">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.sectors.edit', $sector) }}" class="text-[#265478] hover:text-[#1e4260]">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.sectors.destroy', $sector) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this sector?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-4 text-center text-gray-500">
                            No sectors found. <a href="{{ route('admin.sectors.create') }}" class="text-[#265478] hover:underline">Create your first sector</a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        @if($sectors->hasPages())
        <div class="px-6 py-3 border-t border-gray-200">
            {{ $sectors->links() }}
        </div>
        @endif
    </div>
</div>
@endsection
```
