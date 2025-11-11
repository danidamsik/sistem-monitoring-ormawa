<!-- Form Pengajuan Proposal Baru -->
<div class="bg-white rounded-lg shadow p-6 mb-8">
    <h2 class="text-xl font-semibold text-gray-800 mb-4">{{ $title }}</h2>
    <form wire:submit.prevent="{{ $func }}">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <!-- Pilih Lembaga -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Pilih Lembaga</label>
                <select wire:model="lembaga_id"
                    class="w-full px-4 py-2 border @error('lembaga_id') border-red-500 @else border-gray-300 @enderror rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <option value="">Pilih Lembaga</option>
                    @foreach ($lembaga as $item)
                        <option value="{{ $item->id }}">{{ $item->nama_lembaga }}</option>
                    @endforeach
                </select>
                @error('lembaga_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Nama Kegiatan -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Nama Kegiatan</label>
                <input wire:model="nama_kegiatan" type="text" placeholder="Masukkan nama kegiatan"
                    class="w-full px-4 py-2 border @error('nama_kegiatan') border-red-500 @else border-gray-300 @enderror rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                @error('nama_kegiatan')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Tanggal Diterima -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal Diterima</label>
                <input wire:model="tanggal_diterima" type="date"
                    class="w-full px-4 py-2 border @error('tanggal_diterima') border-red-500 @else border-gray-300 @enderror rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                @error('tanggal_diterima')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Dana Diajukan -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Dana Diajukan</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <span class="text-gray-500">Rp</span>
                    </div>
                    <input wire:model="dana_diajukan" type="number" step="0.01" placeholder="0.00"
                        class="w-full pl-10 pr-4 py-2 border @error('dana_diajukan') border-red-500 @else border-gray-300 @enderror rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
                @error('dana_diajukan')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Dana Disetujui -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Dana Disetujui</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <span class="text-gray-500">Rp</span>
                    </div>
                    <input wire:model="dana_disetujui" type="number" step="0.01" placeholder="0.00"
                        class="w-full pl-10 pr-4 py-2 border @error('dana_disetujui') border-red-500 @else border-gray-300 @enderror rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
                @error('dana_disetujui')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

        </div>

        <!-- Tombol Aksi -->
        <div class="mt-6 flex justify-between items-center">
            <!-- Tombol Kembali -->
            <a href="/pengajuan-proposal" wire:navigate
                class="px-6 py-2 bg-gray-500 text-white font-medium rounded-lg hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2 transition-colors">
                Kembali
            </a>

            <!-- Tombol Submit -->
            <button type="submit" wire:loading.attr="disabled" wire:target="create"
                class="relative w-48 px-6 py-2 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors disabled:opacity-70 disabled:cursor-not-allowed">

                <!-- Teks normal (muncul saat tidak loading) -->
                <span wire:loading.remove wire:target="{{$func}}">
                    {{ $titleButton }}
                </span>

                <!-- Teks dan animasi saat loading -->
                <span wire:loading wire:target="{{$func}}" class="flex items-center justify-center gap-2">
                    memproses...
                </span>
            </button>
        </div>
    </form>
</div>