@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="space-y-6">
    <!-- Welcome Section -->
    <div class="bg-white rounded-lg shadow-sm p-6">
        <h1 class="text-2xl font-bold text-gray-900 mb-2">Welcome back, {{ Auth::user()->name }}!</h1>
        <p class="text-gray-600">Here's what's happening with your global shipment and transportation company.</p>
    </div>

    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Hero Sections -->
        <div class="bg-white rounded-lg shadow-sm p-6">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-blue-100 text-blue-600">
                    <i class="fas fa-image text-xl"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Hero Sections</p>
                    <p class="text-2xl font-semibold text-gray-900">{{ $stats['hero_sections'] }}</p>
                </div>
            </div>
        </div>

        <!-- Services -->
        <div class="bg-white rounded-lg shadow-sm p-6">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-green-100 text-green-600">
                    <i class="fas fa-cogs text-xl"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Services</p>
                    <p class="text-2xl font-semibold text-gray-900">{{ $stats['services'] }}</p>
                </div>
            </div>
        </div>

        <!-- Vessels -->
        <div class="bg-white rounded-lg shadow-sm p-6">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-purple-100 text-purple-600">
                    <i class="fas fa-ship text-xl"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Vessels</p>
                    <p class="text-2xl font-semibold text-gray-900">{{ $stats['vessels'] }}</p>
                </div>
            </div>
        </div>

        <!-- Blog Posts -->
        <div class="bg-white rounded-lg shadow-sm p-6">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-yellow-100 text-yellow-600">
                    <i class="fas fa-blog text-xl"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Blog Posts</p>
                    <p class="text-2xl font-semibold text-gray-900">{{ $stats['blog_posts'] }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Additional Stats -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Testimonials -->
        <div class="bg-white rounded-lg shadow-sm p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Testimonials</p>
                    <p class="text-2xl font-semibold text-gray-900">{{ $stats['testimonials'] }}</p>
                </div>
                <div class="p-3 rounded-full bg-indigo-100 text-indigo-600">
                    <i class="fas fa-quote-left"></i>
                </div>
            </div>
        </div>

        <!-- Jobs -->
        <div class="bg-white rounded-lg shadow-sm p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Career Jobs</p>
                    <p class="text-2xl font-semibold text-gray-900">{{ $stats['jobs'] }}</p>
                </div>
                <div class="p-3 rounded-full bg-red-100 text-red-600">
                    <i class="fas fa-briefcase"></i>
                </div>
            </div>
        </div>

        <!-- Contact Inquiries -->
        <div class="bg-white rounded-lg shadow-sm p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Contact Inquiries</p>
                    <p class="text-2xl font-semibold text-gray-900">{{ $stats['contact_inquiries'] }}</p>
                    @if($stats['new_inquiries'] > 0)
                        <p class="text-sm text-red-600">{{ $stats['new_inquiries'] }} new</p>
                    @endif
                </div>
                <div class="p-3 rounded-full bg-orange-100 text-orange-600">
                    <i class="fas fa-envelope"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Data Section -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Recent Blog Posts -->
        <div class="bg-white rounded-lg shadow-sm">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-medium text-gray-900">Recent Blog Posts</h3>
            </div>
            <div class="p-6">
                @if($recentData['blog_posts']->count() > 0)
                    <div class="space-y-4">
                        @foreach($recentData['blog_posts'] as $post)
                            <div class="flex items-center justify-between">
                                <div class="flex-1">
                                    <p class="text-sm font-medium text-gray-900">{{ $post->title }}</p>
                                    <p class="text-sm text-gray-500">{{ $post->created_at->diffForHumans() }}</p>
                                </div>
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $post->is_published ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                    {{ $post->is_published ? 'Published' : 'Draft' }}
                                </span>
                            </div>
                        @endforeach
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('admin.blog-posts.index') }}" class="text-sm text-[#265478] hover:text-[#1e4260] font-medium">
                            View all blog posts →
                        </a>
                    </div>
                @else
                    <p class="text-gray-500 text-center py-4">No blog posts yet.</p>
                @endif
            </div>
        </div>

        <!-- Recent Contact Inquiries -->
        <div class="bg-white rounded-lg shadow-sm">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-medium text-gray-900">Recent Contact Inquiries</h3>
            </div>
            <div class="p-6">
                @if($recentData['contact_inquiries']->count() > 0)
                    <div class="space-y-4">
                        @foreach($recentData['contact_inquiries'] as $inquiry)
                            <div class="flex items-center justify-between">
                                <div class="flex-1">
                                    <p class="text-sm font-medium text-gray-900">{{ $inquiry->name }}</p>
                                    <p class="text-sm text-gray-500">{{ $inquiry->subject }}</p>
                                </div>
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium 
                                    @if($inquiry->status === 'new') bg-red-100 text-red-800
                                    @elseif($inquiry->status === 'in_progress') bg-yellow-100 text-yellow-800
                                    @else bg-green-100 text-green-800 @endif">
                                    {{ ucfirst(str_replace('_', ' ', $inquiry->status)) }}
                                </span>
                            </div>
                        @endforeach
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('admin.contact-inquiries.index') }}" class="text-sm text-[#265478] hover:text-[#1e4260] font-medium">
                            View all inquiries →
                        </a>
                    </div>
                @else
                    <p class="text-gray-500 text-center py-4">No contact inquiries yet.</p>
                @endif
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="bg-white rounded-lg shadow-sm p-6">
        <h3 class="text-lg font-medium text-gray-900 mb-4">Quick Actions</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            <a href="{{ route('admin.hero-sections.create') }}" class="flex items-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors">
                <i class="fas fa-plus text-[#265478] mr-3"></i>
                <span class="text-sm font-medium text-gray-900">Add Hero Section</span>
            </a>
            
            <a href="{{ route('admin.services.create') }}" class="flex items-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors">
                <i class="fas fa-plus text-[#265478] mr-3"></i>
                <span class="text-sm font-medium text-gray-900">Add Service</span>
            </a>
            
            <a href="{{ route('admin.vessels.create') }}" class="flex items-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors">
                <i class="fas fa-plus text-[#265478] mr-3"></i>
                <span class="text-sm font-medium text-gray-900">Add Vessel</span>
            </a>
            
            <a href="{{ route('admin.blog-posts.create') }}" class="flex items-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors">
                <i class="fas fa-plus text-[#265478] mr-3"></i>
                <span class="text-sm font-medium text-gray-900">Add Blog Post</span>
            </a>
        </div>
    </div>
</div>
@endsection
