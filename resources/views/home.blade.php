@extends('layouts.app')

@section('title', 'Global Trade Hub - Leading Maritime Solutions')
@section('description', 'Global Trade Hub is a leading maritime services company specializing in ship chartering, sale & purchase, valuation, and marine services worldwide.')

@section('content')
    
    <!-- Hero Section -->
   <!-- Hero Section -->
<section class="relative min-h-screen flex flex-col items-center justify-center overflow-hidden">
    <!-- Gradient Overlay -->
    <div class="absolute inset-0 bg-gradient-to-br from-primary-color to-primary-dark opacity-90 z-0 animate-gradient"></div>

    <!-- Content -->
    <div class="relative z-20 container mx-auto px-4 text-center text-white pt-20 fade-text">
        <h1 class="hero-title text-4xl md:text-7xl font-bold mb-6 leading-tight opacity-0 transform scale-95">
            Leading Maritime
            <span class="text-accent-color glow-text">Solutions</span>
        </h1>
        <p class="hero-subtitle text-lg md:text-2xl mb-8 max-w-3xl mx-auto opacity-0 transform translate-y-6">
            Global Trade Hub delivers comprehensive maritime services including ship chartering, 
            sale & purchase, valuation, and marine services worldwide.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center hero-buttons opacity-0 transform translate-y-6">
            <a href="{{ route('contact') }}" class="btn-primary text-lg px-8 py-4 hover:scale-105 transition transform duration-300 shadow-lg">
                Request a Quote
            </a>
            <a href="{{ route('contact') }}" class="border-2 border-white text-white px-8 py-4 rounded-lg font-semibold hover:bg-white hover:text-gray-800 transition-colors">
                Contact Us
            </a>
        </div>
    </div>

    <!-- Video -->
    <div class="video-container relative overflow-hidden rounded-3xl shadow-2xl z-10 mx-auto">
        <video autoplay muted loop playsinline class="video-zoom object-cover">
            <source src="/images/ship.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>
</section>

<style>
    /* Video Container */
    .video-container {
        width: 90%;              /* पहले 80% था → बड़ा किया */
        max-width: 900px;        /* पहले 400px था → अब बड़ा */
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
        width: "100%",           // scroll पर और बड़ा
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
            
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="service-card bg-white bg-opacity-10 backdrop-blur-md p-8 rounded-xl hover:bg-opacity-20 transition-all">
                    <div class="w-16 h-16 bg-gradient-to-br from-[#0dd3f3] to-[#6b6c00] rounded-lg flex items-center justify-center mb-6 mx-auto">
                        <i class="fas fa-handshake text-white text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold mb-4 text-center text-blue-100">Tanker Chartering</h3>
                    <p class="text-center opacity-90 text-blue-100">Specialized chartering services for all tanker types including CPP, DPP, and gas carriers</p>
                </div>
                
                <div class="service-card bg-white bg-opacity-10 backdrop-blur-md p-8 rounded-xl hover:bg-opacity-20 transition-all">
                    <div class="w-16 h-16 bg-gradient-to-br from-[#0dd3f3] to-[#6b6c00] rounded-lg flex items-center justify-center mb-6 mx-auto">
                        <i class="fas fa-exchange-alt text-white text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold mb-4 text-center text-blue-100">Sale & Purchase</h3>
                    <p class="text-center opacity-90 text-blue-100">Expert brokerage for newbuild, second-hand vessels, and scrap vessel transactions</p>
                </div>
                
                <div class="service-card bg-white bg-opacity-10 backdrop-blur-md p-8 rounded-xl hover:bg-opacity-20 transition-all">
                    <div class="w-16 h-16 bg-gradient-to-br from-[#0dd3f3] to-[#6b6c00] rounded-lg flex items-center justify-center mb-6 mx-auto">
                        <i class="fas fa-clipboard-check text-white text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold mb-4 text-center text-blue-100">Valuation</h3>
                    <p class="text-center opacity-90 text-blue-100">Professional vessel condition inspections and comprehensive survey coordination</p>
                </div>
                
                <div class="service-card bg-white bg-opacity-10 backdrop-blur-md p-8 rounded-xl hover:bg-opacity-20 transition-all">
                    <div class="w-16 h-16 bg-gradient-to-br from-[#0dd3f3] to-[#6b6c00] rounded-lg flex items-center justify-center mb-6 mx-auto">
                        <i class="fas fa-tools text-white text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold mb-4 text-center text-blue-100">Marine Services</h3>
                    <p class="text-center opacity-90 text-blue-100">Complete technical support including underwater repairs, salvage, and towing operations</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Company Highlights -->
    <section id="highlights" class="py-20 relative z-10">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="text-center fade-in-up">
                    <div class="text-5xl font-bold text-blue-400 mb-2 counter" data-target="25">0</div>
                    <p class="text-xl text-blue-100">Years Experience</p>
                </div>
                <div class="text-center fade-in-up">
                    <div class="text-5xl font-bold text-blue-400 mb-2 counter" data-target="2500">0</div>
                    <p class="text-xl text-blue-100">Deals Completed</p>
                </div>
                <div class="text-center fade-in-up">
                    <div class="text-5xl font-bold text-blue-400 mb-2 counter" data-target="150">0</div>
                    <p class="text-xl text-blue-100">Global Partners</p>
                </div>
                <div class="text-center fade-in-up">
                    <div class="text-5xl font-bold text-blue-400 mb-2 counter" data-target="50">0</div>
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
        <div class="testimonial-card hidden bg-white bg-opacity-10 backdrop-blur-md p-8 rounded-xl absolute inset-0">
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
            "Exceptional service and expertise in tanker chartering. Global Trade Hub delivered exactly what we needed."
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
                <h3 class="text-2xl font-bold mb-6 text-blue-50">Contact Information</h3>
                
                <div class="space-y-6">
                    <!-- Phone -->
                    <div class="flex items-start">
                        <div class="w-12 h-12 bg-primary-color rounded-full flex items-center justify-center mr-4 mt-1">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 
                                      1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 
                                      1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 
                                      21 3 14.284 3 6V5z"></path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-semibold mb-2 text-blue-50">Phone</h4>
                            <p class="text-blue-100">+971 4 123 4567</p>
                            <p class="text-sm text-blue-200">Available 24/7</p>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="flex items-start">
                        <div class="w-12 h-12 bg-primary-color rounded-full flex items-center justify-center mr-4 mt-1">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M3 8l7.89 4.26a2 2 0 002.22 0L21 
                                      8M5 19h14a2 2 0 002-2V7a2 2 
                                      0 00-2-2H5a2 2 0 00-2 2v10a2 2 
                                      0 002 2z"></path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-semibold mb-2 text-blue-50">Email</h4>
                            <p class="text-blue-100">info@globaltradehub.com</p>
                            <p class="text-sm text-blue-200">Response within 24 hours</p>
                        </div>
                    </div>

                    <!-- WhatsApp -->
                    <div class="flex items-start">
                        <div class="w-12 h-12 bg-primary-color rounded-full flex items-center justify-center mr-4 mt-1">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M8 12h.01M12 12h.01M16 12h.01M21 
                                      12c0 4.418-4.03 8-9 8a9.863 
                                      9.863 0 01-4.255-.949L3 
                                      20l1.395-3.72C3.512 15.042 3 
                                      13.574 3 12c0-4.418 4.03-8 
                                      9-8s9 3.582 9 8z"></path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-semibold mb-2 text-blue-50">WhatsApp</h4>
                            <p class="text-blue-100">+971 50 123 4567</p>
                            <p class="text-sm text-blue-200">Quick responses</p>
                        </div>
                    </div>

                    <!-- Skype -->
                    <div class="flex items-start">
                        <div class="w-12 h-12 bg-primary-color rounded-full flex items-center justify-center mr-4 mt-1">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M15 10l4.553-2.276A1 1 0 0121 
                                      8.618v6.764a1 1 0 01-1.447.894L15 
                                      14M5 18h8a2 2 0 002-2V8a2 2 
                                      0 00-2-2H5a2 2 0 00-2 
                                      2v8a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-semibold mb-2 text-blue-50">Skype</h4>
                            <p class="text-blue-100">global.trade.hub</p>
                            <p class="text-sm text-blue-200">Video calls available</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="fade-in-up">
                <form class="space-y-6">
                    <div>
                        <select class="w-full bg-white bg-opacity-10 backdrop-blur-md border border-blue-400 rounded-lg px-4 py-3 text-white">
                            <option value="">Select Inquiry Type</option>
                            <option value="chartering">Chartering</option>
                            <option value="sp">Sale & Purchase</option>
                            <option value="valuation">Valuation</option>
                            <option value="services">Marine Services</option>
                        </select>
                    </div>
                    <div class="grid md:grid-cols-2 gap-4">
                        <input type="text" placeholder="Your Name" class="w-full bg-white bg-opacity-10 backdrop-blur-md border border-blue-400 rounded-lg px-4 py-3 text-white placeholder-gray-300">
                        <input type="email" placeholder="Your Email" class="w-full bg-white bg-opacity-10 backdrop-blur-md border border-blue-400 rounded-lg px-4 py-3 text-white placeholder-gray-300">
                    </div>
                    <input type="text" placeholder="Subject" class="w-full bg-white bg-opacity-10 backdrop-blur-md border border-blue-400 rounded-lg px-4 py-3 text-white placeholder-gray-300">
                    <textarea rows="5" placeholder="Your Message" class="w-full bg-white bg-opacity-10 backdrop-blur-md border border-blue-400 rounded-lg px-4 py-3 text-white placeholder-gray-300"></textarea>
                    <button type="submit" class="btn-primary w-full py-3">
                        Send Message
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
