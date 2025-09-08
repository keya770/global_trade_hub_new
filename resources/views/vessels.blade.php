@extends('layouts.app')

@section('title', 'Vessel Listings - SMA Ship Brokers')
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
                    @if(isset($stats) && $stats['total_vessels'] > 0)
                    <div class="mt-8 flex flex-wrap justify-center gap-8 text-center">
                        <div class="bg-white bg-opacity-20 rounded-lg p-4">
                            <div class="text-3xl font-bold">{{ $stats['total_vessels'] }}+</div>
                            <div class="text-sm opacity-90">Total Vessels</div>
                        </div>
                        <div class="bg-white bg-opacity-20 rounded-lg p-4">
                            <div class="text-3xl font-bold">{{ $stats['for_sale'] }}</div>
                            <div class="text-sm opacity-90">For Sale</div>
                        </div>
                        <div class="bg-white bg-opacity-20 rounded-lg p-4">
                            <div class="text-3xl font-bold">{{ $stats['for_charter'] }}</div>
                            <div class="text-sm opacity-90">For Charter</div>
                        </div>
                        <div class="bg-white bg-opacity-20 rounded-lg p-4">
                            <div class="text-3xl font-bold">{{ $stats['featured'] }}</div>
                            <div class="text-sm opacity-90">Featured</div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </section>

    <!-- Search & Filter Section -->
    <section class="section bg-white">
        <div class="container mx-auto px-4">
            <div class="card">
                <h2 class="text-4xl font-extrabold mb-6 
                        bg-gradient-to-r from-[#499974] via-[#6d83d5] to-[#33978d] 
                        bg-clip-text text-transparent">Search & Filter Vessels</h2>
                
                <form method="GET" action="{{ route('vessels') }}" class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
                        <!-- Search Input -->
                        <div class="lg:col-span-4">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Search Vessels</label>
                            <input type="text" name="search" value="{{ request('search') }}" 
                                   placeholder="Search by name, type, flag..." 
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-color focus:border-transparent">
                        </div>

                        <!-- Vessel Type Filter -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Vessel Type</label>
                            <select name="vessel_type" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-color focus:border-transparent">
                                <option value="">All Types</option>
                                @foreach($vesselTypes ?? [] as $type)
                                    <option value="{{ $type }}" {{ request('vessel_type') == $type ? 'selected' : '' }}>
                                        {{ $type }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Status Filter -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                            <select name="status" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-color focus:border-transparent">
                                <option value="">All Status</option>
                                <option value="sale" {{ request('status') == 'sale' ? 'selected' : '' }}>For Sale</option>
                                <option value="charter" {{ request('status') == 'charter' ? 'selected' : '' }}>For Charter</option>
                            </select>
                        </div>

                        <!-- DWT Range -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">DWT Range</label>
                            <select name="dwt_range" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-color focus:border-transparent">
                                <option value="">All Sizes</option>
                                <option value="0-10000" {{ request('dwt_range') == '0-10000' ? 'selected' : '' }}>0 - 10,000 DWT</option>
                                <option value="10000-50000" {{ request('dwt_range') == '10000-50000' ? 'selected' : '' }}>10,000 - 50,000 DWT</option>
                                <option value="50000-100000" {{ request('dwt_range') == '50000-100000' ? 'selected' : '' }}>50,000 - 100,000 DWT</option>
                                <option value="100000+" {{ request('dwt_range') == '100000+' ? 'selected' : '' }}>100,000+ DWT</option>
                            </select>
                        </div>

                        <!-- Built Year -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Built Year</label>
                            <select name="built_year" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-color focus:border-transparent">
                                <option value="">All Years</option>
                                <option value="2020+" {{ request('built_year') == '2020+' ? 'selected' : '' }}>2020+</option>
                                <option value="2015-2019" {{ request('built_year') == '2015-2019' ? 'selected' : '' }}>2015-2019</option>
                                <option value="2010-2014" {{ request('built_year') == '2010-2014' ? 'selected' : '' }}>2010-2014</option>
                                <option value="2000-2009" {{ request('built_year') == '2000-2009' ? 'selected' : '' }}>2000-2009</option>
                                <option value="pre-2000" {{ request('built_year') == 'pre-2000' ? 'selected' : '' }}>Pre-2000</option>
                            </select>
                        </div>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-4">
                        <button type="submit" class="btn-primary flex-1">Search Vessels</button>
                        <a href="{{ route('vessels') }}" class="btn-secondary flex-1 text-center">Clear Filters</a>
                    </div>
                </form>
            </div>
        </div>
    </section>    

    <!-- Featured Vessels Section -->
    <section class="section bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-extrabold mb-6 
                        bg-gradient-to-r from-[#499974] via-[#6d83d5] to-[#33978d] 
                        bg-clip-text text-transparent">Featured Vessels</h2>
                <p class="section-subtitle">
                    Explore our latest vessel listings with detailed specifications and competitive pricing
                </p>
            </div>
            
            @if(isset($featuredVessels) && $featuredVessels->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($featuredVessels as $vessel)
                <div class="card fade-in">
                    @if($vessel->image)
                        <img src="{{ asset('storage/' . $vessel->image) }}" alt="{{ $vessel->name }}" class="w-full h-48 object-cover rounded-lg mb-4">
                    @else
                        <div class="bg-gray-200 h-48 rounded-lg mb-4 flex items-center justify-center">
                            <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                    @endif
                    <div class="flex justify-between items-start mb-3">
                        <h3 class="text-xl font-bold">{{ $vessel->name }}</h3>
                        <span class="bg-{{ $vessel->daily_rate ? 'green' : 'blue' }}-100 text-{{ $vessel->daily_rate ? 'green' : 'blue' }}-800 text-xs font-semibold px-2 py-1 rounded">
                            {{ $vessel->daily_rate ? 'For Charter' : 'For Sale' }}
                        </span>
                    </div>
                    <div class="space-y-2 mb-4">
                        @if($vessel->built_year)
                            <p class="text-gray-600"><strong>Built:</strong> {{ $vessel->built_year }}</p>
                        @endif
                        @if($vessel->flag)
                            <p class="text-gray-600"><strong>Flag:</strong> {{ $vessel->flag }}</p>
                        @endif
                        @if($vessel->capacity)
                            <p class="text-gray-600"><strong>Capacity:</strong> {{ number_format($vessel->capacity) }} DWT</p>
                        @endif
                        @if($vessel->length && $vessel->width)
                            <p class="text-gray-600"><strong>Dimensions:</strong> {{ $vessel->length }}m × {{ $vessel->width }}m</p>
                        @endif
                    </div>
                    <div class="flex justify-between items-center">
                        @if($vessel->daily_rate)
                            <span class="text-primary-color font-semibold text-lg">${{ number_format($vessel->daily_rate) }}/day</span>
                        @else
                            <span class="text-primary-color font-semibold text-lg">Price on Request</span>
                        @endif
                        <a href="{{ route('vessels.show', $vessel) }}" class="btn-primary">View Details</a>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div class="text-center py-16">
                <div class="text-6xl mb-6">🚢</div>
                <h2 class="text-3xl font-bold mb-4 text-gray-900">No Featured Vessels</h2>
                <p class="text-lg text-gray-600 mb-8">
                    No featured vessels are currently available. Check back soon!
                </p>
            </div>
            @endif
        </div>
    </section>

    <!-- All Vessels Section -->
    @if(isset($vessels) && $vessels->count() > 0)
    <section class="section bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-extrabold mb-6 
                        bg-gradient-to-r from-[#499974] via-[#6d83d5] to-[#33978d] 
                        bg-clip-text text-transparent">All Vessels</h2>
                <p class="section-subtitle">
                    Browse our complete fleet of vessels available for sale and charter
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($vessels as $vessel)
                <div class="card fade-in bg-white">
                    @if($vessel->image)
                        <img src="{{ asset('storage/' . $vessel->image) }}" alt="{{ $vessel->name }}" class="w-full h-48 object-cover rounded-lg mb-4">
                    @else
                        <div class="bg-gray-200 h-48 rounded-lg mb-4 flex items-center justify-center">
                            <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                    @endif
                    <div class="flex justify-between items-start mb-3">
                        <h3 class="text-xl font-bold">{{ $vessel->name }}</h3>
                        <span class="bg-{{ $vessel->daily_rate ? 'green' : 'blue' }}-100 text-{{ $vessel->daily_rate ? 'green' : 'blue' }}-800 text-xs font-semibold px-2 py-1 rounded">
                            {{ $vessel->daily_rate ? 'For Charter' : 'For Sale' }}
                        </span>
                    </div>
                    <div class="space-y-2 mb-4">
                        @if($vessel->built_year)
                            <p class="text-gray-600"><strong>Built:</strong> {{ $vessel->built_year }}</p>
                        @endif
                        @if($vessel->flag)
                            <p class="text-gray-600"><strong>Flag:</strong> {{ $vessel->flag }}</p>
                        @endif
                        @if($vessel->capacity)
                            <p class="text-gray-600"><strong>Capacity:</strong> {{ number_format($vessel->capacity) }} DWT</p>
                        @endif
                        @if($vessel->length && $vessel->width)
                            <p class="text-gray-600"><strong>Dimensions:</strong> {{ $vessel->length }}m × {{ $vessel->width }}m</p>
                        @endif
                    </div>
                    <div class="flex justify-between items-center">
                        @if($vessel->daily_rate)
                            <span class="text-primary-color font-semibold text-lg">${{ number_format($vessel->daily_rate) }}/day</span>
                        @else
                            <span class="text-primary-color font-semibold text-lg">Price on Request</span>
                        @endif
                        <a href="{{ route('vessels.show', $vessel) }}" class="btn-primary">View Details</a>
                    </div>
                </div>
                @endforeach
            </div>
            
            <!-- Pagination -->
            @if($vessels->hasPages())
            <div class="flex justify-center mt-12">
                {{ $vessels->links() }}
            </div>
            @endif
        </div>
    </section>
    @elseif(isset($vessels) && $vessels->count() == 0)
    <section class="section bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center py-16">
                <div class="text-6xl mb-6">🚢</div>
                <h2 class="text-3xl font-bold mb-4 text-gray-900">No Vessels Found</h2>
                <p class="text-lg text-gray-600 mb-8">
                    No vessels match your current search criteria. Try adjusting your filters.
                </p>
                <a href="{{ route('vessels') }}" class="btn-primary">View All Vessels</a>
            </div>
        </div>
    </section>
    @endif

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
                    <a href="{{ route('contact') }}" class="btn-primary bg-gray-800 text-lg px-8 py-4 transform scale-105 ">
                        Contact Us
                    </a>
                    <a href="{{ route('services') }}" class="border-2 border-white text-white px-8 py-4 rounded-lg font-semibold hover:bg-white hover:text-gray-800 transition-colors">
                        Our Services
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection

