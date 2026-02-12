@extends('frontend.layouts.app')

@section('title', 'Portfolio - WokilTech')

@section('content')

<!-- Hero Section -->
<section class="relative min-h-[60vh] flex items-center justify-center overflow-hidden bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900">
    <!-- Animated Background -->
    <div class="absolute inset-0 pointer-events-none opacity-20">
        <div class="absolute top-20 left-10 w-72 h-72 bg-coral rounded-full blur-3xl animate-float"></div>
        <div class="absolute bottom-20 right-10 w-96 h-96 bg-coral rounded-full blur-3xl animate-float-delayed"></div>
        <div class="absolute inset-0 bg-grid-pattern opacity-[0.05]"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 z-10">
        <div class="text-center space-y-8">
            <!-- Badge -->
            <div class="animate-fade-in-up">
                <div class="inline-flex items-center px-6 py-3 rounded-full bg-white/10 border border-white/20 text-white text-sm font-black backdrop-blur-sm">
                    <i class="bi bi-briefcase-fill mr-2 text-coral"></i>
                    PORTFOLIO KAMI
                </div>
            </div>

            <!-- Title -->
            <h1 class="text-4xl sm:text-5xl lg:text-7xl font-black text-white leading-tight animate-fade-in-up" style="animation-delay: 0.1s;">
                Karya Terbaik
                <br>
                <span class="text-coral">Yang Telah Kami Selesaikan</span>
            </h1>

            <!-- Description -->
            <p class="text-xl lg:text-2xl text-gray-200 max-w-3xl mx-auto leading-relaxed font-medium animate-fade-in-up" style="animation-delay: 0.2s;">
                Eksplorasi berbagai project yang telah kami kerjakan dengan dedikasi penuh dan hasil yang memuaskan
            </p>
        </div>
    </div>

    <!-- Scroll Indicator -->
    <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 animate-bounce">
        <svg class="w-8 h-8 text-coral" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
        </svg>
    </div>
</section>

<!-- Portfolio Section -->
<section class="py-24 lg:py-32 bg-gradient-to-br from-white via-gray-50 to-white relative overflow-hidden">
    <div class="absolute top-0 right-0 w-96 h-96 bg-coral/5 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-0 left-0 w-96 h-96 bg-coral/5 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

        <!-- Category Filter -->
        <div class="flex flex-wrap justify-center gap-4 mb-16">
            <a href="{{ route('portfolio') }}"
                class="group px-8 py-4 rounded-2xl text-sm font-black transition-all duration-300 shadow-lg hover:scale-105 {{ !request('category') ? 'bg-gradient-to-r from-coral to-coral-dark text-white shadow-coral/30' : 'bg-white text-gray-700 hover:bg-gray-50 border-2 border-gray-200 hover:border-coral' }}">
                <i class="bi bi-grid-3x3-gap-fill mr-2"></i>
                Semua Project
            </a>
            @foreach($categories as $cat)
            <a href="{{ route('portfolio', ['category' => $cat]) }}"
                class="group px-8 py-4 rounded-2xl text-sm font-black transition-all duration-300 shadow-lg hover:scale-105 {{ request('category') == $cat ? 'bg-gradient-to-r from-coral to-coral-dark text-white shadow-coral/30' : 'bg-white text-gray-700 hover:bg-gray-50 border-2 border-gray-200 hover:border-coral' }}">
                {{ $cat }}
            </a>
            @endforeach
        </div>

        <!-- Portfolio Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($portfolios as $portfolio)
            <div class="group bg-white rounded-3xl overflow-hidden shadow-xl border-2 border-gray-100 hover:border-coral transition-all duration-500 hover:shadow-2xl hover:scale-105">
                <!-- Image Container -->
                <div class="relative overflow-hidden h-72 bg-gradient-to-br from-gray-100 to-gray-200">
                    @if($portfolio->image)
                    <img src="{{ asset('storage/' . $portfolio->image) }}"
                        alt="{{ $portfolio->title }}"
                        class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
                    @else
                    <div class="flex items-center justify-center h-full text-gray-300">
                        <i class="bi bi-image text-6xl"></i>
                    </div>
                    @endif

                    <!-- Overlay -->
                    <div class="absolute inset-0 bg-gradient-to-t from-gray-900/80 via-gray-900/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>

                    <!-- Category Badge -->
                    <div class="absolute top-4 left-4 z-10">
                        <span class="px-4 py-2 bg-white/95 backdrop-blur-sm text-xs font-black text-coral rounded-xl shadow-lg border-2 border-coral/20">
                            <i class="bi bi-tag-fill mr-1"></i>
                            {{ $portfolio->category }}
                        </span>
                    </div>

                    <!-- Quick View Button -->
                    <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-all duration-500 z-10">
                        <a href="{{ route('portfolio.show', $portfolio->slug) }}"
                            class="px-8 py-4 bg-gradient-to-r from-coral to-coral-dark text-white font-black text-sm rounded-xl shadow-2xl hover:shadow-coral/50 transform hover:scale-110 transition-all duration-300">
                            <i class="bi bi-eye-fill mr-2"></i>
                            Lihat Detail
                        </a>
                    </div>
                </div>

                <!-- Content -->
                <div class="p-6 lg:p-8">
                    <h3 class="text-2xl font-black text-gray-900 mb-3 group-hover:text-coral transition-colors duration-300 leading-tight">
                        <a href="{{ route('portfolio.show', $portfolio->slug)}}">
                            {{ $portfolio->title }}
                        </a>
                    </h3>

                    <p class="text-gray-600 text-base mb-6 line-clamp-2 font-medium leading-relaxed">
                        {{ strip_tags($portfolio->description) }}
                    </p>

                    <div class="flex justify-between items-center pt-4 border-t-2 border-gray-100">
                        <div class="flex items-center">
                            <div class="w-10 h-10 rounded-xl bg-coral/10 flex items-center justify-center text-coral mr-3">
                                <i class="bi bi-building"></i>
                            </div>
                            <span class="text-sm font-bold text-gray-700">
                                {{ $portfolio->client ?? 'Confidential Client' }}
                            </span>
                        </div>

                        <a href="{{ route('portfolio.show', $portfolio->slug) }}"
                            class="group/link flex items-center text-coral font-black text-sm hover:text-coral-dark transition-colors duration-300">
                            Detail
                            <svg class="w-5 h-5 ml-2 group-hover/link:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <!-- Empty State -->
            <div class="col-span-3 text-center py-24">
                <div class="inline-flex items-center justify-center w-32 h-32 rounded-3xl bg-gradient-to-br from-gray-100 to-gray-200 mb-8">
                    <i class="bi bi-folder2-open text-6xl text-gray-400"></i>
                </div>
                <h3 class="text-3xl font-black text-gray-900 mb-4">Tidak Ada Project Ditemukan</h3>
                <p class="text-xl text-gray-500 mb-8 font-medium">Belum ada project untuk kategori ini saat ini.</p>
                <a href="{{ route('portfolio') }}"
                    class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-coral to-coral-dark text-white font-black text-base rounded-xl shadow-xl hover:shadow-coral/50 transition-all duration-300 hover:scale-105">
                    <i class="bi bi-arrow-left mr-2"></i>
                    Lihat Semua Project
                </a>
            </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($portfolios->hasPages())
        <div class="mt-16">
            {{ $portfolios->links() }}
        </div>
        @endif
    </div>
</section>

<!-- CTA Section -->
<section class="relative py-24 lg:py-32 bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 overflow-hidden">
    <!-- Animated Background -->
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-coral/20 rounded-full blur-3xl animate-float"></div>
        <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-coral/20 rounded-full blur-3xl animate-float-delayed"></div>
    </div>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
        <div class="inline-flex items-center px-6 py-3 rounded-full bg-white/10 border border-white/20 text-white text-sm font-black mb-8 backdrop-blur-sm">
            <i class="bi bi-rocket-takeoff-fill mr-2 text-coral"></i>
            MULAI PROJECT ANDA
        </div>

        <h2 class="text-4xl lg:text-6xl font-black text-white mb-6 leading-tight">
            Punya Ide Project?
            <br>
            <span class="text-coral">Mari Wujudkan Bersama!</span>
        </h2>

        <p class="text-xl lg:text-2xl text-gray-200 leading-relaxed font-medium mb-10 max-w-2xl mx-auto">
            Konsultasi gratis dengan tim kami untuk diskusikan project impian Anda
        </p>

        <div class="flex flex-col sm:flex-row items-center justify-center gap-5">
            <a href="{{ route('contact') }}"
                class="group inline-flex items-center justify-center px-12 py-6 bg-gradient-to-r from-coral to-coral-dark text-white font-black text-lg rounded-2xl transition-all duration-300 hover:scale-105 hover:-translate-y-1 shadow-2xl hover:shadow-coral/50">
                Mulai Konsultasi
                <svg class="w-6 h-6 ml-3 group-hover:translate-x-2 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                </svg>
            </a>

            <a href="{{ route('services') }}"
                class="group inline-flex items-center justify-center px-12 py-6 bg-white text-gray-900 font-black text-lg rounded-2xl border-3 border-white hover:bg-coral hover:text-white hover:border-coral transition-all duration-300 hover:scale-105 shadow-xl">
                Lihat Layanan Kami
                <svg class="w-6 h-6 ml-3 group-hover:translate-x-2 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                </svg>
            </a>
        </div>
    </div>
</section>

@endsection

{{-- Push page-specific styles to layout --}}
@push('styles')
<style>
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

    /* Line Clamp */
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
</style>
@endpush

{{-- Push page-specific scripts to layout --}}
@push('scripts')
<script>
    // Page-specific JavaScript (will be executed after AJAX load)
    console.log('Portfolio page loaded');

    // Re-initialize animations for AJAX-loaded content
    document.querySelectorAll('.animate-fade-in-up').forEach((el, index) => {
        el.style.animationDelay = (index * 0.1) + 's';
    });
</script>
@endpush