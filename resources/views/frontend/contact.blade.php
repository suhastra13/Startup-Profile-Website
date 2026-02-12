@extends('frontend.layouts.app')

@section('title', 'Hubungi Kami - WokilTech')

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
                    <i class="bi bi-chat-dots-fill mr-2 text-coral"></i>
                    HUBUNGI KAMI
                </div>
            </div>

            <!-- Title -->
            <h1 class="text-4xl sm:text-5xl lg:text-7xl font-black text-white leading-tight animate-fade-in-up" style="animation-delay: 0.1s;">
                Mari Diskusikan
                <br>
                <span class="text-coral">Project Anda</span>
            </h1>

            <!-- Description -->
            <p class="text-xl lg:text-2xl text-gray-200 max-w-3xl mx-auto leading-relaxed font-medium animate-fade-in-up" style="animation-delay: 0.2s;">
                Punya pertanyaan atau ide project? Tim kami siap membantu mewujudkannya
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

<!-- Contact Section -->
<section class="py-24 lg:py-32 bg-gradient-to-br from-white via-gray-50 to-white relative overflow-hidden">
    <div class="absolute top-0 right-0 w-96 h-96 bg-coral/5 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-0 left-0 w-96 h-96 bg-coral/5 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

        <!-- Success Message -->
        @if(session('success'))
        <div class="mb-12 mx-auto max-w-3xl animate-fade-in">
            <div class="bg-gradient-to-r from-green-50 to-emerald-50 border-2 border-green-400 rounded-2xl p-6 shadow-lg">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-12 h-12 rounded-xl bg-green-500 flex items-center justify-center">
                            <i class="bi bi-check-circle-fill text-white text-2xl"></i>
                        </div>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-black text-green-900">Berhasil Terkirim!</h3>
                        <p class="text-green-700 font-medium">{{ session('success') }}</p>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">

            <!-- Contact Info & Map -->
            <div class="space-y-8">

                <!-- Contact Information Card -->
                <div class="bg-white rounded-3xl shadow-xl border-2 border-gray-100 p-8 lg:p-10 hover:shadow-2xl hover:border-coral transition-all duration-500">
                    <div class="flex items-center mb-8">
                        <div class="w-12 h-12 rounded-xl bg-coral/10 flex items-center justify-center mr-4">
                            <i class="bi bi-info-circle-fill text-coral text-2xl"></i>
                        </div>
                        <h3 class="text-3xl font-black text-gray-900">Informasi Kontak</h3>
                    </div>

                    <div class="space-y-6">
                        <!-- Address -->
                        <div class="group flex items-start p-4 rounded-2xl hover:bg-coral/5 transition-all duration-300">
                            <div class="flex-shrink-0">
                                <div class="flex items-center justify-center h-14 w-14 rounded-xl bg-gradient-to-br from-coral to-coral-dark text-white shadow-lg group-hover:scale-110 transition-transform duration-300">
                                    <i class="bi bi-geo-alt-fill text-xl"></i>
                                </div>
                            </div>
                            <div class="ml-4">
                                <h5 class="text-lg font-black text-gray-900 mb-1">Alamat Kantor</h5>
                                <p class="text-gray-600 font-medium leading-relaxed">
                                    {!! nl2br(e($site_settings['site_address'] ?? 'Alamat belum diatur')) !!}
                                </p>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="group flex items-start p-4 rounded-2xl hover:bg-coral/5 transition-all duration-300">
                            <div class="flex-shrink-0">
                                <div class="flex items-center justify-center h-14 w-14 rounded-xl bg-gradient-to-br from-coral to-coral-dark text-white shadow-lg group-hover:scale-110 transition-transform duration-300">
                                    <i class="bi bi-envelope-fill text-xl"></i>
                                </div>
                            </div>
                            <div class="ml-4">
                                <h5 class="text-lg font-black text-gray-900 mb-1">Email</h5>
                                <a href="mailto:{{ $site_settings['site_email'] ?? '' }}" class="text-coral hover:text-coral-dark font-bold transition-colors">
                                    {{ $site_settings['site_email'] ?? 'Email belum diatur' }}
                                </a>
                            </div>
                        </div>

                        <!-- Phone -->
                        <div class="group flex items-start p-4 rounded-2xl hover:bg-coral/5 transition-all duration-300">
                            <div class="flex-shrink-0">
                                <div class="flex items-center justify-center h-14 w-14 rounded-xl bg-gradient-to-br from-coral to-coral-dark text-white shadow-lg group-hover:scale-110 transition-transform duration-300">
                                    <i class="bi bi-whatsapp text-xl"></i>
                                </div>
                            </div>
                            <div class="ml-4">
                                <h5 class="text-lg font-black text-gray-900 mb-1">WhatsApp / Telepon</h5>
                                <a href="tel:{{ $site_settings['site_phone'] ?? '' }}" class="text-coral hover:text-coral-dark font-bold transition-colors block mb-1">
                                    {{ $site_settings['site_phone'] ?? 'No HP belum diatur' }}
                                </a>
                                <p class="text-gray-500 text-sm font-medium flex items-center">
                                    <i class="bi bi-clock-fill mr-2 text-coral"></i>
                                    Senin - Jumat, 09:00 - 17:00
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Social Media -->
                    <div class="mt-8 pt-8 border-t-2 border-gray-100">
                        <h5 class="text-sm font-black text-gray-900 mb-4 uppercase tracking-wider">Ikuti Kami</h5>
                        <div class="flex space-x-3">
                            @if(!empty($site_settings['social_instagram']))
                            <a href="{{ $site_settings['social_instagram'] }}" target="_blank"
                                class="w-12 h-12 rounded-xl bg-gradient-to-br from-pink-500 to-purple-600 text-white flex items-center justify-center hover:scale-110 transition-transform duration-300 shadow-lg">
                                <i class="bi bi-instagram text-xl"></i>
                            </a>
                            @endif
                            @if(!empty($site_settings['social_linkedin']))
                            <a href="{{ $site_settings['social_linkedin'] }}" target="_blank"
                                class="w-12 h-12 rounded-xl bg-gradient-to-br from-blue-600 to-blue-800 text-white flex items-center justify-center hover:scale-110 transition-transform duration-300 shadow-lg">
                                <i class="bi bi-linkedin text-xl"></i>
                            </a>
                            @endif
                            <a href="#" class="w-12 h-12 rounded-xl bg-gradient-to-br from-gray-800 to-black text-white flex items-center justify-center hover:scale-110 transition-transform duration-300 shadow-lg">
                                <i class="bi bi-github text-xl"></i>
                            </a>
                            <a href="#" class="w-12 h-12 rounded-xl bg-gradient-to-br from-blue-400 to-blue-600 text-white flex items-center justify-center hover:scale-110 transition-transform duration-300 shadow-lg">
                                <i class="bi bi-twitter-x text-xl"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Map Card -->
                <div class="bg-white rounded-3xl shadow-xl border-2 border-gray-100 overflow-hidden h-96 hover:shadow-2xl hover:border-coral transition-all duration-500">
                    <iframe
                        src="{{ $site_settings['google_maps_embed'] ?? 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.666369750827!2d106.82493937499656!3d-6.175392093802544!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f5d2e764b12d%3A0x3d2ad6e1e0e9bcc8!2sMonas!5e0!3m2!1sen!2sid!4v1234567890' }}"
                        width="100%"
                        height="100%"
                        style="border:0;"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="bg-white rounded-3xl shadow-xl border-2 border-gray-100 p-8 lg:p-10 hover:shadow-2xl hover:border-coral transition-all duration-500">
                <div class="flex items-center mb-8">
                    <div class="w-12 h-12 rounded-xl bg-coral/10 flex items-center justify-center mr-4">
                        <i class="bi bi-send-fill text-coral text-2xl"></i>
                    </div>
                    <h3 class="text-3xl font-black text-gray-900">Kirim Pesan</h3>
                </div>

                <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <!-- Name -->
                    <div>
                        <label for="name" class="block text-sm font-black text-gray-900 mb-2 uppercase tracking-wider">
                            Nama Lengkap <span class="text-coral">*</span>
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="bi bi-person-fill text-gray-400"></i>
                            </div>
                            <input type="text" name="name" id="name" required
                                class="w-full pl-12 pr-4 py-4 text-gray-900 font-medium border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-coral focus:border-coral transition-all duration-300 hover:border-gray-300"
                                placeholder="Masukkan nama Anda">
                        </div>
                    </div>

                    <!-- Email & Phone -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="email" class="block text-sm font-black text-gray-900 mb-2 uppercase tracking-wider">
                                Email <span class="text-coral">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <i class="bi bi-envelope-fill text-gray-400"></i>
                                </div>
                                <input type="email" name="email" id="email" required
                                    class="w-full pl-12 pr-4 py-4 text-gray-900 font-medium border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-coral focus:border-coral transition-all duration-300 hover:border-gray-300"
                                    placeholder="email@example.com">
                            </div>
                        </div>
                        <div>
                            <label for="phone" class="block text-sm font-black text-gray-900 mb-2 uppercase tracking-wider">
                                Nomor Telepon
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <i class="bi bi-phone-fill text-gray-400"></i>
                                </div>
                                <input type="text" name="phone" id="phone"
                                    class="w-full pl-12 pr-4 py-4 text-gray-900 font-medium border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-coral focus:border-coral transition-all duration-300 hover:border-gray-300"
                                    placeholder="+62 812 3456 7890">
                            </div>
                        </div>
                    </div>

                    <!-- Subject -->
                    <div>
                        <label for="subject" class="block text-sm font-black text-gray-900 mb-2 uppercase tracking-wider">
                            Subjek Pesan <span class="text-coral">*</span>
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="bi bi-chat-text-fill text-gray-400"></i>
                            </div>
                            <input type="text" name="subject" id="subject" required
                                class="w-full pl-12 pr-4 py-4 text-gray-900 font-medium border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-coral focus:border-coral transition-all duration-300 hover:border-gray-300"
                                placeholder="Misal: Konsultasi Pembuatan Website">
                        </div>
                    </div>

                    <!-- Message -->
                    <div>
                        <label for="message" class="block text-sm font-black text-gray-900 mb-2 uppercase tracking-wider">
                            Pesan <span class="text-coral">*</span>
                        </label>
                        <textarea id="message" name="message" rows="6" required
                            class="w-full px-4 py-4 text-gray-900 font-medium border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-coral focus:border-coral transition-all duration-300 hover:border-gray-300 resize-none"
                            placeholder="Tuliskan detail kebutuhan project Anda di sini..."></textarea>
                    </div>

                    <!-- Submit Button -->
                    <div>
                        <button type="submit"
                            class="group w-full flex items-center justify-center py-5 px-6 bg-gradient-to-r from-coral to-coral-dark text-white font-black text-lg rounded-xl shadow-xl hover:shadow-coral/50 transition-all duration-300 hover:scale-105 hover:-translate-y-1">
                            <i class="bi bi-send-fill mr-3 text-xl"></i>
                            Kirim Pesan
                            <svg class="w-6 h-6 ml-3 group-hover:translate-x-2 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                            </svg>
                        </button>
                    </div>

                    <p class="text-center text-sm text-gray-500 font-medium">
                        <i class="bi bi-shield-check mr-1 text-coral"></i>
                        Data Anda aman dan tidak akan dibagikan kepada pihak ketiga
                    </p>
                </form>
            </div>

        </div>
    </div>
</section>

<!-- FAQ or Additional Info Section (Optional) -->
<section class="relative py-24 bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 overflow-hidden">
    <!-- Animated Background -->
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-coral/20 rounded-full blur-3xl animate-float"></div>
        <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-coral/20 rounded-full blur-3xl animate-float-delayed"></div>
    </div>

    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-16">
            <div class="inline-flex items-center px-6 py-3 rounded-full bg-white/10 border border-white/20 text-white text-sm font-black mb-6 backdrop-blur-sm">
                <i class="bi bi-question-circle-fill mr-2 text-coral"></i>
                PERTANYAAN UMUM
            </div>
            <h2 class="text-4xl lg:text-5xl font-black text-white mb-4">
                Pertanyaan yang Sering Ditanyakan
            </h2>
            <p class="text-xl text-gray-200 font-medium">
                Temukan jawaban atas pertanyaan umum seputar layanan kami
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- FAQ Item 1 -->
            <div class="bg-white/10 backdrop-blur-sm border border-white/20 rounded-2xl p-6 hover:bg-white/15 transition-all duration-300">
                <h3 class="text-lg font-black text-white mb-3 flex items-start">
                    <i class="bi bi-clock-history text-coral mr-3 mt-1 flex-shrink-0"></i>
                    Berapa lama pengerjaan project?
                </h3>
                <p class="text-gray-300 font-medium leading-relaxed">
                    Tergantung kompleksitas project, umumnya 2-8 minggu. Kami akan memberikan estimasi detail setelah diskusi kebutuhan.
                </p>
            </div>

            <!-- FAQ Item 2 -->
            <div class="bg-white/10 backdrop-blur-sm border border-white/20 rounded-2xl p-6 hover:bg-white/15 transition-all duration-300">
                <h3 class="text-lg font-black text-white mb-3 flex items-start">
                    <i class="bi bi-cash-coin text-coral mr-3 mt-1 flex-shrink-0"></i>
                    Bagaimana sistem pembayaran?
                </h3>
                <p class="text-gray-300 font-medium leading-relaxed">
                    Kami menggunakan sistem bertahap: DP 50% di awal, 50% setelah project selesai. Untuk project besar bisa dicicil.
                </p>
            </div>

            <!-- FAQ Item 3 -->
            <div class="bg-white/10 backdrop-blur-sm border border-white/20 rounded-2xl p-6 hover:bg-white/15 transition-all duration-300">
                <h3 class="text-lg font-black text-white mb-3 flex items-start">
                    <i class="bi bi-tools text-coral mr-3 mt-1 flex-shrink-0"></i>
                    Apakah ada garansi maintenance?
                </h3>
                <p class="text-gray-300 font-medium leading-relaxed">
                    Ya! Setiap project mendapat garansi maintenance gratis 1-3 bulan tergantung paket yang dipilih.
                </p>
            </div>

            <!-- FAQ Item 4 -->
            <div class="bg-white/10 backdrop-blur-sm border border-white/20 rounded-2xl p-6 hover:bg-white/15 transition-all duration-300">
                <h3 class="text-lg font-black text-white mb-3 flex items-start">
                    <i class="bi bi-phone-vibrate text-coral mr-3 mt-1 flex-shrink-0"></i>
                    Bagaimana cara berkonsultasi?
                </h3>
                <p class="text-gray-300 font-medium leading-relaxed">
                    Konsultasi bisa via WhatsApp, email, atau tatap muka langsung di kantor kami. Konsultasi pertama gratis!
                </p>
            </div>
        </div>

        <!-- CTA Button -->
        <div class="text-center mt-12">
            <a href="{{ route('services') }}"
                class="group inline-flex items-center justify-center px-10 py-5 bg-white text-gray-900 font-black text-base rounded-xl transition-all duration-300 hover:scale-105 shadow-xl">
                Lihat Layanan Lengkap
                <svg class="w-5 h-5 ml-3 group-hover:translate-x-2 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                </svg>
            </a>
        </div>
    </div>
</section>

@endsection

@push('styles')
<style>
    /* Grid Pattern Background */
    .bg-grid-pattern {
        background-image: linear-gradient(#00000008 1px, transparent 1px),
            linear-gradient(90deg, #00000008 1px, transparent 1px);
        background-size: 50px 50px;
    }

    /* Animations */
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

    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
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

    .animate-fade-in {
        animation: fadeIn 0.5s ease-out forwards;
    }
</style>
@endpush

@push('scripts')
<script>
    console.log('Contact page loaded');

    // Form validation feedback
    document.querySelector('form').addEventListener('submit', function(e) {
        const button = this.querySelector('button[type="submit"]');
        button.innerHTML = '<i class="bi bi-hourglass-split mr-2 animate-spin"></i>Mengirim...';
        button.disabled = true;
    });

    // Re-initialize animations
    document.querySelectorAll('.animate-fade-in-up').forEach((el, index) => {
        el.style.animationDelay = (index * 0.1) + 's';
    });
</script>
@endpush