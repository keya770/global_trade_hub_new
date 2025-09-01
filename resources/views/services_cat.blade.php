@extends('layouts.app')

@section('title', 'Our Services - Global Trade Hub')
@section('description', 'Explore our maritime services including Ship Sale & Purchase, Chartering, Technical & Marine Services, Valuation, and Financial & Legal Support.')

@section('content')
    <!-- Services Hero Section -->
    <section class="relative py-20 bg-gradient-to-br from-primary-color to-primary-dark text-white overflow-hidden">
        <canvas id="particles" class="absolute inset-0 z-0"></canvas>

        <div class="container mx-auto px-4 text-center relative z-10">
            <div class="fade-in">
                <h1 class="text-5xl md:text-6xl font-bold mb-6">Our Services</h1>
                <p class="text-xl md:text-2xl opacity-90 max-w-3xl mx-auto">
                    Explore our comprehensive maritime solutions and sub-services
                </p>
            </div>
        </div>
    </section>

    <!-- Services Categories -->
    <section class="section bg-gray-50 py-16">
        <div class="container mx-auto px-4">
            {{-- Service Category Loop --}}
            @php
                $services = [
                    [
                        'title' => 'Ship Sale & Purchase (S&P)',
                        'description' => 'Buying, selling, or trading vessels efficiently with expert market guidance.',
                        'sub' => [
                            ['title' => 'Newbuild Brokerage', 'desc' => 'Facilitating contracts for newly built ships from shipyards.', 'img' => 'images/newbuild.jpg'],
                            ['title' => 'Second-hand Vessels', 'desc' => 'Buying or selling pre-owned ships with market-based valuation.', 'img' => 'images/secondhand.jpg'],
                            ['title' => 'Scrap Vessel Sales', 'desc' => 'Managing the sale of end-of-life vessels for recycling or scrapping.', 'img' => 'images/scrap.jpg'],
                        ]
                    ],
                    [
                        'title' => 'Chartering',
                        'description' => 'Comprehensive chartering services tailored to different cargo and voyage requirements.',
                        'sub' => [
                            ['title' => 'Voyage Chartering', 'desc' => 'Chartering ships for a specific voyage with agreed cargo and freight terms.', 'img' => 'images/voyage.jpg'],
                            ['title' => 'Time Chartering', 'desc' => 'Leasing a vessel for a fixed period, including crew and operational management.', 'img' => 'images/time.jpg'],
                            ['title' => 'Bareboat Chartering', 'desc' => 'Chartering a ship without crew or provisions, fully managed by the charterer.', 'img' => 'images/bareboat.jpg'],
                            ['title' => 'Tanker Chartering', 'desc' => 'Specialized for liquid cargo: CPP, DPP, Gas Carriers (LPG/LNG).', 'img' => 'images/tanker.jpg'],
                        ]
                    ],
                    [
                        'title' => 'Technical & Marine Services',
                        'description' => 'Essential marine support services for vessel maintenance, emergencies, and operations.',
                        'sub' => [
                            ['title' => 'Underwater Ship Repairs', 'desc' => 'Hull, propeller, and rudder repairs conducted underwater.', 'img' => 'images/underwater.jpg'],
                            ['title' => 'Salvage Operations', 'desc' => 'Recovery of stranded, sunken, or damaged vessels.', 'img' => 'images/salvage.jpg'],
                            ['title' => 'Towing Services', 'desc' => 'Assistance in moving ships safely across harbors or open seas.', 'img' => 'images/towing.jpg'],
                            ['title' => 'Maintenance & Repairs', 'desc' => 'Routine technical maintenance and emergency repairs onboard.', 'img' => 'images/maintenance.jpg'],
                        ]
                    ],
                    [
                        'title' => 'Ship Valuation & Inspection',
                        'description' => 'Accurate evaluation and inspection to ensure vessel quality, compliance, and market value.',
                        'sub' => [
                            ['title' => 'Market Valuation Reports', 'desc' => 'Professional assessments of vessel market value.', 'img' => 'images/valuation.jpg'],
                            ['title' => 'Vessel Condition Inspections', 'desc' => 'Detailed checks on ship condition, including machinery and structure.', 'img' => 'images/inspection.jpg'],
                            ['title' => 'Survey Coordination', 'desc' => 'Arranging third-party surveys for classification, insurance, or sale purposes.', 'img' => 'images/survey.jpg'],
                        ]
                    ],
                    [
                        'title' => 'Financial & Legal Support',
                        'description' => 'Providing advisory and support for financing, legal compliance, and maritime disputes.',
                        'sub' => [
                            ['title' => 'Ship Financing Advisory', 'desc' => 'Guidance on ship loans, mortgages, and investment strategies.', 'img' => 'images/financing.jpg'],
                            ['title' => 'Ship Arrest & Release Support', 'desc' => 'Legal assistance for ship detentions and resolving maritime claims.', 'img' => 'images/legal.jpg'],
                            ['title' => 'Insurance & Claims Support', 'desc' => 'Assistance with marine insurance policies and claim settlements.', 'img' => 'images/insurance.jpg'],
                        ]
                    ],
                ];
            @endphp

            @foreach($services as $service)
                <div class="category mb-16">
                    <h2 class="text-4xl font-bold text-primary-color mb-4">{{ $service['title'] }}</h2>
                    <p class="text-gray-700 mb-8">{{ $service['description'] }}</p>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        @foreach($service['sub'] as $sub)
                            <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-2xl transition-shadow duration-300">
                                <img src="{{ asset($sub['img']) }}" alt="{{ $sub['title'] }}" class="w-full h-48 object-cover">
                                <div class="p-6">
                                    <h3 class="text-xl font-semibold text-primary-color mb-2">{{ $sub['title'] }}</h3>
                                    <p class="text-gray-600">{{ $sub['desc'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- CTA Section -->
    <section class="section bg-primary-color text-white py-16">
        <div class="container mx-auto px-4 text-center fade-in">
            <h2 class="text-4xl font-bold mb-6">Want to Learn More?</h2>
            <p class="text-xl mb-8 opacity-90 max-w-2xl mx-auto">
                Contact our team today to discuss how we can support your maritime needs.
            </p>
            <a href="{{ route('contact') }}" class="border-2 border-white text-white px-8 py-4 rounded-lg font-semibold hover:bg-white hover:text-gray-800 transition-colors">
                Contact Us
            </a>
        </div>
    </section>
@endsection
