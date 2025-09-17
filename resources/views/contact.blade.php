@extends('layouts.app')

@section('title', 'Contact Us - SMA Ship Brokers')
@section('description', 'Get in touch with SMA Ship Brokers. Contact our Dubai HQ or other offices worldwide for maritime services, vessel inquiries, and business opportunities.')

@section('content')
    <!-- Contact Us Hero Section with Particles -->
    <section class="relative py-20 bg-gradient-to-br from-primary-color to-primary-dark text-white overflow-hidden">
        <canvas id="particles" class="absolute inset-0 z-0"></canvas>
        <div class="container mx-auto px-4 text-center relative z-10">
            <div class="fade-in">
                <h1 class="text-5xl md:text-6xl font-bold mb-6">Contact Us</h1>
                <p class="text-xl md:text-2xl opacity-90 max-w-3xl mx-auto">
                    Get in touch with our team of maritime experts
                </p>
            </div>
        </div>
    </section>

    {{-- <!-- About Our Contact Services (Intro) -->
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
                        <i class="fas fa-headset mr-2"></i>
                        Expert Support
                    </div>
                    <h2 class="intro-title">
                        About Our Contact Services
                    </h2>
                    <p class="intro-description">
                        At SMA Ship Brokers, we believe in building strong relationships through exceptional communication 
                        and support. Our dedicated team of maritime professionals is always ready to assist you with your 
                        shipping needs, vessel inquiries, and business requirements. Whether you're looking for vessel 
                        chartering, sale & purchase services, or technical consultations, we provide personalized 
                        attention and expert guidance to help you achieve your maritime objectives.
                    </p>
                    
                    <!-- Feature Cards -->
                    <div class="feature-cards">
                        <div class="feature-card">
                            <div class="feature-icon">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div class="feature-content">
                                <h3 class="feature-title">24/7 Availability</h3>
                                <p class="feature-desc">Round-the-clock support for urgent matters</p>
                            </div>
                        </div>
                        
                        <div class="feature-card">
                            <div class="feature-icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <div class="feature-content">
                                <h3 class="feature-title">Expert Team</h3>
                                <p class="feature-desc">Experienced maritime professionals at your service</p>
                            </div>
                        </div>
                        
                        <div class="feature-card">
                            <div class="feature-icon">
                                <i class="fas fa-comments"></i>
                            </div>
                            <div class="feature-content">
                                <h3 class="feature-title">Multiple Channels</h3>
                                <p class="feature-desc">Phone, email, WhatsApp, and in-person meetings</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="image-container">
                    <div class="image-wrapper">
                        <img src="https://images.unsplash.com/photo-1551434678-e076c223a692?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" 
                             alt="Contact Services" 
                             class="main-image">
                        <div class="image-overlay">
                            <div class="overlay-content">
                                <h4 class="overlay-title">Global Support</h4>
                                <p class="overlay-desc">Connecting with clients worldwide</p>
                            </div>
                        </div>
                        
                        <!-- Floating Stats -->
                        <div class="floating-stats">
                            <div class="stat-card stat-1">
                                <div class="stat-number">24/7</div>
                                <div class="stat-label">Support</div>
                            </div>
                            <div class="stat-card stat-2">
                                <div class="stat-number">50+</div>
                                <div class="stat-label">Countries</div>
                            </div>
                            <div class="stat-card stat-3">
                                <div class="stat-number">100%</div>
                                <div class="stat-label">Response</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}


    <!-- Contact Form Section -->
    <section class="section bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-extrabold mb-6 
                        bg-gradient-to-r from-[#499974] via-[#6d83d5] to-[#33978d] 
                        bg-clip-text text-transparent">Send Us a Message</h2>
                    <p class="section-subtitle">
                        Get in touch with our team for any inquiries about our services
                    </p>
                </div>
                
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                    <!-- Contact Form -->
                    <div class="card">
                        <h3 class="text-2xl font-bold mb-6">Contact Form</h3>
                        
                        <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                            @csrf
                            
                            @if(session('success'))
                                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                                    {{ session('success') }}
                                </div>
                            @endif

                            @if($errors->any())
                                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                                    <ul class="list-disc list-inside">
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">First Name *</label>
                                    <input type="text" name="name" id="name" value="{{ old('name') }}" 
                                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-color focus:border-transparent" required>
                                </div>
                                <div>
                                    <label for="last_name" class="block text-sm font-medium text-gray-700 mb-2">Last Name *</label>
                                    <input type="text" name="last_name" id="last_name" value="{{ old('last_name') }}" 
                                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-color focus:border-transparent" required>
                                </div>
                            </div>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email *</label>
                                    <input type="email" name="email" id="email" value="{{ old('email') }}" 
                                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-color focus:border-transparent" required>
                                </div>
                                <div>
                                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Phone</label>
                                    <input type="tel" name="phone" id="phone" value="{{ old('phone') }}" 
                                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-color focus:border-transparent">
                                </div>
                            </div>
                            
                            <div>
                                <label for="company" class="block text-sm font-medium text-gray-700 mb-2">Company</label>
                                <input type="text" name="company" id="company" value="{{ old('company') }}" 
                                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-color focus:border-transparent">
                            </div>
                            
                            <div>
                                <label for="inquiry_type" class="block text-sm font-medium text-gray-700 mb-2">Inquiry Type *</label>
                                <select name="inquiry_type" id="inquiry_type" 
                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-color focus:border-transparent" required>
                                    <option value="">Select inquiry type</option>
                                    <option value="chartering" {{ old('inquiry_type') == 'chartering' ? 'selected' : '' }}>Chartering</option>
                                    <option value="sale-purchase" {{ old('inquiry_type') == 'sale-purchase' ? 'selected' : '' }}>Sale & Purchase</option>
                                    <option value="valuation" {{ old('inquiry_type') == 'valuation' ? 'selected' : '' }}>Valuation</option>
                                    <option value="services" {{ old('inquiry_type') == 'services' ? 'selected' : '' }}>Marine Services</option>
                                    <option value="general" {{ old('inquiry_type') == 'general' ? 'selected' : '' }}>General Inquiry</option>
                                </select>
                            </div>
                            
                            <div>
                                <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">Subject *</label>
                                <input type="text" name="subject" id="subject" value="{{ old('subject') }}" 
                                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-color focus:border-transparent" required>
                            </div>
                            
                            <div>
                                <label for="message" class="block text-sm font-medium text-gray-700 mb-2">Message *</label>
                                <textarea name="message" id="message" rows="5" 
                                          class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-color focus:border-transparent" 
                                          placeholder="Please provide details about your inquiry..." required>{{ old('message') }}</textarea>
                            </div>
                            
                            <div>
                                <button type="submit" class="btn-primary w-full py-3">Send Message</button>
                            </div>
                        </form>
                    </div>

                    <!-- Direct Contact Information -->
                    <div class="space-y-8">
                        <div class="card">
                            <h3 class="text-2xl font-bold mb-6">Direct Contact</h3>
                            
                            <div class="space-y-6 bg-gradient-to-br from-[#305b73] to-[#4a7c95] rounded-2xl p-8 text-white">
                                <!-- Phone -->
                                <div class="flex items-start">
                                    <div class="w-12 h-12 bg-primary-color rounded-full flex items-center justify-center mr-4 mt-1">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold mb-2">Phone</h4>
                                        <p class="text-gray-100">{{ $siteSettings->phone ?? '+971 4 123 4567' }}</p>
                                        <p class="text-sm text-gray-100">Available 24/7</p>
                                    </div>
                                </div>

                                <!-- Email -->
                                <div class="flex items-start">
                                    <div class="w-12 h-12 bg-primary-color rounded-full flex items-center justify-center mr-4 mt-1">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold mb-2">Email</h4>
                                        <p class="text-gray-100">{{ $siteSettings->email ?? 'info@globaltradehub.com' }}</p>
                                        <p class="text-sm text-gray-100">Response within 24 hours</p>
                                    </div>
                                </div>

                                <!-- WhatsApp -->
                                <div class="flex items-start">
                                    <div class="w-12 h-12 bg-primary-color rounded-full flex items-center justify-center mr-4 mt-1">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold mb-2">WhatsApp</h4>
                                        <p class="text-gray-100">{{ $siteSettings->whatsapp ?? '+971 50 123 4567' }}</p>
                                        <p class="text-sm text-gray-100">Quick responses</p>
                                    </div>
                                </div>

                                <!-- Address -->
                                @if($siteSettings && $siteSettings->address)
                                    <div class="flex items-start">
                                        <div class="w-12 h-12 bg-primary-color rounded-full flex items-center justify-center mr-4 mt-1">
                                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <h4 class="font-semibold mb-2">Address</h4>
                                            <p class="text-gray-100">{{ $siteSettings->address }}</p>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="card">
                            <h3 class="text-2xl font-bold mb-6">Business Hours</h3>
                            
                            @if($siteSettings && $siteSettings->business_hours)
                                <div class="space-y-3">
                                    {!! nl2br(e($siteSettings->business_hours)) !!}
                                </div>
                            @else
                                <div class="space-y-3">
                                    <div class="flex justify-between">
                                        <span class="text-gray-600">Monday - Friday</span>
                                        <span class="font-semibold">8:00 AM - 6:00 PM</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-gray-600">Saturday</span>
                                        <span class="font-semibold">9:00 AM - 2:00 PM</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-gray-600">Sunday</span>
                                        <span class="font-semibold">Closed</span>
                                    </div>
                                    <div class="pt-3 border-t border-gray-200">
                                        <p class="text-sm text-gray-500">Emergency support available 24/7</p>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Interactive Map Section -->
    <section class="section bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-extrabold mb-6 
                        bg-gradient-to-r from-[#499974] via-[#6d83d5] to-[#33978d] 
                        bg-clip-text text-transparent">Find Us on the Map</h2>
                <p class="section-subtitle">
                    Visit our offices worldwide or get in touch remotely
                </p>
            </div>
            
            <div class="card">
                @if($siteSettings && $siteSettings->map)
                    <div class="w-full h-96 rounded-lg overflow-hidden">
                        <iframe src="{!! $siteSettings->map !!}"  width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"> </iframe>
                    </div>
                @else
                    <div class="bg-gray-200 h-96 rounded-lg flex items-center justify-center">
                        <div class="text-center">
                            <svg class="w-24 h-24 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path>
                            </svg>
                            <p class="text-gray-600">Interactive Google Map</p>
                            <p class="text-sm text-gray-500">Map showing all our office locations worldwide</p>
                        </div>
                    </div>
                @endif
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
                    @if($siteSettings && $siteSettings->phone)
                        <a href="tel:{{ $siteSettings->phone }}" class="btn-primary bg-gray-800 text-lg px-8 py-4 transform scale-105 ">
                            Call Now
                        </a>
                    @else
                        <a href="tel:+97141234567" class="btn-primary bg-gray-800 text-lg px-8 py-4 transform scale-105 ">
                            Call Now
                        </a>
                    @endif
                    
                    @if($siteSettings && $siteSettings->whatsapp)
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $siteSettings->whatsapp) }}" class="border-2 border-white text-white px-8 py-4 rounded-lg font-semibold hover:bg-white hover:text-gray-800 transition-colors">
                            WhatsApp
                        </a>
                    @else
                        <a href="https://wa.me/971501234567" class="border-2 border-white text-white px-8 py-4 rounded-lg font-semibold hover:bg-white hover:text-gray-800 transition-colors">
                            WhatsApp
                        </a>
                    @endif
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
            color: #6b7280;
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
    </style>
@endsection

