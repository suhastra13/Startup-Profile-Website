<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel') - WokilTech</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <style>
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

            /* Sidebar Width */
            --sidebar-width: 280px;
        }

        /* ============================================
            GLOBAL STYLES
        ============================================ */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, var(--gray-50) 0%, var(--gray-100) 100%);
            color: var(--gray-900);
            overflow-x: hidden;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-weight: 700;
            color: var(--navy);
        }

        /* ============================================
            SIDEBAR STYLES
        ============================================ */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: var(--sidebar-width);
            background: linear-gradient(180deg, var(--navy) 0%, #0D1321 100%);
            padding: 0;
            overflow-y: auto;
            box-shadow: 4px 0 20px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            transition: transform 0.3s ease;
        }

        .sidebar::-webkit-scrollbar {
            width: 6px;
        }

        .sidebar::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.05);
        }

        .sidebar::-webkit-scrollbar-thumb {
            background: var(--coral);
            border-radius: 3px;
        }

        /* Sidebar Header */
        .sidebar-header {
            padding: 2rem 1.5rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            background: rgba(0, 0, 0, 0.2);
        }

        .sidebar-logo {
            font-size: 1.75rem;
            font-weight: 800;
            margin-bottom: 0.5rem;
            letter-spacing: -0.02em;
        }

        .sidebar-logo-gradient {
            background: linear-gradient(135deg, var(--coral) 0%, var(--coral-light) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .sidebar-subtitle {
            font-size: 0.75rem;
            color: rgba(255, 255, 255, 0.5);
            text-transform: uppercase;
            letter-spacing: 0.05em;
            font-weight: 600;
        }

        /* Navigation */
        .nav-section-title {
            padding: 1.5rem 1.5rem 0.5rem;
            font-size: 0.7rem;
            color: rgba(255, 255, 255, 0.5);
            text-transform: uppercase;
            letter-spacing: 0.1em;
            font-weight: 700;
        }

        .nav-link {
            display: flex;
            align-items: center;
            padding: 0.875rem 1.5rem;
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            font-size: 0.9375rem;
            font-weight: 500;
            transition: all 0.2s ease;
            border-left: 3px solid transparent;
            position: relative;
        }

        .nav-link i {
            font-size: 1.25rem;
            margin-right: 0.875rem;
            width: 1.5rem;
            text-align: center;
            color: var(--coral);
        }

        .nav-link:hover {
            background: rgba(255, 107, 107, 0.1);
            color: var(--white);
            border-left-color: var(--coral);
            padding-left: 1.75rem;
        }

        .nav-link.active {
            background: rgba(255, 107, 107, 0.15);
            color: var(--white);
            border-left-color: var(--coral);
            font-weight: 600;
        }

        .nav-link .badge {
            margin-left: auto;
            background: var(--coral);
            font-size: 0.7rem;
            font-weight: 700;
            padding: 0.25rem 0.5rem;
        }

        /* Logout Button */
        .logout-btn {
            display: flex;
            align-items: center;
            width: 100%;
            padding: 0.875rem 1.5rem;
            background: transparent;
            border: none;
            color: rgba(255, 107, 107, 0.9);
            text-decoration: none;
            font-size: 0.9375rem;
            font-weight: 600;
            transition: all 0.2s ease;
            border-left: 3px solid transparent;
            text-align: left;
        }

        .logout-btn i {
            font-size: 1.25rem;
            margin-right: 0.875rem;
            width: 1.5rem;
            text-align: center;
        }

        .logout-btn:hover {
            background: rgba(255, 107, 107, 0.1);
            color: var(--coral);
            border-left-color: var(--coral);
            padding-left: 1.75rem;
        }

        /* ============================================
            MAIN CONTENT STYLES
        ============================================ */
        .main-content {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
            padding: 0;
        }

        /* Top Header */
        .top-header {
            background: var(--white);
            padding: 1.5rem 2rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            border-bottom: 1px solid var(--gray-200);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .page-title {
            font-size: 1.75rem;
            font-weight: 800;
            color: var(--navy);
            margin: 0;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .user-avatar {
            width: 2.5rem;
            height: 2.5rem;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--coral), var(--coral-dark));
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--white);
            font-weight: 700;
            font-size: 1rem;
        }

        .user-name {
            font-weight: 600;
            color: var(--gray-900);
            font-size: 0.9375rem;
        }

        .user-role {
            font-size: 0.75rem;
            color: var(--gray-500);
            font-weight: 500;
        }

        /* Content Area */
        .content-area {
            padding: 2rem;
        }

        /* Footer */
        .admin-footer {
            padding: 1.5rem 2rem;
            background: var(--white);
            border-top: 1px solid var(--gray-200);
            margin-top: auto;
        }

        .admin-footer p {
            margin: 0;
            font-size: 0.875rem;
            color: var(--gray-500);
            font-weight: 500;
        }

        /* ============================================
            RESPONSIVE
        ============================================ */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.show {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }

            .mobile-menu-toggle {
                display: block !important;
            }
        }

        .mobile-menu-toggle {
            display: none;
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            width: 3.5rem;
            height: 3.5rem;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--coral), var(--coral-dark));
            color: var(--white);
            border: none;
            box-shadow: 0 4px 20px rgba(255, 107, 107, 0.4);
            z-index: 1001;
            cursor: pointer;
            transition: transform 0.2s ease;
        }

        .mobile-menu-toggle:hover {
            transform: scale(1.1);
        }

        /* Overlay for mobile */
        .sidebar-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 999;
        }

        .sidebar-overlay.show {
            display: block;
        }

        /* ============================================
            CUSTOM SCROLLBAR
        ============================================ */
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
    </style>

    @stack('styles')
</head>

<body>

    <!-- Sidebar Overlay (Mobile) -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- Sidebar -->
    <nav class="sidebar" id="sidebar">
        <!-- Sidebar Header -->
        <div class="sidebar-header">
            <h4 class="sidebar-logo">
                <span class="sidebar-logo-gradient">Wokil</span><span class="text-white">Tech</span>
            </h4>
            <p class="sidebar-subtitle">Admin Panel</p>
        </div>

        <!-- Navigation -->
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                    <i class="bi bi-speedometer2"></i>
                    Dashboard
                </a>
            </li>

            <li class="nav-section-title">Content Management</li>

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.pages.*') ? 'active' : '' }}" href="{{ route('admin.pages.index') }}">
                    <i class="bi bi-file-earmark-text"></i>
                    Pages
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.services.*') ? 'active' : '' }}" href="{{ route('admin.services.index') }}">
                    <i class="bi bi-tools"></i>
                    Services
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.portfolios.*') ? 'active' : '' }}" href="{{ route('admin.portfolios.index') }}">
                    <i class="bi bi-briefcase"></i>
                    Portfolios
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.blog.*') ? 'active' : '' }}" href="{{ route('admin.blog.index') }}">
                    <i class="bi bi-newspaper"></i>
                    Blog Posts
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.team.*') ? 'active' : '' }}" href="{{ route('admin.team.index') }}">
                    <i class="bi bi-people"></i>
                    Team
                </a>
            </li>

            <li class="nav-section-title">Project System</li>

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.projects.*') ? 'active' : '' }}" href="{{ route('admin.projects.index') }}">
                    <i class="bi bi-kanban"></i>
                    Projects
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.messages.*') ? 'active' : '' }}" href="{{ route('admin.messages.index') }}">
                    <i class="bi bi-envelope"></i>
                    Inbox
                    @if(isset($unread_count) && $unread_count > 0)
                    <span class="badge">{{ $unread_count }}</span>
                    @endif
                </a>
            </li>

            <li class="nav-section-title">System</li>

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}" href="{{ route('admin.settings.index') }}">
                    <i class="bi bi-gear"></i>
                    Settings
                </a>
            </li>

            <li class="nav-item mt-3">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="logout-btn">
                        <i class="bi bi-box-arrow-right"></i>
                        Logout
                    </button>
                </form>
            </li>
        </ul>
    </nav>

    <!-- Main Content -->
    <main class="main-content">
        <!-- Top Header -->
        <div class="top-header">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="page-title">@yield('header_title', 'Dashboard')</h1>
                <div class="user-info">
                    <div class="text-end d-none d-md-block">
                        <div class="user-name">{{ Auth::user()->name ?? 'Admin' }}</div>
                        <div class="user-role">Administrator</div>
                    </div>
                    <div class="user-avatar">
                        {{ substr(Auth::user()->name ?? 'A', 0, 1) }}
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Area -->
        <div class="content-area">
            @yield('content')
        </div>

        <!-- Footer -->
        <footer class="admin-footer">
            <div class="d-flex justify-content-between align-items-center">
                <p>&copy; {{ date('Y') }} WokilTech. All rights reserved.</p>
                <p>v1.0.0</p>
            </div>
        </footer>
    </main>

    <!-- Mobile Menu Toggle -->
    <button class="mobile-menu-toggle" id="mobileMenuToggle">
        <i class="bi bi-list" style="font-size: 1.5rem;"></i>
    </button>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom JS -->
    <script>
        // Mobile Menu Toggle
        const sidebar = document.getElementById('sidebar');
        const sidebarOverlay = document.getElementById('sidebarOverlay');
        const mobileMenuToggle = document.getElementById('mobileMenuToggle');

        mobileMenuToggle.addEventListener('click', function() {
            sidebar.classList.toggle('show');
            sidebarOverlay.classList.toggle('show');
        });

        sidebarOverlay.addEventListener('click', function() {
            sidebar.classList.remove('show');
            sidebarOverlay.classList.remove('show');
        });

        // Close sidebar on link click (mobile)
        document.querySelectorAll('.sidebar .nav-link').forEach(link => {
            link.addEventListener('click', function() {
                if (window.innerWidth <= 768) {
                    sidebar.classList.remove('show');
                    sidebarOverlay.classList.remove('show');
                }
            });
        });
    </script>

    @stack('scripts')
    @yield('scripts')
</body>

</html>