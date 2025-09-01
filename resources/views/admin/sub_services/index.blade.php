@extends('admin.layouts.app')

@section('title', 'Sub Services')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold text-gray-900">Sub Services</h1>
    <a href="{{ route('admin.sub_services.create') }}" class="px-4 py-2 bg-[#265478] text-white rounded-lg">Add Sub Service</a>
</div>

<div class="bg-white shadow rounded-lg overflow-hidden">
    <table class="min-w-full">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2 text-left">Name</th>
                <th class="px-4 py-2 text-left">Main Service</th>
                <th class="px-4 py-2 text-left">Status</th>
                <th class="px-4 py-2 text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($subServices as $subService)
                <tr>
                    <td class="px-4 py-2">{{ $subService->name }}</td>
                    <td class="px-4 py-2">{{ $subService->service->name }}</td>
                    <td class="px-4 py-2">{{ $subService->is_active ? 'Active' : 'Inactive' }}</td>
                    <td class="px-4 py-2 flex space-x-2">
                        <a href="{{ route('admin.sub_services.edit', $subService) }}" class="text-blue-600">Edit</a>
                        <form action="{{ route('admin.sub_services.destroy', $subService) }}" method="POST" onsubmit="return confirm('Delete this sub service?')">
                            @csrf @method('DELETE')
                            <button class="text-red-600">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="mt-4">
    {{ $subServices->links() }}
</div>
@endsection
