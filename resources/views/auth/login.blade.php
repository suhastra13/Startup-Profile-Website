<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 py-12 px-4 sm:px-6 lg:px-8 relative overflow-hidden">

        <!-- Animated Background -->
        <div class="absolute inset-0 pointer-events-none opacity-20">
            <div class="absolute top-20 left-10 w-72 h-72 bg-coral rounded-full blur-3xl animate-float"></div>
            <div class="absolute bottom-20 right-10 w-96 h-96 bg-coral rounded-full blur-3xl animate-float-delayed"></div>
            <div class="absolute inset-0 bg-grid-pattern opacity-[0.05]"></div>
        </div>

        <div class="max-w-md w-full relative z-10">
            <!-- Logo & Title -->
            <div class="text-center mb-8">
                <a href="{{ route('home') }}" class="inline-block">
                    <h2 class="text-4xl font-black">
                        <span class="bg-gradient-to-r from-coral to-coral-dark bg-clip-text text-transparent">Wokil</span><span class="text-white">Tech</span>
                    </h2>
                </a>
                <h3 class="mt-6 text-3xl font-black text-white">
                    Selamat Datang Kembali!
                </h3>
                <p class="mt-2 text-sm text-gray-400 font-medium">
                    Login ke dashboard admin Anda
                </p>
            </div>

            <!-- Login Card -->
            <div class="bg-white rounded-3xl shadow-2xl border-2 border-gray-100 p-8 lg:p-10">

                <!-- Session Status -->
                @if (session('status'))
                <div class="mb-6 bg-gradient-to-r from-green-50 to-emerald-50 border-2 border-green-400 rounded-xl p-4">
                    <div class="flex items-center">
                        <i class="bi bi-check-circle-fill text-green-500 text-xl mr-3"></i>
                        <p class="text-green-700 font-medium text-sm">{{ session('status') }}</p>
                    </div>
                </div>
                @endif

                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <label for="email" class="block text-sm font-black text-gray-900 mb-2 uppercase tracking-wider">
                            Email <span class="text-coral">*</span>
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="bi bi-envelope-fill text-gray-400"></i>
                            </div>
                            <input id="email"
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                required
                                autofocus
                                autocomplete="username"
                                class="w-full pl-12 pr-4 py-4 text-gray-900 font-medium border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-coral focus:border-coral transition-all duration-300 hover:border-gray-300 @error('email') border-red-500 @enderror"
                                placeholder="admin@wokiltech.com">
                        </div>
                        @error('email')
                        <p class="mt-2 text-sm text-red-600 font-medium flex items-center">
                            <i class="bi bi-exclamation-circle-fill mr-1"></i>
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-sm font-black text-gray-900 mb-2 uppercase tracking-wider">
                            Password <span class="text-coral">*</span>
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="bi bi-lock-fill text-gray-400"></i>
                            </div>
                            <input id="password"
                                type="password"
                                name="password"
                                required
                                autocomplete="current-password"
                                class="w-full pl-12 pr-12 py-4 text-gray-900 font-medium border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-coral focus:border-coral transition-all duration-300 hover:border-gray-300 @error('password') border-red-500 @enderror"
                                placeholder="••••••••">
                            <button type="button"
                                onclick="togglePassword()"
                                class="absolute inset-y-0 right-0 pr-4 flex items-center text-gray-400 hover:text-coral transition-colors">
                                <i id="password-icon" class="bi bi-eye-fill"></i>
                            </button>
                        </div>
                        @error('password')
                        <p class="mt-2 text-sm text-red-600 font-medium flex items-center">
                            <i class="bi bi-exclamation-circle-fill mr-1"></i>
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center">
                        <label for="remember_me" class="inline-flex items-center cursor-pointer group">
                            <input id="remember_me"
                                type="checkbox"
                                name="remember"
                                class="w-5 h-5 rounded-lg border-2 border-gray-300 text-coral focus:ring-2 focus:ring-coral focus:ring-offset-2 transition-all duration-300 cursor-pointer">
                            <span class="ml-2 text-sm text-gray-700 font-bold group-hover:text-coral transition-colors">
                                Ingat Saya
                            </span>
                        </label>
                    </div>

                    <!-- Submit Button -->
                    <div>
                        <button type="submit"
                            class="group w-full flex items-center justify-center py-4 px-6 bg-gradient-to-r from-coral to-coral-dark text-white font-black text-base rounded-xl shadow-xl hover:shadow-coral/50 transition-all duration-300 hover:scale-105 hover:-translate-y-1">
                            <i class="bi bi-box-arrow-in-right mr-3 text-xl"></i>
                            Masuk Dashboard
                            <svg class="w-5 h-5 ml-3 group-hover:translate-x-2 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                            </svg>
                        </button>
                    </div>

                    <!-- Divider -->
                    <div class="relative my-6">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t-2 border-gray-200"></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="px-4 bg-white text-gray-500 font-bold">atau</span>
                        </div>
                    </div>

                    <!-- Back to Homepage -->
                    <div class="text-center">
                        <a href="{{ route('home') }}"
                            class="inline-flex items-center text-gray-600 font-bold hover:text-coral transition-colors">
                            <i class="bi bi-arrow-left mr-2"></i>
                            Kembali ke Beranda
                        </a>
                    </div>
                </form>
            </div>

            <!-- Footer Note -->
            <p class="mt-8 text-center text-sm text-gray-400 font-medium">
                <i class="bi bi-shield-check mr-1 text-coral"></i>
                Login Anda dilindungi dengan enkripsi end-to-end
            </p>
        </div>
    </div>

    <!-- Custom Styles & Scripts -->
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

        /* Coral Color Variables */
        :root {
            --coral: #FF6B6B;
            --coral-dark: #EE5A5A;
        }

        /* Custom Checkbox Styling */
        input[type="checkbox"]:checked {
            background-color: var(--coral);
            border-color: var(--coral);
        }
    </style>

    <script>
        // Toggle Password Visibility
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const passwordIcon = document.getElementById('password-icon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                passwordIcon.classList.remove('bi-eye-fill');
                passwordIcon.classList.add('bi-eye-slash-fill');
            } else {
                passwordInput.type = 'password';
                passwordIcon.classList.remove('bi-eye-slash-fill');
                passwordIcon.classList.add('bi-eye-fill');
            }
        }

        // Form Submit Loading State
        document.querySelector('form').addEventListener('submit', function(e) {
            const button = this.querySelector('button[type="submit"]');
            button.innerHTML = '<i class="bi bi-hourglass-split mr-2 animate-spin"></i>Sedang Masuk...';
            button.disabled = true;
        });
    </script>
</x-guest-layout>