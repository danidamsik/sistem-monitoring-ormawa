{{-- resources/views/components/layouts/header.blade.php --}}
<header class="bg-white shadow-md z-10" x-data="headerData()">
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
                <h1 class="text-xl md:text-2xl font-bold text-gray-800" x-text="pageTitle">
                </h1>
                <!-- Breadcrumb (Desktop) -->
                <div class="hidden md:flex items-center space-x-2 text-sm text-gray-500 mt-1">
                    <i class="fas fa-home text-xs"></i>
                    <a href="/" class="hover:text-purple-600 transition">Home</a>

                    <template x-for="(crumb, index) in breadcrumbs" :key="index">
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-chevron-right text-xs"></i>
                            <template x-if="crumb.url">
                                <a :href="crumb.url" wire:navigate class="hover:text-purple-600 transition"
                                    x-text="crumb.label"></a>
                            </template>
                            <template x-if="!crumb.url">
                                <span class="text-purple-600 font-medium" x-text="crumb.label"></span>
                            </template>
                        </div>
                    </template>
                </div>
            </div>
        </div>

        <!-- Right Section -->
        <div class="flex items-center space-x-4">
            <!-- User Dropdown -->
            <div class="relative" x-data="{ open: false }">
                <button @click="open = !open"
                    class="flex items-center space-x-2 text-gray-700 hover:text-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 rounded-lg px-3 py-2 transition">
                    <div
                        class="h-9 w-9 rounded-full bg-gradient-to-br from-purple-500 to-purple-700 flex items-center justify-center text-white font-bold shadow-md">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>

                    <span class="hidden md:block font-medium">
                        {{ Auth::user()->name }}
                    </span>

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
                    <a href="/logout" wire:navigate class="block px-4 py-2 text-sm text-red-600 hover:bg-red-50 transition">
                        <i class="fas fa-sign-out-alt mr-2"></i>
                        Keluar
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>

<script>
    function headerData() {
        return {
            pageTitle: 'Dashboard',
            breadcrumbs: [],

            init() {
                this.updateBreadcrumb();
            },

            updateBreadcrumb() {
                const path = window.location.pathname;
                const segments = path.split('/').filter(segment => segment !== '');

                // Mapping untuk route titles
                const routeMap = {
                    'dashboard': 'Dashboard',
                    'pengajuan-proposal': 'Pengajuan Proposal',
                    'pelaksanaan-kegiatan': 'Pelaksanaan Kegiatan',
                    'penyetoran-lpj': 'Penyetoran LPJ',
                    'laporan-rekap': 'Laporan Rekap',
                    'master-data': 'Master Data',
                    'lembaga': 'Lembaga',
                    'user': 'User',
                    'tambah': 'Tambah',
                    'edit': 'Edit',
                };

                // Filter out numeric IDs first
                const visibleSegments = segments.filter(segment => isNaN(segment));

                // Generate breadcrumbs
                this.breadcrumbs = [];
                let currentPath = '';

                segments.forEach((segment, index) => {
                    currentPath += '/' + segment;

                    // Skip numeric IDs in breadcrumb display
                    if (!isNaN(segment)) {
                        return;
                    }

                    const label = routeMap[segment] || this.capitalize(segment);

                    // Check if this is the last visible segment
                    const isLastVisible = visibleSegments[visibleSegments.length - 1] === segment;

                    this.breadcrumbs.push({
                        label: label,
                        url: isLastVisible ? null : currentPath // Last visible item has no link
                    });

                    // Update page title with last visible segment
                    if (isLastVisible) {
                        this.pageTitle = label;
                    }
                });

                // Default for home/root
                if (segments.length === 0) {
                    this.pageTitle = 'Dashboard';
                    this.breadcrumbs = [{
                        label: 'Dashboard',
                        url: null
                    }];
                }
            },

            capitalize(str) {
                return str.charAt(0).toUpperCase() + str.slice(1).replace(/-/g, ' ');
            }
        }
    }
</script>
