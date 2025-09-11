@extends('layouts.app')

@section('title', 'Vessel Listings - SMA Ship Brokers')
@section('description', 'Browse our comprehensive vessel listings for sale and charter. Find dry bulk carriers, tankers, cargo vessels, container ships, and offshore service vessels.')

@section('content')
    <!-- Hero Section with Particles -->
    <section class="relative py-20 bg-gradient-to-br from-primary-color to-primary-dark text-white overflow-hidden">
        <!-- Animated Background -->
        <div class="absolute inset-0">
            
        </div>
        
        <!-- Content -->
        <div class="container mx-auto px-4 text-center relative z-10">
            <div class="hero-content">
                <h1 class="hero-title">Vessel Listings</h1>
                <p class="hero-description">
                    Browse our comprehensive selection of vessels available for sale and charter
                </p>
                @if(isset($stats) && $stats['total_vessels'] > 0)
                <div class="hero-stats">
                    <div class="stat-card">
                        <div class="stat-number">{{ $stats['total_vessels'] }}+</div>
                        <div class="stat-label">Total Vessels</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-number">{{ $stats['for_sale'] }}</div>
                        <div class="stat-label">For Sale</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-number">{{ $stats['for_charter'] }}</div>
                        <div class="stat-label">For Charter</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-number">{{ $stats['featured'] }}</div>
                        <div class="stat-label">Featured</div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </section>

    <!-- Search & Filter Section -->
    <section class="section bg-gradient-to-br from-gray-50 to-white">
        <div class="container mx-auto px-4">
            <div class="search-card">
                <div class="search-header">
                    <h2 class="search-title">Search & Filter Vessels</h2>
                    <div class="search-divider"></div>
                </div>
                
                <form method="GET" action="{{ route('vessels') }}" class="search-form">
                    <div class="search-grid">
                        <!-- Search Input -->
                        <div class="search-input-container">
                            <label class="search-label">Search Vessels</label>
                            <input type="text" name="search" value="{{ request('search') }}" 
                                   placeholder="Search by name, type, flag..." 
                                   class="search-input">
                        </div>

                        <!-- Vessel Type Filter -->
                        <div class="filter-group">
                            <label class="search-label">Vessel Type</label>
                            <select name="vessel_type" class="search-select">
                                <option value="">All Types</option>
                                @foreach($vesselTypes ?? [] as $type)
                                    <option value="{{ $type }}" {{ request('vessel_type') == $type ? 'selected' : '' }}>
                                        {{ $type }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Status Filter -->
                        <div class="filter-group">
                            <label class="search-label">Status</label>
                            <select name="status" class="search-select">
                                <option value="">All Status</option>
                                <option value="sale" {{ request('status') == 'sale' ? 'selected' : '' }}>For Sale</option>
                                <option value="charter" {{ request('status') == 'charter' ? 'selected' : '' }}>For Charter</option>
                            </select>
                        </div>

                        <!-- DWT Range -->
                        <div class="filter-group">
                            <label class="search-label">DWT Range</label>
                            <select name="dwt_range" class="search-select">
                                <option value="">All Sizes</option>
                                <option value="0-10000" {{ request('dwt_range') == '0-10000' ? 'selected' : '' }}>0 - 10,000 DWT</option>
                                <option value="10000-50000" {{ request('dwt_range') == '10000-50000' ? 'selected' : '' }}>10,000 - 50,000 DWT</option>
                                <option value="50000-100000" {{ request('dwt_range') == '50000-100000' ? 'selected' : '' }}>50,000 - 100,000 DWT</option>
                                <option value="100000+" {{ request('dwt_range') == '100000+' ? 'selected' : '' }}>100,000+ DWT</option>
                            </select>
                        </div>

                        <!-- Built Year -->
                        <div class="filter-group">
                            <label class="search-label">Built Year</label>
                            <select name="built_year" class="search-select">
                                <option value="">All Years</option>
                                <option value="2020+" {{ request('built_year') == '2020+' ? 'selected' : '' }}>2020+</option>
                                <option value="2015-2019" {{ request('built_year') == '2015-2019' ? 'selected' : '' }}>2015-2019</option>
                                <option value="2010-2014" {{ request('built_year') == '2010-2014' ? 'selected' : '' }}>2010-2014</option>
                                <option value="2000-2009" {{ request('built_year') == '2000-2009' ? 'selected' : '' }}>2000-2009</option>
                                <option value="pre-2000" {{ request('built_year') == 'pre-2000' ? 'selected' : '' }}>Pre-2000</option>
                            </select>
                        </div>
                    </div>

                    <div class="search-buttons">
                        <button type="submit" class="search-button search-primary">
                            <i class="fas fa-search mr-2"></i>
                            Search Vessels
                        </button>
                        <a href="{{ route('vessels') }}" class="search-button search-secondary">
                            <i class="fas fa-times mr-2"></i>
                            Clear Filters
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </section>    

    <!-- Featured Vessels Section -->
    <section class="section bg-gradient-to-br from-white to-gray-50">
        <div class="container mx-auto px-4">
            <div class="section-header">
                <h2 class="section-title">Featured Vessels</h2>
                <p class="section-subtitle">
                    Explore our latest vessel listings with detailed specifications and competitive pricing
                </p>
                <div class="section-divider"></div>
            </div>
            
            @if(isset($featuredVessels) && $featuredVessels->count() > 0)
            <div class="vessels-grid">
                @foreach($featuredVessels as $vessel)
                <div class="vessel-card">
                    <div class="vessel-image-container">
                        @if($vessel->image)
                            <img src="{{ asset('storage/' . $vessel->image) }}" alt="{{ $vessel->name }}" class="vessel-image">
                        @else
                            <div class="vessel-placeholder">
                                <i class="fas fa-ship"></i>
                            </div>
                        @endif
                        
                    </div>
                    <div class="vessel-content">
                        <div class="vessel-header">
                            <h3 class="vessel-title">{{ $vessel->name }}</h3>
                            <span class="vessel-status {{ $vessel->daily_rate ? 'charter' : 'sale' }}">
                                {{ $vessel->daily_rate ? 'For Charter' : 'For Sale' }}
                            </span>
                        </div>
                        <div class="vessel-specs">
                            @if($vessel->built_year)
                                <p class="vessel-spec"><strong>Built:</strong> {{ $vessel->built_year }}</p>
                            @endif
                            @if($vessel->flag)
                                <p class="vessel-spec"><strong>Flag:</strong> {{ $vessel->flag }}</p>
                            @endif
                            @if($vessel->capacity)
                                <p class="vessel-spec"><strong>Capacity:</strong> {{ number_format($vessel->capacity) }} DWT</p>
                            @endif
                            @if($vessel->length && $vessel->width)
                                <p class="vessel-spec"><strong>Dimensions:</strong> {{ $vessel->length }}m × {{ $vessel->width }}m</p>
                            @endif
                        </div>
                        <div class="vessel-footer">
                            @if($vessel->daily_rate)
                                <span class="vessel-price">${{ number_format($vessel->daily_rate) }}/day</span>
                            @else
                                <span class="vessel-price">Price on Request</span>
                            @endif
                            <a href="{{ route('vessels.show', $vessel) }}" class="vessel-link">
                                View Details <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div class="empty-state">
                <div class="empty-icon">🚢</div>
                <h2 class="empty-title">No Featured Vessels</h2>
                <p class="empty-description">
                    No featured vessels are currently available. Check back soon!
                </p>
            </div>
            @endif
        </div>
    </section>

    <!-- All Vessels Section -->
    @if(isset($vessels) && $vessels->count() > 0)
    <section class="section bg-gradient-to-br from-gray-50 to-white">
        <div class="container mx-auto px-4">
            <div class="section-header">
                <h2 class="section-title">All Vessels</h2>
                <p class="section-subtitle">
                    Browse our complete fleet of vessels available for sale and charter
                </p>
                <div class="section-divider"></div>
            </div>
            
            <div class="vessels-grid">
                @foreach($vessels as $vessel)
                <div class="vessel-card">
                    <div class="vessel-image-container">
                        @if($vessel->image)
                            <img src="{{ asset('storage/' . $vessel->image) }}" alt="{{ $vessel->name }}" class="vessel-image">
                        @else
                            <div class="vessel-placeholder">
                                <i class="fas fa-ship"></i>
                            </div>
                        @endif
                    </div>
                    <div class="vessel-content">
                        <div class="vessel-header">
                            <h3 class="vessel-title">{{ $vessel->name }}</h3>
                            <span class="vessel-status {{ $vessel->daily_rate ? 'charter' : 'sale' }}">
                                {{ $vessel->daily_rate ? 'For Charter' : 'For Sale' }}
                            </span>
                        </div>
                        <div class="vessel-specs">
                            @if($vessel->built_year)
                                <p class="vessel-spec"><strong>Built:</strong> {{ $vessel->built_year }}</p>
                            @endif
                            @if($vessel->flag)
                                <p class="vessel-spec"><strong>Flag:</strong> {{ $vessel->flag }}</p>
                            @endif
                            @if($vessel->capacity)
                                <p class="vessel-spec"><strong>Capacity:</strong> {{ number_format($vessel->capacity) }} DWT</p>
                            @endif
                            @if($vessel->length && $vessel->width)
                                <p class="vessel-spec"><strong>Dimensions:</strong> {{ $vessel->length }}m × {{ $vessel->width }}m</p>
                            @endif
                        </div>
                        <div class="vessel-footer">
                            @if($vessel->daily_rate)
                                <span class="vessel-price">${{ number_format($vessel->daily_rate) }}/day</span>
                            @else
                                <span class="vessel-price">Price on Request</span>
                            @endif
                            <a href="{{ route('vessels.show', $vessel) }}" class="vessel-link">
                                View Details <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            <!-- Pagination -->
            @if($vessels->hasPages())
            <div class="pagination-container">
                {{ $vessels->links() }}
            </div>
            @endif
        </div>
    </section>
    @elseif(isset($vessels) && $vessels->count() == 0)
    <section class="section bg-gradient-to-br from-gray-50 to-white">
        <div class="container mx-auto px-4">
            <div class="empty-state">
                <div class="empty-icon">🚢</div>
                <h2 class="empty-title">No Vessels Found</h2>
                <p class="empty-description">
                    No vessels match your current search criteria. Try adjusting your filters.
                </p>
                <a href="{{ route('vessels') }}" class="empty-button">View All Vessels</a>
            </div>
        </div>
    </section>
    @endif

    <!-- CTA Section -->
    <section class="section bg-gradient-to-br from-primary-color to-primary-dark text-white relative overflow-hidden">
        <!-- Background Animation -->
        <div class="absolute inset-0">
            <div class="cta-particles">
                <div class="particle particle-1"></div>
                <div class="particle particle-2"></div>
                <div class="particle particle-3"></div>
            </div>
        </div>
        
        <div class="container mx-auto px-4 text-center relative z-10">
            <div class="cta-content">
                <h2 class="cta-title">Need a Specific Vessel?</h2>
                <p class="cta-description">
                    Can't find what you're looking for? Our extensive network can help source the perfect 
                    vessel for your requirements.
                </p>
                <div class="cta-buttons">
                    <a href="{{ route('contact') }}" class="cta-button cta-primary">
                        <i class="fas fa-envelope mr-2"></i>
                        Contact Us
                    </a>
                    <a href="{{ route('services') }}" class="cta-button cta-secondary">
                        <i class="fas fa-cogs mr-2"></i>
                        Our Services
                    </a>
                </div>
            </div>
        </div>
    </section>

    <style>
    /* Hero Section Animations */
    .hero-content {
        animation: fadeInUp 1s ease forwards;
        opacity: 0;
        transform: translateY(30px);
    }

    .hero-title {
        font-size: 3.5rem;
        font-weight: 800;
        margin-bottom: 24px;
        background: linear-gradient(135deg, #ffffff, #e0f2fe);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        animation: slideInUp 0.8s ease forwards 0.2s;
        opacity: 0;
        transform: translateY(30px);
    }

    .hero-description {
        font-size: 1.25rem;
        opacity: 0.9;
        margin-bottom: 32px;
        max-width: 3xl;
        margin-left: auto;
        margin-right: auto;
        animation: slideInUp 0.8s ease forwards 0.4s;
        opacity: 0;
        transform: translateY(30px);
    }

    .hero-stats {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 32px;
        animation: slideInUp 0.8s ease forwards 0.6s;
        opacity: 0;
        transform: translateY(30px);
    }

    .stat-card {
        background: rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(10px);
        border-radius: 16px;
        padding: 24px;
        text-align: center;
        border: 1px solid rgba(255, 255, 255, 0.3);
        transition: all 0.3s ease;
    }

    .stat-card:hover {
        background: rgba(255, 255, 255, 0.3);
        transform: translateY(-4px);
    }

    .stat-number {
        font-size: 2rem;
        font-weight: 800;
        margin-bottom: 8px;
    }

    .stat-label {
        font-size: 0.875rem;
        opacity: 0.9;
    }

    /* Hero Background Animations */
    .hero-particles {
        position: absolute;
        inset: 0;
        overflow: hidden;
    }

    .hero-particles .particle {
        position: absolute;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
        animation: float 8s ease-in-out infinite;
    }

    .hero-particles .particle-1 {
        width: 20px;
        height: 20px;
        top: 20%;
        left: 10%;
        animation-delay: 0s;
    }

    .hero-particles .particle-2 {
        width: 15px;
        height: 15px;
        top: 60%;
        left: 80%;
        animation-delay: 2s;
    }

    .hero-particles .particle-3 {
        width: 25px;
        height: 25px;
        top: 80%;
        left: 20%;
        animation-delay: 4s;
    }

    .hero-particles .particle-4 {
        width: 18px;
        height: 18px;
        top: 30%;
        left: 70%;
        animation-delay: 6s;
    }

    .hero-particles .particle-5 {
        width: 22px;
        height: 22px;
        top: 70%;
        left: 50%;
        animation-delay: 8s;
    }

    .floating-shapes {
        position: absolute;
        inset: 0;
        overflow: hidden;
    }

    .shape {
        position: absolute;
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0.05));
        border-radius: 20px;
        animation: floatShape 12s ease-in-out infinite;
    }

    .shape-1 {
        width: 100px;
        height: 100px;
        top: 10%;
        right: 10%;
        animation-delay: 0s;
    }

    .shape-2 {
        width: 80px;
        height: 80px;
        bottom: 20%;
        left: 15%;
        animation-delay: 4s;
    }

    .shape-3 {
        width: 120px;
        height: 120px;
        top: 50%;
        right: 30%;
        animation-delay: 8s;
    }

    /* Search Section Styles */
    .search-card {
        background: white;
        padding: 40px;
        border-radius: 24px;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        animation: fadeInUp 0.8s ease forwards;
    }

    .search-header {
        text-align: center;
        margin-bottom: 32px;
    }

    .search-title {
        font-size: 36px;
        font-weight: 800;
        color: #1f2937;
        margin-bottom: 16px;
        background: linear-gradient(135deg, #499974, #6d83d5);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .search-divider {
        width: 100px;
        height: 4px;
        background: linear-gradient(135deg, #499974, #6d83d5);
        border-radius: 2px;
        margin: 0 auto;
    }

    .search-form {
        display: flex;
        flex-direction: column;
        gap: 24px;
    }

    .search-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 24px;
    }

    .search-input-container {
        grid-column: 1 / -1;
    }

    .search-label {
        display: block;
        font-size: 14px;
        font-weight: 600;
        color: #374151;
        margin-bottom: 8px;
    }

    .search-input, .search-select {
        width: 100%;
        padding: 12px 16px;
        border: 2px solid #e5e7eb;
        border-radius: 12px;
        font-size: 16px;
        transition: all 0.3s ease;
        background: white;
    }

    .search-input:focus, .search-select:focus {
        outline: none;
        border-color: #499974;
        box-shadow: 0 0 0 3px rgba(73, 153, 116, 0.1);
    }

    .search-buttons {
        display: flex;
        gap: 16px;
        justify-content: center;
        flex-wrap: wrap;
    }

    .search-button {
        display: inline-flex;
        align-items: center;
        padding: 16px 32px;
        border-radius: 50px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
        font-size: 16px;
        border: none;
        cursor: pointer;
    }

    .search-primary {
        background: linear-gradient(135deg, #499974, #6d83d5);
        color: white;
    }

    .search-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(73, 153, 116, 0.3);
    }

    .search-secondary {
        background: white;
        color: #6b7280;
        border: 2px solid #e5e7eb;
    }

    .search-secondary:hover {
        background: #f9fafb;
        border-color: #d1d5db;
    }

    /* Section Headers */
    .section-header {
        text-align: center;
        margin-bottom: 48px;
        animation: fadeInUp 0.8s ease forwards;
    }

    .section-title {
        font-size: 36px;
        font-weight: 800;
        color: #1f2937;
        margin-bottom: 16px;
        background: linear-gradient(135deg, #499974, #6d83d5);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .section-subtitle {
        font-size: 18px;
        color: #6b7280;
        margin-bottom: 24px;
    }

    .section-divider {
        width: 100px;
        height: 4px;
        background: linear-gradient(135deg, #499974, #6d83d5);
        border-radius: 2px;
        margin: 0 auto;
    }

    /* Vessels Grid */
    .vessels-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        gap: 32px;
    }

    .vessel-card {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        animation: fadeInUp 0.8s ease forwards;
        opacity: 0;
        transform: translateY(30px);
    }

    .vessel-card:nth-child(1) { animation-delay: 0.1s; }
    .vessel-card:nth-child(2) { animation-delay: 0.2s; }
    .vessel-card:nth-child(3) { animation-delay: 0.3s; }
    .vessel-card:nth-child(4) { animation-delay: 0.4s; }
    .vessel-card:nth-child(5) { animation-delay: 0.5s; }
    .vessel-card:nth-child(6) { animation-delay: 0.6s; }

    .vessel-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
    }

    .vessel-image-container {
        position: relative;
        height: 200px;
        overflow: hidden;
    }

    .vessel-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .vessel-card:hover .vessel-image {
        transform: scale(1.1);
    }

    .vessel-placeholder {
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, #f3f4f6, #e5e7eb);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #9ca3af;
        font-size: 48px;
    }

    .vessel-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(to bottom, rgba(0, 0, 0, 0.3), transparent);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .vessel-card:hover .vessel-overlay {
        opacity: 1;
    }

    .vessel-icon {
        width: 60px;
        height: 60px;
        background: rgba(255, 255, 255, 0.9);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #499974;
        font-size: 24px;
    }

    .vessel-content {
        padding: 24px;
    }

    .vessel-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 16px;
    }

    .vessel-title {
        font-size: 20px;
        font-weight: 700;
        color: #1f2937;
        margin: 0;
    }

    .vessel-status {
        font-size: 12px;
        font-weight: 600;
        padding: 4px 12px;
        border-radius: 20px;
    }

    .vessel-status.sale {
        background: #dbeafe;
        color: #1e40af;
    }

    .vessel-status.charter {
        background: #dcfce7;
        color: #166534;
    }

    .vessel-specs {
        margin-bottom: 20px;
    }

    .vessel-spec {
        font-size: 14px;
        color: #6b7280;
        margin-bottom: 8px;
    }

    .vessel-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .vessel-price {
        font-size: 18px;
        font-weight: 700;
        color: #499974;
    }

    .vessel-link {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: #499974;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .vessel-link:hover {
        color: #6d83d5;
        transform: translateX(4px);
    }

    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 80px 20px;
        animation: fadeInUp 0.8s ease forwards;
    }

    .empty-icon {
        font-size: 4rem;
        margin-bottom: 24px;
    }

    .empty-title {
        font-size: 2rem;
        font-weight: 700;
        color: #1f2937;
        margin-bottom: 16px;
    }

    .empty-description {
        font-size: 1.125rem;
        color: #6b7280;
        margin-bottom: 32px;
        max-width: 500px;
        margin-left: auto;
        margin-right: auto;
    }

    .empty-button {
        display: inline-flex;
        align-items: center;
        padding: 16px 32px;
        background: linear-gradient(135deg, #499974, #6d83d5);
        color: white;
        text-decoration: none;
        border-radius: 50px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .empty-button:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(73, 153, 116, 0.3);
    }

    /* Pagination */
    .pagination-container {
        display: flex;
        justify-content: center;
        margin-top: 48px;
    }

    /* CTA Section */
    .cta-content {
        animation: fadeInUp 0.8s ease forwards;
        opacity: 0;
        transform: translateY(30px);
    }

    .cta-title {
        font-size: 40px;
        font-weight: 800;
        margin-bottom: 24px;
    }

    .cta-description {
        font-size: 20px;
        opacity: 0.9;
        margin-bottom: 32px;
        max-width: 600px;
        margin-left: auto;
        margin-right: auto;
    }

    .cta-buttons {
        display: flex;
        gap: 24px;
        justify-content: center;
        flex-wrap: wrap;
    }

    .cta-button {
        display: inline-flex;
        align-items: center;
        padding: 16px 32px;
        border-radius: 50px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
        font-size: 16px;
    }

    .cta-primary {
        background: #1f2937;
        color: white;
        transform: scale(1.05);
    }

    .cta-primary:hover {
        background: #374151;
        transform: scale(1.1);
    }

    .cta-secondary {
        border: 2px solid white;
        color: white;
    }

    .cta-secondary:hover {
        background: white;
        color: #1f2937;
    }

    .cta-particles {
        position: absolute;
        inset: 0;
        overflow: hidden;
    }

    .cta-particles .particle {
        position: absolute;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
        animation: float 6s ease-in-out infinite;
    }

    .cta-particles .particle-1 {
        width: 15px;
        height: 15px;
        top: 20%;
        left: 20%;
        animation-delay: 0s;
    }

    .cta-particles .particle-2 {
        width: 20px;
        height: 20px;
        top: 60%;
        right: 20%;
        animation-delay: 2s;
    }

    .cta-particles .particle-3 {
        width: 12px;
        height: 12px;
        bottom: 30%;
        left: 50%;
        animation-delay: 4s;
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
            transform: translateY(0px) rotate(0deg);
        }
        50% {
            transform: translateY(-20px) rotate(180deg);
        }
    }

    @keyframes floatShape {
        0%, 100% {
            transform: translateY(0px) rotate(0deg);
        }
        50% {
            transform: translateY(-30px) rotate(180deg);
        }
    }

    /* Responsive */
    @media (max-width: 768px) {
        .hero-title {
            font-size: 2.5rem;
        }
        
        .hero-stats {
            flex-direction: column;
            align-items: center;
        }
        
        .vessels-grid {
            grid-template-columns: 1fr;
        }
        
        .search-grid {
            grid-template-columns: 1fr;
        }
        
        .search-buttons {
            flex-direction: column;
            align-items: center;
        }
        
        .cta-buttons {
            flex-direction: column;
            align-items: center;
        }
    }
    </style>
@endsection

