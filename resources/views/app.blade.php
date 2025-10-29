<!DOCTYPE html>
<html lang="id" x-data="{ 
    activeNav: 'dashboard',
    sidebarOpen: window.innerWidth >= 768,
    toggleSidebar() {
        this.sidebarOpen = !this.sidebarOpen;
    },
    setActive(nav) {
        this.activeNav = nav;
    },
    isActive(nav) {
        return this.activeNav === nav;
    }
}" x-init="() => {
    // Set active nav based on current page
    const path = window.location.pathname;
    if (path.includes('proposal')) activeNav = 'proposal';
    else if (path.includes('lpj')) activeNav = 'lpj';
    else if (path.includes('kegiatan')) activeNav = 'kegiatan';
    else if (path.includes('laporan')) activeNav = 'laporan';
    else if (path.includes('pengaturan')) activeNav = 'pengaturan';
    else activeNav = 'dashboard';
}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Sistem Monitoring Kegiatan Ormawa</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
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
            background-color: rgb(126, 34, 206);
        }
        
        .nav-inactive {
            background-color: transparent;
        }
        
        .nav-inactive:hover {
            background-color: rgb(107, 33, 168);
        }
    </style>
</head>

<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'" 
             class="sidebar bg-purple-800 text-white w-64 space-y-6 py-7 px-2 absolute inset-y-0 left-0 transform md:relative md:translate-x-0 z-20 transition-all duration-300">
            <!-- Logo -->
            <div class="text-white flex items-center space-x-2 px-4">
                <i class="fas fa-chart-line text-2xl"></i>
                <span class="text-2xl font-extrabold">SIMPEL</span>
            </div>

            <!-- Navigation -->
            <nav>
                <a href="/dashboard" 
                   @click="setActive('dashboard')"
                   :class="isActive('dashboard') ? 'nav-active' : 'nav-inactive'"
                   class="block py-2.5 px-4 rounded transition duration-200 hover:text-white">
                    <i class="fas fa-home mr-2"></i>Dashboard
                </a>
                <a href="/proposal" 
                   @click="setActive('proposal')"
                   :class="isActive('proposal') ? 'nav-active' : 'nav-inactive'"
                   class="block py-2.5 px-4 rounded transition duration-200 hover:text-white">
                    <i class="fas fa-file-alt mr-2"></i>Proposal
                </a>
                <a href="/kegiatan" 
                   @click="setActive('kegiatan')"
                   :class="isActive('kegiatan') ? 'nav-active' : 'nav-inactive'"
                   class="block py-2.5 px-4 rounded transition duration-200 hover:text-white">
                    <i class="fas fa-calendar-alt mr-2"></i>Kegiatan
                </a>
                <a href="/penyetoran-lpj" 
                   @click="setActive('lpj')"
                   :class="isActive('lpj') ? 'nav-active' : 'nav-inactive'"
                   class="block py-2.5 px-4 rounded transition duration-200 hover:text-white">
                    <i class="fas fa-tasks mr-2"></i>Penyetoran LPJ
                </a>
                <a href="/laporan-rekap" 
                   @click="setActive('laporan-rekap')"
                   :class="isActive('laporan') ? 'nav-active' : 'nav-inactive'"
                   class="block py-2.5 px-4 rounded transition duration-200 hover:text-white">
                    <i class="fas fa-chart-bar mr-2"></i>Laporan & Rekap
                </a>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Header -->
            <header class="flex items-center justify-between p-4 bg-white shadow-md z-10">
                <div class="flex items-center">
                    <button @click="toggleSidebar()" class="md:hidden text-gray-500 focus:outline-none">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                    <h1 class="text-xl font-bold text-gray-800 ml-4" x-text="activeNav.charAt(0).toUpperCase() + activeNav.slice(1)"></h1>
                </div>

                <div class="flex items-center space-x-4">
                    <!-- Navigation Indicator -->
                    <div class="hidden md:flex items-center space-x-1 text-sm text-gray-600">
                        <span>Home</span>
                        <i class="fas fa-chevron-right text-xs"></i>
                        <span x-text="activeNav.charAt(0).toUpperCase() + activeNav.slice(1)" class="text-purple-600 font-medium"></span>
                    </div>
                    
                    <div class="relative">
                        <button class="text-gray-500 focus:outline-none">
                            <i class="fas fa-bell text-xl"></i>
                        </button>
                        <span class="absolute top-0 right-0 block h-2 w-2 rounded-full bg-red-500"></span>
                    </div>
                    <div class="relative">
                        <button class="flex items-center text-gray-700 focus:outline-none">
                            <div class="h-8 w-8 rounded-full bg-purple-500 flex items-center justify-center text-white font-bold">
                                A
                            </div>
                            <span class="ml-2">Admin</span>
                            <i class="fas fa-chevron-down ml-1 text-sm"></i>
                        </button>
                    </div>
                </div>
            </header>

            <!-- Main Content Area -->
            <main class="flex-1 overflow-y-auto p-4 md:p-6">
                @yield('content')
            </main>

            <!-- Footer -->
            <footer class="bg-white p-4 border-t text-center text-gray-500 text-sm">
                <p>© 2025 Sistem Monitoring Pengeluaran Dana dan Penyetoran LPJ (SIMPEL)</p>
            </footer>
        </div>
    </div>

    <script>
        // Inisialisasi Chart.js
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('activityChart');
            if (ctx) {
                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Des'],
                        datasets: [{
                            label: 'Jumlah Kegiatan',
                            data: [12, 19, 15, 17, 22, 18, 25, 28, 26, 20, 18, 24],
                            backgroundColor: 'rgba(102, 126, 234, 0.7)',
                            borderColor: 'rgba(102, 126, 234, 1)',
                            borderWidth: 1,
                            borderRadius: 5
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    stepSize: 5
                                }
                            }
                        },
                        plugins: {
                            legend: {
                                display: false
                            }
                        }
                    }
                });
            }
        });

        // Handle resize untuk sidebar
        window.addEventListener('resize', function() {
            const alpineData = document.querySelector('[x-data]').__x.$data;
            if (window.innerWidth >= 768) {
                alpineData.sidebarOpen = true;
            } else {
                alpineData.sidebarOpen = false;
            }
        });
    </script>

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
</body>

</html>