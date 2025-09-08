@extends('layouts.app')

@section('title', 'Sectors We Serve - SMA Ship Brokers')
@section('description', 'Explore the maritime sectors we serve including Dry Bulk Carriers, Tankers, General Cargo, Container Ships, and Offshore Service Vessels.')

@section('content')
    <!-- Sectors We Serve Hero Section with Particles -->
    <section class="relative py-20 bg-gradient-to-br from-primary-color to-primary-dark text-white overflow-hidden">
        <!-- Canvas for particles -->
        <canvas id="particles" class="absolute inset-0 z-0"></canvas>

        <!-- Content -->
        <div class="container mx-auto px-4 text-center relative z-10">
            <div class="fade-in">
                <h1 class="text-5xl md:text-6xl font-bold mb-6">Sectors We Serve</h1>
                <p class="text-xl md:text-2xl opacity-90 max-w-3xl mx-auto">
                    Comprehensive maritime services across all major shipping sectors
                </p>
                @if(isset($stats) && $stats['total_sectors'] > 0)
                <div class="mt-8 flex flex-wrap justify-center gap-8 text-center">
                    <div class="bg-white bg-opacity-20 rounded-lg p-4">
                        <div class="text-3xl font-bold">{{ $stats['total_sectors'] }}+</div>
                        <div class="text-sm opacity-90">Sectors Served</div>
                    </div>
                    <div class="bg-white bg-opacity-20 rounded-lg p-4">
                        <div class="text-3xl font-bold">{{ $stats['active_sectors'] }}</div>
                        <div class="text-sm opacity-90">Active Sectors</div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </section>

    <style>
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

  <!-- Expertise Grid Section -->
  <section class="section bg-white py-20">
    <div class="container mx-auto px-4">
      <!-- Heading -->
      <div class="text-center mb-16">
        <h2 class="text-4xl font-extrabold mb-6 
                   bg-gradient-to-r from-[#499974] via-[#6d83d5] to-[#33978d] 
                   bg-clip-text text-transparent">Our Expertise Across Maritime Sectors</h2>
        <p class="section-subtitle text-gray-600 text-lg max-w-2xl mx-auto">
          From dry bulk to specialized vessels, we provide expert services across all major shipping sectors
        </p>
      </div>

      <!-- Moving Grid -->
      <div class="moving-grid">
        <div class="moving-grid-container">
          @if(isset($featuredSectors) && $featuredSectors->count() > 0)
              @foreach($featuredSectors as $sector)
              <div class="moving-grid-item">
                  <div class="h-50 w-50 card group scroll-fade">
                      @if($sector->image)
                          <img src="{{ asset('storage/' . $sector->image) }}" alt="{{ $sector->title }}" class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-500">
                      @else
                          <img src="https://maritime-executive.com/media/images/article/Photos/Vessels_Large/Emerald-Putuo.0a611b.jpg" alt="{{ $sector->title }}" class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-500">
                      @endif
                      <div class="p-6 text-center">
                          <h3 class="text-2xl font-bold mb-4">{{ $sector->title }}</h3>
                          <p class="text-gray-600 mb-6">
                              {{ $sector->description }}
                          </p>
                          @if($sector->services)
                              <ul class="text-left space-y-2 text-sm text-gray-600">
                                  @foreach(explode(',', $sector->services) as $service)
                                      <li>• {{ trim($service) }}</li>
                                  @endforeach
                              </ul>
                          @endif
                      </div>
                  </div>
              </div>
              @endforeach
              
          @else
              <!-- Fallback static content if no sectors exist -->
          @endif
        </div>
      </div>
    </div>
  </section>

  <style>
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

