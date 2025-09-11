@extends('layouts.app')

@section('title', 'Vessel Database - SMA Ship Brokers')
@section('description', 'Browse our complete vessel database with advanced filtering options.')

@section('content')
    <!-- Hero Section -->
    <section class="relative py-20 bg-gradient-to-br from-primary-color to-primary-dark text-white overflow-hidden">
        <div class="container mx-auto px-4 text-center relative z-10">
            <div class="hero-content">
                <h1 class="hero-title">Vessel Database</h1>
                <p class="hero-description">
                    Complete database of all vessels with advanced filtering and search capabilities
                </p>
                <div class="hero-stats">
                    <div class="stat-card">
                        <div class="stat-number">{{ $totalVessels }}+</div>
                        <div class="stat-label">Total Vessels</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-number">{{ $availableVessels }}</div>
                        <div class="stat-label">Available</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-number">{{ $charterVessels }}</div>
                        <div class="stat-label">For Charter</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-number">{{ $saleVessels }}</div>
                        <div class="stat-label">For Sale</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Search & Filter Section -->
    <section class="section bg-gradient-to-br from-gray-50 to-white">
        <div class="container mx-auto px-4">
            <div class="search-card">
                <div class="search-header">
                    <h2 class="search-title">Advanced Search & Filter</h2>
                    <div class="search-divider"></div>
                </div>
                
                <form method="GET" action="{{ route('vessels.database') }}" class="search-form">
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
                            <select name="type" class="search-select">
                                <option value="">All Types</option>
                                @foreach($vesselTypes as $type)
                                    <option value="{{ $type }}" {{ request('type') == $type ? 'selected' : '' }}>
                                        {{ $type }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Availability Filter -->
                        <div class="filter-group">
                            <label class="search-label">Availability</label>
                            <select name="availability" class="search-select">
                                <option value="">All Status</option>
                                <option value="available" {{ request('availability') == 'available' ? 'selected' : '' }}>Available</option>
                                <option value="chartered" {{ request('availability') == 'chartered' ? 'selected' : '' }}>Chartered</option>
                                <option value="sold" {{ request('availability') == 'sold' ? 'selected' : '' }}>Sold</option>
                            </select>
                        </div>

                        <!-- Price Range -->
                        <div class="filter-group">
                            <label class="search-label">Price Range</label>
                            <select name="price_range" class="search-select">
                                <option value="">All Prices</option>
                                <option value="0-10000" {{ request('price_range') == '0-10000' ? 'selected' : '' }}>$0 - $10,000/day</option>
                                <option value="10000-25000" {{ request('price_range') == '10000-25000' ? 'selected' : '' }}>$10,000 - $25,000/day</option>
                                <option value="25000-50000" {{ request('price_range') == '25000-50000' ? 'selected' : '' }}>$25,000 - $50,000/day</option>
                                <option value="50000+" {{ request('price_range') == '50000+' ? 'selected' : '' }}>$50,000+/day</option>
                                <option value="sale" {{ request('price_range') == 'sale' ? 'selected' : '' }}>For Sale</option>
                            </select>
                        </div>
                    </div>

                    <div class="search-buttons">
                        <button type="submit" class="search-button search-primary">
                            <i class="fas fa-search mr-2"></i>
                            Search Vessels
                        </button>
                        <a href="{{ route('vessels.database') }}" class="search-button search-secondary">
                            <i class="fas fa-refresh mr-2"></i>
                            Clear Filters
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Vessels Grid Section -->
    <section class="section bg-white">
        <div class="container mx-auto px-4">
            <div class="section-header">
                <h2 class="section-title">All Vessels</h2>
                <p class="section-subtitle">Complete database of vessels in our system</p>
                <div class="section-divider"></div>
            </div>

            @if($vessels->count() > 0)
                <div class="vessels-grid">
                    @foreach($vessels as $vessel)
                        <div class="vessel-card">
                            <div class="vessel-image-container">
                                @if($vessel->image)
                                    <img src="{{ $vessel->image_url }}" alt="{{ $vessel->name }}" class="vessel-image">
                                @else
                                    <div class="vessel-placeholder">
                                        <i class="fas fa-ship"></i>
                                    </div>
                                @endif
                                <div class="vessel-overlay">
                                    <div class="vessel-icon">
                                        <i class="fas fa-eye"></i>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="vessel-content">
                                <div class="vessel-header">
                                    <h3 class="vessel-title">{{ $vessel->name }}</h3>
                                    <span class="vessel-status {{ $vessel->daily_rate ? 'charter' : 'sale' }}">
                                        {{ $vessel->daily_rate ? 'Charter' : 'Sale' }}
                                    </span>
                                </div>
                                
                                <div class="vessel-specs">
                                    <div class="vessel-spec">
                                        <strong>Type:</strong> {{ $vessel->type ?? 'N/A' }}
                                    </div>
                                    <div class="vessel-spec">
                                        <strong>DWT:</strong> {{ $vessel->capacity ? number_format($vessel->capacity) . ' MT' : 'N/A' }}
                                    </div>
                                    <div class="vessel-spec">
                                        <strong>Built:</strong> {{ $vessel->built_year ?? 'N/A' }}
                                    </div>
                                    <div class="vessel-spec">
                                        <strong>Flag:</strong> {{ $vessel->flag ?? 'N/A' }}
                                    </div>
                                    @if($vessel->length || $vessel->width || $vessel->draft)
                                        <div class="vessel-spec">
                                            <strong>Dimensions:</strong> 
                                            @if($vessel->length) L: {{ $vessel->length }}m @endif
                                            @if($vessel->width) W: {{ $vessel->width }}m @endif
                                            @if($vessel->draft) D: {{ $vessel->draft }}m @endif
                                        </div>
                                    @endif
                                </div>
                                
                                <div class="vessel-footer">
                                    <div class="vessel-price">
                                        @if($vessel->daily_rate)
                                            ${{ number_format($vessel->daily_rate) }}/day
                                        @else
                                            Price on Request
                                        @endif
                                    </div>
                                    <a href="{{ route('vessels.show', $vessel) }}" class="vessel-link">
                                        View Details
                                        <i class="fas fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="pagination-container">
                    {{ $vessels->links() }}
                </div>
            @else
                <div class="empty-state">
                    <div class="empty-icon">
                        <i class="fas fa-search"></i>
                    </div>
                    <h3 class="empty-title">No Vessels Found</h3>
                    <p class="empty-description">
                        No vessels match your current search criteria. Try adjusting your filters or search terms.
                    </p>
                    <a href="{{ route('vessels.database') }}" class="empty-button">
                        <i class="fas fa-refresh mr-2"></i>
                        Clear Filters
                    </a>
                </div>
            @endif
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
    }
    </style>
@endsection
