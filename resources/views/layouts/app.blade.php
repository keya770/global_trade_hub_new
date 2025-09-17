<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5, user-scalable=yes">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'SMA Ship Brokers - Leading Maritime Solutions')</title>
    <meta name="description" content="@yield('description', 'SMA Ship Brokers is a leading maritime services company specializing in ship chartering, sale & purchase, valuation, and marine services.')">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    <!-- Flickity CSS -->
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">

    <!-- Flickity JS -->
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <!-- Alpine.js -->
    <script src="//unpkg.com/alpinejs" defer></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>



    <!-- Custom Styles -->
    <style>
       :root {
    --primary-dark: #1F3447;   
    --primary-color: #305B73;  
    --primary-light: #496409ff;  
    --accent-color: #F4B400;   
    --text-dark: #1F3447;
    --text-light: #6b7280;
    --bg-light: #f8fafc;
    --bg-white: #ffffff;
}

/* Base */
body {
    font-family: 'Inter', sans-serif;
    line-height: 1.6;
    color: var(--text-dark);
    background: var(--bg-light);
    margin: 0;
    padding: 0;
}

/* Smooth Scrolling */
html {
    scroll-behavior: smooth;
}

/* Animated Gradient Background */
#animated-bg {
    background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary-color) 50%, var(--primary-light) 100%);
    background-size: 400% 400%;
    animation: gradientShift 15s ease infinite;
}

@keyframes gradientShift {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}

/* Waves Animation */
.waves-container {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 200px;
    overflow: hidden;
}

.wave {
    position: absolute;
    bottom: 0;
    width: 200%;
    height: 100px;
    background: linear-gradient(90deg, transparent, rgba(48, 91, 115, 0.3), transparent);
    border-radius: 100px;
    animation: wave 8s linear infinite;
}

.wave1 { animation-delay: 0s; opacity: 0.4; }
.wave2 { animation-delay: -2s; opacity: 0.3; height: 80px; }
.wave3 { animation-delay: -4s; opacity: 0.2; height: 60px; }

@keyframes wave {
    0% { transform: translateX(-100%); }
    100% { transform: translateX(0%); }
}

/* Header */
.header {
    background: linear-gradient(to bottom right, #b4dde4ff, #dcddc0ff);
    /* border-radius: 0.5rem; matches Tailwind's rounded-lg */
    backdrop-filter: blur(10px);
    border-bottom: 1px solid rgba(48, 91, 115, 0.1);
    transition: all 0.3s ease;
}

/* Logo and Company Name Styling */
.logo-container {
    position: relative;
    overflow: hidden;
    border-radius: 12px;
    background: linear-gradient(135deg, rgba(48, 91, 115, 0.1), rgba(48, 91, 115, 0.05));
    padding: 8px;
    transition: all 0.3s ease;
}

.logo-container:hover {
    background: linear-gradient(135deg, rgba(48, 91, 115, 0.2), rgba(48, 91, 115, 0.1));
    box-shadow: 0 4px 15px rgba(48, 91, 115, 0.2);
}

.company-name-container {
    position: relative;
}

.company-name {
    background: linear-gradient(135deg, #305B73, #1F3447, #499974);
    background-size: 200% 200%;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    animation: gradientShift 3s ease infinite;
    transition: all 0.3s ease;
}

.company-name:hover {
    background: linear-gradient(135deg, #499974, #6d83d5, #305B73);
    background-size: 200% 200%;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    transform: scale(1.02);
}

.company-tagline {
    background: linear-gradient(135deg, #6b7280, #9ca3af);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    transition: all 0.3s ease;
}

.company-name-container:hover .company-tagline {
    background: linear-gradient(135deg, #499974, #6d83d5);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.header.scrolled {
    background: linear-gradient(to bottom right, #b4dde4ff, #dcddc0ff);
    box-shadow: 0 2px 20px rgba(31, 52, 71, 0.1);
}

.nav-link {
    color: var(--text-dark);
    font-weight: 500;
    transition: all 0.3s ease;
    position: relative;
    padding: 8px 16px;
    border-radius: 8px;
}

.nav-link:hover {
    color: var(--primary-color);
    background: rgba(48, 91, 115, 0.1);
}

.nav-link::after {
    content: '';
    position: absolute;
    bottom: -5px;
    left: 0;
    width: 0;
    height: 2px;
    background: var(--primary-color);
    transition: width 0.3s ease;
}

.nav-link:hover::after {
    width: 100%;
}

/* Active Navigation States */
.nav-link-active {
    color: var(--primary-color) !important;
    background: linear-gradient(135deg, rgba(48, 91, 115, 0.15), rgba(73, 153, 116, 0.1)) !important;
    font-weight: 600 !important;
    border-radius: 8px !important;
    position: relative;
}

.nav-link-active::before {
    content: '';
    position: absolute;
    bottom: -2px;
    left: 50%;
    transform: translateX(-50%);
    width: 80%;
    height: 3px;
    background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
    border-radius: 2px;
}

/* Mobile Navigation Styles */
.mobile-nav-link {
    color: var(--text-dark);
    font-weight: 500;
    padding: 12px 16px;
    border-radius: 8px;
    transition: all 0.3s ease;
    position: relative;
    margin: 2px 0;
}

.mobile-nav-link:hover {
    color: var(--primary-color);
    background: rgba(48, 91, 115, 0.1);
    transform: translateX(4px);
}

.mobile-nav-link-active {
    color: var(--primary-color) !important;
    background: linear-gradient(135deg, rgba(48, 91, 115, 0.15), rgba(73, 153, 116, 0.1)) !important;
    font-weight: 600 !important;
    border-left: 4px solid var(--primary-color) !important;
    transform: translateX(4px) !important;
}

/* Buttons */
.btn-primary {
    background: var(--primary-color);
    color: white;
    padding: 12px 24px;
    border-radius: 8px;
    font-weight: 600;
    transition: all 0.3s ease;
    border: none;
    cursor: pointer;
}

.btn-primary:hover {
    background: var(--primary-light);
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(48, 91, 115, 0.3);
}

.btn-secondary {
    background: transparent;
    color: var(--primary-color);
    padding: 12px 24px;
    border-radius: 8px;
    font-weight: 600;
    border: 2px solid var(--primary-color);
    cursor: pointer;
    transition: all 0.3s ease;
}

.btn-secondary:hover {
    background: var(--primary-color);
    color: white;
    transform: translateY(-2px);
}

/* Sections */
.section {
    padding: 80px 0;
    position: relative;
}

.section-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: var(--text-dark);
    margin-bottom: 1rem;
    text-align: center;
}

.section-subtitle {
    font-size: 1.1rem;
    color: var(--text-light);
    text-align: center;
    margin-bottom: 3rem;
    max-width: 600px;
    margin-left: auto;
    margin-right: auto;
}

/* Cards */
.card {
    background: linear-gradient(to right, #e7f0ecff, #f1f2f7ff, #e6f1f0ff);
    border-radius: 12px;
    padding: 2rem;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
    border: 1px solid rgba(48, 91, 115, 0.1);
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 30px rgba(48, 91, 115, 0.2);
}

/* Footer */
.footer {
    background: var(--primary-dark);
    color: white;
    padding: 60px 20px 20px;
    position: relative;
    overflow: hidden;
}

/* Footer links */
.footer-link {
    color: #ffffff;
    transition: color 0.3s ease;
}

.footer-link:hover {
    color: var(--accent-color);
}

/* Waves in Footer */
.footer-wave {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 160px;
    overflow: hidden;
    line-height: 0;
    z-index: 1; /* Keep waves behind content but above background */
}

.waves {
    position: absolute;
    bottom: 0;
    width: 250%;
    height: 120%;
    fill: white;
}

.parallax use:nth-child(1) { animation: moveWaves 16s linear infinite; }
.parallax use:nth-child(2) { animation: moveWaves 10s linear infinite; }
.parallax use:nth-child(3) { animation: moveWaves 15s linear infinite; }
.parallax use:nth-child(4) { animation: moveWaves 11s linear infinite; }

@keyframes moveWaves {
    0% { transform: translateX(0); }
    100% { transform: translateX(-50%); }
}

/* Ensure container content is above waves */
.footer .container {
    position: relative;
    z-index: 10; /* Higher than waves */
}

/* Footer text styling */
.footer h3, .footer h4, .footer p, .footer ul li {
    color: white;
}

.footer-link {
    color: #d1d5db;
    transition: color 0.3s ease;
}

.footer-link:hover {
    color: var(--accent-color);
}

/* Footer responsive improvements */
@media (max-width: 768px) {
    .footer {
        padding: 40px 20px 20px;
    }
    
    .footer .grid {
        gap: 2rem;
    }
    
    .footer h3, .footer h4 {
        font-size: 1.1rem;
    }
    
    .footer p, .footer li {
        font-size: 0.9rem;
    }
    
    /* Enhanced footer responsiveness */
    .footer .container {
        padding: 0 1rem;
    }
    
    .footer .grid {
        grid-template-columns: 1fr;
        gap: 2.5rem;
    }
    
    .footer .col-span-1 {
        text-align: center;
    }
    
    .footer .flex.flex-wrap {
        justify-content: center;
    }
    
    /* Company info mobile */
    .footer h3 {
        font-size: 1.25rem;
        margin-bottom: 1rem;
    }
    
    .footer p {
        font-size: 0.95rem;
        line-height: 1.6;
        margin-bottom: 1.5rem;
    }
    
    /* Social media responsive */
    .social-icon {
        width: 40px;
        height: 40px;
    }
    
    .social-icon i {
        font-size: 16px;
    }
}

@media (max-width: 640px) {
    .footer {
        padding: 30px 15px 15px;
    }
    
    .footer h3, .footer h4 {
        font-size: 1rem;
    }
    
    .footer p, .footer li {
        font-size: 0.85rem;
    }
    
    .footer .grid {
        gap: 2rem;
    }
}

/* Social Media Icons */
.social-icon {
    position: relative;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 44px;
    height: 44px;
    background: rgba(255, 255, 255, 0.1);
    border: 2px solid rgba(255, 255, 255, 0.2);
    border-radius: 12px;
    color: white;
    text-decoration: none;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    backdrop-filter: blur(10px);
    overflow: hidden;
}

.social-icon::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0.05));
    opacity: 0;
    transition: opacity 0.3s ease;
}

.social-icon:hover::before {
    opacity: 1;
}

.social-icon i {
    font-size: 18px;
    z-index: 2;
    position: relative;
    transition: all 0.3s ease;
}

.social-icon:hover {
    transform: translateY(-3px) scale(1.05);
    border-color: rgba(255, 255, 255, 0.4);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
}

.social-icon:hover i {
    transform: scale(1.1);
}

/* Platform-specific hover colors */
.social-icon[title*="Facebook"]:hover {
    background: linear-gradient(135deg, #1877F2, #42A5F5);
    border-color: #1877F2;
}

.social-icon[title*="Twitter"]:hover {
    background: linear-gradient(135deg, #1DA1F2, #42A5F5);
    border-color: #1DA1F2;
}

.social-icon[title*="LinkedIn"]:hover {
    background: linear-gradient(135deg, #0077B5, #42A5F5);
    border-color: #0077B5;
}

.social-icon[title*="Instagram"]:hover {
    background: linear-gradient(135deg, #E4405F, #F56040);
    border-color: #E4405F;
}

.social-icon[title*="Youtube"]:hover {
    background: linear-gradient(135deg, #FF0000, #FF4444);
    border-color: #FF0000;
}

/* Social tooltip */
.social-tooltip {
    position: absolute;
    bottom: -35px;
    left: 50%;
    transform: translateX(-50%);
    background: rgba(0, 0, 0, 0.8);
    color: white;
    padding: 6px 12px;
    border-radius: 6px;
    font-size: 12px;
    font-weight: 500;
    white-space: nowrap;
    opacity: 0;
    visibility: hidden;
    transition: all 0.3s ease;
    z-index: 1000;
    backdrop-filter: blur(10px);
}

.social-tooltip::before {
    content: '';
    position: absolute;
    top: -4px;
    left: 50%;
    transform: translateX(-50%);
    border-left: 4px solid transparent;
    border-right: 4px solid transparent;
    border-bottom: 4px solid rgba(0, 0, 0, 0.8);
}

.social-icon:hover .social-tooltip {
    opacity: 1;
    visibility: visible;
    transform: translateX(-50%) translateY(-5px);
}

/* Footer social icons hover effect */
.footer .bg-\[#285566\]:hover {
    background-color: var(--accent-color) !important;
    transform: translateY(-2px);
}

/* Bottom footer styling */
.footer .text-gray-300 {
    color: #d1d5db !important;
}

.footer .text-gray-300:hover {
    color: white !important;
}

/* Bottom footer specific styling */
.footer .bg-primary-dark {
    background-color: var(--primary-dark) !important;
    position: relative;
    z-index: 20;
}

.footer .text-black {
    color: #000000 !important;
    font-weight: 500;
}

.footer .text-black:hover {
    color: #374151 !important;
}

/* WhatsApp Floating Button */
.whatsapp-float {
    position: fixed;
    bottom: 30px;
    right: 30px;
    background: #25d366;
    color: white;
    width: 60px;
    height: 60px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 28px;
    box-shadow: 0 4px 20px rgba(37, 211, 102, 0.3);
    z-index: 1000;
    cursor: pointer;
    transition: all 0.3s ease;
}

.whatsapp-float:hover {
    transform: scale(1.1);
    box-shadow: 0 6px 25px rgba(37, 211, 102, 0.4);
}

/* Animations */
.fade-in {
    opacity: 0;
    transform: translateY(30px);
    transition: all 0.6s ease;
}
.fade-in.visible {
    opacity: 1;
    transform: translateY(0);
}

.slide-in-left {
    opacity: 0;
    transform: translateX(-50px);
    transition: all 0.6s ease;
}
.slide-in-left.visible {
    opacity: 1;
    transform: translateX(0);
}

.slide-in-right {
    opacity: 0;
    transform: translateX(50px);
    transition: all 0.6s ease;
}
.slide-in-right.visible {
    opacity: 1;
    transform: translateX(0);
}

/* Responsive Design */
@media (max-width: 992px) {
    .section-title { font-size: 2rem; }
    .section { padding: 60px 0; }
    
    /* Header responsive */
    .header .container { padding: 0 1rem; }
    .header img { height: 60px; }
}

@media (max-width: 768px) {
    .section-title { font-size: 1.8rem; }
    .section { padding: 50px 0; }
    .whatsapp-float { width: 50px; height: 50px; font-size: 24px; bottom: 20px; right: 20px; }
    
    /* Header mobile */
    .header { padding: 0.5rem 0; }
    .header img { height: 50px; }
    .header nav { padding: 0.75rem 1rem; }
    
    /* Mobile menu improvements */
    #mobile-menu { 
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        border-radius: 0.5rem;
        margin-top: 1rem;
        padding: 1rem;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }
    
    #mobile-menu .nav-link {
        color: var(--text-dark);
        padding: 0.75rem 0;
        border-bottom: 1px solid rgba(0, 0, 0, 0.1);
    }
    
    #mobile-menu .nav-link:last-child {
        border-bottom: none;
    }
}

@media (max-width: 480px) {
    .section-title { font-size: 1.6rem; }
    .section { padding: 40px 0; }
    .footer { padding: 30px 10px; }
    
    /* Header extra small */
    .header img { height: 40px; }
    .header nav { padding: 0.5rem 0.75rem; }
    
    /* Container padding */
    .container { padding-left: 0.75rem; padding-right: 0.75rem; }
    
    /* Global mobile improvements */
    .section-title {
        font-size: 1.5rem !important;
        margin-bottom: 1rem;
    }
    
    .section-subtitle {
        font-size: 1rem !important;
        margin-bottom: 2rem;
    }
    
    /* Button responsive */
    .btn-primary, .btn-secondary {
        padding: 0.75rem 1.5rem;
        font-size: 0.9rem;
    }
    
    /* Card responsive */
    .card {
        padding: 1.5rem;
    }
    
    /* Grid responsive */
    .grid {
        gap: 1rem;
    }
    
    /* Text responsive */
    h1 { font-size: 1.75rem; }
    h2 { font-size: 1.5rem; }
    h3 { font-size: 1.25rem; }
    h4 { font-size: 1.1rem; }
    h5 { font-size: 1rem; }
    h6 { font-size: 0.9rem; }
    
    /* Additional mobile utilities */
    .hidden-mobile { display: none !important; }
    .visible-mobile { display: block !important; }
    
    /* Prevent horizontal scroll */
    body { overflow-x: hidden; }
    
    /* Touch-friendly buttons */
    button, .btn, a {
        min-height: 44px;
        min-width: 44px;
    }
    
    /* Form elements mobile-friendly */
    input, select, textarea {
        font-size: 16px; /* Prevents zoom on iOS */
    }
}

/* Additional responsive utilities */
@media (min-width: 481px) {
    .hidden-mobile { display: block !important; }
    .visible-mobile { display: none !important; }
}

    </style>
</head>
<body>
    

     <!-- Animated Background -->
    <div id="animated-bg" class="fixed inset-0 z-0">
        <!-- <div class="absolute inset-0 bg-gradient-to-br from-blue-900 via-indigo-900 to-gray-900"></div> -->
        <canvas id="particles-canvas" class="absolute inset-0 w-full h-full"></canvas>
        <div class="waves-container">
            <div class="wave wave1"></div>
            <div class="wave wave2"></div>
            <div class="wave wave3"></div>
        </div>
    </div>

    <!-- Header -->
    <header class="header fixed top-0 left-0 right-0 z-50 bg-white shadow-md">
        <nav class="container mx-auto px-4 py-4">
            <div class="flex items-center justify-between">
                <!-- Logo + Company Name -->
                <div class="flex items-center space-x-3">
                    <a href="{{ route('home') }}" class="flex items-center space-x-3 group">
                        <div class="logo-container">
                            <img src="/images/logo-main-without-background.png" alt="SMA Ship Brokers Logo" class="h-16 w-auto object-contain transition-all duration-300 group-hover:scale-105">
                        </div>
                        <div class="company-name-container">
                            <span class="company-name text-2xl font-extrabold">
                                SMA Ship Brokers
                            </span>
                            <span class="company-tagline text-sm font-medium opacity-80 block -mt-1">
                                Maritime Excellence
                            </span>
                        </div>
                    </a>
                </div>
    
                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center space-x-2">
                    <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'nav-link-active' : '' }}">Home</a>
                    <a href="{{ route('about') }}" class="nav-link {{ request()->routeIs('about') ? 'nav-link-active' : '' }}">About Us</a>
                    <a href="{{ route('services') }}" class="nav-link {{ request()->routeIs('services') ? 'nav-link-active' : '' }}">Services</a>
                    <a href="{{ route('vessels') }}" class="nav-link {{ request()->routeIs('vessels') ? 'nav-link-active' : '' }}">Vessel Inquiries</a>
                    <a href="{{ route('blog') }}" class="nav-link {{ request()->routeIs('blog') ? 'nav-link-active' : '' }}">Blog</a>
                    <a href="{{ route('sectors') }}" class="nav-link {{ request()->routeIs('sectors') ? 'nav-link-active' : '' }}">Sectors</a>
                    <a href="{{ route('careers') }}" class="nav-link {{ request()->routeIs('careers') ? 'nav-link-active' : '' }}">Careers</a>
                    <a href="{{ route('contact') }}" class="nav-link {{ request()->routeIs('contact') ? 'nav-link-active' : '' }}">Contact</a>
                </div>
    
                <!-- Mobile Menu Button -->
                <div class="md:hidden">
                    <button id="mobile-menu-btn" class="text-primary-color">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
    
            <!-- Mobile Navigation -->
            <div id="mobile-menu" class="md:hidden hidden mt-4 pb-4">
                <div class="flex flex-col space-y-2">
                    <a href="{{ route('home') }}" class="mobile-nav-link {{ request()->routeIs('home') ? 'mobile-nav-link-active' : '' }}">Home</a>
                    <a href="{{ route('about') }}" class="mobile-nav-link {{ request()->routeIs('about') ? 'mobile-nav-link-active' : '' }}">About Us</a>
                    <a href="{{ route('services') }}" class="mobile-nav-link {{ request()->routeIs('services') ? 'mobile-nav-link-active' : '' }}">Services</a>
                    <a href="{{ route('vessels') }}" class="mobile-nav-link {{ request()->routeIs('vessels') ? 'mobile-nav-link-active' : '' }}">Vessel Inquiries</a>
                    <a href="{{ route('blog') }}" class="mobile-nav-link {{ request()->routeIs('blog') ? 'mobile-nav-link-active' : '' }}">Blog</a>
                    <a href="{{ route('sectors') }}" class="mobile-nav-link {{ request()->routeIs('sectors') ? 'mobile-nav-link-active' : '' }}">Sectors</a>
                    <a href="{{ route('careers') }}" class="mobile-nav-link {{ request()->routeIs('careers') ? 'mobile-nav-link-active' : '' }}">Careers</a>
                    <a href="{{ route('contact') }}" class="mobile-nav-link {{ request()->routeIs('contact') ? 'mobile-nav-link-active' : '' }}">Contact</a>
                </div>
            </div>
        </nav>
    </header>
    

    <!-- Main Content -->
    <main class="pt-20">
        @yield('content')
    </main>


   

    <!-- Footer -->
    <footer class="footer relative overflow-hidden">
        <div class="footer-wave">
            <svg class="waves" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <defs>
                    <path id="gentle-wave" d="M0,60 C150,90 300,30 450,60 C600,90 750,30 900,60 C1050,90 1200,30 1350,60 L1350,120 L0,120 Z"></path>
                </defs>
                <g class="parallax">
                    <use xlink:href="#gentle-wave" x="0" y="0" fill="rgba(255, 255, 255, 0.46)"></use>
                    <use xlink:href="#gentle-wave" x="0" y="10" fill="rgba(255,255,255,0.5)"></use>
                    <use xlink:href="#gentle-wave" x="0" y="20" fill="rgba(255,255,255,0.3)"></use>
                    <use xlink:href="#gentle-wave" x="0" y="30" fill="#ffffffd2"></use>
                </g>
            </svg>
        </div>
    
        
        <div class="container mx-auto px-4 relative z-10">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 lg:gap-8 mb-8">
                <!-- Company Info -->
                <div class="col-span-1 md:col-span-1">
                    <h3 class="text-xl font-bold mb-4 text-white">SMA Ship Brokers</h3>
                    <p class="text-gray-300 mb-4 leading-relaxed">
                        Leading maritime solutions provider specializing in ship chartering,
                        sale & purchase, valuation, and marine services worldwide.
                    </p>
                    <div class="flex flex-wrap gap-3">
                    @php
                        $siteSettings = \App\Models\SiteSetting::first();
                        $socialLinks = [];
                        
                        if($siteSettings) {
                            if($siteSettings->facebook) $socialLinks[] = ['platform' => 'facebook', 'url' => $siteSettings->facebook, 'icon' => 'fab fa-facebook-f', 'color' => '#1877F2'];
                            if($siteSettings->twitter) $socialLinks[] = ['platform' => 'twitter', 'url' => $siteSettings->twitter, 'icon' => 'fab fa-twitter', 'color' => '#1DA1F2'];
                            if($siteSettings->linkedin) $socialLinks[] = ['platform' => 'linkedin', 'url' => $siteSettings->linkedin, 'icon' => 'fab fa-linkedin-in', 'color' => '#0077B5'];
                            if($siteSettings->instagram) $socialLinks[] = ['platform' => 'instagram', 'url' => $siteSettings->instagram, 'icon' => 'fab fa-instagram', 'color' => '#E4405F'];
                            if($siteSettings->youtube) $socialLinks[] = ['platform' => 'youtube', 'url' => $siteSettings->youtube, 'icon' => 'fab fa-youtube', 'color' => '#FF0000'];
                        }
                    @endphp
                    
                    @forelse($socialLinks as $social)
                        <a href="{{ $social['url'] }}" 
                           class="social-icon group" 
                           target="_blank" 
                           rel="noopener noreferrer"
                           title="Follow us on {{ ucfirst($social['platform']) }}">
                            <i class="{{ $social['icon'] }}"></i>
                            <span class="social-tooltip">{{ ucfirst($social['platform']) }}</span>
                        </a>
                    @empty
                        <!-- Default social links if no settings -->
                        <a href="#" class="social-icon group" target="_blank" title="Follow us on Facebook">
                            <i class="fab fa-facebook-f"></i>
                            <span class="social-tooltip">Facebook</span>
                        </a>
                        <a href="#" class="social-icon group" target="_blank" title="Follow us on LinkedIn">
                            <i class="fab fa-linkedin-in"></i>
                            <span class="social-tooltip">LinkedIn</span>
                        </a>
                        <a href="#" class="social-icon group" target="_blank" title="Follow us on Twitter">
                            <i class="fab fa-twitter"></i>
                            <span class="social-tooltip">Twitter</span>
                        </a>
                    @endforelse
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h4 class="text-lg font-semibold mb-4 text-white">Quick Links</h4>
                    <ul class="space-y-2">
                        <li><a href="{{ route('home') }}" class="footer-link">Home</a></li>
                        <li><a href="{{ route('about') }}" class="footer-link">About Us</a></li>
                        <li><a href="{{ route('services') }}" class="footer-link">Services</a></li>
                        <li><a href="{{ route('vessels') }}" class="footer-link">Vessel Listings</a></li>
                        <li><a href="{{ route('contact') }}" class="footer-link">Contact</a></li>
                    </ul>
                </div>

                <!-- Services -->
                <div>
                    <h4 class="text-lg font-semibold mb-4 text-white">Services</h4>
                    <ul class="space-y-2">
                        @php
                            $footerServices = \App\Models\Service::active()->ordered()->limit(4)->get();
                        @endphp
                        @forelse($footerServices as $service)
                            <li><a href="{{ route('services') }}#{{ Str::slug($service->name) }}" class="footer-link">{{ $service->name }}</a></li>
                        @empty
                            <li><a href="{{ route('services') }}#chartering" class="footer-link">Ship Chartering</a></li>
                            <li><a href="{{ route('services') }}#sale-purchase" class="footer-link">Sale & Purchase</a></li>
                            <li><a href="{{ route('services') }}#valuation" class="footer-link">Valuation</a></li>
                            <li><a href="{{ route('services') }}#marine-services" class="footer-link">Marine Services</a></li>
                        @endforelse
                    </ul>
                </div>

                <div>
                    <h4 class="text-lg font-semibold mb-4 text-white">Contact Info</h4>
                    <ul class="space-y-3">
                    @php
                        $siteSettings = \App\Models\SiteSetting::first();
                    @endphp
                    @if($siteSettings && $siteSettings->address)
                        <li class="flex items-center space-x-2 text-gray-300">
                            <i class="fas fa-map-marker-alt text-accent-color"></i>
                            <span>{{ $siteSettings->address }}</span>
                        </li>
                    @else
                        <li class="flex items-center space-x-2 text-gray-300">
                            <i class="fas fa-map-marker-alt text-accent-color"></i>
                            <span>Dubai Maritime City, UAE</span>
                        </li>
                    @endif
                    
                    @if($siteSettings && $siteSettings->phone)
                        <li class="flex items-center space-x-2 text-gray-300">
                            <i class="fas fa-phone text-accent-color"></i>
                            <span>{{ $siteSettings->phone }}</span>
                        </li>
                    @else
                        <li class="flex items-center space-x-2 text-gray-300">
                            <i class="fas fa-phone text-accent-color"></i>
                            <span>+971 4 123 4567</span>
                        </li>
                    @endif
                    
                    @if($siteSettings && $siteSettings->email)
                        <li class="flex items-center space-x-2 text-gray-300">
                            <i class="fas fa-envelope text-accent-color"></i>
                            <span>{{ $siteSettings->email }}</span>
                        </li>
                    @else
                        <li class="flex items-center space-x-2 text-gray-300">
                            <i class="fas fa-envelope text-accent-color"></i>
                            <span>info@globaltradehub.com</span>
                        </li>
                    @endif
                </ul>
                <a href="{{ route('contact') }}" class="mt-4 px-4 py-2 bg-accent-color text-white rounded-lg hover:bg-yellow-500 transition-colors duration-300 inline-block">
                    Get In Touch
                </a>
                </div>
                </div>
            </div>

            <!-- Bottom Footer -->
            <div class="pt-8 flex flex-col md:flex-row justify-between items-center text-sm relative z-20">
                <p class="text-black mb-4 md:mb-0 font-medium">© {{ date('Y') }} SMA Ship Brokers. All rights reserved.</p>
                <div class="flex space-x-6">
                    <a href="{{ route('legal') }}#terms" class="text-black hover:text-gray-800 transition-colors duration-300 font-medium">Terms & Conditions</a>
                    <a href="{{ route('legal') }}#privacy" class="text-black hover:text-gray-800 transition-colors duration-300 font-medium">Privacy Policy</a>
                </div>
            </div>
        </div>
        
    </footer>
    



    <!-- WhatsApp Float Button -->
    @php
        $siteSettings = \App\Models\SiteSetting::first();
    @endphp
    @if($siteSettings && $siteSettings->whatsapp)
        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $siteSettings->whatsapp) }}" class="whatsapp-float" target="_blank" title="Chat with us on WhatsApp">
            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.488"/>
            </svg>
        </a>
    @else
        <a href="https://wa.me/1234567890" class="whatsapp-float" target="_blank" title="Chat with us on WhatsApp">
            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.488"/>
            </svg>
        </a>
    @endif

    <!-- Custom JavaScript -->
    <script>
        $(document).ready(function() {
            // Header scroll effect
            $(window).scroll(function() {
                if ($(this).scrollTop() > 50) {
                    $('.header').addClass('scrolled');
                } else {
                    $('.header').removeClass('scrolled');
                }
            });

            // Mobile menu toggle
            $('#mobile-menu-btn').click(function() {
                $('#mobile-menu').toggleClass('hidden');
            });

            // Smooth scrolling for anchor links
            $('a[href^="#"]').on('click', function(event) {
                var target = $(this.getAttribute('href'));
                if (target.length) {
                    event.preventDefault();
                    $('html, body').stop().animate({
                        scrollTop: target.offset().top - 80
                    }, 1000);
                }
            });

            // Scroll animations
            function checkScroll() {
                $('.fade-in, .slide-in-left, .slide-in-right').each(function() {
                    var elementTop = $(this).offset().top;
                    var elementBottom = elementTop + $(this).outerHeight();
                    var viewportTop = $(window).scrollTop();
                    var viewportBottom = viewportTop + $(window).height();

                    if (elementBottom > viewportTop && elementTop < viewportBottom) {
                        $(this).addClass('visible');
                    }
                });
            }

            // Initial check
            checkScroll();

            // Check on scroll
            $(window).scroll(checkScroll);

            // Button hover effects
            $('.btn-primary, .btn-secondary').hover(
                function() {
                    $(this).addClass('transform scale-105');
                },
                function() {
                    $(this).removeClass('transform scale-105');
                }
            );

            // Card hover effects
            $('.card').hover(
                function() {
                    $(this).addClass('shadow-lg');
                },
                function() {
                    $(this).removeClass('shadow-lg');
                }
            );
        });
    </script>

    @stack('scripts')
</body>
</html>

