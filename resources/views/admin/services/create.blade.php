@extends('admin.layouts.app')

@section('title', 'Create Service')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div>
        <h1 class="text-2xl font-bold text-gray-900">Create Service</h1>
        <p class="text-gray-600">Add a new service to your company offerings.</p>
    </div>

    <!-- Form -->
    <div class="bg-white shadow rounded-lg p-6">
        <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Name -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" name="name" value="{{ old('name') }}" required
                       class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#265478] focus:border-[#265478]">
            </div>

            <!-- Slug -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Slug</label>
                <input type="text" name="slug" value="{{ old('slug') }}"
                       class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm">
            </div>

            <!-- Description -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Short Description</label>
                <textarea name="description" rows="3"
                          class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm">{{ old('description') }}</textarea>
            </div>

            <!-- Content -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Full Content</label>
                <textarea name="content" rows="5"
                          class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm">{{ old('content') }}</textarea>
            </div>

            <!-- Icon -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Icon (FontAwesome class)</label>
                <input type="text" name="icon" value="{{ old('icon') }}"
                       placeholder="e.g. fas fa-cogs"
                       class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm">
            </div>

            <!-- Image -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Service Image</label>
                <input type="file" name="image"
                       class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm">
            </div>


            <!-- Status & Order -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Status</label>
                    <select name="is_active" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm">
                        <option value="1" {{ old('is_active', 1) == 1 ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ old('is_active') === 0 ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Sort Order</label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', 0) }}"
                           class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm">
                </div>
            </div>

            <!-- Actions -->
            <div class="flex justify-end space-x-3">
                <a href="{{ route('admin.services.index') }}" class="px-4 py-2 border rounded-lg text-gray-700">Cancel</a>
                <button type="submit" class="px-4 py-2 bg-[#265478] text-white rounded-lg hover:bg-[#1e4260]">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection
