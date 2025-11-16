<div class="min-h-screen bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 flex items-center justify-center p-4">
    <!-- Login Container -->
    <div class="w-full max-w-md">
        <!-- Card -->
        <div class="bg-white rounded-2xl shadow-2xl overflow-hidden">
            <!-- Header with Gradient -->
            <div class="bg-gradient-to-r from-blue-600 to-indigo-600 p-8 text-white">
                <div class="flex items-center justify-center mb-4">
                    <div class="bg-white/20 backdrop-blur-sm p-3 rounded-xl">
                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                </div>
                <h1 class="text-2xl font-bold text-center">Portal Kampus</h1>
                <p class="text-blue-100 text-center mt-2 text-sm">Sistem Monitoring Dana & LPJ</p>
            </div>

            <!-- Form Section -->
            <div class="p-8">
                <div class="mb-6">
                    <h2 class="text-2xl font-bold text-gray-800">Selamat Datang</h2>
                    <p class="text-gray-500 text-sm mt-1">Silakan login untuk melanjutkan</p>
                </div>

                <form wire:submit.prevent="login" class="space-y-5">
                    <!-- Email/Username Input -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                            Email atau Username
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <input type="text" id="email" wire:model="email"
                                class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 outline-none @error('email') border-red-500 @enderror"
                                placeholder="Masukkan email atau username">
                        </div>
                        @error('email')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password Input -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                            Password
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </div>
                            <input type="password" id="password" wire:model="password"
                                class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 outline-none @error('password') border-red-500 @enderror"
                                placeholder="Masukkan password">
                        </div>
                        @error('password')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Remember & Forgot -->
                    <div class="flex items-center justify-between text-sm">
                        <label class="flex items-center cursor-pointer">
                            <input type="checkbox" wire:model="remember"
                                class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            <span class="ml-2 text-gray-600">Ingat saya</span>
                        </label>
                        <a href="#" class="text-blue-600 hover:text-blue-700 font-medium">Lupa password?</a>
                    </div>

                    <!-- Login Button -->
                    <button type="submit"
                        class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 text-white py-3 rounded-lg font-semibold hover:from-blue-700 hover:to-indigo-700 focus:outline-none focus:ring-4 focus:ring-blue-300 transition duration-200 transform hover:scale-[1.02] active:scale-[0.98] disabled:opacity-50 disabled:cursor-not-allowed"
                        wire:loading.attr="disabled">
                        <span wire:loading.remove>Masuk</span>
                        <span wire:loading>
                            <svg class="inline w-5 h-5 mr-2 text-white animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            Memproses...
                        </span>
                    </button>
                </form>
            </div>
        </div>

        <!-- Footer Info -->
        <p class="text-center text-sm text-gray-500 mt-6">
            © 2024 Sistem Monitoring Dana & LPJ. All rights reserved.
        </p>
    </div>
</div>