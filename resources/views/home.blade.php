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
                        <p class="text-center opacity-90 text-blue-100">{{ $service->description }}</p>
                    </div>
                @empty
                    <!-- Fallback services if none in database -->
                    <div class="service-card bg-white bg-opacity-10 backdrop-blur-md p-8 rounded-xl hover:bg-opacity-20 transition-all">
                        <div class="w-16 h-16 bg-gradient-to-br from-[#0dd3f3] to-[#6b6c00] rounded-lg flex items-center justify-center mb-6 mx-auto">
                            <i class="fas fa-ship text-white text-2xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold mb-4 text-center text-blue-100">Ship Chartering</h3>
                        <p class="text-center opacity-90 text-blue-100">Expert vessel chartering services for all types of maritime operations</p>
                    </div>
                    <div class="service-card bg-white bg-opacity-10 backdrop-blur-md p-8 rounded-xl hover:bg-opacity-20 transition-all">
                        <div class="w-16 h-16 bg-gradient-to-br from-[#0dd3f3] to-[#6b6c00] rounded-lg flex items-center justify-center mb-6 mx-auto">
                            <i class="fas fa-handshake text-white text-2xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold mb-4 text-center text-blue-100">Sale & Purchase</h3>
                        <p class="text-center opacity-90 text-blue-100">Professional vessel trading and acquisition services</p>
                    </div>
                    <div class="service-card bg-white bg-opacity-10 backdrop-blur-md p-8 rounded-xl hover:bg-opacity-20 transition-all">
                        <div class="w-16 h-16 bg-gradient-to-br from-[#0dd3f3] to-[#6b6c00] rounded-lg flex items-center justify-center mb-6 mx-auto">
                            <i class="fas fa-chart-line text-white text-2xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold mb-4 text-center text-blue-100">Valuation</h3>
                        <p class="text-center opacity-90 text-blue-100">Accurate vessel valuation and market analysis</p>
                    </div>
                    <div class="service-card bg-white bg-opacity-10 backdrop-blur-md p-8 rounded-xl hover:bg-opacity-20 transition-all">
                        <div class="w-16 h-16 bg-gradient-to-br from-[#0dd3f3] to-[#6b6c00] rounded-lg flex items-center justify-center mb-6 mx-auto">
                            <i class="fas fa-tools text-white text-2xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold mb-4 text-center text-blue-100">Marine Services</h3>
                        <p class="text-center opacity-90 text-blue-100">Comprehensive marine technical and operational support</p>
                    </div>
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
    .vessel-card {
    width: 480px;
    height: 310px;
    /* background-color: rgba(255, 255, 255, 0); */
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


</style>
<!-- Featured Vessels -->
<section id="vessels" class="py-20 relative z-10">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16 fade-in-up">
            <h2 class="text-4xl font-extrabold mb-6 
                bg-gradient-to-r from-[#499974] via-[#6d83d5] to-[#33978d] 
                bg-clip-text text-transparent">Featured Vessels</h2>
            <p class="text-xl opacity-90 max-w-3xl mx-auto text-blue-100">
                Discover our current selection of premium vessels for sale and charter
            </p>
        </div>

        <div class="flex flex-wrap justify-center gap-8">
            @forelse($featuredVessels as $vessel)
                <div class="vessel-card" style="--bg-image:url('{{ $vessel->image ? asset('storage/' . $vessel->image) : 'https://dvzpv6x5302g1.cloudfront.net/AcuCustom/Sitename/DAM/155/aquitaine-sea-trial-1webz.png' }}')">
                    <div class="content">
                        <h3 class="title">{{ $vessel->name }}</h3>
                        <p class="copy">Built: {{ $vessel->built_year }} | {{ $vessel->type }}<br>{{ $vessel->description }}</p>
                        <a href="{{ route('vessels.show', $vessel) }}" class="btn">View Details</a>
                    </div>
                </div>
            @empty
                <!-- Fallback vessels if none in database -->
                <div class="vessel-card" style="--bg-image:url('https://dvzpv6x5302g1.cloudfront.net/AcuCustom/Sitename/DAM/155/aquitaine-sea-trial-1webz.png')">
                    <div class="content">
                        <h3 class="title">VLCC Tanker</h3>
                        <p class="copy">Built: 2018 | DWT: 320,000<br>Premium crude oil carrier available for long-term charter</p>
                        <a href="#" class="btn">View Details</a>
                    </div>
                </div>

                <div class="vessel-card" style="--bg-image:url('https://atlantic-pacific.com/wp-content/uploads/2023/06/apgl-largest-ship1.jpg')">
                    <div class="content">
                        <h3 class="title">Container Vessel</h3>
                        <p class="copy">Built: 2020 | TEU: 14,000<br>Modern container ship for sale with excellent condition</p>
                        <a href="#" class="btn">View Details</a>
                    </div>
                </div>

                <div class="vessel-card" style="--bg-image:url('https://www.norsepower.com/app/uploads/2023/08/Camellia_Dream_with_NRS_V03_packed.webp')">
                    <div class="content">
                        <h3 class="title">Bulk Carrier</h3>
                        <p class="copy">Built: 2019 | DWT: 180,000<br>Capesize bulk carrier available for voyage charter</p>
                        <a href="#" class="btn">View Details</a>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
    </section>
    
    <!-- Testimonials -->
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
            <div class="testimonial-card {{ $index === 0 ? '' : 'hidden' }} bg-white bg-opacity-10 backdrop-blur-md p-8 rounded-xl absolute inset-0">
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
            <!-- Fallback testimonials if none in database -->
            <div class="testimonial-card bg-white bg-opacity-10 backdrop-blur-md p-8 rounded-xl absolute inset-0">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-blue-600 rounded-full flex items-center justify-center mr-4">
                        <i class="fas fa-user text-white"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-blue-100">John Maritime</h4>
                        <p class="text-blue-400">Shipping Manager</p>
                    </div>
                </div>
                <p class="opacity-90 text-blue-100">
                    "Exceptional service and expertise in tanker chartering. SMA Ship Brokers delivered exactly what we needed."
                </p>
            </div>

            <div class="testimonial-card hidden bg-white bg-opacity-10 backdrop-blur-md p-8 rounded-xl absolute inset-0">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-blue-600 rounded-full flex items-center justify-center mr-4">
                        <i class="fas fa-user text-white"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-blue-100">Sarah Ocean</h4>
                        <p class="text-blue-400">Fleet Director</p>
                    </div>
                </div>
                <p class="opacity-90 text-blue-100">
                    "Professional vessel valuation services that helped us make informed investment decisions. Highly recommended."
                </p>
            </div>

            <div class="testimonial-card hidden bg-white bg-opacity-10 backdrop-blur-md p-8 rounded-xl absolute inset-0">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-blue-600 rounded-full flex items-center justify-center mr-4">
                        <i class="fas fa-user text-white"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-blue-100">Mike Anchor</h4>
                        <p class="text-blue-400">Operations Chief</p>
                    </div>
                </div>
                <p class="opacity-90 text-blue-100">
                    "Outstanding marine services and technical support. Their team resolved our challenges quickly and efficiently."
                </p>
            </div>
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
        card.classList.remove("hidden");
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

  /* Responsive */
  #testimonialWrapper {
    min-height: 250px; /* keeps height stable */
  }

  @media (max-width: 768px) {
    #testimonialWrapper .testimonial-card {
      padding: 1.5rem;
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
