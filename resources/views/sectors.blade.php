@extends('layouts.app')

@section('title', 'Sectors We Serve - Global Trade Hub')
@section('description', 'Explore the maritime sectors we serve including Dry Bulk Carriers, Tankers, General Cargo, Container Ships, and Offshore Service Vessels.')

@section('content')
    <!-- Sectors We Serve Hero Section with Particles -->
    <section class="relative py-20 bg-gradient-to-br from-primary-color to-primary-dark text-white overflow-hidden">
        <!-- Canvas for particles -->
        <canvas id="particles" class="absolute inset-0 z-0"></canvas>

        <!-- Content -->
        <div class="container mx-auto px-4 text-center relative z-10">
            <div class="fade-in">
                <h1 class="text-5xl md:text-6xl font-bold mb-6">Sectors We Serve</h1>
                <p class="text-xl md:text-2xl opacity-90 max-w-3xl mx-auto">
                    Comprehensive maritime services across all major shipping sectors
                </p>
            </div>
        </div>
    </section>

    <style>
    /* Fade-up animation */
    .fade-up {
      opacity: 0;
      transform: translateY(50px);
      transition: opacity 0.7s ease-out, transform 0.7s ease-out;
    }

    .fade-up.show {
      opacity: 1;
      transform: translateY(0);
    }

    /* Optional: animate features inside fade-up */
    .feature {
      opacity: 0;
      transform: translateY(20px);
      transition: opacity 0.5s ease-out, transform 0.5s ease-out;
    }

    .fade-up.show .feature {
      opacity: 1;
      transform: translateY(0);
    }

    /* Gradient animation for headings */
    @keyframes gradient-slide {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    .animate-gradient {
      background-size: 200% 200%;
      animation: gradient-slide 4s ease infinite;
    }
  </style>

  <!-- Expertise Grid Section -->
  <section class="section bg-white py-20">
    <div class="container mx-auto px-4">
      <!-- Heading -->
      <div class="text-center mb-16">
        <h2 class="text-4xl font-extrabold mb-6 
                   bg-gradient-to-r from-[#499974] via-[#6d83d5] to-[#33978d] 
                   bg-clip-text text-transparent">Our Expertise Across Maritime Sectors</h2>
        <p class="section-subtitle text-gray-600 text-lg max-w-2xl mx-auto">
          From dry bulk to specialized vessels, we provide expert services across all major shipping sectors
        </p>
      </div>

      <!-- Grid -->
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
        <!-- Dry Bulk Card -->
        <div class="card group fade-up">
          <img src="https://maritime-executive.com/media/images/article/Photos/Vessels_Large/Emerald-Putuo.0a611b.jpg" alt="Dry Bulk Carriers" class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-500">
          <div class="p-6 text-center">
            <h3 class="text-2xl font-bold mb-4">Dry Bulk Carriers</h3>
            <p class="text-gray-600 mb-6">
              Specialized vessels for transporting dry cargo including grains, coal, iron ore, and other bulk commodities.
            </p>
            <ul class="text-left space-y-2 text-sm text-gray-600">
              <li>• Handysize, Supramax, Panamax</li>
              <li>• Capesize, Newcastlemax</li>
              <li>• Chartering & S&P Services</li>
              <li>• Market Analysis & Valuation</li>
            </ul>
          </div>
        </div>

        <!-- General Cargo Card -->
        <div class="card group fade-up">
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTS-70-lS07S-59i5c9nxglCEuuMrj6xLcARA&s" alt="General Cargo" class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-500">
          <div class="p-6 text-center">
            <h3 class="text-2xl font-bold mb-4">General Cargo</h3>
            <p class="text-gray-600 mb-6">
              Versatile vessels designed to carry various types of cargo including project cargo and heavy lifts.
            </p>
            <ul class="text-left space-y-2 text-sm text-gray-600">
              <li>• Multi-purpose Vessels</li>
              <li>• Heavy Lift Carriers</li>
              <li>• Project Cargo Specialists</li>
              <li>• Breakbulk Operations</li>
            </ul>
          </div>
        </div>

        <!-- Container Ships Card -->
        <div class="card group fade-up">
          <img src="https://mosacoshipping.com/wp-content/uploads/2024/09/cosco-shipping-universe-open-water.jpg" alt="Container Ships" class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-500">
          <div class="p-6 text-center">
            <h3 class="text-2xl font-bold mb-4">Container Ships</h3>
            <p class="text-gray-600 mb-6">
              Modern container vessels for efficient transportation of containerized cargo across global trade routes.
            </p>
            <ul class="text-left space-y-2 text-sm text-gray-600">
              <li>• Platform Supply Vessels</li>
              <li>• Anchor Handling Tugs</li>
              <li>• Crew Transfer Vessels</li>
              <li>• Offshore Support</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Detailed Sector Section -->
  <section class="section bg-gradient-to-b from-gray-50 via-white to-gray-100 py-16">
    <div class="container mx-auto px-6">
      <!-- Section Title -->
      <div class="text-center mb-16">
        <h2 class="text-4xl md:text-5xl font-extrabold mb-4 
                   bg-gradient-to-r from-green-600 via-blue-500 to-teal-500 
                   bg-clip-text text-transparent animate-gradient">
          Detailed Sector Analysis
        </h2>
        <p class="section-subtitle text-gray-600 text-lg">
          In-depth insights into each sector's market dynamics and our specialized services
        </p>
      </div>

      <!-- Dry Bulk Carriers -->
      <div class="fade-up grid grid-cols-1 lg:grid-cols-2 gap-12 items-center mb-24">
        <div>
          <h3 class="text-3xl font-bold mb-6 text-gray-800">Dry Bulk Carriers</h3>
          <p class="text-gray-600 mb-6 leading-relaxed">
            Dry bulk carriers form the backbone of global commodity trade, transporting essential raw materials 
            that power the world's economies. Our expertise spans all vessel sizes and market segments.
          </p>
          <div class="space-y-4">
            <div class="feature flex items-start group hover:translate-x-2 transition-transform duration-300">
              <div class="w-8 h-8 bg-gradient-to-br from-gray-300 via-[#4d7dd9] to-gray-500 rounded-full flex items-center justify-center mr-3 mt-1 shadow-md">
                <svg class="w-4 h-4 text-white animate-bounce" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 
                        01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 
                        011.414 0z" clip-rule="evenodd"></path>
                </svg>
              </div>
              <div>
                <h4 class="font-semibold mb-1">Vessel Sizes</h4>
                <p class="text-sm text-gray-600">Handysize (10,000-35,000 DWT) to Capesize (180,000+ DWT)</p>
              </div>
            </div>
            <div class="feature flex items-start group hover:translate-x-2 transition-transform duration-300">
              <div class="w-8 h-8 bg-gradient-to-br from-gray-300 via-[#4d7dd9] to-gray-500 rounded-full flex items-center justify-center mr-4 mt-1 shadow-md">
                <svg class="w-4 h-4 text-white animate-bounce" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 
                        01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 
                        011.414 0z" clip-rule="evenodd"></path>
                </svg>
              </div>
              <div>
                <h4 class="font-semibold mb-1">Cargo Types</h4>
                <p class="text-sm text-gray-600">Iron ore, coal, grain, bauxite, phosphate, and more</p>
              </div>
            </div>
            <div class="feature flex items-start group hover:translate-x-2 transition-transform duration-300">
              <div class="w-8 h-8 bg-gradient-to-br from-gray-300 via-[#4d7dd9] to-gray-500 rounded-full flex items-center justify-center mr-4 mt-1 shadow-md">
                <svg class="w-4 h-4 text-white animate-bounce" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 
                        01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 
                        011.414 0z" clip-rule="evenodd"></path>
                </svg>
              </div>
              <div>
                <h4 class="font-semibold mb-1">Our Services</h4>
                <p class="text-sm text-gray-600">Chartering, sale & purchase, valuation, market analysis</p>
              </div>
            </div>
          </div>
        </div>
        <div class="bg-gradient-to-tr from-gray-200 to-gray-300 h-80 rounded-xl shadow-lg flex items-center justify-center hover:scale-105 transform transition duration-500">
          <img src="https://www.lloydslist.com/-/media/lloyds-list/images/stock-images/dry-bulk-ships/bulk-carrier-at-port-unloading.jpg?rev=4a5f5ef31be64235953e344e5fdb6169" alt="Dry Bulk Carrier" class="rounded-lg w-full h-full object-cover" />
        </div>
      </div>

    </div>
  </section>

  <!-- JS for scroll animation -->
  <script>
    document.addEventListener("DOMContentLoaded", () => {
      const faders = document.querySelectorAll(".fade-up");

      const appearOptions = {
        threshold: 0.2,
        rootMargin: "0px 0px -50px 0px"
      };

      const appearOnScroll = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
          if (!entry.isIntersecting) return;
          entry.target.classList.add("show");
          observer.unobserve(entry.target);
        });
      }, appearOptions);

      faders.forEach(fader => {
        appearOnScroll.observe(fader);
      });
    });
  </script>

    <!-- Market Statistics -->
    <section class="section bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-extrabold mb-6 
                        bg-gradient-to-r from-[#499974] via-[#6d83d5] to-[#33978d] 
                        bg-clip-text text-transparent">Sector Market Statistics</h2>
                <p class="section-subtitle">
                    Key metrics and insights across major maritime sectors
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="card text-center fade-in">
                    <div class="text-4xl font-bold text-primary-color mb-2">2,500+</div>
                    <h3 class="text-lg font-semibold mb-2">Dry Bulk Vessels</h3>
                    <p class="text-gray-600">Handled in transactions</p>
                </div>
                
                <div class="card text-center fade-in">
                    <div class="text-4xl font-bold text-primary-color mb-2">1,800+</div>
                    <h3 class="text-lg font-semibold mb-2">Tanker Deals</h3>
                    <p class="text-gray-600">Completed successfully</p>
                </div>
                
                <div class="card text-center fade-in">
                    <div class="text-4xl font-bold text-primary-color mb-2">950+</div>
                    <h3 class="text-lg font-semibold mb-2">Container Ships</h3>
                    <p class="text-gray-600">Chartered annually</p>
                </div>
                
                <div class="card text-center fade-in">
                    <div class="text-4xl font-bold text-primary-color mb-2">500+</div>
                    <h3 class="text-lg font-semibold mb-2">Specialized Vessels</h3>
                    <p class="text-gray-600">Expert consultations</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="section bg-primary-color text-white">
        <div class="container mx-auto px-4 text-center">
            <div class="fade-in">
                <h2 class="text-4xl font-bold mb-6">Ready to Explore Our Sectors?</h2>
                <p class="text-xl mb-8 opacity-90 max-w-2xl mx-auto">
                    Discover how our sector expertise can benefit your maritime operations 
                    and help you navigate complex market dynamics.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('services') }}" class="btn-primary bg-gray-800 text-lg px-8 py-4 transform scale-105 ">
                        Our Services
                    </a>
                    <a href="{{ route('contact') }}" class="border-2 border-white text-white px-8 py-4 rounded-lg font-semibold hover:bg-white hover:text-gray-800 transition-colors">
                        Get in Touch
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection

