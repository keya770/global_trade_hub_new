@extends('layouts.app')

@section('title', 'Sectors We Serve - Global Trade Hub')
@section('description', 'Explore the maritime sectors we serve including Dry Bulk Carriers, Tankers, General Cargo, Container Ships, and Offshore Service Vessels.')

@section('content')
    <!-- Hero Section -->
    <section class="relative py-20 bg-gradient-to-br from-primary-color to-primary-dark text-white">
        <div class="container mx-auto px-4 text-center">
            <div class="fade-in">
                <h1 class="text-5xl md:text-6xl font-bold mb-6">Sectors We Serve</h1>
                <p class="text-xl md:text-2xl opacity-90 max-w-3xl mx-auto">
                    Comprehensive maritime services across all major shipping sectors
                </p>
            </div>
        </div>
    </section>

    <!-- Sectors Overview -->
    <section class="section bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="section-title">Our Expertise Across Maritime Sectors</h2>
                <p class="section-subtitle">
                    From dry bulk to specialized vessels, we provide expert services across all major shipping sectors
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Dry Bulk Carriers -->
                <div class="card fade-in text-center group">
                    <div class="w-20 h-20 bg-primary-color rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">Dry Bulk Carriers</h3>
                    <p class="text-gray-600 mb-6">
                        Specialized vessels for transporting dry cargo including grains, coal, iron ore, and other bulk commodities.
                    </p>
                    <ul class="text-left space-y-2 text-sm text-gray-600">
                        <li>• Handysize, Supramax, Panamax</li>
                        <li>• Capesize, Newcastlemax</li>
                        <li>• Chartering & S&P Services</li>
                        <li>• Market Analysis & Valuation</li>
                    </ul>
                </div>

                <!-- Tankers -->
                <div class="card fade-in text-center group">
                    <div class="w-20 h-20 bg-primary-color rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">Tankers</h3>
                    <p class="text-gray-600 mb-6">
                        Oil and chemical tankers for transporting liquid cargo including crude oil, refined products, and chemicals.
                    </p>
                    <ul class="text-left space-y-2 text-sm text-gray-600">
                        <li>• CPP (Clean Petroleum Products)</li>
                        <li>• DPP (Dirty Petroleum Products)</li>
                        <li>• LPG/LNG Carriers</li>
                        <li>• Chemical Tankers</li>
                    </ul>
                </div>

                <!-- General Cargo -->
                <div class="card fade-in text-center group">
                    <div class="w-20 h-20 bg-primary-color rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">General Cargo</h3>
                    <p class="text-gray-600 mb-6">
                        Versatile vessels designed to carry various types of cargo including project cargo and heavy lifts.
                    </p>
                    <ul class="text-left space-y-2 text-sm text-gray-600">
                        <li>• Multi-purpose Vessels</li>
                        <li>• Heavy Lift Carriers</li>
                        <li>• Project Cargo Specialists</li>
                        <li>• Breakbulk Operations</li>
                    </ul>
                </div>

                <!-- Container Ships -->
                <div class="card fade-in text-center group">
                    <div class="w-20 h-20 bg-primary-color rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zM21 5a2 2 0 00-2-2h-4a2 2 0 00-2 2v12a4 4 0 004 4h4a2 2 0 002-2V5z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">Container Ships</h3>
                    <p class="text-gray-600 mb-6">
                        Modern container vessels for efficient transportation of containerized cargo across global trade routes.
                    </p>
                    <ul class="text-left space-y-2 text-sm text-gray-600">
                        <li>• Feeder Vessels</li>
                        <li>• Panamax & Post-Panamax</li>
                        <li>• Ultra Large Container Ships</li>
                        <li>• Chartering & S&P Services</li>
                    </ul>
                </div>

                <!-- Offshore Service Vessels -->
                <div class="card fade-in text-center group">
                    <div class="w-20 h-20 bg-primary-color rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">Offshore Service Vessels</h3>
                    <p class="text-gray-600 mb-6">
                        Specialized vessels supporting offshore oil and gas operations, wind farms, and marine construction.
                    </p>
                    <ul class="text-left space-y-2 text-sm text-gray-600">
                        <li>• Platform Supply Vessels</li>
                        <li>• Anchor Handling Tugs</li>
                        <li>• Crew Transfer Vessels</li>
                        <li>• Offshore Support</li>
                    </ul>
                </div>

                <!-- Specialized Vessels -->
                <div class="card fade-in text-center group">
                    <div class="w-20 h-20 bg-primary-color rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">Specialized Vessels</h3>
                    <p class="text-gray-600 mb-6">
                        Unique vessels for specific operations including research, fishing, and specialized transport.
                    </p>
                    <ul class="text-left space-y-2 text-sm text-gray-600">
                        <li>• Research Vessels</li>
                        <li>• Fishing Vessels</li>
                        <li>• Passenger Ferries</li>
                        <li>• Custom Solutions</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Detailed Sector Information -->
    <section class="section bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="section-title">Detailed Sector Analysis</h2>
                <p class="section-subtitle">
                    In-depth insights into each sector's market dynamics and our specialized services
                </p>
            </div>

            <!-- Dry Bulk Carriers Section -->
            <div class="mb-20">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                    <div class="fade-in">
                        <h3 class="text-3xl font-bold mb-6 text-gray-800">Dry Bulk Carriers</h3>
                        <p class="text-gray-600 mb-6 leading-relaxed">
                            Dry bulk carriers form the backbone of global commodity trade, transporting essential raw materials 
                            that power the world's economies. Our expertise spans all vessel sizes and market segments.
                        </p>
                        <div class="space-y-4">
                            <div class="flex items-start">
                                <div class="w-6 h-6 bg-primary-color rounded-full flex items-center justify-center mr-3 mt-1">
                                    <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold mb-1">Vessel Sizes</h4>
                                    <p class="text-sm text-gray-600">Handysize (10,000-35,000 DWT) to Capesize (180,000+ DWT)</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="w-6 h-6 bg-primary-color rounded-full flex items-center justify-center mr-3 mt-1">
                                    <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold mb-1">Cargo Types</h4>
                                    <p class="text-sm text-gray-600">Iron ore, coal, grain, bauxite, phosphate, and other dry bulk commodities</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="w-6 h-6 bg-primary-color rounded-full flex items-center justify-center mr-3 mt-1">
                                    <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold mb-1">Our Services</h4>
                                    <p class="text-sm text-gray-600">Chartering, sale & purchase, valuation, and market analysis</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-200 h-80 rounded-lg flex items-center justify-center">
                        <div class="text-center">
                            <svg class="w-24 h-24 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                            <p class="text-gray-600">Dry Bulk Carrier Image</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tankers Section -->
            <div class="mb-20">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                    <div class="bg-gray-200 h-80 rounded-lg flex items-center justify-center lg:order-2">
                        <div class="text-center">
                            <svg class="w-24 h-24 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
                            </svg>
                            <p class="text-gray-600">Tanker Image</p>
                        </div>
                    </div>
                    <div class="fade-in lg:order-1">
                        <h3 class="text-3xl font-bold mb-6 text-gray-800">Tankers</h3>
                        <p class="text-gray-600 mb-6 leading-relaxed">
                            Tankers are essential for global energy security, transporting crude oil, refined products, 
                            and chemicals. We specialize in all tanker segments with deep market knowledge.
                        </p>
                        <div class="space-y-4">
                            <div class="flex items-start">
                                <div class="w-6 h-6 bg-primary-color rounded-full flex items-center justify-center mr-3 mt-1">
                                    <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold mb-1">CPP Tankers</h4>
                                    <p class="text-sm text-gray-600">Clean petroleum products including gasoline, diesel, and jet fuel</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="w-6 h-6 bg-primary-color rounded-full flex items-center justify-center mr-3 mt-1">
                                    <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold mb-1">DPP Tankers</h4>
                                    <p class="text-sm text-gray-600">Crude oil and dirty petroleum products transportation</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="w-6 h-6 bg-primary-color rounded-full flex items-center justify-center mr-3 mt-1">
                                    <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold mb-1">LPG/LNG Carriers</h4>
                                    <p class="text-sm text-gray-600">Specialized vessels for liquefied petroleum and natural gas</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Container Ships Section -->
            <div class="mb-20">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                    <div class="fade-in">
                        <h3 class="text-3xl font-bold mb-6 text-gray-800">Container Ships</h3>
                        <p class="text-gray-600 mb-6 leading-relaxed">
                            Container ships are the workhorses of global trade, carrying manufactured goods and consumer 
                            products across international markets with unmatched efficiency and reliability.
                        </p>
                        <div class="space-y-4">
                            <div class="flex items-start">
                                <div class="w-6 h-6 bg-primary-color rounded-full flex items-center justify-center mr-3 mt-1">
                                    <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold mb-1">Vessel Categories</h4>
                                    <p class="text-sm text-gray-600">Feeder, Panamax, Post-Panamax, and Ultra Large Container Ships</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="w-6 h-6 bg-primary-color rounded-full flex items-center justify-center mr-3 mt-1">
                                    <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold mb-1">Trade Routes</h4>
                                    <p class="text-sm text-gray-600">Major trade lanes including Asia-Europe, Trans-Pacific, and regional routes</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="w-6 h-6 bg-primary-color rounded-full flex items-center justify-center mr-3 mt-1">
                                    <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold mb-1">Market Services</h4>
                                    <p class="text-sm text-gray-600">Chartering, sale & purchase, and market intelligence</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-200 h-80 rounded-lg flex items-center justify-center">
                        <div class="text-center">
                            <svg class="w-24 h-24 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zM21 5a2 2 0 00-2-2h-4a2 2 0 00-2 2v12a4 4 0 004 4h4a2 2 0 002-2V5z"></path>
                            </svg>
                            <p class="text-gray-600">Container Ship Image</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Market Statistics -->
    <section class="section bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="section-title">Sector Market Statistics</h2>
                <p class="section-subtitle">
                    Key metrics and insights across major maritime sectors
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="card text-center fade-in">
                    <div class="text-4xl font-bold text-primary-color mb-2">2,500+</div>
                    <h3 class="text-lg font-semibold mb-2">Dry Bulk Vessels</h3>
                    <p class="text-gray-600">Handled in transactions</p>
                </div>
                
                <div class="card text-center fade-in">
                    <div class="text-4xl font-bold text-primary-color mb-2">1,800+</div>
                    <h3 class="text-lg font-semibold mb-2">Tanker Deals</h3>
                    <p class="text-gray-600">Completed successfully</p>
                </div>
                
                <div class="card text-center fade-in">
                    <div class="text-4xl font-bold text-primary-color mb-2">950+</div>
                    <h3 class="text-lg font-semibold mb-2">Container Ships</h3>
                    <p class="text-gray-600">Chartered annually</p>
                </div>
                
                <div class="card text-center fade-in">
                    <div class="text-4xl font-bold text-primary-color mb-2">500+</div>
                    <h3 class="text-lg font-semibold mb-2">Specialized Vessels</h3>
                    <p class="text-gray-600">Expert consultations</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="section bg-primary-color text-white">
        <div class="container mx-auto px-4 text-center">
            <div class="fade-in">
                <h2 class="text-4xl font-bold mb-6">Ready to Explore Our Sectors?</h2>
                <p class="text-xl mb-8 opacity-90 max-w-2xl mx-auto">
                    Discover how our sector expertise can benefit your maritime operations 
                    and help you navigate complex market dynamics.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('services') }}" class="bg-white text-primary-color px-8 py-4 rounded-lg font-semibold hover:bg-gray-100 transition-colors">
                        Our Services
                    </a>
                    <a href="{{ route('contact') }}" class="border-2 border-white text-white px-8 py-4 rounded-lg font-semibold hover:bg-white hover:text-primary-color transition-colors">
                        Get in Touch
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection

