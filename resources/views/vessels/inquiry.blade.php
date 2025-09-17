@extends('layouts.app')

@section('title', 'Vessel Inquiry - SMA Ship Brokers')
@section('description', 'Submit your vessel inquiry for sale, charter, or inspection services.')

@section('content')
    <!-- Hero Section -->
    <section class="relative py-20 bg-gradient-to-br from-primary-color to-primary-dark text-white overflow-hidden">
        <div class="container mx-auto px-4 text-center relative z-10">
            <div class="hero-content">
                <h1 class="hero-title">Vessel Inquiry</h1>
                <p class="hero-description">
                    Submit your vessel inquiry and our maritime experts will get back to you
                </p>
            </div>
        </div>
    </section>

    <!-- Inquiry Form Section -->
    <section class="section bg-gradient-to-br from-gray-50 to-white">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <div class="search-card">
                    <div class="search-header">
                        <h2 class="search-title">Submit Your Inquiry</h2>
                        <div class="search-divider"></div>
                    </div>

                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('vessels.inquiry.store') }}" class="search-form">
                        @csrf
                        <div class="search-grid">
                            <!-- Personal Information -->
                            <div class="filter-group">
                                <label class="search-label">First Name *</label>
                                <input type="text" name="first_name" value="{{ old('first_name') }}" 
                                       class="search-input" required>
                                @error('first_name')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="filter-group">
                                <label class="search-label">Last Name *</label>
                                <input type="text" name="last_name" value="{{ old('last_name') }}" 
                                       class="search-input" required>
                                @error('last_name')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="filter-group">
                                <label class="search-label">Email *</label>
                                <input type="email" name="email" value="{{ old('email') }}" 
                                       class="search-input" required>
                                @error('email')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="filter-group">
                                <label class="search-label">Phone</label>
                                <input type="tel" name="phone" value="{{ old('phone') }}" 
                                       class="search-input">
                                @error('phone')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="filter-group">
                                <label class="search-label">Company</label>
                                <input type="text" name="company" value="{{ old('company') }}" 
                                       class="search-input">
                                @error('company')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Vessel Selection -->
                            <div class="filter-group">
                                <label class="search-label">Select Vessel (Optional)</label>
                                <select name="vessel_id" class="search-select">
                                    <option value="">Choose a vessel...</option>
                                    @foreach($vessels as $vessel)
                                        <option value="{{ $vessel->id }}" 
                                                {{ old('vessel_id', $selectedVesselId) == $vessel->id ? 'selected' : '' }}>
                                            {{ $vessel->name }} - {{ $vessel->type }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('vessel_id')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Inquiry Type -->
                            <div class="filter-group">
                                <label class="search-label">Inquiry Type *</label>
                                <select name="inquiry_type" class="search-select" required>
                                    <option value="">Select inquiry type...</option>
                                    <option value="sale" {{ old('inquiry_type') == 'sale' ? 'selected' : '' }}>Sale Inquiry</option>
                                    <option value="charter" {{ old('inquiry_type') == 'charter' ? 'selected' : '' }}>Charter Inquiry</option>
                                    <option value="inspection" {{ old('inquiry_type') == 'inspection' ? 'selected' : '' }}>Inspection Request</option>
                                    <option value="other" {{ old('inquiry_type') == 'other' ? 'selected' : '' }}>Other</option>
                                </select>
                                @error('inquiry_type')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Message -->
                            <div class="search-input-container">
                                <label class="search-label">Message *</label>
                                <textarea name="message" rows="6" class="search-input" 
                                          placeholder="Please provide details about your inquiry..." required>{{ old('message') }}</textarea>
                                @error('message')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="search-buttons">
                            <button type="submit" class="search-button search-primary">
                                <i class="fas fa-paper-plane mr-2"></i>
                                Submit Inquiry
                            </button>
                            <a href="{{ route('vessels') }}" class="search-button search-secondary">
                                <i class="fas fa-arrow-left mr-2"></i>
                                Back to Vessels
                            </a>
                        </div>
                    </form>
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
