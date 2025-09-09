@extends('layouts.app')

@section('title', 'About Us - SMA Ship Brokers')
@section('description', 'Learn about SMA Ship Brokers, our mission, vision, core values, and leadership team. Discover why we are the trusted partner in maritime solutions.')

@section('content')
    <!-- Hero Section with Particles -->
        <section class="relative py-20 bg-gradient-to-br from-primary-color to-primary-dark text-white overflow-hidden">
            <!-- Canvas for particles -->
            <canvas id="particles" class="absolute inset-0 z-0"></canvas>

            <!-- Content -->
            <div class="container mx-auto px-4 text-center relative z-10">
                <div class="fade-in">
                    <h1 class="text-5xl md:text-6xl font-bold mb-6">About SMA Ship Brokers</h1>
                    <p class="text-xl md:text-2xl opacity-90 max-w-3xl mx-auto">
                        Leading the maritime industry with innovation, expertise, and unwavering commitment to excellence
                    </p>
                </div>
            </div>
        </section>

    <!-- Company Overview Section -->
    <section class="section bg-white">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div class="slide-in-left">
                    <h2 class="text-4xl font-extrabold mb-6 
                        bg-gradient-to-r from-[#499974] via-[#6d83d5] to-[#33978d] 
                        bg-clip-text text-transparent">Company Overview</h2>
                    <p class="text-lg text-gray-600 mb-6">
                        Founded in 1998, SMA Ship Brokers has established itself as a premier maritime services 
                        company, serving clients across the globe with comprehensive solutions in ship chartering, 
                        sale & purchase, valuation, and marine services.
                    </p>
                    <p class="text-lg text-gray-600 mb-6">
                        Our journey began with a simple vision: to provide reliable, efficient, and innovative 
                        maritime solutions that empower our clients to navigate the complex waters of global trade 
                        with confidence and success.
                    </p>
                    <p class="text-lg text-gray-600">
                        Today, with over 25 years of experience and a team of industry experts, we continue to 
                        lead the maritime sector with cutting-edge technology, deep market knowledge, and 
                        unwavering commitment to client satisfaction.
                    </p>
                </div>
                
                <div class="slide-in-right">
                <div class="bg-gradient-to-br from-[#e4e4e4] to-[#4a7c95] h-96 rounded-lg flex items-center justify-center animate-scale-fade overflow-hidden">
                    <!-- Replace with your image -->
                    <img src="https://png.pngtree.com/thumb_back/fh260/background/20230707/pngtree-d-rendering-of-a-logistics-company-s-import-export-shipping-operations-image_3817708.jpg" alt="Your Image" class="">
                </div>
                </div>
                </style>
            </div>
        </div>
    </section>

    <section class="section bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-extrabold mb-6 
                        bg-gradient-to-r from-[#499974] via-[#6d83d5] to-[#33978d] 
                        bg-clip-text text-transparent">Our Mission, Vision & Values</h2>
                <p class="section-subtitle">
                    The foundation of our success and the principles that guide everything we do
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Mission -->
                <div class="card fade-right text-center">
                    <div class="w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-6" style="background: linear-gradient(135deg, #499974, #6d83d5);">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">Our Mission</h3>
                    <p class="text-gray-600">
                        To provide innovative, reliable, and sustainable maritime solutions that enable our 
                        clients to achieve their business objectives while contributing to the growth and 
                        development of the global maritime industry.
                    </p>
                </div>

                <!-- Vision -->
                <div class="card fade-right delay-1 text-center">
                    <div class="w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-6" style="background: linear-gradient(135deg, #499974, #6d83d5);">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">Our Vision</h3>
                    <p class="text-gray-600">
                        To be the world's most trusted and innovative maritime services partner, leading the 
                        industry towards a sustainable and prosperous future through excellence, integrity, 
                        and continuous innovation.
                    </p>
                </div>

                <!-- Values -->
                <div class="card fade-right delay-2 text-center">
                    <div class="w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-6 " style="background: linear-gradient(135deg, #499974, #6d83d5);">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">Core Values</h3>
                    <p class="text-gray-600">
                        Integrity, Excellence, Innovation, Sustainability, and Client-Centric approach form 
                        the cornerstone of our operations and guide every decision we make.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Animation Styles -->
    <style>
    .fade-right {
        opacity: 0;
        transform: translateX(50px);
        transition: all 0.10s ease-out;
    }
    .show {
        opacity: 1 !important;
        transform: translateX(0) !important;
    }
    .delay-1 { transition-delay: 0.4s; }
    .delay-2 { transition-delay: 0.6s; }
    </style>

    <script>
    function revealOnScroll() {
        const elements = document.querySelectorAll('.fade-right');
        const triggerBottom = window.innerHeight * 0.85;
        elements.forEach(el => {
            const rect = el.getBoundingClientRect();
            if (rect.top < triggerBottom) {
                el.classList.add('show');
            }
        });
    }
    window.addEventListener('scroll', revealOnScroll);
    window.addEventListener('load', revealOnScroll);
    </script>


    <!-- Core Values Detail Section -->
   
    <section class="section bg-gray-50 py-20">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-extrabold mb-6 
                        bg-gradient-to-r from-[#499974] via-[#6d83d5] to-[#33978d] 
                        bg-clip-text text-transparent">Why Choose SMA Ship Brokers?</h2>
                <p class="text-gray-600 text-lg fade-up delay-1">
                    Discover what sets us apart in the maritime industry
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                <!-- Left Column -->
                <div class="space-y-8">
                    <div class="flex items-start fade-left hover-card">
                        <div class="w-14 h-14 rounded-full flex items-center justify-center mr-6 mt-2 bg-gradient-to-br from-[#0dd3f3] to-[#6b6c00] shadow-lg">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold mb-2 text-gray-800">Industry Expertise</h3>
                            <p class="text-gray-600">
                                Our team brings decades of combined experience across all maritime operations, ensuring deep industry knowledge.
                            </p>
                        </div>
                    </div>

                    <div class="flex items-start fade-left delay-1 hover-card">
                        <div class="w-14 h-14 rounded-full flex items-center justify-center mr-6 mt-2 bg-gradient-to-br from-[#0dd3f3] to-[#6b6c00] shadow-lg">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold mb-2 text-gray-800">Innovation & Technology</h3>
                            <p class="text-gray-600">
                                We leverage cutting-edge technology and innovative solutions to optimize operations and deliver superior results.
                            </p>
                        </div>
                    </div>

                    <div class="flex items-start fade-left delay-2 hover-card">
                        <div class="w-14 h-14 rounded-full flex items-center justify-center mr-6 mt-2 bg-gradient-to-br from-[#0dd3f3] to-[#6b6c00] shadow-lg">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold mb-2 text-gray-800">Client-Centric Approach</h3>
                            <p class="text-gray-600">
                                We build lasting partnerships based on trust, transparency, and mutual understanding of your business needs.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Right Column -->
                <div class="space-y-8">
                    <div class="flex items-start fade-right hover-card">
                        <div class="w-14 h-14 rounded-full flex items-center justify-center mr-6 mt-2 bg-gradient-to-br from-[#0dd3f3] to-[#6b6c00] shadow-lg">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold mb-2 text-gray-800">Global Network</h3>
                            <p class="text-gray-600">
                                With offices and partners worldwide, we provide local expertise with global reach for seamless service.
                            </p>
                        </div>
                    </div>

                    <div class="flex items-start fade-right delay-1 hover-card">
                        <div class="w-14 h-14 rounded-full flex items-center justify-center mr-6 mt-2 bg-gradient-to-br from-[#0dd3f3] to-[#6b6c00] shadow-lg">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold mb-2 text-gray-800">24/7 Support</h3>
                            <p class="text-gray-600">
                                Maritime operations never stop, and neither do we. Our dedicated team is available around the clock.
                            </p>
                        </div>
                    </div>

                    <div class="flex items-start fade-right delay-2 hover-card">
                        <div class="w-14 h-14 rounded-full flex items-center justify-center mr-6 mt-2 bg-gradient-to-br from-[#0dd3f3] to-[#6b6c00] shadow-lg">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold mb-2 text-gray-800">Proven Track Record</h3>
                            <p class="text-gray-600">
                                With over 500 successful deals and 25+ years of experience, we deliver results that exceed expectations.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
    .fade-up, .fade-left, .fade-right {
        opacity: 0;
        transform: translateY(30px);
        transition: all 0.8s ease-out;
    }
    .fade-left { transform: translateX(-50px); }
    .fade-right { transform: translateX(50px); }
    .show {
        opacity: 1 !important;
        transform: translate(0,0) !important;
    }
    .delay-1 { transition-delay: 0.2s; }
    .delay-2 { transition-delay: 0.4s; }

    /* Hover Card */
    .hover-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border-radius: 12px;
    }
    .hover-card:hover {
        transform: translateY(-5px) scale(1.02);
        box-shadow: 0 20px 40px rgba(0,0,0,0.1);
    }
    </style>

    <script>
    function revealOnScroll() {
        const elements = document.querySelectorAll('.fade-up, .fade-left, .fade-right');
        const triggerBottom = window.innerHeight * 0.85;
        elements.forEach(el => {
            const rect = el.getBoundingClientRect();
            if(rect.top < triggerBottom) {
                el.classList.add('show');
            }
        });
    }
    window.addEventListener('scroll', revealOnScroll);
    window.addEventListener('load', revealOnScroll);
    </script>

    
    <!-- Why Choose Us Section -->
        
    <!-- Scroll Animation Script -->
    <script>
    function revealOnScroll() {
        const elements = document.querySelectorAll('.fade-up, .fade-left, .fade-right');
        const triggerBottom = window.innerHeight * 0.85;
        elements.forEach(el => {
            const rect = el.getBoundingClientRect();
            if (rect.top < triggerBottom) {
                el.classList.add('show');
            }
        });
    }
    window.addEventListener('scroll', revealOnScroll);
    window.addEventListener('load', revealOnScroll);
    </script>


    <!-- CTA Section -->
    <section class="section bg-primary-color text-white">
        <div class="container mx-auto px-4 text-center">
            <div class="fade-in">
                <h2 class="text-4xl font-bold mb-6">Ready to Partner With Us?</h2>
                <p class="text-xl mb-8 opacity-90 max-w-2xl mx-auto">
                    Join hundreds of satisfied clients who trust SMA Ship Brokers for their maritime needs. 
                    Let's discuss how we can help you achieve your goals.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('contact') }}" class="btn-primary bg-gray-800 text-lg px-8 py-4 transform scale-105 ">
                        Get in Touch
                    </a>
                    <a href="{{ route('services') }}" class="border-2 border-white text-white px-8 py-4 rounded-lg font-semibold hover:bg-white hover:text-gray-800 transition-colors">
                        Explore Services
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection

