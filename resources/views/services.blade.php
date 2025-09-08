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
    <section class="section bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-extrabold mb-6 
                    bg-gradient-to-r from-[#499974] via-[#6d83d5] to-[#33978d] 
                    bg-clip-text text-transparent">
                    Comprehensive Maritime Solutions
                </h2>
                <p class="section-subtitle">
                    From chartering to technical services, we provide end-to-end maritime solutions 
                    backed by decades of industry expertise
                </p>
            </div>
    
            <div class="scroller-container">
                <div class="scroller-wrapper">
                    @foreach($services as $service)
                        <div class="scroller-slide card text-center">
                            <!-- Icon Circle -->
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
        /* Container Scroll */
        .scroller-container {
            --slide-width: clamp(280px, 30vw, 600px);
            --slide-gap: 1.5rem;
    
            overflow-x: auto;
            scroll-snap-type: x mandatory;
            -webkit-overflow-scrolling: touch;
            display: flex;
            padding-bottom: 1rem;
            
        }
    
        /* Wrapper Auto Scroll */
        .scroller-wrapper {
            display: flex;
            gap: var(--slide-gap);
            animation: moveLeft 20s linear infinite;
        }
    
        /* Card Style */
        .scroller-slide {
            flex: 0 0 var(--slide-width);
            scroll-snap-align: start;
            background: linear-gradient(to right, #e7f0ecff, #f1f2f7ff, #e6f1f0ff);
            border-radius: 20px;
            padding: 2rem 1.5rem;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
            border-left: 6px solid #499974; /* Sidebar effect */
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .scroller-slide:hover {
            transform: translateY(-6px);
            box-shadow: 0 8px 30px rgba(0,0,0,0.12);
        }
    
        /* Icon Circle */
        .icon-circle {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #499974, #6d83d5);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        .icon-circle i {
            color: white;
            font-size: 32px;
        }
    
        /* Scrollbar */
        .scroller-container::-webkit-scrollbar {
            height: 8px;
        }
        .scroller-container::-webkit-scrollbar-thumb {
            background: white;
            border-radius: 4px;
        }
        .scroller-container::-webkit-scrollbar-thumb:hover {
            background: rgb(231, 231, 231);
        }
    
        /* Auto Scroll Animation */
        @keyframes moveLeft {
            from { transform: translateX(0); }
            to { transform: translateX(-50%); }
        }
    </style>
    
    
@endsection
