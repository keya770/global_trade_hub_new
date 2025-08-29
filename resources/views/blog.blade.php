@extends('layouts.app')

@section('title', 'Blog - Global Trade Hub')
@section('description', 'Stay updated with the latest maritime industry insights, market trends, and company news from Global Trade Hub.')

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
            </div>
        </div>
    </section>

    <!-- Blog Posts Grid -->
    <section class="section bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="section-title">Latest Articles</h2>
                <p class="section-subtitle">
                    Stay informed with our latest insights and analysis
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Blog Post 1 -->
                <article class="card fade-in">
                    <div class="bg-gray-200 h-48 rounded-lg mb-6 flex items-center justify-center">
                        <div class="text-center">
                            <svg class="w-16 h-16 text-gray-400 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <p class="text-gray-600 text-sm">Post Image</p>
                        </div>
                    </div>
                    <div class="flex items-center mb-4">
                        <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm font-semibold">Market Trends</span>
                        <span class="text-gray-500 text-sm ml-4">December 12, 2024</span>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-gray-800">
                        Tanker Market Analysis: Q4 2024 Review
                    </h3>
                    <p class="text-gray-600 mb-4 leading-relaxed">
                        Comprehensive analysis of the tanker market performance in Q4 2024, 
                        including freight rates, vessel values, and market outlook.
                    </p>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="w-8 h-8 bg-primary-color rounded-full flex items-center justify-center mr-2">
                                <span class="text-white text-xs font-semibold">GT</span>
                            </div>
                            <span class="text-sm text-gray-500">Global Trade Hub</span>
                        </div>
                        <a href="#" class="text-primary-color font-semibold hover:underline">Read More →</a>
                    </div>
                </article>

                <!-- Blog Post 2 -->
                <article class="card fade-in">
                    <div class="bg-gray-200 h-48 rounded-lg mb-6 flex items-center justify-center">
                        <div class="text-center">
                            <svg class="w-16 h-16 text-gray-400 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <p class="text-gray-600 text-sm">Post Image</p>
                        </div>
                    </div>
                    <div class="flex items-center mb-4">
                        <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-semibold">Chartering</span>
                        <span class="text-gray-500 text-sm ml-4">December 10, 2024</span>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-gray-800">
                        Time Charter vs Voyage Charter: Making the Right Choice
                    </h3>
                    <p class="text-gray-600 mb-4 leading-relaxed">
                        Understanding the differences between time and voyage charters, 
                        and how to choose the right option for your business needs.
                    </p>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="w-8 h-8 bg-primary-color rounded-full flex items-center justify-center mr-2">
                                <span class="text-white text-xs font-semibold">GT</span>
                            </div>
                            <span class="text-sm text-gray-500">Global Trade Hub</span>
                        </div>
                        <a href="#" class="text-primary-color font-semibold hover:underline">Read More →</a>
                    </div>
                </article>

                <!-- Blog Post 3 -->
                <article class="card fade-in">
                    <div class="bg-gray-200 h-48 rounded-lg mb-6 flex items-center justify-center">
                        <div class="text-center">
                            <svg class="w-16 h-16 text-gray-400 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <p class="text-gray-600 text-sm">Post Image</p>
                        </div>
                    </div>
                    <div class="flex items-center mb-4">
                        <span class="bg-purple-100 text-purple-800 px-3 py-1 rounded-full text-sm font-semibold">S&P</span>
                        <span class="text-gray-500 text-sm ml-4">December 8, 2024</span>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-gray-800">
                        Ship Sale & Purchase: Due Diligence Checklist
                    </h3>
                    <p class="text-gray-600 mb-4 leading-relaxed">
                        Essential checklist for conducting thorough due diligence when 
                        buying or selling vessels in today's market.
                    </p>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="w-8 h-8 bg-primary-color rounded-full flex items-center justify-center mr-2">
                                <span class="text-white text-xs font-semibold">GT</span>
                            </div>
                            <span class="text-sm text-gray-500">Global Trade Hub</span>
                        </div>
                        <a href="#" class="text-primary-color font-semibold hover:underline">Read More →</a>
                    </div>
                </article>

                <!-- Blog Post 4 -->
                <article class="card fade-in">
                    <div class="bg-gray-200 h-48 rounded-lg mb-6 flex items-center justify-center">
                        <div class="text-center">
                            <svg class="w-16 h-16 text-gray-400 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <p class="text-gray-600 text-sm">Post Image</p>
                        </div>
                    </div>
                    <div class="flex items-center mb-4">
                        <span class="bg-orange-100 text-orange-800 px-3 py-1 rounded-full text-sm font-semibold">Valuation</span>
                        <span class="text-gray-500 text-sm ml-4">December 5, 2024</span>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-gray-800">
                        Vessel Valuation Methods: A Comprehensive Guide
                    </h3>
                    <p class="text-gray-600 mb-4 leading-relaxed">
                        Exploring different vessel valuation methodologies and their 
                        applications in various market conditions.
                    </p>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="w-8 h-8 bg-primary-color rounded-full flex items-center justify-center mr-2">
                                <span class="text-white text-xs font-semibold">GT</span>
                            </div>
                            <span class="text-sm text-gray-500">Global Trade Hub</span>
                        </div>
                        <a href="#" class="text-primary-color font-semibold hover:underline">Read More →</a>
                    </div>
                </article>

                <!-- Blog Post 5 -->
                <article class="card fade-in">
                    <div class="bg-gray-200 h-48 rounded-lg mb-6 flex items-center justify-center">
                        <div class="text-center">
                            <svg class="w-16 h-16 text-gray-400 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <p class="text-gray-600 text-sm">Post Image</p>
                        </div>
                    </div>
                    <div class="flex items-center mb-4">
                        <span class="bg-red-100 text-red-800 px-3 py-1 rounded-full text-sm font-semibold">Industry News</span>
                        <span class="text-gray-500 text-sm ml-4">December 3, 2024</span>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-gray-800">
                        New Environmental Regulations Impacting Shipping
                    </h3>
                    <p class="text-gray-600 mb-4 leading-relaxed">
                        Analysis of new environmental regulations and their potential 
                        impact on vessel operations and market dynamics.
                    </p>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="w-8 h-8 bg-primary-color rounded-full flex items-center justify-center mr-2">
                                <span class="text-white text-xs font-semibold">GT</span>
                            </div>
                            <span class="text-sm text-gray-500">Global Trade Hub</span>
                        </div>
                        <a href="#" class="text-primary-color font-semibold hover:underline">Read More →</a>
                    </div>
                </article>

                <!-- Blog Post 6 -->
                <article class="card fade-in">
                    <div class="bg-gray-200 h-48 rounded-lg mb-6 flex items-center justify-center">
                        <div class="text-center">
                            <svg class="w-16 h-16 text-gray-400 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <p class="text-gray-600 text-sm">Post Image</p>
                        </div>
                    </div>
                    <div class="flex items-center mb-4">
                        <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm font-semibold">Market Trends</span>
                        <span class="text-gray-500 text-sm ml-4">November 30, 2024</span>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-gray-800">
                        Dry Bulk Market Recovery: Signs of Improvement
                    </h3>
                    <p class="text-gray-600 mb-4 leading-relaxed">
                        Examining the signs of recovery in the dry bulk market and 
                        what this means for vessel owners and operators.
                    </p>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="w-8 h-8 bg-primary-color rounded-full flex items-center justify-center mr-2">
                                <span class="text-white text-xs font-semibold">GT</span>
                            </div>
                            <span class="text-sm text-gray-500">Global Trade Hub</span>
                        </div>
                        <a href="#" class="text-primary-color font-semibold hover:underline">Read More →</a>
                    </div>
                </article>
            </div>

            <!-- Pagination -->
            <div class="flex justify-center mt-16">
                <nav class="flex items-center space-x-2">
                    <a href="#" class="px-4 py-2 text-gray-500 hover:text-primary-color">Previous</a>
                    <a href="#" class="px-4 py-2 bg-primary-color text-white rounded-lg">1</a>
                    <a href="#" class="px-4 py-2 text-gray-700 hover:text-primary-color">2</a>
                    <a href="#" class="px-4 py-2 text-gray-700 hover:text-primary-color">3</a>
                    <span class="px-4 py-2 text-gray-500">...</span>
                    <a href="#" class="px-4 py-2 text-gray-700 hover:text-primary-color">10</a>
                    <a href="#" class="px-4 py-2 text-gray-500 hover:text-primary-color">Next</a>
                </nav>
            </div>
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

