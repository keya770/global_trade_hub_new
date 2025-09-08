@extends('layouts.app')

@section('title', 'Blog - SMA Ship Brokers')
@section('description', 'Stay updated with the latest maritime industry insights, market trends, and company news from SMA Ship Brokers.')

@php
use Illuminate\Support\Str;
@endphp

@section('content')
    <!-- Blog Hero Section with Particles -->
    <section class="relative py-20 bg-gradient-to-br from-primary-color to-primary-dark text-white overflow-hidden">
        <!-- Canvas for particles -->
        <canvas id="particles" class="absolute inset-0 z-0"></canvas>

        <!-- Content -->
        <div class="container mx-auto px-4 text-center relative z-10">
            <div class="fade-in">
                <h1 class="text-5xl md:text-6xl font-bold mb-6">Blog</h1>
                <p class="text-xl md:text-2xl opacity-90 max-w-3xl mx-auto">
                    Maritime insights, market trends, and industry updates
                </p>
                @if(isset($stats) && $stats['total_posts'] > 0)
                <div class="mt-8 flex flex-wrap justify-center gap-8 text-center">
                    <div class="bg-white bg-opacity-20 rounded-lg p-4">
                        <div class="text-3xl font-bold">{{ $stats['total_posts'] }}+</div>
                        <div class="text-sm opacity-90">Articles</div>
                    </div>
                    <div class="bg-white bg-opacity-20 rounded-lg p-4">
                        <div class="text-3xl font-bold">{{ number_format($stats['total_views']) }}</div>
                        <div class="text-sm opacity-90">Total Views</div>
                    </div>
                    <div class="bg-white bg-opacity-20 rounded-lg p-4">
                        <div class="text-3xl font-bold">{{ $stats['categories'] }}</div>
                        <div class="text-sm opacity-90">Categories</div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </section>

    <!-- Category Filter -->
    @if(isset($categories) && $categories->count() > 0)
    <section class="section bg-gray-50 py-8">
        <div class="container mx-auto px-4">
            <div class="flex flex-wrap justify-center gap-4">
                <a href="{{ route('blog') }}" class="category-btn {{ !isset($category) ? 'active' : '' }}">
                    All Posts
                </a>
                @foreach($categories as $cat)
                <a href="{{ route('blog.category', $cat) }}" class="category-btn {{ isset($category) && $category == $cat ? 'active' : '' }}">
                    {{ $cat }}
                </a>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Blog Posts Grid -->
    <section class="section bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="section-title">
                    @if(isset($category))
                        {{ $category }} Articles
                    @else
                        Latest Articles
                    @endif
                </h2>
                <p class="section-subtitle">
                    Stay informed with our latest insights and analysis
                </p>
            </div>
            
            @if(isset($blogPosts) && $blogPosts->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($blogPosts as $post)
                <article class="card fade-in">
                    @if($post->featured_image)
                        <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}" class="w-full h-48 object-cover rounded-lg mb-6">
                    @else
                        <div class="bg-gray-200 h-48 rounded-lg mb-6 flex items-center justify-center">
                            <div class="text-center">
                                <svg class="w-16 h-16 text-gray-400 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <p class="text-gray-600 text-sm">Post Image</p>
                            </div>
                        </div>
                    @endif
                    <div class="flex items-center mb-4">
                        @if($post->category)
                            <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm font-semibold">{{ $post->category }}</span>
                        @endif
                        <span class="text-gray-500 text-sm ml-4">{{ $post->published_at ? $post->published_at->format('F j, Y') : $post->created_at->format('F j, Y') }}</span>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-gray-800">
                        {{ $post->title }}
                    </h3>
                    <p class="text-gray-600 mb-4 leading-relaxed">
                        {{ Str::limit($post->excerpt ?: $post->content, 150) }}
                    </p>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="w-8 h-8 bg-primary-color rounded-full flex items-center justify-center mr-2">
                                <span class="text-white text-xs font-semibold">
                                    {{ $post->author_name ? strtoupper(substr($post->author_name, 0, 2)) : 'GT' }}
                                </span>
                            </div>
                            <span class="text-sm text-gray-500">{{ $post->author_name ?: 'SMA Ship Brokers' }}</span>
                        </div>
                        <a href="{{ route('blog.show', $post) }}" class="text-primary-color font-semibold hover:underline">Read More →</a>
                    </div>
                    @if($post->views_count > 0)
                    <div class="mt-3 text-xs text-gray-500">
                        <i class="fas fa-eye mr-1"></i>{{ $post->views_count }} views
                    </div>
                    @endif
                </article>
                @endforeach
            </div>

            <!-- Pagination -->
            @if($blogPosts->hasPages())
            <div class="flex justify-center mt-16">
                {{ $blogPosts->links() }}
            </div>
            @endif
            @else
            <!-- No Posts Message -->
            <div class="text-center py-16">
                <div class="text-6xl mb-6">📝</div>
                <h2 class="text-3xl font-bold mb-4 text-gray-900">No Blog Posts Yet</h2>
                <p class="text-lg text-gray-600 mb-8">
                    We're working on creating insightful content. Check back soon!
                </p>
                <a href="{{ route('contact') }}" class="btn-primary">
                    Contact Us
                </a>
            </div>
            @endif
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="section bg-primary-color text-white">
        <div class="container mx-auto px-4 text-center">
            <div class="fade-in">
                <h2 class="text-4xl font-bold mb-6">Need a Specific Vessel?</h2>
                <p class="text-xl mb-8 opacity-90 max-w-2xl mx-auto">
                    Can't find what you're looking for? Our extensive network can help source the perfect 
                    vessel for your requirements.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('contact') }}" class="btn-primary bg-gray-800 text-lg px-8 py-4 transform scale-105 ">
                        Contact Us
                    </a>
                    <a href="{{ route('services') }}" class="border-2 border-white text-white px-8 py-4 rounded-lg font-semibold hover:bg-white hover:text-gray-800 transition-colors">
                        Our Services
                    </a>
                </div>
            </div>
        </div>
    </section>

    <style>
        .category-btn {
            @apply px-4 py-2 rounded-lg border border-gray-300 text-gray-700 hover:bg-primary-color hover:text-white hover:border-primary-color transition-colors;
        }
        .category-btn.active {
            @apply bg-primary-color text-white border-primary-color;
        }
    </style>

    <script>
        $(document).ready(function() {
            // Category filter functionality
            $('.category-btn').click(function() {
                $('.category-btn').removeClass('active');
                $(this).addClass('active');
                // Add filter logic here
            });
        });
    </script>
@endsection

