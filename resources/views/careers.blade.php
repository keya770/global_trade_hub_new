@extends('layouts.app')

@section('title', 'Careers - SMA Ship Brokers')
@section('description', 'Join our team at SMA Ship Brokers. Explore current job openings, internship opportunities, and start your career in the maritime industry.')

@section('content')
    <!-- Careers Hero Section with Particles -->
    <section class="relative py-20 bg-gradient-to-br from-primary-color to-primary-dark text-white overflow-hidden">
        <canvas id="particles" class="absolute inset-0 z-0"></canvas>
        <div class="container mx-auto px-4 text-center relative z-10">
            <div class="fade-in">
                <h1 class="text-5xl md:text-6xl font-bold mb-6">Careers</h1>
                <p class="text-xl md:text-2xl opacity-90 max-w-3xl mx-auto">
                    Join our team and build your career in the maritime industry
                </p>
            </div>
        </div>
    </section>

    <!-- About Our Careers (Intro) -->
    {{-- <section class="relative py-20 bg-gradient-to-br from-gray-50 to-blue-50 overflow-hidden">
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
                        <i class="fas fa-users mr-2"></i>
                        Join Our Team
                    </div>
                    <h2 class="intro-title">
                        About Our Careers
                    </h2>
                    <p class="intro-description">
                        At SMA Ship Brokers, we believe that our people are our greatest asset. We offer exciting career 
                        opportunities in the dynamic maritime industry, where you can grow professionally while contributing 
                        to global trade and commerce. Our diverse team of maritime professionals works together to deliver 
                        exceptional service to clients worldwide. Whether you're starting your career or looking to advance, 
                        we provide the platform for your success.
                    </p>
                    
                    <!-- Feature Cards -->
                    <div class="feature-cards">
                        <div class="feature-card">
                            <div class="feature-icon">
                                <i class="fas fa-graduation-cap"></i>
                            </div>
                            <div class="feature-content">
                                <h3 class="feature-title">Professional Growth</h3>
                                <p class="feature-desc">Continuous learning and development opportunities</p>
                            </div>
                        </div>
                        
                        <div class="feature-card">
                            <div class="feature-icon">
                                <i class="fas fa-globe"></i>
                            </div>
                            <div class="feature-content">
                                <h3 class="feature-title">Global Exposure</h3>
                                <p class="feature-desc">Work with international clients and partners</p>
                            </div>
                        </div>
                        
                        <div class="feature-card">
                            <div class="feature-icon">
                                <i class="fas fa-handshake"></i>
                            </div>
                            <div class="feature-content">
                                <h3 class="feature-title">Collaborative Culture</h3>
                                <p class="feature-desc">Supportive team environment and mentorship</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="image-container">
                    <div class="image-wrapper">
                        <img src="https://images.unsplash.com/photo-1521737711867-e3b97375f902?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" 
                             alt="Maritime Careers" 
                             class="main-image">
                        <div class="image-overlay">
                            <div class="overlay-content">
                                <h4 class="overlay-title">Maritime Excellence</h4>
                                <p class="overlay-desc">Building careers in global shipping</p>
                            </div>
                        </div>
                        
                        <!-- Floating Stats -->
                        <div class="floating-stats">
                            <div class="stat-card stat-1">
                                <div class="stat-number">50+</div>
                                <div class="stat-label">Team Members</div>
                            </div>
                            <div class="stat-card stat-2">
                                <div class="stat-number">15+</div>
                                <div class="stat-label">Countries</div>
                            </div>
                            <div class="stat-card stat-3">
                                <div class="stat-number">100%</div>
                                <div class="stat-label">Growth Focus</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    {{-- <!-- Internship Opportunities -->
    <section class="section bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="section-title">Internship Opportunities</h2>
                <p class="section-subtitle">
                    Start your career journey with hands-on experience in the maritime industry
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="card text-center fade-in">
                    <div class="w-16 h-16 bg-primary-color rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-4">Chartering Intern</h3>
                    <p class="text-gray-600 mb-4">
                        Learn about vessel chartering, market analysis, and client relationship management.
                    </p>
                    <span class="text-sm text-gray-500">Duration: 3-6 months</span>
                </div>

                <div class="card text-center fade-in">
                    <div class="w-16 h-16 bg-primary-color rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-4">Market Research Intern</h3>
                    <p class="text-gray-600 mb-4">
                        Conduct market research and analysis for various maritime sectors and trends.
                    </p>
                    <span class="text-sm text-gray-500">Duration: 3-6 months</span>
                </div>

                <div class="card text-center fade-in">
                    <div class="w-16 h-16 bg-primary-color rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-4">Operations Intern</h3>
                    <p class="text-gray-600 mb-4">
                        Gain experience in day-to-day operations and vessel management processes.
                    </p>
                    <span class="text-sm text-gray-500">Duration: 3-6 months</span>
                </div>
            </div>
        </div>
    </section> --}}

    <!-- Application Form -->
    <section id="apply" class="section bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-extrabold mb-6 
                        bg-gradient-to-r from-[#499974] via-[#6d83d5] to-[#33978d] 
                        bg-clip-text text-transparent">Apply Online</h2>
                    <p class="section-subtitle">
                        Submit your application and take the first step towards your maritime career
                    </p>
                </div>
                
                <div class="card">
                    @if(session('success'))
                        <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="mb-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg">
                            <ul class="list-disc list-inside">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('careers.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">First Name *</label>
                                <input type="text" name="first_name" value="{{ old('first_name') }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-color focus:border-transparent @error('first_name') border-red-500 @enderror" required>
                                @error('first_name')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Last Name *</label>
                                <input type="text" name="last_name" value="{{ old('last_name') }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-color focus:border-transparent @error('last_name') border-red-500 @enderror" required>
                                @error('last_name')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Email *</label>
                                <input type="email" name="email" value="{{ old('email') }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-color focus:border-transparent @error('email') border-red-500 @enderror" required>
                                @error('email')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Phone</label>
                                <input type="tel" name="phone" value="{{ old('phone') }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-color focus:border-transparent @error('phone') border-red-500 @enderror">
                                @error('phone')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Position Applied For *</label>
                            <select name="position_applied" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-color focus:border-transparent @error('position_applied') border-red-500 @enderror" required>
                                <option value="">Select position</option>
                                <option value="Senior Chartering Manager" {{ old('position_applied') == 'Senior Chartering Manager' ? 'selected' : '' }}>Senior Chartering Manager</option>
                                <option value="Vessel Valuator" {{ old('position_applied') == 'Vessel Valuator' ? 'selected' : '' }}>Vessel Valuator</option>
                                <option value="Marine Operations Specialist" {{ old('position_applied') == 'Marine Operations Specialist' ? 'selected' : '' }}>Marine Operations Specialist</option>
                                <option value="Business Development Manager" {{ old('position_applied') == 'Business Development Manager' ? 'selected' : '' }}>Business Development Manager</option>
                                <option value="Chartering Intern" {{ old('position_applied') == 'Chartering Intern' ? 'selected' : '' }}>Chartering Intern</option>
                                <option value="Market Research Intern" {{ old('position_applied') == 'Market Research Intern' ? 'selected' : '' }}>Market Research Intern</option>
                                <option value="Operations Intern" {{ old('position_applied') == 'Operations Intern' ? 'selected' : '' }}>Operations Intern</option>
                                <option value="Other" {{ old('position_applied') == 'Other' ? 'selected' : '' }}>Other</option>
                            </select>
                            @error('position_applied')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Cover Letter *</label>
                            <textarea name="cover_letter" rows="5" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-color focus:border-transparent @error('cover_letter') border-red-500 @enderror" placeholder="Tell us why you're interested in this position and what makes you a great candidate..." required>{{ old('cover_letter') }}</textarea>
                            @error('cover_letter')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Resume/CV *</label>
                            <input type="file" name="resume" accept=".pdf,.doc,.docx" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-color focus:border-transparent @error('resume') border-red-500 @enderror" required>
                            <p class="text-sm text-gray-500 mt-1">Accepted formats: PDF, DOC, DOCX (Max 5MB)</p>
                            @error('resume')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div>
                            <button type="submit" class="btn-primary w-full py-3">Submit Application</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="section bg-primary-color text-white">
        <div class="container mx-auto px-4 text-center">
            <div class="fade-in">
                <h2 class="text-4xl font-bold mb-6">Ready to Join Our Team?</h2>
                <p class="text-xl mb-8 opacity-90 max-w-2xl mx-auto">
                    Start your journey with SMA Ship Brokers and be part of shaping the future of maritime services
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="#apply" class="btn-primary bg-gray-800 text-lg px-8 py-4 transform scale-105 ">
                        Apply Now
                    </a>
                    <a href="{{ route('contact') }}" class="border-2 border-white text-white px-8 py-4 rounded-lg font-semibold hover:bg-white hover:text-gray-800 transition-colors">
                        Contact HR
                    </a>
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

