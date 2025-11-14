<section class="bg-white rounded-2xl shadow-lg border border-gray-200 p-6 md:p-8">
    <!-- Header dengan icon -->
    <div class="flex items-center mb-6 pb-4 border-b border-gray-100">
        <div class="bg-purple-100 p-3 rounded-lg mr-4">
            <i class="fas fa-calendar-plus text-purple-600 text-xl"></i>
        </div>
        <div>
            <h2 class="text-2xl font-bold text-gray-800">
                {{ $pelaksanaan_id ? 'Edit' : 'Tambah' }}
            </h2>
            <p class="text-gray-500 text-sm mt-1">
                Isi form berikut untuk {{ $pelaksanaan_id ? 'mengubah' : 'menambahkan' }} pelaksanaan kegiatan
            </p>
        </div>
    </div>

    <form wire:submit.prevent="{{ $func }}" class="space-y-6">
        <!-- Grid untuk form fields -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Pilih Proposal -->
            <div class="md:col-span-2">
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    <i class="fas fa-file-alt text-purple-500 mr-2"></i>Pilih Proposal <span
                        class="text-red-500">*</span>
                </label>
                <div class="relative">
                    <select wire:model="proposal_id"
                        class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-purple-500 focus:border-purple-500 focus:outline-none transition-all duration-200 appearance-none bg-white @error('proposal_id') border-red-500 @enderror">
                        <option value="">-- Pilih Proposal --</option>
                        @foreach ($proposals as $proposal)
                            <option value="{{ $proposal->id }}">
                                {{ $proposal->nama_kegiatan }} - {{ $proposal->nama_lembaga }}
                                (Rp {{ number_format($proposal->dana_disetujui, 0, ',', '.') }})
                            </option>
                        @endforeach
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-gray-500">
                        <i class="fas fa-chevron-down"></i>
                    </div>
                </div>
                @error('proposal_id')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Tanggal Mulai -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    <i class="fas fa-calendar-day text-purple-500 mr-2"></i>Tanggal Mulai <span
                        class="text-red-500">*</span>
                </label>
                <div class="relative">
                    <input type="date" wire:model="tanggal_mulai"
                        class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-purple-500 focus:border-purple-500 focus:outline-none transition-all duration-200 @error('tanggal_mulai') border-red-500 @enderror">
                </div>
                @error('tanggal_mulai')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Tanggal Selesai -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    <i class="fas fa-calendar-check text-purple-500 mr-2"></i>Tanggal Selesai <span
                        class="text-red-500">*</span>
                </label>
                <div class="relative">
                    <input type="date" wire:model.blur="tanggal_selesai"
                        class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-purple-500 focus:border-purple-500 focus:outline-none transition-all duration-200 @error('tanggal_selesai') border-red-500 @enderror">
                </div>
                @error('tanggal_selesai')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Tenggat LPJ -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    <i class="fas fa-clock text-purple-500 mr-2"></i>Tenggat Penyetoran LPJ
                </label>
                <div class="relative">
                    <input type="date" wire:model="tenggat_lpj"
                        class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-purple-500 focus:border-purple-500 focus:outline-none transition-all duration-200 @error('tenggat_lpj') border-red-500 @enderror">
                </div>
                @error('tenggat_lpj')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Status -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    <i class="fas fa-tasks text-purple-500 mr-2"></i>Status Pelaksanaan <span
                        class="text-red-500">*</span>
                </label>
                <div class="relative">
                    <select wire:model="status"
                        class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-purple-500 focus:border-purple-500 focus:outline-none transition-all duration-200 appearance-none bg-white @error('status') border-red-500 @enderror">
                        <option value="">-- Pilih Status --</option>
                        <option value="belum_dimulai">Belum Dimulai</option>
                        <option value="sedang_berlangsung">Sedang Berlangsung</option>
                        <option value="selesai">Selesai</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-gray-500">
                        <i class="fas fa-chevron-down"></i>
                    </div>
                </div>
                @error('status')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Lokasi -->
            <div class="md:col-span-2">
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    <i class="fas fa-map-marker-alt text-purple-500 mr-2"></i>Lokasi Kegiatan
                </label>
                <input type="text" wire:model="lokasi" placeholder="Contoh: Aula Fakultas Teknik"
                    class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-purple-500 focus:border-purple-500 focus:outline-none transition-all duration-200 @error('lokasi') border-red-500 @enderror">
                @error('lokasi')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Penanggung Jawab -->
            <div class="md:col-span-2">
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    <i class="fas fa-user-tie text-purple-500 mr-2"></i>Penanggung Jawab
                </label>
                <input type="text" wire:model="penanggung_jawab" placeholder="Nama penanggung jawab kegiatan"
                    class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-purple-500 focus:border-purple-500 focus:outline-none transition-all duration-200 @error('penanggung_jawab') border-red-500 @enderror">
                @error('penanggung_jawab')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Keterangan -->
            <div class="md:col-span-2">
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    <i class="fas fa-sticky-note text-purple-500 mr-2"></i>Keterangan
                </label>
                <textarea wire:model="keterangan" rows="4" placeholder="Tambahkan keterangan tambahan (opsional)"
                    class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-purple-500 focus:border-purple-500 focus:outline-none transition-all duration-200 resize-none @error('keterangan') border-red-500 @enderror"></textarea>
                @error('keterangan')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Tombol -->
        <div class="flex flex-col sm:flex-row justify-end gap-3 pt-6 border-t border-gray-100">
            <a href="/pelaksanaan-kegiatan" wire:navigate>
                <button type="button"
                    class="px-6 py-3 bg-gray-100 text-gray-700 rounded-xl hover:bg-gray-200 transition-all duration-200 font-medium flex items-center justify-center order-2 sm:order-1">
                    Kembali
                </button>
            </a>
            <button type="submit"
                class="px-6 py-3 bg-gradient-to-r from-purple-600 to-purple-700 text-white rounded-xl hover:from-purple-700 hover:to-purple-800 transition-all duration-200 font-medium shadow-md flex items-center justify-center order-1 sm:order-2">
                <i class="fas fa-save mr-2"></i>
                <span wire:loading.remove wire:target="save">Simpan Pelaksanaan</span>
                <span wire:loading wire:target="save">Menyimpan...</span>
            </button>
        </div>
    </form>
</section>
