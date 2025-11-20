{{-- resources/views/components/layouts/sidebar.blade.php --}}
<aside  :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
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
    <nav x-data="{
        openMaster: false,
        activeMenu: '{{ request()->is('dashboard') ? 'dashboard' : (request()->is('pengajuan-proposal*') ? 'proposal' : (request()->is('pelaksanaan-kegiatan*') ? 'pelaksanaan' : (request()->is('penyetoran-lpj*') ? 'lpj' : (request()->is('laporan-rekap*') ? 'laporan' : (request()->is('master-data*') ? 'master' : 'dashboard'))))) }}',
        activeSubmenu: '{{ request()->is('master-data/lembaga*') ? 'lembaga' : (request()->is('master-data/user*') ? 'user' : '') }}',
        setActive(menu) {
            this.activeMenu = menu;
        },
        isActive(menu) {
            return this.activeMenu === menu;
        },
        setActiveSubmenu(submenu) {
            this.activeSubmenu = submenu;
            this.activeMenu = 'master';
        },
        isActiveSubmenu(submenu) {
            return this.activeSubmenu === submenu;
        }
    }" x-init="openMaster = isActive('master')" class="px-4 py-6 space-y-2 overflow-y-auto h-[calc(100vh-120px)]">

        <!-- Dashboard -->
        <a href="/dashboard" wire:navigate @click="setActive('dashboard')"
            :class="isActive('dashboard') ? 'bg-purple-700 text-white font-semibold shadow-lg' :
                'text-purple-200 hover:bg-purple-800/50'"
            class="flex items-center py-3 px-4 rounded-lg transition duration-200 group">
            <i class="fas fa-home w-5 mr-3"></i>
            <span>Dashboard</span>
        </a>

        <!-- Pengajuan Proposal -->
        <a href="/pengajuan-proposal" wire:navigate @click="setActive('proposal')"
            :class="isActive('proposal') ? 'bg-purple-700 text-white font-semibold shadow-lg' :
                'text-purple-200 hover:bg-purple-800/50'"
            class="flex items-center py-3 px-4 rounded-lg transition duration-200 group">
            <i class="fas fa-file-alt w-5 mr-3"></i>
            <span>Pengajuan Proposal</span>
        </a>

        <!-- Pelaksanaan Kegiatan -->
        <a href="/pelaksanaan-kegiatan" wire:navigate @click="setActive('pelaksanaan')"
            :class="isActive('pelaksanaan') ? 'bg-purple-700 text-white font-semibold shadow-lg' :
                'text-purple-200 hover:bg-purple-800/50'"
            class="flex items-center py-3 px-4 rounded-lg transition duration-200 group relative">
            <i class="fas fa-calendar-check w-5 mr-3"></i>
            <span>Pelaksanaan Kegiatan</span>
        </a>

        <!-- Penyetoran LPJ -->
        <a href="/penyetoran-lpj" wire:navigate @click="setActive('lpj')"
            :class="isActive('lpj') ? 'bg-purple-700 text-white font-semibold shadow-lg' :
                'text-purple-200 hover:bg-purple-800/50'"
            class="flex items-center py-3 px-4 rounded-lg transition duration-200 group relative">
            <i class="fas fa-check-circle w-5 mr-3"></i>
            <span>Penyetoran LPJ</span>
        </a>

        <!-- Laporan & Rekap -->
        <a href="/laporan-rekap" wire:navigate @click="setActive('laporan')"
            :class="isActive('laporan') ? 'bg-purple-700 text-white font-semibold shadow-lg' :
                'text-purple-200 hover:bg-purple-800/50'"
            class="flex items-center py-3 px-4 rounded-lg transition duration-200 group">
            <i class="fas fa-chart-bar w-5 mr-3"></i>
            <span>Laporan & Rekap</span>
        </a>

        <!-- Divider -->
        <div class="border-t border-purple-700 my-4"></div>

        <!-- Master Data Dropdown -->
        <div>
            <button @click="openMaster = !openMaster; setActive('master')"
                :class="isActive('master') ? 'bg-purple-700 text-white font-semibold shadow-lg' :
                    'text-purple-200 hover:bg-purple-800/50'"
                class="w-full flex items-center justify-between py-3 px-4 rounded-lg transition duration-200">
                <div class="flex items-center">
                    <i class="fas fa-database w-5 mr-3"></i>
                    <span>Master Data</span>
                </div>
                <i class="fa-solid fa-chevron-down transform transition-transform duration-200"
                    :class="openMaster ? 'rotate-180' : 'rotate-0'"></i>
            </button>

            <!-- Submenu -->
            <div x-show="openMaster" x-transition.opacity x-cloak class="ml-10 mt-1 space-y-1">
                <a href="/master-data/lembaga" wire:navigate @click.stop="setActiveSubmenu('lembaga')"
                    :class="isActiveSubmenu('lembaga') ? 'bg-purple-600 text-white font-semibold' :
                        'text-purple-200 hover:bg-purple-800/50'"
                    class="flex items-center py-2 px-3 rounded-lg text-sm transition duration-200">
                    <i class="fa-solid fa-building w-4 mr-2 text-gray-400"></i>
                    <span>Lembaga</span>
                </a>

                <a href="/master-data/user" wire:navigate @click.stop="setActiveSubmenu('user')"
                    :class="isActiveSubmenu('user') ? 'bg-purple-600 text-white font-semibold' :
                        'text-purple-200 hover:bg-purple-800/50'"
                    class="flex items-center py-2 px-3 rounded-lg text-sm transition duration-200">
                    <i class="fa-solid fa-users w-4 mr-2 text-gray-400"></i>
                    <span>User</span>
                </a>
            </div>
        </div>
    </nav>

    <!-- User Info (Bottom Sidebar) -->
    <div class="absolute bottom-0 left-0 right-0 p-4 border-t border-purple-700 bg-purple-900">
        <div class="flex items-center space-x-3">
            <div class="h-10 w-10 rounded-full bg-purple-500 flex items-center justify-center text-white font-bold">
                A
            </div>
            <div class="flex-1">
                <p class="text-sm font-semibold">{{ Auth::user()->name }}</p>
                <p class="text-xs text-purple-300">{{ Auth::user()->email }}</p>
            </div>
        </div>
    </div>
</aside>
