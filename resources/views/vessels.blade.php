@extends('layouts.app')

@section('title', 'Vessel Inquiries - SMA Ship Brokers')
@section('description', 'Submit your vessel sale & purchase or chartering requirements. Get personalized assistance from our expert team.')

@section('content')
    <!-- Hero Section -->
    <section class="relative py-20 bg-gradient-to-br from-primary-color to-primary-dark text-white overflow-hidden">
        <div class="container mx-auto px-4 text-center relative z-10">
            <div class="hero-content">
                <h1 class="hero-title">Vessel Inquiries</h1>
                <p class="hero-description">
                    Submit your vessel sale & purchase or chartering requirements
                </p>
            </div>
        </div>
    </section>

    <!-- Form Toggle Buttons and Forms Section -->
    <div x-data="{ 
        activeForm: 'snp', 
        charterType: ''
    }">
    <style>
        /* Toggle Section Styling */
    .section {
    padding: 60px 0;
    }

    .section .container {
    max-width: 1200px;
    margin: 0 auto;
    }

    .section .bg-white {
    background: #fff;
    }

    .section button {
    border: none;
    outline: none;
    cursor: pointer;
    font-size: 1rem;
    transition: all 0.3s ease;
    }

    .section button:hover {
    transform: translateY(-2px);
    }

    .section button.px-8 {
    min-width: 220px;
    }

    /* Active States */
    .section button.bg-primary-color {
    background: linear-gradient(135deg, #499974, #6d83d5);"
    color: #fff !important;
    box-shadow: 0 4px 10px rgba(0, 64, 128, 0.3);
    }

    .section button.bg-primary-color.text-black {
    color: #fff !important; /* ensure consistency */
    }

    /* Inactive States */
    .section button.text-gray-600 {
    background: #f9fafb;
    border: 1px solid #ddd;
    color: #444;
    }

    .section button.text-gray-600:hover {
    border-color: #004080;
    color: #004080 !important;
    }

    /* Wrapper Box */
    .section .bg-white.rounded-lg.p-2.shadow-lg {
    padding: 6px;
    border-radius: 12px;
    background: #fff;
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
    }

        </style>
        <!-- Form Toggle Buttons -->
        <section class="section bg-gradient-to-br from-gray-50 to-white">
            <div class="container mx-auto px-4">
                <div class="flex justify-center mb-8">
                    <div class="bg-white rounded-lg p-2 shadow-lg">
                        <button 
                            @click="activeForm = 'snp'" 
                            :class="activeForm === 'snp' ? 'bg-primary-color text-black' : 'text-gray-600 hover:text-primary-color'"
                            class="px-8 py-3 rounded-lg font-semibold transition-all duration-300 mr-2"
                        >
                            Vessel Sale & Purchase
                        </button>
                        <button 
                            @click="activeForm = 'charter'" 
                            :class="activeForm === 'charter' ? 'bg-primary-color text-white' : 'text-gray-600 hover:text-primary-color'"
                            class="px-8 py-3 rounded-lg font-semibold transition-all duration-300"
                        >
                            Vessel Chartering
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <!-- Forms Section -->
        <section class="section bg-gray-50">
            <div class="container mx-auto px-4">
                
                <!-- Success/Error Messages -->
                @if(session('success'))
                    <div class="max-w-4xl mx-auto mb-8 message-container">
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg animate-pulse">
                            <div class="flex items-center">
                                <i class="fas fa-check-circle mr-2"></i>
                                {{ session('success') }}
                            </div>
                        </div>
                    </div>
                @endif

                @if(session('error'))
                    <div class="max-w-4xl mx-auto mb-8 message-container">
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg animate-pulse">
                            <div class="flex items-center">
                                <i class="fas fa-exclamation-circle mr-2"></i>
                                {{ session('error') }}
                            </div>
                        </div>
                    </div>
                @endif

                @if($errors->any())
                    <div class="max-w-4xl mx-auto mb-8 message-container">
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg">
                            <div class="flex items-center mb-2">
                                <i class="fas fa-exclamation-triangle mr-2"></i>
                                <strong>Please correct the following errors:</strong>
                            </div>
                            <ul class="list-disc list-inside ml-4">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
            
                <!-- Sale & Purchase Form -->
                <div x-show="activeForm === 'snp'" x-transition class="max-w-4xl mx-auto card fade-in visible shadow-lg">
                        <div class="text-center mb-8">
                            <h2 class="text-3xl font-bold text-gray-800 mb-2">Vessel Sale & Purchase</h2>
                            <p class="text-gray-600">Submit your vessel S&P requirements</p>
                        </div>
                        
                        <form action="{{ route('vessels.sale-purchase.store') }}" method="POST" class="space-y-8">
                            @csrf
                            
                            <!-- Organisation Details -->
                            <div class="bg-gray-50 rounded-xl p-6 form-section">
                                <h3 class="text-xl font-semibold text-gray-800 mb-6">Organisation Details</h3>
                                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Type of Organisation</label>
                                        <select name="organisation_type" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-color focus:border-transparent">
                                            <option value="">Select Organisation Type</option>
                                            <option value="ship_owner">Ship Owner</option>
                                            <option value="ship_broker">Ship Broker</option>
                                            <option value="commodity_trader">Commodity Trader</option>
                                            <option value="other">Other</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Company Name</label>
                                        <input type="text" name="company_name" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-color focus:border-transparent">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Phone</label>
                                        <input type="text" name="phone" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-color focus:border-transparent">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                                        <input type="email" name="email" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-color focus:border-transparent">
                                    </div>
                                    <div class="lg:col-span-2">
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Address</label>
                                        <textarea name="address" rows="3" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-color focus:border-transparent"></textarea>
                                    </div>
                                </div>
                            </div>

                            <!-- Vessel Details -->
                            <div class="bg-gray-50 rounded-xl p-6 form-section">
                                <h3 class="text-xl font-semibold text-gray-800 mb-6">Vessel Details</h3>
                                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Type of Ship</label>
                                        <select name="ship_type" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-color focus:border-transparent">
                                            <option value="">Select Ship Type</option>
                                            <option value="newbuild">Newbuild</option>
                                            <option value="second_hand">Second-hand</option>
                                            <option value="scrap">Scrap</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Vessel Type</label>
                                        <select name="vessel_type" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-color focus:border-transparent">
                                            <option value="">Select Vessel Type</option>
                                            <option value="dry_bulk_carrier">Dry Bulk Carrier</option>
                                            <option value="tanker_cpp_dpp">Tanker (CPP/DPP)</option>
                                            <option value="tanker_oil_products">Tanker (Oil Products)</option>
                                            <option value="tanker_crude_oil">Tanker (Crude Oil)</option>
                                            <option value="tanker_bitumen">Tanker (Bitumen)</option>
                                            <option value="tanker_bunkering">Tanker (Bunkering)</option>
                                            <option value="lpg">LPG</option>
                                            <option value="lng">LNG</option>
                                            <option value="container">Container</option>
                                            <option value="offshore">Offshore</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Year of Build</label>
                                        <input type="number" name="year_of_build" min="1900" max="2030" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-color focus:border-transparent">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">DWT (Deadweight Tonnage)</label>
                                        <input type="number" name="dwt" min="0" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-color focus:border-transparent">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Preferred Build Nation</label>
                                        <select name="build_nation" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-color focus:border-transparent">
                                            <option value="">Select Build Nation</option>
                                            <option value="japan">Japan</option>
                                            <option value="south_korea">South Korea</option>
                                            <option value="china">China</option>
                                            <option value="other">Other</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Budget (USD)</label>
                                        <input type="number" name="budget" min="0" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-color focus:border-transparent">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Trading Area</label>
                                        <input type="text" name="trading_area" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-color focus:border-transparent">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Delivery Location</label>
                                        <input type="text" name="delivery_location" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-color focus:border-transparent">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Preferred Timeline</label>
                                        <input type="date" name="timeline" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-color focus:border-transparent">
                                    </div>
                                </div>
                            </div>

                            <!-- Transaction Details -->
                            <div class="bg-gray-50 rounded-xl p-6 form-section">
                                <h3 class="text-xl font-semibold text-gray-800 mb-6">Transaction Details</h3>
                                <div class="flex space-x-6">
                                    <label class="flex items-center">
                                        <input type="radio" name="action" value="buy" class="mr-2 text-primary-color focus:ring-primary-color">
                                        <span class="text-gray-700 font-medium">Buy</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="radio" name="action" value="sale" class="mr-2 text-primary-color focus:ring-primary-color">
                                        <span class="text-gray-700 font-medium">Sale</span>
                                    </label>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="text-center">
                                <button type="submit" class="btn-primary w-full py-3 transform scale-105">
                                    Submit S&P Inquiry
                                </button>
                            </div>
                        </form>
                </div>

                <!-- Chartering Form -->
                <div x-show="activeForm === 'charter'" x-transition class="max-w-4xl mx-auto card fade-in visible">
                        <div class="text-center mb-8">
                            <h2 class="text-3xl font-bold text-gray-800 mb-2">Vessel Chartering</h2>
                            <p class="text-gray-600">Submit your vessel chartering requirements</p>
                        </div>
                        
                        <form action="{{ route('vessels.chartering.store') }}" method="POST" class="space-y-8">
                            @csrf
                            
                            <!-- Organisation Details -->
                            <div class="bg-gray-50 rounded-xl p-6 form-section">
                                <h3 class="text-xl font-semibold text-gray-800 mb-6">Organisation Details</h3>
                                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Type of Organisation</label>
                                        <select name="organisation_type" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-color focus:border-transparent">
                                            <option value="">Select Organisation Type</option>
                                            <option value="importer">Importer</option>
                                            <option value="exporter">Exporter</option>
                                            <option value="commodity_trader">Commodity Trader</option>
                                            <option value="ship_owner">Ship Owner</option>
                                            <option value="other">Other</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Company Name</label>
                                        <input type="text" name="company_name" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-color focus:border-transparent">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Phone</label>
                                        <input type="text" name="phone" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-color focus:border-transparent">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                                        <input type="email" name="email" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-color focus:border-transparent">
                                    </div>
                                    <div class="lg:col-span-2">
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Address</label>
                                        <textarea name="address" rows="3" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-color focus:border-transparent"></textarea>
                                    </div>
                                </div>
                            </div>

                            <!-- Charter Details -->
                            <div class="bg-gray-50 rounded-xl p-6 form-section">
                                <h3 class="text-xl font-semibold text-gray-800 mb-6">Charter Details</h3>
                                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Type of Charter</label>
                                        <select name="charter_type" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-color focus:border-transparent" x-model="charterType">
                                            <option value="">Select Charter Type</option>
                                            <option value="voyage_charter">Voyage Charter</option>
                                            <option value="time_charter">Time Charter</option>
                                            <option value="bareboat_charter">Bareboat Charter</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Type of Vessel</label>
                                        <select name="vessel_type" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-color focus:border-transparent">
                                            <option value="">Select Vessel Type</option>
                                            <option value="dry_bulk">Dry Bulk</option>
                                            <option value="tanker">Tanker</option>
                                            <option value="container">Container</option>
                                            <option value="lng">LNG</option>
                                            <option value="offshore">Offshore</option>
                                        </select>
                                    </div>
                                    
                                    <!-- Conditional Date Fields -->
                                    <div x-show="charterType === 'voyage_charter'">
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Laycan / Delivery Date</label>
                                        <input type="date" name="laycan_date" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-color focus:border-transparent">
                                    </div>
                                    
                                    <div x-show="charterType === 'time_charter' || charterType === 'bareboat_charter'">
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Delivery Date</label>
                                        <input type="date" name="delivery_date" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-color focus:border-transparent">
                                    </div>
                                    
                                    <div x-show="charterType === 'time_charter' || charterType === 'bareboat_charter'">
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Start Date</label>
                                        <input type="date" name="start_date" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-color focus:border-transparent">
                                    </div>
                                    
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Budget (USD/TON)</label>
                                        <input type="number" name="budget_per_ton" min="0" step="0.01" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-color focus:border-transparent">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Budget (USD/Day)</label>
                                        <input type="number" name="budget_per_day" min="0" step="0.01" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-color focus:border-transparent">
                                    </div>
                                </div>
                            </div>

                            <!-- Freight Details -->
                            <div class="bg-gray-50 rounded-xl p-6 form-section">
                                <h3 class="text-xl font-semibold text-gray-800 mb-6">Freight Details</h3>
                                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Port of Loading (POL)</label>
                                        <input type="text" name="port_of_loading" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-color focus:border-transparent">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Port of Discharge (POD)</label>
                                        <input type="text" name="port_of_discharge" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-color focus:border-transparent">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Cargo Type</label>
                                        <select name="cargo_type" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-color focus:border-transparent">
                                            <option value="">Select Cargo Type</option>
                                            <option value="coal">Coal</option>
                                            <option value="iron_ore">Iron Ore</option>
                                            <option value="grain">Grain</option>
                                            <option value="cement">Cement</option>
                                            <option value="fertilizer">Fertilizer</option>
                                            <option value="crude_oil">Crude Oil</option>
                                            <option value="oil_products">Oil Products</option>
                                            <option value="lng">LNG</option>
                                            <option value="lpg">LPG</option>
                                            <option value="containers">Containers</option>
                                            <option value="other">Other</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Cargo Quantity (MT)</label>
                                        <input type="number" name="cargo_quantity" min="0" step="0.01" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-color focus:border-transparent">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Load Rate</label>
                                        <input type="number" name="load_rate" min="0" step="0.01" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-color focus:border-transparent">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Discharge Rate</label>
                                        <input type="number" name="discharge_rate" min="0" step="0.01" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-color focus:border-transparent">
                                    </div>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="text-center">
                                <button type="submit" class="btn-primary w-full py-3 transform scale-105">
                                    Submit Chartering Inquiry
                                </button>
                            </div>
                        </form>
                </div>
            </div>
        </section>
    </div>

    <!-- CTA Section -->
    <section class="section bg-primary-color text-white">
        <div class="container mx-auto px-4 text-center">
            <div class="fade-in">
                <h2 class="text-4xl font-bold mb-6">Join Our Satisfied Clients</h2>
                <p class="text-xl mb-8 opacity-90 max-w-2xl mx-auto">
                    Experience the same level of excellence that our clients rave about
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('contact') }}" class="btn-primary bg-gray-800 text-lg px-8 py-4 transform scale-105 ">
                        Get Started Today
                    </a>
                    <a href="{{ route('services') }}" class="border-2 border-white text-white px-8 py-4 rounded-lg font-semibold hover:bg-white hover:text-gray-800 transition-colors">
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
        
        .flex.justify-center.mb-8 .bg-white {
            flex-direction: column;
        }
        
        .flex.justify-center.mb-8 .bg-white button {
            margin-right: 0;
            margin-bottom: 0.5rem;
        }
    }

    /* Form Animations */
    .form-container {
        animation: slideInUp 0.6s ease forwards;
        opacity: 0;
        transform: translateY(20px);
    }

    .form-section {
        transition: all 0.3s ease;
        animation: fadeInUp 0.8s ease forwards;
        opacity: 0;
        transform: translateY(20px);
    }

    .form-section:nth-child(1) { animation-delay: 0.1s; }
    .form-section:nth-child(2) { animation-delay: 0.2s; }
    .form-section:nth-child(3) { animation-delay: 0.3s; }
    .form-section:nth-child(4) { animation-delay: 0.4s; }

    /* Button Animations */
    .btn-primary {
        background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
        color: white;
        border: none;
        border-radius: 8px;
        font-weight: 600;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(48, 91, 115, 0.3);
    }

    .btn-primary:active {
        transform: translateY(0);
    }

    .btn-primary::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s;
    }

    .btn-primary:hover::before {
        left: 100%;
    }

    /* Form Field Animations */
    .form-field {
        transition: all 0.3s ease;
    }

    .form-field:hover {
        transform: translateY(-1px);
    }

    .form-field input:focus,
    .form-field select:focus,
    .form-field textarea:focus {
        transform: scale(1.02);
        box-shadow: 0 0 0 3px rgba(48, 91, 115, 0.1);
    }

    /* Toggle Button Animations */
    .toggle-button {
        position: relative;
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .toggle-button::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
        transform: translate(-50%, -50%);
        transition: all 0.3s ease;
    }

    .toggle-button:hover::before {
        width: 300px;
        height: 300px;
    }

    /* Success/Error Message Animations */
    .message-container {
        animation: slideInDown 0.5s ease forwards;
        opacity: 0;
        transform: translateY(-20px);
    }

    /* Loading Animation */
    .loading {
        position: relative;
        pointer-events: none;
    }

    .loading::after {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 20px;
        height: 20px;
        margin: -10px 0 0 -10px;
        border: 2px solid transparent;
        border-top: 2px solid white;
        border-radius: 50%;
        animation: spin 1s linear infinite;
    }

    @keyframes slideInDown {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    /* Pulse Animation for Active Form */
    .active-form {
        animation: pulse 2s infinite;
    }

    @keyframes pulse {
        0% { box-shadow: 0 0 0 0 rgba(48, 91, 115, 0.4); }
        70% { box-shadow: 0 0 0 10px rgba(48, 91, 115, 0); }
        100% { box-shadow: 0 0 0 0 rgba(48, 91, 115, 0); }
    }
    </style>

@endsection

