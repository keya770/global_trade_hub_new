@extends('layouts.app')

@section('title', 'Global Trade Hub - Leading Maritime Solutions')
@section('description', 'Global Trade Hub is a leading maritime services company specializing in ship chartering, sale & purchase, valuation, and marine services worldwide.')

@section('content')
    <!-- Hero Section -->
    <section class="relative min-h-screen flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-primary-color to-primary-dark opacity-90"></div>
        <div class="relative z-10 container mx-auto px-4 text-center text-white">
            <div class="fade-in">
                <h1 class="text-5xl md:text-7xl font-bold mb-6 leading-tight">
                    Leading Maritime
                    <span class="text-accent-color">Solutions</span>
                </h1>
                <p class="text-xl md:text-2xl mb-8 max-w-3xl mx-auto opacity-90">
                    Global Trade Hub delivers comprehensive maritime services including ship chartering, 
                    sale & purchase, valuation, and marine services worldwide.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('contact') }}" class="btn-primary text-lg px-8 py-4">
                        Request a Quote
                    </a>
                    <a href="{{ route('contact') }}" class="btn-secondary text-lg px-8 py-4 border-white text-white hover:bg-white hover:text-primary-color">
                        Contact Us
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Hero Background Image -->
        <div class="absolute inset-0 z-0">
            <!-- Video Background -->
        <video autoplay muted loop playsinline class="absolute inset-0 w-full h-full object-cover z-0">
            <source src="/images/ship.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
            <div class="absolute inset-0 bg-black opacity-40"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-primary-dark via-transparent to-transparent"></div>
        </div>
    </section>

    

    <!-- Services Overview Section -->
    <section class="section bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="section-title">Our Services</h2>
                <p class="section-subtitle">
                    Comprehensive maritime solutions tailored to meet your business needs
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Tanker Chartering -->
                <div class="card fade-in text-center">
                    <div class="w-16 h-16 bg-primary-color rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-4">Tanker Chartering</h3>
                    <p class="text-gray-600 mb-6">
                        Expert tanker chartering services for CPP, DPP, LPG/LNG vessels with global coverage.
                    </p>
                    <a href="{{ route('services') }}#chartering" class="text-primary-color font-semibold hover:underline">
                        Learn More →
                    </a>
                </div>

                <!-- Sale & Purchase -->
                <div class="card fade-in text-center">
                    <div class="w-16 h-16 bg-primary-color rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-4">Sale & Purchase</h3>
                    <p class="text-gray-600 mb-6">
                        Complete S&P services for newbuild, second-hand, and scrap vessels.
                    </p>
                    <a href="{{ route('services') }}#sale-purchase" class="text-primary-color font-semibold hover:underline">
                        Learn More →
                    </a>
                </div>

                <!-- Valuation -->
                <div class="card fade-in text-center">
                    <div class="w-16 h-16 bg-primary-color rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-4">Valuation</h3>
                    <p class="text-gray-600 mb-6">
                        Professional ship valuation and inspection services with detailed reports.
                    </p>
                    <a href="{{ route('services') }}#valuation" class="text-primary-color font-semibold hover:underline">
                        Learn More →
                    </a>
                </div>

                <!-- Marine Services -->
                <div class="card fade-in text-center">
                    <div class="w-16 h-16 bg-primary-color rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-4">Marine Services</h3>
                    <p class="text-gray-600 mb-6">
                        Technical and marine services including repairs, salvage, and towing.
                    </p>
                    <a href="{{ route('services') }}#marine-services" class="text-primary-color font-semibold hover:underline">
                        Learn More →
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Company Highlights Section -->
    <section class="section bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div class="slide-in-left">
                    <h2 class="text-4xl font-bold mb-6">Why Choose Global Trade Hub?</h2>
                    <p class="text-lg text-gray-600 mb-8">
                        With decades of experience in the maritime industry, we provide comprehensive 
                        solutions backed by expertise, reliability, and global reach.
                    </p>
                    
                    <div class="space-y-6">
                        <div class="flex items-start">
                            <div class="w-8 h-8 bg-primary-color rounded-full flex items-center justify-center mr-4 mt-1">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold mb-2">25+ Years Experience</h4>
                                <p class="text-gray-600">Decades of expertise in maritime operations and trade.</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="w-8 h-8 bg-primary-color rounded-full flex items-center justify-center mr-4 mt-1">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold mb-2">500+ Successful Deals</h4>
                                <p class="text-gray-600">Track record of successful transactions worldwide.</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="w-8 h-8 bg-primary-color rounded-full flex items-center justify-center mr-4 mt-1">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold mb-2">Global Network</h4>
                                <p class="text-gray-600">Established connections across major maritime hubs.</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="slide-in-right">
                    <div class="grid grid-cols-2 gap-6">
                        <div class="card text-center">
                            <div class="text-4xl font-bold text-primary-color mb-2">25+</div>
                            <div class="text-gray-600">Years Experience</div>
                        </div>
                        <div class="card text-center">
                            <div class="text-4xl font-bold text-primary-color mb-2">500+</div>
                            <div class="text-gray-600">Successful Deals</div>
                        </div>
                        <div class="card text-center">
                            <div class="text-4xl font-bold text-primary-color mb-2">50+</div>
                            <div class="text-gray-600">Countries Served</div>
                        </div>
                        <div class="card text-center">
                            <div class="text-4xl font-bold text-primary-color mb-2">24/7</div>
                            <div class="text-gray-600">Support Available</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Vessels Section with Background Animation -->
    <section class="relative py-20 overflow-hidden">
        <!-- Animated Gradient Background -->
        <div class="absolute inset-0 bg-gradient-to-br from-blue-900 via-blue-800 to-blue-900 animate-gradient">
            <canvas id="particles" class="absolute inset-0"></canvas>
        </div>
    
        <div class="relative container mx-auto px-4 z-10">
            <!-- Heading -->
            <div class="text-center mb-16 text-white">
                <h2 class="text-5xl font-extrabold mb-4 bg-clip-text text-transparent bg-gradient-to-r from-blue-400 via-cyan-300 to-blue-500 animate-gradient-text">
                    Featured Vessels
                </h2>
                <p class="text-lg text-gray-200 max-w-2xl mx-auto">
                    Explore our latest vessels for sale and charter with world-class specifications.
                </p>
            </div>
    
            <!-- Vessel Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">
                <!-- Card -->
                <div class="card bg-white rounded-xl shadow-lg overflow-hidden transform transition duration-500 hover:scale-105 hover:shadow-2xl fade-in p-6">
                    <div class="bg-gray-200 h-48 rounded-lg mb-4 flex items-center justify-center overflow-hidden">
                        <img src="https://via.placeholder.com/600x400" alt="Bulk Carrier" class="w-full h-full object-cover transition-transform duration-700 hover:scale-110">
                    </div>
                    <h3 class="text-2xl font-bold mb-2 text-gray-800">Bulk Carrier - 82,000 DWT</h3>
                    <p class="text-gray-600 mb-4">Built 2018 · Excellent condition · Available for charter</p>
                    <div class="flex justify-between items-center">
                        <span class="text-blue-700 font-bold text-lg">$25,000/day</span>
                        <a href="{{ route('vessels') }}" class="btn-primary relative px-6 py-2 bg-blue-700 text-white rounded-lg overflow-hidden transition hover:bg-blue-600">
                            Inquire
                        </a>
                    </div>
                </div>
    
                <!-- Card -->
                <div class="card bg-white rounded-xl shadow-lg overflow-hidden transform transition duration-500 hover:scale-105 hover:shadow-2xl fade-in p-6" style="animation-delay: 0.2s">
                    <div class="bg-gray-200 h-48 rounded-lg mb-4 flex items-center justify-center overflow-hidden">
                        <img src="https://via.placeholder.com/600x400" alt="Tanker" class="w-full h-full object-cover transition-transform duration-700 hover:scale-110">
                    </div>
                    <h3 class="text-2xl font-bold mb-2 text-gray-800">Tanker - 115,000 DWT</h3>
                    <p class="text-gray-600 mb-4">Built 2020 · Modern specifications · For sale</p>
                    <div class="flex justify-between items-center">
                        <span class="text-blue-700 font-bold text-lg">$45M</span>
                        <a href="{{ route('vessels') }}" class="btn-primary relative px-6 py-2 bg-blue-700 text-white rounded-lg overflow-hidden transition hover:bg-blue-600">
                            Inquire
                        </a>
                    </div>
                </div>
    
                <!-- Card -->
                <div class="card bg-white rounded-xl shadow-lg overflow-hidden transform transition duration-500 hover:scale-105 hover:shadow-2xl fade-in p-6" style="animation-delay: 0.4s">
                    <div class="bg-gray-200 h-48 rounded-lg mb-4 flex items-center justify-center overflow-hidden">
                        <img src="https://via.placeholder.com/600x400" alt="Container Ship" class="w-full h-full object-cover transition-transform duration-700 hover:scale-110">
                    </div>
                    <h3 class="text-2xl font-bold mb-2 text-gray-800">Container Ship - 8,500 TEU</h3>
                    <p class="text-gray-600 mb-4">Built 2019 · Eco-friendly design · Available for charter</p>
                    <div class="flex justify-between items-center">
                        <span class="text-blue-700 font-bold text-lg">$35,000/day</span>
                        <a href="{{ route('vessels') }}" class="btn-primary relative px-6 py-2 bg-blue-700 text-white rounded-lg overflow-hidden transition hover:bg-blue-600">
                            Inquire
                        </a>
                    </div>
                </div>
            </div>
    
            <!-- View All -->
            <div class="text-center mt-12">
                <a href="{{ route('vessels') }}" class="btn-secondary text-lg px-8 py-4 bg-transparent border-2 border-white text-white rounded-lg hover:bg-white hover:text-blue-800 transition-all duration-500">
                    View All Vessels
                </a>
            </div>
        </div>
    </section>
    
    
        
        <!-- Particles Script -->
        <script>
        const canvas = document.getElementById('particles');
        const ctx = canvas.getContext('2d');
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;
        
        let particlesArray = [];
        const colors = ['rgba(255,255,255,0.3)', 'rgba(255,255,255,0.5)'];
        
        function initParticles() {
            particlesArray = [];
            for (let i = 0; i < 80; i++) {
                particlesArray.push({
                    x: Math.random() * canvas.width,
                    y: Math.random() * canvas.height,
                    radius: Math.random() * 3,
                    color: colors[Math.floor(Math.random() * colors.length)],
                    speedX: (Math.random() - 0.5) * 0.8,
                    speedY: (Math.random() - 0.5) * 0.8
                });
            }
        }
        
        function animateParticles() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            particlesArray.forEach(p => {
                ctx.beginPath();
                ctx.arc(p.x, p.y, p.radius, 0, Math.PI * 2);
                ctx.fillStyle = p.color;
                ctx.fill();
                p.x += p.speedX;
                p.y += p.speedY;
                if (p.x < 0 || p.x > canvas.width) p.speedX *= -1;
                if (p.y < 0 || p.y > canvas.height) p.speedY *= -1;
            });
            requestAnimationFrame(animateParticles);
        }
        
        initParticles();
        animateParticles();
        window.addEventListener('resize', () => {
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;
            initParticles();
        });
        </script>
    
    

    <!-- Testimonials Section -->
    <section class="section bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="section-title">What Our Clients Say</h2>
                <p class="section-subtitle">
                    Trusted by leading companies in the maritime industry
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Testimonial 1 -->
                <div class="card fade-in">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-primary-color rounded-full flex items-center justify-center mr-4">
                            <span class="text-white font-bold">JD</span>
                        </div>
                        <div>
                            <h4 class="font-semibold">John Davis</h4>
                            <p class="text-gray-600 text-sm">CEO, Maritime Solutions Ltd</p>
                        </div>
                    </div>
                    <p class="text-gray-600 italic">
                        "Global Trade Hub has consistently delivered exceptional service. Their expertise 
                        in vessel transactions and market knowledge is unmatched."
                    </p>
                </div>

                <!-- Testimonial 2 -->
                <div class="card fade-in">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-primary-color rounded-full flex items-center justify-center mr-4">
                            <span class="text-white font-bold">SM</span>
                        </div>
                        <div>
                            <h4 class="font-semibold">Sarah Mitchell</h4>
                            <p class="text-gray-600 text-sm">Operations Director, Ocean Freight Co</p>
                        </div>
                    </div>
                    <p class="text-gray-600 italic">
                        "Professional, reliable, and always responsive. Global Trade Hub has been our 
                        trusted partner for all maritime needs."
                    </p>
                </div>

                <!-- Testimonial 3 -->
                <div class="card fade-in">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-primary-color rounded-full flex items-center justify-center mr-4">
                            <span class="text-white font-bold">RK</span>
                        </div>
                        <div>
                            <h4 class="font-semibold">Robert Kim</h4>
                            <p class="text-gray-600 text-sm">Fleet Manager, Asian Shipping Corp</p>
                        </div>
                    </div>
                    <p class="text-gray-600 italic">
                        "Outstanding service quality and deep industry knowledge. They've helped us 
                        optimize our fleet operations significantly."
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="section bg-primary-color text-white">
        <div class="container mx-auto px-4 text-center">
            <div class="fade-in">
                <h2 class="text-4xl font-bold mb-6">Ready to Get Started?</h2>
                <p class="text-xl mb-8 opacity-90 max-w-2xl mx-auto">
                    Contact us today to discuss your maritime requirements and discover how we can 
                    help optimize your operations.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('contact') }}" class="bg-white text-primary-color px-8 py-4 rounded-lg font-semibold hover:bg-gray-100 transition-colors">
                        Get in Touch
                    </a>
                    <a href="{{ route('services') }}" class="border-2 border-white text-white px-8 py-4 rounded-lg font-semibold hover:bg-white hover:text-primary-color transition-colors">
                        Explore Services
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection

