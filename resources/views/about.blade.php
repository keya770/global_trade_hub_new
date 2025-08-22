@extends('layouts.app')

@section('title', 'About Us - Global Trade Hub')
@section('description', 'Learn about Global Trade Hub, our mission, vision, core values, and leadership team. Discover why we are the trusted partner in maritime solutions.')

@section('content')
    <!-- Hero Section -->
    <section class="relative py-20 bg-gradient-to-br from-primary-color to-primary-dark text-white">
        <div class="container mx-auto px-4 text-center">
            <div class="fade-in">
                <h1 class="text-5xl md:text-6xl font-bold mb-6">About Global Trade Hub</h1>
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
                    <h2 class="text-4xl font-bold mb-6">Company Overview</h2>
                    <p class="text-lg text-gray-600 mb-6">
                        Founded in 1998, Global Trade Hub has established itself as a premier maritime services 
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
                    <div class="bg-gray-200 h-96 rounded-lg flex items-center justify-center">
                        <svg class="w-32 h-32 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Mission, Vision & Core Values Section -->
    <section class="section bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="section-title">Our Mission, Vision & Values</h2>
                <p class="section-subtitle">
                    The foundation of our success and the principles that guide everything we do
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Mission -->
                <div class="card fade-in text-center">
                    <div class="w-16 h-16 bg-primary-color rounded-full flex items-center justify-center mx-auto mb-6">
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
                <div class="card fade-in text-center">
                    <div class="w-16 h-16 bg-primary-color rounded-full flex items-center justify-center mx-auto mb-6">
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
                <div class="card fade-in text-center">
                    <div class="w-16 h-16 bg-primary-color rounded-full flex items-center justify-center mx-auto mb-6">
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

    <!-- Core Values Detail Section -->
    <section class="section bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="section-title">Our Core Values</h2>
                <p class="section-subtitle">
                    The principles that define our culture and drive our success
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Integrity -->
                <div class="card fade-in">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-primary-color rounded-full flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold">Integrity</h3>
                    </div>
                    <p class="text-gray-600">
                        We conduct business with the highest ethical standards, maintaining transparency, 
                        honesty, and trust in all our relationships.
                    </p>
                </div>

                <!-- Excellence -->
                <div class="card fade-in">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-primary-color rounded-full flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold">Excellence</h3>
                    </div>
                    <p class="text-gray-600">
                        We strive for excellence in everything we do, continuously improving our services 
                        and exceeding client expectations.
                    </p>
                </div>

                <!-- Innovation -->
                <div class="card fade-in">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-primary-color rounded-full flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold">Innovation</h3>
                    </div>
                    <p class="text-gray-600">
                        We embrace innovation and technology to deliver cutting-edge solutions that address 
                        the evolving needs of the maritime industry.
                    </p>
                </div>

                <!-- Sustainability -->
                <div class="card fade-in">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-primary-color rounded-full flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold">Sustainability</h3>
                    </div>
                    <p class="text-gray-600">
                        We are committed to environmental responsibility and sustainable practices that 
                        protect our oceans and planet for future generations.
                    </p>
                </div>

                <!-- Client-Centric -->
                <div class="card fade-in">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-primary-color rounded-full flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold">Client-Centric</h3>
                    </div>
                    <p class="text-gray-600">
                        Our clients are at the heart of everything we do. We build lasting partnerships 
                        based on understanding, trust, and mutual success.
                    </p>
                </div>

                <!-- Global Reach -->
                <div class="card fade-in">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-primary-color rounded-full flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold">Global Reach</h3>
                    </div>
                    <p class="text-gray-600">
                        We operate globally with local expertise, providing seamless services across 
                        international markets and jurisdictions.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Leadership Team Section -->
    <section class="section bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="section-title">Leadership Team</h2>
                <p class="section-subtitle">
                    Meet the experienced professionals who drive our success
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- CEO -->
                <div class="card fade-in text-center">
                    <div class="w-32 h-32 bg-gray-300 rounded-full mx-auto mb-6 flex items-center justify-center">
                        <svg class="w-16 h-16 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Michael Anderson</h3>
                    <p class="text-primary-color font-semibold mb-4">Chief Executive Officer</p>
                    <p class="text-gray-600">
                        Over 30 years of maritime industry experience, leading strategic initiatives and 
                        driving company growth across global markets.
                    </p>
                </div>

                <!-- COO -->
                <div class="card fade-in text-center">
                    <div class="w-32 h-32 bg-gray-300 rounded-full mx-auto mb-6 flex items-center justify-center">
                        <svg class="w-16 h-16 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Sarah Johnson</h3>
                    <p class="text-primary-color font-semibold mb-4">Chief Operations Officer</p>
                    <p class="text-gray-600">
                        Expert in maritime operations with 25+ years managing complex logistics and 
                        fleet operations worldwide.
                    </p>
                </div>

                <!-- CTO -->
                <div class="card fade-in text-center">
                    <div class="w-32 h-32 bg-gray-300 rounded-full mx-auto mb-6 flex items-center justify-center">
                        <svg class="w-16 h-16 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2">David Chen</h3>
                    <p class="text-primary-color font-semibold mb-4">Chief Technology Officer</p>
                    <p class="text-gray-600">
                        Leading digital transformation initiatives and implementing cutting-edge 
                        technology solutions for maritime operations.
                    </p>
                </div>

                <!-- CFO -->
                <div class="card fade-in text-center">
                    <div class="w-32 h-32 bg-gray-300 rounded-full mx-auto mb-6 flex items-center justify-center">
                        <svg class="w-16 h-16 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Emily Rodriguez</h3>
                    <p class="text-primary-color font-semibold mb-4">Chief Financial Officer</p>
                    <p class="text-gray-600">
                        Financial expert with extensive experience in maritime finance, risk management, 
                        and strategic financial planning.
                    </p>
                </div>

                <!-- Head of Chartering -->
                <div class="card fade-in text-center">
                    <div class="w-32 h-32 bg-gray-300 rounded-full mx-auto mb-6 flex items-center justify-center">
                        <svg class="w-16 h-16 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2">James Wilson</h3>
                    <p class="text-primary-color font-semibold mb-4">Head of Chartering</p>
                    <p class="text-gray-600">
                        Seasoned chartering professional with deep market knowledge and extensive 
                        network in the global shipping community.
                    </p>
                </div>

                <!-- Head of S&P -->
                <div class="card fade-in text-center">
                    <div class="w-32 h-32 bg-gray-300 rounded-full mx-auto mb-6 flex items-center justify-center">
                        <svg class="w-16 h-16 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Lisa Thompson</h3>
                    <p class="text-primary-color font-semibold mb-4">Head of Sale & Purchase</p>
                    <p class="text-gray-600">
                        Expert in vessel transactions with proven track record in negotiating complex 
                        deals and maximizing client value.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Us Section -->
        <section class="section bg-white py-20">
            <div class="container mx-auto px-4">
                <div class="text-center mb-16">
                    <h2 class="section-title fade-up">Why Choose Global Trade Hub?</h2>
                    <p class="section-subtitle fade-up delay-1">
                        Discover what sets us apart in the maritime industry
                    </p>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                    <!-- Left Column -->
                    <div class="space-y-8">
                        <div class="flex items-start fade-left">
                            <div class="w-12 h-12 bg-primary-color rounded-full flex items-center justify-center mr-6 mt-2">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold mb-3">Industry Expertise</h3>
                                <p class="text-gray-600">
                                    Our team brings together decades of combined experience across all 
                                    aspects of maritime operations, ensuring you benefit from deep industry knowledge.
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start fade-left delay-1">
                            <div class="w-12 h-12 bg-primary-color rounded-full flex items-center justify-center mr-6 mt-2">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold mb-3">Innovation & Technology</h3>
                                <p class="text-gray-600">
                                    We leverage cutting-edge technology and innovative solutions to 
                                    optimize operations and deliver superior results for our clients.
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start fade-left delay-2">
                            <div class="w-12 h-12 bg-primary-color rounded-full flex items-center justify-center mr-6 mt-2">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold mb-3">Client-Centric Approach</h3>
                                <p class="text-gray-600">
                                    Your success is our priority. We build lasting partnerships based on 
                                    trust, transparency, and mutual understanding of your business needs.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="space-y-8">
                        <div class="flex items-start fade-right">
                            <div class="w-12 h-12 bg-primary-color rounded-full flex items-center justify-center mr-6 mt-2">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold mb-3">Global Network</h3>
                                <p class="text-gray-600">
                                    With offices and partners worldwide, we provide local expertise with 
                                    global reach, ensuring seamless service across international markets.
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start fade-right delay-1">
                            <div class="w-12 h-12 bg-primary-color rounded-full flex items-center justify-center mr-6 mt-2">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold mb-3">24/7 Support</h3>
                                <p class="text-gray-600">
                                    Maritime operations never stop, and neither do we. Our dedicated team 
                                    is available around the clock to support your needs.
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start fade-right delay-2">
                            <div class="w-12 h-12 bg-primary-color rounded-full flex items-center justify-center mr-6 mt-2">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold mb-3">Proven Track Record</h3>
                                <p class="text-gray-600">
                                    With over 500 successful deals and 25+ years of experience, we have 
                                    the proven expertise to deliver results that exceed expectations.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Animation Styles -->
        <style>
        .fade-up, .fade-left, .fade-right {
            opacity: 0;
            transform: translateY(30px);
            transition: all 5s ease;
        }
        .fade-left { transform: translateX(-50px); }
        .fade-right { transform: translateX(50px); }
        .show {
            opacity: 1 !important;
            transform: translate(0,0) !important;
        }
        .delay-1 { transition-delay: 0.2s; }
        .delay-2 { transition-delay: 0.4s; }
        </style>

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
                    Join hundreds of satisfied clients who trust Global Trade Hub for their maritime needs. 
                    Let's discuss how we can help you achieve your goals.
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

