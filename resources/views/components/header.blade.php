{{-- resources/views/components/layouts/header.blade.php --}}
<header class="bg-white shadow-md z-10">
    <div class="flex items-center justify-between px-4 md:px-6 py-4">
        <!-- Left Section -->
        <div class="flex items-center space-x-4">
            <!-- Hamburger Button (Mobile) -->
            <button @click="toggleSidebar()"
                class="md:hidden text-gray-600 hover:text-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 rounded-lg p-2">
                <i class="fas fa-bars text-xl"></i>
            </button>

            <!-- Page Title -->
            <div>
                <h1 class="text-xl md:text-2xl font-bold text-gray-800">
                    {{ $title ?? 'Dashboard' }}
                </h1>
                <!-- Breadcrumb (Desktop) -->
                <div class="hidden md:flex items-center space-x-2 text-sm text-gray-500 mt-1">
                    <i class="fas fa-home text-xs"></i>
                    <span>Home</span>
                    <i class="fas fa-chevron-right text-xs"></i>
                    <span class="text-purple-600 font-medium">{{ $title ?? 'Dashboard' }}</span>
                </div>
            </div>
        </div>

        <!-- Right Section -->
        <div class="flex items-center space-x-4">
            <!-- Notification Bell -->
            <div class="relative">
                <button
                    class="text-gray-600 hover:text-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 rounded-lg p-2 relative">
                    <i class="fas fa-bell text-xl"></i>
                    <span class="absolute top-1 right-1 block h-2 w-2 rounded-full bg-red-500 ring-2 ring-white"></span>
                </button>
            </div>

            <!-- User Dropdown -->
            <div class="relative" x-data="{ open: false }">
                <button @click="open = !open"
                    class="flex items-center space-x-2 text-gray-700 hover:text-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 rounded-lg px-3 py-2 transition">
                    <div
                        class="h-9 w-9 rounded-full bg-gradient-to-br from-purple-500 to-purple-700 flex items-center justify-center text-white font-bold shadow-md">
                        A
                    </div>
                    <span class="hidden md:block font-medium">Admin</span>
                    <i class="fas fa-chevron-down text-sm" :class="open ? 'rotate-180' : ''"
                        style="transition: transform 0.2s;"></i>
                </button>

                <!-- Dropdown Menu -->
                <div x-show="open" @click.away="open = false" x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-150"
                    x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                    class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-xl border border-gray-200 py-2 z-50"
                    x-cloak>
                    <a href="#profile"
                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-purple-50 hover:text-purple-700 transition">
                        <i class="fas fa-user-circle mr-2"></i>
                        Profil Saya
                    </a>
                    <a href="#settings"
                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-purple-50 hover:text-purple-700 transition">
                        <i class="fas fa-cog mr-2"></i>
                        Pengaturan
                    </a>
                    <hr class="my-2">
                    <a href="#logout" class="block px-4 py-2 text-sm text-red-600 hover:bg-red-50 transition">
                        <i class="fas fa-sign-out-alt mr-2"></i>
                        Keluar
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>
