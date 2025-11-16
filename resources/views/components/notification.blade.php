{{-- resources/views/components/layouts/notification.blade.php --}}
<div x-cloak 
     x-show="$store.notif.open" 
     x-transition:enter="transition ease-out duration-500"
     x-transition:enter-start="opacity-0 translate-x-full"
     x-transition:enter-end="opacity-100 translate-x-0"
     x-transition:leave="transition ease-in duration-300"
     x-transition:leave-start="opacity-100 translate-x-0"
     x-transition:leave-end="opacity-0 translate-x-full" 
     role="alert"
     class="fixed top-6 right-6 w-80 rounded-2xl bg-white p-5 shadow-xl border border-gray-100 backdrop-blur-sm bg-white/95 z-50">

    <div class="flex items-start gap-3">
        <!-- Icon -->
        <div class="flex-shrink-0 mt-0.5">
            <div class="w-10 h-10 rounded-full bg-gradient-to-r from-green-400 to-emerald-500 flex items-center justify-center shadow-md">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white" class="w-5 h-5">
                    <path fill-rule="evenodd"
                        d="M19.916 4.626a.75.75 0 01.208 1.04l-9 13.5a.75.75 0 01-1.154.114l-6-6a.75.75 0 011.06-1.06l5.353 5.353 8.493-12.739a.75.75 0 011.04-.208z"
                        clip-rule="evenodd" />
                </svg>
            </div>
        </div>

        <!-- Content -->
        <div class="flex-1 min-w-0">
            <p class="font-semibold text-gray-900 text-sm mb-1">Berhasil!</p>
            <p x-text="$store.notif.message" class="text-gray-600 text-sm leading-relaxed"></p>
        </div>

        <!-- Close Button -->
        <button @click="$store.notif.open = false"
            class="flex-shrink-0 text-gray-400 hover:text-gray-600 transition-colors duration-200 rounded-full hover:bg-gray-100 p-1">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                <path fill-rule="evenodd"
                    d="M5.47 5.47a.75.75 0 011.06 0L12 10.94l5.47-5.47a.75.75 0 111.06 1.06L13.06 12l5.47 5.47a.75.75 0 11-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 01-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 010-1.06z"
                    clip-rule="evenodd" />
            </svg>
        </button>
    </div>
</div>