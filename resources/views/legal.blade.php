@extends('layouts.app')

@section('title', 'Legal & Resources - Global Trade Hub')
@section('description', 'Access legal documents, compliance information, and useful maritime resources from Global Trade Hub.')

@section('content')
    <!-- Hero Section -->
    <section class="relative py-20 bg-gradient-to-br from-primary-color to-primary-dark text-white">
        <div class="container mx-auto px-4 text-center">
            <div class="fade-in">
                <h1 class="text-5xl md:text-6xl font-bold mb-6">Legal & Resources</h1>
                <p class="text-xl md:text-2xl opacity-90 max-w-3xl mx-auto">
                    Legal documents, compliance information, and maritime resources
                </p>
            </div>
        </div>
    </section>

    <!-- Legal Documents Section -->
    <section class="section bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="section-title">Legal Documents</h2>
                <p class="section-subtitle">
                    Important legal information and policies
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Terms & Conditions -->
                <div class="card fade-in">
                    <div class="w-16 h-16 bg-primary-color rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-4 text-center">Terms & Conditions</h3>
                    <p class="text-gray-600 mb-6 text-center">
                        Our terms of service and conditions for using Global Trade Hub services.
                    </p>
                    <div class="text-center">
                        <a href="#" class="btn-primary">Read Terms</a>
                    </div>
                </div>

                <!-- Privacy Policy -->
                <div class="card fade-in">
                    <div class="w-16 h-16 bg-primary-color rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-4 text-center">Privacy Policy</h3>
                    <p class="text-gray-600 mb-6 text-center">
                        How we collect, use, and protect your personal information.
                    </p>
                    <div class="text-center">
                        <a href="#" class="btn-primary">Read Policy</a>
                    </div>
                </div>

                <!-- Cookie Policy -->
                <div class="card fade-in">
                    <div class="w-16 h-16 bg-primary-color rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zM21 5a2 2 0 00-2-2h-4a2 2 0 00-2 2v12a4 4 0 004 4h4a2 2 0 002-2V5z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-4 text-center">Cookie Policy</h3>
                    <p class="text-gray-600 mb-6 text-center">
                        Information about how we use cookies and similar technologies.
                    </p>
                    <div class="text-center">
                        <a href="#" class="btn-primary">Read Policy</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Compliance & Regulatory Section -->
    <section class="section bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="section-title">Compliance & Regulatory</h2>
                <p class="section-subtitle">
                    Our commitment to regulatory compliance and industry standards
                </p>
            </div>
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <div class="fade-in">
                    <h3 class="text-2xl font-bold mb-6">Regulatory Compliance</h3>
                    <p class="text-gray-600 mb-6 leading-relaxed">
                        Global Trade Hub maintains strict compliance with international maritime regulations, 
                        including IMO standards, SOLAS, MARPOL, and other relevant conventions. Our operations 
                        adhere to the highest industry standards and best practices.
                    </p>
                    <div class="space-y-4">
                        <div class="flex items-start">
                            <div class="w-6 h-6 bg-primary-color rounded-full flex items-center justify-center mr-3 mt-1">
                                <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold mb-1">IMO Compliance</h4>
                                <p class="text-sm text-gray-600">International Maritime Organization standards</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="w-6 h-6 bg-primary-color rounded-full flex items-center justify-center mr-3 mt-1">
                                <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold mb-1">SOLAS & MARPOL</h4>
                                <p class="text-sm text-gray-600">Safety and environmental protection standards</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="w-6 h-6 bg-primary-color rounded-full flex items-center justify-center mr-3 mt-1">
                                <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold mb-1">Anti-Money Laundering</h4>
                                <p class="text-sm text-gray-600">AML/CFT compliance and due diligence</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="fade-in">
                    <h3 class="text-2xl font-bold mb-6">Quality Management</h3>
                    <p class="text-gray-600 mb-6 leading-relaxed">
                        Our quality management system ensures consistent delivery of high-quality services 
                        while maintaining compliance with international standards and client requirements.
                    </p>
                    <div class="space-y-4">
                        <div class="flex items-start">
                            <div class="w-6 h-6 bg-primary-color rounded-full flex items-center justify-center mr-3 mt-1">
                                <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold mb-1">ISO 9001:2015</h4>
                                <p class="text-sm text-gray-600">Quality management system certification</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="w-6 h-6 bg-primary-color rounded-full flex items-center justify-center mr-3 mt-1">
                                <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold mb-1">Continuous Improvement</h4>
                                <p class="text-sm text-gray-600">Regular audits and process optimization</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="w-6 h-6 bg-primary-color rounded-full flex items-center justify-center mr-3 mt-1">
                                <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold mb-1">Risk Management</h4>
                                <p class="text-sm text-gray-600">Comprehensive risk assessment and mitigation</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Maritime Resources Section -->
    <section class="section bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="section-title">Maritime Resources</h2>
                <p class="section-subtitle">
                    Useful tools, publications, and industry information
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Market Reports -->
                <div class="card text-center fade-in">
                    <div class="w-16 h-16 bg-primary-color rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold mb-4">Market Reports</h3>
                    <p class="text-gray-600 mb-4">
                        Access our latest market analysis and industry reports.
                    </p>
                    <a href="#" class="text-primary-color font-semibold hover:underline">View Reports</a>
                </div>

                <!-- Vessel Database -->
                <div class="card text-center fade-in">
                    <div class="w-16 h-16 bg-primary-color rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold mb-4">Vessel Database</h3>
                    <p class="text-gray-600 mb-4">
                        Comprehensive database of vessels and specifications.
                    </p>
                    <a href="#" class="text-primary-color font-semibold hover:underline">Search Database</a>
                </div>

                <!-- Industry Links -->
                <div class="card text-center fade-in">
                    <div class="w-16 h-16 bg-primary-color rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold mb-4">Industry Links</h3>
                    <p class="text-gray-600 mb-4">
                        Useful links to maritime organizations and resources.
                    </p>
                    <a href="#" class="text-primary-color font-semibold hover:underline">Browse Links</a>
                </div>

                <!-- Publications -->
                <div class="card text-center fade-in">
                    <div class="w-16 h-16 bg-primary-color rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold mb-4">Publications</h3>
                    <p class="text-gray-600 mb-4">
                        Industry publications and technical papers.
                    </p>
                    <a href="#" class="text-primary-color font-semibold hover:underline">Read Publications</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Legal Team -->
    <section class="section bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <div class="fade-in">
                    <h2 class="text-3xl font-bold mb-6">Need Legal Assistance?</h2>
                    <p class="text-xl mb-8 text-gray-600">
                        Our legal team is available to answer your questions about compliance, 
                        regulations, or any legal matters related to our services.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="{{ route('contact') }}" class="btn-primary">
                            Contact Legal Team
                        </a>
                        <a href="mailto:legal@globaltradehub.com" class="btn-secondary">
                            Email Legal
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

