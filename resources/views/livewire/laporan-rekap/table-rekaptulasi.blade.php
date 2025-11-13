<div class="p-6 space-y-8">
    <!-- ======== Header ======== -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div class="flex items-center gap-3">
            <div class="bg-blue-100 text-blue-600 p-3 rounded-xl">
                <i class="fa-solid fa-chart-line text-xl"></i>
            </div>
            <div>
                <h1 class="text-2xl font-semibold text-gray-800">Laporan Rekapitulasi</h1>
                <p class="text-sm text-gray-500 mt-1">Lihat rekap kegiatan, pendanaan, dan status LPJ secara lengkap.</p>
            </div>
        </div>

        <!-- Filter dan Export -->
        <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3">
            <!-- Filter Tahun -->
            <div class="flex items-center gap-2">
                <i class="fa-regular fa-calendar text-gray-500"></i>
                <select x-model="tahun"
                    class="h-10 px-3 rounded-lg border border-gray-300 bg-white text-sm focus:outline-none focus:ring-2 focus:ring-blue-400">
                    <option value="2025">2025</option>
                    <option value="2024">2024</option>
                    <option value="2023">2023</option>
                </select>
            </div>

            <!-- Export Buttons -->
            <div class="flex items-center gap-2">
                <button @click="$dispatch('export-excel', {tahun})"
                    class="flex items-center gap-2 h-10 px-4 rounded-lg bg-green-600 hover:bg-green-700 text-white text-sm font-medium shadow-sm transition">
                    <i class="fa-solid fa-file-excel"></i>
                    <span>Excel</span>
                </button>

                <button @click="$dispatch('export-pdf', {tahun})"
                    class="flex items-center gap-2 h-10 px-4 rounded-lg bg-red-600 hover:bg-red-700 text-white text-sm font-medium shadow-sm transition">
                    <i class="fa-solid fa-file-pdf"></i>
                    <span>PDF</span>
                </button>
            </div>
        </div>
    </div>

    <!-- ======== Card Table ======== -->
    <div class="bg-white rounded-2xl shadow-md border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm text-gray-700">
                <thead>
                    <tr class="bg-gray-50 border-b text-xs uppercase tracking-wider text-gray-600">
                        <th class="px-5 py-3 text-left">No</th>
                        <th class="px-5 py-3 text-left">Lembaga</th>
                        <th class="px-5 py-3 text-left">Nama Kegiatan</th>
                        <th class="px-5 py-3 text-left">Tanggal Mulai</th>
                        <th class="px-5 py-3 text-left">Tanggal Selesai</th>
                        <th class="px-5 py-3 text-right">Dana Diajukan</th>
                        <th class="px-5 py-3 text-right">Dana Disetujui</th>
                        <th class="px-5 py-3 text-center">Status Pelaksanaan</th>
                        <th class="px-5 py-3 text-center">Status LPJ</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-5 py-4 font-medium text-gray-800">1</td>
                        <td class="px-5 py-4">BEM Fakultas Teknik</td>
                        <td class="px-5 py-4">Seminar Kewirausahaan</td>
                        <td class="px-5 py-4">2025-01-10</td>
                        <td class="px-5 py-4">2025-01-11</td>
                        <td class="px-5 py-4 text-right">Rp 5.000.000</td>
                        <td class="px-5 py-4 text-right">Rp 4.500.000</td>
                        <td class="px-5 py-4 text-center">
                            <span
                                class="inline-flex items-center gap-1 px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs font-semibold">
                                <i class="fa-solid fa-check-circle"></i> Selesai
                            </span>
                        </td>
                        <td class="px-5 py-4 text-center">
                            <span
                                class="inline-flex items-center gap-1 px-3 py-1 rounded-full bg-yellow-100 text-yellow-700 text-xs font-semibold">
                                <i class="fa-solid fa-clock"></i> Menunggu
                            </span>
                        </td>
                    </tr>

                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-5 py-4 font-medium text-gray-800">2</td>
                        <td class="px-5 py-4">HIMA Akuntansi</td>
                        <td class="px-5 py-4">Bakti Sosial Desa</td>
                        <td class="px-5 py-4">2025-03-02</td>
                        <td class="px-5 py-4">2025-03-03</td>
                        <td class="px-5 py-4 text-right">Rp 8.000.000</td>
                        <td class="px-5 py-4 text-right">Rp 7.800.000</td>
                        <td class="px-5 py-4 text-center">
                            <span
                                class="inline-flex items-center gap-1 px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-xs font-semibold">
                                <i class="fa-solid fa-spinner"></i> Berjalan
                            </span>
                        </td>
                        <td class="px-5 py-4 text-center">
                            <span
                                class="inline-flex items-center gap-1 px-3 py-1 rounded-full bg-gray-100 text-gray-700 text-xs font-semibold">
                                <i class="fa-solid fa-circle-minus"></i> Belum Disetor
                            </span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
