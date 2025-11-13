<div class="bg-white rounded-2xl shadow-lg p-8 border border-blue-100">
    <div class="flex justify-between items-center mb-8 border-b pb-4">
        <h2 class="text-2xl font-bold text-gray-800 flex items-center gap-2">
            <i class="fa-solid fa-file-circle-plus text-blue-600"></i>
            Form Penyetoran LPJ
        </h2>
        <button @click="openForm = false" class="text-gray-500 hover:text-red-600 transition">
            <i class="fa-solid fa-xmark text-xl"></i>
        </button>
    </div>

    <form action="#" method="POST" class="space-y-6">
        @csrf

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Pilih Pelaksanaan</label>
            <select
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 transition">
                <option value="">-- Pilih Kegiatan --</option>
                <option>Bakti Sosial Desa</option>
                <option>Seminar Kewirausahaan</option>
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal Disetor</label>
            <input type="date"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 transition">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Catatan SPI</label>
            <textarea rows="4"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 transition"
                placeholder="Tulis catatan pemeriksaan SPI di sini..."></textarea>
        </div>

        <div class="flex items-center gap-3">
            <input id="diperiksa_spi" type="checkbox"
                class="h-5 w-5 text-blue-600 border-gray-300 rounded focus:ring-blue-400">
            <label for="diperiksa_spi" class="text-sm text-gray-700">Diperiksa SPI</label>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Status LPJ</label>
            <select
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 transition">
                <option>Belum Disetor</option>
                <option>Menunggu Pemeriksaan</option>
                <option>Disetujui</option>
                <option>Ditolak</option>
            </select>
        </div>

        <div class="flex justify-end gap-4 pt-6 border-t">
            <button type="button" @click="openForm = false"
                class="px-5 py-2.5 border rounded-lg text-gray-700 hover:bg-gray-100 transition">
                Batal
            </button>
            <button type="submit"
                class="px-5 py-2.5 bg-blue-600 text-white rounded-lg hover:bg-blue-700 shadow-sm transition">
                Simpan LPJ
            </button>
        </div>
    </form>
</div>
