<div id="formLembaga"
    @edit.window=
    "$wire.id_lembaga = $event.detail.id_lembaga;
     $wire.nama_lembaga = $event.detail.nama_lembaga;
     $wire.nomor_hp = $event.detail.nomor_hp;
     $wire.email = $event.detail.email;
      $nextTick(() => {
            document.getElementById('formLembaga')
                .scrollIntoView({ behavior: 'smooth' });
        });
     "
    class="bg-white/80 backdrop-blur-sm shadow-xl rounded-2xl p-8 border border-white/20 mb-8 hover:shadow-2xl transition-all duration-300">
    <div class="flex items-center justify-between mb-6">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Tambah/update Lembaga</h2>
            <p class="text-sm text-gray-500 mt-1">Isi formulir di bawah untuk tambah/update</p>
        </div>
    </div>

    <form wire:submit.prevent="updateOrCreate" class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <!-- Nama Lembaga -->
        <div class="group">
            <label class="text-sm font-semibold text-gray-700 mb-2 block">Nama Lembaga</label>
            <div class="relative">
                <input type="text" wire:model="nama_lembaga"
                    class="w-full border-2 border-gray-200 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300 outline-none bg-gray-50 group-hover:bg-white"
                    placeholder="Masukkan nama lembaga">
                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                </div>
            </div>

            <!-- Error -->
            @error('nama_lembaga')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Nomor HP -->
        <div class="group">
            <label class="text-sm font-semibold text-gray-700 mb-2 block">Nomor HP</label>
            <div class="relative">
                <input type="text" wire:model="nomor_hp"
                    class="w-full border-2 border-gray-200 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300 outline-none bg-gray-50 group-hover:bg-white"
                    placeholder="08xxxxx">
                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                    </svg>
                </div>
            </div>

            <!-- Error -->
            @error('nomor_hp')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Email -->
        <div class="group">
            <label class="text-sm font-semibold text-gray-700 mb-2 block">Email</label>
            <div class="relative">
                <input type="email" wire:model="email"
                    class="w-full border-2 border-gray-200 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300 outline-none bg-gray-50 group-hover:bg-white"
                    placeholder="example@mail.com">
                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
            </div>

            <!-- Error -->
            @error('email')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Button -->
        <div class="md:col-span-3 flex justify-end pt-2">
            <button type="submit" wire:loading.attr="disabled" wire:loading.class="opacity-50 cursor-not-allowed"
                wire:target="updateOrCreate"
                class="px-5 py-2.5 bg-blue-600 text-white rounded-lg hover:bg-blue-700 shadow-sm transition">
                <span wire:loading.remove wire:target="updateOrCreate">
                    Simpan Lembaga
                </span>
                <span wire:loading wire:target="updateOrCreate">
                    Menyimpan...
                </span>
            </button>

        </div>

    </form>
</div>
