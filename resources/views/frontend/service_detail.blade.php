@extends('frontend.layouts.app')

@section('title', $service->title . ' - Services')

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
            <!-- Back Button -->
            <div class="animate-fade-in-up">
                <a href="{{ route('services') }}" class="inline-flex items-center px-6 py-3 bg-white/10 text-white font-bold text-sm rounded-xl border border-white/20 hover:bg-white/20 transition-all duration-300 backdrop-blur-sm group">
                    <svg class="w-5 h-5 mr-2 group-hover:-translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                    </svg>
                    Kembali ke Layanan
                </a>
            </div>

            <!-- Icon -->
            <div class="flex justify-center animate-fade-in-up" style="animation-delay: 0.1s;">
                <div class="w-24 h-24 lg:w-32 lg:h-32 rounded-3xl bg-gradient-to-br from-coral to-coral-dark flex items-center justify-center text-white text-5xl lg:text-6xl shadow-2xl transform hover:scale-110 hover:rotate-6 transition-all duration-500">
                    <i class="{{ $service->icon ?? 'bi bi-gear' }}"></i>
                </div>
            </div>

            <!-- Title -->
            <h1 class="text-4xl sm:text-5xl lg:text-7xl font-black text-white leading-tight animate-fade-in-up" style="animation-delay: 0.2s;">
                {{ $service->title }}
            </h1>

            <!-- Short Description -->
            <p class="text-xl lg:text-2xl text-gray-200 max-w-3xl mx-auto leading-relaxed font-medium animate-fade-in-up" style="animation-delay: 0.3s;">
                {{ $service->short_description }}
            </p>

            <!-- CTA Button -->
            <div class="animate-fade-in-up" style="animation-delay: 0.4s;">
                <a href="{{ route('contact') }}" class="group inline-flex items-center px-10 py-5 bg-gradient-to-r from-coral to-coral-dark text-white font-black text-lg rounded-2xl shadow-2xl hover:shadow-coral/50 transition-all duration-300 hover:scale-105 hover:-translate-y-1">
                    Konsultasi Sekarang
                    <svg class="w-6 h-6 ml-3 group-hover:translate-x-2 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                    </svg>
                </a>
            </div>
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

    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            <!-- Main Content -->
            <div class="lg:col-span-2 space-y-8">
                <!-- Featured Image -->
                @if($service->image)
                <div class="group relative overflow-hidden rounded-3xl shadow-2xl border-2 border-gray-100 hover:border-coral transition-all duration-500">
                    <img src="{{ asset('storage/' . $service->image) }}"
                        alt="{{ $service->title }}"
                        class="w-full h-auto object-cover transform group-hover:scale-105 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-gray-900/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                </div>
                @endif

                <!-- Description Content -->
                <div class="bg-white rounded-3xl p-8 lg:p-12 shadow-xl border-2 border-gray-100">
                    <div class="prose prose-lg max-w-none">
                        @if($service->full_description)
                        <div class="text-gray-700 leading-relaxed space-y-6 text-base lg:text-lg font-medium">
                            {!! nl2br(e($service->full_description)) !!}
                        </div>
                        @else
                        <div class="text-gray-700 leading-relaxed space-y-6 text-base lg:text-lg font-medium">
                            <p>{{ $service->short_description }}</p>
                        </div>

                        <div class="mt-8 p-6 bg-gray-50 rounded-2xl border-2 border-dashed border-gray-200">
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <i class="bi bi-info-circle text-3xl text-gray-400"></i>
                                </div>
                                <div class="ml-4">
                                    <p class="text-gray-500 italic font-medium">
                                        Informasi detail lengkap tentang layanan ini sedang dalam proses pengembangan.
                                        Untuk informasi lebih lanjut, silakan hubungi tim kami.
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Key Benefits Section -->
                <div class="bg-gradient-to-br from-coral/5 to-coral/10 rounded-3xl p-8 lg:p-12 border-2 border-coral/20">
                    <h3 class="text-3xl lg:text-4xl font-black text-gray-900 mb-8 flex items-center">
                        <div class="w-12 h-12 rounded-xl bg-coral flex items-center justify-center text-white text-2xl mr-4 shadow-lg">
                            <i class="bi bi-star-fill"></i>
                        </div>
                        Keuntungan Utama
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Benefit 1 -->
                        <div class="flex items-start group">
                            <div class="flex-shrink-0">
                                <div class="w-10 h-10 rounded-xl bg-coral/20 flex items-center justify-center text-coral text-xl group-hover:scale-110 group-hover:rotate-6 transition-all duration-300">
                                    <i class="bi bi-check-circle-fill"></i>
                                </div>
                            </div>
                            <div class="ml-4">
                                <h4 class="text-lg font-bold text-gray-900 mb-1">Solusi Terukur</h4>
                                <p class="text-gray-600 font-medium">Dirancang sesuai kebutuhan dan skala bisnis Anda</p>
                            </div>
                        </div>

                        <!-- Benefit 2 -->
                        <div class="flex items-start group">
                            <div class="flex-shrink-0">
                                <div class="w-10 h-10 rounded-xl bg-coral/20 flex items-center justify-center text-coral text-xl group-hover:scale-110 group-hover:rotate-6 transition-all duration-300">
                                    <i class="bi bi-check-circle-fill"></i>
                                </div>
                            </div>
                            <div class="ml-4">
                                <h4 class="text-lg font-bold text-gray-900 mb-1">Teknologi Terkini</h4>
                                <p class="text-gray-600 font-medium">Menggunakan stack teknologi modern dan reliable</p>
                            </div>
                        </div>

                        <!-- Benefit 3 -->
                        <div class="flex items-start group">
                            <div class="flex-shrink-0">
                                <div class="w-10 h-10 rounded-xl bg-coral/20 flex items-center justify-center text-coral text-xl group-hover:scale-110 group-hover:rotate-6 transition-all duration-300">
                                    <i class="bi bi-check-circle-fill"></i>
                                </div>
                            </div>
                            <div class="ml-4">
                                <h4 class="text-lg font-bold text-gray-900 mb-1">Support Berkelanjutan</h4>
                                <p class="text-gray-600 font-medium">Maintenance dan update rutin pasca implementasi</p>
                            </div>
                        </div>

                        <!-- Benefit 4 -->
                        <div class="flex items-start group">
                            <div class="flex-shrink-0">
                                <div class="w-10 h-10 rounded-xl bg-coral/20 flex items-center justify-center text-coral text-xl group-hover:scale-110 group-hover:rotate-6 transition-all duration-300">
                                    <i class="bi bi-check-circle-fill"></i>
                                </div>
                            </div>
                            <div class="ml-4">
                                <h4 class="text-lg font-bold text-gray-900 mb-1">ROI Terukur</h4>
                                <p class="text-gray-600 font-medium">Investasi teknologi dengan hasil yang jelas</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-1 space-y-6">
                <!-- Quick Info Card -->
                <div class="bg-white rounded-3xl p-8 shadow-xl border-2 border-gray-100 sticky top-8">
                    <h3 class="text-2xl font-black text-gray-900 mb-6">Info Layanan</h3>

                    <div class="space-y-4">
                        <!-- Category -->
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <div class="w-10 h-10 rounded-xl bg-coral/10 flex items-center justify-center text-coral">
                                    <i class="bi bi-tag-fill"></i>
                                </div>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Kategori</p>
                                <p class="text-base font-bold text-gray-900 mt-1">{{ $service->category ?? 'Technology' }}</p>
                            </div>
                        </div>

                        <!-- Delivery Time -->
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <div class="w-10 h-10 rounded-xl bg-coral/10 flex items-center justify-center text-coral">
                                    <i class="bi bi-clock-fill"></i>
                                </div>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Waktu Pengerjaan</p>
                                <p class="text-base font-bold text-gray-900 mt-1">Disesuaikan dengan scope</p>
                            </div>
                        </div>

                        <!-- Support -->
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <div class="w-10 h-10 rounded-xl bg-coral/10 flex items-center justify-center text-coral">
                                    <i class="bi bi-headset"></i>
                                </div>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Support</p>
                                <p class="text-base font-bold text-gray-900 mt-1">24/7 Full Support</p>
                            </div>
                        </div>
                    </div>

                    <!-- Divider -->
                    <div class="my-8 border-t-2 border-gray-100"></div>

                    <!-- CTA Section -->
                    <div class="space-y-4">
                        <a href="{{ route('contact') }}" class="group w-full flex items-center justify-center px-8 py-4 bg-gradient-to-r from-coral to-coral-dark text-white font-bold text-base rounded-xl shadow-xl hover:shadow-coral/50 transition-all duration-300 hover:scale-105">
                            Mulai Konsultasi
                            <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                            </svg>
                        </a>

                        @php
                        // Ambil nomor WhatsApp dari settings
                        $raw_phone = $site_settings['site_phone'] ?? '6281234567890';
                        $wa_number = preg_replace('/[^0-9]/', '', $raw_phone);
                        if(substr($wa_number, 0, 1) == '0') {
                        $wa_number = '62' . substr($wa_number, 1);
                        }
                        @endphp

                        <a href="https://wa.me/{{ $wa_number }}?text=Halo, saya tertarik dengan layanan {{ $service->title }}" target="_blank" class="group w-full flex items-center justify-center px-8 py-4 bg-white text-gray-900 font-bold text-base rounded-xl border-2 border-gray-200 hover:border-coral hover:bg-coral hover:text-white transition-all duration-300 hover:scale-105 shadow-md">
                            <i class="bi bi-whatsapp text-xl mr-2"></i>
                            Chat WhatsApp
                        </a>
                    </div>
                </div>

                <!-- Related Services Teaser -->
                <div class="bg-gradient-to-br from-gray-900 to-gray-800 rounded-3xl p-8 shadow-xl text-white">
                    <h3 class="text-xl font-black mb-4">Layanan Lainnya</h3>
                    <p class="text-gray-300 font-medium mb-6 leading-relaxed">
                        Eksplorasi solusi teknologi lainnya yang kami tawarkan untuk melengkapi kebutuhan bisnis Anda
                    </p>
                    <a href="{{ route('services') }}" class="group inline-flex items-center px-6 py-3 bg-white/10 text-white font-bold text-sm rounded-xl border border-white/20 hover:bg-white/20 transition-all duration-300 backdrop-blur-sm">
                        Lihat Semua Layanan
                        <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Process/How It Works Section -->
<section class="py-24 lg:py-32 bg-white relative overflow-hidden">
    <div class="absolute bottom-0 right-0 w-96 h-96 bg-coral/5 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-16">
            <div class="inline-flex items-center px-6 py-3 rounded-full bg-white border-2 border-coral/30 text-coral text-sm font-black mb-6 shadow-md">
                <i class="bi bi-diagram-3-fill mr-2 text-lg"></i>
                PROSES KERJA
            </div>
            <h2 class="text-4xl lg:text-5xl font-black text-gray-900 mb-6 leading-tight">
                Bagaimana Kami
                <br>
                <span class="text-coral">Bekerja untuk Anda</span>
            </h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <!-- Step 1 -->
            <div class="relative group text-center">
                <div class="flex flex-col items-center">
                    <div class="w-20 h-20 rounded-2xl bg-gradient-to-br from-coral to-coral-dark flex items-center justify-center text-white font-black text-3xl mb-6 shadow-xl group-hover:scale-110 group-hover:rotate-6 transition-all duration-500">
                        01
                    </div>
                    <h3 class="text-xl font-black text-gray-900 mb-3">Konsultasi</h3>
                    <p class="text-gray-600 font-medium leading-relaxed">Diskusi mendalam tentang kebutuhan dan tujuan bisnis Anda</p>
                </div>
                <!-- Arrow -->
                <div class="hidden md:block absolute top-10 -right-4 text-coral text-3xl">
                    <i class="bi bi-arrow-right"></i>
                </div>
            </div>

            <!-- Step 2 -->
            <div class="relative group text-center">
                <div class="flex flex-col items-center">
                    <div class="w-20 h-20 rounded-2xl bg-gradient-to-br from-coral to-coral-dark flex items-center justify-center text-white font-black text-3xl mb-6 shadow-xl group-hover:scale-110 group-hover:rotate-6 transition-all duration-500">
                        02
                    </div>
                    <h3 class="text-xl font-black text-gray-900 mb-3">Perencanaan</h3>
                    <p class="text-gray-600 font-medium leading-relaxed">Merancang solusi terbaik dengan timeline yang jelas</p>
                </div>
                <!-- Arrow -->
                <div class="hidden md:block absolute top-10 -right-4 text-coral text-3xl">
                    <i class="bi bi-arrow-right"></i>
                </div>
            </div>

            <!-- Step 3 -->
            <div class="relative group text-center">
                <div class="flex flex-col items-center">
                    <div class="w-20 h-20 rounded-2xl bg-gradient-to-br from-coral to-coral-dark flex items-center justify-center text-white font-black text-3xl mb-6 shadow-xl group-hover:scale-110 group-hover:rotate-6 transition-all duration-500">
                        03
                    </div>
                    <h3 class="text-xl font-black text-gray-900 mb-3">Eksekusi</h3>
                    <p class="text-gray-600 font-medium leading-relaxed">Development dengan update progress secara berkala</p>
                </div>
                <!-- Arrow -->
                <div class="hidden md:block absolute top-10 -right-4 text-coral text-3xl">
                    <i class="bi bi-arrow-right"></i>
                </div>
            </div>

            <!-- Step 4 -->
            <div class="group text-center">
                <div class="flex flex-col items-center">
                    <div class="w-20 h-20 rounded-2xl bg-gradient-to-br from-coral to-coral-dark flex items-center justify-center text-white font-black text-3xl mb-6 shadow-xl group-hover:scale-110 group-hover:rotate-6 transition-all duration-500">
                        04
                    </div>
                    <h3 class="text-xl font-black text-gray-900 mb-3">Delivery & Support</h3>
                    <p class="text-gray-600 font-medium leading-relaxed">Implementasi dan dukungan berkelanjutan</p>
                </div>
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

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
        <h2 class="text-4xl lg:text-6xl font-black text-white mb-6 leading-tight">
            Siap Memulai Project
            <br>
            <span class="text-coral">{{ $service->title }}?</span>
        </h2>
        <p class="text-xl lg:text-2xl text-gray-200 leading-relaxed font-medium mb-10">
            Konsultasi gratis dengan tim expert kami untuk diskusikan kebutuhan spesifik Anda
        </p>

        <div class="flex flex-col sm:flex-row items-center justify-center gap-5">
            <a href="{{ route('contact') }}" class="group relative inline-flex items-center justify-center px-12 py-6 bg-gradient-to-r from-coral to-coral-dark text-white font-black text-lg rounded-2xl transition-all duration-300 hover:scale-105 hover:-translate-y-1 shadow-2xl hover:shadow-coral/50">
                <span class="flex items-center">
                    Hubungi Kami Sekarang
                    <svg class="w-6 h-6 ml-3 group-hover:translate-x-2 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                    </svg>
                </span>
            </a>

            <a href="{{ route('services') }}" class="group inline-flex items-center justify-center px-12 py-6 bg-white text-gray-900 font-black text-lg rounded-2xl border-3 border-white hover:bg-coral hover:text-white hover:border-coral transition-all duration-300 hover:scale-105 shadow-xl">
                Lihat Layanan Lain
                <svg class="w-6 h-6 ml-3 group-hover:translate-x-2 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                </svg>
            </a>
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

@endsection