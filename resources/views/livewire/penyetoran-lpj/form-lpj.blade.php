<div class="bg-white rounded-2xl shadow-lg p-8 border border-blue-100">
    <div class="flex justify-between items-center mb-8 border-b pb-4">
        <h2 class="text-2xl font-bold text-gray-800 flex items-center gap-2">
            <i class="fa-solid fa-file-circle-plus text-blue-600"></i>
            {{ $id == null ? 'Tambah Penyetoran LPJ' : 'Edit Penyetoran LPJ' }}
        </h2>
        <button @click="openForm = false" class="text-gray-500 hover:text-red-600 transition">
            <i class="fa-solid fa-xmark text-xl"></i>
        </button>
    </div>

    <form wire:submit.prevent='{{ $id == null ? 'create' : 'update' }}' class="space-y-6">
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Pilih Pelaksanaan</label>
            <select wire:model='pelaksanaan_id'
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 transition">
                <option value="">-- Pilih Kegiatan --</option>
                @foreach ($pelaksanaan as $item)
                    <option value="{{ $item->id }}" {{ $id ? 'disabled' : '' }}>
                        {{ $item->nama_kegiatan }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal Disetor</label>
            <input type="date" wire:model='tanggal_disetor'
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 transition">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Catatan SPI</label>
            <textarea rows="4" wire:model='catatan_spi'
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 transition"
                placeholder="Tulis catatan pemeriksaan SPI di sini..."></textarea>
        </div>

        <div class="flex items-center gap-3">
            <input id="diperiksa_spi" type="checkbox" wire:model='diperiksa_spi'
                class="h-5 w-5 text-blue-600 border-gray-300 rounded focus:ring-blue-400">
            <label for="diperiksa_spi" class="text-sm text-gray-700">Diperiksa SPI</label>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Status LPJ</label>
            <select wire:model='status_lpj'
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 transition">
                <option value="Belum Disetor">Belum Disetor</option>
                <option value="Menunggu Diperiksa">Menunggu Pemeriksaan</option>
                <option value="Di Setujui">Disetujui</option>
            </select>
        </div>

        <div class="flex justify-end gap-4 pt-6 border-t">
            <a href="/penyetoran-lpj" wire:navigate>
                <button type="button" class="px-5 py-2.5 border rounded-lg text-gray-700 hover:bg-gray-100 transition">
                    kembali
                </button>
            </a>
            <button type="submit" wire:loading.attr="disabled" wire:loading.class="opacity-50 cursor-not-allowed"
                wire:target="{{ $id == null ? 'create' : 'update' }}"
                class="px-5 py-2.5 bg-blue-600 text-white rounded-lg hover:bg-blue-700 shadow-sm transition">
                <span wire:loading.remove wire:target="{{ $id == null ? 'create' : 'update' }}">
                    Simpan LPJ
                </span>
                <span wire:loading wire:target="{{ $id == null ? 'create' : 'update' }}">
                    Menyimpan...
                </span>
            </button>

        </div>
    </form>
</div>
