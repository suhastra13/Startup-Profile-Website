@extends('frontend.layouts.app')

@section('title', 'Home - WokilTech')

@section('content')

<!-- Hero Section -->
<section class="relative min-h-screen flex items-center justify-center overflow-hidden bg-white">
    <!-- Background Pattern -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-gray-50 via-white to-coral/5"></div>
        <div class="absolute top-20 left-10 w-72 h-72 bg-coral/10 rounded-full blur-3xl animate-float"></div>
        <div class="absolute bottom-20 right-10 w-96 h-96 bg-coral/8 rounded-full blur-3xl animate-float-delayed"></div>
        <!-- Grid Pattern -->
        <div class="absolute inset-0 bg-grid-pattern opacity-[0.03]"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 lg:py-32 z-10">
        <div class="text-center space-y-8">
            <!-- Badge -->
            <div class="inline-flex items-center px-6 py-3 rounded-full bg-coral/10 border-2 border-coral/30 shadow-sm animate-fade-in-up backdrop-blur-sm">
                <span class="relative flex h-3 w-3 mr-3">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-coral opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-3 w-3 bg-coral"></span>
                </span>
                <span class="text-sm font-bold text-gray-900 tracking-wide">Partner Digital Terpercaya Anda</span>
            </div>

            <!-- Main Heading -->
            <h1 class="text-5xl sm:text-6xl lg:text-7xl xl:text-8xl font-black text-gray-900 leading-[1.05] animate-fade-in-up" style="animation-delay: 0.1s;">
                Wujudkan Visi Digital
                <br>
                <span class="relative inline-block">
                    <span class="bg-gradient-to-r from-coral via-coral-light to-coral-dark bg-clip-text text-transparent">
                        Bisnis Anda
                    </span>
                    <svg class="absolute -bottom-2 left-0 w-full h-4" viewBox="0 0 300 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 10C50 3 150 1 298 10" stroke="#FF6B6B" stroke-width="3" stroke-linecap="round" />
                    </svg>
                </span>
            </h1>

            <!-- Subtitle -->
            <p class="text-xl sm:text-2xl lg:text-3xl text-gray-700 max-w-4xl mx-auto leading-relaxed font-medium animate-fade-in-up" style="animation-delay: 0.2s;">
                Transformasi digital dimulai dengan <span class="font-black text-gray-900">teknologi tepat guna</span>.
                <br class="hidden sm:block">
                Website, Aplikasi Mobile, hingga Solusi IoT -
                <span class="font-black text-coral">Kami Hadirkan Semuanya</span>
            </p>

            <!-- CTA Buttons -->
            <div class="flex flex-col sm:flex-row items-center justify-center gap-5 animate-fade-in-up pt-6" style="animation-delay: 0.3s;">
                <a href="{{ route('contact') }}" class="group relative px-12 py-6 bg-gradient-to-r from-coral to-coral-dark text-white font-black text-lg rounded-2xl shadow-2xl hover:shadow-coral/50 transition-all duration-300 hover:scale-105 hover:-translate-y-1 overflow-hidden">
                    <span class="relative z-10 flex items-center">
                        Mulai Project Sekarang
                        <svg class="w-6 h-6 ml-3 group-hover:translate-x-2 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                        </svg>
                    </span>
                    <div class="absolute inset-0 bg-gradient-to-r from-coral-dark to-coral opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                </a>

                <a href="{{ route('portfolio') }}" class="group px-12 py-6 bg-white text-coral font-black text-lg rounded-2xl border-3 border-coral hover:bg-coral hover:text-white transition-all duration-300 hover:scale-105 hover:-translate-y-1 flex items-center shadow-lg">
                    Lihat Karya Kami
                    <svg class="w-6 h-6 ml-3 group-hover:translate-x-2 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>

            <!-- Stats -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 pt-20 animate-fade-in-up" style="animation-delay: 0.4s;">
                <div class="group text-center transform hover:scale-110 transition-transform duration-300">
                    <div class="text-5xl lg:text-6xl font-black text-coral mb-2 tracking-tight">150+</div>
                    <div class="text-sm lg:text-base text-gray-600 font-bold uppercase tracking-wider">Projects Delivered</div>
                </div>
                <div class="group text-center transform hover:scale-110 transition-transform duration-300">
                    <div class="text-5xl lg:text-6xl font-black text-coral mb-2 tracking-tight">100+</div>
                    <div class="text-sm lg:text-base text-gray-600 font-bold uppercase tracking-wider">Happy Clients</div>
                </div>
                <div class="group text-center transform hover:scale-110 transition-transform duration-300">
                    <div class="text-5xl lg:text-6xl font-black text-coral mb-2 tracking-tight">5+</div>
                    <div class="text-sm lg:text-base text-gray-600 font-bold uppercase tracking-wider">Years Expertise</div>
                </div>
                <div class="group text-center transform hover:scale-110 transition-transform duration-300">
                    <div class="text-5xl lg:text-6xl font-black text-coral mb-2 tracking-tight">24/7</div>
                    <div class="text-sm lg:text-base text-gray-600 font-bold uppercase tracking-wider">Full Support</div>
                </div>
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

<!-- Services Section -->
<section class="py-24 lg:py-32 bg-gradient-to-br from-white via-gray-50 to-white relative overflow-hidden">
    <div class="absolute top-0 right-0 w-96 h-96 bg-coral/5 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <!-- Section Header -->
        <div class="text-center mb-20">
            <div class="inline-flex items-center px-6 py-3 rounded-full bg-white border-2 border-coral/30 text-coral text-sm font-black mb-6 shadow-md">
                <i class="bi bi-briefcase mr-2 text-lg"></i>
                LAYANAN KAMI
            </div>
            <h2 class="text-4xl lg:text-6xl font-black text-gray-900 mb-6 leading-tight">
                Solusi Lengkap untuk
                <br>
                <span class="text-coral">Setiap Kebutuhan Digital</span>
            </h2>
            <p class="text-xl lg:text-2xl text-gray-700 max-w-3xl mx-auto font-medium leading-relaxed">
                Dari konsep hingga eksekusi, kami siap mewujudkan solusi teknologi terbaik untuk bisnis Anda
            </p>
        </div>

        <!-- Services Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($services as $index => $service)
            <div class="group relative bg-white rounded-3xl p-10 shadow-xl hover:shadow-2xl transition-all duration-500 hover:-translate-y-4 border-2 border-gray-100 hover:border-coral overflow-hidden"
                style="animation: fadeInUp 0.6s ease forwards; animation-delay: {{ $index * 0.1 }}s; opacity: 0;">

                <!-- Background Decoration -->
                <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-coral/5 to-transparent rounded-bl-[100px] opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>

                <div class="relative z-10">
                    <!-- Icon -->
                    <div class="w-20 h-20 rounded-2xl bg-gradient-to-br from-coral to-coral-dark flex items-center justify-center text-white text-4xl mb-6 group-hover:scale-110 group-hover:rotate-3 transition-all duration-500 shadow-xl">
                        <i class="{{ $service->icon ?? 'bi bi-code-slash' }}"></i>
                    </div>

                    <!-- Content -->
                    <h3 class="text-2xl lg:text-3xl font-black text-gray-900 mb-4 group-hover:text-coral transition-colors duration-300 leading-tight">
                        {{ $service->title }}
                    </h3>
                    <p class="text-base lg:text-lg text-gray-600 mb-6 leading-relaxed font-medium">
                        {{ $service->short_description }}
                    </p>

                    <!-- Learn More Link -->
                    <a href="{{ route('services') }}" class="inline-flex items-center px-6 py-3 bg-coral/10 text-coral font-bold text-base rounded-xl border-2 border-coral/30 hover:bg-coral hover:text-white transition-all duration-300 hover:scale-105 group/link">
                        Pelajari Lebih Lanjut
                        <svg class="w-5 h-5 ml-2 group-hover/link:translate-x-2 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </a>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center py-20 bg-white rounded-3xl border-2 border-dashed border-gray-300">
                <div class="w-24 h-24 mx-auto mb-6 rounded-full bg-gray-100 flex items-center justify-center">
                    <i class="bi bi-inbox text-5xl text-gray-400"></i>
                </div>
                <p class="text-gray-500 text-xl font-semibold">Layanan akan segera hadir</p>
            </div>
            @endforelse
        </div>

        <!-- View All Services Link -->
        @if($services->isNotEmpty())
        <div class="text-center mt-16">
            <a href="{{ route('services') }}" class="inline-flex items-center px-10 py-5 bg-gradient-to-r from-coral to-coral-dark text-white font-bold text-lg rounded-xl group hover:scale-105 transition-all duration-300 shadow-xl hover:shadow-coral/50">
                Eksplorasi Semua Layanan
                <svg class="w-6 h-6 ml-3 group-hover:translate-x-2 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                </svg>
            </a>
        </div>
        @endif
    </div>
</section>

<!-- Portfolio Section -->
<section class="py-24 lg:py-32 bg-white relative overflow-hidden">
    <div class="absolute bottom-0 left-0 w-96 h-96 bg-coral/5 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <!-- Section Header -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-16">
            <div>
                <div class="inline-flex items-center px-6 py-3 rounded-full bg-white border-2 border-coral/30 text-coral text-sm font-black mb-6 shadow-md">
                    <i class="bi bi-grid-3x3-gap mr-2 text-lg"></i>
                    PORTFOLIO
                </div>
                <h2 class="text-4xl lg:text-6xl font-black text-gray-900 leading-tight">
                    Karya yang Membuat
                    <br>
                    <span class="text-coral">Dampak Nyata</span>
                </h2>
            </div>
            <a href="{{ route('portfolio') }}" class="hidden md:inline-flex items-center px-8 py-4 bg-coral/10 text-coral font-bold text-base rounded-xl border-2 border-coral/30 hover:bg-coral hover:text-white group mt-6 md:mt-0 transition-all duration-300 hover:scale-105 shadow-md">
                Lihat Semua Project
                <svg class="w-6 h-6 ml-3 group-hover:translate-x-2 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                </svg>
            </a>
        </div>

        <!-- Portfolio Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($portfolios as $portfolio)
            <div class="group relative bg-white rounded-3xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-500 hover:-translate-y-4 border-2 border-gray-100 hover:border-coral">
                <!-- Image Container -->
                <div class="relative h-72 overflow-hidden bg-gray-100">
                    @if($portfolio->image)
                    <img src="{{ asset('storage/' . $portfolio->image) }}"
                        alt="{{ $portfolio->title }}"
                        class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
                    @else
                    <div class="w-full h-full flex items-center justify-center text-gray-300">
                        <i class="bi bi-image text-7xl"></i>
                    </div>
                    @endif

                    <!-- Overlay on Hover -->
                    <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex items-end p-8">
                        <a href="{{ $portfolio->project_url ?? '#' }}" class="inline-flex items-center px-6 py-3 bg-coral text-white font-bold text-base rounded-xl hover:bg-coral-dark transition-all duration-300 hover:scale-105 shadow-xl group/link">
                            <span>Lihat Project</span>
                            <svg class="w-5 h-5 ml-2 transition-transform duration-300 group-hover/link:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Content -->
                <div class="p-7">
                    <div class="flex items-center mb-4">
                        <span class="px-4 py-2 bg-coral/10 text-coral text-xs font-black rounded-full border border-coral/20 uppercase tracking-wide">
                            {{ $portfolio->category }}
                        </span>
                    </div>
                    <h3 class="text-2xl font-black text-gray-900 mb-3 line-clamp-2 group-hover:text-coral transition-colors duration-300 leading-tight">
                        {{ $portfolio->title }}
                    </h3>
                    <p class="text-base text-gray-600 line-clamp-2 leading-relaxed font-medium">
                        {{ strip_tags($portfolio->description) }}
                    </p>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center py-20 bg-gray-50 rounded-3xl border-2 border-dashed border-gray-300">
                <div class="w-24 h-24 mx-auto mb-6 rounded-full bg-gray-100 flex items-center justify-center">
                    <i class="bi bi-folder text-5xl text-gray-400"></i>
                </div>
                <p class="text-gray-500 text-xl font-semibold">Project showcase akan segera hadir</p>
            </div>
            @endforelse
        </div>

        <!-- Mobile View All Link -->
        @if($portfolios->isNotEmpty())
        <div class="text-center mt-16 md:hidden">
            <a href="{{ route('portfolio') }}" class="inline-flex items-center px-8 py-4 bg-coral/10 text-coral font-bold text-base rounded-xl border-2 border-coral/30 hover:bg-coral hover:text-white group transition-all duration-300 hover:scale-105 shadow-md">
                Lihat Semua Project
                <svg class="w-6 h-6 ml-3 group-hover:translate-x-2 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                </svg>
            </a>
        </div>
        @endif
    </div>
</section>

<!-- Testimonials Section -->
<section class="py-24 lg:py-32 bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 relative overflow-hidden">
    <!-- Decorative Elements -->
    <div class="absolute inset-0 opacity-10 pointer-events-none">
        <div class="absolute top-20 left-10 w-72 h-72 bg-coral rounded-full blur-3xl animate-float"></div>
        <div class="absolute bottom-20 right-10 w-96 h-96 bg-coral rounded-full blur-3xl animate-float-delayed"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <!-- Section Header -->
        <div class="text-center mb-20">
            <div class="inline-flex items-center px-6 py-3 rounded-full bg-white/10 text-white text-sm font-black mb-6 backdrop-blur-sm border border-white/20 shadow-xl">
                <i class="bi bi-chat-quote mr-2 text-lg"></i>
                TESTIMONIAL
            </div>
            <h2 class="text-4xl lg:text-6xl font-black text-white mb-6 leading-tight">
                Kepercayaan dari
                <br>
                <span class="text-coral">Klien Kami</span>
            </h2>
        </div>

        <!-- Testimonials Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Testimonial 1 -->
            <div class="bg-white/5 backdrop-blur-xl rounded-3xl p-10 border border-white/10 hover:bg-white/10 transition-all duration-500 hover:-translate-y-3 hover:shadow-2xl hover:border-coral/50">
                <!-- Stars -->
                <div class="flex items-center mb-6 text-yellow-400">
                    <i class="bi bi-star-fill text-2xl"></i>
                    <i class="bi bi-star-fill text-2xl ml-1"></i>
                    <i class="bi bi-star-fill text-2xl ml-1"></i>
                    <i class="bi bi-star-fill text-2xl ml-1"></i>
                    <i class="bi bi-star-fill text-2xl ml-1"></i>
                </div>

                <!-- Quote -->
                <p class="text-white text-lg lg:text-xl mb-8 leading-relaxed font-medium">
                    "Profesionalisme WokilTech luar biasa! Website perusahaan kami jadi jauh lebih modern, cepat, dan conversion rate meningkat 40%. Highly recommended!"
                </p>

                <!-- Author -->
                <div class="flex items-center pt-6 border-t border-white/10">
                    <div class="w-14 h-14 rounded-full bg-gradient-to-br from-coral to-coral-dark flex items-center justify-center text-white font-black text-xl shadow-xl">
                        BP
                    </div>
                    <div class="ml-4">
                        <p class="text-white font-bold text-lg">Budi Pratama</p>
                        <p class="text-gray-300 text-sm font-medium">CEO, PT Maju Jaya Sentosa</p>
                    </div>
                </div>
            </div>

            <!-- Testimonial 2 -->
            <div class="bg-white/5 backdrop-blur-xl rounded-3xl p-10 border border-white/10 hover:bg-white/10 transition-all duration-500 hover:-translate-y-3 hover:shadow-2xl hover:border-coral/50">
                <!-- Stars -->
                <div class="flex items-center mb-6 text-yellow-400">
                    <i class="bi bi-star-fill text-2xl"></i>
                    <i class="bi bi-star-fill text-2xl ml-1"></i>
                    <i class="bi bi-star-fill text-2xl ml-1"></i>
                    <i class="bi bi-star-fill text-2xl ml-1"></i>
                    <i class="bi bi-star-fill text-2xl ml-1"></i>
                </div>

                <!-- Quote -->
                <p class="text-white text-lg lg:text-xl mb-8 leading-relaxed font-medium">
                    "Sistem IoT yang dibangun membantu monitoring pabrik real-time dan efisiensi operasional meningkat 35%. ROI tercapai dalam 6 bulan!"
                </p>

                <!-- Author -->
                <div class="flex items-center pt-6 border-t border-white/10">
                    <div class="w-14 h-14 rounded-full bg-gradient-to-br from-coral to-coral-dark flex items-center justify-center text-white font-black text-xl shadow-xl">
                        SA
                    </div>
                    <div class="ml-4">
                        <p class="text-white font-bold text-lg">Siti Aminah</p>
                        <p class="text-gray-300 text-sm font-medium">COO, Indo Textile Manufacturing</p>
                    </div>
                </div>
            </div>

            <!-- Testimonial 3 -->
            <div class="bg-white/5 backdrop-blur-xl rounded-3xl p-10 border border-white/10 hover:bg-white/10 transition-all duration-500 hover:-translate-y-3 hover:shadow-2xl hover:border-coral/50">
                <!-- Stars -->
                <div class="flex items-center mb-6 text-yellow-400">
                    <i class="bi bi-star-fill text-2xl"></i>
                    <i class="bi bi-star-fill text-2xl ml-1"></i>
                    <i class="bi bi-star-fill text-2xl ml-1"></i>
                    <i class="bi bi-star-fill text-2xl ml-1"></i>
                    <i class="bi bi-star-fill text-2xl ml-1"></i>
                </div>

                <!-- Quote -->
                <p class="text-white text-lg lg:text-xl mb-8 leading-relaxed font-medium">
                    "Timeline tepat waktu, komunikasi responsif 24/7, dan hasil melebihi ekspektasi. Partner teknologi yang benar-benar bisa diandalkan!"
                </p>

                <!-- Author -->
                <div class="flex items-center pt-6 border-t border-white/10">
                    <div class="w-14 h-14 rounded-full bg-gradient-to-br from-coral to-coral-dark flex items-center justify-center text-white font-black text-xl shadow-xl">
                        DR
                    </div>
                    <div class="ml-4">
                        <p class="text-white font-bold text-lg">Doni Ramadhan</p>
                        <p class="text-gray-300 text-sm font-medium">Founder, TechStart Indonesia</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Blog Section -->
<section class="py-24 lg:py-32 bg-gradient-to-br from-white via-gray-50 to-white relative overflow-hidden">
    <div class="absolute top-0 right-0 w-96 h-96 bg-coral/5 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <!-- Section Header -->
        <div class="text-center mb-20">
            <div class="inline-flex items-center px-6 py-3 rounded-full bg-white border-2 border-coral/30 text-coral text-sm font-black mb-6 shadow-md">
                <i class="bi bi-newspaper mr-2 text-lg"></i>
                BLOG & INSIGHTS
            </div>
            <h2 class="text-4xl lg:text-6xl font-black text-gray-900 mb-6 leading-tight">
                Wawasan & Update
                <br>
                <span class="text-coral">Teknologi Terkini</span>
            </h2>
            <p class="text-xl lg:text-2xl text-gray-700 max-w-3xl mx-auto font-medium leading-relaxed">
                Tips, tutorial, dan tren teknologi terbaru untuk mengembangkan bisnis Anda
            </p>
        </div>

        <!-- Blog Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($posts as $post)
            <article class="group bg-white rounded-3xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-500 hover:-translate-y-4 border-2 border-gray-100 hover:border-coral">
                <!-- Featured Image -->
                <div class="relative h-64 overflow-hidden bg-gray-100">
                    @if($post->featured_image)
                    <img src="{{ asset('storage/' . $post->featured_image) }}"
                        class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700"
                        alt="{{ $post->title }}">
                    @else
                    <div class="w-full h-full flex items-center justify-center text-gray-300">
                        <i class="bi bi-card-image text-6xl"></i>
                    </div>
                    @endif

                    <!-- Category Badge -->
                    <div class="absolute top-5 left-5">
                        <span class="px-4 py-2 bg-gray-900 text-white text-xs font-black rounded-full shadow-xl border-2 border-white/20 backdrop-blur-sm uppercase tracking-wide">
                            {{ $post->category }}
                        </span>
                    </div>
                </div>

                <!-- Content -->
                <div class="p-7">
                    <!-- Meta Info -->
                    <div class="flex items-center text-sm text-gray-500 mb-4 font-semibold">
                        <i class="bi bi-calendar3 mr-2 text-coral"></i>
                        <span>{{ $post->created_at->format('d M Y') }}</span>
                        <span class="mx-3 text-gray-300">•</span>
                        <i class="bi bi-clock mr-2 text-coral"></i>
                        <span>5 min read</span>
                    </div>

                    <!-- Title -->
                    <h3 class="text-2xl font-black text-gray-900 mb-4 line-clamp-2 group-hover:text-coral transition-colors duration-300 leading-tight">
                        <a href="{{ route('blog') }}">{{ $post->title }}</a>
                    </h3>

                    <!-- Excerpt -->
                    <p class="text-base text-gray-600 line-clamp-3 mb-6 leading-relaxed font-medium">
                        {{ $post->excerpt }}
                    </p>

                    <!-- Read More Link -->
                    <a href="{{ route('blog') }}" class="inline-flex items-center px-6 py-3 bg-coral/10 text-coral font-bold text-base rounded-xl border-2 border-coral/30 hover:bg-coral hover:text-white transition-all duration-300 hover:scale-105 group/link">
                        Baca Artikel
                        <svg class="w-5 h-5 ml-2 group-hover/link:translate-x-2 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </a>
                </div>
            </article>
            @empty
            <div class="col-span-full text-center py-20 bg-white rounded-3xl border-2 border-dashed border-gray-300">
                <div class="w-24 h-24 mx-auto mb-6 rounded-full bg-gray-100 flex items-center justify-center">
                    <i class="bi bi-journal-text text-5xl text-gray-400"></i>
                </div>
                <p class="text-gray-500 text-xl font-semibold">Artikel akan segera hadir</p>
            </div>
            @endforelse
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
                    Siap Transformasi Digital?
                    <br>
                    <span class="text-coral">Mulai Sekarang!</span>
                </h2>
                <p class="text-xl lg:text-2xl text-gray-200 leading-relaxed font-medium mb-8">
                    Konsultasi gratis untuk diskusikan kebutuhan teknologi bisnis Anda. Tim expert kami siap membantu mewujudkan visi digital Anda.
                </p>
                <!-- Trust Indicators -->
                <div class="flex flex-wrap items-center gap-6 text-white/80">
                    <div class="flex items-center">
                        <i class="bi bi-check-circle-fill text-coral text-xl mr-2"></i>
                        <span class="font-semibold">Free Consultation</span>
                    </div>
                    <div class="flex items-center">
                        <i class="bi bi-check-circle-fill text-coral text-xl mr-2"></i>
                        <span class="font-semibold">Quick Response</span>
                    </div>
                    <div class="flex items-center">
                        <i class="bi bi-check-circle-fill text-coral text-xl mr-2"></i>
                        <span class="font-semibold">Expert Team</span>
                    </div>
                </div>
            </div>

            <!-- CTA Buttons -->
            <div class="flex flex-col gap-5">
                <a href="{{ route('contact') }}" class="group relative inline-flex items-center justify-center px-12 py-6 bg-gradient-to-r from-coral to-coral-dark text-white font-black text-lg rounded-2xl transition-all duration-300 hover:scale-105 hover:-translate-y-1 shadow-2xl hover:shadow-coral/50">
                    <span class="flex items-center">
                        Hubungi Kami
                        <svg class="w-6 h-6 ml-3 group-hover:translate-x-2 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                        </svg>
                    </span>
                </a>

                @php
                // 1. Ambil nomor dari settings, atau pakai dummy jika kosong
                $raw_phone = $site_settings['site_phone'] ?? '6281234567890';

                // 2. Hapus semua karakter selain angka (hapus +, -, spasi)
                $wa_number = preg_replace('/[^0-9]/', '', $raw_phone);

                // 3. Jika nomor dimulai dengan angka '0', ganti dengan '62' (Format Indonesia)
                if(substr($wa_number, 0, 1) == '0') {
                $wa_number = '62' . substr($wa_number, 1);
                }
                @endphp

                <a href="https://wa.me/{{ $wa_number }}" target="_blank" class="group inline-flex items-center justify-center px-12 py-6 bg-white text-gray-900 font-black text-lg rounded-2xl border-3 border-white hover:bg-coral hover:text-white hover:border-coral transition-all duration-300 hover:scale-105 shadow-xl">
                    <i class="bi bi-whatsapp text-2xl mr-3"></i>
                    Chat di WhatsApp
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
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

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