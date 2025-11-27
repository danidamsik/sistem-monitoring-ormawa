<!-- Modal Konfirmasi Hapus -->
<div x-show="$wire.modal" x-cloak x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50 p-4">

    <div @click.away="$wire.modal = false" x-show="$wire.modal"
        x-transition:enter="transition ease-out duration-300 transform"
        x-transition:enter-start="opacity-0 scale-75 -translate-y-10"
        x-transition:enter-end="opacity-100 scale-100 translate-y-0"
        x-transition:leave="transition ease-in duration-200 transform"
        x-transition:leave-start="opacity-100 scale-100 translate-y-0"
        x-transition:leave-end="opacity-0 scale-90 translate-y-10"
        class="bg-white rounded-2xl shadow-2xl w-full max-w-sm p-6 text-center space-y-4 relative overflow-hidden">

        <!-- Background decorative element -->
        <div class="absolute -top-20 -right-20 w-40 h-40 bg-red-50 rounded-full opacity-60"></div>
        <div class="absolute -bottom-20 -left-20 w-40 h-40 bg-red-50 rounded-full opacity-40"></div>

        <!-- Icon dengan animasi -->
        <div class="relative z-10">
            <div class="inline-flex items-center justify-center w-20 h-20 bg-red-100 rounded-2xl mb-3 relative">
                <!-- Pulsing effect -->
                <div class="absolute inset-0 bg-red-200 rounded-2xl animate-ping opacity-20"></div>
                <!-- Main icon -->
                <i class="fa-solid fa-triangle-exclamation text-red-500 text-3xl relative z-10"></i>
            </div>
        </div>

        <!-- Content -->
        <div class="relative z-10 space-y-3">
            <h2 class="text-xl font-bold text-gray-800">Konfirmasi Hapus</h2>
            <p class="text-gray-600 text-sm leading-relaxed">
                Apakah kamu yakin ingin menghapus data ini? Tindakan ini tidak dapat dibatalkan.
            </p>
        </div>

        <!-- Buttons -->
        <div class="relative z-10 flex justify-center gap-3 mt-6">
            <button @click="$wire.modal = false"
                class="px-6 py-3 bg-gray-100 hover:bg-gray-200 rounded-xl text-gray-700 font-medium transition-all duration-200 transform hover:-translate-y-0.5 active:scale-95 shadow-sm hover:shadow-md">
                Batal
            </button>

            <button @click="$wire.delete()" wire:loading.attr="disabled" wire:target="delete"
                class="relative flex items-center justify-center gap-2 px-6 py-3 bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 rounded-xl text-white font-medium transition-all duration-200 transform hover:-translate-y-0.5 active:scale-95 shadow-lg hover:shadow-xl disabled:opacity-70 disabled:cursor-not-allowed disabled:transform-none">

                <!-- Spinner saat loading -->
                <svg wire:loading wire:target="delete" class="w-5 h-5 animate-spin text-white"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                        stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
                </svg>

                <!-- Teks normal -->
                <span wire:loading.remove wire:target="delete">
                    Hapus
                </span>

                <!-- Teks saat loading -->
                <span wire:loading wire:target="delete">
                    Menghapus...
                </span>
            </button>
        </div>

        <!-- Decorative border -->
        <div class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-transparent via-red-200 to-transparent">
        </div>
    </div>
</div>
