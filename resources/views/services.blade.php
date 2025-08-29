@extends('layouts.app')

@section('title', 'Services - Global Trade Hub')
@section('description', 'Comprehensive maritime services including ship chartering, sale & purchase, valuation, inspection, technical services, and financial support.')

@section('content')
    <!-- Hero Section with Particles -->
        <section class="relative py-20 bg-gradient-to-br from-primary-color to-primary-dark text-white overflow-hidden">
            <!-- Canvas for particles -->
            <canvas id="particles" class="absolute inset-0 z-0"></canvas>

            <!-- Content -->
            <div class="container mx-auto px-4 text-center relative z-10">
                <div class="fade-in">
                    <h1 class="text-5xl md:text-6xl font-bold mb-6">Our Services</h1>
                    <p class="text-xl md:text-2xl opacity-90 max-w-3xl mx-auto">
                        Comprehensive maritime solutions tailored to meet your business needs
                    </p>
                </div>
            </div>
        </section>

    <!-- Services Overview Section -->
    <section class="section bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-extrabold mb-6 
                        bg-gradient-to-r from-[#499974] via-[#6d83d5] to-[#33978d] 
                        bg-clip-text text-transparent">Comprehensive Maritime Solutions</h2>
                <p class="section-subtitle">
                    From chartering to technical services, we provide end-to-end maritime solutions 
                    backed by decades of industry expertise
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Ship Sale & Purchase -->
                <div class="card fade-in text-center">
                    <div class="w-16 h-16 bg-blue-500 rounded-full flex items-center justify-center mx-auto mb-6 bg-gradient-to-br from-[#305b73] to-[#4a7c95]">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-4">Ship Sale & Purchase</h3>
                    <p class="text-gray-600 mb-6">
                        Complete S&P services for newbuild, second-hand, and scrap vessels with expert negotiation.
                    </p>
                    <a href="#sale-purchase" class="text-primary-color font-semibold hover:underline">
                        Learn More →
                    </a>
                </div>

                <!-- Ship Chartering -->
                <div class="card fade-in text-center">
                    <div class="w-16 h-16 bg-blue-500 rounded-full flex items-center justify-center mx-auto mb-6 bg-gradient-to-br from-[#305b73] to-[#4a7c95]">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-4">Ship Chartering</h3>
                    <p class="text-gray-600 mb-6">
                        Expert chartering services for all vessel types including tankers, bulk carriers, and containers.
                    </p>
                    <a href="#chartering" class="text-primary-color font-semibold hover:underline">
                        Learn More →
                    </a>
                </div>

                <!-- Valuation & Inspection -->
                <div class="card fade-in text-center">
                    <div class="w-16 h-16 bg-blue-500 rounded-full flex items-center justify-center mx-auto mb-6 bg-gradient-to-br from-[#305b73] to-[#4a7c95]">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-4">Valuation & Inspection</h3>
                    <p class="text-gray-600 mb-6">
                        Professional ship valuation and comprehensive inspection services with detailed reports.
                    </p>
                    <a href="#valuation" class="text-primary-color font-semibold hover:underline">
                        Learn More →
                    </a>
                </div>

                <!-- Technical Services -->
                <div class="card fade-in text-center">
                    <div class="w-16 h-16 bg-blue-500 rounded-full flex items-center justify-center mx-auto mb-6 bg-gradient-to-br from-[#305b73] to-[#4a7c95]">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-4">Technical Services</h3>
                    <p class="text-gray-600 mb-6">
                        Comprehensive technical and marine services including repairs, salvage, and towing.
                    </p>
                    <a href="#marine-services" class="text-primary-color font-semibold hover:underline">
                        Learn More →
                    </a>
                </div>

                <!-- Financial Support -->
                <div class="card fade-in text-center">
                    <div class="w-16 h-16 bg-blue-500 rounded-full flex items-center justify-center mx-auto mb-6 bg-gradient-to-br from-[#305b73] to-[#4a7c95]">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-4">Financial & Legal</h3>
                    <p class="text-gray-600 mb-6">
                        Financing advisory, legal support, and ship arrest/release services for maritime operations.
                    </p>
                    <a href="#financial-legal" class="text-primary-color font-semibold hover:underline">
                        Learn More →
                    </a>
                </div>
            </div>
        </div>
    </section>

    
    
    <!-- Global Styles -->
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500;700;800&display=swap');

    .wrapper {
        display: flex;
        justify-content: center;
    }

    .sp-card {
        position: relative;
        max-width: 500px;
        height: 400px;
        background-color: #fff;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        margin: 30px 10px;
        transition: height 0.4s ease-in-out;
    }

    .sp-card:hover {
        height: 700px;
    }

    .img-box {
        width: 100%;
        height: 300px;
        overflow: hidden;
    }

    .img-box img {
        width: 90%;
        height: 100%;
        margin-left: 25px;
        margin-top: 10px;
        object-fit: cover;
        transition: transform 0.4s ease;
    }

    .sp-card:hover .img-box img {
        transform: scale(1.5);
    }

    .content-img {
        position: relative;
        padding: 20px;
        text-align: center;
        color: #111;
        visibility: hidden;
        opacity: 0;
        transition: opacity 0.3s ease-in-out, margin-top 0.3s ease-in-out;
        margin-top: -120px;
    }

    .sp-card:hover .content-img {
        visibility: visible;
        opacity: 1;
        margin-top: 0;
        transition-delay: 0.3s;
    }
    </style>


   <!-- Ship Sale & Purchase Section -->
    <section id="sale-purchase" class="section bg-gray-50 py-12">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

                <!-- Left Content -->
                <div class="slide-in-left">
                    <h2 class="text-4xl font-extrabold mb-6 
                        bg-gradient-to-r from-[#499974] via-[#6d83d5] to-[#33978d] 
                        bg-clip-text text-transparent">
                    Ship Sale & Purchase
                    </h2>
                    <p class="text-lg text-gray-600 mb-8">
                        Our comprehensive S&P services cover the entire spectrum of vessel transactions,
                        from newbuild contracts to second-hand sales and scrap deals.
                    </p>

                    <div class="space-y-6">
                        <div class="flex items-start">
                            <div class="w-8 h-8 bg-gradient-to-br from-gray-300 via-[#4d7dd9] to-gray-500 rounded-full flex items-center justify-center mr-4 mt-1 shadow-md">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                    d="M5 13l4 4L19 7"></path>
                            </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold mb-2">Newbuild Contracts</h4>
                                <p class="text-gray-600">Expert negotiation and management of newbuild vessel contracts with
                                    leading shipyards.</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="w-8 h-8 bg-gradient-to-br from-gray-300 via-[#4d7dd9] to-gray-500 rounded-full flex items-center justify-center mr-4 mt-1 shadow-md">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                    d="M5 13l4 4L19 7"></path>
                            </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold mb-2">Second-hand Sales</h4>
                                <p class="text-gray-600">Professional handling of second-hand vessel transactions with
                                    thorough due diligence.</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="w-8 h-8 bg-gradient-to-br from-gray-300 via-[#4d7dd9] to-gray-500 rounded-full flex items-center justify-center mr-4 mt-1 shadow-md">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                    d="M5 13l4 4L19 7"></path>
                            </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold mb-2">Scrap Deals</h4>
                                <p class="text-gray-600">Specialized services for end-of-life vessels and scrap
                                    transactions.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Content Card -->
                <div class="slide-in-right">
                    <div class="wrapper">
                        <div class="sp-card">
                            <div class="img-box">
                                <img src="https://images.pexels.com/photos/799091/pexels-photo-799091.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500"
                                    alt="Ship Sale Image">
                            </div>
                            <div class="content-img">
                                <div class="bg-white p-8 rounded-lg shadow-lg">
                                    <h3 class="text-2xl font-bold mb-6">S&P Services Include:</h3>
                                    <ul class="space-y-4 text-left">
                                        <li class="flex items-start">
                                            <svg class="w-5 h-5 text-blue-500 mr-3 mt-1" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 13l4 4L19 7"></path>
                                            </svg>
                                            <span>Market analysis and vessel valuation</span>
                                        </li>
                                        <li class="flex items-start">
                                            <svg class="w-5 h-5 text-blue-500 mr-3 mt-1" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 13l4 4L19 7"></path>
                                            </svg>
                                            <span>Contract negotiation and drafting</span>
                                        </li>
                                        <li class="flex items-start">
                                            <svg class="w-5 h-5 text-blue-500 mr-3 mt-1" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 13l4 4L19 7"></path>
                                            </svg>
                                            <span>Technical and legal due diligence</span>
                                        </li>
                                        <li class="flex items-start">
                                            <svg class="w-5 h-5 text-blue-500 mr-3 mt-1" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 13l4 4L19 7"></path>
                                            </svg>
                                            <span>Financing and payment structuring</span>
                                        </li>
                                        <li class="flex items-start">
                                            <svg class="w-5 h-5 text-blue-500 mr-3 mt-1" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 13l4 4L19 7"></path>
                                            </svg>
                                            <span>Delivery and closing coordination</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

<!-- Ship Chartering Section -->
    <section id="chartering" class="section bg-white py-12">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                
                <!-- Left Content -->
                <div class="slide-in-left">
                    <h2 class="text-4xl font-extrabold mb-6 
                        bg-gradient-to-r from-[#499974] via-[#6d83d5] to-[#33978d] 
                        bg-clip-text text-transparent">Ship Chartering</h2>
                    <p class="text-lg text-gray-600 mb-8">
                        Our chartering services provide flexible solutions for all vessel types and cargo requirements, 
                        backed by extensive market knowledge and global network.
                    </p>

                    <div class="space-y-6">
                        <div class="flex items-start">
                            <div class="w-8 h-8 bg-gradient-to-br from-gray-300 via-[#4d7dd9] to-gray-500 rounded-full flex items-center justify-center mr-4 mt-1 shadow-md">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                    d="M5 13l4 4L19 7"></path>
                            </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold mb-2">Market Intelligence</h4>
                                <p class="text-gray-600">Real-time market analysis and rate optimization for maximum value.</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="w-8 h-8 bg-gradient-to-br from-gray-300 via-[#4d7dd9] to-gray-500 rounded-full flex items-center justify-center mr-4 mt-1 shadow-md">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                    d="M5 13l4 4L19 7"></path>
                            </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold mb-2">Contract Management</h4>
                                <p class="text-gray-600">Professional contract negotiation and ongoing management support.</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="w-8 h-8 bg-gradient-to-br from-gray-300 via-[#4d7dd9] to-gray-500 rounded-full flex items-center justify-center mr-4 mt-1 shadow-md">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                    d="M5 13l4 4L19 7"></path>
                            </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold mb-2">Operational Support</h4>
                                <p class="text-gray-600">24/7 operational support and voyage monitoring services.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Content as Card -->
            <div class="slide-in-right">
                <div class="wrapper">
                    <div class="sp-card">
                        <div class="img-box">
                            <img src="https://images.pexels.com/photos/799091/pexels-photo-799091.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="Chartering Image">
                        </div>
                        <div class="content-img">
                            <div class="bg-white p-8 rounded-lg shadow-lg">
                                <h3 class="text-2xl font-bold mb-6">Chartering Services:</h3>
                                <ul class="space-y-4 text-left">
                                    <li>Voyage Charter – Flexible cargo-specific charters</li>
                                    <li>Time Charter – Longer-term vessel hire</li>
                                    <li>Bareboat Charter – Full vessel control</li>
                                    <li>Tanker Chartering – CPP/DPP, LPG/LNG tankers</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            </div>
        </div>
    </section>

    <!-- Ship Valuation & Inspection Section -->
    <section id="valuation" class="section bg-gray-50 py-12">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            
            <!-- Left Content -->
            <div class="slide-in-left">
                <h2 class="text-4xl font-extrabold mb-6 
                        bg-gradient-to-r from-[#499974] via-[#6d83d5] to-[#33978d] 
                        bg-clip-text text-transparent">Ship Valuation & Inspection</h2>
                <p class="text-lg text-gray-600 mb-8">
                    Professional valuation and inspection services providing accurate assessments 
                    and detailed reports for informed decision-making.
                </p>
                
                <div class="space-y-6">
                    <div class="flex items-start">
                        <div class="w-8 h-8 bg-gradient-to-br from-gray-300 via-[#4d7dd9] to-gray-500 rounded-full flex items-center justify-center mr-4 mt-1 shadow-md">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                d="M5 13l4 4L19 7"></path>
                        </svg>
                        </div>
                        <div>
                            <h4 class="font-semibold mb-2">Condition Inspections</h4>
                            <p class="text-gray-600">Comprehensive vessel condition assessments by certified marine surveyors.</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start">
                        <div class="w-8 h-8 bg-gradient-to-br from-gray-300 via-[#4d7dd9] to-gray-500 rounded-full flex items-center justify-center mr-4 mt-1 shadow-md">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                    d="M5 13l4 4L19 7"></path>
                            </svg>
                            </div>
                        <div>
                            <h4 class="font-semibold mb-2">Survey Coordination</h4>
                            <p class="text-gray-600">Efficient coordination of all survey activities and documentation.</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start">
                        <div class="w-8 h-8 bg-gradient-to-br from-gray-300 via-[#4d7dd9] to-gray-500 rounded-full flex items-center justify-center mr-4 mt-1 shadow-md">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                    d="M5 13l4 4L19 7"></path>
                            </svg>
                            </div>
                        <div>
                            <h4 class="font-semibold mb-2">Market Valuation</h4>
                            <p class="text-gray-600">Accurate market-based valuations using industry-standard methodologies.</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Right Side as Expandable Card -->
             <div class="slide-in-right">
            <div class="wrapper">
                <div class="sp-card">
                    <div class="img-box">
                        <img src="https://images.pexels.com/photos/799091/pexels-photo-799091.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="Valuation Image">
                    </div>
                    <div class="content-img">
                        <div class="bg-white p-8 rounded-lg shadow-lg">
                            <h3 class="text-2xl font-bold mb-6">Inspection Services:</h3>
                            <ul class="space-y-4 text-left">
                                <li>Hull and machinery condition assessment</li>
                                <li>Safety equipment and certification review</li>
                                <li>Documentation and compliance verification</li>
                                <li>Detailed photographic and video documentation</li>
                                <li>Comprehensive written reports and recommendations</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div></div>

        </div>
    </div>
</section>


    <!-- Technical & Marine Services Section -->
   <section id="marine-services" class="section bg-white py-12">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

                <!-- Left Side Content -->
                <div class="slide-in-left">
                    <h2 class="text-4xl font-extrabold mb-6 
                        bg-gradient-to-r from-[#499974] via-[#6d83d5] to-[#33978d] 
                        bg-clip-text text-transparent">Technical & Marine Services</h2>
                    <p class="text-lg text-gray-600 mb-8">
                        Comprehensive technical and marine services ensuring safe, efficient, and 
                        cost-effective vessel operations worldwide.
                    </p>

                    <div class="space-y-6">
                        <div class="flex items-start">
                            <div class="w-8 h-8 bg-gradient-to-br from-gray-300 via-[#4d7dd9] to-gray-500 rounded-full flex items-center justify-center mr-4 mt-1 shadow-md">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                    d="M5 13l4 4L19 7"></path>
                            </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold mb-2">Global Network</h4>
                                <p class="text-gray-600">Access to worldwide network of approved service providers and shipyards.</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="w-8 h-8 bg-gradient-to-br from-gray-300 via-[#4d7dd9] to-gray-500 rounded-full flex items-center justify-center mr-4 mt-1 shadow-md">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                    d="M5 13l4 4L19 7"></path>
                            </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold mb-2">Quality Assurance</h4>
                                <p class="text-gray-600">Rigorous quality control and oversight of all technical operations.</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="w-8 h-8 bg-gradient-to-br from-gray-300 via-[#4d7dd9] to-gray-500 rounded-full flex items-center justify-center mr-4 mt-1 shadow-md">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                    d="M5 13l4 4L19 7"></path>
                            </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold mb-2">Cost Optimization</h4>
                                <p class="text-gray-600">Strategic planning to minimize costs while maintaining quality standards.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Side as Expandable Card -->
                 <div class="slide-in-right">
                <div class="wrapper">
                    <div class="sp-card">
                        <div class="img-box">
                            <img src="https://images.pexels.com/photos/799091/pexels-photo-799091.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="Technical & Marine Services">
                        </div>
                        <div class="content-img">
                            <div class="bg-gray-50 p-8 rounded-lg shadow-lg">
                                <h3 class="text-2xl font-bold mb-6">Technical Services:</h3>
                                <ul class="space-y-4 text-left">
                                    <li>Repairs & Maintenance – Coordination of vessel repairs and maintenance at global shipyards.</li>
                                    <li>Salvage Operations – Emergency response and salvage coordination for distressed vessels.</li>
                                    <li>Towing Services – Professional towing and escort services for all vessel types.</li>
                                    <li>Technical Consulting – Expert technical advice and project management services.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div></div>

            </div>
        </div>
    </section>


    <!-- Financial & Legal Support Section -->
   <section id="financial-legal" class="section bg-gray-50 py-12">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

                <!-- Left Content -->
                <div class="slide-in-left">
                    <h2 class="text-4xl font-extrabold mb-6 
                        bg-gradient-to-r from-[#499974] via-[#6d83d5] to-[#33978d] 
                        bg-clip-text text-transparent">Financial & Legal Support</h2>
                    <p class="text-lg text-gray-600 mb-8">
                        Comprehensive financial and legal services to support your maritime operations 
                        and ensure compliance with international regulations.
                    </p>

                    <div class="space-y-6">
                        <div class="flex items-start">
                            <div class="w-8 h-8 bg-gradient-to-br from-gray-300 via-[#4d7dd9] to-gray-500 rounded-full flex items-center justify-center mr-4 mt-1 shadow-md">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                    d="M5 13l4 4L19 7"></path>
                            </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold mb-2">Financing Advisory</h4>
                                <p class="text-gray-600">Expert guidance on vessel financing, leasing, and investment structures.</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="w-8 h-8 bg-gradient-to-br from-gray-300 via-[#4d7dd9] to-gray-500 rounded-full flex items-center justify-center mr-4 mt-1 shadow-md">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                    d="M5 13l4 4L19 7"></path>
                            </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold mb-2">Ship Arrest/Release</h4>
                                <p class="text-gray-600">Professional handling of ship arrest and release procedures worldwide.</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="w-8 h-8 bg-gradient-to-br from-gray-300 via-[#4d7dd9] to-gray-500 rounded-full flex items-center justify-center mr-4 mt-1 shadow-md">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                    d="M5 13l4 4L19 7"></path>
                            </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold mb-2">Legal Compliance</h4>
                                <p class="text-gray-600">Ensuring compliance with international maritime laws and regulations.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Side as Expandable Card -->
                 <div class="slide-in-right">
                <div class="wrapper">
                    <div class="sp-card">
                        <div class="img-box">
                            <img src="https://images.pexels.com/photos/799091/pexels-photo-799091.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="Financial & Legal Support">
                        </div>
                        <div class="content-img">
                            <div class="bg-white p-8 rounded-lg shadow-lg">
                                <h3 class="text-2xl font-bold mb-6">Financial & Legal Services:</h3>
                                <ul class="space-y-4 text-left">
                                    <li>Vessel financing and leasing arrangements</li>
                                    <li>Investment and portfolio management</li>
                                    <li>Contract review and legal documentation</li>
                                    <li>Dispute resolution and arbitration support</li>
                                    <li>Regulatory compliance and risk management</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div></div>

            </div>
        </div>
    </section>


    <!-- CTA Section -->
    <section class="section bg-primary-color text-white">
        <div class="container mx-auto px-4 text-center">
            <div class="fade-in">
                <h2 class="text-4xl font-bold mb-6">Ready to Get Started?</h2>
                <p class="text-xl mb-8 opacity-90 max-w-2xl mx-auto">
                    Contact us today to discuss your specific requirements and discover how our 
                    comprehensive maritime services can benefit your operations.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('contact') }}" class="btn-primary bg-gray-800 text-lg px-8 py-4 transform scale-105 ">
                        Request a Quote
                    </a>
                    <a href="{{ route('contact') }}" class="border-2 border-white text-white px-8 py-4 rounded-lg font-semibold hover:bg-white hover:text-gray-800 transition-colors">
                        Contact Us
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection

