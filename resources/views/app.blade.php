<!DOCTYPE html>
<html lang="id" x-data="{
    activeNav: 'dashboard',
    sidebarOpen: window.innerWidth >= 768,
    dropdownOpen: false,
    toggleSidebar() {
        this.sidebarOpen = !this.sidebarOpen;
    },
    setActive(nav) {
        this.activeNav = nav;
        if (window.innerWidth < 768) {
            this.sidebarOpen = false;
        }
    },
    isActive(nav) {
        return this.activeNav === nav;
    },
    getPageTitle() {
        const titles = {
            'dashboard': 'Dashboard',
            'proposal': 'Pengajuan Proposal',
            'pelaksanaan': 'Pelaksanaan Kegiatan',
            'lpj': 'Penyetoran LPJ',
            'laporan': 'Laporan & Rekap',
            'master': 'Master Data'
        };
        return titles[this.activeNav] || 'Dashboard';
    }
}" x-init="() => {
    // Set active nav based on current page
    const path = window.location.pathname;
    if (path.includes('proposal')) activeNav = 'proposal';
    else if (path.includes('pelaksanaan')) activeNav = 'pelaksanaan';
    else if (path.includes('lpj')) activeNav = 'lpj';
    else if (path.includes('laporan')) activeNav = 'laporan';
    else if (path.includes('master')) activeNav = 'master';
    else activeNav = 'dashboard';
}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMPEL - Sistem Monitoring Pengeluaran Dana dan Penyetoran LPJ</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
        }

        .sidebar {
            transition: all 0.3s ease;
        }

        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.active {
                transform: translateX(0);
            }
        }

        .card-hover {
            transition: all 0.3s ease;
        }

        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .nav-active {
            background: linear-gradient(135deg, rgb(126, 34, 206) 0%, rgb(147, 51, 234) 100%);
            font-weight: 600;
        }

        .nav-inactive {
            background-color: transparent;
        }

        .nav-inactive:hover {
            background-color: rgba(147, 51, 234, 0.2);
        }

        .badge {
            animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: .7;
            }
        }

        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body class="bg-gray-50">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
            class="sidebar bg-gradient-to-b from-purple-900 to-purple-800 text-white w-64 fixed inset-y-0 left-0 transform md:relative md:translate-x-0 z-30 transition-all duration-300 shadow-2xl">

            <!-- Logo -->
            <div class="flex items-center justify-between px-6 py-5 border-b border-purple-700">
                <div class="flex items-center space-x-3">
                    <div class="bg-white p-2 rounded-lg">
                        <i class="fas fa-chart-line text-purple-800 text-xl"></i>
                    </div>
                    <div>
                        <h1 class="text-xl font-extrabold tracking-wide">SIMPEL</h1>
                        <p class="text-xs text-purple-300">Monitoring Dana & LPJ</p>
                    </div>
                </div>
            </div>

            <!-- Navigation Menu -->
            <nav class="px-4 py-6 space-y-2 overflow-y-auto h-[calc(100vh-120px)]">
                <a href="/dashboard" wire:navigate @click.prevent="setActive('dashboard')"
                    :class="isActive('dashboard') ? 'nav-active' : 'nav-inactive'"
                    class="flex items-center py-3 px-4 rounded-lg transition duration-200 group">
                    <i class="fas fa-home w-5 mr-3"></i>
                    <span>Dashboard</span>
                </a>

                <a href="/pengajuan-proposal" wire:navigate @click.prevent="setActive('proposal')"
                    :class="isActive('proposal') ? 'nav-active' : 'nav-inactive'"
                    class="flex items-center py-3 px-4 rounded-lg transition duration-200 group">
                    <i class="fas fa-file-alt w-5 mr-3"></i>
                    <span>Pengajuan Proposal</span>
                </a>

                <a href="/pelaksanaan-kegiatan" wire:navigate @click.prevent="setActive('pelaksanaan')"
                    :class="isActive('pelaksanaan') ? 'nav-active' : 'nav-inactive'"
                    class="flex items-center py-3 px-4 rounded-lg transition duration-200 group relative">
                    <i class="fas fa-calendar-check w-5 mr-3"></i>
                    <span>Pelaksanaan Kegiatan</span>
                    <!-- Badge untuk kegiatan mendekati tenggat -->
                    <span
                        class="ml-auto bg-yellow-400 text-yellow-900 text-xs font-bold px-2 py-1 rounded-full badge">3</span>
                </a>

                <a href="/penyetoran-lpj" wire:navigate @click.prevent="setActive('lpj')"
                    :class="isActive('lpj') ? 'nav-active' : 'nav-inactive'"
                    class="flex items-center py-3 px-4 rounded-lg transition duration-200 group relative">
                    <i class="fas fa-check-circle w-5 mr-3"></i>
                    <span>Penyetoran LPJ</span>
                    <!-- Badge untuk LPJ terlambat -->
                    <span class="ml-auto bg-red-500 text-white text-xs font-bold px-2 py-1 rounded-full badge">5</span>
                </a>

                <a href="/laporan-rekap" wire:navigate @click.prevent="setActive('laporan')"
                    :class="isActive('laporan') ? 'nav-active' : 'nav-inactive'"
                    class="flex items-center py-3 px-4 rounded-lg transition duration-200 group">
                    <i class="fas fa-chart-bar w-5 mr-3"></i>
                    <span>Laporan & Rekap</span>
                </a>

                <!-- Divider -->
                <div class="border-t border-purple-700 my-4"></div>

                <a href="/master-data"  wire:navigate @click.prevent="setActive('master')"
                    :class="isActive('master') ? 'nav-active' : 'nav-inactive'"
                    class="flex items-center py-3 px-4 rounded-lg transition duration-200 group">
                    <i class="fas fa-database w-5 mr-3"></i>
                    <span>Master Data</span>
                </a>
            </nav>

            <!-- User Info (Bottom Sidebar) -->
            <div class="absolute bottom-0 left-0 right-0 p-4 border-t border-purple-700 bg-purple-900">
                <div class="flex items-center space-x-3">
                    <div
                        class="h-10 w-10 rounded-full bg-purple-500 flex items-center justify-center text-white font-bold">
                        A
                    </div>
                    <div class="flex-1">
                        <p class="text-sm font-semibold">Admin User</p>
                        <p class="text-xs text-purple-300">admin@simpel.ac.id</p>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Overlay for mobile -->
        <div x-show="sidebarOpen" @click="sidebarOpen = false"
            x-transition:enter="transition-opacity ease-linear duration-300" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-linear duration-300"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            class="fixed inset-0 bg-black bg-opacity-50 z-20 md:hidden" x-cloak></div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Header / Top Navbar -->
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
                            <h1 class="text-xl md:text-2xl font-bold text-gray-800" x-text="getPageTitle()"></h1>
                            <!-- Breadcrumb (Desktop) -->
                            <div class="hidden md:flex items-center space-x-2 text-sm text-gray-500 mt-1">
                                <i class="fas fa-home text-xs"></i>
                                <span>Home</span>
                                <i class="fas fa-chevron-right text-xs"></i>
                                <span x-text="getPageTitle()" class="text-purple-600 font-medium"></span>
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
                                <span
                                    class="absolute top-1 right-1 block h-2 w-2 rounded-full bg-red-500 ring-2 ring-white"></span>
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
                            <div x-show="open" @click.away="open = false"
                                x-transition:enter="transition ease-out duration-200"
                                x-transition:enter-start="opacity-0 scale-95"
                                x-transition:enter-end="opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-150"
                                x-transition:leave-start="opacity-100 scale-100"
                                x-transition:leave-end="opacity-0 scale-95"
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
                                <a href="#logout"
                                    class="block px-4 py-2 text-sm text-red-600 hover:bg-red-50 transition">
                                    <i class="fas fa-sign-out-alt mr-2"></i>
                                    Keluar
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Main Content Area -->
            <main class="flex-1 overflow-y-auto bg-gray-50 p-4 md:p-6">
                @yield('content')
            </main>

            <!-- Footer -->
            <footer class="bg-white border-t border-gray-200 px-6 py-4">
                <div class="flex flex-col md:flex-row items-center justify-between text-sm text-gray-600">
                    <p>© 2025 <span class="font-semibold text-purple-700">SIMPEL</span> - Sistem Monitoring Pengeluaran
                        Dana dan Penyetoran LPJ</p>
                    <p class="mt-2 md:mt-0">Dikembangkan oleh Tim IT Kampus</p>
                </div>
            </footer>
        </div>
    </div>

    <script>
        // Handle responsive sidebar
        window.addEventListener('resize', function() {
            const width = window.innerWidth;
            if (width >= 768) {
                Alpine.store('sidebar', {
                    open: true
                });
            }
        });
    </script>
</body>

</html>
