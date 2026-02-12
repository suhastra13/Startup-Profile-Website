@extends('frontend.layouts.app')

@section('title', 'Services - WokilTech')

@section('content')

<!-- Hero Section -->
<section class="relative min-h-[60vh] flex items-center justify-center overflow-hidden bg-white">
    <!-- Background Pattern -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-gray-50 via-white to-coral/5"></div>
        <div class="absolute top-20 left-10 w-72 h-72 bg-coral/10 rounded-full blur-3xl animate-float"></div>
        <div class="absolute bottom-20 right-10 w-96 h-96 bg-coral/8 rounded-full blur-3xl animate-float-delayed"></div>
        <!-- Grid Pattern -->
        <div class="absolute inset-0 bg-grid-pattern opacity-[0.03]"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 z-10">
        <div class="text-center space-y-6">
            <!-- Badge -->
            <div class="inline-flex items-center px-6 py-3 rounded-full bg-coral/10 border-2 border-coral/30 shadow-sm animate-fade-in-up backdrop-blur-sm">
                <i class="bi bi-briefcase text-coral mr-2 text-lg"></i>
                <span class="text-sm font-bold text-gray-900 tracking-wide">LAYANAN KAMI</span>
            </div>

            <!-- Main Heading -->
            <h1 class="text-5xl sm:text-6xl lg:text-7xl font-black text-gray-900 leading-[1.05] animate-fade-in-up" style="animation-delay: 0.1s;">
                Solusi Teknologi
                <br>
                <span class="relative inline-block">
                    <span class="bg-gradient-to-r from-coral via-coral-light to-coral-dark bg-clip-text text-transparent">
                        End-to-End
                    </span>
                    <svg class="absolute -bottom-2 left-0 w-full h-4" viewBox="0 0 300 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 10C50 3 150 1 298 10" stroke="#FF6B6B" stroke-width="3" stroke-linecap="round" />
                    </svg>
                </span>
            </h1>

            <!-- Subtitle -->
            <p class="text-xl sm:text-2xl lg:text-3xl text-gray-700 max-w-4xl mx-auto leading-relaxed font-medium animate-fade-in-up" style="animation-delay: 0.2s;">
                Dari konsep hingga implementasi, kami hadirkan
                <span class="font-black text-coral">solusi terbaik</span> untuk transformasi digital bisnis Anda
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

<!-- Services Grid Section -->
<section class="py-24 lg:py-32 bg-gradient-to-br from-white via-gray-50 to-white relative overflow-hidden">
    <div class="absolute top-0 right-0 w-96 h-96 bg-coral/5 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <!-- Services Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($services as $index => $service)
            <div class="group relative bg-white rounded-3xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-500 hover:-translate-y-4 border-2 border-gray-100 hover:border-coral"
                style="animation: fadeInUp 0.6s ease forwards; animation-delay: {{ $index * 0.1 }}s; opacity: 0;">

                <!-- Image Container (if exists) -->
                @if($service->image)
                <div class="relative h-64 overflow-hidden bg-gray-100">
                    <img src="{{ asset('storage/' . $service->image) }}"
                        alt="{{ $service->title }}"
                        class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">

                    <!-- Overlay Gradient -->
                    <div class="absolute inset-0 bg-gradient-to-t from-gray-900/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                </div>
                @endif

                <!-- Content -->
                <div class="p-8">
                    <!-- Background Decoration -->
                    <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-coral/5 to-transparent rounded-bl-[100px] opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>

                    <div class="relative z-10">
                        <!-- Icon -->
                        <div class="w-20 h-20 rounded-2xl bg-gradient-to-br from-coral to-coral-dark flex items-center justify-center text-white text-4xl mb-6 group-hover:scale-110 group-hover:rotate-3 transition-all duration-500 shadow-xl">
                            <i class="{{ $service->icon ?? 'bi bi-gear' }}"></i>
                        </div>

                        <!-- Title -->
                        <h3 class="text-2xl lg:text-3xl font-black text-gray-900 mb-4 group-hover:text-coral transition-colors duration-300 leading-tight">
                            {{ $service->title }}
                        </h3>

                        <!-- Description -->
                        <p class="text-base lg:text-lg text-gray-600 mb-6 leading-relaxed font-medium line-clamp-3">
                            {{ $service->short_description }}
                        </p>

                        <!-- CTA Button -->
                        <a href="{{ route('services.show', $service->slug) }}"
                            class="inline-flex items-center px-6 py-3 bg-coral/10 text-coral font-bold text-base rounded-xl border-2 border-coral/30 hover:bg-coral hover:text-white transition-all duration-300 hover:scale-105 group/link">
                            Detail Layanan
                            <svg class="w-5 h-5 ml-2 group-hover/link:translate-x-2 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center py-20 bg-white rounded-3xl border-2 border-dashed border-gray-300">
                <div class="w-24 h-24 mx-auto mb-6 rounded-full bg-gray-100 flex items-center justify-center">
                    <i class="bi bi-inbox text-5xl text-gray-400"></i>
                </div>
                <p class="text-gray-500 text-xl font-semibold">Belum ada layanan tersedia</p>
                <p class="text-gray-400 text-base mt-2">Layanan akan segera hadir untuk Anda</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Why Choose Us Section -->
<section class="py-24 lg:py-32 bg-white relative overflow-hidden">
    <div class="absolute bottom-0 left-0 w-96 h-96 bg-coral/5 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-16">
            <div class="inline-flex items-center px-6 py-3 rounded-full bg-white border-2 border-coral/30 text-coral text-sm font-black mb-6 shadow-md">
                <i class="bi bi-star-fill mr-2 text-lg"></i>
                KENAPA PILIH KAMI
            </div>
            <h2 class="text-4xl lg:text-6xl font-black text-gray-900 mb-6 leading-tight">
                Partner Terpercaya untuk
                <br>
                <span class="text-coral">Transformasi Digital</span>
            </h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Feature 1 -->
            <div class="group text-center p-8 bg-gradient-to-br from-gray-50 to-white rounded-3xl border-2 border-gray-100 hover:border-coral transition-all duration-300 hover:-translate-y-2 hover:shadow-xl">
                <div class="w-16 h-16 mx-auto mb-6 rounded-2xl bg-gradient-to-br from-coral to-coral-dark flex items-center justify-center text-white text-3xl group-hover:scale-110 group-hover:rotate-6 transition-all duration-500 shadow-lg">
                    <i class="bi bi-lightning-charge-fill"></i>
                </div>
                <h3 class="text-xl font-black text-gray-900 mb-3">Fast Delivery</h3>
                <p class="text-gray-600 font-medium leading-relaxed">Eksekusi cepat tanpa mengorbankan kualitas hasil</p>
            </div>

            <!-- Feature 2 -->
            <div class="group text-center p-8 bg-gradient-to-br from-gray-50 to-white rounded-3xl border-2 border-gray-100 hover:border-coral transition-all duration-300 hover:-translate-y-2 hover:shadow-xl">
                <div class="w-16 h-16 mx-auto mb-6 rounded-2xl bg-gradient-to-br from-coral to-coral-dark flex items-center justify-center text-white text-3xl group-hover:scale-110 group-hover:rotate-6 transition-all duration-500 shadow-lg">
                    <i class="bi bi-shield-check"></i>
                </div>
                <h3 class="text-xl font-black text-gray-900 mb-3">Quality Assured</h3>
                <p class="text-gray-600 font-medium leading-relaxed">Standar kualitas tinggi di setiap project</p>
            </div>

            <!-- Feature 3 -->
            <div class="group text-center p-8 bg-gradient-to-br from-gray-50 to-white rounded-3xl border-2 border-gray-100 hover:border-coral transition-all duration-300 hover:-translate-y-2 hover:shadow-xl">
                <div class="w-16 h-16 mx-auto mb-6 rounded-2xl bg-gradient-to-br from-coral to-coral-dark flex items-center justify-center text-white text-3xl group-hover:scale-110 group-hover:rotate-6 transition-all duration-500 shadow-lg">
                    <i class="bi bi-people-fill"></i>
                </div>
                <h3 class="text-xl font-black text-gray-900 mb-3">Expert Team</h3>
                <p class="text-gray-600 font-medium leading-relaxed">Tim berpengalaman dan profesional</p>
            </div>

            <!-- Feature 4 -->
            <div class="group text-center p-8 bg-gradient-to-br from-gray-50 to-white rounded-3xl border-2 border-gray-100 hover:border-coral transition-all duration-300 hover:-translate-y-2 hover:shadow-xl">
                <div class="w-16 h-16 mx-auto mb-6 rounded-2xl bg-gradient-to-br from-coral to-coral-dark flex items-center justify-center text-white text-3xl group-hover:scale-110 group-hover:rotate-6 transition-all duration-500 shadow-lg">
                    <i class="bi bi-headset"></i>
                </div>
                <h3 class="text-xl font-black text-gray-900 mb-3">24/7 Support</h3>
                <p class="text-gray-600 font-medium leading-relaxed">Dukungan penuh kapan pun Anda butuhkan</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="relative py-24 lg:py-32 bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 overflow-hidden">
    <!-- Animated Background -->
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-coral/20 rounded-full blur-3xl animate-float"></div>
        <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-coral/20 rounded-full blur-3xl animate-float-delayed"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center lg:text-left lg:flex lg:items-center lg:justify-between">
            <!-- Content -->
            <div class="mb-12 lg:mb-0 lg:max-w-2xl">
                <h2 class="text-4xl lg:text-6xl font-black text-white mb-6 leading-tight">
                    Butuh Solusi Custom?
                    <br>
                    <span class="text-coral">Kami Siap Membantu!</span>
                </h2>
                <p class="text-xl lg:text-2xl text-gray-200 leading-relaxed font-medium mb-8">
                    Tim konsultan kami siap mendengar kebutuhan unik bisnis Anda dan merancang solusi teknologi yang tepat sasaran
                </p>
                <!-- Trust Indicators -->
                <div class="flex flex-wrap items-center gap-6 text-white/80">
                    <div class="flex items-center">
                        <i class="bi bi-check-circle-fill text-coral text-xl mr-2"></i>
                        <span class="font-semibold">Free Consultation</span>
                    </div>
                    <div class="flex items-center">
                        <i class="bi bi-check-circle-fill text-coral text-xl mr-2"></i>
                        <span class="font-semibold">Tailored Solutions</span>
                    </div>
                    <div class="flex items-center">
                        <i class="bi bi-check-circle-fill text-coral text-xl mr-2"></i>
                        <span class="font-semibold">Proven Track Record</span>
                    </div>
                </div>
            </div>

            <!-- CTA Buttons -->
            <div class="flex flex-col gap-5">
                <a href="{{ route('contact') }}" class="group relative inline-flex items-center justify-center px-12 py-6 bg-gradient-to-r from-coral to-coral-dark text-white font-black text-lg rounded-2xl transition-all duration-300 hover:scale-105 hover:-translate-y-1 shadow-2xl hover:shadow-coral/50">
                    <span class="flex items-center">
                        Hubungi Konsultan Kami
                        <svg class="w-6 h-6 ml-3 group-hover:translate-x-2 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                        </svg>
                    </span>
                </a>

                <a href="{{ route('portfolio') }}" class="group inline-flex items-center justify-center px-12 py-6 bg-white text-gray-900 font-black text-lg rounded-2xl border-3 border-white hover:bg-coral hover:text-white hover:border-coral transition-all duration-300 hover:scale-105 shadow-xl">
                    <i class="bi bi-grid-3x3-gap text-2xl mr-3"></i>
                    Lihat Portfolio Kami
                </a>
            </div>
        </div>
    </div>
</section>

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

    /* Line Clamp */
    .line-clamp-3 {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    /* Enhanced Border Width */
    .border-3 {
        border-width: 3px;
    }

    /* Smooth scroll behavior */
    html {
        scroll-behavior: smooth;
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

@endsection