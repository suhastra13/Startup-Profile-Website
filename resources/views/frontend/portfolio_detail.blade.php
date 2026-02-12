@extends('frontend.layouts.app')

@section('title', $portfolio->title . ' - Portfolio')

@section('content')

<!-- Hero Section -->
<section class="relative min-h-[70vh] flex items-center justify-center overflow-hidden bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900">
    <!-- Animated Background -->
    <div class="absolute inset-0 pointer-events-none opacity-20">
        <div class="absolute top-20 left-10 w-72 h-72 bg-coral rounded-full blur-3xl animate-float"></div>
        <div class="absolute bottom-20 right-10 w-96 h-96 bg-coral rounded-full blur-3xl animate-float-delayed"></div>
        <div class="absolute inset-0 bg-grid-pattern opacity-[0.05]"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 z-10">
        <div class="text-center space-y-8">
            <!-- Breadcrumb -->
            <nav class="flex justify-center items-center animate-fade-in-up mb-8">
                <div class="inline-flex items-center px-8 py-4 bg-white rounded-2xl shadow-xl border-2 border-gray-100">
                    <a href="{{ route('home') }}" class="text-gray-700 font-bold text-sm hover:text-coral transition-colors duration-300 flex items-center">
                        <i class="bi bi-house-fill mr-2 text-base"></i>
                        Home
                    </a>
                    <svg class="w-5 h-5 mx-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                    <a href="{{ route('portfolio') }}" class="text-gray-700 font-bold text-sm hover:text-coral transition-colors duration-300 flex items-center">
                        <i class="bi bi-briefcase-fill mr-2 text-base"></i>
                        Portfolio
                    </a>
                    <svg class="w-5 h-5 mx-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                    <span class="text-coral font-black text-sm flex items-center">
                        <i class="bi bi-file-text-fill mr-2 text-base"></i>
                        {{ Str::limit($portfolio->title, 30) }}
                    </span>
                </div>
            </nav>




            <!-- Category Badge -->
            <div class="flex justify-center animate-fade-in-up" style="animation-delay: 0.1s;">
                <span class="px-6 py-3 bg-gradient-to-r from-coral to-coral-dark text-white font-black text-sm rounded-xl shadow-xl">
                    <i class="bi bi-tag-fill mr-2"></i>
                    {{ $portfolio->category }}
                </span>
            </div>

            <!-- Title -->
            <h1 class="text-4xl sm:text-5xl lg:text-7xl font-black text-white leading-tight animate-fade-in-up" style="animation-delay: 0.2s;">
                {{ $portfolio->title }}
            </h1>

            <!-- Client Info -->
            @if($portfolio->client)
            <p class="text-xl lg:text-2xl text-gray-200 max-w-3xl mx-auto leading-relaxed font-medium animate-fade-in-up" style="animation-delay: 0.3s;">
                <i class="bi bi-building mr-2 text-coral"></i>
                Project untuk <span class="text-coral font-black">{{ $portfolio->client }}</span>
            </p>
            @endif
        </div>
    </div>

    <!-- Scroll Indicator -->
    <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 animate-bounce">
        <svg class="w-8 h-8 text-coral" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
        </svg>
    </div>
</section>

<!-- Main Content Section -->
<section class="py-24 lg:py-32 bg-gradient-to-br from-white via-gray-50 to-white relative overflow-hidden">
    <div class="absolute top-0 right-0 w-96 h-96 bg-coral/5 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-0 left-0 w-96 h-96 bg-coral/5 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">

            <!-- Main Content -->
            <div class="lg:col-span-2 space-y-8">
                <!-- Featured Image -->
                @if($portfolio->image)
                <div class="group relative overflow-hidden rounded-3xl shadow-2xl border-2 border-gray-100 hover:border-coral transition-all duration-500">
                    <img src="{{ asset('storage/' . $portfolio->image) }}"
                        alt="{{ $portfolio->title }}"
                        class="w-full h-auto object-cover transform group-hover:scale-105 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-gray-900/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                </div>
                @endif

                <!-- Description Content -->
                <div class="bg-white rounded-3xl p-8 lg:p-12 shadow-xl border-2 border-gray-100">
                    <div class="flex items-center mb-8">
                        <div class="w-12 h-12 rounded-xl bg-coral flex items-center justify-center text-white text-2xl mr-4 shadow-lg">
                            <i class="bi bi-file-text-fill"></i>
                        </div>
                        <h3 class="text-3xl lg:text-4xl font-black text-gray-900">Tentang Project</h3>
                    </div>

                    <div class="prose prose-lg max-w-none">
                        <div class="text-gray-700 leading-relaxed space-y-6 text-base lg:text-lg font-medium">
                            {!! nl2br(e($portfolio->description)) !!}
                        </div>
                    </div>
                </div>

                <!-- Key Features/Highlights (Optional Enhancement) -->
                <div class="bg-gradient-to-br from-coral/5 to-coral/10 rounded-3xl p-8 lg:p-12 border-2 border-coral/20">
                    <h3 class="text-3xl lg:text-4xl font-black text-gray-900 mb-8 flex items-center">
                        <div class="w-12 h-12 rounded-xl bg-coral flex items-center justify-center text-white text-2xl mr-4 shadow-lg">
                            <i class="bi bi-stars"></i>
                        </div>
                        Highlight Project
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="flex items-start group">
                            <div class="flex-shrink-0">
                                <div class="w-10 h-10 rounded-xl bg-coral/20 flex items-center justify-center text-coral text-xl group-hover:scale-110 group-hover:rotate-6 transition-all duration-300">
                                    <i class="bi bi-check-circle-fill"></i>
                                </div>
                            </div>
                            <div class="ml-4">
                                <h4 class="text-lg font-bold text-gray-900 mb-1">Implementasi Sukses</h4>
                                <p class="text-gray-600 font-medium">Project selesai tepat waktu sesuai timeline</p>
                            </div>
                        </div>

                        <div class="flex items-start group">
                            <div class="flex-shrink-0">
                                <div class="w-10 h-10 rounded-xl bg-coral/20 flex items-center justify-center text-coral text-xl group-hover:scale-110 group-hover:rotate-6 transition-all duration-300">
                                    <i class="bi bi-check-circle-fill"></i>
                                </div>
                            </div>
                            <div class="ml-4">
                                <h4 class="text-lg font-bold text-gray-900 mb-1">Kualitas Terjamin</h4>
                                <p class="text-gray-600 font-medium">Standar kode dan testing yang ketat</p>
                            </div>
                        </div>

                        <div class="flex items-start group">
                            <div class="flex-shrink-0">
                                <div class="w-10 h-10 rounded-xl bg-coral/20 flex items-center justify-center text-coral text-xl group-hover:scale-110 group-hover:rotate-6 transition-all duration-300">
                                    <i class="bi bi-check-circle-fill"></i>
                                </div>
                            </div>
                            <div class="ml-4">
                                <h4 class="text-lg font-bold text-gray-900 mb-1">Client Satisfaction</h4>
                                <p class="text-gray-600 font-medium">Feedback positif dari klien</p>
                            </div>
                        </div>

                        <div class="flex items-start group">
                            <div class="flex-shrink-0">
                                <div class="w-10 h-10 rounded-xl bg-coral/20 flex items-center justify-center text-coral text-xl group-hover:scale-110 group-hover:rotate-6 transition-all duration-300">
                                    <i class="bi bi-check-circle-fill"></i>
                                </div>
                            </div>
                            <div class="ml-4">
                                <h4 class="text-lg font-bold text-gray-900 mb-1">Ongoing Support</h4>
                                <p class="text-gray-600 font-medium">Maintenance dan update berkelanjutan</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-1 space-y-6">
                <!-- Project Info Card -->
                <div class="bg-white rounded-3xl p-8 shadow-xl border-2 border-gray-100 sticky top-8">
                    <h3 class="text-2xl font-black text-gray-900 mb-6">Info Project</h3>

                    <div class="space-y-6">
                        <!-- Client -->
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <div class="w-10 h-10 rounded-xl bg-coral/10 flex items-center justify-center text-coral">
                                    <i class="bi bi-building"></i>
                                </div>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Klien</p>
                                <p class="text-base font-bold text-gray-900 mt-1">{{ $portfolio->client ?? 'Confidential' }}</p>
                            </div>
                        </div>

                        <!-- Category -->
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <div class="w-10 h-10 rounded-xl bg-coral/10 flex items-center justify-center text-coral">
                                    <i class="bi bi-tag-fill"></i>
                                </div>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Kategori</p>
                                <p class="text-base font-bold text-gray-900 mt-1">{{ $portfolio->category }}</p>
                            </div>
                        </div>

                        <!-- Technologies -->
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <div class="w-10 h-10 rounded-xl bg-coral/10 flex items-center justify-center text-coral">
                                    <i class="bi bi-code-slash"></i>
                                </div>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-semibold text-gray-500 uppercase tracking-wider mb-3">Teknologi</p>
                                <div class="flex flex-wrap gap-2">
                                    @if($portfolio->technologies)
                                    @foreach(explode(',', $portfolio->technologies) as $tech)
                                    <span class="px-4 py-2 bg-gradient-to-r from-coral/10 to-coral/5 border-2 border-coral/20 rounded-xl text-xs font-black text-coral hover:bg-coral hover:text-white transition-all duration-300 hover:scale-105">
                                        {{ trim($tech) }}
                                    </span>
                                    @endforeach
                                    @else
                                    <span class="text-gray-400 font-medium">-</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Divider -->
                    @if($portfolio->project_url)
                    <div class="my-8 border-t-2 border-gray-100"></div>

                    <!-- CTA Button -->
                    <div class="space-y-4">
                        <a href="{{ $portfolio->project_url }}" target="_blank" class="group w-full flex items-center justify-center px-8 py-4 bg-gradient-to-r from-coral to-coral-dark text-white font-bold text-base rounded-xl shadow-xl hover:shadow-coral/50 transition-all duration-300 hover:scale-105">
                            Kunjungi Website
                            <i class="bi bi-box-arrow-up-right ml-2 group-hover:translate-x-1 group-hover:-translate-y-1 transition-transform duration-300"></i>
                        </a>
                    </div>
                    @endif
                </div>



            </div>
        </div>
    </div>
</section>

<!-- Related Projects Section -->
@if($related->count() > 0)
<section class="py-24 lg:py-32 bg-white relative overflow-hidden">
    <div class="absolute bottom-0 right-0 w-96 h-96 bg-coral/5 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-16">
            <div class="inline-flex items-center px-6 py-3 rounded-full bg-white border-2 border-coral/30 text-coral text-sm font-black mb-6 shadow-md">
                <i class="bi bi-grid-3x3-gap-fill mr-2 text-lg"></i>
                PROJECT LAINNYA
            </div>
            <h2 class="text-4xl lg:text-5xl font-black text-gray-900 mb-6 leading-tight">
                Lihat Project
                <br>
                <span class="text-coral">Kami yang Lain</span>
            </h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($related as $item)
            <div class="group bg-white rounded-3xl overflow-hidden shadow-xl border-2 border-gray-100 hover:border-coral transition-all duration-500 hover:shadow-2xl hover:scale-105">
                <!-- Image -->
                <div class="relative overflow-hidden h-64 bg-gradient-to-br from-gray-100 to-gray-200">
                    @if($item->image)
                    <a href="{{ route('portfolio.show', $item->slug) }}" class="block h-full">
                        <img src="{{ asset('storage/' . $item->image) }}"
                            alt="{{ $item->title }}"
                            class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
                    </a>
                    @else
                    <div class="flex items-center justify-center h-full text-gray-300">
                        <i class="bi bi-image text-6xl"></i>
                    </div>
                    @endif

                    <div class="absolute inset-0 bg-gradient-to-t from-gray-900/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>

                    <!-- Category Badge -->
                    <div class="absolute top-4 left-4">
                        <span class="px-4 py-2 bg-white/95 backdrop-blur-sm text-xs font-black text-coral rounded-xl shadow-lg border-2 border-coral/20">
                            {{ $item->category }}
                        </span>
                    </div>
                </div>

                <!-- Content -->
                <div class="p-6">
                    <h4 class="text-xl font-black text-gray-900 mb-2 group-hover:text-coral transition-colors duration-300">
                        <a href="{{ route('portfolio.show', $item->slug) }}">{{ $item->title }}</a>
                    </h4>

                    <a href="{{ route('portfolio.show', $item->slug) }}"
                        class="group/link inline-flex items-center text-coral font-black text-sm hover:text-coral-dark transition-colors duration-300 mt-4">
                        Lihat Detail
                        <svg class="w-5 h-5 ml-2 group-hover/link:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                        </svg>
                    </a>
                </div>
            </div>
            @endforeach
        </div>

        <!-- View All Link -->
        <div class="text-center mt-12">
            <a href="{{ route('portfolio') }}" class="group inline-flex items-center px-10 py-5 bg-gradient-to-r from-coral to-coral-dark text-white font-black text-lg rounded-2xl shadow-2xl hover:shadow-coral/50 transition-all duration-300 hover:scale-105 hover:-translate-y-1">
                Lihat Semua Portfolio
                <svg class="w-6 h-6 ml-3 group-hover:translate-x-2 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                </svg>
            </a>
        </div>
    </div>
</section>
@endif

<!-- CTA Section -->
<section class="relative py-24 lg:py-32 bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 overflow-hidden">
    <!-- Animated Background -->
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-coral/20 rounded-full blur-3xl animate-float"></div>
        <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-coral/20 rounded-full blur-3xl animate-float-delayed"></div>
    </div>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
        <h2 class="text-4xl lg:text-6xl font-black text-white mb-6 leading-tight">
            Siap Wujudkan
            <br>
            <span class="text-coral">Project Anda?</span>
        </h2>
        <p class="text-xl lg:text-2xl text-gray-200 leading-relaxed font-medium mb-10">
            Mari diskusikan ide project Anda dengan tim expert kami
        </p>

        <div class="flex flex-col sm:flex-row items-center justify-center gap-5">
            <a href="{{ route('contact') }}" class="group inline-flex items-center justify-center px-12 py-6 bg-gradient-to-r from-coral to-coral-dark text-white font-black text-lg rounded-2xl transition-all duration-300 hover:scale-105 hover:-translate-y-1 shadow-2xl hover:shadow-coral/50">
                Hubungi Kami
                <svg class="w-6 h-6 ml-3 group-hover:translate-x-2 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                </svg>
            </a>

            <a href="{{ route('portfolio') }}" class="group inline-flex items-center justify-center px-12 py-6 bg-white text-gray-900 font-black text-lg rounded-2xl border-3 border-white hover:bg-coral hover:text-white hover:border-coral transition-all duration-300 hover:scale-105 shadow-xl">
                Lihat Portfolio Lain
                <svg class="w-6 h-6 ml-3 group-hover:translate-x-2 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                </svg>
            </a>
        </div>
    </div>
</section>

<style>
    /* Smooth Page Transitions */
    body {
        transition: opacity 0.3s ease-in-out;
    }

    body.page-transitioning {
        opacity: 0;
    }

    /* Grid Pattern Background */
    .bg-grid-pattern {
        background-image: linear-gradient(#00000008 1px, transparent 1px),
            linear-gradient(90deg, #00000008 1px, transparent 1px);
        background-size: 50px 50px;
    }

    /* Enhanced Animations */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(40px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes float {

        0%,
        100% {
            transform: translateY(0px);
        }

        50% {
            transform: translateY(-30px);
        }
    }

    .animate-fade-in-up {
        animation: fadeInUp 0.8s cubic-bezier(0.4, 0, 0.2, 1) forwards;
        opacity: 0;
    }

    .animate-float {
        animation: float 8s ease-in-out infinite;
    }

    .animate-float-delayed {
        animation: float 8s ease-in-out infinite;
        animation-delay: 4s;
    }

    /* Enhanced Border Width */
    .border-3 {
        border-width: 3px;
    }

    /* Smooth scroll behavior */
    html {
        scroll-behavior: smooth;
    }

    /* Prose Styling */
    .prose {
        color: #374151;
    }

    .prose p {
        margin-bottom: 1.5rem;
        line-height: 1.8;
    }

    .prose strong {
        color: #111827;
        font-weight: 700;
    }

    /* Custom Scrollbar */
    ::-webkit-scrollbar {
        width: 10px;
    }

    ::-webkit-scrollbar-track {
        background: #f1f1f1;
    }

    ::-webkit-scrollbar-thumb {
        background: #FF6B6B;
        border-radius: 5px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: #ee5a52;
    }
</style>

<script>
    // Smooth Page Transitions
    document.addEventListener('DOMContentLoaded', function() {
        // Mark page as loaded
        document.body.classList.add('page-loaded');

        // Handle all internal links
        const links = document.querySelectorAll('a[href^="/"], a[href^="' + window.location.origin + '"]');

        links.forEach(link => {
            // Skip external links and links that open in new tab
            if (link.target === '_blank') return;
            if (link.classList.contains('no-transition')) return;
            if (link.getAttribute('href')?.startsWith('#')) return;

            link.addEventListener('click', function(e) {
                const href = this.getAttribute('href');
                if (!href || href === '#') return;

                e.preventDefault();

                // Add fade-out effect
                document.body.classList.add('page-transitioning');

                // Navigate after animation
                setTimeout(() => {
                    window.location.href = href;
                }, 300);
            });
        });
    });

    // Handle browser back/forward
    window.addEventListener('pageshow', function(event) {
        if (event.persisted) {
            document.body.classList.remove('page-transitioning');
        }
    });
</script>

@endsection