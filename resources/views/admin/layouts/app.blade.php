<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - Admin Dashboard</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js' , 'resources/js/animations.js' ])

    <!-- Fallback for CSS if Vite fails -->
    @if(!app()->environment('local'))
        <link rel="stylesheet" href="{{ asset('build/assets/app-DUFLb1TD.css') }}">
        <script src="{{ asset('build/assets/app-DtCVKgHt.js') }}" defer></script>
    @endif
    
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Fallback Styles -->
    <style>
        /* Basic Tailwind-like fallback styles */
        * { box-sizing: border-box; }
        body { margin: 0; font-family: 'Figtree', sans-serif; background-color: #f9fafb; }
        .min-h-screen { min-height: 100vh; }
        .flex { display: flex; }
        .flex-1 { flex: 1; }
        .flex-col { flex-direction: column; }
        .items-center { align-items: center; }
        .justify-between { justify-content: space-between; }
        .justify-end { justify-content: flex-end; }
        .space-x-3 > * + * { margin-left: 0.75rem; }
        .space-x-4 > * + * { margin-left: 1rem; }
        .space-y-6 > * + * { margin-top: 1.5rem; }
        .bg-white { background-color: white; }
        .bg-gray-50 { background-color: #f9fafb; }
        .bg-gray-500 { background-color: #6b7280; }
        .bg-gray-600 { background-color: #4b5563; }
        .bg-blue-600 { background-color: #2563eb; }
        .bg-blue-700 { background-color: #1d4ed8; }
        .bg-[#265478] { background-color: #265478; }
        .bg-[#1e4260] { background-color: #1e4260; }
        .text-white { color: white; }
        .text-gray-600 { color: #4b5563; }
        .text-gray-900 { color: #111827; }
        .text-2xl { font-size: 1.5rem; }
        .text-xl { font-size: 1.25rem; }
        .text-lg { font-size: 1.125rem; }
        .text-sm { font-size: 0.875rem; }
        .font-bold { font-weight: 700; }
        .font-semibold { font-weight: 600; }
        .px-4 { padding-left: 1rem; padding-right: 1rem; }
        .px-6 { padding-left: 1.5rem; padding-right: 1.5rem; }
        .py-2 { padding-top: 0.5rem; padding-bottom: 0.5rem; }
        .py-3 { padding-top: 0.75rem; padding-bottom: 0.75rem; }
        .py-4 { padding-top: 1rem; padding-bottom: 1rem; }
        .py-8 { padding-top: 2rem; padding-bottom: 2rem; }
        .p-6 { padding: 1.5rem; }
        .rounded-lg { border-radius: 0.5rem; }
        .shadow-sm { box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05); }
        .border-b { border-bottom-width: 1px; }
        .border-gray-200 { border-color: #e5e7eb; }
        .border-[#1e4260] { border-color: #1e4260; }
        .w-64 { width: 16rem; }
        .h-16 { height: 4rem; }
        .fixed { position: fixed; }
        .relative { position: relative; }
        .inset-y-0 { top: 0; bottom: 0; }
        .left-0 { left: 0; }
        .z-50 { z-index: 50; }
        .shadow-lg { box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1); }
        .mt-6 { margin-top: 1.5rem; }
        .mb-4 { margin-bottom: 1rem; }
        .mr-2 { margin-right: 0.5rem; }
        .mr-3 { margin-right: 0.75rem; }
        .ml-auto { margin-left: auto; }
        .container { max-width: 100%; margin-left: auto; margin-right: auto; }
        .mx-auto { margin-left: auto; margin-right: auto; }
        .overflow-y-auto { overflow-y: auto; }
        .overflow-hidden { overflow: hidden; }
        .hidden { display: none; }
        .block { display: block; }
        .inline { display: inline; }
        .inline-flex { display: inline-flex; }
        .grid { display: grid; }
        .grid-cols-1 { grid-template-columns: repeat(1, minmax(0, 1fr)); }
        .grid-cols-2 { grid-template-columns: repeat(2, minmax(0, 1fr)); }
        .grid-cols-3 { grid-template-columns: repeat(3, minmax(0, 1fr)); }
        .grid-cols-4 { grid-template-columns: repeat(4, minmax(0, 1fr)); }
        .gap-4 { gap: 1rem; }
        .gap-6 { gap: 1.5rem; }
        .gap-8 { gap: 2rem; }
        
        /* Responsive */
        @media (min-width: 768px) {
            .md\:relative { position: relative; }
            .md\:hidden { display: none; }
            .md\:grid-cols-2 { grid-template-columns: repeat(2, minmax(0, 1fr)); }
            .md\:grid-cols-3 { grid-template-columns: repeat(3, minmax(0, 1fr)); }
            .md\:grid-cols-4 { grid-template-columns: repeat(4, minmax(0, 1fr)); }
        }
        
        @media (min-width: 1024px) {
            .lg\:grid-cols-2 { grid-template-columns: repeat(2, minmax(0, 1fr)); }
            .lg\:grid-cols-3 { grid-template-columns: repeat(3, minmax(0, 1fr)); }
            .lg\:col-span-2 { grid-column: span 2 / span 2; }
        }
        
        /* Sidebar transitions */
        .sidebar-transition {
            transition: all 0.3s ease;
        }
        .sidebar-open {
            transform: translateX(0);
        }
        .sidebar-closed {
            transform: translateX(-100%);
        }
        @media (min-width: 768px) {
            .sidebar-closed {
                transform: translateX(0);
            }
        }
        
        /* Hover effects */
        .hover\:bg-gray-50:hover { background-color: #f9fafb; }
        .hover\:bg-gray-600:hover { background-color: #4b5563; }
        .hover\:bg-blue-700:hover { background-color: #1d4ed8; }
        .hover\:bg-[#1e4260]:hover { background-color: #1e4260; }
        .hover\:text-gray-300:hover { color: #d1d5db; }
        .hover\:text-gray-900:hover { color: #111827; }
        .hover\:text-[#1e4260]:hover { color: #1e4260; }
        
        /* Transitions */
        .transition-colors { transition-property: color, background-color, border-color; transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1); transition-duration: 150ms; }
    </style>
</head>
<body class="font-sans antialiased bg-gray-50">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <div id="sidebar" class="sidebar-transition fixed md:relative inset-y-0 left-0 z-50 w-64 bg-[#265478] text-white shadow-lg">
            <div class="flex items-center justify-between h-16 px-6 border-b border-[#1e4260]">
                <h1 class="text-xl font-bold">Admin Dashboard</h1>
                <button id="sidebar-close" class="md:hidden text-white hover:text-gray-300">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            
            <nav class="mt-6">
                <div class="px-4 mb-4">
                    <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Main Navigation</p>
                </div>
                
                <a href="{{ route('admin.dashboard') }}" class="flex items-center px-6 py-3 text-gray-300 hover:bg-[#1e4260] hover:text-white transition-colors {{ request()->routeIs('admin.dashboard') ? 'bg-[#1e4260] text-white' : '' }}">
                    <i class="fas fa-tachometer-alt w-5 mr-3"></i>
                    Dashboard
                </a>
                
                <div class="px-4 mt-6 mb-4">
                    <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Content Management</p>
                </div>
                
                <a href="{{ route('admin.hero-sections.index') }}" class="flex items-center px-6 py-3 text-gray-300 hover:bg-[#1e4260] hover:text-white transition-colors {{ request()->routeIs('admin.hero-sections.*') ? 'bg-[#1e4260] text-white' : '' }}">
                    <i class="fas fa-image w-5 mr-3"></i>
                    Hero Sections
                </a>
                
                <a href="{{ route('admin.services.index') }}" class="flex items-center px-6 py-3 text-gray-300 hover:bg-[#1e4260] hover:text-white transition-colors {{ request()->routeIs('admin.services.*') ? 'bg-[#1e4260] text-white' : '' }}">
                    <i class="fas fa-cogs w-5 mr-3"></i>
                    Services
                </a>
                
                <a href="{{ route('admin.vessels.index') }}" class="flex items-center px-6 py-3 text-gray-300 hover:bg-[#1e4260] hover:text-white transition-colors {{ request()->routeIs('admin.vessels.*') ? 'bg-[#1e4260] text-white' : '' }}">
                    <i class="fas fa-ship w-5 mr-3"></i>
                    Vessels
                </a>
                
                <a href="{{ route('admin.blog-posts.index') }}" class="flex items-center px-6 py-3 text-gray-300 hover:bg-[#1e4260] hover:text-white transition-colors {{ request()->routeIs('admin.blog-posts.*') ? 'bg-[#1e4260] text-white' : '' }}">
                    <i class="fas fa-blog w-5 mr-3"></i>
                    Blog Posts
                </a>
                
                <a href="{{ route('admin.testimonials.index') }}" class="flex items-center px-6 py-3 text-gray-300 hover:bg-[#1e4260] hover:text-white transition-colors {{ request()->routeIs('admin.testimonials.*') ? 'bg-[#1e4260] text-white' : '' }}">
                    <i class="fas fa-quote-left w-5 mr-3"></i>
                    Testimonials
                </a>
                
                <a href="{{ route('admin.jobs.index') }}" class="flex items-center px-6 py-3 text-gray-300 hover:bg-[#1e4260] hover:text-white transition-colors {{ request()->routeIs('admin.jobs.*') ? 'bg-[#1e4260] text-white' : '' }}">
                    <i class="fas fa-briefcase w-5 mr-3"></i>
                    Careers
                </a>
                
                <div class="px-4 mt-6 mb-4">
                    <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Communication</p>
                </div>
                
                <a href="{{ route('admin.contact-inquiries.index') }}" class="flex items-center px-6 py-3 text-gray-300 hover:bg-[#1e4260] hover:text-white transition-colors {{ request()->routeIs('admin.contact-inquiries.*') ? 'bg-[#1e4260] text-white' : '' }}">
                    <i class="fas fa-envelope w-5 mr-3"></i>
                    Contact Inquiries
                    @if($newInquiries = \App\Models\ContactInquiry::where('status', 'new')->count())
                        <span class="ml-auto bg-red-500 text-white text-xs rounded-full px-2 py-1">{{ $newInquiries }}</span>
                    @endif
                </a>
                
                <a href="{{ route('admin.legal-documents.index') }}" class="flex items-center px-6 py-3 text-gray-300 hover:bg-[#1e4260] hover:text-white transition-colors {{ request()->routeIs('admin.legal-documents.*') ? 'bg-[#1e4260] text-white' : '' }}">
                    <i class="fas fa-file-contract w-5 mr-3"></i>
                    Legal Documents
                </a>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            <!-- Top Navigation -->
            <header class="bg-white shadow-sm border-b border-gray-200">
                <div class="flex items-center justify-between h-16 px-6">
                    <div class="flex items-center">
                        <button id="sidebar-toggle" class="md:hidden text-gray-600 hover:text-gray-900 mr-4">
                            <i class="fas fa-bars"></i>
                        </button>
                        <h2 class="text-xl font-semibold text-gray-800">@yield('title', 'Dashboard')</h2>
                    </div>
                    
                    <div class="flex items-center space-x-4">
                        <div class="relative">
                            <span class="text-sm text-gray-600">{{ Auth::user()->name }}</span>
                        </div>
                        
                        <div class="relative">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="text-gray-600 hover:text-gray-900">
                                    <i class="fas fa-sign-out-alt"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 overflow-y-auto bg-gray-50">
                <div class="container mx-auto px-6 py-8">
                    @if(session('success'))
                        <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                            {{ session('error') }}
                        </div>
                    @endif

                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    <!-- Sidebar Overlay -->
    <div id="sidebar-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 md:hidden hidden"></div>

    <!-- jQuery Scripts -->
    <script>
        $(document).ready(function() {
            // Sidebar toggle functionality
            $('#sidebar-toggle').click(function() {
                $('#sidebar').removeClass('sidebar-closed').addClass('sidebar-open');
                $('#sidebar-overlay').removeClass('hidden');
            });

            $('#sidebar-close, #sidebar-overlay').click(function() {
                $('#sidebar').removeClass('sidebar-open').addClass('sidebar-closed');
                $('#sidebar-overlay').addClass('hidden');
            });

            // Close sidebar when clicking outside on mobile
            $(document).on('click', function(e) {
                if ($(window).width() < 768) {
                    if (!$(e.target).closest('#sidebar').length && !$(e.target).closest('#sidebar-toggle').length) {
                        $('#sidebar').removeClass('sidebar-open').addClass('sidebar-closed');
                        $('#sidebar-overlay').addClass('hidden');
                    }
                }
            });

            // Auto-hide alerts after 5 seconds
            setTimeout(function() {
                $('.bg-green-100, .bg-red-100').fadeOut();
            }, 5000);
        });
    </script>

    @stack('scripts')
</body>
</html>
