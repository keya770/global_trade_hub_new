@extends('layouts.app')

@section('title', $subService->name . ' - SMA Ship Brokers')
@section('description', $subService->description)

@section('content')
    <!-- Service Hero Section -->
    <section class="relative py-20 bg-gradient-to-br from-primary-color to-primary-dark text-white overflow-hidden">
        <!-- Animated Background -->
        <div class="absolute inset-0">
            
        </div>
        
        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-4xl mx-auto">
                <div class="hero-content">
                    <div class="service-badge">
                        <i class="fas fa-layer-group mr-2"></i>
                        {{ $subService->service->name }}
                    </div>
                    <h1 class="hero-title">{{ $subService->name }}</h1>
                    <div class="hero-meta">
                        <div class="meta-item">
                            <div class="meta-icon">
                                <i class="fas fa-ship"></i>
                            </div>
                            <span>SMA Ship Brokers</span>
                        </div>
                        <div class="meta-item">
                            <i class="fas fa-calendar mr-2"></i>
                            <span>{{ $subService->created_at->format('F j, Y') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Service Content -->
    <section class="section bg-gradient-to-br from-gray-50 to-white">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <!-- Service Image -->
                <div class="content-image-container">
                    @if($subService->image)
                        <img src="{{ asset('storage/' . $subService->image) }}" 
                             alt="{{ $subService->name }}" 
                             class="content-image">
                    @else
                        <img src="https://images.pexels.com/photos/799091/pexels-photo-799091.jpeg" 
                             alt="{{ $subService->name }}" 
                             class="content-image">
                    @endif
                    <div class="image-overlay">
                        <div class="overlay-content">
                            <h3 class="overlay-title">{{ $subService->name }}</h3>
                            <p class="overlay-desc">Specialized Sub-Service</p>
                        </div>
                    </div>
                </div>

                <!-- Service Description -->
                <div class="description-card">
                    <div class="description-icon">
                        <i class="fas fa-info-circle"></i>
                    </div>
                    <div class="description-content">
                        <h3 class="description-title">Sub-Service Overview</h3>
                        <p class="description-text">
                            {{ $subService->description }}
                        </p>
                    </div>
                </div>

                <!-- Service Content -->
                <div class="content-card">
                    <div class="content-header">
                        <h2 class="content-title">Detailed Information</h2>
                        <div class="content-divider"></div>
                    </div>
                    <div class="prose-content">
                        {!! $subService->content !!}
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Sub Sub Services Section -->
    @if($subSubServices->count() > 0)
    <section class="section bg-gradient-to-br from-white to-gray-50">
        <div class="container mx-auto px-4">
            <div class="section-header">
                <h2 class="section-title">Sub Services</h2>
                <p class="section-subtitle">Explore our specialized sub-services</p>
                <div class="section-divider"></div>
            </div>
            
            <div class="services-grid">
                @foreach($subSubServices as $subSubService)
                <article class="service-card">
                    <div class="card-image-container">
                        @if($subSubService->image)
                            <img src="{{ asset('storage/' . $subSubService->image) }}" 
                                 alt="{{ $subSubService->name }}" 
                                 class="card-image">
                        @else
                            <img src="https://images.pexels.com/photos/247786/pexels-photo-247786.jpeg" 
                                 alt="{{ $subSubService->name }}" 
                                 class="card-image">
                        @endif
                        <div class="card-overlay">
                            <div class="card-icon">
                                <i class="fas fa-cog"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card-content">
                        <h3 class="card-title">{{ $subSubService->name }}</h3>
                        <p class="card-description">{{ $subSubService->description }}</p>
                        <a href="{{ route('services.sub.details', $subSubService) }}" class="card-link">
                            Learn More <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </article>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Related Sub Services -->
    @if($relatedSubServices->count() > 0)
    <section class="section bg-gradient-to-br from-gray-50 to-white">
        <div class="container mx-auto px-4">
            <div class="section-header">
                <h2 class="section-title">Related Sub Services</h2>
                <p class="section-subtitle">Other sub-services you may be interested in</p>
                <div class="section-divider"></div>
            </div>
            
            <div class="services-grid">
                @foreach($relatedSubServices as $relatedSubService)
                <article class="service-card">
                    <div class="card-image-container">
                        @if($relatedSubService->image)
                            <img src="{{ asset('storage/' . $relatedSubService->image) }}" 
                                 alt="{{ $relatedSubService->name }}" 
                                 class="card-image">
                        @else
                            <img src="https://images.pexels.com/photos/247786/pexels-photo-247786.jpeg" 
                                 alt="{{ $relatedSubService->name }}" 
                                 class="card-image">
                        @endif
                        <div class="card-overlay">
                            <div class="card-icon">
                                <i class="fas fa-layer-group"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card-content">
                        <h3 class="card-title">{{ $relatedSubService->name }}</h3>
                        <p class="card-description">{{ $relatedSubService->description }}</p>
                        <a href="{{ route('services.sub.details', $relatedSubService) }}" class="card-link">
                            Learn More <i class="fas fa-arrow-right"></i>
                        </a>
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
                    <a href="{{ route('services.details', $subService->service) }}" class="btn-primary bg-gray-800 text-lg px-8 py-4 transform scale-105 ">
                        View All Services
                    </a>
                    <a href="{{ route('contact') }}" class="border-2 border-white text-white px-8 py-4 rounded-lg font-semibold hover:bg-white hover:text-gray-800 transition-colors">
                        Contact Us
                    </a>
                </div>
            </div>
        </div>
    </section>

    <style>
    /* Hero Section Animations */
    .hero-content {
        animation: fadeInUp 1s ease forwards;
        opacity: 0;
        transform: translateY(30px);
    }

    .service-badge {
        display: inline-block;
        background: rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(10px);
        color: white;
        padding: 12px 24px;
        border-radius: 30px;
        font-size: 14px;
        font-weight: 600;
        margin-bottom: 24px;
        animation: slideInLeft 0.8s ease forwards 0.2s;
        opacity: 0;
        transform: translateX(-30px);
        border: 1px solid rgba(255, 255, 255, 0.3);
    }

    .hero-title {
        font-size: 3.5rem;
        font-weight: 800;
        margin-bottom: 32px;
        background: linear-gradient(135deg, #ffffff, #e0f2fe);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        animation: slideInUp 0.8s ease forwards 0.4s;
        opacity: 0;
        transform: translateY(30px);
    }

    .hero-meta {
        display: flex;
        align-items: center;
        gap: 32px;
        animation: slideInUp 0.8s ease forwards 0.6s;
        opacity: 0;
        transform: translateY(30px);
    }

    .meta-item {
        display: flex;
        align-items: center;
        gap: 12px;
        color: rgba(255, 255, 255, 0.9);
        font-size: 16px;
    }

    .meta-icon {
        width: 40px;
        height: 40px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
    }

    /* Hero Background Animations */
    .hero-particles {
        position: absolute;
        inset: 0;
        overflow: hidden;
    }

    .hero-particles .particle {
        position: absolute;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
        animation: float 8s ease-in-out infinite;
    }

    .hero-particles .particle-1 {
        width: 20px;
        height: 20px;
        top: 20%;
        left: 10%;
        animation-delay: 0s;
    }

    .hero-particles .particle-2 {
        width: 15px;
        height: 15px;
        top: 60%;
        left: 80%;
        animation-delay: 2s;
    }

    .hero-particles .particle-3 {
        width: 25px;
        height: 25px;
        top: 80%;
        left: 20%;
        animation-delay: 4s;
    }

    .hero-particles .particle-4 {
        width: 18px;
        height: 18px;
        top: 30%;
        left: 70%;
        animation-delay: 6s;
    }

    .hero-particles .particle-5 {
        width: 22px;
        height: 22px;
        top: 70%;
        left: 50%;
        animation-delay: 8s;
    }

    .floating-shapes {
        position: absolute;
        inset: 0;
        overflow: hidden;
    }

    .shape {
        position: absolute;
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0.05));
        border-radius: 20px;
        animation: floatShape 12s ease-in-out infinite;
    }

    .shape-1 {
        width: 100px;
        height: 100px;
        top: 10%;
        right: 10%;
        animation-delay: 0s;
    }

    .shape-2 {
        width: 80px;
        height: 80px;
        bottom: 20%;
        left: 15%;
        animation-delay: 4s;
    }

    .shape-3 {
        width: 120px;
        height: 120px;
        top: 50%;
        right: 30%;
        animation-delay: 8s;
    }

    /* Content Section Styles */
    .content-image-container {
        position: relative;
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        margin-bottom: 32px;
        animation: fadeInUp 0.8s ease forwards;
    }

    .content-image {
        width: 100%;
        height: 400px;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .content-image-container:hover .content-image {
        transform: scale(1.05);
    }

    .image-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: linear-gradient(to top, rgba(0, 0, 0, 0.8), transparent);
        padding: 32px;
        color: white;
    }

    .overlay-title {
        font-size: 24px;
        font-weight: 700;
        margin-bottom: 8px;
    }

    .overlay-desc {
        font-size: 16px;
        opacity: 0.9;
    }

    .description-card {
        display: flex;
        align-items: flex-start;
        gap: 24px;
        background: white;
        padding: 32px;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        margin-bottom: 32px;
        animation: fadeInUp 0.8s ease forwards 0.2s;
        opacity: 0;
        transform: translateY(30px);
        border-left: 6px solid #6d83d5;
    }

    .description-icon {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, #6d83d5, #33978d);
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 24px;
        flex-shrink: 0;
    }

    .description-title {
        font-size: 20px;
        font-weight: 700;
        color: #1f2937;
        margin-bottom: 12px;
    }

    .description-text {
        font-size: 18px;
        color: #6b7280;
        line-height: 1.7;
        font-style: italic;
    }

    .content-card {
        background: white;
        padding: 40px;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        animation: fadeInUp 0.8s ease forwards 0.4s;
        opacity: 0;
        transform: translateY(30px);
    }

    .content-header {
        text-align: center;
        margin-bottom: 32px;
    }

    .content-title {
        font-size: 28px;
        font-weight: 800;
        color: #1f2937;
        margin-bottom: 16px;
        background: linear-gradient(135deg, #6d83d5, #33978d);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .content-divider {
        width: 80px;
        height: 4px;
        background: linear-gradient(135deg, #6d83d5, #33978d);
        border-radius: 2px;
        margin: 0 auto;
    }

    .prose-content {
        font-size: 18px;
        line-height: 1.8;
        color: #374151;
    }

    .prose-content h1, .prose-content h2, .prose-content h3 {
        color: #1f2937;
        margin-top: 32px;
        margin-bottom: 16px;
    }

    .prose-content p {
        margin-bottom: 16px;
    }

    .prose-content ul, .prose-content ol {
        margin-bottom: 16px;
        padding-left: 24px;
    }

    .prose-content li {
        margin-bottom: 8px;
    }

    /* Section Headers */
    .section-header {
        text-align: center;
        margin-bottom: 48px;
        animation: fadeInUp 0.8s ease forwards;
    }

    .section-title {
        font-size: 36px;
        font-weight: 800;
        color: #1f2937;
        margin-bottom: 16px;
        background: linear-gradient(135deg, #6d83d5, #33978d);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .section-subtitle {
        font-size: 18px;
        color: #6b7280;
        margin-bottom: 24px;
    }

    .section-divider {
        width: 100px;
        height: 4px;
        background: linear-gradient(135deg, #6d83d5, #33978d);
        border-radius: 2px;
        margin: 0 auto;
    }

    /* Services Grid */
    .services-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        gap: 32px;
    }

    .service-card {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        animation: fadeInUp 0.8s ease forwards;
        opacity: 0;
        transform: translateY(30px);
    }

    .service-card:nth-child(1) { animation-delay: 0.1s; }
    .service-card:nth-child(2) { animation-delay: 0.2s; }
    .service-card:nth-child(3) { animation-delay: 0.3s; }

    .service-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
    }

    .card-image-container {
        position: relative;
        height: 200px;
        overflow: hidden;
    }

    .card-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .service-card:hover .card-image {
        transform: scale(1.1);
    }

    .card-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(to bottom, rgba(0, 0, 0, 0.3), transparent);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .service-card:hover .card-overlay {
        opacity: 1;
    }

    .card-icon {
        width: 60px;
        height: 60px;
        background: rgba(255, 255, 255, 0.9);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #6d83d5;
        font-size: 24px;
    }

    .card-content {
        padding: 24px;
    }

    .card-title {
        font-size: 20px;
        font-weight: 700;
        color: #1f2937;
        margin-bottom: 12px;
    }

    .card-description {
        font-size: 14px;
        color: #6b7280;
        margin-bottom: 20px;
        line-height: 1.6;
    }

    .card-link {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: #6d83d5;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .card-link:hover {
        color: #33978d;
        transform: translateX(4px);
    }

    /* CTA Section */
    .cta-content {
        animation: fadeInUp 0.8s ease forwards;
        opacity: 0;
        transform: translateY(30px);
    }

    .cta-title {
        font-size: 40px;
        font-weight: 800;
        margin-bottom: 24px;
    }

    .cta-description {
        font-size: 20px;
        opacity: 0.9;
        margin-bottom: 32px;
        max-width: 600px;
        margin-left: auto;
        margin-right: auto;
    }

    .cta-buttons {
        display: flex;
        gap: 24px;
        justify-content: center;
        flex-wrap: wrap;
    }

    .cta-button {
        display: inline-flex;
        align-items: center;
        padding: 16px 32px;
        border-radius: 50px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
        font-size: 16px;
    }

    .cta-primary {
        background: #1f2937;
        color: white;
        transform: scale(1.05);
    }

    .cta-primary:hover {
        background: #374151;
        transform: scale(1.1);
    }

    .cta-secondary {
        border: 2px solid white;
        color: white;
    }

    .cta-secondary:hover {
        background: white;
        color: #1f2937;
    }

    .cta-particles {
        position: absolute;
        inset: 0;
        overflow: hidden;
    }

    .cta-particles .particle {
        position: absolute;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
        animation: float 6s ease-in-out infinite;
    }

    .cta-particles .particle-1 {
        width: 15px;
        height: 15px;
        top: 20%;
        left: 20%;
        animation-delay: 0s;
    }

    .cta-particles .particle-2 {
        width: 20px;
        height: 20px;
        top: 60%;
        right: 20%;
        animation-delay: 2s;
    }

    .cta-particles .particle-3 {
        width: 12px;
        height: 12px;
        bottom: 30%;
        left: 50%;
        animation-delay: 4s;
    }

    /* Keyframes */
    @keyframes fadeInUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

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

    @keyframes float {
        0%, 100% {
            transform: translateY(0px) rotate(0deg);
        }
        50% {
            transform: translateY(-20px) rotate(180deg);
        }
    }

    @keyframes floatShape {
        0%, 100% {
            transform: translateY(0px) rotate(0deg);
        }
        50% {
            transform: translateY(-30px) rotate(180deg);
        }
    }

    /* Responsive */
    @media (max-width: 768px) {
        .hero-title {
            font-size: 2.5rem;
        }
        
        .hero-meta {
            flex-direction: column;
            gap: 16px;
        }
        
        .services-grid {
            grid-template-columns: 1fr;
        }
        
        .cta-buttons {
            flex-direction: column;
            align-items: center;
        }
        
        .description-card {
            flex-direction: column;
            text-align: center;
        }
    }
    </style>
@endsection
