@extends('layouts.app')

@section('title', 'Services - SMA Ship Brokers')
@section('description', 'Comprehensive maritime services including ship chartering, sale & purchase, valuation, inspection, technical services, and financial support.')

@section('content')
    <!-- Hero Section -->
    <section class="relative py-20 bg-gradient-to-br from-primary-color to-primary-dark text-white overflow-hidden">
        <canvas id="particles" class="absolute inset-0 z-0"></canvas>
        <div class="container mx-auto px-4 text-center relative z-10">
            <div class="fade-in">
                <h1 class="text-5xl md:text-6xl font-bold mb-6">Our Services</h1>
                <p class="text-xl md:text-2xl opacity-90 max-w-3xl mx-auto">
                    Comprehensive maritime solutions tailored to meet your business needs
                </p>
            </div>
        </div>
    </section>

    <!-- Services Overview -->
    <section class="section bg-white py-20">
        <div class="container mx-auto px-4">
            <!-- Section Header -->
            <div class="text-center mb-16">
                <h2 class="text-4xl font-extrabold mb-6 
                    bg-gradient-to-r from-[#499974] via-[#6d83d5] to-[#33978d] 
                    bg-clip-text text-transparent">
                    Comprehensive Maritime Solutions
                </h2>
                <p class="text-lg md:text-xl text-gray-600 max-w-3xl mx-auto">
                    From chartering to technical services, we provide end-to-end maritime solutions 
                    backed by decades of industry expertise.
                </p>
            </div>

            <!-- Horizontal Scroller -->
            <div class="relative overflow-x-auto">
                <div class="flex scroller-wrapper gap-8 animate-scroll">
                    <!-- Original Loop -->
                    @foreach($services as $service)
                        <div class="scroller-slide card text-center">
                            <div class="icon-circle mx-auto mb-6">
                                @if($service->icon)
                                    <i class="{{ $service->icon }}"></i>
                                @else
                                    <i class="fas fa-ship"></i>
                                @endif
                            </div>
                            <h3 class="text-2xl font-bold mb-4">{{ $service->name }}</h3>
                            <p class="text-gray-600 mb-6 text-lg">{{ $service->description }}</p>
                            <a href="{{ route('services.details', $service) }}" 
                            class="text-primary-color font-semibold hover:underline">
                                Learn More →
                            </a>
                        </div>
                    @endforeach

                    <!-- Duplicate Loop for seamless infinite scroll -->
                    @foreach($services as $service)
                        <div class="scroller-slide card text-center">
                            <div class="icon-circle mx-auto mb-6">
                                @if($service->icon)
                                    <i class="{{ $service->icon }}"></i>
                                @else
                                    <i class="fas fa-ship"></i>
                                @endif
                            </div>
                            <h3 class="text-2xl font-bold mb-4">{{ $service->name }}</h3>
                            <p class="text-gray-600 mb-6 text-lg">{{ $service->description }}</p>
                            <a href="{{ route('services.details', $service) }}" 
                            class="text-primary-color font-semibold hover:underline">
                                Learn More →
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <style>
    /* Scroll Container */
    .scroller-wrapper {
        display: flex;
        gap: 2.5rem;
        width: max-content;
    }

    /* Card Style */
    .scroller-slide {
        flex: 0 0 280px;
        scroll-snap-align: start;
        background: linear-gradient(to right, #e7f0ecff, #f1f2f7ff, #e6f1f0ff);
        border-radius: 20px;
        padding: 2rem 1.5rem;
        box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        border-left: 6px solid #499974;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .scroller-slide:hover {
        transform: translateY(-6px);
        box-shadow: 0 8px 30px rgba(0,0,0,0.12);
    }

    /* Icon Circle */
    .icon-circle {
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, #499974, #6d83d5);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }
    .icon-circle i {
        color: white;
        font-size: 25px;
    }

    /* Scrollbar Styles */
    .scroller-wrapper::-webkit-scrollbar {
        height: 10px;
    }
    .scroller-wrapper::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 5px;
    }
    .scroller-wrapper::-webkit-scrollbar-thumb {
        background: #499974;
        border-radius: 5px;
    }
    .scroller-wrapper::-webkit-scrollbar-thumb:hover {
        background: #6d83d5;
    }
    .scroller-wrapper {
        scrollbar-width: thin;
        scrollbar-color: #499974 #f1f1f1;
    }

    /* Infinite scroll animation */
    @keyframes scroll-left {
        0% { transform: translateX(0); }
        100% { transform: translateX(-50%); }
    }
    .animate-scroll {
        animation: scroll-left 40s linear infinite;
    }

    /* Responsive */
    @media (max-width: 1024px) {
        .scroller-slide {
            flex: 0 0 240px;
        }
    }
    @media (max-width: 768px) {
        .scroller-slide {
            flex: 0 0 200px;
            padding: 1.5rem 1rem;
        }
        .icon-circle {
            width: 60px;
            height: 60px;
        }
        .icon-circle i {
            font-size: 24px;
        }
    }
    </style>
@endsection
