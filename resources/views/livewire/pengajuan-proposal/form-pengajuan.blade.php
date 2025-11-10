<!-- Form Pengajuan Proposal Baru -->
<div class="bg-white rounded-lg shadow p-6 mb-8">
    <h2 class="text-xl font-semibold text-gray-800 mb-4">Form Pengajuan Proposal Baru</h2>
    <form>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Pilih Lembaga -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Pilih Lembaga</label>
                <select required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <option value="">Pilih Lembaga</option>
                    <option value="1">BEM Universitas</option>
                    <option value="2">Himpunan Mahasiswa Teknik</option>
                    <option value="3">UKM Seni Budaya</option>
                    <option value="4">UKM Olahraga</option>
                </select>
            </div>

            <!-- Nama Kegiatan -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Nama Kegiatan</label>
                <input type="text" required placeholder="Masukkan nama kegiatan"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>

            <!-- Tanggal Diterima -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal Diterima</label>
                <input type="date" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>

            <!-- Dana Diajukan -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Dana Diajukan</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <span class="text-gray-500">Rp</span>
                    </div>
                    <input type="number" step="0.01" placeholder="0.00"
                        class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
            </div>
        </div>

        <!-- Tombol Submit -->
        <div class="mt-6 flex justify-end">
            <button type="submit"
                class="px-6 py-2 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors">
                Ajukan Proposal
            </button>
        </div>
    </form>
</div>
