<div id="formUser"
    @edit-user.window=
        "$wire.userId = $event.detail.user_id;
         $wire.name = $event.detail.user_name;
         $wire.email = $event.detail.email;
          $nextTick(() => {
            document.getElementById('formUser')
                .scrollIntoView({ behavior: 'smooth' });
        });
         "
    class="bg-white/80 backdrop-blur-sm shadow-xl rounded-2xl p-8 border border-white/20 mb-8 hover:shadow-2xl transition-all duration-300">
    <div class="flex items-center justify-between mb-6">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">
                {{ $userId ? 'Edit User' : 'Tambah User Baru' }}
            </h2>
            <p class="text-sm text-gray-500 mt-1">Isi formulir di bawah untuk
                {{ $userId ? 'mengupdate' : 'menambahkan' }} user</p>
        </div>
    </div>

    <form wire:submit.prevent="createOrUpdate" class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <!-- Nama -->
        <div class="group">
            <label class="text-sm font-semibold text-gray-700 mb-2 block">Nama Lengkap <span
                    class="text-red-500">*</span></label>
            <div class="relative">
                <input type="text" wire:model.blur="name"
                    class="w-full border-2 @error('name') border-red-500 @else border-gray-200 @enderror rounded-xl px-4 py-3 focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-300 outline-none bg-gray-50 group-hover:bg-white"
                    placeholder="Masukkan nama lengkap">
                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
            </div>
            @error('name')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Email -->
        <div class="group">
            <label class="text-sm font-semibold text-gray-700 mb-2 block">Email <span
                    class="text-red-500">*</span></label>
            <div class="relative">
                <input type="email" wire:model.blur="email"
                    class="w-full border-2 @error('email') border-red-500 @else border-gray-200 @enderror rounded-xl px-4 py-3 focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-300 outline-none bg-gray-50 group-hover:bg-white"
                    placeholder="example@mail.com">
                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
            </div>
            @error('email')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Password -->
        <div class="group">
            <label class="text-sm font-semibold text-gray-700 mb-2 block">
                Password
                <span class="text-red-500">{{ $userId ? '' : '*' }}</span>
                @if ($userId)
                    <span class="text-xs text-gray-500">(Kosongkan jika tidak ingin mengubah)</span>
                @endif
            </label>
            <div class="relative">
                <input type="password" wire:model.blur="password"
                    class="w-full border-2 @error('password') border-red-500 @else border-gray-200 @enderror rounded-xl px-4 py-3 focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-300 outline-none bg-gray-50 group-hover:bg-white"
                    placeholder="********">
                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                </div>
            </div>
            @error('password')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Konfirmasi Password -->
        <div class="group md:col-span-3">
            <label class="text-sm font-semibold text-gray-700 mb-2 block">
                Konfirmasi Password
                <span class="text-red-500">{{ $userId ? '' : '*' }}</span>
            </label>
            <div class="relative md:w-1/3">
                <input type="password" wire:model.blur="password_confirmation"
                    class="w-full border-2 border-gray-200 rounded-xl px-4 py-3 focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-300 outline-none bg-gray-50 group-hover:bg-white"
                    placeholder="********">
                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                </div>
            </div>
        </div>

        <!-- Button -->
        <div class="md:col-span-3 flex justify-end pt-2">
            <button type="submit"
                class="bg-gradient-to-r from-purple-500 to-pink-600 hover:from-purple-600 hover:to-pink-700 text-white font-semibold px-8 py-3 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 flex items-center gap-2 transform hover:scale-105 disabled:opacity-50 disabled:cursor-not-allowed"
                wire:loading.attr="disabled">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" wire:loading.remove wire:target="createOrUpdate">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 animate-spin" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" wire:loading wire:target="createOrUpdate">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                </svg>
                <span wire:loading.remove wire:target="createOrUpdate">Simpan Data</span>
                <span wire:loading wire:target="createOrUpdate">Menyimpan...</span>
            </button>
        </div>
    </form>
</div>
