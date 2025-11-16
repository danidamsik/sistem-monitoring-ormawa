{{-- resources/views/components/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'SIMPEL' }}</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    @livewireStyles
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        body { font-family: 'Poppins', sans-serif; }
        /* Styles lainnya... */
    </style>
</head>

<body class="bg-gray-50" x-data="layoutData()">
    <div class="flex h-screen overflow-hidden">
        
        <!-- Sidebar Component -->
        <x-sidebar />

        <!-- Overlay for mobile -->
        <x-mobile-overlay />

        <!-- Main Content Area -->
        <div class="flex-1 flex flex-col overflow-hidden">
            
            <!-- Header Component -->
            <x-header :title="$title ?? 'Dashboard'" :breadcrumbs="$breadcrumbs ?? []"/>

            <!-- Main Content -->
            <main class="flex-1 overflow-y-auto bg-gray-50 p-4 md:p-6">
                {{ $slot }}
            </main>

            <!-- Notification Component -->
            <x-notification />

            <!-- Footer Component -->
            <x-footer />
        </div>
    </div>

    @livewireScripts
    
    <script>
        function layoutData() {
            return {
                activeNav: 'dashboard',
                sidebarOpen: window.innerWidth >= 768,
                
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
                
                init() {
                    const path = window.location.pathname;
                    if (path.includes('proposal')) this.activeNav = 'proposal';
                    else if (path.includes('pelaksanaan')) this.activeNav = 'pelaksanaan';
                    else if (path.includes('lpj')) this.activeNav = 'lpj';
                    else if (path.includes('laporan')) this.activeNav = 'laporan';
                    else if (path.includes('master')) this.activeNav = 'master';
                    else this.activeNav = 'dashboard';
                }
            }
        }
        
        document.addEventListener('alpine:init', () => {
            Alpine.store('notif', {
                open: false,
                message: '',
            })
        })

        document.addEventListener('livewire:init', () => {
            Livewire.on('success', (message) => {
                Alpine.store('notif').open = true
                Alpine.store('notif').message = message.message
                setTimeout(() => Alpine.store('notif').open = false, 2000);
            })
        })
    </script>
</body>
</html>