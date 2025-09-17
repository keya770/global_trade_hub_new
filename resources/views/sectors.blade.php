@extends('layouts.app')

@section('title', 'Sectors We Serve - SMA Ship Brokers')
@section('description', 'Explore the maritime sectors we serve including Dry Bulk Carriers, Tankers, General Cargo, Container Ships, and Offshore Service Vessels.')

@section('content')
    <!-- Sectors We Serve Hero Section with Particles -->
    <section class="relative py-20 bg-gradient-to-br from-primary-color to-primary-dark text-white overflow-hidden">
        <canvas id="particles" class="absolute inset-0 z-0"></canvas>
        <div class="container mx-auto px-4 text-center relative z-10">
            <div class="fade-in">
                <h1 class="text-5xl md:text-6xl font-bold mb-6">Sectors We Serve</h1>
                <p class="text-xl md:text-2xl opacity-90 max-w-3xl mx-auto">
                    Comprehensive maritime services across all major shipping sectors
                </p>
            </div>
        </div>
    </section>

    <!-- About Our Sectors (Intro) -->
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
                        <i class="fas fa-anchor mr-2"></i>
                        Maritime Expertise
                    </div>
                    <h2 class="intro-title">
                        About Our Sectors
                    </h2>
                    <p class="intro-description">
                        SMA Ship Brokers operates across all major maritime sectors, providing specialized services 
                        tailored to each industry's unique requirements. From dry bulk carriers transporting commodities 
                        worldwide to sophisticated LNG carriers powering global energy markets, our expertise spans 
                        the entire spectrum of maritime operations. We understand the complexities of each sector and 
                        deliver solutions that maximize efficiency, safety, and profitability for our clients.
                    </p>
                    
                    <!-- Feature Cards -->
                    <div class="feature-cards">
                        <div class="feature-card">
                            <div class="feature-icon">
                                <i class="fas fa-ship"></i>
                            </div>
                            <div class="feature-content">
                                <h3 class="feature-title">Multi-Sector Expertise</h3>
                                <p class="feature-desc">Comprehensive knowledge across all maritime sectors</p>
                            </div>
                        </div>
                        
                        <div class="feature-card">
                            <div class="feature-icon">
                                <i class="fas fa-chart-line"></i>
                            </div>
                            <div class="feature-content">
                                <h3 class="feature-title">Market Intelligence</h3>
                                <p class="feature-desc">Deep insights into sector-specific market dynamics</p>
                            </div>
                        </div>
                        
                        <div class="feature-card">
                            <div class="feature-icon">
                                <i class="fas fa-cogs"></i>
                            </div>
                            <div class="feature-content">
                                <h3 class="feature-title">Specialized Solutions</h3>
                                <p class="feature-desc">Tailored services for each sector's unique needs</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="image-container">
                    <div class="image-wrapper">
                        <img src="https://images.unsplash.com/photo-1544551763-46a013bb70d5?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" 
                             alt="Maritime Sectors" 
                             class="main-image">
                        <div class="image-overlay">
                            <div class="overlay-content">
                                <h4 class="overlay-title">Global Sectors</h4>
                                <p class="overlay-desc">Serving maritime industries worldwide</p>
                            </div>
                        </div>
                        
                        <!-- Floating Stats -->
                        <div class="floating-stats">
                            <div class="stat-card stat-1">
                                <div class="stat-number">8+</div>
                                <div class="stat-label">Sectors</div>
                            </div>
                            <div class="stat-card stat-2">
                                <div class="stat-number">50+</div>
                                <div class="stat-label">Countries</div>
                            </div>
                            <div class="stat-card stat-3">
                                <div class="stat-number">1000+</div>
                                <div class="stat-label">Vessels</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        /* Intro Section Styles */
        .intro-content {
            animation: fadeInUp 0.8s ease forwards;
            opacity: 0;
            transform: translateY(30px);
        }

        .intro-badge {
            display: inline-block;
            background: linear-gradient(135deg, #499974, #6d83d5);
            color: white;
            padding: 12px 24px;
            border-radius: 30px;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 24px;
            animation: slideInUp 0.8s ease forwards 0.2s;
            opacity: 0;
            transform: translateY(30px);
            box-shadow: 0 8px 25px rgba(73, 153, 116, 0.3);
        }

        .intro-title {
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 24px;
            background: linear-gradient(135deg, #499974, #6d83d5, #33978d);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: slideInUp 0.8s ease forwards 0.4s;
            opacity: 0;
            transform: translateY(30px);
        }

        .intro-description {
            font-size: 1.125rem;
            color: #0b0c0f;
            margin-bottom: 32px;
            line-height: 1.7;
            animation: slideInUp 0.8s ease forwards 0.6s;
            opacity: 0;
            transform: translateY(30px);
        }

        /* Feature Cards */
        .feature-cards {
            display: flex;
            flex-direction: column;
            gap: 20px;
            animation: slideInUp 0.8s ease forwards 0.8s;
            opacity: 0;
            transform: translateY(30px);
        }

        .feature-card {
            display: flex;
            align-items: center;
            gap: 16px;
            padding: 20px;
            background: white;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            border: 1px solid rgba(73, 153, 116, 0.1);
        }

        .feature-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 30px rgba(73, 153, 116, 0.15);
            border-color: rgba(73, 153, 116, 0.2);
        }

        .feature-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #499974, #6d83d5);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 20px;
            flex-shrink: 0;
        }

        .feature-content {
            flex: 1;
        }

        .feature-title {
            font-size: 16px;
            font-weight: 600;
            color: #1f2937;
            margin-bottom: 4px;
        }

        .feature-desc {
            font-size: 14px;
            color: #6b7280;
            margin: 0;
        }

        /* Image Container */
        .image-container {
            animation: fadeInUp 0.8s ease forwards 1s;
            opacity: 0;
            transform: translateY(30px);
        }

        .image-wrapper {
            position: relative;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        .main-image {
            width: 100%;
            height: 500px;
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
            background: linear-gradient(transparent, rgba(0, 0, 0, 0.8));
            padding: 40px 30px 30px;
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
            margin: 0;
        }

        /* Floating Stats */
        .floating-stats {
            position: absolute;
            top: 20px;
            right: 20px;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .stat-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            padding: 16px 20px;
            border-radius: 16px;
            text-align: center;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            animation: float 3s ease-in-out infinite;
        }

        .stat-card.stat-1 { animation-delay: 0s; }
        .stat-card.stat-2 { animation-delay: 1s; }
        .stat-card.stat-3 { animation-delay: 2s; }

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
            animation: floatParticle 8s ease-in-out infinite;
            opacity: 0.1;
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
            animation-delay: 2s;
        }

        .particle-3 {
            width: 25px;
            height: 25px;
            top: 80%;
            left: 20%;
            animation-delay: 4s;
        }

        .particle-4 {
            width: 18px;
            height: 18px;
            top: 30%;
            left: 70%;
            animation-delay: 6s;
        }

        .particle-5 {
            width: 22px;
            height: 22px;
            top: 70%;
            left: 50%;
            animation-delay: 8s;
        }

        /* Keyframes */
        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
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
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-10px);
            }
        }

        @keyframes floatParticle {
            0%, 100% {
                transform: translateY(0px) rotate(0deg);
            }
            50% {
                transform: translateY(-20px) rotate(180deg);
            }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .intro-title {
                font-size: 2rem;
            }
            
            .feature-cards {
                gap: 16px;
            }
            
            .feature-card {
                padding: 16px;
            }
            
            .main-image {
                height: 400px;
            }
            
            .floating-stats {
                position: static;
                flex-direction: row;
                justify-content: center;
                margin-top: 20px;
            }
            
            .stat-card {
                flex: 1;
                max-width: 100px;
            }
        }

        /* Fade-up animation */
        .fade-up {
            opacity: 0;
            transform: translateY(50px);
            transition: opacity 0.7s ease-out, transform 0.7s ease-out;
        }

        .fade-up.show {
            opacity: 1;
            transform: translateY(0);
        }

        /* Optional: animate features inside fade-up */
        .feature {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.5s ease-out, transform 0.5s ease-out;
        }

        .fade-up.show .feature {
            opacity: 1;
            transform: translateY(0);
        }

        /* Gradient animation for headings */
        @keyframes gradient-slide {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .animate-gradient {
            background-size: 200% 200%;
            animation: gradient-slide 4s ease infinite;
        }

        /* Scroll animations */
        .scroll-fade {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.8s ease-out;
        }

        .scroll-fade.show {
            opacity: 1;
            transform: translateY(0);
        }

        .scroll-slide-left {
            opacity: 0;
            transform: translateX(-50px);
            transition: all 0.8s ease-out;
        }

        .scroll-slide-left.show {
            opacity: 1;
            transform: translateX(0);
        }

        .scroll-slide-right {
            opacity: 0;
            transform: translateX(50px);
            transition: all 0.8s ease-out;
        }

        .scroll-slide-right.show {
            opacity: 1;
            transform: translateX(0);
        }

        .scroll-scale {
            opacity: 0;
            transform: scale(0.8);
            transition: all 0.8s ease-out;
        }

        .scroll-scale.show {
            opacity: 1;
            transform: scale(1);
        }

        /* Moving grid animation */
        .moving-grid {
            display: flex;
            overflow: hidden;
            position: relative;
        }

        .moving-grid-container {
            display: flex;
            animation: moveLeft 20s linear infinite;
            width: calc(100% * 2);
        }

        .moving-grid-item {
            flex: 0 0 50%;
            padding: 0 10px;
        }

        @keyframes moveLeft {
            0% {
                transform: translateX(0);
            }
            100% {
                transform: translateX(-50%);
            }
        }

        .moving-grid:hover .moving-grid-container {
            animation-play-state: paused;
        }

        /* Staggered animation delays */
        .scroll-fade:nth-child(1) { transition-delay: 0.1s; }
        .scroll-fade:nth-child(2) { transition-delay: 0.2s; }
        .scroll-fade:nth-child(3) { transition-delay: 0.3s; }
        .scroll-fade:nth-child(4) { transition-delay: 0.4s; }
        .scroll-fade:nth-child(5) { transition-delay: 0.5s; }
        .scroll-fade:nth-child(6) { transition-delay: 0.6s; }
    </style>

  

  <style>
    /* Expertise Section Animations */
    .expertise-header {
      text-align: center;
      margin-bottom: 48px;
      animation: fadeInUp 0.8s ease forwards;
      opacity: 0;
      transform: translateY(30px);
    }

    .expertise-badge {
      display: inline-block;
      background: linear-gradient(135deg, #499974, #6d83d5);
      color: white;
      padding: 12px 24px;
      border-radius: 30px;
      font-size: 14px;
      font-weight: 600;
      margin-bottom: 24px;
      animation: slideInUp 0.8s ease forwards 0.2s;
      opacity: 0;
      transform: translateY(30px);
      box-shadow: 0 8px 25px rgba(73, 153, 116, 0.3);
    }

    .expertise-title {
      font-size: 3rem;
      font-weight: 800;
      margin-bottom: 16px;
      background: linear-gradient(135deg, #499974, #6d83d5, #33978d);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
      animation: slideInUp 0.8s ease forwards 0.4s;
      opacity: 0;
      transform: translateY(30px);
    }

    .expertise-description {
      font-size: 1.125rem;
      color: #6b7280;
      margin-bottom: 24px;
      max-width: 600px;
      margin-left: auto;
      margin-right: auto;
      animation: slideInUp 0.8s ease forwards 0.6s;
      opacity: 0;
      transform: translateY(30px);
    }

    .expertise-divider {
      width: 100px;
      height: 4px;
      background: linear-gradient(135deg, #499974, #6d83d5);
      border-radius: 2px;
      margin: 0 auto;
      animation: slideInUp 0.8s ease forwards 0.8s;
      opacity: 0;
      transform: translateY(30px);
    }

    /* Background Animations */
    .expertise-particles {
      position: absolute;
      inset: 0;
      overflow: hidden;
    }

    .expertise-particles .particle {
      position: absolute;
      background: linear-gradient(135deg, #499974, #6d83d5);
      border-radius: 50%;
      animation: floatParticle 8s ease-in-out infinite;
      opacity: 0.1;
    }

    .expertise-particles .particle-1 {
      width: 20px;
      height: 20px;
      top: 20%;
      left: 10%;
      animation-delay: 0s;
    }

    .expertise-particles .particle-2 {
      width: 15px;
      height: 15px;
      top: 60%;
      left: 80%;
      animation-delay: 2s;
    }

    .expertise-particles .particle-3 {
      width: 25px;
      height: 25px;
      top: 80%;
      left: 20%;
      animation-delay: 4s;
    }

    .expertise-particles .particle-4 {
      width: 18px;
      height: 18px;
      top: 30%;
      left: 70%;
      animation-delay: 6s;
    }

    .expertise-particles .particle-5 {
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
      background: linear-gradient(135deg, rgba(73, 153, 116, 0.1), rgba(109, 131, 213, 0.05));
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

    /* Expertise Grid */
    .expertise-grid-container {
      animation: fadeInUp 0.8s ease forwards 1s;
      opacity: 0;
      transform: translateY(30px);
    }

    .expertise-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
      gap: 32px;
    }

    .expertise-card {
      background: white;
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      transition: all 0.3s ease;
      animation: fadeInUp 0.8s ease forwards;
      opacity: 0;
      transform: translateY(30px);
    }

    .expertise-card:hover {
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
      transition: transform 0.5s ease;
    }

    .expertise-card:hover .card-image {
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

    .expertise-card:hover .card-overlay {
      opacity: 1;
    }

    .overlay-icon {
      width: 60px;
      height: 60px;
      background: rgba(255, 255, 255, 0.9);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #499974;
      font-size: 24px;
    }

    .card-content {
      padding: 24px;
    }

    .card-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 16px;
    }

    .card-title {
      font-size: 20px;
      font-weight: 700;
      color: #1f2937;
      margin: 0;
    }

    .card-indicator {
      width: 8px;
      height: 8px;
      background: linear-gradient(135deg, #499974, #6d83d5);
      border-radius: 50%;
      animation: pulse 2s ease-in-out infinite;
    }

    .card-description {
      font-size: 14px;
      color: #6b7280;
      margin-bottom: 20px;
      line-height: 1.6;
    }

    .services-list {
      display: flex;
      flex-direction: column;
      gap: 12px;
    }

    .service-item {
      display: flex;
      align-items: center;
      gap: 12px;
      padding: 8px 0;
    }

    .service-icon {
      width: 20px;
      height: 20px;
      background: linear-gradient(135deg, #499974, #6d83d5);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      font-size: 10px;
      flex-shrink: 0;
    }

    .service-item span {
      font-size: 14px;
      color: #374151;
      font-weight: 500;
    }

    /* Keyframes */
    @keyframes fadeInUp {
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @keyframes slideInUp {
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @keyframes floatParticle {
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

    @keyframes pulse {
      0%, 100% {
        opacity: 1;
        transform: scale(1);
      }
      50% {
        opacity: 0.7;
        transform: scale(1.2);
      }
    }

    /* Responsive */
    @media (max-width: 768px) {
      .expertise-title {
        font-size: 2rem;
      }
      
      .expertise-grid {
        grid-template-columns: 1fr;
      }
      
      .expertise-card {
        margin-bottom: 24px;
      }
    }

    @keyframes slideInLeft {
      0% { opacity: 0; transform: translateX(-50px); }
      100% { opacity: 1; transform: translateX(0); }
    }
    @keyframes slideInRight {
      0% { opacity: 0; transform: translateX(50px); }
      100% { opacity: 1; transform: translateX(0); }
    }
    .slide-left { animation: slideInLeft 0.8s ease forwards; }
    .slide-right { animation: slideInRight 0.8s ease forwards; }
  </style>
  
  <section class="section bg-gradient-to-b from-gray-50 via-white to-gray-100 py-16">
    <div class="container mx-auto px-6">
      
      <!-- Section Title -->
      <div class="text-center mb-16">
        <h2 class="text-4xl md:text-5xl font-extrabold mb-4 
                   bg-gradient-to-r from-green-600 via-blue-500 to-teal-500 
                   bg-clip-text text-transparent animate-gradient">
          Detailed Sector Analysis
        </h2>
        <p class="section-subtitle text-gray-600 text-lg">
          In-depth insights into each sector's market dynamics and our specialized services
        </p>
      </div>
  
      @foreach($featuredSectors as $index => $sector)
        @php
          $isEven = $index % 2 === 0;
        @endphp
  
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center mb-24 scroll-fade">
  
          @if($isEven)
            {{-- Description Left --}}
            <div class="scroll-slide-left">
              <h3 class="text-3xl font-bold mb-6 text-gray-800">{{ $sector->title }}</h3>
              <p class="text-gray-600 mb-6 leading-relaxed">{{ $sector->description }}</p>
  
              <div class="space-y-4">
                <div class="flex items-start group hover:translate-x-2 transition-transform duration-300 scroll-fade">
                  <div class="w-8 h-8 bg-gradient-to-br from-gray-300 via-[#4d7dd9] to-gray-500 rounded-full flex items-center justify-center mr-3 mt-1 shadow-md">
                    <svg class="w-4 h-4 text-white animate-bounce" fill="currentColor" viewBox="0 0 20 20">
                      <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 
                            01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 
                            011.414 0z" clip-rule="evenodd"></path>
                    </svg>
                  </div>
                  <div>
                    <h4 class="font-semibold mb-1">Vessel Sizes</h4>
                    <p class="text-sm text-gray-600">{{ $sector->vessel_sizes }}</p>
                  </div>
                </div>
                <div class="flex items-start group hover:translate-x-2 transition-transform duration-300 scroll-fade">
                  <div class="w-8 h-8 bg-gradient-to-br from-gray-300 via-[#4d7dd9] to-gray-500 rounded-full flex items-center justify-center mr-4 mt-1 shadow-md">
                    <svg class="w-4 h-4 text-white animate-bounce" fill="currentColor" viewBox="0 0 20 20">
                      <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 
                            01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 
                            011.414 0z" clip-rule="evenodd"></path>
                    </svg>
                  </div>
                  <div>
                    <h4 class="font-semibold mb-1">Cargo Types</h4>
                    <p class="text-sm text-gray-600">{{ $sector->cargo_types }}</p>
                  </div>
                </div>
                <div class="flex items-start group hover:translate-x-2 transition-transform duration-300 scroll-fade">
                  <div class="w-8 h-8 bg-gradient-to-br from-gray-300 via-[#4d7dd9] to-gray-500 rounded-full flex items-center justify-center mr-4 mt-1 shadow-md">
                    <svg class="w-4 h-4 text-white animate-bounce" fill="currentColor" viewBox="0 0 20 20">
                      <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 
                            01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 
                            011.414 0z" clip-rule="evenodd"></path>
                    </svg>
                  </div>
                  <div>
                    <h4 class="font-semibold mb-1">Our Services</h4>
                    <p class="text-sm text-gray-600">{{ $sector->services }}</p>
                  </div>
                </div>
              </div>
            </div>
  
            {{-- Image Right --}}
            <div class="bg-gradient-to-tr from-gray-200 to-gray-300 h-80 rounded-xl shadow-lg flex items-center justify-center scroll-slide-right hover:scale-105 transform transition duration-500">
              @if($sector->image)
                <img src="{{ asset('storage/' . $sector->image) }}" alt="{{ $sector->title }}" class="rounded-lg w-full h-full object-cover" />
              @else
                <img src="https://maritime-executive.com/media/images/article/Photos/Vessels_Large/Emerald-Putuo.0a611b.jpg" alt="{{ $sector->title }}" class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-500">
              @endif
            </div>
  
          @else
            {{-- Image Left --}}
            <div class="bg-gradient-to-tr from-gray-200 to-gray-300 h-80 rounded-xl shadow-lg flex items-center justify-center scroll-slide-left hover:scale-105 transform transition duration-500">
              @if($sector->image)
                <img src="{{ asset('storage/' . $sector->image) }}" alt="{{ $sector->title }}" class="rounded-lg w-full h-full object-cover" />
              @else
                <img src="https://maritime-executive.com/media/images/article/Photos/Vessels_Large/Emerald-Putuo.0a611b.jpg" alt="{{ $sector->title }}" class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-500">
              @endif
            </div>
  
            {{-- Description Right --}}
            <div class="scroll-slide-right">
              <h3 class="text-3xl font-bold mb-6 text-gray-800">{{ $sector->title }}</h3>
              <p class="text-gray-600 mb-6 leading-relaxed">{{ $sector->description }}</p>
  
              <div class="space-y-4">
                <div class="flex items-start group hover:translate-x-2 transition-transform duration-300 scroll-fade">
                  <div class="w-8 h-8 bg-gradient-to-br from-gray-300 via-[#4d7dd9] to-gray-500 rounded-full flex items-center justify-center mr-3 mt-1 shadow-md">
                    <svg class="w-4 h-4 text-white animate-bounce" fill="currentColor" viewBox="0 0 20 20">
                      <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 
                            01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 
                            011.414 0z" clip-rule="evenodd"></path>
                    </svg>
                  </div>
                  <div>
                    <h4 class="font-semibold mb-1">Vessel Sizes</h4>
                    <p class="text-sm text-gray-600">{{ $sector->vessel_sizes }}</p>
                  </div>
                </div>
                <div class="flex items-start group hover:translate-x-2 transition-transform duration-300 scroll-fade">
                  <div class="w-8 h-8 bg-gradient-to-br from-gray-300 via-[#4d7dd9] to-gray-500 rounded-full flex items-center justify-center mr-4 mt-1 shadow-md">
                    <svg class="w-4 h-4 text-white animate-bounce" fill="currentColor" viewBox="0 0 20 20">
                      <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 
                            01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 
                            011.414 0z" clip-rule="evenodd"></path>
                    </svg>
                  </div>
                  <div>
                    <h4 class="font-semibold mb-1">Cargo Types</h4>
                    <p class="text-sm text-gray-600">{{ $sector->cargo_types }}</p>
                  </div>
                </div>
                <div class="flex items-start group hover:translate-x-2 transition-transform duration-300 scroll-fade">
                  <div class="w-8 h-8 bg-gradient-to-br from-gray-300 via-[#4d7dd9] to-gray-500 rounded-full flex items-center justify-center mr-4 mt-1 shadow-md">
                    <svg class="w-4 h-4 text-white animate-bounce" fill="currentColor" viewBox="0 0 20 20">
                      <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 
                            01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 
                            011.414 0z" clip-rule="evenodd"></path>
                    </svg>
                  </div>
                  <div>
                    <h4 class="font-semibold mb-1">Our Services</h4>
                    <p class="text-sm text-gray-600">{{ $sector->services }}</p>
                  </div>
                </div>
              </div>
            </div>
          @endif
  
        </div>
      @endforeach
    </div>
  </section>
  

  <!-- JS for scroll animation -->
  <script>
    document.addEventListener("DOMContentLoaded", () => {
      // Original fade-up animation
      const faders = document.querySelectorAll(".fade-up");
      const appearOptions = {
        threshold: 0.2,
        rootMargin: "0px 0px -50px 0px"
      };
      const appearOnScroll = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
          if (!entry.isIntersecting) return;
          entry.target.classList.add("show");
          observer.unobserve(entry.target);
        });
      }, appearOptions);
      faders.forEach(fader => {
        appearOnScroll.observe(fader);
      });

      // New scroll animations
      const scrollElements = document.querySelectorAll('.scroll-fade, .scroll-slide-left, .scroll-slide-right, .scroll-scale');
      const scrollOptions = {
        threshold: 0.1,
        rootMargin: "0px 0px -100px 0px"
      };

      const scrollObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            entry.target.classList.add('show');
            observer.unobserve(entry.target);
          }
        });
      }, scrollOptions);

      scrollElements.forEach(element => {
        scrollObserver.observe(element);
      });

      // Moving grid animation control
      const movingGrid = document.querySelector('.moving-grid');
      if (movingGrid) {
        const container = movingGrid.querySelector('.moving-grid-container');
        
        // Pause on hover
        movingGrid.addEventListener('mouseenter', () => {
          container.style.animationPlayState = 'paused';
        });
        
        movingGrid.addEventListener('mouseleave', () => {
          container.style.animationPlayState = 'running';
        });

        // Pause on focus for accessibility
        movingGrid.addEventListener('focus', () => {
          container.style.animationPlayState = 'paused';
        });
      }
    });
  </script>

    <!-- Market Statistics -->
    <section class="section bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-extrabold mb-6 
                        bg-gradient-to-r from-[#499974] via-[#6d83d5] to-[#33978d] 
                        bg-clip-text text-transparent">Sector Market Statistics</h2>
                <p class="section-subtitle">
                    Key metrics and insights across major maritime sectors
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="card text-center scroll-scale">
                    <div class="text-4xl font-bold text-primary-color mb-2">2,500+</div>
                    <h3 class="text-lg font-semibold mb-2">Dry Bulk Vessels</h3>
                    <p class="text-gray-600">Handled in transactions</p>
                </div>
                
                <div class="card text-center scroll-scale">
                    <div class="text-4xl font-bold text-primary-color mb-2">1,800+</div>
                    <h3 class="text-lg font-semibold mb-2">Tanker Deals</h3>
                    <p class="text-gray-600">Completed successfully</p>
                </div>
                
                <div class="card text-center scroll-scale">
                    <div class="text-4xl font-bold text-primary-color mb-2">950+</div>
                    <h3 class="text-lg font-semibold mb-2">Container Ships</h3>
                    <p class="text-gray-600">Chartered annually</p>
                </div>
                
                <div class="card text-center scroll-scale">
                    <div class="text-4xl font-bold text-primary-color mb-2">500+</div>
                    <h3 class="text-lg font-semibold mb-2">Specialized Vessels</h3>
                    <p class="text-gray-600">Expert consultations</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="section bg-primary-color text-white">
        <div class="container mx-auto px-4 text-center">
            <div class="fade-in">
                <h2 class="text-4xl font-bold mb-6">Ready to Explore Our Sectors?</h2>
                <p class="text-xl mb-8 opacity-90 max-w-2xl mx-auto">
                    Discover how our sector expertise can benefit your maritime operations 
                    and help you navigate complex market dynamics.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('services') }}" class="btn-primary bg-gray-800 text-lg px-8 py-4 transform scale-105 ">
                        Our Services
                    </a>
                    <a href="{{ route('contact') }}" class="border-2 border-white text-white px-8 py-4 rounded-lg font-semibold hover:bg-white hover:text-gray-800 transition-colors">
                        Get in Touch
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection

