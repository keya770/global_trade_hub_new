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

    <!-- About Our Services (Intro) -->
    <section class="relative py-20 bg-gradient-to-br from-gray-50 to-blue-50 overflow-hidden">
        <!-- Animated Background -->
        <div class="absolute inset-0">
            <div class="floating-particles">
                <div class="particle particle-1"></div>
                <div class="particle particle-2"></div>
                <div class="particle particle-3"></div>
                <div class="particle particle-4"></div>
                <div class="particle particle-5"></div>
            </div>
        </div>
        
        <div class="container mx-auto px-4 relative z-10">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div class="intro-content">
                    <div class="intro-badge">
                        <i class="fas fa-star mr-2"></i>
                        Trusted Worldwide
                    </div>
                    <h2 class="intro-title">
                        About Our Services
                    </h2>
                    <p class="intro-description">
                        We provide comprehensive shipping and logistics services that connect businesses across the globe. 
                        From ocean freight to air cargo, warehousing to customs clearance, our integrated solutions ensure 
                        your goods reach their destination safely, efficiently, and on time. With decades of maritime 
                        expertise and a global network of partners, we deliver end-to-end logistics solutions tailored 
                        to meet your specific business needs.
                    </p>
                    
                    <!-- Feature Cards -->
                    <div class="feature-cards">
                        <div class="feature-card">
                            <div class="feature-icon">
                                <i class="fas fa-ship"></i>
                            </div>
                            <div class="feature-content">
                                <h3 class="feature-title">Global Maritime Excellence</h3>
                                <p class="feature-desc">Connecting continents through superior logistics</p>
                            </div>
                        </div>
                        
                        <div class="feature-card">
                            <div class="feature-icon">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div class="feature-content">
                                <h3 class="feature-title">24/7 Support</h3>
                                <p class="feature-desc">Round-the-clock assistance for your shipments</p>
                            </div>
                        </div>
                        
                        <div class="feature-card">
                            <div class="feature-icon">
                                <i class="fas fa-shield-alt"></i>
                            </div>
                            <div class="feature-content">
                                <h3 class="feature-title">Secure & Reliable</h3>
                                <p class="feature-desc">Your cargo is protected throughout the journey</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="image-container">
                    <div class="image-wrapper">
                        <img src="https://images.unsplash.com/photo-1544551763-46a013bb70d5?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" 
                             alt="Shipping and Logistics" 
                             class="main-image">
                        <div class="image-overlay">
                            <div class="overlay-content">
                                <h4 class="overlay-title">Worldwide Shipping</h4>
                                <p class="overlay-desc">Connecting businesses across the globe</p>
                            </div>
                        </div>
                        
                        <!-- Floating Stats -->
                        <div class="floating-stats">
                            <div class="stat-card stat-1">
                                <div class="stat-number">150+</div>
                                <div class="stat-label">Countries</div>
                            </div>
                            <div class="stat-card stat-2">
                                <div class="stat-number">99.8%</div>
                                <div class="stat-label">On-Time</div>
                            </div>
                            <div class="stat-card stat-3">
                                <div class="stat-number">24/7</div>
                                <div class="stat-label">Support</div>
                            </div>
                        </div>
                    </div>
                </div>
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
                            <p class="text-gray-600 mb-6 text-lg service-description" data-full-text="{{ $service->description }}">
                                {{ Str::limit($service->description, 150) }}
                            </p>
                            @if(strlen($service->description) > 150)
                                {{-- <div class="mb-4">
                                    <a href="{{ route('services.details', $service) }}" 
                                       class="text-primary-color hover:text-blue-600 font-semibold text-sm learn-more-btn">
                                        Learn More →
                                    </a>
                                </div> --}}
                            @endif
                            <a href="{{ route('services.details', $service) }}" 
                            class="text-primary-color font-semibold hover:underline">
                                View Details →
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
                            <p class="text-gray-600 mb-6 text-lg service-description" data-full-text="{{ $service->description }}">
                                {{ Str::limit($service->description, 150) }}
                            </p>
                            @if(strlen($service->description) > 150)
                                <div class="mb-4">
                                    <a href="{{ route('services.details', $service) }}" 
                                       class="text-primary-color hover:text-blue-600 font-semibold text-sm learn-more-btn">
                                        Learn More →
                                    </a>
                                </div>
                            @endif
                            <a href="{{ route('services.details', $service) }}" 
                            class="text-primary-color font-semibold hover:underline">
                                View Details →
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

     <!-- CTA Section -->
     <section class="section bg-primary-color text-white">
        <div class="container mx-auto px-4 text-center">
            <div class="fade-in">
                <h2 class="text-4xl font-bold mb-6">Ready to Join Our Team?</h2>
                <p class="text-xl mb-8 opacity-90 max-w-2xl mx-auto">
                    Start your journey with SMA Ship Brokers and be part of shaping the future of maritime services
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="#apply" class="btn-primary bg-gray-800 text-lg px-8 py-4 transform scale-105 ">
                        Apply Now
                    </a>
                    <a href="{{ route('contact') }}" class="border-2 border-white text-white px-8 py-4 rounded-lg font-semibold hover:bg-white hover:text-gray-800 transition-colors">
                        Contact HR
                    </a>
                </div>
            </div>
        </div>
    </section>
    <style>
    /* Animation Classes */
    .fade-in-up {
        opacity: 0;
        transform: translateY(30px);
        animation: fadeInUp 0.8s ease forwards;
    }

    .fade-in-right {
        opacity: 0;
        transform: translateX(30px);
        animation: fadeInRight 0.8s ease forwards;
    }

    @keyframes fadeInUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes fadeInRight {
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    /* About Our Services Animations */
    .intro-badge {
        display: inline-block;
        background: linear-gradient(135deg, #499974, #6d83d5);
        color: white;
        padding: 8px 16px;
        border-radius: 25px;
        font-size: 14px;
        font-weight: 600;
        margin-bottom: 20px;
        animation: slideInLeft 0.8s ease forwards;
        opacity: 0;
        transform: translateX(-30px);
    }

    .intro-title {
        font-size: 3rem;
        font-weight: 800;
        color: #1f2937;
        margin-bottom: 24px;
        background: linear-gradient(135deg, #499974, #6d83d5, #33978d);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        animation: slideInUp 0.8s ease forwards 0.2s;
        opacity: 0;
        transform: translateY(30px);
    }

    .intro-description {
        font-size: 1.125rem;
        color: #000000;
        line-height: 1.7;
        margin-bottom: 32px;
        animation: slideInUp 0.8s ease forwards 0.4s;
        opacity: 0;
        transform: translateY(30px);
    }

    .feature-cards {
        display: flex;
        flex-direction: column;
        gap: 16px;
    }

    .feature-card {
        display: flex;
        align-items: center;
        gap: 16px;
        padding: 16px;
        background: white;
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        transition: all 0.3s ease;
        animation: slideInUp 0.8s ease forwards;
        opacity: 0;
        transform: translateY(30px);
    }

    .feature-card:nth-child(1) { animation-delay: 0.6s; }
    .feature-card:nth-child(2) { animation-delay: 0.8s; }
    .feature-card:nth-child(3) { animation-delay: 1s; }

    .feature-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 30px rgba(0,0,0,0.15);
    }

    .feature-icon {
        width: 48px;
        height: 48px;
        background: linear-gradient(135deg, #499974, #6d83d5);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 20px;
    }

    .feature-title {
        font-size: 16px;
        font-weight: 700;
        color: #1f2937;
        margin-bottom: 4px;
    }

    .feature-desc {
        font-size: 14px;
        color: #6b7280;
    }

    /* Image Container Animations */
    .image-container {
        animation: slideInRight 0.8s ease forwards 0.3s;
        opacity: 0;
        transform: translateX(30px);
    }

    .image-wrapper {
        position: relative;
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 20px 40px rgba(0,0,0,0.15);
    }

    .main-image {
        width: 100%;
        height: 400px;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .image-wrapper:hover .main-image {
        transform: scale(1.05);
    }

    .image-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);
        padding: 24px;
        color: white;
    }

    .overlay-title {
        font-size: 20px;
        font-weight: 700;
        margin-bottom: 8px;
    }

    .overlay-desc {
        font-size: 14px;
        opacity: 0.9;
    }

    /* Floating Stats */
    .floating-stats {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        pointer-events: none;
    }

    .stat-card {
        position: absolute;
        background: white;
        padding: 16px;
        border-radius: 12px;
        box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        text-align: center;
        animation: floatUp 2s ease-in-out infinite;
    }

    .stat-1 {
        top: 20px;
        right: 20px;
        animation-delay: 0s;
    }

    .stat-2 {
        bottom: 80px;
        left: 20px;
        animation-delay: 0.5s;
    }

    .stat-3 {
        top: 50%;
        right: -20px;
        animation-delay: 1s;
    }

    .stat-number {
        font-size: 24px;
        font-weight: 800;
        color: #499974;
        margin-bottom: 4px;
    }

    .stat-label {
        font-size: 12px;
        color: #6b7280;
        font-weight: 600;
    }

    /* Floating Particles */
    .floating-particles {
        position: absolute;
        inset: 0;
        overflow: hidden;
    }

    .particle {
        position: absolute;
        background: linear-gradient(135deg, #499974, #6d83d5);
        border-radius: 50%;
        opacity: 0.1;
        animation: float 6s ease-in-out infinite;
    }

    .particle-1 {
        width: 20px;
        height: 20px;
        top: 20%;
        left: 10%;
        animation-delay: 0s;
    }

    .particle-2 {
        width: 15px;
        height: 15px;
        top: 60%;
        left: 80%;
        animation-delay: 1s;
    }

    .particle-3 {
        width: 25px;
        height: 25px;
        top: 80%;
        left: 20%;
        animation-delay: 2s;
    }

    .particle-4 {
        width: 18px;
        height: 18px;
        top: 30%;
        left: 70%;
        animation-delay: 3s;
    }

    .particle-5 {
        width: 22px;
        height: 22px;
        top: 70%;
        left: 50%;
        animation-delay: 4s;
    }

    /* Additional Keyframes */
    @keyframes slideInLeft {
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes slideInUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes slideInRight {
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes float {
        0%, 100% {
            transform: translateY(0px) rotate(0deg);
        }
        50% {
            transform: translateY(-20px) rotate(180deg);
        }
    }

    @keyframes floatUp {
        0%, 100% {
            transform: translateY(0px);
        }
        50% {
            transform: translateY(-10px);
        }
    }

    /* Service Cards Animation */
    .service-card {
        opacity: 0;
        transform: translateY(30px);
        animation: fadeInUp 0.8s ease forwards;
    }

    .service-card:nth-child(1) { animation-delay: 0.1s; }
    .service-card:nth-child(2) { animation-delay: 0.2s; }
    .service-card:nth-child(3) { animation-delay: 0.3s; }
    .service-card:nth-child(4) { animation-delay: 0.4s; }
    .service-card:nth-child(5) { animation-delay: 0.5s; }
    .service-card:nth-child(6) { animation-delay: 0.6s; }

    /* Process Steps Animation */
    .process-step {
        opacity: 0;
        transform: translateY(30px);
        animation: fadeInUp 0.8s ease forwards;
    }

    .process-step:nth-child(1) { animation-delay: 0.1s; }
    .process-step:nth-child(2) { animation-delay: 0.2s; }
    .process-step:nth-child(3) { animation-delay: 0.3s; }
    .process-step:nth-child(4) { animation-delay: 0.4s; }
    .process-step:nth-child(5) { animation-delay: 0.5s; }

    /* USP Cards Animation */
    .usp-card {
        opacity: 0;
        transform: translateY(30px);
        animation: fadeInUp 0.8s ease forwards;
    }

    .usp-card:nth-child(1) { animation-delay: 0.1s; }
    .usp-card:nth-child(2) { animation-delay: 0.2s; }
    .usp-card:nth-child(3) { animation-delay: 0.3s; }
    .usp-card:nth-child(4) { animation-delay: 0.4s; }

    /* Industry Cards Animation */
    .industry-card {
        opacity: 0;
        transform: translateY(30px);
        animation: fadeInUp 0.8s ease forwards;
    }

    .industry-card:nth-child(1) { animation-delay: 0.1s; }
    .industry-card:nth-child(2) { animation-delay: 0.2s; }
    .industry-card:nth-child(3) { animation-delay: 0.3s; }
    .industry-card:nth-child(4) { animation-delay: 0.4s; }
    .industry-card:nth-child(5) { animation-delay: 0.5s; }
    .industry-card:nth-child(6) { animation-delay: 0.6s; }

    /* Fleet Cards Animation */
    .fleet-card {
        opacity: 0;
        transform: translateY(30px);
        animation: fadeInUp 0.8s ease forwards;
    }

    .fleet-card:nth-child(1) { animation-delay: 0.1s; }
    .fleet-card:nth-child(2) { animation-delay: 0.2s; }
    .fleet-card:nth-child(3) { animation-delay: 0.3s; }

    /* Hover Effects */
    .service-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.15);
    }

    .industry-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.15);
    }

    .fleet-card img:hover {
        transform: scale(1.05);
    }

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
        gap: 80px;
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
            flex: 0 0 300px;
            padding: 1.5rem 1rem;
        }
        .icon-circle {
            width: 60px;
            height: 60px;
        }
        .icon-circle i {
            font-size: 24px;
        }
        
        /* Mobile responsive animations */
        .fade-in-up, .fade-in-right {
            animation-delay: 0s !important;
        }
        
        .service-card, .process-step, .usp-card, .industry-card, .fleet-card {
            animation-delay: 0s !important;
        }
    }
    </style>
@endsection
