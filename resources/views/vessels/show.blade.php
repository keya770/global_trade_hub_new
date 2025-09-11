@extends('layouts.app')

@section('title', $vessel->name . ' - SMA Ship Brokers')
@section('description', $vessel->description)

@section('content')
    <!-- Vessel Hero Section -->
    <section class="relative py-20 bg-gradient-to-br from-primary-color to-primary-dark text-white overflow-hidden">
        <!-- Animated Background -->
        <div class="absolute inset-0">
            
        </div>
        
        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-4xl mx-auto">
                <div class="hero-content">
                    <div class="vessel-badge">
                        <i class="fas fa-ship mr-2"></i>
                        {{ $vessel->type }}
                    </div>
                    <h1 class="hero-title">{{ $vessel->name }}</h1>
                    <div class="hero-meta">
                        <div class="meta-item">
                            <div class="meta-icon">
                                <i class="fas fa-flag"></i>
                            </div>
                            <span>{{ $vessel->flag ?: 'Flag not specified' }}</span>
                        </div>
                        <div class="meta-item">
                            <div class="meta-icon">
                                <i class="fas fa-calendar"></i>
                            </div>
                            <span>Built {{ $vessel->built_year ?: 'Year not specified' }}</span>
                        </div>
                        <div class="meta-item">
                            <span class="vessel-status {{ $vessel->daily_rate ? 'charter' : 'sale' }}">
                                {{ $vessel->daily_rate ? 'For Charter' : 'For Sale' }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Vessel Details -->
    <section class="section bg-gradient-to-br from-gray-50 to-white">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <div class="vessel-layout">
                    <!-- Main Content -->
                    <div class="vessel-main">
                        <div class="vessel-image-container">
                            @if($vessel->image)
                                <img src="{{ asset('storage/' . $vessel->image) }}" 
                                     alt="{{ $vessel->name }}" 
                                     class="vessel-image">
                            @else
                                <div class="vessel-placeholder">
                                    <i class="fas fa-ship"></i>
                                </div>
                            @endif
                            <div class="image-overlay">
                                <div class="overlay-content">
                                    <h3 class="overlay-title">{{ $vessel->name }}</h3>
                                    <p class="overlay-desc">{{ $vessel->type }} Vessel</p>
                                </div>
                            </div>
                        </div>

                        <div class="vessel-description">
                            <div class="description-header">
                                <h2 class="description-title">Vessel Description</h2>
                                <div class="description-divider"></div>
                            </div>
                            <div class="description-content">
                                <p class="description-text">{{ $vessel->description }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Sidebar -->
                    <div class="vessel-sidebar">
                        <div class="specs-card">
                            <h3 class="specs-title">Vessel Specifications</h3>
                            <div class="specs-divider"></div>
                    
                            <div class="specs-content">
                                @if($vessel->capacity)
                                    <div class="spec-item"><i class="fas fa-weight"></i>
                                        <span>Capacity:</span> {{ number_format($vessel->capacity) }} DWT
                                    </div>
                                @endif
                    
                                @if($vessel->length) 
                                    <div class="spec-item"><i class="fas fa-ruler-combined"></i>
                                        <span>Length:</span> {{ $vessel->length }}m
                                    </div>
                                @endif
                    
                                @if($vessel->width)
                                    <div class="spec-item"><i class="fas fa-arrows-alt-h"></i>
                                        <span>Width:</span> {{ $vessel->width }}m
                                    </div>
                                @endif
                    
                                @if($vessel->draft)
                                    <div class="spec-item"><i class="fas fa-water"></i>
                                        <span>Draft:</span> {{ $vessel->draft }}m
                                    </div>
                                @endif
                    
                                @if($vessel->built_year)
                                    <div class="spec-item"><i class="fas fa-calendar"></i>
                                        <span>Built Year:</span> {{ $vessel->built_year }}
                                    </div>
                                @endif
                    
                                @if($vessel->flag)
                                    <div class="spec-item"><i class="fas fa-flag"></i>
                                        <span>Flag:</span> {{ $vessel->flag }}
                                    </div>
                                @endif
                    
                                @if($vessel->imo_number)
                                    <div class="spec-item"><i class="fas fa-hashtag"></i>
                                        <span>IMO:</span> {{ $vessel->imo_number }}
                                    </div>
                                @endif
                    
                                <div class="price-section">
                                    @if($vessel->daily_rate)
                                        <div>${{ number_format($vessel->daily_rate) }} <small>/ day</small></div>
                                    @else
                                        <div>Price on Request</div>
                                    @endif
                                </div>
                            </div>
                    
                            <div class="action-buttons">
                                <a href="{{ route('vessels.inquiry') }}?vessel_id={{ $vessel->id }}" class="action-button action-primary">
                                    <i class="fas fa-paper-plane"></i> Send Inquiry
                                </a>
                                <a href="{{ route('vessels') }}" class="action-button action-secondary">
                                    <i class="fas fa-arrow-left"></i> Back
                                </a>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>

    <!-- Form Section -->
    <section class="section bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <!-- Success/Error Alerts -->
                @if(session('success'))
                    <div class="mb-8 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg">
                        <div class="flex items-center">
                            <i class="fas fa-check-circle mr-2"></i>
                            {{ session('success') }}
                        </div>
                    </div>
                @endif

                @if(session('error'))
                    <div class="mb-8 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg">
                        <div class="flex items-center">
                            <i class="fas fa-exclamation-circle mr-2"></i>
                            {{ session('error') }}
                        </div>
                    </div>
                @endif

                @if($errors->any())
                    <div class="mb-8 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg">
                        <div class="flex items-center mb-2">
                            <i class="fas fa-exclamation-circle mr-2"></i>
                            <strong>Please correct the following errors:</strong>
                        </div>
                        <ul class="list-disc list-inside ml-4">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Form Card -->
                <div class="bg-white rounded-lg shadow-lg p-8">
                    <form action="{{ route('vessels.purchase-sale.submit') }}" method="POST" class="space-y-6">
                        @csrf
                        <input type="hidden" name="vessel_id" value="{{ $vessel->id }}">

                        <!-- Personal Information -->
                        <div class="border-b border-gray-200 pb-6">
                            <h2 class="text-2xl font-bold text-gray-900 mb-6">Personal Information</h2>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="full_name" class="block text-sm font-medium text-gray-700 mb-2">
                                        Full Name <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" 
                                           name="full_name" 
                                           id="full_name" 
                                           value="{{ old('full_name') }}"
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-primary-color focus:border-transparent transition-colors"
                                           placeholder="Enter your full name"
                                           required>
                                </div>

                                <div>
                                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                                        Email Address <span class="text-red-500">*</span>
                                    </label>
                                    <input type="email" 
                                           name="email" 
                                           id="email" 
                                           value="{{ old('email') }}"
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-primary-color focus:border-transparent transition-colors"
                                           placeholder="Enter your email address"
                                           required>
                                </div>

                                <div>
                                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">
                                        Phone Number <span class="text-red-500">*</span>
                                    </label>
                                    <input type="tel" 
                                           name="phone" 
                                           id="phone" 
                                           value="{{ old('phone') }}"
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-primary-color focus:border-transparent transition-colors"
                                           placeholder="Enter your phone number"
                                           required>
                                </div>

                                <div>
                                    <label for="company_name" class="block text-sm font-medium text-gray-700 mb-2">
                                        Company Name
                                    </label>
                                    <input type="text" 
                                           name="company_name" 
                                           id="company_name" 
                                           value="{{ old('company_name') }}"
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-primary-color focus:border-transparent transition-colors"
                                           placeholder="Enter your company name">
                                </div>
                            </div>
                        </div>

                        <!-- Vessel Specifications -->
                        <div class="border-b border-gray-200 pb-6">
                            <h2 class="text-2xl font-bold text-gray-900 mb-6">Vessel Specifications</h2>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="vessel_type" class="block text-sm font-medium text-gray-700 mb-2">
                                        Vessel Type
                                    </label>
                                    <select name="vessel_type" 
                                            id="vessel_type"
                                            class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-primary-color focus:border-transparent transition-colors">
                                        <option value="">Select vessel type</option>
                                        <option value="Bulk Carrier" {{ old('vessel_type') == 'Bulk Carrier' ? 'selected' : '' }}>Bulk Carrier</option>
                                        <option value="Tanker" {{ old('vessel_type') == 'Tanker' ? 'selected' : '' }}>Tanker</option>
                                        <option value="Container Ship" {{ old('vessel_type') == 'Container Ship' ? 'selected' : '' }}>Container Ship</option>
                                        <option value="LNG" {{ old('vessel_type') == 'LNG' ? 'selected' : '' }}>LNG</option>
                                        <option value="General Cargo" {{ old('vessel_type') == 'General Cargo' ? 'selected' : '' }}>General Cargo</option>
                                    </select>
                                </div>

                                <div>
                                    <label for="vessel_dwt" class="block text-sm font-medium text-gray-700 mb-2">
                                        Vessel DWT/TEU
                                    </label>
                                    <input type="number" 
                                           name="vessel_dwt" 
                                           id="vessel_dwt" 
                                           value="{{ old('vessel_dwt') }}"
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-primary-color focus:border-transparent transition-colors"
                                           placeholder="Enter DWT or TEU capacity">
                                </div>

                                <div>
                                    <label for="built_year" class="block text-sm font-medium text-gray-700 mb-2">
                                        Built Year
                                    </label>
                                    <input type="number" 
                                           name="built_year" 
                                           id="built_year" 
                                           value="{{ old('built_year') }}"
                                           min="1950" 
                                           max="{{ date('Y') + 1 }}"
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-primary-color focus:border-transparent transition-colors"
                                           placeholder="Enter built year">
                                </div>

                                <div>
                                    <label for="flag" class="block text-sm font-medium text-gray-700 mb-2">
                                        Flag
                                    </label>
                                    <input type="text" 
                                           name="flag" 
                                           id="flag" 
                                           value="{{ old('flag') }}"
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-primary-color focus:border-transparent transition-colors"
                                           placeholder="Enter vessel flag">
                                </div>

                                <div class="md:col-span-2">
                                    <label for="dimensions" class="block text-sm font-medium text-gray-700 mb-2">
                                        Draft / Length / Width
                                    </label>
                                    <input type="text" 
                                           name="dimensions" 
                                           id="dimensions" 
                                           value="{{ old('dimensions') }}"
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-primary-color focus:border-transparent transition-colors"
                                           placeholder="e.g., Draft: 12m, Length: 200m, Width: 32m">
                                </div>
                            </div>
                        </div>

                        <!-- Inquiry Type -->
                        <div class="border-b border-gray-200 pb-6">
                            <h2 class="text-2xl font-bold text-gray-900 mb-6">Inquiry Type</h2>
                            <div class="space-y-4">
                                <div class="flex items-center">
                                    <input type="radio" 
                                           name="inquiry_type" 
                                           id="purchase" 
                                           value="purchase"
                                           {{ old('inquiry_type') == 'purchase' ? 'checked' : '' }}
                                           class="h-4 w-4 text-primary-color focus:ring-primary-color border-gray-300">
                                    <label for="purchase" class="ml-3 block text-sm font-medium text-gray-700">
                                        Purchase
                                    </label>
                                </div>
                                <div class="flex items-center">
                                    <input type="radio" 
                                           name="inquiry_type" 
                                           id="sale" 
                                           value="sale"
                                           {{ old('inquiry_type') == 'sale' ? 'checked' : '' }}
                                           class="h-4 w-4 text-primary-color focus:ring-primary-color border-gray-300">
                                    <label for="sale" class="ml-3 block text-sm font-medium text-gray-700">
                                        Sale
                                    </label>
                                </div>
                                <div class="flex items-center">
                                    <input type="radio" 
                                           name="inquiry_type" 
                                           id="both" 
                                           value="both"
                                           {{ old('inquiry_type') == 'both' ? 'checked' : '' }}
                                           class="h-4 w-4 text-primary-color focus:ring-primary-color border-gray-300">
                                    <label for="both" class="ml-3 block text-sm font-medium text-gray-700">
                                        Both
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Additional Notes -->
                        <div>
                            <label for="additional_notes" class="block text-sm font-medium text-gray-700 mb-2">
                                Additional Notes
                            </label>
                            <textarea name="additional_notes" 
                                      id="additional_notes" 
                                      rows="6"
                                      class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-primary-color focus:border-transparent transition-colors resize-none"
                                      placeholder="Please provide any additional details about your requirements, timeline, budget, or specific vessel specifications...">{{ old('additional_notes') }}</textarea>
                        </div>

                        <!-- Submit Button -->
                        <div class="flex justify-center pt-6">
                            <button type="submit" 
                                    class="btn-primary w-full py-3 transform scale-105">
                                <i class="fas fa-paper-plane mr-2"></i>
                                Send Inquiry
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Additional Information -->
                <div class="mt-8 bg-white rounded-lg shadow-lg p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-4">What happens next?</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="text-center">
                            <div class="w-12 h-12 bg-primary-color rounded-full flex items-center justify-center mx-auto mb-3">
                                <i class="fas fa-envelope text-black"></i>
                            </div>
                            <h4 class="font-semibold text-gray-900 mb-2">Submit Inquiry</h4>
                            <p class="text-gray-600 text-sm">Fill out the form with your vessel requirements</p>
                        </div>
                        <div class="text-center">
                            <div class="w-12 h-12 bg-primary-color rounded-full flex items-center justify-center mx-auto mb-3">
                                <i class="fas fa-phone text-black"></i>
                            </div>
                            <h4 class="font-semibold text-gray-900 mb-2">Expert Review</h4>
                            <p class="text-gray-600 text-sm">Our maritime experts will review your requirements</p>
                        </div>
                        <div class="text-center">
                            <div class="w-12 h-12 bg-primary-color rounded-full flex items-center justify-center mx-auto mb-3">
                                <i class="fas fa-handshake text-black"></i>
                            </div>
                            <h4 class="font-semibold text-gray-900 mb-2">Get Response</h4>
                            <p class="text-gray-600 text-sm">We'll contact you with tailored solutions</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Related Vessels -->
    @if($relatedVessels->count() > 0)
    <section class="section bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold mb-4">Related Vessels</h2>
                <p class="text-gray-600">You might also be interested in these vessels</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($relatedVessels as $relatedVessel)
                <div class="card bg-white">
                    @if($relatedVessel->image)
                        <img src="{{ asset('storage/' . $relatedVessel->image) }}" 
                             alt="{{ $relatedVessel->name }}" 
                             class="w-full h-48 object-cover rounded-lg mb-4">
                    @else
                        <div class="bg-gray-200 h-48 rounded-lg mb-4 flex items-center justify-center">
                            <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                    @endif
                    <div class="p-4">
                        <div class="flex justify-between items-start mb-3">
                            <h3 class="text-lg font-bold">{{ $relatedVessel->name }}</h3>
                            <span class="bg-{{ $relatedVessel->daily_rate ? 'green' : 'blue' }}-100 text-{{ $relatedVessel->daily_rate ? 'green' : 'blue' }}-800 text-xs font-semibold px-2 py-1 rounded">
                                {{ $relatedVessel->daily_rate ? 'For Charter' : 'For Sale' }}
                            </span>
                        </div>
                        <div class="space-y-2 mb-4">
                            @if($relatedVessel->built_year)
                                <p class="text-gray-600 text-sm"><strong>Built:</strong> {{ $relatedVessel->built_year }}</p>
                            @endif
                            @if($relatedVessel->capacity)
                                <p class="text-gray-600 text-sm"><strong>Capacity:</strong> {{ number_format($relatedVessel->capacity) }} DWT</p>
                            @endif
                        </div>
                        <div class="flex justify-between items-center">
                            @if($relatedVessel->daily_rate)
                                <span class="text-primary-color font-semibold">${{ number_format($relatedVessel->daily_rate) }}/day</span>
                            @else
                                <span class="text-primary-color font-semibold">Price on Request</span>
                            @endif
                            <a href="{{ route('vessels.show', $relatedVessel) }}" class="text-primary-color text-sm font-semibold hover:underline">
                                View Details →
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- CTA Section -->
    <section class="section bg-primary-color text-white">
        <div class="container mx-auto px-4 text-center">
            <div class="fade-in">
                <h2 class="text-4xl font-bold mb-6">Interested in This Vessel?</h2>
                <p class="text-xl mb-8 opacity-90 max-w-2xl mx-auto">
                    Contact us for more information, inspection requests, or to discuss charter/sale terms.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('vessels.inquiry') }}?vessel_id={{ $vessel->id }}" class="btn-primary bg-gray-800 text-lg px-8 py-4 transform scale-105 ">
                        Send Inquiry
                    </a>
                    <a href="{{ route('contact') }}" class="border-2 border-white text-white px-8 py-4 rounded-lg font-semibold hover:bg-white hover:text-gray-800 transition-colors">
                        Get in Touch
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

    .vessel-badge {
        display: inline-block;
        background: rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(10px);
        color: white;
        padding: 12px 24px;
        border-radius: 30px;
        font-size: 14px;
        font-weight: 600;
        margin-bottom: 24px;
        animation: slideInLeft 0.8s ease forwards 0.2s;
        opacity: 0;
        transform: translateX(-30px);
        border: 1px solid rgba(255, 255, 255, 0.3);
    }

    .hero-title {
        font-size: 3.5rem;
        font-weight: 800;
        margin-bottom: 32px;
        background: linear-gradient(135deg, #ffffff, #e0f2fe);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        animation: slideInUp 0.8s ease forwards 0.4s;
        opacity: 0;
        transform: translateY(30px);
    }

    .hero-meta {
        display: flex;
        align-items: center;
        gap: 32px;
        flex-wrap: wrap;
        animation: slideInUp 0.8s ease forwards 0.6s;
        opacity: 0;
        transform: translateY(30px);
    }

    .meta-item {
        display: flex;
        align-items: center;
        gap: 12px;
        color: rgba(255, 255, 255, 0.9);
        font-size: 16px;
    }

    .meta-icon {
        width: 40px;
        height: 40px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
    }

    .vessel-status {
        font-size: 14px;
        font-weight: 600;
        padding: 8px 16px;
        border-radius: 25px;
    }

    .vessel-status.sale {
        background: rgba(59, 130, 246, 0.2);
        color: #93c5fd;
        border: 1px solid rgba(59, 130, 246, 0.3);
    }

    .vessel-status.charter {
        background: rgba(34, 197, 94, 0.2);
        color: #86efac;
        border: 1px solid rgba(34, 197, 94, 0.3);
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

    /* Vessel Layout */
    .vessel-layout {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 48px;
        animation: fadeInUp 0.8s ease forwards;
    }

    .vessel-main {
        animation: fadeInUp 0.8s ease forwards 0.2s;
        opacity: 0;
        transform: translateY(30px);
    }

    .vessel-sidebar {
        animation: fadeInUp 0.8s ease forwards 0.4s;
        opacity: 0;
        transform: translateY(30px);
    }

    /* Vessel Image */
    .vessel-image-container {
        position: relative;
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        margin-bottom: 32px;
    }

    .vessel-image {
        width: 100%;
        height: 400px;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .vessel-image-container:hover .vessel-image {
        transform: scale(1.05);
    }

    .vessel-placeholder {
        width: 100%;
        height: 400px;
        background: linear-gradient(135deg, #f3f4f6, #e5e7eb);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #9ca3af;
        font-size: 64px;
    }

    .image-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: linear-gradient(to top, rgba(0, 0, 0, 0.8), transparent);
        padding: 32px;
        color: white;
    }

    .overlay-title {
        font-size: 24px;
        font-weight: 700;
        margin-bottom: 8px;
    }

    .overlay-desc {
        font-size: 16px;
        opacity: 0.9;
    }

    /* Vessel Description */
    .vessel-description {
        background: white;
        padding: 40px;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    .description-header {
        text-align: center;
        margin-bottom: 32px;
    }

    .description-title {
        font-size: 28px;
        font-weight: 800;
        color: #1f2937;
        margin-bottom: 16px;
        background: linear-gradient(135deg, #499974, #6d83d5);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .description-divider {
        width: 80px;
        height: 4px;
        background: linear-gradient(135deg, #499974, #6d83d5);
        border-radius: 2px;
        margin: 0 auto;
    }

    .description-content {
        font-size: 18px;
        line-height: 1.8;
        color: #374151;
    }

    .description-text {
        margin: 0;
    }

    /* Specifications Card */
    .specs-card {
        background: white;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        padding: 32px;
        position: sticky;
        top: 32px;
    }

    .specs-header {
        text-align: center;
        margin-bottom: 32px;
    }

    .specs-title {
        font-size: 24px;
        font-weight: 800;
        color: #1f2937;
        margin-bottom: 16px;
        background: linear-gradient(135deg, #499974, #6d83d5);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .specs-divider {
        width: 60px;
        height: 3px;
        background: linear-gradient(135deg, #499974, #6d83d5);
        border-radius: 2px;
        margin: 0 auto;
    }

    .specs-content {
        margin-bottom: 32px;
    }

    .spec-item {
        display: flex;
        align-items: center;
        gap: 16px;
        padding: 16px 0;
        border-bottom: 1px solid #f3f4f6;
    }

    .spec-item:last-child {
        border-bottom: none;
    }

    .spec-icon {
        width: 40px;
        height: 40px;
        background: linear-gradient(135deg, #499974, #6d83d5);
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 16px;
        flex-shrink: 0;
    }

    .spec-details {
        display: flex;
        flex-direction: column;
        gap: 4px;
    }

    .spec-label {
        font-size: 14px;
        color: #6b7280;
        font-weight: 500;
    }

    .spec-value {
        font-size: 16px;
        color: #1f2937;
        font-weight: 700;
    }

    .price-section {
        background: linear-gradient(135deg, #f8fafc, #f1f5f9);
        border-radius: 16px;
        padding: 24px;
        text-align: center;
        margin-top: 24px;
    }

    .price-display {
        display: flex;
        flex-direction: column;
        gap: 8px;
    }

    .price-amount {
        font-size: 32px;
        font-weight: 800;
        color: #499974;
    }

    .price-period {
        font-size: 16px;
        color: #6b7280;
        font-weight: 500;
    }

    /* Action Buttons */
    .action-buttons {
        display: flex;
        flex-direction: column;
        gap: 16px;
    }

    .action-button {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 16px 24px;
        border-radius: 12px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
        font-size: 16px;
        text-align: center;
    }

    .action-primary {
        background: linear-gradient(135deg, #499974, #6d83d5);
        color: white;
    }

    .action-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(73, 153, 116, 0.3);
    }

    .action-secondary {
        background: white;
        color: #6b7280;
        border: 2px solid #e5e7eb;
    }

    .action-secondary:hover {
        background: #f9fafb;
        border-color: #d1d5db;
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

    @keyframes slideInLeft {
        to {
            opacity: 1;
            transform: translateX(0);
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
    @media (max-width: 1024px) {
        .vessel-layout {
            grid-template-columns: 1fr;
            gap: 32px;
        }
        
        .specs-card {
            position: static;
        }
    }

    @media (max-width: 768px) {
        .hero-title {
            font-size: 2.5rem;
        }
        
        .hero-meta {
            flex-direction: column;
            gap: 16px;
            align-items: flex-start;
        }
        
        .vessel-image {
            height: 300px;
        }
        
        .vessel-placeholder {
            height: 300px;
        }
        
        .cta-buttons {
            flex-direction: column;
            align-items: center;
        }
    }
    </style>
@endsection
