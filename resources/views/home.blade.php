@extends('layouts.app')

@section('title', 'SMA Ship Brokers - Leading Maritime Solutions')
@section('description', 'SMA Ship Brokers is a leading maritime services company specializing in ship chartering, sale & purchase, valuation, and marine services worldwide.')

@section('content')
    
    <!-- Hero Section -->
    <section class="relative min-h-screen flex flex-col items-center justify-center overflow-hidden">
        <!-- Background Video -->
        {{-- @if($heroSection && $heroSection->background_video)
            <div class="absolute inset-0 z-0">
                <video autoplay muted loop playsinline class="w-full h-full object-cover">
                    <source src="{{ asset('storage/' . $heroSection->background_video) }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
        @endif --}}

        <!-- Gradient Overlay -->
        <div class="absolute inset-0 bg-gradient-to-br from-primary-color to-primary-dark opacity-90 z-0 animate-gradient"></div>

        <!-- Content -->
        <div class="relative z-20 container mx-auto px-4 text-center text-white pt-20 fade-text">
            <h1 class="hero-title text-4xl md:text-7xl font-bold mb-6 leading-tight opacity-0 transform scale-95">
                @if($heroSection)
                    {!! $heroSection->title !!}
                    @if($heroSection->accent_text)
                        <span class="text-accent-color glow-text">{!! $heroSection->accent_text !!}</span>
                    @endif
                @else
                    Leading Maritime
                    <span class="text-accent-color glow-text">Solutions</span>
                @endif
            </h1>
            <p class="hero-subtitle text-lg md:text-2xl mb-8 max-w-3xl mx-auto opacity-0 transform translate-y-6">
                @if($heroSection && $heroSection->hero_description)
                    {!! $heroSection->hero_description !!}
                @else
                    SMA Ship Brokers delivers comprehensive maritime services including ship chartering, 
                    sale & purchase, valuation, and marine services worldwide.
                @endif
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center hero-buttons opacity-0 transform translate-y-6">
                @if($heroSection && $heroSection->button_text)
                    <a href="{{ $heroSection->button_url ?? route('contact') }}" class="btn-primary text-lg px-8 py-4 hover:scale-105 transition transform duration-300 shadow-lg">
                        {{ $heroSection->button_text }}
                    </a>
                @else
                    <a href="{{ route('contact') }}" class="btn-primary text-lg px-8 py-4 hover:scale-105 transition transform duration-300 shadow-lg">
                        Request a Quote
                    </a>
                @endif
                
                @if($heroSection && $heroSection->secondary_button_text)
                    <a href="{{ $heroSection->secondary_button_url ?? route('contact') }}" class="border-2 border-white text-white px-8 py-4 rounded-lg font-semibold hover:bg-white hover:text-gray-800 transition-colors">
                        {{ $heroSection->secondary_button_text }}
                    </a>
                @else
                    <a href="{{ route('contact') }}" class="border-2 border-white text-white px-8 py-4 rounded-lg font-semibold hover:bg-white hover:text-gray-800 transition-colors">
                        Contact Us
                    </a>
                @endif
            </div>
        </div>

        <!-- Fallback Video (if no background video) -->
        @if($heroSection && $heroSection->background_video)
            <div class="video-container relative overflow-hidden rounded-3xl shadow-2xl z-10 mx-auto">
                <video autoplay muted loop playsinline class="video-zoom object-cover">
                    <source src="{{ asset('storage/' . $heroSection->background_video) }}" type="video/mp4">
                    {{-- <source src="/images/ship.mp4" type="video/mp4"> --}}
                    Your browser does not support the video tag.
                </video>
            </div>
        @endif
    </section>

    <style>
        /* Video Container */
        .video-container {
            width: 90%;
            max-width: 900px;
            aspect-ratio: 16/9;
            border-radius: 24px;
            margin-top: 80px;
            transition: all 0.8s ease;
        }
        .video-zoom {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Gradient Animation */
        @keyframes gradientMove {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        .animate-gradient {
            background-size: 200% 200%;
            animation: gradientMove 8s ease infinite;
        }

        /* Glow Effect on Accent Text */
        .glow-text {
            animation: glowing 2s infinite alternate ease-in-out;
        }
        @keyframes glowing {
            from { text-shadow: 0 0 5px #ffae00ff, 0 0 10px #ff9900ff, 0 0 20px #ffae00ff; }
            to { text-shadow: 0 0 10px #ffae00ff, 0 0 20px #ffae00ff, 0 0 40px #ffae00ff; }
        }

        /* Services Horizontal Scrolling */
        .services-scroll-container {
            overflow-x: auto;
            overflow-y: hidden;
            padding: 20px 0;
            margin: 0 -20px;
            padding-left: 20px;
            padding-right: 20px;
        }

        .services-scroll-wrapper {
            display: flex;
            gap: 70px;
            width: max-content;
        }

        .service-card {
            min-width: 320px;
            width: 320px;
            flex-shrink: 0;
            transform: translateY(50px);
            opacity: 0;
            animation: slideUp 0.8s ease forwards;
        }

        .service-card:nth-child(1) { animation-delay: 0.1s; }
        .service-card:nth-child(2) { animation-delay: 0.2s; }
        .service-card:nth-child(3) { animation-delay: 0.3s; }
        .service-card:nth-child(4) { animation-delay: 0.4s; }
        .service-card:nth-child(5) { animation-delay: 0.5s; }
        .service-card:nth-child(6) { animation-delay: 0.6s; }

        @keyframes slideUp {
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        /* Custom Scrollbar Styling */
        .services-scroll-container::-webkit-scrollbar {
            height: 8px;
        }

        .services-scroll-container::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
        }

        .services-scroll-container::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, #499974, #6d83d5, #33978d);
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .services-scroll-container::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(135deg, #5aa984, #7d93e5, #43a79d);
        }

        /* Firefox Scrollbar */
        .services-scroll-container {
            scrollbar-width: thin;
            scrollbar-color: #7a8f852b rgba(255, 255, 255, 0.1);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .service-card {
                min-width: 280px;
                width: 280px;
            }

            .services-scroll-container {
                margin: 0 -16px;
                padding-left: 16px;
                padding-right: 16px;
            }

            .services-scroll-wrapper {
                gap: 24px;
            }
        }

        @media (max-width: 480px) {
            .service-card {
                min-width: 260px;
                width: 260px;
            }

            .services-scroll-wrapper {
                gap: 20px;
            }
        }
        
        /* Hero section responsive */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem !important;
                line-height: 1.2;
            }
            
            .hero-subtitle {
                font-size: 1.1rem !important;
                margin-bottom: 2rem;
            }
            
            .hero-buttons {
                flex-direction: column;
                gap: 1rem;
            }
            
            .hero-buttons .btn-primary {
                width: 100%;
                text-align: center;
                padding: 1rem 2rem;
                font-size: 1rem;
            }
        }
        
        @media (max-width: 480px) {
            .hero-title {
                font-size: 2rem !important;
            }
            
            .hero-subtitle {
                font-size: 1rem !important;
            }
            
            .service-card {
                min-width: 240px;
                width: 240px;
                padding: 1.5rem;
            }
            
            .service-card h3 {
                font-size: 1.25rem;
            }
            
            .service-card p {
                font-size: 0.9rem;
            }
        }

        /* Smooth scrolling */
        .services-scroll-container {
            scroll-behavior: smooth;
        }

    </style>

    <script>
        gsap.registerPlugin(ScrollTrigger);

        // Fade-in text with stagger
        gsap.timeline()
            .to(".hero-title", { opacity: 1, scale: 1, duration: 1, ease: "power3.out" })
            .to(".hero-subtitle", { opacity: 1, y: 0, duration: 0.8, ease: "power3.out" }, "-=0.5")
            .to(".hero-buttons", { opacity: 1, y: 0, duration: 0.8, ease: "power3.out" }, "-=0.4");

        // Scroll Animation for Video and Text
        gsap.timeline({
            scrollTrigger: {
                trigger: ".video-container",
                start: "top center",
                end: "bottom top",
                scrub: true
            }
        })
        .to(".video-container", {
            width: "100%",
            maxWidth: "1200px",
            borderRadius: "0px",
            ease: "power2.out"
        }, 0)
        .to(".fade-text", {
            opacity: 0,
            ease: "power1.out"
        }, 0);
    </script>


<!-- Services Overview -->
<section id="services-overview" class="py-20 relative z-10">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16 fade-in-up">
            <h2 class="text-4xl font-extrabold mb-6 
                    bg-gradient-to-r from-[#499974] via-[#6d83d5] to-[#33978d] 
                    bg-clip-text text-transparent">Our Services</h2>
            <p class="text-xl opacity-90 max-w-3xl mx-auto text-blue-50">
                Comprehensive maritime solutions tailored to meet your shipping and trading needs
            </p>
        </div>
        
        <!-- Horizontal Scrolling Services Container -->
        <div class="services-scroll-container">
            <div class="services-scroll-wrapper">
                @forelse($services as $service)
                    <div class="service-card bg-white bg-opacity-10 backdrop-blur-md p-8 rounded-xl hover:bg-opacity-20 transition-all">
                        @if($service->icon)
                            <div class="w-16 h-16 bg-gradient-to-br from-[#0dd3f3] to-[#6b6c00] rounded-lg flex items-center justify-center mb-6 mx-auto">
                                <i class="{{ $service->icon }} text-white text-2xl"></i>
                            </div>
                        @else
                            <div class="w-16 h-16 bg-gradient-to-br from-[#0dd3f3] to-[#6b6c00] rounded-lg flex items-center justify-center mb-6 mx-auto">
                                <i class="fas fa-ship text-white text-2xl"></i>
                            </div>
                        @endif
                        <h3 class="text-2xl font-bold mb-4 text-center text-blue-100">{{ $service->name }}</h3>
                        <p class="text-center opacity-90 text-blue-100 service-description" data-full-text="{{ $service->description }}">
                            {{ Str::limit($service->description, 120) }}
                        </p>
                        @if(strlen($service->description) > 120)
                            <div class="text-center mt-4">
                                <a href="{{ route('services.details', $service) }}" 
                                   class="text-blue-100 hover:text-yellow-300 font-semibold text-sm learn-more-btn">
                                    Learn More →
                                </a>
                            </div>
                        @endif
                    </div>
                @empty
                    
                @endforelse
            </div>
        </div>
    </div>
</section>

<!-- Company Highlights -->
<section id="highlights" class="py-20 relative z-10">
    <div class="container mx-auto px-4">
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="text-center fade-in-up">
                <div class="text-5xl font-bold text-blue-400 mb-2 counter" data-target="{{ $highlights['years_experience'] }}">0</div>
                <p class="text-xl text-blue-100">Years Experience</p>
            </div>
            <div class="text-center fade-in-up">
                <div class="text-5xl font-bold text-blue-400 mb-2 counter" data-target="{{ $highlights['deals_completed'] }}">0</div>
                <p class="text-xl text-blue-100">Deals Completed</p>
            </div>
            <div class="text-center fade-in-up">
                <div class="text-5xl font-bold text-blue-400 mb-2 counter" data-target="{{ $highlights['global_partners'] }}">0</div>
                <p class="text-xl text-blue-100">Global Partners</p>
            </div>
            <div class="text-center fade-in-up">
                <div class="text-5xl font-bold text-blue-400 mb-2 counter" data-target="{{ $highlights['countries_served'] }}">0</div>
                <p class="text-xl text-blue-100">Countries Served</p>
            </div>
        </div>
    </div>
</section>

    <style>
        /* Sectors Grid Styles */
        .sectors-grid-container {
            position: relative;
            padding: 0 20px;
        }

        .sectors-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 30px;
            max-width: 1400px;
            margin: 0 auto;
        }

        .sector-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            overflow: hidden;
            transition: all 0.3s ease;
            opacity: 0;
            transform: translateY(30px);
            animation: fadeInUp 0.8s ease forwards;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        }

        .sector-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
            border-color: rgba(73, 153, 116, 0.5);
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

        .sector-card:hover .card-image {
            transform: scale(1.05);
        }

        .card-content {
            padding: 24px;
            color: white;
        }

        .card-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 16px;
        }

        .card-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: #e2e8f0;
            margin: 0;
        }

        .card-indicator {
            width: 8px;
            height: 8px;
            background: linear-gradient(135deg, #499974, #6d83d5);
            border-radius: 50%;
            animation: pulse 2s infinite;
        }

        .card-description {
            color: #cbd5e1;
            line-height: 1.6;
            margin-bottom: 20px;
            font-size: 0.95rem;
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
            width: 24px;
            height: 24px;
            background: linear-gradient(135deg, #499974, #6d83d5);
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .service-icon i {
            font-size: 12px;
            color: white;
        }

        .service-item span {
            color: #e2e8f0;
            font-size: 0.9rem;
            font-weight: 500;
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes pulse {
            0%, 100% {
                opacity: 1;
                transform: scale(1);
            }
            50% {
                opacity: 0.7;
                transform: scale(1.1);
            }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .sectors-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }
            
            .sectors-grid-container {
                padding: 0 16px;
            }
            
            .card-content {
                padding: 20px;
            }
            
            .card-title {
                font-size: 1.25rem;
            }
            
            .card-description {
                font-size: 0.9rem;
            }
        }

        @media (max-width: 480px) {
            .sectors-grid {
                grid-template-columns: 1fr;
                gap: 16px;
            }
            
            .sectors-grid-container {
                padding: 0 12px;
            }
            
            .card-image-container {
                height: 180px;
            }
            
            .card-content {
                padding: 16px;
            }
            
            .card-title {
                font-size: 1.1rem;
            }
            
            .card-description {
                font-size: 0.85rem;
            }
            
            .service-item span {
                font-size: 0.85rem;
            }
        }
    </style>
   
    <!-- Featured Sectors -->
    <section id="sectors" class="py-20 relative z-10">
        <style>
            .vessel-card {
                width: 100%;
                height: 310px;
                border-radius: 25px;
                overflow: hidden;
                box-shadow: 20px 20px 50px rgba(0, 0, 0, 0.8);
                backdrop-filter: blur(5px);
                position: relative;
                display: flex;
                align-items: center;
                justify-content: center;
                text-align: center;
                transition: 0.5s;
            }
    
            .vessel-card::before {
                content: "";
                position: absolute;
                inset: 0;
                background-image: var(--bg-image);
                background-size: cover;
                background-position: center;
                opacity: 0.7;
                z-index: -1;
            }
    
            .vessel-card:hover::before {
                opacity: 0.2;
            }
    
            .vessel-card .content {
                padding: 20px;
                transform: translateY(200px);
                opacity: 0;
                transition: 0.8s all ease;
                color: #fff;
            }
    
            .vessel-card:hover .content {
                transform: translateY(0);
                opacity: 1;
            }
    
            .vessel-card .title {
                font-size: 1.5rem;
                margin-bottom: 10px;
            }
    
            .vessel-card .copy {
                font-size: 1rem;
                line-height: 1.5;
            }
    
            .vessel-card .btn {
                display: inline-block;
                margin-top: 20px;
                padding: 8px 30px;
                border: 2px solid #fff;
                color: #fff;
                text-transform: uppercase;
                border-radius: 50px;
                text-decoration: none;
                transition: 0.3s;
            }
    
            .vessel-card .btn:hover {
                background: linear-gradient(to bottom right, #0dd3f3, #6b6c00);
            }
    
            /* Grid container */
            .sectors-grid-container {
                display: flex;
                justify-content: center;
            }
    
            .sectors-grid {
                display: grid;
                grid-template-columns: repeat(3, 1fr);
                gap: 2rem;
                width: 100%;
                max-width: 1440px;
            }
    
            @media (max-width: 1024px) {
                .sectors-grid {
                    grid-template-columns: repeat(2, 1fr);
                }
            }
    
            @media (max-width: 768px) {
                .sectors-grid {
                    grid-template-columns: 1fr;
                }
            }
        </style>
    
        <div class="container mx-auto px-4">
            <div class="text-center mb-16 fade-in-up">
                <h2 class="text-4xl font-extrabold mb-6 
                    bg-gradient-to-r from-[#499974] via-[#6d83d5] to-[#33978d] 
                    bg-clip-text text-transparent">
                    Our Expertise Across Maritime Sectors
                </h2>
                <p class="text-xl opacity-90 max-w-3xl mx-auto text-blue-100">
                    Discover our specialized knowledge and services across key maritime industries
                </p>
            </div>
    
            <div class="sectors-grid-container">
                <div class="sectors-grid">
                    @forelse($featuredSectors as $sector)
                        <div class="vessel-card" style="--bg-image:url('{{ $sector->image ? asset('storage/' . $sector->image) : 'https://maritime-executive.com/media/images/article/Photos/Vessels_Large/Emerald-Putuo.0a611b.jpg' }}')">
                            <div class="content">
                                <h3 class="title">{{ $sector->title }}</h3>
                                <p class="copy">{{ $sector->description }}</p>
                                <a href="{{ route('sectors') }}" class="btn">View Details</a>
                            </div>
                        </div>
                    @empty
                        <p class="text-center text-gray-400">No sectors available at the moment.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </section>
    
    
    {{-- <!-- Testimonials -->
    <section id="testimonials" class="py-20 relative z-10">
        <div class="container mx-auto px-4">
          <!-- Title -->
          <div class="text-center mb-16 fade-in-up">
            <h2 class="text-4xl font-extrabold mb-6 
                bg-gradient-to-r from-[#499974] via-[#6d83d5] to-[#33978d] 
                bg-clip-text text-transparent">
              Client Testimonials
            </h2>
            <p class="text-xl opacity-90 max-w-3xl mx-auto text-blue-50">
              Hear what our global clients say about our maritime services
            </p>
          </div>
      
          <!-- Wrapper -->
          <div class="relative max-w-3xl mx-auto">
            <!-- Testimonials -->
            <div id="testimonialWrapper" class="relative overflow-hidden">
              @forelse($testimonials as $index => $testimonial)
                  <div class="testimonial-card {{ $index === 0 ? '' : 'hidden' }} bg-white bg-opacity-10 backdrop-blur-md p-8 rounded-xl transition-all duration-500 ease-in-out">
                      <div class="flex items-center mb-4">
                          <div class="w-12 h-12 bg-blue-600 rounded-full flex items-center justify-center mr-4">
                              @if($testimonial->client_image)
                                  <img src="{{ asset('storage/' . $testimonial->client_image) }}" alt="{{ $testimonial->client_name }}" class="w-12 h-12 rounded-full object-cover">
                              @else
                                  <i class="fas fa-user text-white"></i>
                              @endif
                          </div>
                          <div>
                              <h4 class="font-bold text-blue-100">{{ $testimonial->client_name }}</h4>
                              <p class="text-blue-400">{{ $testimonial->client_position }}</p>
                              @if($testimonial->company_name)
                                  <p class="text-blue-300 text-sm">{{ $testimonial->company_name }}</p>
                              @endif
                          </div>
                      </div>
                      <p class="opacity-90 text-blue-100">
                          "{{ $testimonial->testimonial }}"
                      </p>
                      @if($testimonial->rating)
                          <div class="mt-3 text-yellow-400">
                              {{ $testimonial->star_rating }}
                          </div>
                      @endif
                  </div>
              @empty
                <p class="text-center text-blue-200">No testimonials found.</p>
              @endforelse
            </div>
      
            <!-- Navigation -->
            <div class="flex justify-between items-center mt-10">
              <button id="prevBtn" class="px-5 py-2 rounded-full bg-white bg-opacity-20 text-blue-100 hover:bg-opacity-40 transition">
                ◀ Prev
              </button>
              <button id="nextBtn" class="px-5 py-2 rounded-full bg-white bg-opacity-20 text-blue-100 hover:bg-opacity-40 transition">
                Next ▶
              </button>
            </div>
          </div>
        </div>
      </section>
      
      <!-- Script -->
      <script>
        const testimonials = document.querySelectorAll("#testimonialWrapper .testimonial-card");
        let current = 0;
        let autoSlide;
      
        function showTestimonial(index) {
          testimonials.forEach((card, i) => {
            card.classList.add("hidden", "opacity-0");
            card.classList.remove("fade-in");
            if (i === index) {
              card.classList.remove("hidden", "opacity-0");
              setTimeout(() => card.classList.add("fade-in"), 50);
            }
          });
        }
      
        function nextTestimonial() {
          current = (current + 1) % testimonials.length;
          showTestimonial(current);
        }
      
        function prevTestimonial() {
          current = (current - 1 + testimonials.length) % testimonials.length;
          showTestimonial(current);
        }
      
        document.getElementById("nextBtn").addEventListener("click", () => {
          nextTestimonial();
          resetAutoSlide();
        });
      
        document.getElementById("prevBtn").addEventListener("click", () => {
          prevTestimonial();
          resetAutoSlide();
        });
      
        function startAutoSlide() {
          autoSlide = setInterval(nextTestimonial, 5000); // change every 5s
        }
      
        function resetAutoSlide() {
          clearInterval(autoSlide);
          startAutoSlide();
        }
      
        // Init
        showTestimonial(current);
        startAutoSlide();
      </script>
      
      <!-- CSS -->
      <style>
        .fade-in {
          animation: fadeIn 0.9s ease forwards;
        }
        @keyframes fadeIn {
          from {opacity: 0; transform: translateY(20px);}
          to {opacity: 1; transform: translateY(0);}
        }
      
        #testimonialWrapper {
          min-height: 250px; /* keeps height stable */
        }
      
        /* Responsive */
        @media (max-width: 768px) {
          #testimonialWrapper .testimonial-card {
            padding: 1.5rem;
          }
          
          #testimonialWrapper {
            min-height: 200px;
          }
          
          .testimonial-card .flex {
            flex-direction: column;
            text-align: center;
          }
          
          .testimonial-card .flex .mr-4 {
            margin-right: 0;
            margin-bottom: 1rem;
          }
        }
        
        @media (max-width: 480px) {
          #testimonialWrapper .testimonial-card {
            padding: 1rem;
          }
          
          #testimonialWrapper {
            min-height: 180px;
          }
          
          .testimonial-card h4 {
            font-size: 1rem;
          }
          
          .testimonial-card p {
            font-size: 0.9rem;
          }
          
          .testimonial-card .text-blue-400 {
            font-size: 0.85rem;
          }
          
          .testimonial-card .text-blue-300 {
            font-size: 0.8rem;
          }
          
          #prevBtn, #nextBtn {
            padding: 0.5rem 1rem;
            font-size: 0.8rem;
          }
        }
        
        @media (max-width: 360px) {
          #testimonialWrapper .testimonial-card {
            padding: 0.75rem;
          }
          
          .testimonial-card h4 {
            font-size: 0.9rem;
          }
          
          .testimonial-card p {
            font-size: 0.8rem;
          }
          
          #prevBtn, #nextBtn {
            padding: 0.4rem 0.8rem;
            font-size: 0.75rem;
          }
        }
      </style> --}}
      
    <!-- Vessel Services Section -->
    <section class="py-20 relative z-10 bg-gradient-to-br ">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16 fade-in-up">
                <h2 class="text-4xl font-extrabold mb-6 
                    bg-gradient-to-r from-[#499974] via-[#6d83d5] to-[#33978d] 
                    bg-clip-text text-transparent">Our Vessel Services</h2>
                <p class="text-xl opacity-90 max-w-3xl mx-auto text-blue-100">
                    Comprehensive vessel solutions tailored to your maritime business needs
                </p>
            </div>
            
            <div class="image-cards-container">
                <!-- Sale & Purchase Card -->
                <div class="image-card" onclick="window.location.href='{{ route('vessels') }}?form=snp'">
                    <img 
                        src="https://bdmlawllp.com/wp-content/uploads/2019/11/shutterstock_161663651-1080x675.jpg" 
                        alt="Vessel Sale & Purchase" 
                        class="card-image"
                    >
                    <div class="card-overlay">
                        <h3 class="overlay-title">Vessel Sale & Purchase</h3>
                        <p class="overlay-description">
                            Buy or sell vessels with our expert brokerage services. 
                            Find the perfect vessel for your maritime operations.
                        </p>
                        <button class="overlay-button">Get Started</button>
                    </div>
                </div>

                <!-- Chartering Card -->
                <div class="image-card" onclick="window.location.href='{{ route('vessels') }}?form=charter'">
                    <img 
                        src="https://www.atsinc.com/hs-fs/hubfs/Shipping-Vessel.jpg?width=960&height=540&name=Shipping-Vessel.jpg" 
                        alt="Vessel Chartering" 
                        class="card-image"
                    >
                    <div class="card-overlay">
                        <h3 class="overlay-title">Vessel Chartering</h3>
                        <p class="overlay-description">
                            Charter vessels for your cargo transportation needs. 
                            Flexible chartering solutions for all vessel types.
                        </p>
                        <button class="overlay-button">Get Started</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        /* Image Cards Styles */
        .image-cards-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
            gap: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .image-card {
            position: relative;
            height: 400px;
            border-radius: 20px;
            overflow: hidden;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .image-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
        }

        .card-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .image-card:hover .card-image {
            transform: scale(1.05);
        }

        .card-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(transparent, rgba(0, 0, 0, 0.8));
            color: white;
            padding: 2rem;
            transform: translateY(100%);
            transition: transform 0.3s ease;
        }

        .image-card:hover .card-overlay {
            transform: translateY(0);
        }

        .overlay-title {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 0.5rem;
            color: white;
        }

        .overlay-description {
            font-size: 1rem;
            line-height: 1.5;
            margin-bottom: 1rem;
            opacity: 0.9;
        }

        .overlay-button {
            background: linear-gradient(135deg, #499974, #6d83d5, #33978d);
            color: white;
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .overlay-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .image-cards-container {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }
            
            .image-card {
                height: 350px;
            }
            
            .card-overlay {
                padding: 1.5rem;
            }
            
            .overlay-title {
                font-size: 1.25rem;
            }
            
            .overlay-description {
                font-size: 0.9rem;
            }
        }

        @media (max-width: 480px) {
            .image-card {
                height: 300px;
            }
            
            .card-overlay {
                padding: 1rem;
            }
            
            .overlay-title {
                font-size: 1.1rem;
            }
            
            .overlay-description {
                font-size: 0.85rem;
            }
            
            .overlay-button {
                padding: 0.6rem 1.2rem;
                font-size: 0.9rem;
            }
        }
    </style>

    <!-- Contact Section -->
    <section id="contact" class="py-20 relative z-10">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16 fade-in-up">
            <h2 class="text-4xl font-extrabold mb-6 
                        bg-gradient-to-r from-[#499974] via-[#6d83d5] to-[#33978d] 
                        bg-clip-text text-transparent">Get In Touch</h2>
            <p class="text-xl opacity-90 max-w-3xl mx-auto text-blue-100">
                Ready to discuss your maritime needs? Contact our expert team today
            </p>
        </div>
        
        <div class="grid md:grid-cols-2 gap-12">
            <!-- Contact Information -->
            <div class="fade-in-up">
                <h3 class="text-2xl font-bold mb-8 text-blue-50">Contact Information</h3>
                
                <div class="space-y-6">
                    <!-- Phone -->
                    <div class="contact-info-item">
                        <div class="contact-icon">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 
                                      1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 
                                      1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 
                                      21 3 14.284 3 6V5z"></path>
                            </svg>
                        </div>
                        <h4 class="font-semibold mb-2 text-blue-50 text-xl">Phone</h4>
                        <p class="text-blue-100 text-lg">{{ $siteSettings->phone ?? '+971 4 123 4567' }}</p>
                        <p class="text-sm text-blue-200">Available 24/7</p>
                    </div>

                    <!-- Email -->
                    <div class="contact-info-item">
                        <div class="contact-icon">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M3 8l7.89 4.26a2 2 0 002.22 0L21 
                                      8M5 19h14a2 2 0 002-2V7a2 2 
                                      0 00-2-2H5a2 2 0 00-2 2v10a2 2 
                                      0 002 2z"></path>
                            </svg>
                        </div>
                        <h4 class="font-semibold mb-2 text-blue-50 text-xl">Email</h4>
                        <p class="text-blue-100 text-lg">{{ $siteSettings->email ?? 'info@globaltradehub.com' }}</p>
                        <p class="text-sm text-blue-200">Response within 24 hours</p>
                    </div>

                    <!-- WhatsApp -->
                    <div class="contact-info-item">
                        <div class="contact-icon">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M8 12h.01M12 12h.01M16 12h.01M21 
                                      12c0 4.418-4.03 8-9 8a9.863 
                                      9.863 0 01-4.255-.949L3 
                                      20l1.395-3.72C3.512 15.042 3 
                                      13.574 3 12c0-4.418 4.03-8 
                                      9-8s9 3.582 9 8z"></path>
                            </svg>
                        </div>
                        <h4 class="font-semibold mb-2 text-blue-50 text-xl">WhatsApp</h4>
                        <p class="text-blue-100 text-lg">{{ $siteSettings->whatsapp ?? '+971 50 123 4567' }}</p>
                        <p class="text-sm text-blue-200">Quick responses</p>
                    </div>

                    <!-- Skype -->
                    {{-- <div class="contact-info-item">
                        <div class="contact-icon">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M15 10l4.553-2.276A1 1 0 0121 
                                      8.618v6.764a1 1 0 01-1.447.894L15 
                                      14M5 18h8a2 2 0 002-2V8a2 2 
                                      0 00-2-2H5a2 2 0 00-2 
                                      2v8a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <h4 class="font-semibold mb-2 text-blue-50 text-xl">Skype</h4>
                        <p class="text-blue-100 text-lg">global.trade.hub</p>
                        <p class="text-sm text-blue-200">Video calls available</p>
                    </div> --}}
                </div>
            </div>

            <!-- Contact Form -->
            <div class="fade-in-up">
                <h3 class="text-2xl font-bold mb-8 text-blue-50">Send us a Message</h3>
                <form class="contact-form space-y-6 bg-white bg-opacity-10 backdrop-blur-md p-8 rounded-xl shadow-lg" 
                    action="{{ route('contact.store') }}" method="POST">
                    @csrf

                    <!-- Inquiry Type Dropdown -->
                    <div>
                        <label for="inquiry_type" class="block text-blue-100 font-semibold mb-2">Inquiry Type</label>
                        <select name="inquiry_type" id="inquiry_type" 
                                class="w-full bg-transparent border border-blue-200 text-blue-100 rounded-lg px-4 py-3 
                                    focus:outline-none focus:ring-2 focus:ring-[#499974] hover:border-[#499974] transition">
                            <option value="" class="text-gray-800">Select Inquiry Type</option>
                            <option value="chartering" class="text-gray-800">Chartering</option>
                            <option value="sp" class="text-gray-800">Sale & Purchase</option>
                            <option value="valuation" class="text-gray-800">Valuation</option>
                            <option value="services" class="text-gray-800">Marine Services</option>
                        </select>
                    </div>

                    <!-- Name & Email -->
                    <div class="grid md:grid-cols-2 gap-4">
                        <div>
                            <label for="name" class="block text-blue-100 font-semibold mb-2">Your Name</label>
                            <input type="text" name="name" id="name" placeholder="John Doe" required
                                class="w-full bg-transparent border border-blue-200 text-blue-100 rounded-lg px-4 py-3 
                                        focus:outline-none focus:ring-2 focus:ring-[#499974] hover:border-[#499974] transition">
                        </div>
                        <div>
                            <label for="email" class="block text-blue-100 font-semibold mb-2">Your Email</label>
                            <input type="email" name="email" id="email" placeholder="you@example.com" required
                                class="w-full bg-transparent border border-blue-200 text-blue-100 rounded-lg px-4 py-3 
                                        focus:outline-none focus:ring-2 focus:ring-[#499974] hover:border-[#499974] transition">
                        </div>
                    </div>

                    <!-- Subject -->
                    <div>
                        <label for="subject" class="block text-blue-100 font-semibold mb-2">Subject</label>
                        <input type="text" name="subject" id="subject" placeholder="Subject" required
                            class="w-full bg-transparent border border-blue-200 text-blue-100 rounded-lg px-4 py-3 
                                    focus:outline-none focus:ring-2 focus:ring-[#499974] hover:border-[#499974] transition">
                    </div>

                    <!-- Message -->
                    <div>
                        <label for="message" class="block text-blue-100 font-semibold mb-2">Message</label>
                        <textarea name="message" id="message" rows="5" placeholder="Your Message" required
                                class="w-full bg-transparent border border-blue-200 text-blue-100 rounded-lg px-4 py-3 
                                        focus:outline-none focus:ring-2 focus:ring-[#499974] hover:border-[#499974] transition"></textarea>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" 
                            class="w-full py-4 text-lg font-semibold rounded-lg bg-gradient-to-r from-[#499974] to-[#33978d] text-white 
                                hover:opacity-90 transition flex items-center justify-center">
                        <i class="fas fa-paper-plane mr-2"></i>
                        Send Message
                    </button>
                </form>

            </div>
        </div>
    </div>
</section>

    <style>
        /* Additional Styles */
        .fade-in-up {
            opacity: 0;
            transform: translateY(30px);
            animation: fadeInUp 0.8s ease forwards;
        }
        
        /* Contact section responsive */
        @media (max-width: 768px) {
            .contact-form {
                padding: 1.5rem !important;
            }
            
            .contact-form .grid {
                grid-template-columns: 1fr !important;
                gap: 1rem !important;
            }
            
            .contact-info-item {
                padding: 1rem;
            }
            
            .contact-info-item h4 {
                font-size: 1.1rem !important;
            }
            
            .contact-info-item p {
                font-size: 0.9rem !important;
            }
        }
        
        @media (max-width: 480px) {
            .contact-form {
                padding: 1rem !important;
            }
            
            .contact-form input,
            .contact-form select,
            .contact-form textarea {
                padding: 0.75rem !important;
                font-size: 0.9rem;
            }
            
            .contact-form button {
                padding: 0.75rem !important;
                font-size: 1rem !important;
            }
            
            .contact-info-item {
                padding: 0.75rem;
            }
            
            .contact-info-item h4 {
                font-size: 1rem !important;
            }
            
            .contact-info-item p {
                font-size: 0.85rem !important;
            }
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .btn-primary {
            background: linear-gradient(135deg, #499974 0%, #6d83d5 50%, #33978d 100%);
            border: none;
            color: white;
            font-weight: 600;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }

        .primary-color {
            --tw-bg-opacity: 1;
            background-color: rgb(38 84 120 / var(--tw-bg-opacity));
        }

        .primary-dark {
            --tw-bg-opacity: 1;
            background-color: rgb(30 66 96 / var(--tw-bg-opacity));
        }

        .accent-color {
            --tw-text-opacity: 1;
            color: rgb(73 153 116 / var(--tw-text-opacity));
        }

        /* Contact Section Enhancements */
        .contact-form input,
        .contact-form select,
        .contact-form textarea {
            background: rgba(255, 255, 255, 0.1) !important;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3) !important;
            border-radius: 12px;
            padding: 16px 20px;
            color: white;
            transition: all 0.3s ease;
        }

        .contact-form input:focus,
        .contact-form select:focus,
        .contact-form textarea:focus {
            background: rgba(255, 255, 255, 0.15) !important;
            border-color: rgba(73, 153, 116, 0.8) !important;
            outline: none;
            box-shadow: 0 0 0 3px rgba(73, 153, 116, 0.2);
        }

        .contact-form input::placeholder,
        .contact-form textarea::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        .contact-info-item {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 16px;
            padding: 24px;
            transition: all 0.3s ease;
        }

        .contact-info-item:hover {
            background: rgba(255, 255, 255, 0.15);
            transform: translateY(-4px);
        }

        .contact-icon {
            width: 30px;
            height: 30px;
            background: linear-gradient(135deg, #499974, #6d83d5, #33978d);
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 16px;
        }
    </style>

    <script>
        // Counter animation
        const counters = document.querySelectorAll('.counter');
        const speed = 200;

        const animateCounter = (counter) => {
            const target = parseInt(counter.getAttribute('data-target'));
            const count = parseInt(counter.innerText);
            const increment = target / speed;

            if (count < target) {
                counter.innerText = Math.ceil(count + increment);
                setTimeout(() => animateCounter(counter), 1);
            } else {
                counter.innerText = target;
            }
        };

        // Intersection Observer for counter animation
        const observerOptions = {
            threshold: 0.5,
            rootMargin: '0px 0px -100px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const counter = entry.target;
                    animateCounter(counter);
                    observer.unobserve(counter);
                }
            });
        }, observerOptions);

        counters.forEach(counter => {
            observer.observe(counter);
        });

        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

    </script>
@endsection
