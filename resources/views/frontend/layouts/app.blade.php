<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', ($site_settings['site_name'] ?? 'WokilTech') . ' - Solusi Digital Terbaik')</title>
    <meta name="description" content="@yield('meta_description', $site_settings['site_description'] ?? 'Jasa pembuatan website, aplikasi mobile, dan IoT profesional.')">
    <link rel="icon" href="{{ asset('img/Wokil_Tech.png') }}" type="image/png">
    <link rel="shortcut icon" href="{{ asset('img/Wokil_Tech.png') }}" type="image/png">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* ============================================
            PAGE TRANSITIONS
        ============================================ */
        body {
            transition: opacity 0.3s ease-in-out;
        }

        body.page-transitioning {
            opacity: 0;
        }

        /* Prevent body scroll when sidebar is open */
        body.sidebar-open {
            overflow: hidden;
        }

        /* ============================================
            CSS VARIABLES
        ============================================ */
        :root {
            /* Primary Colors */
            --coral: #FF6B6B;
            --coral-light: #FF8787;
            --coral-dark: #EE5A5A;
            --coral-hover: #FF5252;

            /* Neutral Colors */
            --navy: #1A1F36;
            --navy-light: #2D3561;
            --white: #FFFFFF;
            --off-white: #FAFBFC;

            /* Gray Scale */
            --gray-50: #F9FAFB;
            --gray-100: #F3F4F6;
            --gray-200: #E5E7EB;
            --gray-300: #D1D5DB;
            --gray-400: #9CA3AF;
            --gray-500: #6B7280;
            --gray-600: #4B5563;
            --gray-700: #374151;
            --gray-800: #1F2937;
            --gray-900: #111827;

            /* Shadows */
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            --shadow-coral: 0 10px 30px -5px rgba(255, 107, 107, 0.3);

            /* Border Radius */
            --radius-sm: 0.375rem;
            --radius: 0.5rem;
            --radius-md: 0.75rem;
            --radius-lg: 1rem;
            --radius-xl: 1.5rem;
            --radius-full: 9999px;

            /* Transitions */
            --transition-fast: 150ms cubic-bezier(0.4, 0, 0.2, 1);
            --transition-base: 250ms cubic-bezier(0.4, 0, 0.2, 1);
            --transition-slow: 350ms cubic-bezier(0.4, 0, 0.2, 1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #FAFBFC 0%, #F3F4F6 100%);
            color: var(--gray-900);
            line-height: 1.6;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-weight: 700;
            line-height: 1.2;
            color: var(--navy);
        }

        /* ============================================
            NAVIGATION STYLES
        ============================================ */

        nav {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(20px) saturate(180%);
            -webkit-backdrop-filter: blur(20px) saturate(180%);
            border-bottom: 1px solid rgba(0, 0, 0, 0.06);
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.02);
            transition: all var(--transition-base);
        }

        nav.scrolled {
            box-shadow: var(--shadow-lg);
        }

        .nav-container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 1.5rem;
        }

        /* Logo */
        .logo {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 1.75rem;
            font-weight: 800;
            letter-spacing: -0.02em;
            background: linear-gradient(135deg, var(--coral) 0%, var(--coral-dark) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            transition: all var(--transition-base);
            display: inline-block;
        }

        .logo:hover {
            transform: translateY(-1px);
            filter: brightness(1.1);
        }

        .logo-text {
            color: var(--navy);
            -webkit-text-fill-color: var(--navy);
        }

        /* Navigation Links */
        .nav-link {
            position: relative;
            padding: 0.625rem 1rem;
            font-size: 0.9375rem;
            font-weight: 500;
            color: var(--gray-700);
            transition: color var(--transition-fast);
            display: inline-block;
        }

        .nav-link::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 0;
            height: 2px;
            background: linear-gradient(90deg, var(--coral), var(--coral-light));
            border-radius: 2px;
            transform: translateX(-50%);
            transition: width var(--transition-base);
        }

        .nav-link:hover {
            color: var(--coral);
        }

        .nav-link:hover::before,
        .nav-link.active::before {
            width: 70%;
        }

        .nav-link.active {
            color: var(--coral);
            font-weight: 600;
        }

        /* CTA Button */
        .btn-coral {
            position: relative;
            padding: 0.75rem 1.75rem;
            font-size: 0.9375rem;
            font-weight: 600;
            color: white;
            background: linear-gradient(135deg, var(--coral) 0%, var(--coral-dark) 100%);
            border-radius: var(--radius-lg);
            border: none;
            cursor: pointer;
            overflow: hidden;
            transition: all var(--transition-base);
            box-shadow: 0 4px 14px rgba(255, 107, 107, 0.25);
            display: inline-block;
            text-decoration: none;
        }

        .btn-coral:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(255, 107, 107, 0.35);
        }

        /* Mobile Menu Button */
        .mobile-menu-button {
            padding: 0.5rem;
            color: var(--gray-700);
            border-radius: var(--radius);
            transition: all var(--transition-fast);
            cursor: pointer;
            background: transparent;
            border: none;
            z-index: 1001;
            position: relative;
        }

        .mobile-menu-button:hover {
            background: var(--gray-100);
            color: var(--coral);
        }

        .mobile-menu-button.active {
            color: var(--coral);
        }

        /* ============================================
            MOBILE SIDEBAR
        ============================================ */

        /* Overlay */
        .sidebar-overlay {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(4px);
            z-index: 998;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease, visibility 0.3s ease;
        }

        .sidebar-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        /* Sidebar Container - UPDATED: Sama seperti navbar (background terang) */
        .mobile-sidebar {
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            width: 320px;
            max-width: 85vw;
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(20px) saturate(180%);
            -webkit-backdrop-filter: blur(20px) saturate(180%);
            border-left: 1px solid rgba(0, 0, 0, 0.06);
            box-shadow: -10px 0 50px rgba(0, 0, 0, 0.1);
            z-index: 999;
            display: flex;
            flex-direction: column;
            transform: translateX(100%);
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            overflow-y: auto;
        }

        .mobile-sidebar.active {
            transform: translateX(0);
        }

        /* Sidebar Header - UPDATED: Background terang */
        .sidebar-header {
            padding: 1.5rem;
            border-bottom: 1px solid rgba(0, 0, 0, 0.06);
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: rgba(255, 255, 255, 0.95);
        }

        /* Sidebar Logo - UPDATED: Sama seperti logo navbar */
        .sidebar-logo {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 1.5rem;
            font-weight: 800;
            letter-spacing: -0.02em;
            background: linear-gradient(135deg, var(--coral) 0%, var(--coral-dark) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .sidebar-logo-text {
            color: var(--navy);
            -webkit-text-fill-color: var(--navy);
        }

        /* Sidebar Close Button - UPDATED: Style yang konsisten dengan button navbar */
        .sidebar-close {
            width: 2.5rem;
            height: 2.5rem;
            border-radius: var(--radius);
            background: var(--gray-100);
            border: none;
            color: var(--gray-700);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all var(--transition-base);
        }

        .sidebar-close:hover {
            background: rgba(255, 107, 107, 0.1);
            color: var(--coral);
            transform: rotate(90deg);
        }

        /* Sidebar Navigation */
        .sidebar-nav {
            flex: 1;
            padding: 1.5rem 1rem;
        }

        /* Sidebar Links - UPDATED: Style yang konsisten dengan nav-link */
        .sidebar-link {
            display: flex;
            align-items: center;
            padding: 1rem 1.25rem;
            margin-bottom: 0.5rem;
            font-size: 0.9375rem;
            font-weight: 500;
            color: var(--gray-700);
            border-radius: var(--radius-lg);
            transition: all var(--transition-fast);
            position: relative;
            overflow: hidden;
            text-decoration: none;
        }

        .sidebar-link::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 4px;
            background: linear-gradient(180deg, var(--coral), var(--coral-dark));
            border-radius: 0 4px 4px 0;
            transform: scaleY(0);
            transition: transform var(--transition-base);
        }

        .sidebar-link:hover {
            background: rgba(255, 107, 107, 0.08);
            color: var(--coral);
            padding-left: 1.5rem;
        }

        .sidebar-link:hover::before {
            transform: scaleY(1);
        }

        .sidebar-link.active {
            background: rgba(255, 107, 107, 0.12);
            color: var(--coral);
            font-weight: 600;
        }

        .sidebar-link.active::before {
            transform: scaleY(1);
        }

        .sidebar-link i {
            margin-right: 1rem;
            font-size: 1.25rem;
            width: 1.5rem;
            text-align: center;
            color: var(--coral);
        }

        /* Sidebar Footer - UPDATED: Background terang */
        .sidebar-footer {
            padding: 1.5rem;
            border-top: 1px solid rgba(0, 0, 0, 0.06);
            background: var(--gray-50);
        }

        .sidebar-footer .btn-coral {
            width: 100%;
            text-align: center;
            justify-content: center;
            display: flex;
        }

        /* Social Links in Sidebar - UPDATED: Style yang konsisten */
        .sidebar-social {
            display: flex;
            gap: 0.75rem;
            margin-top: 1rem;
            justify-content: center;
        }

        .sidebar-social-link {
            width: 2.5rem;
            height: 2.5rem;
            border-radius: 50%;
            background: var(--gray-100);
            border: 1px solid var(--gray-200);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--gray-600);
            transition: all var(--transition-base);
            font-size: 1rem;
            text-decoration: none;
        }

        .sidebar-social-link:hover {
            background: rgba(255, 107, 107, 0.1);
            border-color: var(--coral);
            color: var(--coral);
            transform: translateY(-3px);
        }

        /* Hide sidebar on desktop */
        @media (min-width: 1024px) {

            .mobile-sidebar,
            .sidebar-overlay {
                display: none !important;
            }
        }

        /* ============================================
            FOOTER STYLES
        ============================================ */

        footer {
            background: linear-gradient(135deg, var(--navy) 0%, #0D1321 100%);
            color: var(--gray-300);
            position: relative;
            overflow: hidden;
        }

        footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, transparent, var(--coral), transparent);
        }

        .footer-decoration {
            position: absolute;
            border-radius: 50%;
            filter: blur(80px);
            opacity: 0.15;
            pointer-events: none;
        }

        .footer-decoration-1 {
            top: 10%;
            right: 5%;
            width: 300px;
            height: 300px;
            background: var(--coral);
        }

        .footer-decoration-2 {
            bottom: 10%;
            left: 5%;
            width: 400px;
            height: 400px;
            background: var(--coral-light);
        }

        .footer-logo {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 2rem;
            font-weight: 800;
            margin-bottom: 1rem;
        }

        .footer-logo-gradient {
            background: linear-gradient(135deg, var(--coral) 0%, var(--coral-light) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .footer-heading {
            font-size: 1.125rem;
            font-weight: 700;
            color: white;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
        }

        .footer-heading::before {
            content: '';
            width: 32px;
            height: 2px;
            background: var(--coral);
            margin-right: 0.75rem;
            border-radius: 2px;
        }

        .footer-link {
            color: var(--gray-400);
            font-size: 0.9375rem;
            transition: all var(--transition-fast);
            display: inline-flex;
            align-items: center;
            text-decoration: none;
        }

        .footer-link:hover {
            color: var(--coral);
            padding-left: 0.5rem;
        }

        .social-link {
            width: 2.5rem;
            height: 2.5rem;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.05);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--gray-400);
            transition: all var(--transition-base);
            border: 1px solid rgba(255, 255, 255, 0.1);
            text-decoration: none;
        }

        .social-link:hover {
            background: rgba(255, 107, 107, 0.15);
            border-color: var(--coral);
            color: var(--coral);
            transform: translateY(-3px) scale(1.05);
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 10px;
        }

        ::-webkit-scrollbar-track {
            background: var(--gray-100);
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(180deg, var(--coral), var(--coral-dark));
            border-radius: 5px;
        }

        /* Scroll to Top Button */
        .scroll-top-btn {
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            width: 3rem;
            height: 3rem;
            background: linear-gradient(135deg, var(--coral), var(--coral-dark));
            color: white;
            border: none;
            border-radius: 50%;
            cursor: pointer;
            box-shadow: var(--shadow-coral);
            transition: all var(--transition-base);
            z-index: 997;
            display: none;
            align-items: center;
            justify-content: center;
        }

        .scroll-top-btn.show {
            display: flex;
        }

        .scroll-top-btn:hover {
            transform: translateY(-4px);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .logo {
                font-size: 1.5rem;
            }
        }
    </style>
</head>

<body class="antialiased">

    <!-- Navigation -->
    <nav class="sticky top-0 z-50" id="navbar">
        <div class="nav-container">
            <div class="flex justify-between items-center h-20">
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="flex items-center gap-2 text-decoration-none">
                        <img src="{{ asset('img/Wokil_Tech.png') }}" alt="Logo WokilTech" style="height: 45px; width: auto;" class="mr-2">

                        <span class="logo">
                            {{ $site_settings['site_name'] ?? 'Wokil' }}<span class="logo-text">Tech</span>
                        </span>
                    </a>
                </div>

                <!-- Desktop Navigation -->
                <div class="hidden lg:flex items-center space-x-1">
                    <a href="{{ route('home') }}"
                        class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                        Home
                    </a>
                    <a href="{{ route('about') }}"
                        class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}">
                        About
                    </a>
                    <a href="{{ route('services') }}"
                        class="nav-link {{ request()->routeIs('services') ? 'active' : '' }}">
                        Services
                    </a>
                    <a href="{{ route('portfolio') }}"
                        class="nav-link {{ request()->routeIs('portfolio*') ? 'active' : '' }}">
                        Portfolio
                    </a>
                    <a href="{{ route('blog') }}"
                        class="nav-link {{ request()->routeIs('blog') ? 'active' : '' }}">
                        Blog
                    </a>
                </div>

                <div class="hidden lg:flex items-center">
                    <a href="{{ route('contact') }}" class="btn-coral">
                        Contact Us
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <div class="flex items-center lg:hidden">
                    <button id="mobileMenuBtn" class="mobile-menu-button">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path id="menuIconOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path id="menuIconClose" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Overlay -->
    <div id="sidebarOverlay" class="sidebar-overlay"></div>

    <!-- Mobile Sidebar -->
    <aside id="mobileSidebar" class="mobile-sidebar">
        <!-- Sidebar Header -->
        <div class="sidebar-header">
            <div class="flex items-center">
                <img src="{{ asset('img/Wokil_Tech.png') }}" alt="Logo WokilTech" style="height: 35px; width: auto;" class="mr-3">

                <div class="sidebar-logo">
                    {{ $site_settings['site_name'] ?? 'Wokil' }}<span class="sidebar-logo-text">Tech</span>
                </div>
            </div>

            <button id="sidebarCloseBtn" class="sidebar-close">
                <i class="bi bi-x text-xl"></i>
            </button>
        </div>

        <!-- Sidebar Navigation -->
        <nav class="sidebar-nav">
            <a href="{{ route('home') }}"
                class="sidebar-link {{ request()->routeIs('home') ? 'active' : '' }}">
                <i class="bi bi-house-door-fill"></i>
                Home
            </a>
            <a href="{{ route('about') }}"
                class="sidebar-link {{ request()->routeIs('about') ? 'active' : '' }}">
                <i class="bi bi-info-circle-fill"></i>
                About
            </a>
            <a href="{{ route('services') }}"
                class="sidebar-link {{ request()->routeIs('services') ? 'active' : '' }}">
                <i class="bi bi-gear-fill"></i>
                Services
            </a>
            <a href="{{ route('portfolio') }}"
                class="sidebar-link {{ request()->routeIs('portfolio*') ? 'active' : '' }}">
                <i class="bi bi-briefcase-fill"></i>
                Portfolio
            </a>
            <a href="{{ route('blog') }}"
                class="sidebar-link {{ request()->routeIs('blog') ? 'active' : '' }}">
                <i class="bi bi-newspaper"></i>
                Blog
            </a>
        </nav>

        <!-- Sidebar Footer -->
        <div class="sidebar-footer">
            <a href="{{ route('contact') }}" class="btn-coral">
                <i class="bi bi-envelope-fill mr-2"></i>
                Contact Us
            </a>

            <!-- Social Links -->
            <div class="sidebar-social">
                @if(!empty($site_settings['social_instagram']))
                <a href="{{ $site_settings['social_instagram'] }}" class="sidebar-social-link" target="_blank">
                    <i class="bi bi-instagram"></i>
                </a>
                @endif
                @if(!empty($site_settings['social_linkedin']))
                <a href="{{ $site_settings['social_linkedin'] }}" class="sidebar-social-link" target="_blank">
                    <i class="bi bi-linkedin"></i>
                </a>
                @endif
                <a href="#" class="sidebar-social-link">
                    <i class="bi bi-github"></i>
                </a>
                <a href="#" class="sidebar-social-link">
                    <i class="bi bi-twitter"></i>
                </a>
            </div>
        </div>
    </aside>

    <main class="min-h-screen" id="main-content">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="pt-16 pb-8 relative">
        <div class="footer-decoration footer-decoration-1"></div>
        <div class="footer-decoration footer-decoration-2"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-12">
                <div class="lg:col-span-1">
                    <div class="mb-4">
                        <img src="{{ asset('img/Wokil_Tech.png') }}" alt="Logo WokilTech" style="height: 40px; width: auto;" class="mr-3">

                        <h3 class="footer-logo" style="margin-bottom: 0;">
                            <span class="footer-logo-gradient">{{ $site_settings['site_name'] ?? 'Wokil' }}</span><span class="text-white">Tech</span>
                        </h3>
                    </div>
                    <p class="text-gray-400 text-sm leading-relaxed mb-6">
                        {{ $site_settings['site_description'] ?? 'Partner teknologi terpercaya untuk transformasi digital bisnis Anda.' }}
                    </p>
                    <div class="flex space-x-3">
                        @if(!empty($site_settings['social_instagram']))
                        <a href="{{ $site_settings['social_instagram'] }}" class="social-link" target="_blank">
                            <i class="bi bi-instagram"></i>
                        </a>
                        @endif
                        @if(!empty($site_settings['social_linkedin']))
                        <a href="{{ $site_settings['social_linkedin'] }}" class="social-link" target="_blank">
                            <i class="bi bi-linkedin"></i>
                        </a>
                        @endif
                        <a href="#" class="social-link">
                            <i class="bi bi-github"></i>
                        </a>
                        <a href="#" class="social-link">
                            <i class="bi bi-twitter"></i>
                        </a>
                    </div>
                </div>

                <div>
                    <h4 class="footer-heading">Quick Links</h4>
                    <ul class="space-y-3 text-sm">
                        <li><a href="{{ route('about') }}" class="footer-link"><i class="bi bi-chevron-right text-xs"></i> About Us</a></li>
                        <li><a href="{{ route('services') }}" class="footer-link"><i class="bi bi-chevron-right text-xs"></i> Services</a></li>
                        <li><a href="{{ route('portfolio') }}" class="footer-link"><i class="bi bi-chevron-right text-xs"></i> Portfolio</a></li>
                        <li><a href="{{ route('blog') }}" class="footer-link"><i class="bi bi-chevron-right text-xs"></i> Latest News</a></li>
                        <li><a href="{{ route('contact') }}" class="footer-link"><i class="bi bi-chevron-right text-xs"></i> Contact Us</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="footer-heading">Services</h4>
                    <ul class="space-y-3 text-sm text-gray-400">
                        <li class="flex items-start"><i class="bi bi-code-square text-coral mr-3 mt-1"></i><span>Web Development</span></li>
                        <li class="flex items-start"><i class="bi bi-phone text-coral mr-3 mt-1"></i><span>Mobile Applications</span></li>
                        <li class="flex items-start"><i class="bi bi-cpu text-coral mr-3 mt-1"></i><span>IoT Solutions</span></li>
                        <li class="flex items-start"><i class="bi bi-megaphone text-coral mr-3 mt-1"></i><span>Digital Marketing</span></li>
                        <li class="flex items-start"><i class="bi bi-cloud text-coral mr-3 mt-1"></i><span>Cloud Services</span></li>
                    </ul>
                </div>

                <div>
                    <h4 class="footer-heading">Contact</h4>
                    <ul class="space-y-4 text-sm">
                        <li class="flex items-start text-gray-400">
                            <i class="bi bi-geo-alt-fill text-coral mr-3 mt-1 flex-shrink-0"></i>
                            <span>{!! nl2br(e($site_settings['site_address'] ?? 'Alamat belum diatur')) !!}</span>
                        </li>
                        <li class="flex items-center text-gray-400">
                            <i class="bi bi-envelope-fill text-coral mr-3 flex-shrink-0"></i>
                            <a href="mailto:{{ $site_settings['site_email'] ?? 'info@wokiltech.com' }}" class="hover:text-coral transition-colors">
                                {{ $site_settings['site_email'] ?? 'info@wokiltech.com' }}
                            </a>
                        </li>
                        <li class="flex items-center text-gray-400">
                            <i class="bi bi-telephone-fill text-coral mr-3 flex-shrink-0"></i>
                            <a href="tel:{{ $site_settings['site_phone'] ?? '' }}" class="hover:text-coral transition-colors">
                                {{ $site_settings['site_phone'] ?? 'No HP belum diatur' }}
                            </a>
                        </li>
                        <li class="flex items-center text-gray-400">
                            <i class="bi bi-clock-fill text-coral mr-3 flex-shrink-0"></i>
                            <span>Mon - Fri: 09:00 - 18:00</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-gray-800 pt-8">
                <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                    <p class="text-sm text-gray-500 text-center md:text-left">
                        &copy; {{ date('Y') }} {{ $site_settings['site_name'] ?? 'WokilTech' }}. All rights reserved.
                    </p>
                    <div class="flex items-center space-x-6 text-sm text-gray-500">
                        <a href="#" class="hover:text-coral transition-colors">Privacy Policy</a>
                        <span class="text-gray-700">•</span>
                        <a href="#" class="hover:text-coral transition-colors">Terms of Service</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button -->
    <button id="scrollTopBtn" class="scroll-top-btn">
        <i class="bi bi-arrow-up text-lg"></i>
    </button>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // ============================================
            // MOBILE SIDEBAR FUNCTIONALITY
            // ============================================
            const mobileMenuBtn = document.getElementById('mobileMenuBtn');
            const sidebarCloseBtn = document.getElementById('sidebarCloseBtn');
            const mobileSidebar = document.getElementById('mobileSidebar');
            const sidebarOverlay = document.getElementById('sidebarOverlay');
            const menuIconOpen = document.getElementById('menuIconOpen');
            const menuIconClose = document.getElementById('menuIconClose');

            function openSidebar() {
                mobileSidebar.classList.add('active');
                sidebarOverlay.classList.add('active');
                document.body.classList.add('sidebar-open');
                mobileMenuBtn.classList.add('active');
                menuIconOpen.classList.add('hidden');
                menuIconClose.classList.remove('hidden');
            }

            function closeSidebar() {
                mobileSidebar.classList.remove('active');
                sidebarOverlay.classList.remove('active');
                document.body.classList.remove('sidebar-open');
                mobileMenuBtn.classList.remove('active');
                menuIconOpen.classList.remove('hidden');
                menuIconClose.classList.add('hidden');
            }

            // Open sidebar
            mobileMenuBtn.addEventListener('click', function() {
                if (mobileSidebar.classList.contains('active')) {
                    closeSidebar();
                } else {
                    openSidebar();
                }
            });

            // Close sidebar via close button
            sidebarCloseBtn.addEventListener('click', closeSidebar);

            // Close sidebar via overlay
            sidebarOverlay.addEventListener('click', closeSidebar);

            // Close sidebar on ESC key
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && mobileSidebar.classList.contains('active')) {
                    closeSidebar();
                }
            });

            // ============================================
            // PRELOAD & SMOOTH PAGE TRANSITIONS
            // ============================================
            const mainContent = document.getElementById('main-content');
            let isNavigating = false;

            function updateActiveLinks(url) {
                const path = new URL(url).pathname;

                // Update navbar links
                document.querySelectorAll('.nav-link').forEach(link => {
                    const linkPath = new URL(link.href).pathname;
                    link.classList.remove('active');
                    if (linkPath === path) {
                        link.classList.add('active');
                    }
                });

                // Update sidebar links
                document.querySelectorAll('.sidebar-link').forEach(link => {
                    const linkPath = new URL(link.href).pathname;
                    link.classList.remove('active');
                    if (linkPath === path) {
                        link.classList.add('active');
                    }
                });
            }

            function navigateToPage(url, pushState = true) {
                if (isNavigating) return;
                isNavigating = true;

                // Close sidebar immediately
                closeSidebar();

                // Start fade out content only (not navbar/sidebar)
                mainContent.style.opacity = '0';
                mainContent.style.transition = 'opacity 0.2s ease-in-out';

                // Fetch new page in background
                fetch(url, {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'Accept': 'text/html'
                        }
                    })
                    .then(response => {
                        if (!response.ok) throw new Error('Network response was not ok');
                        return response.text();
                    })
                    .then(html => {
                        // Parse HTML
                        const parser = new DOMParser();
                        const doc = parser.parseFromString(html, 'text/html');

                        // Extract new content
                        const newMainContent = doc.querySelector('#main-content') || doc.querySelector('main');
                        const newTitle = doc.querySelector('title');

                        if (newMainContent) {
                            // Wait for fade out to complete
                            setTimeout(() => {
                                // Replace content
                                mainContent.innerHTML = newMainContent.innerHTML;

                                // Update title
                                if (newTitle) {
                                    document.title = newTitle.textContent;
                                }

                                // Update URL
                                if (pushState) {
                                    history.pushState({
                                        url: url
                                    }, '', url);
                                }

                                // Update active links
                                updateActiveLinks(url);

                                // Scroll to top instantly
                                window.scrollTo(0, 0);

                                // Fade in new content
                                requestAnimationFrame(() => {
                                    mainContent.style.opacity = '1';
                                });

                                // Reset navigation flag
                                setTimeout(() => {
                                    isNavigating = false;
                                }, 300);

                                // Re-execute scripts if needed
                                executeScriptsInContent(newMainContent);
                            }, 200);
                        } else {
                            throw new Error('Main content not found in response');
                        }
                    })
                    .catch(error => {
                        console.error('Navigation error:', error);
                        // Fallback to normal navigation
                        window.location.href = url;
                    });
            }

            function executeScriptsInContent(element) {
                // Execute inline scripts in new content if needed
                const scripts = element.querySelectorAll('script');
                scripts.forEach(script => {
                    if (script.src) {
                        // External script
                        const newScript = document.createElement('script');
                        newScript.src = script.src;
                        document.body.appendChild(newScript);
                    } else {
                        // Inline script
                        try {
                            eval(script.textContent);
                        } catch (e) {
                            console.error('Script execution error:', e);
                        }
                    }
                });
            }

            // Intercept navigation clicks
            document.addEventListener('click', function(e) {
                const link = e.target.closest('a');
                if (!link) return;

                const href = link.getAttribute('href');

                // Skip if not applicable for AJAX
                if (!href ||
                    href === '#' ||
                    href.startsWith('#') ||
                    href.startsWith('mailto:') ||
                    href.startsWith('tel:') ||
                    link.target === '_blank' ||
                    link.hasAttribute('download') ||
                    link.classList.contains('no-ajax') ||
                    (!href.startsWith('/') && !href.startsWith(window.location.origin))) {
                    return;
                }

                // Only intercept internal navigation links
                const isInternalLink = href.startsWith('/') || href.startsWith(window.location.origin);
                const isNavLink = link.closest('nav') || link.closest('.sidebar-nav');

                if (isInternalLink && isNavLink) {
                    e.preventDefault();
                    navigateToPage(link.href);
                }
            });

            // Handle browser back/forward
            window.addEventListener('popstate', function(e) {
                if (e.state && e.state.url) {
                    navigateToPage(e.state.url, false);
                }
            });

            // Save initial state
            history.replaceState({
                url: window.location.href
            }, '', window.location.href);

            // ============================================
            // SCROLL EFFECTS
            // ============================================
            const navbar = document.getElementById('navbar');
            const scrollTopBtn = document.getElementById('scrollTopBtn');

            window.addEventListener('scroll', function() {
                // Navbar shadow on scroll
                if (window.pageYOffset > 20) {
                    navbar.classList.add('scrolled');
                } else {
                    navbar.classList.remove('scrolled');
                }

                // Scroll to top button
                if (window.pageYOffset > 300) {
                    scrollTopBtn.classList.add('show');
                } else {
                    scrollTopBtn.classList.remove('show');
                }
            });

            // Scroll to top
            scrollTopBtn.addEventListener('click', function() {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });

            // ============================================
            // SMOOTH SCROLL FOR ANCHOR LINKS
            // ============================================
            document.addEventListener('click', function(e) {
                const link = e.target.closest('a[href^="#"]');
                if (!link) return;

                const href = link.getAttribute('href');
                if (href !== '#' && href.length > 1) {
                    e.preventDefault();
                    const target = document.querySelector(href);
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                }
            });
        });
    </script>

</body>

</html>