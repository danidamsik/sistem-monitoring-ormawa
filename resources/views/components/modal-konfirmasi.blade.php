 <!-- Modal Konfirmasi Hapus -->
 <div x-show="$wire.modal" x-cloak x-transition.opacity
     class="fixed inset-0 flex -top-16 items-center justify-center bg-black bg-opacity-50 z-50">

     <div @click.away="$wire.modal = false"
         class="bg-white rounded-2xl shadow-lg w-96 p-6 text-center space-y-4 animate-slideUp">

         <i class="fa-solid fa-triangle-exclamation text-red-500 text-4xl"></i>
         <h2 class="text-lg font-semibold text-gray-800">Konfirmasi Hapus</h2>
         <p class="text-gray-600 text-sm">Apakah kamu yakin ingin menghapus data ini?</p>

         <div class="flex justify-center gap-3 mt-4">
             <button @click="$wire.modal = false"
                 class="px-4 py-2 bg-gray-200 hover:bg-gray-300 rounded-xl text-gray-700 font-medium transition">
                 Batal
             </button>

             <button @click="$wire.delete()" wire:loading.attr="disabled" wire:target="delete"
                 class="relative flex items-center justify-center gap-2 px-4 py-2 bg-red-500 hover:bg-red-600 rounded-xl text-white font-medium transition disabled:opacity-70 disabled:cursor-not-allowed">
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
     </div>
 </div>
