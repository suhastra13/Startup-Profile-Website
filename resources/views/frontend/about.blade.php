@extends('frontend.layouts.app')

@section('title', 'About Us - WokilTech')

@section('content')

<!-- Hero Section -->
<section class="relative py-20 lg:py-24 bg-white overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute inset-0 bg-gradient-to-br from-gray-50 via-white to-coral/5"></div>
        <div class="absolute top-10 right-10 w-64 h-64 bg-coral/8 rounded-full blur-3xl"></div>
        <div class="absolute inset-0 bg-grid-pattern opacity-[0.03]"></div>
    </div>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
        <!-- Badge -->
        <div class="inline-flex items-center px-6 py-3 rounded-full bg-white border-2 border-coral/30 text-coral text-sm font-black mb-6 shadow-md">
            <i class="bi bi-info-circle-fill mr-2 text-lg"></i>
            TENTANG KAMI
        </div>

        <!-- Main Heading -->
        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black text-gray-900 leading-tight mb-6">
            Siapa Kami &
            <span class="text-coral">Apa yang Kami Lakukan</span>
        </h1>

        <!-- Subtitle -->
        <p class="text-lg sm:text-xl text-gray-600 leading-relaxed font-medium">
            Cerita di balik WokilTech dan dedikasi kami untuk membawa solusi teknologi terbaik bagi bisnis Anda
        </p>
    </div>
</section>

<!-- Story/Content Section -->
<section class="py-20 lg:py-32 bg-gradient-to-br from-white via-gray-50 to-white relative overflow-hidden">
    <div class="absolute top-0 right-0 w-96 h-96 bg-coral/5 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        @if($page)
        <div class="space-y-12">
            <!-- Title -->
            <div class="text-center">
                <h2 class="text-4xl lg:text-5xl font-black text-gray-900 mb-6 leading-tight">
                    {{ $page->title }}
                </h2>
            </div>

            <!-- Content -->
            <div class="prose prose-lg prose-coral max-w-none">
                <div class="text-gray-700 text-lg leading-relaxed font-medium space-y-6">
                    {!! $page->content !!}
                </div>
            </div>
        </div>
        @else
        <div class="text-center py-20 bg-gradient-to-br from-gray-50 to-gray-100 rounded-3xl border-2 border-dashed border-gray-300">
            <div class="w-24 h-24 mx-auto mb-6 rounded-full bg-gray-200 flex items-center justify-center">
                <i class="bi bi-file-text text-5xl text-gray-400"></i>
            </div>
            <h3 class="text-2xl font-black text-gray-900 mb-4">Halaman About Belum Tersedia</h3>
            <p class="text-gray-600 mb-2 font-medium">Halaman 'About' belum dibuat di Admin Panel.</p>
            <p class="text-sm text-gray-500">Silakan login ke admin > Pages > Create New Page dengan slug 'about'</p>
        </div>
        @endif
    </div>
</section>

<!-- Journey Section -->
<section class="py-20 lg:py-32 bg-white relative overflow-hidden">
    <div class="absolute bottom-0 left-0 w-96 h-96 bg-coral/5 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-16">
            <div class="inline-flex items-center px-6 py-3 rounded-full bg-white border-2 border-coral/30 text-coral text-sm font-black mb-6 shadow-md">
                <i class="bi bi-clock-history mr-2 text-lg"></i>
                PERJALANAN KAMI
            </div>
            <h2 class="text-4xl lg:text-5xl font-black text-gray-900 mb-6 leading-tight">
                Dari Startup hingga <span class="text-coral">Leader</span>
            </h2>
        </div>

        <div class="space-y-8">
            <!-- Timeline Item 1 -->
            <div class="flex gap-6 group">
                <div class="flex-shrink-0">
                    <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-coral to-coral-dark flex items-center justify-center text-white font-black text-xl shadow-xl group-hover:scale-110 transition-transform duration-300">
                        2019
                    </div>
                </div>
                <div class="flex-1 bg-white rounded-3xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 border-2 border-gray-100 hover:border-coral">
                    <h3 class="text-2xl font-black text-gray-900 mb-3">Awal Mula</h3>
                    <p class="text-gray-600 leading-relaxed font-medium">
                        WokilTech didirikan dengan visi membawa transformasi digital ke UMKM Indonesia. Dimulai dari tim kecil 3 orang dengan semangat besar.
                    </p>
                </div>
            </div>

            <!-- Timeline Item 2 -->
            <div class="flex gap-6 group">
                <div class="flex-shrink-0">
                    <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-coral to-coral-dark flex items-center justify-center text-white font-black text-xl shadow-xl group-hover:scale-110 transition-transform duration-300">
                        2021
                    </div>
                </div>
                <div class="flex-1 bg-white rounded-3xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 border-2 border-gray-100 hover:border-coral">
                    <h3 class="text-2xl font-black text-gray-900 mb-3">Ekspansi Pesat</h3>
                    <p class="text-gray-600 leading-relaxed font-medium">
                        Berhasil menyelesaikan 50+ project dan memperluas tim menjadi 15 expert. Mulai merambah ke enterprise clients.
                    </p>
                </div>
            </div>

            <!-- Timeline Item 3 -->
            <div class="flex gap-6 group">
                <div class="flex-shrink-0">
                    <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-coral to-coral-dark flex items-center justify-center text-white font-black text-xl shadow-xl group-hover:scale-110 transition-transform duration-300">
                        2023
                    </div>
                </div>
                <div class="flex-1 bg-white rounded-3xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 border-2 border-gray-100 hover:border-coral">
                    <h3 class="text-2xl font-black text-gray-900 mb-3">Innovation Leader</h3>
                    <p class="text-gray-600 leading-relaxed font-medium">
                        Menjadi salah satu digital agency terdepan di Indonesia dengan 100+ klien dan portfolio project yang menginspirasi.
                    </p>
                </div>
            </div>

            <!-- Timeline Item 4 -->
            <div class="flex gap-6 group">
                <div class="flex-shrink-0">
                    <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-coral to-coral-dark flex items-center justify-center text-white font-black text-xl shadow-xl group-hover:scale-110 transition-transform duration-300">
                        2025
                    </div>
                </div>
                <div class="flex-1 bg-white rounded-3xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 border-2 border-gray-100 hover:border-coral">
                    <h3 class="text-2xl font-black text-gray-900 mb-3">The Future</h3>
                    <p class="text-gray-600 leading-relaxed font-medium">
                        Terus berinovasi dengan AI, IoT, dan teknologi emerging lainnya. Komitmen kami: menjadi partner teknologi terpercaya untuk bisnis Indonesia.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Us Section -->
<section class="py-20 lg:py-32 bg-gradient-to-br from-white via-gray-50 to-white relative overflow-hidden">
    <div class="absolute top-0 right-0 w-96 h-96 bg-coral/5 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-16">
            <div class="inline-flex items-center px-6 py-3 rounded-full bg-white border-2 border-coral/30 text-coral text-sm font-black mb-6 shadow-md">
                <i class="bi bi-star-fill mr-2 text-lg"></i>
                KEUNGGULAN KAMI
            </div>
            <h2 class="text-4xl lg:text-5xl font-black text-gray-900 mb-6 leading-tight">
                Mengapa Memilih <span class="text-coral">WokilTech</span>?
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto font-medium">
                Alasan klien mempercayai kami sebagai partner teknologi mereka
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Reason 1 -->
            <div class="group bg-white rounded-3xl p-8 shadow-xl hover:shadow-2xl transition-all duration-500 hover:-translate-y-3 border-2 border-gray-100 hover:border-coral">
                <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-coral to-coral-dark flex items-center justify-center text-white text-3xl mb-6 group-hover:scale-110 transition-all duration-500 shadow-xl">
                    <i class="bi bi-lightning-charge-fill"></i>
                </div>
                <h3 class="text-2xl font-black text-gray-900 mb-4">Eksekusi Cepat</h3>
                <p class="text-base text-gray-600 leading-relaxed font-medium">
                    Metodologi Agile kami memastikan project selesai on-time tanpa mengorbankan kualitas. Fast delivery, high quality.
                </p>
            </div>

            <!-- Reason 2 -->
            <div class="group bg-white rounded-3xl p-8 shadow-xl hover:shadow-2xl transition-all duration-500 hover:-translate-y-3 border-2 border-gray-100 hover:border-coral">
                <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-coral to-coral-dark flex items-center justify-center text-white text-3xl mb-6 group-hover:scale-110 transition-all duration-500 shadow-xl">
                    <i class="bi bi-shield-fill-check"></i>
                </div>
                <h3 class="text-2xl font-black text-gray-900 mb-4">Kualitas Terjamin</h3>
                <p class="text-base text-gray-600 leading-relaxed font-medium">
                    Setiap baris code di-review, setiap fitur di-test. Kami hanya deliver produk berkualitas tinggi yang reliable.
                </p>
            </div>

            <!-- Reason 3 -->
            <div class="group bg-white rounded-3xl p-8 shadow-xl hover:shadow-2xl transition-all duration-500 hover:-translate-y-3 border-2 border-gray-100 hover:border-coral">
                <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-coral to-coral-dark flex items-center justify-center text-white text-3xl mb-6 group-hover:scale-110 transition-all duration-500 shadow-xl">
                    <i class="bi bi-headset"></i>
                </div>
                <h3 class="text-2xl font-black text-gray-900 mb-4">Support 24/7</h3>
                <p class="text-base text-gray-600 leading-relaxed font-medium">
                    Tim support kami siap membantu kapan saja. Masalah teknis? Pertanyaan urgent? Kami always available.
                </p>
            </div>

            <!-- Reason 4 -->
            <div class="group bg-white rounded-3xl p-8 shadow-xl hover:shadow-2xl transition-all duration-500 hover:-translate-y-3 border-2 border-gray-100 hover:border-coral">
                <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-coral to-coral-dark flex items-center justify-center text-white text-3xl mb-6 group-hover:scale-110 transition-all duration-500 shadow-xl">
                    <i class="bi bi-cash-coin"></i>
                </div>
                <h3 class="text-2xl font-black text-gray-900 mb-4">Harga Kompetitif</h3>
                <p class="text-base text-gray-600 leading-relaxed font-medium">
                    Value for money terbaik. Investasi teknologi Anda worth it dengan ROI yang terukur dan jelas.
                </p>
            </div>

            <!-- Reason 5 -->
            <div class="group bg-white rounded-3xl p-8 shadow-xl hover:shadow-2xl transition-all duration-500 hover:-translate-y-3 border-2 border-gray-100 hover:border-coral">
                <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-coral to-coral-dark flex items-center justify-center text-white text-3xl mb-6 group-hover:scale-110 transition-all duration-500 shadow-xl">
                    <i class="bi bi-code-square"></i>
                </div>
                <h3 class="text-2xl font-black text-gray-900 mb-4">Tech Stack Modern</h3>
                <p class="text-base text-gray-600 leading-relaxed font-medium">
                    Gunakan teknologi terkini dan best practices. Solution kami scalable, maintainable, dan future-proof.
                </p>
            </div>

            <!-- Reason 6 -->
            <div class="group bg-white rounded-3xl p-8 shadow-xl hover:shadow-2xl transition-all duration-500 hover:-translate-y-3 border-2 border-gray-100 hover:border-coral">
                <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-coral to-coral-dark flex items-center justify-center text-white text-3xl mb-6 group-hover:scale-110 transition-all duration-500 shadow-xl">
                    <i class="bi bi-graph-up-arrow"></i>
                </div>
                <h3 class="text-2xl font-black text-gray-900 mb-4">Proven Track Record</h3>
                <p class="text-base text-gray-600 leading-relaxed font-medium">
                    100+ klien puas, 150+ project sukses. Portfolio kami bicara lebih keras dari kata-kata.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="py-20 lg:py-32 bg-white relative overflow-hidden">
    <div class="absolute bottom-0 left-0 w-96 h-96 bg-coral/5 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <!-- Section Header -->
        <div class="text-center mb-20">
            <div class="inline-flex items-center px-6 py-3 rounded-full bg-white border-2 border-coral/30 text-coral text-sm font-black mb-6 shadow-md">
                <i class="bi bi-people mr-2 text-lg"></i>
                TIM KAMI
            </div>
            <h2 class="text-4xl lg:text-6xl font-black text-gray-900 mb-6 leading-tight">
                Kenalan dengan
                <br>
                <span class="text-coral">Expert di Balik WokilTech</span>
            </h2>
            <p class="text-xl lg:text-2xl text-gray-700 max-w-3xl mx-auto font-medium leading-relaxed">
                Tim profesional berdedikasi yang siap membawa bisnis Anda ke level berikutnya
            </p>
        </div>

        <!-- Team Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @forelse($team as $index => $member)
            <div class="group bg-white rounded-3xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-500 hover:-translate-y-4 border-2 border-gray-100 hover:border-coral"
                style="animation: fadeInUp 0.6s ease forwards; animation-delay: {{ $index * 0.1 }}s; opacity: 0;">

                <!-- Photo -->
                <div class="relative h-72 overflow-hidden bg-gradient-to-br from-coral/10 to-coral/5">
                    @if($member->photo)
                    <img class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700"
                        src="{{ asset('storage/' . $member->photo) }}"
                        alt="{{ $member->name }}">
                    @else
                    <div class="w-full h-full flex items-center justify-center text-gray-300">
                        <i class="bi bi-person-circle text-8xl"></i>
                    </div>
                    @endif

                    <!-- Overlay on hover -->
                    <div class="absolute inset-0 bg-gradient-to-t from-coral/90 via-coral/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                </div>

                <!-- Content -->
                <div class="p-6 text-center">
                    <h3 class="text-xl lg:text-2xl font-black text-gray-900 mb-2 group-hover:text-coral transition-colors duration-300">
                        {{ $member->name }}
                    </h3>
                    <p class="text-coral font-bold text-sm mb-4 uppercase tracking-wide">
                        {{ $member->position }}
                    </p>
                    <p class="text-gray-600 text-sm mb-6 leading-relaxed font-medium">
                        {{ $member->bio }}
                    </p>

                    <!-- Social Links -->
                    @if($member->linkedin || $member->github)
                    <div class="flex justify-center space-x-3">
                        @if($member->linkedin)
                        <a href="{{ $member->linkedin }}"
                            target="_blank"
                            class="w-10 h-10 rounded-full bg-coral/10 hover:bg-coral text-coral hover:text-white flex items-center justify-center transition-all duration-300 hover:scale-110 border-2 border-coral/30 hover:border-coral">
                            <i class="bi bi-linkedin text-lg"></i>
                        </a>
                        @endif
                        @if($member->github)
                        <a href="{{ $member->github }}"
                            target="_blank"
                            class="w-10 h-10 rounded-full bg-coral/10 hover:bg-coral text-coral hover:text-white flex items-center justify-center transition-all duration-300 hover:scale-110 border-2 border-coral/30 hover:border-coral">
                            <i class="bi bi-github text-lg"></i>
                        </a>
                        @endif
                    </div>
                    @endif
                </div>
            </div>
            @empty
            <div class="col-span-full text-center py-20 bg-gradient-to-br from-gray-50 to-gray-100 rounded-3xl border-2 border-dashed border-gray-300">
                <div class="w-24 h-24 mx-auto mb-6 rounded-full bg-gray-200 flex items-center justify-center">
                    <i class="bi bi-people text-5xl text-gray-400"></i>
                </div>
                <h3 class="text-2xl font-black text-gray-900 mb-4">Tim Segera Hadir</h3>
                <p class="text-gray-500 font-medium">Data anggota tim akan ditampilkan di sini</p>
            </div>
            @endforelse
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

    /* Dark mode grid pattern */
    .dark .bg-grid-pattern {
        background-image: linear-gradient(#ffffff08 1px, transparent 1px),
            linear-gradient(90deg, #ffffff08 1px, transparent 1px);
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

    @keyframes float {

        0%,
        100% {
            transform: translateY(0px);
        }

        50% {
            transform: translateY(-20px);
        }
    }

    .animate-float {
        animation: float 6s ease-in-out infinite;
    }

    .animate-float-delayed {
        animation: float 6s ease-in-out infinite;
        animation-delay: 3s;
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

    /* Custom Prose Styling for Dark Mode */
    .prose-coral {
        color: inherit;
    }

    .prose-coral a {
        color: #FF5757;
        text-decoration: none;
        font-weight: 600;
    }

    .prose-coral a:hover {
        color: #E63946;
    }

    .prose-coral strong {
        color: inherit;
        font-weight: 900;
    }

    .prose-coral h2,
    .prose-coral h3,
    .prose-coral h4 {
        color: inherit;
        font-weight: 900;
        margin-top: 2em;
        margin-bottom: 1em;
    }

    .prose-coral ul,
    .prose-coral ol {
        margin: 1.5em 0;
    }

    .prose-coral li {
        margin: 0.5em 0;
    }
</style>

@endsection