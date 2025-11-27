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

    <form wire:submit.prevent="{{ $pelaksanaan_id ? 'update' : 'create' }}" class="space-y-6">
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
                            <option value="{{ $proposal->id }}" {{ isset($pelaksanaan_id) ? 'disabled' : '' }}>
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

            <!-- Status -->
            <div x-data="statusPelaksanaan()" class="md:col-span-2 flex items-center gap-4">
                <!-- Label dan Badge Status -->
                <div class="flex items-center gap-2">
                    <label class="text-sm font-medium text-gray-700">Status:</label>
                    <span class="px-3 py-1 rounded-full text-sm"
                        :class="{
                            'bg-blue-100 text-blue-800': statusText === 'belum_dimulai',
                            'bg-green-100 text-green-800': statusText === 'sedang_berlangsung',
                            'bg-gray-100 text-gray-800': statusText === 'selesai'
                        }"
                        x-text="statusText.replace(/_/g, ' ')">
                    </span>
                </div>

                <!-- Label dan Info Hari -->
                <div class="flex items-center gap-2">
                    <label class="text-sm font-medium text-gray-700">Waktu:</label>
                    <span class="text-sm text-gray-600" x-text="getDaysInfo()"></span>
                </div>
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
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    <i class="fas fa-user-tie text-purple-500 mr-2"></i>Penanggung Jawab
                </label>
                <input type="text" wire:model="penanggung_jawab" placeholder="Nama penanggung jawab kegiatan"
                    class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-purple-500 focus:border-purple-500 focus:outline-none transition-all duration-200 @error('penanggung_jawab') border-red-500 @enderror">
                @error('penanggung_jawab')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Nomor Penanggung Jawab (BARU) -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    <i class="fas fa-phone text-purple-500 mr-2"></i>Nomor Penanggung Jawab
                </label>
                <input type="text" wire:model="no_pj" placeholder="Contoh: 08123456789"
                    class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-purple-500 focus:border-purple-500 focus:outline-none transition-all duration-200 @error('no_pj') border-red-500 @enderror">
                @error('no_pj')
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
                <span wire:loading.remove wire:target="{{ $pelaksanaan_id ? 'update' : 'create' }}">Simpan
                    Pelaksanaan</span>
                <span wire:loading wire:target="{{ $pelaksanaan_id ? 'update' : 'create' }}">Menyimpan...</span>
            </button>
        </div>
    </form>
</section>

<script>
    function statusPelaksanaan() {
        return {
            statusText: @entangle('status').live,
            tanggalMulai: @entangle('tanggal_mulai').live,
            tanggalSelesai: @entangle('tanggal_selesai').live,

            init() {
                this.updateStatus();

                // Watch for date changes
                this.$watch('tanggalMulai', () => this.updateStatus());
                this.$watch('tanggalSelesai', () => this.updateStatus());
            },

            updateStatus() {
                if (!this.tanggalMulai || !this.tanggalSelesai) {
                    this.statusText = "";
                    return;
                }

                const today = new Date().setHours(0, 0, 0, 0);
                const start = new Date(this.tanggalMulai).setHours(0, 0, 0, 0);
                const end = new Date(this.tanggalSelesai).setHours(0, 0, 0, 0);

                // Validate dates
                if (isNaN(start) || isNaN(end)) {
                    this.statusText = "";
                    return;
                }

                if (today < start) {
                    this.statusText = "belum_dimulai";
                } else if (today >= start && today <= end) {
                    this.statusText = "sedang_berlangsung";
                } else {
                    this.statusText = "selesai";
                }
            },

            // Helper method to get status badge color
            getStatusColor() {
                switch (this.statusText) {
                    case "belum_dimulai":
                        return "blue";
                    case "sedang_berlangsung":
                        return "green";
                    case "selesai":
                        return "gray";
                    default:
                        return "gray";
                }
            },

            // Helper to get days remaining/elapsed
            getDaysInfo() {
                if (!this.tanggalMulai || !this.tanggalSelesai) return null;

                const today = new Date().setHours(0, 0, 0, 0);
                const start = new Date(this.tanggalMulai).setHours(0, 0, 0, 0);
                const end = new Date(this.tanggalSelesai).setHours(0, 0, 0, 0);

                if (today < start) {
                    const days = Math.ceil((start - today) / (1000 * 60 * 60 * 24));
                    return `${days} hari lagi`;
                } else if (today <= end) {
                    const days = Math.ceil((end - today) / (1000 * 60 * 60 * 24));
                    return `${days} hari tersisa`;
                } else {
                    const days = Math.floor((today - end) / (1000 * 60 * 60 * 24));
                    return `${days} hari lalu`;
                }
            }
        }
    }
</script>