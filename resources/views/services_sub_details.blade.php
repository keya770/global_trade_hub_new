@extends('layouts.app')

@section('title', $subService->name . ' - SMA Ship Brokers')
@section('description', $subService->description)

@section('content')
    <!-- Service Hero Section -->
    <section class="relative py-20 bg-gradient-to-br from-primary-color to-primary-dark text-white overflow-hidden">
        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-4xl mx-auto">
                <div class="fade-in">
                    <div class="mb-4">
                        <span class="bg-white bg-opacity-20 text-white px-4 py-2 rounded-full text-sm font-semibold">
                            {{ $subService->service->name }}
                        </span>
                    </div>
                    <h1 class="text-4xl md:text-5xl font-bold mb-6">{{ $subService->name }}</h1>
                    <div class="flex items-center text-white opacity-90">
                        <div class="flex items-center mr-6">
                            <div class="w-10 h-10 bg-white bg-opacity-20 rounded-full flex items-center justify-center mr-3">
                                <span class="text-white font-semibold">GT</span>
                            </div>
                            <span>SMA Ship Brokers</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-calendar mr-2"></i>
                            <span>{{ $subService->created_at->format('F j, Y') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Service Content -->
    <section class="section bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                @if($subService->image)
                <div class="mb-8">
                    <img src="{{ asset('storage/' . $subService->image) }}" 
                         alt="{{ $subService->name }}" 
                         class="w-full h-64 md:h-96 object-cover rounded-lg">
                </div>
                @else
                <div class="mb-8">
                    <img src="https://images.pexels.com/photos/799091/pexels-photo-799091.jpeg" 
                         alt="{{ $subService->name }}" 
                         class="w-full h-64 md:h-96 object-cover rounded-lg">
                </div>
                @endif

                <div class="mb-8 p-6 bg-gray-50 rounded-lg">
                    <p class="text-lg text-gray-700 italic">
                        {{ $subService->description }}
                    </p>
                </div>

                <div class="prose prose-lg max-w-none">
                    {!! $subService->content !!}
                </div>

            </div>
        </div>
    </section>

    <!-- Sub Sub Services Section -->
    @if($subSubServices->count() > 0)
    <section class="section bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold mb-4">Sub Services</h2>
                <p class="text-gray-600">Explore our specialized sub-services</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($subSubServices as $subSubService)
                <article class="card bg-white">
                    @if($subSubService->image)
                        <img src="{{ asset('storage/' . $subSubService->image) }}" 
                             alt="{{ $subSubService->name }}" 
                             class="w-full h-48 object-cover rounded-lg mb-4">
                    @else
                        <img src="https://images.pexels.com/photos/247786/pexels-photo-247786.jpeg" 
                             alt="{{ $subSubService->name }}" 
                             class="w-full h-48 object-cover rounded-lg mb-4">
                    @endif
                    <div class="p-4">
                        <h3 class="text-lg font-bold mb-2 text-gray-800">{{ $subSubService->name }}</h3>
                        <p class="text-gray-600 text-sm mb-3">{{ $subSubService->description }}</p>
                        <a href="{{ route('services.sub.details', $subSubService) }}" class="text-primary-color text-sm font-semibold hover:underline">Learn More →</a>
                    </div>
                </article>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Related Sub Services -->
    @if($relatedSubServices->count() > 0)
    <section class="section bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold mb-4">Related Sub Services</h2>
                <p class="text-gray-600">Other sub-services you may be interested in</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($relatedSubServices as $relatedSubService)
                <article class="card bg-white">
                    @if($relatedSubService->image)
                        <img src="{{ asset('storage/' . $relatedSubService->image) }}" 
                             alt="{{ $relatedSubService->name }}" 
                             class="w-full h-48 object-cover rounded-lg mb-4">
                    @else
                        <img src="https://images.pexels.com/photos/247786/pexels-photo-247786.jpeg" 
                             alt="{{ $relatedSubService->name }}" 
                             class="w-full h-48 object-cover rounded-lg mb-4">
                    @endif
                    <div class="p-4">
                        <h3 class="text-lg font-bold mb-2 text-gray-800">{{ $relatedSubService->name }}</h3>
                        <p class="text-gray-600 text-sm mb-3">{{ $relatedSubService->description }}</p>
                        <a href="{{ route('services.sub.details', $relatedSubService) }}" class="text-primary-color text-sm font-semibold hover:underline">Learn More →</a>
                    </div>
                </article>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- CTA Section -->
    <section class="section bg-primary-color text-white">
        <div class="container mx-auto px-4 text-center">
            <div class="fade-in">
                <h2 class="text-4xl font-bold mb-6">Get in Touch</h2>
                <p class="text-xl mb-8 opacity-90 max-w-2xl mx-auto">
                    Contact us for more information on our maritime services and solutions.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('services.details', $subService->service) }}" class="btn-primary bg-gray-800 text-lg px-8 py-4 transform scale-105">
                        Back to {{ $subService->service->name }}
                    </a>
                    <a href="{{ route('contact') }}" class="border-2 border-white text-white px-8 py-4 rounded-lg font-semibold hover:bg-white hover:text-gray-800 transition-colors">
                        Contact Us
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
