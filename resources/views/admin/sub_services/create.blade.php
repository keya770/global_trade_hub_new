@extends('admin.layouts.app')

@section('title', 'Create Sub Service')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div>
        <h1 class="text-2xl font-bold text-gray-900">Create Sub Service</h1>
        <p class="text-gray-600">Add a new sub service under a main service, and optionally add sub–sub services.</p>
    </div>

    <!-- Form -->
    <div class="bg-white shadow rounded-lg p-6">
        <form action="{{ route('admin.sub_services.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Main Service -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Main Service</label>
                <select name="service_id" required class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm">
                    @foreach($services as $id => $name)
                        <option value="{{ $id }}" {{ old('service_id') == $id ? 'selected' : '' }}>{{ $name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Name -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" name="name" value="{{ old('name') }}" required
                       class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#265478] focus:border-[#265478]">
            </div>

            <!-- Short Description -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Short Description</label>
                <textarea name="description" rows="3"
                          class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm">{{ old('description') }}</textarea>
            </div>

            <!-- Full Content -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Full Content</label>
                <textarea name="content" rows="5"
                          class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm">{{ old('content') }}</textarea>
            </div>

            <!-- Icon -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Icon (FontAwesome class)</label>
                <input type="text" name="icon" value="{{ old('icon') }}"
                       placeholder="e.g. fas fa-layer-group"
                       class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm">
            </div>

            <!-- Image -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Sub Service Image</label>
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

            <!-- Sub-Sub Services -->
            <div class="border-t pt-4">
                <label class="inline-flex items-center">
                    <input type="checkbox" id="has_sub_sub_services" name="has_sub_sub_services" value="1"
                           class="form-checkbox h-4 w-4 text-[#265478]" {{ old('has_sub_sub_services') ? 'checked' : '' }}>
                    <span class="ml-2 text-gray-700">This sub service has Sub–Sub Services</span>
                </label>

                <div id="subSubServicesWrapper" class="{{ old('has_sub_sub_services') ? '' : 'hidden' }} mt-4 space-y-3">
                    <p class="text-sm text-gray-600">Add sub–sub service names and details.</p>
                    <div id="subSubServicesList" class="space-y-3">
                        <div class="flex gap-3">
                            <input type="text" name="sub_sub_services[0][name]" placeholder="Name"
                                   class="w-1/3 border-gray-300 rounded-lg shadow-sm">

                                   
            <!-- Short Description -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Short Description</label>
                <textarea name="description" rows="3"
                          class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm">{{ old('description') }}</textarea>
            </div>

            <!-- Full Content -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Full Content</label>
                <textarea name="content" rows="5"
                          class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm">{{ old('content') }}</textarea>
            </div>

                        </div>
                    </div>
                    <button type="button" id="addSubSubService" class="mt-2 px-3 py-1 bg-green-500 text-white rounded-lg">+ Add More</button>
                </div>
            </div>

            <!-- Actions -->
            <div class="flex justify-end space-x-3">
                <a href="{{ route('admin.sub_services.index') }}" class="px-4 py-2 border rounded-lg text-gray-700">Cancel</a>
                <button type="submit" class="px-4 py-2 bg-[#265478] text-white rounded-lg hover:bg-[#1e4260]">Save</button>
            </div>
        </form>
    </div>
</div>

<!-- JS for dynamic sub-sub services -->
<script>
document.getElementById('has_sub_sub_services').addEventListener('change', function() {
    document.getElementById('subSubServicesWrapper').classList.toggle('hidden', !this.checked);
});

document.getElementById('addSubSubService').addEventListener('click', function() {
    const list = document.getElementById('subSubServicesList');
    const index = list.children.length;
    const div = document.createElement('div');
    div.classList.add('flex', 'gap-3');
    div.innerHTML = `
        <input type="text" name="sub_sub_services[${index}][name]" placeholder="Name" class="w-1/3 border-gray-300 rounded-lg shadow-sm">
        <input type="text" name="sub_sub_services[${index}][description]" placeholder="Description" class="w-2/3 border-gray-300 rounded-lg shadow-sm">
    `;
    list.appendChild(div);
});
</script>
@endsection
