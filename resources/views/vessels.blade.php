@extends('layouts.app')

@section('title', 'Vessel Listings - Global Trade Hub')
@section('description', 'Browse our comprehensive vessel listings for sale and charter. Find dry bulk carriers, tankers, cargo vessels, container ships, and offshore service vessels.')

@section('content')
    <!-- Hero Section with Particles -->
        <section class="relative py-20 bg-gradient-to-br from-primary-color to-primary-dark text-white overflow-hidden">
            <!-- Canvas for particles -->
            <canvas id="particles" class="absolute inset-0 z-0"></canvas>

            <!-- Content -->
            <div class="container mx-auto px-4 text-center relative z-10">
                <div class="fade-in">
                    <h1 class="text-5xl md:text-6xl font-bold mb-6">Vessel Listings</h1>
                    <p class="text-xl md:text-2xl opacity-90 max-w-3xl mx-auto">
                        Browse our comprehensive selection of vessels available for sale and charter
                    </p>
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


    <!-- Search & Filter Section -->
    <section class="section bg-white">
        <div class="container mx-auto px-4">
            <div class="card">
                <h2 class="text-2xl font-bold mb-6">Search & Filter Vessels</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
                    <!-- Vessel Type Filter -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Vessel Type</label>
                        <select class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-color focus:border-transparent">
                            <option value="">All Types</option>
                            <option value="bulk">Dry Bulk Carriers</option>
                            <option value="tanker">Tankers</option>
                            <option value="cargo">General Cargo</option>
                            <option value="container">Container Ships</option>
                            <option value="offshore">Offshore Service</option>
                        </select>
                    </div>

                    <!-- Status Filter -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                        <select class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-color focus:border-transparent">
                            <option value="">All Status</option>
                            <option value="sale">For Sale</option>
                            <option value="charter">For Charter</option>
                        </select>
                    </div>

                    <!-- DWT Range -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">DWT Range</label>
                        <select class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-color focus:border-transparent">
                            <option value="">All Sizes</option>
                            <option value="0-10000">0 - 10,000 DWT</option>
                            <option value="10000-50000">10,000 - 50,000 DWT</option>
                            <option value="50000-100000">50,000 - 100,000 DWT</option>
                            <option value="100000+">100,000+ DWT</option>
                        </select>
                    </div>

                    <!-- Built Year -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Built Year</label>
                        <select class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-color focus:border-transparent">
                            <option value="">All Years</option>
                            <option value="2020+">2020+</option>
                            <option value="2015-2019">2015-2019</option>
                            <option value="2010-2014">2010-2014</option>
                            <option value="2000-2009">2000-2009</option>
                            <option value="pre-2000">Pre-2000</option>
                        </select>
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row gap-4">
                    <button class="btn-primary flex-1">Search Vessels</button>
                    <button class="btn-secondary flex-1">Clear Filters</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Vessel Types Overview -->
    <section class="section bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="section-title">Vessel Types We Handle</h2>
                <p class="section-subtitle">
                    Comprehensive coverage across all major vessel categories
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6">
                <!-- Dry Bulk Carriers -->
                <div class="card fade-in text-center">
                    <div class="w-16 h-16 bg-primary-color rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                    <h3 class="font-bold mb-2">Dry Bulk Carriers</h3>
                    <p class="text-sm text-gray-600">Handysize to Capesize</p>
                </div>

                <!-- Tankers -->
                <div class="card fade-in text-center">
                    <div class="w-16 h-16 bg-primary-color rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                    <h3 class="font-bold mb-2">Tankers</h3>
                    <p class="text-sm text-gray-600">CPP, DPP, LPG/LNG</p>
                </div>

                <!-- General Cargo -->
                <div class="card fade-in text-center">
                    <div class="w-16 h-16 bg-primary-color rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                    </div>
                    <h3 class="font-bold mb-2">General Cargo</h3>
                    <p class="text-sm text-gray-600">Multi-purpose vessels</p>
                </div>

                <!-- Container Ships -->
                <div class="card fade-in text-center">
                    <div class="w-16 h-16 bg-primary-color rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                    </div>
                    <h3 class="font-bold mb-2">Container Ships</h3>
                    <p class="text-sm text-gray-600">Feeder to Ultra Large</p>
                </div>

                <!-- Offshore Service -->
                <div class="card fade-in text-center">
                    <div class="w-16 h-16 bg-primary-color rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                    <h3 class="font-bold mb-2">Offshore Service</h3>
                    <p class="text-sm text-gray-600">PSV, AHTS, OSV</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Vessels Section -->
    <section class="section bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="section-title">Featured Vessels</h2>
                <p class="section-subtitle">
                    Explore our latest vessel listings with detailed specifications and competitive pricing
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Vessel 1 -->
                <div class="card fade-in">
                    <div class="bg-gray-200 h-48 rounded-lg mb-4 flex items-center justify-center">
                        <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <div class="flex justify-between items-start mb-3">
                        <h3 class="text-xl font-bold">Bulk Carrier - 82,000 DWT</h3>
                        <span class="bg-green-100 text-green-800 text-xs font-semibold px-2 py-1 rounded">For Charter</span>
                    </div>
                    <div class="space-y-2 mb-4">
                        <p class="text-gray-600"><strong>Built:</strong> 2018</p>
                        <p class="text-gray-600"><strong>Flag:</strong> Panama</p>
                        <p class="text-gray-600"><strong>Class:</strong> BV</p>
                        <p class="text-gray-600"><strong>Gear:</strong> 4 x 30t cranes</p>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-primary-color font-semibold text-lg">$25,000/day</span>
                        <a href="#" class="btn-primary">Inquire</a>
                    </div>
                </div>

                <!-- Vessel 2 -->
                <div class="card fade-in">
                    <div class="bg-gray-200 h-48 rounded-lg mb-4 flex items-center justify-center">
                        <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <div class="flex justify-between items-start mb-3">
                        <h3 class="text-xl font-bold">Tanker - 115,000 DWT</h3>
                        <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2 py-1 rounded">For Sale</span>
                    </div>
                    <div class="space-y-2 mb-4">
                        <p class="text-gray-600"><strong>Built:</strong> 2020</p>
                        <p class="text-gray-600"><strong>Flag:</strong> Singapore</p>
                        <p class="text-gray-600"><strong>Class:</strong> LR</p>
                        <p class="text-gray-600"><strong>Type:</strong> CPP Tanker</p>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-primary-color font-semibold text-lg">$45M</span>
                        <a href="#" class="btn-primary">Inquire</a>
                    </div>
                </div>

                <!-- Vessel 3 -->
                <div class="card fade-in">
                    <div class="bg-gray-200 h-48 rounded-lg mb-4 flex items-center justify-center">
                        <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <div class="flex justify-between items-start mb-3">
                        <h3 class="text-xl font-bold">Container Ship - 8,500 TEU</h3>
                        <span class="bg-green-100 text-green-800 text-xs font-semibold px-2 py-1 rounded">For Charter</span>
                    </div>
                    <div class="space-y-2 mb-4">
                        <p class="text-gray-600"><strong>Built:</strong> 2019</p>
                        <p class="text-gray-600"><strong>Flag:</strong> Hong Kong</p>
                        <p class="text-gray-600"><strong>Class:</strong> DNV</p>
                        <p class="text-gray-600"><strong>Eco:</strong> Tier III</p>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-primary-color font-semibold text-lg">$35,000/day</span>
                        <a href="#" class="btn-primary">Inquire</a>
                    </div>
                </div>

                <!-- Vessel 4 -->
                <div class="card fade-in">
                    <div class="bg-gray-200 h-48 rounded-lg mb-4 flex items-center justify-center">
                        <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <div class="flex justify-between items-start mb-3">
                        <h3 class="text-xl font-bold">General Cargo - 12,000 DWT</h3>
                        <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2 py-1 rounded">For Sale</span>
                    </div>
                    <div class="space-y-2 mb-4">
                        <p class="text-gray-600"><strong>Built:</strong> 2017</p>
                        <p class="text-gray-600"><strong>Flag:</strong> Malta</p>
                        <p class="text-gray-600"><strong>Class:</strong> ABS</p>
                        <p class="text-gray-600"><strong>Gear:</strong> 2 x 50t cranes</p>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-primary-color font-semibold text-lg">$18M</span>
                        <a href="#" class="btn-primary">Inquire</a>
                    </div>
                </div>

                <!-- Vessel 5 -->
                <div class="card fade-in">
                    <div class="bg-gray-200 h-48 rounded-lg mb-4 flex items-center justify-center">
                        <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <div class="flex justify-between items-start mb-3">
                        <h3 class="text-xl font-bold">LNG Tanker - 174,000 m³</h3>
                        <span class="bg-green-100 text-green-800 text-xs font-semibold px-2 py-1 rounded">For Charter</span>
                    </div>
                    <div class="space-y-2 mb-4">
                        <p class="text-gray-600"><strong>Built:</strong> 2021</p>
                        <p class="text-gray-600"><strong>Flag:</strong> Norway</p>
                        <p class="text-gray-600"><strong>Class:</strong> DNV</p>
                        <p class="text-gray-600"><strong>Type:</strong> Membrane</p>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-primary-color font-semibold text-lg">$85,000/day</span>
                        <a href="#" class="btn-primary">Inquire</a>
                    </div>
                </div>

                <!-- Vessel 6 -->
                <div class="card fade-in">
                    <div class="bg-gray-200 h-48 rounded-lg mb-4 flex items-center justify-center">
                        <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <div class="flex justify-between items-start mb-3">
                        <h3 class="text-xl font-bold">PSV - 4,000 DWT</h3>
                        <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2 py-1 rounded">For Sale</span>
                    </div>
                    <div class="space-y-2 mb-4">
                        <p class="text-gray-600"><strong>Built:</strong> 2016</p>
                        <p class="text-gray-600"><strong>Flag:</strong> UK</p>
                        <p class="text-gray-600"><strong>Class:</strong> LR</p>
                        <p class="text-gray-600"><strong>Type:</strong> Platform Supply</p>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-primary-color font-semibold text-lg">$12M</span>
                        <a href="#" class="btn-primary">Inquire</a>
                    </div>
                </div>
            </div>
            
            <!-- Pagination -->
            <div class="flex justify-center mt-12">
                <nav class="flex items-center space-x-2">
                    <a href="#" class="px-3 py-2 text-gray-500 hover:text-primary-color">Previous</a>
                    <a href="#" class="px-3 py-2 bg-primary-color text-white rounded">1</a>
                    <a href="#" class="px-3 py-2 text-gray-500 hover:text-primary-color">2</a>
                    <a href="#" class="px-3 py-2 text-gray-500 hover:text-primary-color">3</a>
                    <a href="#" class="px-3 py-2 text-gray-500 hover:text-primary-color">Next</a>
                </nav>
            </div>
        </div>
    </section>

    <!-- Vessel Inquiry Form -->
    <section class="section bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="max-w-2xl mx-auto">
                <div class="card">
                    <h2 class="text-2xl font-bold mb-6 text-center">Vessel Inquiry</h2>
                    <p class="text-gray-600 mb-8 text-center">
                        Interested in any of our vessels? Send us your inquiry and we'll get back to you promptly.
                    </p>
                    
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
                            <label class="block text-sm font-medium text-gray-700 mb-2">Company</label>
                            <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-color focus:border-transparent">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Vessel of Interest</label>
                            <select class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-color focus:border-transparent">
                                <option value="">Select a vessel</option>
                                <option value="bulk-82000">Bulk Carrier - 82,000 DWT</option>
                                <option value="tanker-115000">Tanker - 115,000 DWT</option>
                                <option value="container-8500">Container Ship - 8,500 TEU</option>
                                <option value="cargo-12000">General Cargo - 12,000 DWT</option>
                                <option value="lng-174000">LNG Tanker - 174,000 m³</option>
                                <option value="psv-4000">PSV - 4,000 DWT</option>
                            </select>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Inquiry Type</label>
                            <select class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-color focus:border-transparent">
                                <option value="">Select inquiry type</option>
                                <option value="sale">Purchase Inquiry</option>
                                <option value="charter">Charter Inquiry</option>
                                <option value="inspection">Inspection Request</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Message *</label>
                            <textarea rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-color focus:border-transparent" placeholder="Please provide details about your inquiry..." required></textarea>
                        </div>
                        
                        <div class="text-center">
                            <button type="submit" class="btn-primary px-8 py-3">Send Inquiry</button>
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
                <h2 class="text-4xl font-bold mb-6">Need a Specific Vessel?</h2>
                <p class="text-xl mb-8 opacity-90 max-w-2xl mx-auto">
                    Can't find what you're looking for? Our extensive network can help source the perfect 
                    vessel for your requirements.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('contact') }}" class="bg-white text-primary-color px-8 py-4 rounded-lg font-semibold hover:bg-gray-100 transition-colors">
                        Contact Us
                    </a>
                    <a href="{{ route('services') }}" class="border-2 border-white text-white px-8 py-4 rounded-lg font-semibold hover:bg-white hover:text-primary-color transition-colors">
                        Our Services
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection

