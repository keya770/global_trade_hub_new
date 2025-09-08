@extends('layouts.app')

@section('title', 'Careers - SMA Ship Brokers')
@section('description', 'Join our team at SMA Ship Brokers. Explore current job openings, internship opportunities, and start your career in the maritime industry.')

@section('content')
    <!-- Careers Hero Section with Particles -->
    <section class="relative py-20 bg-gradient-to-br from-primary-color to-primary-dark text-white overflow-hidden">
        <!-- Canvas for particles -->
        <canvas id="particles" class="absolute inset-0 z-0"></canvas>

        <!-- Content -->
        <div class="container mx-auto px-4 text-center relative z-10">
            <div class="fade-in">
                <h1 class="text-5xl md:text-6xl font-bold mb-6">Careers</h1>
                <p class="text-xl md:text-2xl opacity-90 max-w-3xl mx-auto">
                    Join our team and build your career in the maritime industry
                </p>
            </div>
        </div>
    </section>

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
@endsection

