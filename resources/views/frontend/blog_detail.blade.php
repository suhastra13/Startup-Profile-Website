@extends('frontend.layouts.app')

@section('title', $post->title . ' - Blog WokilTech')
@section('meta_description', $post->excerpt)

@section('content')

<!-- Reading Progress Bar -->
<div id="progress-bar" class="fixed top-0 left-0 h-1 bg-gradient-to-r from-coral to-coral-dark z-50 w-0 transition-all duration-200 shadow-lg"></div>

<!-- Article Header -->
<section class="relative bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 pt-32 pb-20 overflow-hidden">
    <!-- Animated Background -->
    <div class="absolute inset-0 pointer-events-none opacity-20">
        <div class="absolute top-20 left-10 w-72 h-72 bg-coral rounded-full blur-3xl animate-float"></div>
        <div class="absolute bottom-20 right-10 w-96 h-96 bg-coral rounded-full blur-3xl animate-float-delayed"></div>
        <div class="absolute inset-0 bg-grid-pattern opacity-[0.05]"></div>
    </div>

    <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 z-10">
        <!-- Breadcrumb -->
        <nav class="flex items-center mb-8 text-sm text-gray-400 font-medium">
            <a href="{{ route('home') }}" class="hover:text-coral transition-colors">
                <i class="bi bi-house-door-fill mr-1"></i>
                Home
            </a>
            <i class="bi bi-chevron-right mx-2 text-xs"></i>
            <a href="{{ route('blog') }}" class="hover:text-coral transition-colors">Blog</a>
            <i class="bi bi-chevron-right mx-2 text-xs"></i>
            <span class="text-gray-500 truncate max-w-xs">{{ Str::limit($post->title, 30) }}</span>
        </nav>

        <!-- Category Badge -->
        <div class="mb-6">
            <span class="inline-flex items-center px-4 py-2 rounded-xl bg-white/10 border border-white/20 text-white text-xs font-black backdrop-blur-sm">
                <i class="bi bi-tag-fill mr-2 text-coral"></i>
                {{ $post->category }}
            </span>
        </div>

        <!-- Title -->
        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black text-white leading-tight mb-8">
            {{ $post->title }}
        </h1>

        <!-- Meta Info -->
        <div class="flex flex-wrap items-center gap-4 text-sm text-gray-300 font-medium">
            <div class="flex items-center">
                <div class="w-10 h-10 rounded-xl bg-coral/20 flex items-center justify-center text-coral font-black text-base mr-3">
                    {{ substr($post->author->name ?? 'A', 0, 1) }}
                </div>
                <div>
                    <p class="font-bold text-white">{{ $post->author->name ?? 'Admin' }}</p>
                    <p class="text-xs text-gray-400">Author</p>
                </div>
            </div>
            <span class="hidden sm:block text-gray-600">•</span>
            <div class="flex items-center">
                <i class="bi bi-calendar3 mr-2 text-coral"></i>
                {{ $post->created_at->format('d M Y') }}
            </div>
            <span class="hidden sm:block text-gray-600">•</span>
            <div class="flex items-center">
                <i class="bi bi-eye-fill mr-2 text-coral"></i>
                {{ $post->views ?? 0 }} views
            </div>
            <span class="hidden sm:block text-gray-600">•</span>
            <div class="flex items-center">
                <i class="bi bi-clock-fill mr-2 text-coral"></i>
                {{ ceil(str_word_count(strip_tags($post->content)) / 200) }} min read
            </div>
        </div>
    </div>
</section>

<!-- Featured Image -->
@if($post->featured_image)
<section class="relative -mt-16 z-10">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="rounded-3xl overflow-hidden shadow-2xl border-4 border-white">
            <img src="{{ asset('storage/' . $post->featured_image) }}"
                alt="{{ $post->title }}"
                class="w-full h-96 md:h-[32rem] object-cover">
        </div>
    </div>
</section>
@endif

<!-- Article Content -->
<section class="py-16 bg-gradient-to-br from-white via-gray-50 to-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <article class="bg-white rounded-3xl shadow-xl border-2 border-gray-100 p-8 md:p-12 lg:p-16">
            <!-- Article Body -->
            <div class="prose prose-lg max-w-none">
                <style>
                    .prose {
                        color: #374151;
                        line-height: 1.8;
                    }

                    .prose h1,
                    .prose h2,
                    .prose h3,
                    .prose h4,
                    .prose h5,
                    .prose h6 {
                        color: #1A1F36;
                        font-weight: 800;
                        margin-top: 2em;
                        margin-bottom: 0.75em;
                        line-height: 1.3;
                    }

                    .prose h2 {
                        font-size: 1.875rem;
                        border-bottom: 3px solid #FF6B6B;
                        padding-bottom: 0.5rem;
                        margin-top: 2.5em;
                    }

                    .prose h3 {
                        font-size: 1.5rem;
                        color: #FF6B6B;
                    }

                    .prose p {
                        margin-bottom: 1.5em;
                    }

                    .prose a {
                        color: #FF6B6B;
                        text-decoration: none;
                        font-weight: 600;
                        transition: color 0.2s;
                    }

                    .prose a:hover {
                        color: #EE5A5A;
                        text-decoration: underline;
                    }

                    .prose strong {
                        color: #1A1F36;
                        font-weight: 700;
                    }

                    .prose ul,
                    .prose ol {
                        margin-top: 1.5em;
                        margin-bottom: 1.5em;
                        padding-left: 1.5em;
                    }

                    .prose li {
                        margin-bottom: 0.5em;
                    }

                    .prose blockquote {
                        border-left: 4px solid #FF6B6B;
                        padding-left: 1.5em;
                        font-style: italic;
                        color: #4B5563;
                        background: #FFF5F5;
                        padding: 1.5em;
                        border-radius: 0.75rem;
                        margin: 2em 0;
                    }

                    .prose code {
                        background: #F3F4F6;
                        padding: 0.2em 0.5em;
                        border-radius: 0.375rem;
                        font-size: 0.9em;
                        color: #FF6B6B;
                        font-weight: 600;
                    }

                    .prose pre {
                        background: #1F2937;
                        color: #F9FAFB;
                        padding: 1.5em;
                        border-radius: 1rem;
                        overflow-x: auto;
                        margin: 2em 0;
                    }

                    .prose pre code {
                        background: none;
                        color: inherit;
                        padding: 0;
                    }

                    .prose img {
                        border-radius: 1rem;
                        margin: 2em 0;
                        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
                    }

                    .prose table {
                        border-collapse: collapse;
                        width: 100%;
                        margin: 2em 0;
                    }

                    .prose th {
                        background: #FF6B6B;
                        color: white;
                        font-weight: 700;
                        padding: 0.75em;
                        text-align: left;
                    }

                    .prose td {
                        border: 1px solid #E5E7EB;
                        padding: 0.75em;
                    }

                    .prose tr:nth-child(even) {
                        background: #F9FAFB;
                    }
                </style>
                {!! $post->content !!}
            </div>

            <!-- Tags & Share Section -->
            <div class="mt-12 pt-8 border-t-2 border-gray-100">
                <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-6">
                    <!-- Tags -->
                    <div class="flex flex-wrap gap-2">
                        @if($post->tags)
                        @foreach(explode(',', $post->tags) as $tag)
                        <span class="px-4 py-2 bg-gray-100 text-gray-700 rounded-xl text-sm font-bold hover:bg-coral hover:text-white transition-all duration-300 cursor-pointer">
                            #{{ trim($tag) }}
                        </span>
                        @endforeach
                        @else
                        <span class="text-gray-400 italic text-sm">No tags</span>
                        @endif
                    </div>

                    <!-- Share Buttons -->
                    <div class="flex items-center gap-3 flex-shrink-0">
                        <span class="text-sm font-black text-gray-900">Bagikan:</span>

                        <a href="https://wa.me/?text={{ urlencode($post->title . ' ' . route('blog.show', $post->slug)) }}"
                            target="_blank"
                            class="group w-10 h-10 rounded-xl bg-green-500 text-white flex items-center justify-center hover:bg-green-600 hover:scale-110 transition-all duration-300 shadow-lg hover:shadow-xl"
                            title="Share on WhatsApp">
                            <i class="bi bi-whatsapp text-lg"></i>
                        </a>

                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('blog.show', $post->slug)) }}"
                            target="_blank"
                            class="group w-10 h-10 rounded-xl bg-blue-600 text-white flex items-center justify-center hover:bg-blue-700 hover:scale-110 transition-all duration-300 shadow-lg hover:shadow-xl"
                            title="Share on Facebook">
                            <i class="bi bi-facebook text-lg"></i>
                        </a>

                        <a href="https://twitter.com/intent/tweet?text={{ urlencode($post->title) }}&url={{ urlencode(route('blog.show', $post->slug)) }}"
                            target="_blank"
                            class="group w-10 h-10 rounded-xl bg-black text-white flex items-center justify-center hover:bg-gray-800 hover:scale-110 transition-all duration-300 shadow-lg hover:shadow-xl"
                            title="Share on X">
                            <i class="bi bi-twitter-x text-lg"></i>
                        </a>

                        <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(route('blog.show', $post->slug)) }}"
                            target="_blank"
                            class="group w-10 h-10 rounded-xl bg-blue-700 text-white flex items-center justify-center hover:bg-blue-800 hover:scale-110 transition-all duration-300 shadow-lg hover:shadow-xl"
                            title="Share on LinkedIn">
                            <i class="bi bi-linkedin text-lg"></i>
                        </a>
                    </div>
                </div>
            </div>
        </article>

        <!-- Back to Blog Button -->
        <div class="mt-12 flex justify-center">
            <a href="{{ route('blog') }}"
                class="group inline-flex items-center px-8 py-4 bg-gradient-to-r from-coral to-coral-dark text-white font-black text-base rounded-xl shadow-xl hover:shadow-coral/50 transition-all duration-300 hover:scale-105">
                <i class="bi bi-arrow-left mr-3 text-lg group-hover:-translate-x-1 transition-transform duration-300"></i>
                Kembali ke Blog
            </a>
        </div>
    </div>
</section>

<!-- Related Posts or CTA Section (Optional) -->
<section class="relative py-24 bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 overflow-hidden">
    <!-- Animated Background -->
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-coral/20 rounded-full blur-3xl animate-float"></div>
        <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-coral/20 rounded-full blur-3xl animate-float-delayed"></div>
    </div>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
        <div class="inline-flex items-center px-6 py-3 rounded-full bg-white/10 border border-white/20 text-white text-sm font-black mb-8 backdrop-blur-sm">
            <i class="bi bi-chat-dots-fill mr-2 text-coral"></i>
            BUTUH BANTUAN?
        </div>

        <h2 class="text-4xl lg:text-5xl font-black text-white mb-6 leading-tight">
            Punya Pertanyaan atau
            <br>
            <span class="text-coral">Butuh Konsultasi?</span>
        </h2>

        <p class="text-xl text-gray-200 leading-relaxed font-medium mb-10 max-w-2xl mx-auto">
            Tim kami siap membantu mewujudkan project digital impian Anda
        </p>

        <a href="{{ route('contact') }}"
            class="group inline-flex items-center justify-center px-12 py-6 bg-gradient-to-r from-coral to-coral-dark text-white font-black text-lg rounded-2xl transition-all duration-300 hover:scale-105 hover:-translate-y-1 shadow-2xl hover:shadow-coral/50">
            Hubungi Kami
            <svg class="w-6 h-6 ml-3 group-hover:translate-x-2 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6" />
            </svg>
        </a>
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
    @keyframes float {

        0%,
        100% {
            transform: translateY(0px);
        }

        50% {
            transform: translateY(-30px);
        }
    }

    .animate-float {
        animation: float 8s ease-in-out infinite;
    }

    .animate-float-delayed {
        animation: float 8s ease-in-out infinite;
        animation-delay: 4s;
    }

    /* Smooth scroll for anchor links */
    html {
        scroll-behavior: smooth;
    }
</style>
@endpush

@push('scripts')
<script>
    // Reading Progress Bar
    window.addEventListener('scroll', function() {
        let winScroll = document.body.scrollTop || document.documentElement.scrollTop;
        let height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
        let scrolled = (winScroll / height) * 100;
        document.getElementById("progress-bar").style.width = scrolled + "%";
    });

    // Smooth scroll to top on page load
    window.scrollTo({
        top: 0,
        behavior: 'instant'
    });

    console.log('Blog detail page loaded');
</script>
@endpush