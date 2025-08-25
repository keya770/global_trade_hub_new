@extends('layouts.app')

@section('title', 'Contact Us - Global Trade Hub')
@section('description', 'Get in touch with Global Trade Hub. Contact our Dubai HQ or other offices worldwide for maritime services, vessel inquiries, and business opportunities.')

@section('content')
    <!-- Contact Us Hero Section with Particles -->
    <section class="relative py-20 bg-gradient-to-br from-primary-color to-primary-dark text-white overflow-hidden">
        <!-- Canvas for particles -->
        <canvas id="particles" class="absolute inset-0 z-0"></canvas>

        <!-- Content -->
        <div class="container mx-auto px-4 text-center relative z-10">
            <div class="fade-in">
                <h1 class="text-5xl md:text-6xl font-bold mb-6">Contact Us</h1>
                <p class="text-xl md:text-2xl opacity-90 max-w-3xl mx-auto">
                    Get in touch with our team of maritime experts
                </p>
            </div>
        </div>
    </section>

    <!-- Particles Script -->
    <script>
    const canvas = document.getElementById('particles');
    const ctx = canvas.getContext('2d');
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;

    let particlesArray = [];
    const colors = ['rgba(255,255,255,0.3)', 'rgba(255,255,255,0.5)'];

    function initParticles() {
        particlesArray = [];
        for (let i = 0; i < 80; i++) {
            particlesArray.push({
                x: Math.random() * canvas.width,
                y: Math.random() * canvas.height,
                radius: Math.random() * 3,
                color: colors[Math.floor(Math.random() * colors.length)],
                speedX: (Math.random() - 0.5) * 0.8,
                speedY: (Math.random() - 0.5) * 0.8
            });
        }
    }

    function animateParticles() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        particlesArray.forEach(p => {
            ctx.beginPath();
            ctx.arc(p.x, p.y, p.radius, 0, Math.PI * 2);
            ctx.fillStyle = p.color;
            ctx.fill();
            p.x += p.speedX;
            p.y += p.speedY;
            if (p.x < 0 || p.x > canvas.width) p.speedX *= -1;
            if (p.y < 0 || p.y > canvas.height) p.speedY *= -1;
        });
        requestAnimationFrame(animateParticles);
    }

    initParticles();
    animateParticles();

    window.addEventListener('resize', () => {
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;
        initParticles();
    });
    </script>


    <!-- Office Locations Section -->
    <section class="section bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="section-title">Our Office Locations</h2>
                <p class="section-subtitle">
                    Global presence with local expertise across major maritime hubs
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Dubai HQ -->
                <div class="card fade-in text-center">
                    <div class="w-16 h-16 bg-primary-color rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-4">Dubai HQ</h3>
                    <p class="text-gray-600 mb-4">
                        Global Trade Hub<br>
                        Sheikh Zayed Road<br>
                        Dubai, UAE
                    </p>
                    <div class="space-y-2">
                        <p class="text-sm text-gray-600">Tel: +971 4 123 4567</p>
                        <p class="text-sm text-gray-600">Email: dubai@globaltradehub.com</p>
                    </div>
                </div>

                <!-- Singapore Office -->
                <div class="card fade-in text-center">
                    <div class="w-16 h-16 bg-primary-color rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-4">Singapore</h3>
                    <p class="text-gray-600 mb-4">
                        Global Trade Hub Asia<br>
                        Marina Bay Financial Centre<br>
                        Singapore
                    </p>
                    <div class="space-y-2">
                        <p class="text-sm text-gray-600">Tel: +65 6789 0123</p>
                        <p class="text-sm text-gray-600">Email: singapore@globaltradehub.com</p>
                    </div>
                </div>

                <!-- London Office -->
                <div class="card fade-in text-center">
                    <div class="w-16 h-16 bg-primary-color rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-4">London</h3>
                    <p class="text-gray-600 mb-4">
                        Global Trade Hub Europe<br>
                        Canary Wharf<br>
                        London, UK
                    </p>
                    <div class="space-y-2">
                        <p class="text-sm text-gray-600">Tel: +44 20 7123 4567</p>
                        <p class="text-sm text-gray-600">Email: london@globaltradehub.com</p>
                    </div>
                </div>

                <!-- Hong Kong Office -->
                <div class="card fade-in text-center">
                    <div class="w-16 h-16 bg-primary-color rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-4">Hong Kong</h3>
                    <p class="text-gray-600 mb-4">
                        Global Trade Hub HK<br>
                        Central District<br>
                        Hong Kong
                    </p>
                    <div class="space-y-2">
                        <p class="text-sm text-gray-600">Tel: +852 2345 6789</p>
                        <p class="text-sm text-gray-600">Email: hongkong@globaltradehub.com</p>
                    </div>
                </div>

                <!-- New York Office -->
                <div class="card fade-in text-center">
                    <div class="w-16 h-16 bg-primary-color rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-4">New York</h3>
                    <p class="text-gray-600 mb-4">
                        Global Trade Hub Americas<br>
                        Wall Street<br>
                        New York, USA
                    </p>
                    <div class="space-y-2">
                        <p class="text-sm text-gray-600">Tel: +1 212 345 6789</p>
                        <p class="text-sm text-gray-600">Email: newyork@globaltradehub.com</p>
                    </div>
                </div>

                <!-- Shanghai Office -->
                <div class="card fade-in text-center">
                    <div class="w-16 h-16 bg-primary-color rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-4">Shanghai</h3>
                    <p class="text-gray-600 mb-4">
                        Global Trade Hub China<br>
                        Lujiazui Financial District<br>
                        Shanghai, China
                    </p>
                    <div class="space-y-2">
                        <p class="text-sm text-gray-600">Tel: +86 21 3456 7890</p>
                        <p class="text-sm text-gray-600">Email: shanghai@globaltradehub.com</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Interactive Map Section -->
    <section class="section bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="section-title">Find Us on the Map</h2>
                <p class="section-subtitle">
                    Visit our offices worldwide or get in touch remotely
                </p>
            </div>
            
            <div class="card">
                <div class="bg-gray-200 h-96 rounded-lg flex items-center justify-center">
                    <div class="text-center">
                        <svg class="w-24 h-24 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path>
                        </svg>
                        <p class="text-gray-600">Interactive Google Map</p>
                        <p class="text-sm text-gray-500">Map showing all our office locations worldwide</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Form Section -->
    <section class="section bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="section-title">Send Us a Message</h2>
                    <p class="section-subtitle">
                        Get in touch with our team for any inquiries about our services
                    </p>
                </div>
                
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                    <!-- Contact Form -->
                    <div class="card">
                        <h3 class="text-2xl font-bold mb-6">Contact Form</h3>
                        
                        <form class="space-y-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">First Name *</label>
                                    <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-color focus:border-transparent" required>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Last Name *</label>
                                    <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-color focus:border-transparent" required>
                                </div>
                            </div>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Email *</label>
                                    <input type="email" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-color focus:border-transparent" required>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Phone</label>
                                    <input type="tel" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-color focus:border-transparent">
                                </div>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Company</label>
                                <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-color focus:border-transparent">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Inquiry Type *</label>
                                <select class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-color focus:border-transparent" required>
                                    <option value="">Select inquiry type</option>
                                    <option value="chartering">Chartering</option>
                                    <option value="sale-purchase">Sale & Purchase</option>
                                    <option value="valuation">Valuation</option>
                                    <option value="services">Marine Services</option>
                                    <option value="general">General Inquiry</option>
                                </select>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Subject *</label>
                                <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-color focus:border-transparent" required>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Message *</label>
                                <textarea rows="5" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-color focus:border-transparent" placeholder="Please provide details about your inquiry..." required></textarea>
                            </div>
                            
                            <div>
                                <button type="submit" class="btn-primary w-full py-3">Send Message</button>
                            </div>
                        </form>
                    </div>

                    <!-- Direct Contact Information -->
                    <div class="space-y-8">
                        <div class="card">
                            <h3 class="text-2xl font-bold mb-6">Direct Contact</h3>
                            
                            <div class="space-y-6">
                                <div class="flex items-start">
                                    <div class="w-12 h-12 bg-primary-color rounded-full flex items-center justify-center mr-4 mt-1">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold mb-2">Phone</h4>
                                        <p class="text-gray-600">+971 4 123 4567</p>
                                        <p class="text-sm text-gray-500">Available 24/7</p>
                                    </div>
                                </div>

                                <div class="flex items-start">
                                    <div class="w-12 h-12 bg-primary-color rounded-full flex items-center justify-center mr-4 mt-1">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold mb-2">Email</h4>
                                        <p class="text-gray-600">info@globaltradehub.com</p>
                                        <p class="text-sm text-gray-500">Response within 24 hours</p>
                                    </div>
                                </div>

                                <div class="flex items-start">
                                    <div class="w-12 h-12 bg-primary-color rounded-full flex items-center justify-center mr-4 mt-1">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold mb-2">WhatsApp</h4>
                                        <p class="text-gray-600">+971 50 123 4567</p>
                                        <p class="text-sm text-gray-500">Quick responses</p>
                                    </div>
                                </div>

                                <div class="flex items-start">
                                    <div class="w-12 h-12 bg-primary-color rounded-full flex items-center justify-center mr-4 mt-1">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold mb-2">Skype</h4>
                                        <p class="text-gray-600">global.trade.hub</p>
                                        <p class="text-sm text-gray-500">Video calls available</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <h3 class="text-2xl font-bold mb-6">Business Hours</h3>
                            
                            <div class="space-y-3">
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Monday - Friday</span>
                                    <span class="font-semibold">8:00 AM - 6:00 PM</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Saturday</span>
                                    <span class="font-semibold">9:00 AM - 2:00 PM</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Sunday</span>
                                    <span class="font-semibold">Closed</span>
                                </div>
                                <div class="pt-3 border-t border-gray-200">
                                    <p class="text-sm text-gray-500">Emergency support available 24/7</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="section bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="section-title">Frequently Asked Questions</h2>
                <p class="section-subtitle">
                    Quick answers to common questions about our services
                </p>
            </div>
            
            <div class="max-w-3xl mx-auto space-y-6">
                <div class="card">
                    <h3 class="text-lg font-bold mb-3">What services does Global Trade Hub offer?</h3>
                    <p class="text-gray-600">
                        We provide comprehensive maritime services including ship chartering, sale & purchase, 
                        valuation, inspection, technical services, and financial support.
                    </p>
                </div>

                <div class="card">
                    <h3 class="text-lg font-bold mb-3">How quickly do you respond to inquiries?</h3>
                    <p class="text-gray-600">
                        We typically respond to all inquiries within 24 hours. For urgent matters, 
                        our 24/7 emergency contact is always available.
                    </p>
                </div>

                <div class="card">
                    <h3 class="text-lg font-bold mb-3">Do you operate globally?</h3>
                    <p class="text-gray-600">
                        Yes, we have offices in Dubai, Singapore, London, Hong Kong, New York, and Shanghai, 
                        with a global network of partners and clients.
                    </p>
                </div>

                <div class="card">
                    <h3 class="text-lg font-bold mb-3">Can you help with vessel financing?</h3>
                    <p class="text-gray-600">
                        Absolutely. We provide comprehensive financing advisory services and can help 
                        structure deals with our network of maritime financiers.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="section bg-primary-color text-white">
        <div class="container mx-auto px-4 text-center">
            <div class="fade-in">
                <h2 class="text-4xl font-bold mb-6">Ready to Get Started?</h2>
                <p class="text-xl mb-8 opacity-90 max-w-2xl mx-auto">
                    Contact us today to discuss your maritime requirements and discover how we can 
                    help optimize your operations.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="tel:+97141234567" class="bg-white text-primary-color px-8 py-4 rounded-lg font-semibold hover:bg-gray-100 transition-colors">
                        Call Now
                    </a>
                    <a href="https://wa.me/971501234567" class="border-2 border-white text-white px-8 py-4 rounded-lg font-semibold hover:bg-white hover:text-primary-color transition-colors">
                        WhatsApp
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection

