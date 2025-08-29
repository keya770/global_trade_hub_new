@extends('layouts.app')

@section('title', 'Careers - Global Trade Hub')
@section('description', 'Join our team at Global Trade Hub. Explore current job openings, internship opportunities, and start your career in the maritime industry.')

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
                    <form class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">First Name *</label>
                                <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-color focus:border-transparent" required>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Last Name *</label>
                                <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-color focus:border-transparent" required>
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Email *</label>
                                <input type="email" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-color focus:border-transparent" required>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Phone</label>
                                <input type="tel" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-color focus:border-transparent">
                            </div>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Position Applied For *</label>
                            <select class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-color focus:border-transparent" required>
                                <option value="">Select position</option>
                                <option value="senior-chartering-manager">Senior Chartering Manager</option>
                                <option value="vessel-valuator">Vessel Valuator</option>
                                <option value="marine-operations-specialist">Marine Operations Specialist</option>
                                <option value="business-development-manager">Business Development Manager</option>
                                <option value="chartering-intern">Chartering Intern</option>
                                <option value="market-research-intern">Market Research Intern</option>
                                <option value="operations-intern">Operations Intern</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Cover Letter *</label>
                            <textarea rows="5" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-color focus:border-transparent" placeholder="Tell us why you're interested in this position and what makes you a great candidate..." required></textarea>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Resume/CV *</label>
                            <input type="file" accept=".pdf,.doc,.docx" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-color focus:border-transparent" required>
                            <p class="text-sm text-gray-500 mt-1">Accepted formats: PDF, DOC, DOCX (Max 5MB)</p>
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
                    Start your journey with Global Trade Hub and be part of shaping the future of maritime services
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

