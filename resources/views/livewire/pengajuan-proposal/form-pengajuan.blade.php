<!-- Form Pengajuan Proposal Baru -->
<div class="bg-white rounded-lg shadow p-6 mb-8">
    <h2 class="text-xl font-semibold text-gray-800 mb-4">
        {{ $proposal_id ? 'Edit Pengajuan Proposal' : 'Tambah Pengajuan Proposal' }}
    </h2>

    <form wire:submit.prevent='{{ $proposal_id ? 'update' : 'create' }}'>
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

                <!-- Informasi tambahan (Alert Info Profesional) -->
                <div
                    class="mt-2 text-xs bg-blue-50 border border-blue-200 text-blue-700 rounded-md p-3 leading-relaxed">
                    <p class="font-semibold text-blue-800 mb-1">Panduan Pengisian Dana Disetujui:</p>
                    <ul class="list-disc list-inside space-y-1">
                        <li>Isi <span class="font-semibold text-blue-900">0</span> jika proposal <span
                                class="font-semibold">tidak disetujui</span>.</li>
                        <li>Biarkan <span class="font-semibold text-blue-900">kosong</span> jika status masih <span
                                class="font-semibold">menunggu keputusan</span>.</li>
                        <li>Isi <span class="font-semibold text-blue-900">&gt; 0</span> jika dana telah <span
                                class="font-semibold">disetujui</span>.</li>
                    </ul>
                </div>

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
            <button type="submit" wire:loading.attr="disabled" wire:target="{{ $proposal_id ? 'update' : 'create' }}"
                class="relative w-48 px-6 py-2 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors disabled:opacity-70 disabled:cursor-not-allowed">

                <!-- Teks normal (muncul saat tidak loading) -->
                <span wire:loading.remove wire:target="{{ $proposal_id ? 'update' : 'create' }}">
                    {{ $proposal_id ? 'update' : 'create' }}
                </span>

                <!-- Teks dan animasi saat loading -->
                <span wire:loading wire:target="{{ $proposal_id ? 'update' : 'create' }}"
                    class="flex items-center justify-center gap-2">
                    memproses...
                </span>
            </button>
        </div>
    </form>
</div>
