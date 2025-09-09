@extends('layouts.app')

@section('title', $vessel->name . ' - SMA Ship Brokers')
@section('description', $vessel->description)

@section('content')
    <!-- Vessel Hero Section -->
    <section class="relative py-20 bg-gradient-to-br from-primary-color to-primary-dark text-white overflow-hidden">
        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-4xl mx-auto">
                <div class="fade-in">
                    <div class="mb-4">
                        <span class="bg-white bg-opacity-20 text-white px-4 py-2 rounded-full text-sm font-semibold">
                            {{ $vessel->type }}
                        </span>
                    </div>
                    <h1 class="text-4xl md:text-5xl font-bold mb-6">{{ $vessel->name }}</h1>
                    <div class="flex items-center text-white opacity-90">
                        <div class="flex items-center mr-6">
                            <i class="fas fa-flag mr-2"></i>
                            <span>{{ $vessel->flag ?: 'Flag not specified' }}</span>
                        </div>
                        <div class="flex items-center mr-6">
                            <i class="fas fa-calendar mr-2"></i>
                            <span>Built {{ $vessel->built_year ?: 'Year not specified' }}</span>
                        </div>
                        <div class="flex items-center">
                            <span class="bg-{{ $vessel->daily_rate ? 'green' : 'blue' }}-100 text-{{ $vessel->daily_rate ? 'green' : 'blue' }}-800 px-3 py-1 rounded-full text-sm font-semibold">
                                {{ $vessel->daily_rate ? 'For Charter' : 'For Sale' }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Vessel Details -->
    <section class="section bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <!-- Main Content -->
                    <div class="lg:col-span-2">
                        @if($vessel->image)
                        <div class="mb-8">
                            <img src="{{ asset('storage/' . $vessel->image) }}" 
                                 alt="{{ $vessel->name }}" 
                                 class="w-full h-64 md:h-96 object-cover rounded-lg">
                        </div>
                        @else
                        <div class="mb-8 bg-gray-200 h-64 md:h-96 rounded-lg flex items-center justify-center">
                            <svg class="w-24 h-24 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        @endif

                        <div class="prose prose-lg max-w-none">
                            <h2 class="text-3xl font-bold mb-6">Vessel Description</h2>
                            <p class="text-gray-700 leading-relaxed">{{ $vessel->description }}</p>
                        </div>
                    </div>

                    <!-- Sidebar -->
                    <div class="lg:col-span-1">
                        <div class="card sticky top-8 flex flex-col justify-between h-full p-6">
                            <div>
                                <h3 class="text-2xl font-bold mb-6">Vessel Specifications</h3>
                                
                                <div class="space-y-4">
                                    @if($vessel->capacity)
                                    <div class="flex justify-between">
                                        <span class="text-gray-600">Capacity:</span>
                                        <span class="font-semibold">{{ number_format($vessel->capacity) }} DWT</span>
                                    </div>
                                    @endif
                    
                                    @if($vessel->length && $vessel->width)
                                    <div class="flex justify-between">
                                        <span class="text-gray-600">Length:</span>
                                        <span class="font-semibold">{{ $vessel->length }}m</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-gray-600">Width:</span>
                                        <span class="font-semibold">{{ $vessel->width }}m</span>
                                    </div>
                                    @endif
                    
                                    @if($vessel->draft)
                                    <div class="flex justify-between">
                                        <span class="text-gray-600">Draft:</span>
                                        <span class="font-semibold">{{ $vessel->draft }}m</span>
                                    </div>
                                    @endif
                    
                                    @if($vessel->built_year)
                                    <div class="flex justify-between">
                                        <span class="text-gray-600">Built Year:</span>
                                        <span class="font-semibold">{{ $vessel->built_year }}</span>
                                    </div>
                                    @endif
                    
                                    @if($vessel->flag)
                                    <div class="flex justify-between">
                                        <span class="text-gray-600">Flag:</span>
                                        <span class="font-semibold">{{ $vessel->flag }}</span>
                                    </div>
                                    @endif
                    
                                    @if($vessel->imo_number)
                                    <div class="flex justify-between">
                                        <span class="text-gray-600">IMO Number:</span>
                                        <span class="font-semibold">{{ $vessel->imo_number }}</span>
                                    </div>
                                    @endif
                    
                                    <div class="pt-4 border-t border-gray-200">
                                        @if($vessel->daily_rate)
                                            <div class="text-center">
                                                <div class="text-3xl font-bold text-primary-color">${{ number_format($vessel->daily_rate) }}</div>
                                                <div class="text-gray-600">per day</div>
                                            </div>
                                        @else
                                            <div class="text-center">
                                                <div class="text-2xl font-bold text-primary-color">Price on Request</div>
                                                <div class="text-gray-600">Contact us for details</div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                    
                            <!-- Buttons at bottom with equal height -->
                            <div class="mt-6 flex flex-col gap-3">
                                <a href="{{ route('vessels.inquiry') }}?vessel_id={{ $vessel->id }}" 
                                   class="btn-primary w-full py-4 text-center text-lg font-semibold rounded-lg">
                                    Send Inquiry
                                </a>
                                <a href="{{ route('vessels') }}" 
                                   class="btn-secondary w-full py-4 text-center text-lg font-semibold rounded-lg">
                                    Back to Vessels
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
                    <a href="{{ route('vessels.inquiry') }}?vessel_id={{ $vessel->id }}" class="btn-primary bg-gray-800 text-lg px-8 py-4 transform scale-105">
                        Send Inquiry
                    </a>
                    <a href="{{ route('contact') }}" class="border-2 border-white text-white px-8 py-4 rounded-lg font-semibold hover:bg-white hover:text-gray-800 transition-colors">
                        Contact Us
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
