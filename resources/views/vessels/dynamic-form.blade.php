@extends('layouts.app')

@section('title', 'Dynamic Vessel Form - SMA Ship Brokers')
@section('description', 'Submit detailed vessel requirements for purchase, sale, or charter.')

@section('content')
    <!-- Hero Section -->
    <section class="relative py-20 bg-gradient-to-br from-primary-color to-primary-dark text-white overflow-hidden">
        <div class="container mx-auto px-4 text-center relative z-10">
            <div class="hero-content">
                <h1 class="hero-title">Dynamic Vessel Form</h1>
                <p class="hero-description">
                    Submit detailed vessel requirements and our experts will find the perfect match
                </p>
            </div>
        </div>
    </section>

    <!-- Dynamic Form Section -->
    <section class="section bg-gradient-to-br from-gray-50 to-white">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <div class="search-card">
                    <div class="search-header">
                        <h2 class="search-title">Detailed Vessel Requirements</h2>
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

                    <form method="POST" action="{{ route('vessels.dynamic-form.submit') }}" class="search-form">
                        @csrf
                        <div class="search-grid">
                            <!-- Personal Information -->
                            <div class="filter-group">
                                <label class="search-label">Full Name *</label>
                                <input type="text" name="full_name" value="{{ old('full_name') }}" 
                                       class="search-input" required>
                                @error('full_name')
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
                                <label class="search-label">Phone *</label>
                                <input type="tel" name="phone" value="{{ old('phone') }}" 
                                       class="search-input" required>
                                @error('phone')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="filter-group">
                                <label class="search-label">Company Name</label>
                                <input type="text" name="company_name" value="{{ old('company_name') }}" 
                                       class="search-input">
                                @error('company_name')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Vessel Specifications -->
                            <div class="filter-group">
                                <label class="search-label">Vessel Type *</label>
                                <select name="vessel_type" class="search-select" required>
                                    <option value="">Select vessel type...</option>
                                    @foreach($vesselTypes as $type)
                                        <option value="{{ $type }}" {{ old('vessel_type') == $type ? 'selected' : '' }}>
                                            {{ $type }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('vessel_type')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="filter-group">
                                <label class="search-label">DWT (Deadweight Tonnage)</label>
                                <input type="number" name="vessel_dwt" value="{{ old('vessel_dwt') }}" 
                                       class="search-input" min="0" step="0.01">
                                @error('vessel_dwt')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="filter-group">
                                <label class="search-label">Built Year From</label>
                                <input type="number" name="built_year_from" value="{{ old('built_year_from') }}" 
                                       class="search-input" min="1950" max="{{ date('Y') + 1 }}">
                                @error('built_year_from')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="filter-group">
                                <label class="search-label">Built Year To</label>
                                <input type="number" name="built_year_to" value="{{ old('built_year_to') }}" 
                                       class="search-input" min="1950" max="{{ date('Y') + 1 }}">
                                @error('built_year_to')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="filter-group">
                                <label class="search-label">Flag</label>
                                <select name="flag" class="search-select">
                                    <option value="">Select flag...</option>
                                    @foreach($flags as $flag)
                                        <option value="{{ $flag }}" {{ old('flag') == $flag ? 'selected' : '' }}>
                                            {{ $flag }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('flag')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Dimensions -->
                            <div class="filter-group">
                                <label class="search-label">Length (meters)</label>
                                <input type="number" name="length" value="{{ old('length') }}" 
                                       class="search-input" min="0" step="0.01">
                                @error('length')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="filter-group">
                                <label class="search-label">Width (meters)</label>
                                <input type="number" name="width" value="{{ old('width') }}" 
                                       class="search-input" min="0" step="0.01">
                                @error('width')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="filter-group">
                                <label class="search-label">Draft (meters)</label>
                                <input type="number" name="draft" value="{{ old('draft') }}" 
                                       class="search-input" min="0" step="0.01">
                                @error('draft')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Inquiry Type -->
                            <div class="filter-group">
                                <label class="search-label">Inquiry Type *</label>
                                <select name="inquiry_type" class="search-select" required>
                                    <option value="">Select inquiry type...</option>
                                    <option value="purchase" {{ old('inquiry_type') == 'purchase' ? 'selected' : '' }}>Purchase</option>
                                    <option value="sale" {{ old('inquiry_type') == 'sale' ? 'selected' : '' }}>Sale</option>
                                    <option value="charter" {{ old('inquiry_type') == 'charter' ? 'selected' : '' }}>Charter</option>
                                    <option value="both" {{ old('inquiry_type') == 'both' ? 'selected' : '' }}>Both Purchase & Sale</option>
                                </select>
                                @error('inquiry_type')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Budget -->
                            <div class="filter-group">
                                <label class="search-label">Budget From (USD)</label>
                                <input type="number" name="budget_from" value="{{ old('budget_from') }}" 
                                       class="search-input" min="0" step="0.01">
                                @error('budget_from')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="filter-group">
                                <label class="search-label">Budget To (USD)</label>
                                <input type="number" name="budget_to" value="{{ old('budget_to') }}" 
                                       class="search-input" min="0" step="0.01">
                                @error('budget_to')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Additional Notes -->
                            <div class="search-input-container">
                                <label class="search-label">Additional Notes</label>
                                <textarea name="additional_notes" rows="6" class="search-input" 
                                          placeholder="Please provide any additional requirements or specifications...">{{ old('additional_notes') }}</textarea>
                                @error('additional_notes')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="search-buttons">
                            <button type="submit" class="search-button search-primary">
                                <i class="fas fa-search mr-2"></i>
                                Submit Requirements
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
