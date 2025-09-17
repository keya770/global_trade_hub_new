@extends('admin.layouts.app')

@section('title', 'Site Settings')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Site Settings</h1>
            <p class="text-gray-600">Manage your website settings and social media links</p>
        </div>
    </div>

    <!-- Form Card -->
    <div class="bg-white shadow rounded-lg p-6">
        <form action="{{ route('admin.site-settings.update') }}" method="POST" class="space-y-6">
            @csrf

            <!-- Social Media -->
            <div>
                <h2 class="text-lg font-semibold text-gray-800 mb-4">Social Media Links</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Facebook</label>
                        <input type="url" name="facebook" value="{{ old('facebook', $settings->facebook ?? '') }}" class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Twitter</label>
                        <input type="url" name="twitter" value="{{ old('twitter', $settings->twitter ?? '') }}" class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Instagram</label>
                        <input type="url" name="instagram" value="{{ old('instagram', $settings->instagram ?? '') }}" class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">LinkedIn</label>
                        <input type="url" name="linkedin" value="{{ old('linkedin', $settings->linkedin ?? '') }}" class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">YouTube</label>
                        <input type="url" name="youtube" value="{{ old('youtube', $settings->youtube ?? '') }}" class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">WhatsApp</label>
                        <input type="text" name="whatsapp" value="{{ old('whatsapp', $settings->whatsapp ?? '') }}" class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>
                </div>
            </div>

            <!-- Contact Info -->
            <div>
                <h2 class="text-lg font-semibold text-gray-800 mb-4">Contact Information</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" value="{{ old('email', $settings->email ?? '') }}" 
                            class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Phone</label>
                        <input type="text" name="phone" value="{{ old('phone', $settings->phone ?? '') }}" 
                            class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">WhatsApp Number</label>
                        <input type="text" name="whatsapp" value="{{ old('whatsapp', $settings->whatsapp ?? '') }}" 
                            placeholder="+971 501234567"
                            class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500">
                    </div>
                </div>

                <div class="mt-4">
                    <label class="block text-sm font-medium text-gray-700">Address</label>
                    <input type="text" name="address" value="{{ old('address', $settings->address ?? '') }}" 
                        class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>
            </div>

            <!-- Map -->
            <div>
                <h2 class="text-lg font-semibold text-gray-800 mb-4">Google Map</h2>
                <textarea name="map" rows="3" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">{{ old('map', $settings->map ?? '') }}</textarea>
                <p class="text-xs text-gray-500 mt-1">Paste the embed iframe code from Google Maps</p>
            </div>

            <!-- Business Hours -->
            <div>
                <h2 class="text-lg font-semibold text-gray-800 mb-4">Business Hours</h2>
                <input type="text" name="business_hours" value="{{ old('business_hours', $settings->business_hours ?? '') }}" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            <!-- Submit -->
            <div class="flex justify-end">
                <button type="submit" class="px-6 py-2 bg-blue-600 text-white font-medium rounded-lg shadow hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Save Settings
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
