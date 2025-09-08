@extends('layouts.app')

@section('title', $blogPost->title . ' - SMA Ship Brokers')
@section('description', $blogPost->excerpt ?: Str::limit(strip_tags($blogPost->content), 160))

@php
use Illuminate\Support\Str;
@endphp

@section('content')
    <!-- Blog Post Hero Section -->
    <section class="relative py-20 bg-gradient-to-br from-primary-color to-primary-dark text-white overflow-hidden">
        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-4xl mx-auto">
                <div class="fade-in">
                    @if($blogPost->category)
                    <div class="mb-4">
                        <span class="bg-white bg-opacity-20 text-white px-4 py-2 rounded-full text-sm font-semibold">
                            {{ $blogPost->category }}
                        </span>
                    </div>
                    @endif
                    <h1 class="text-4xl md:text-5xl font-bold mb-6">{{ $blogPost->title }}</h1>
                    <div class="flex items-center text-white opacity-90">
                        <div class="flex items-center mr-6">
                            <div class="w-10 h-10 bg-white bg-opacity-20 rounded-full flex items-center justify-center mr-3">
                                <span class="text-white font-semibold">
                                    {{ $blogPost->author_name ? strtoupper(substr($blogPost->author_name, 0, 2)) : 'GT' }}
                                </span>
                            </div>
                            <span>{{ $blogPost->author_name ?: 'SMA Ship Brokers' }}</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-calendar mr-2"></i>
                            <span>{{ $blogPost->published_at ? $blogPost->published_at->format('F j, Y') : $blogPost->created_at->format('F j, Y') }}</span>
                        </div>
                        @if($blogPost->views_count > 0)
                        <div class="flex items-center ml-6">
                            <i class="fas fa-eye mr-2"></i>
                            <span>{{ $blogPost->views_count }} views</span>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Blog Post Content -->
    <section class="section bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                @if($blogPost->featured_image)
                <div class="mb-8">
                    <img src="{{ asset('storage/' . $blogPost->featured_image) }}" 
                         alt="{{ $blogPost->title }}" 
                         class="w-full h-64 md:h-96 object-cover rounded-lg">
                </div>
                @endif

                @if($blogPost->excerpt)
                <div class="mb-8 p-6 bg-gray-50 rounded-lg">
                    <p class="text-lg text-gray-700 italic">{{ $blogPost->excerpt }}</p>
                </div>
                @endif

                <div class="prose prose-lg max-w-none">
                    {!! $blogPost->content !!}
                </div>

                @if($blogPost->tags && count($blogPost->tags) > 0)
                <div class="mt-8 pt-8 border-t border-gray-200">
                    <h3 class="text-lg font-semibold mb-4">Tags:</h3>
                    <div class="flex flex-wrap gap-2">
                        @foreach($blogPost->tags as $tag)
                        <span class="bg-gray-100 text-gray-800 px-3 py-1 rounded-full text-sm">
                            #{{ $tag }}
                        </span>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Share Buttons -->
                <div class="mt-8 pt-8 border-t border-gray-200">
                    <h3 class="text-lg font-semibold mb-4">Share this article:</h3>
                    <div class="flex space-x-4">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" 
                           target="_blank" 
                           class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                            <i class="fab fa-facebook-f mr-2"></i>Facebook
                        </a>
                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($blogPost->title) }}" 
                           target="_blank" 
                           class="bg-blue-400 text-white px-4 py-2 rounded-lg hover:bg-blue-500 transition-colors">
                            <i class="fab fa-twitter mr-2"></i>Twitter
                        </a>
                        <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(request()->url()) }}" 
                           target="_blank" 
                           class="bg-blue-700 text-white px-4 py-2 rounded-lg hover:bg-blue-800 transition-colors">
                            <i class="fab fa-linkedin-in mr-2"></i>LinkedIn
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Related Posts -->
    @if($relatedPosts->count() > 0)
    <section class="section bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold mb-4">Related Articles</h2>
                <p class="text-gray-600">You might also be interested in these articles</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($relatedPosts as $relatedPost)
                <article class="card bg-white">
                    @if($relatedPost->featured_image)
                        <img src="{{ asset('storage/' . $relatedPost->featured_image) }}" 
                             alt="{{ $relatedPost->title }}" 
                             class="w-full h-48 object-cover rounded-lg mb-4">
                    @else
                        <div class="bg-gray-200 h-48 rounded-lg mb-4 flex items-center justify-center">
                            <div class="text-center">
                                <svg class="w-16 h-16 text-gray-400 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                        </div>
                    @endif
                    <div class="p-4">
                        @if($relatedPost->category)
                        <div class="mb-2">
                            <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded-full text-xs font-semibold">
                                {{ $relatedPost->category }}
                            </span>
                        </div>
                        @endif
                        <h3 class="text-lg font-bold mb-2 text-gray-800">
                            {{ $relatedPost->title }}
                        </h3>
                        <p class="text-gray-600 text-sm mb-3">
                            {{ Str::limit($relatedPost->excerpt ?: $relatedPost->content, 100) }}
                        </p>
                        <div class="flex items-center justify-between">
                            <span class="text-xs text-gray-500">
                                {{ $relatedPost->published_at ? $relatedPost->published_at->format('M j, Y') : $relatedPost->created_at->format('M j, Y') }}
                            </span>
                            <a href="{{ route('blog.show', $relatedPost) }}" class="text-primary-color text-sm font-semibold hover:underline">
                                Read More →
                            </a>
                        </div>
                    </div>
                </article>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Recent Posts Sidebar -->
    @if($recentPosts->count() > 0)
    <section class="section bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <div class="bg-gray-50 rounded-lg p-6">
                    <h3 class="text-xl font-bold mb-4">Recent Posts</h3>
                    <div class="space-y-4">
                        @foreach($recentPosts as $recentPost)
                        <div class="flex items-start space-x-3">
                            @if($recentPost->featured_image)
                                <img src="{{ asset('storage/' . $recentPost->featured_image) }}" 
                                     alt="{{ $recentPost->title }}" 
                                     class="w-16 h-16 object-cover rounded">
                            @else
                                <div class="w-16 h-16 bg-gray-200 rounded flex items-center justify-center">
                                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                            @endif
                            <div class="flex-1">
                                <h4 class="font-semibold text-gray-800 mb-1">
                                    <a href="{{ route('blog.show', $recentPost) }}" class="hover:text-primary-color">
                                        {{ $recentPost->title }}
                                    </a>
                                </h4>
                                <p class="text-xs text-gray-500">
                                    {{ $recentPost->published_at ? $recentPost->published_at->format('M j, Y') : $recentPost->created_at->format('M j, Y') }}
                                </p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

    <!-- CTA Section -->
    <section class="section bg-primary-color text-white">
        <div class="container mx-auto px-4 text-center">
            <div class="fade-in">
                <h2 class="text-4xl font-bold mb-6">Stay Updated</h2>
                <p class="text-xl mb-8 opacity-90 max-w-2xl mx-auto">
                    Get the latest maritime insights and industry updates delivered to your inbox
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('blog') }}" class="btn-primary bg-gray-800 text-lg px-8 py-4 transform scale-105 ">
                        View All Posts
                    </a>
                    <a href="{{ route('contact') }}" class="border-2 border-white text-white px-8 py-4 rounded-lg font-semibold hover:bg-white hover:text-gray-800 transition-colors">
                        Contact Us
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
