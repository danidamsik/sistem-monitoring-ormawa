<div class="bg-white rounded-2xl shadow-lg p-8 border border-blue-100">
    <div class="flex justify-between items-center mb-8 border-b pb-4">
        <h2 class="text-2xl font-bold text-gray-800 flex items-center gap-2">
            <i class="fa-solid fa-file-circle-plus text-blue-600"></i>
            Edit Penyetoran LPJ
        </h2>
    </div>

    <form wire:submit.prevent='update' class="space-y-6">
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Nama Pelaksanaan</label>
            <input type="text" wire:model="pelaksanaan_name" disabled class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-purple-500 focus:border-purple-500 focus:outline-none transition-all duration-200 @error('penanggung_jawab') border-red-500 @enderror">
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
                wire:target="update"
                class="px-5 py-2.5 bg-blue-600 text-white rounded-lg hover:bg-blue-700 shadow-sm transition">
                <span wire:loading.remove wire:target="update">
                    Simpan LPJ
                </span>
                <span wire:loading wire:target="update">
                    Menyimpan...
                </span>
            </button>

        </div>
    </form>
</div>
