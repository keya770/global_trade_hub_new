@extends('layouts.app')

@section('title', 'Testimonials - SMA Ship Brokers')
@section('description', 'Read what our clients say about SMA Ship Brokers. Real testimonials from satisfied customers across the maritime industry.')

@section('content')
   <!-- Testimonials Hero Section with Particles -->
    <section class="relative py-20 bg-gradient-to-br from-primary-color to-primary-dark text-white overflow-hidden">
        <!-- Canvas for particles -->
        <canvas id="particles" class="absolute inset-0 z-0"></canvas>

        <!-- Content -->
        <div class="container mx-auto px-4 text-center relative z-10">
            <div class="fade-in">
                <h1 class="text-5xl md:text-6xl font-bold mb-6">Testimonials</h1>
                <p class="text-xl md:text-2xl opacity-90 max-w-3xl mx-auto">
                    What our clients say about our services
                </p>
                @if(isset($stats) && $stats['total'] > 0)
                <div class="mt-8 flex flex-wrap justify-center gap-8 text-center">
                    <div class="bg-white bg-opacity-20 rounded-lg p-4">
                        <div class="text-3xl font-bold">{{ $stats['total'] }}+</div>
                        <div class="text-sm opacity-90">Happy Clients</div>
                    </div>
                    <div class="bg-white bg-opacity-20 rounded-lg p-4">
                        <div class="text-3xl font-bold">{{ number_format($stats['average_rating'], 1) }}</div>
                        <div class="text-sm opacity-90">Average Rating</div>
                    </div>
                    <div class="bg-white bg-opacity-20 rounded-lg p-4">
                        <div class="text-3xl font-bold">{{ $stats['featured'] }}</div>
                        <div class="text-sm opacity-90">Featured Reviews</div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </section>

    <!-- Featured Testimonials -->
    @if(isset($featuredTestimonials) && $featuredTestimonials->count() > 0)
    <section class="section bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-extrabold mb-6 
                        bg-gradient-to-r from-[#499974] via-[#6d83d5] to-[#33978d] 
                        bg-clip-text text-transparent">Featured Client Success Stories</h2>
                <p class="section-subtitle">
                    Real feedback from satisfied clients across the maritime industry
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($featuredTestimonials as $testimonial)
                <div class="card fade-in">
                    <div class="flex items-center mb-4">
                        @if($testimonial->client_image)
                            <img src="{{ asset('storage/' . $testimonial->client_image) }}" 
                                 alt="{{ $testimonial->client_name }}" 
                                 class="w-12 h-12 rounded-full object-cover mr-4">
                        @else
                            <div class="w-12 h-12 bg-primary-color rounded-full flex items-center justify-center mr-4">
                                <span class="text-white font-semibold text-sm">
                                    {{ strtoupper(substr($testimonial->client_name, 0, 2)) }}
                                </span>
                            </div>
                        @endif
                        <div>
                            <h4 class="font-semibold">{{ $testimonial->client_name }}</h4>
                            @if($testimonial->client_position)
                                <p class="text-sm text-gray-500">{{ $testimonial->client_position }}</p>
                            @endif
                            @if($testimonial->company_name)
                                <p class="text-sm text-gray-500">{{ $testimonial->company_name }}</p>
                            @endif
                        </div>
                    </div>
                    <p class="text-gray-600 mb-4">
                        "{{ $testimonial->testimonial }}"
                    </p>
                    <div class="flex items-center justify-between">
                        <div class="flex text-yellow-400">
                            @for($i = 1; $i <= 5; $i++)
                                @if($i <= $testimonial->rating)
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                    </svg>
                                @else
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                    </svg>
                                @endif
                            @endfor
                        </div>
                        @if($testimonial->service_type)
                            <span class="text-xs bg-blue-100 text-blue-800 px-2 py-1 rounded-full">
                                {{ $testimonial->service_type }}
                            </span>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- No Testimonials Message -->
    @if((!isset($featuredTestimonials) || $featuredTestimonials->count() == 0) && (!isset($allTestimonials) || $allTestimonials->count() == 0))
    <section class="section bg-white">
        <div class="container mx-auto px-4 text-center">
            <div class="py-16">
                <div class="text-6xl mb-6">📝</div>
                <h2 class="text-3xl font-bold mb-4 text-gray-900">No Testimonials Yet</h2>
                <p class="text-lg text-gray-600 mb-8">
                    We're working on collecting testimonials from our satisfied clients. Check back soon!
                </p>
                <a href="{{ route('contact') }}" class="btn-primary">
                    Be Our First Review
                </a>
            </div>
        </div>
    </section>
    @endif

    <!-- CTA Section -->
    <section class="section bg-primary-color text-white">
        <div class="container mx-auto px-4 text-center">
            <div class="fade-in">
                <h2 class="text-4xl font-bold mb-6">Join Our Satisfied Clients</h2>
                <p class="text-xl mb-8 opacity-90 max-w-2xl mx-auto">
                    Experience the same level of excellence that our clients rave about
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('contact') }}" class="btn-primary bg-gray-800 text-lg px-8 py-4 transform scale-105 ">
                        Get Started Today
                    </a>
                    <a href="{{ route('services') }}" class="border-2 border-white text-white px-8 py-4 rounded-lg font-semibold hover:bg-white hover:text-gray-800 transition-colors">
                        Our Services
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection

