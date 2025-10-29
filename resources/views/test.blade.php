<main class="flex-1 overflow-y-auto p-4 md:p-6">
    <!-- Header dan Filter -->
    <div class="bg-white rounded-xl shadow-md p-6 mb-6">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Laporan dan Rekap Data</h1>
                <p class="text-gray-600">Rekap lengkap pengajuan proposal, pelaksanaan kegiatan, dan penyetoran LPJ</p>
            </div>
            <div class="flex space-x-3">
                <button class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg transition duration-200 flex items-center">
                    <i class="fas fa-file-excel mr-2"></i> Export Excel
                </button>
                <button class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg transition duration-200 flex items-center">
                    <i class="fas fa-file-pdf mr-2"></i> Export PDF
                </button>
            </div>
        </div>

        <!-- Filter Options -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Bulan</label>
                <select class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                    <option value="">Semua Bulan</option>
                    <option value="1">Januari</option>
                    <option value="2">Februari</option>
                    <option value="3">Maret</option>
                    <option value="4">April</option>
                    <option value="5">Mei</option>
                    <option value="6">Juni</option>
                    <option value="7">Juli</option>
                    <option value="8">Agustus</option>
                    <option value="9">September</option>
                    <option value="10">Oktober</option>
                    <option value="11">November</option>
                    <option value="12">Desember</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Tahun</label>
                <select class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                    <option value="2025">2025</option>
                    <option value="2024">2024</option>
                    <option value="2023">2023</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Lembaga</label>
                <select class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                    <option value="">Semua Lembaga</option>
                    <option value="hmi">Himpunan Mahasiswa Informatika</option>
                    <option value="bem">Badan Eksekutif Mahasiswa</option>
                    <option value="hmsi">Himpunan Mahasiswa Sastra Inggris</option>
                    <option value="hme">Himpunan Mahasiswa Ekonomi</option>
                    <option value="hmt">Himpunan Mahasiswa Teknik</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Status LPJ</label>
                <select class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                    <option value="">Semua Status</option>
                    <option value="sudah">Sudah Disetor</option>
                    <option value="belum">Belum Disetor</option>
                    <option value="terlambat">Terlambat</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Statistik Ringkas -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
        <div class="bg-white rounded-xl shadow-md p-6 card-hover">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-blue-100 text-blue-500 mr-4">
                    <i class="fas fa-file-alt text-xl"></i>
                </div>
                <div>
                    <p class="text-gray-500 text-sm">Total Proposal</p>
                    <h3 class="text-2xl font-bold">48</h3>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-xl shadow-md p-6 card-hover">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-green-100 text-green-500 mr-4">
                    <i class="fas fa-check-circle text-xl"></i>
                </div>
                <div>
                    <p class="text-gray-500 text-sm">LPJ Disetor</p>
                    <h3 class="text-2xl font-bold">35</h3>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-xl shadow-md p-6 card-hover">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-yellow-100 text-yellow-500 mr-4">
                    <i class="fas fa-clock text-xl"></i>
                </div>
                <div>
                    <p class="text-gray-500 text-sm">Menunggu LPJ</p>
                    <h3 class="text-2xl font-bold">8</h3>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-xl shadow-md p-6 card-hover">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-red-100 text-red-500 mr-4">
                    <i class="fas fa-exclamation-triangle text-xl"></i>
                </div>
                <div>
                    <p class="text-gray-500 text-sm">LPJ Terlambat</p>
                    <h3 class="text-2xl font-bold">5</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Grafik Statistik -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
        <!-- Grafik Kegiatan per Bulan -->
        <div class="bg-white rounded-xl shadow-md p-6">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-semibold text-gray-800">Kegiatan per Bulan</h3>
                <select class="border border-gray-300 rounded-lg px-3 py-1 text-sm focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                    <option value="2025">2025</option>
                    <option value="2024">2024</option>
                </select>
            </div>
            <div class="h-64">
                <canvas id="monthlyChart"></canvas>
            </div>
        </div>

        <!-- Grafik Status LPJ -->
        <div class="bg-white rounded-xl shadow-md p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Status Penyetoran LPJ</h3>
            <div class="h-64">
                <canvas id="statusChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Tabel Rekap Data -->
    <div class="bg-white rounded-xl shadow-md overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
            <h2 class="text-lg font-semibold text-gray-800">Rekap Lengkap Kegiatan</h2>
            <div class="text-sm text-gray-600">
                Total: 48 kegiatan | Disetor: 35 | Belum: 8 | Terlambat: 5
            </div>
        </div>
        
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kegiatan</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Lembaga</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Dana</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Batas LPJ</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status LPJ</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <!-- Baris 1 -->
                    <tr>
                        <td class="px-6 py-4">
                            <div class="text-sm font-medium text-gray-900">Seminar Kewirausahaan</div>
                            <div class="text-sm text-gray-500">Proposal: 15 Sep 2025</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">Himpunan Mahasiswa Informatika</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">10-15 Okt 2025</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">Rp 5.000.000</div>
                            <div class="text-xs text-gray-500">Disetujui: Rp 4.500.000</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">29 Okt 2025</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">
                                Terlambat 5 hari
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <button class="text-blue-600 hover:text-blue-900 mr-3 view-detail" data-id="1">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button class="text-green-600 hover:text-green-900 mr-3 print-laporan" data-id="1">
                                <i class="fas fa-print"></i>
                            </button>
                        </td>
                    </tr>
                    
                    <!-- Baris 2 -->
                    <tr class="bg-gray-50">
                        <td class="px-6 py-4">
                            <div class="text-sm font-medium text-gray-900">Pelatihan Public Speaking</div>
                            <div class="text-sm text-gray-500">Proposal: 20 Sep 2025</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">Badan Eksekutif Mahasiswa</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">25-28 Okt 2025</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">Rp 3.500.000</div>
                            <div class="text-xs text-gray-500">Disetujui: Rp 3.200.000</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">11 Nov 2025</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                ✔ Sudah Disetor
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <button class="text-blue-600 hover:text-blue-900 mr-3 view-detail" data-id="2">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button class="text-green-600 hover:text-green-900 mr-3 print-laporan" data-id="2">
                                <i class="fas fa-print"></i>
                            </button>
                        </td>
                    </tr>
                    
                    <!-- Baris 3 -->
                    <tr>
                        <td class="px-6 py-4">
                            <div class="text-sm font-medium text-gray-900">Lomba Debat Ilmiah</div>
                            <div class="text-sm text-gray-500">Proposal: 5 Okt 2025</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">Himpunan Mahasiswa Sastra Inggris</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">5-7 Nov 2025</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">Rp 7.200.000</div>
                            <div class="text-xs text-gray-500">Disetujui: Rp 6.500.000</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">21 Nov 2025</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                ✗ Belum Disetor
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <button class="text-blue-600 hover:text-blue-900 mr-3 view-detail" data-id="3">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button class="text-green-600 hover:text-green-900 mr-3 print-laporan" data-id="3">
                                <i class="fas fa-print"></i>
                            </button>
                        </td>
                    </tr>
                    
                    <!-- Baris 4 -->
                    <tr class="bg-gray-50">
                        <td class="px-6 py-4">
                            <div class="text-sm font-medium text-gray-900">Workshop Kewirausahaan</div>
                            <div class="text-sm text-gray-500">Proposal: 12 Sep 2025</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">Himpunan Mahasiswa Ekonomi</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">20-22 Okt 2025</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">Rp 4.800.000</div>
                            <div class="text-xs text-gray-500">Disetujui: Rp 4.300.000</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">5 Nov 2025</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">
                                Terlambat 2 hari
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <button class="text-blue-600 hover:text-blue-900 mr-3 view-detail" data-id="4">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button class="text-green-600 hover:text-green-900 mr-3 print-laporan" data-id="4">
                                <i class="fas fa-print"></i>
                            </button>
                        </td>
                    </tr>
                    
                    <!-- Baris 5 -->
                    <tr>
                        <td class="px-6 py-4">
                            <div class="text-sm font-medium text-gray-900">Seminar Nasional Teknologi</div>
                            <div class="text-sm text-gray-500">Proposal: 28 Sep 2025</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">Himpunan Mahasiswa Teknik</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">28-30 Okt 2025</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">Rp 12.500.000</div>
                            <div class="text-xs text-gray-500">Disetujui: Rp 11.000.000</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">13 Nov 2025</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                ✔ Sudah Disetor
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <button class="text-blue-600 hover:text-blue-900 mr-3 view-detail" data-id="5">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button class="text-green-600 hover:text-green-900 mr-3 print-laporan" data-id="5">
                                <i class="fas fa-print"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        <div class="px-6 py-4 border-t border-gray-200 flex items-center justify-between">
            <div class="text-sm text-gray-700">
                Menampilkan 1 sampai 5 dari 48 kegiatan
            </div>
            <div class="flex space-x-2">
                <button class="px-3 py-1 rounded-md bg-gray-200 text-gray-700 hover:bg-gray-300">Sebelumnya</button>
                <button class="px-3 py-1 rounded-md bg-purple-600 text-white">1</button>
                <button class="px-3 py-1 rounded-md bg-gray-200 text-gray-700 hover:bg-gray-300">2</button>
                <button class="px-3 py-1 rounded-md bg-gray-200 text-gray-700 hover:bg-gray-300">3</button>
                <button class="px-3 py-1 rounded-md bg-gray-200 text-gray-700 hover:bg-gray-300">4</button>
                <button class="px-3 py-1 rounded-md bg-gray-200 text-gray-700 hover:bg-gray-300">Selanjutnya</button>
            </div>
        </div>
    </div>

    <!-- Ringkasan Keuangan -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mt-6">
        <div class="bg-white rounded-xl shadow-md p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Ringkasan Keuangan</h3>
            <div class="space-y-3">
                <div class="flex justify-between">
                    <span class="text-gray-600">Total Dana Diajukan</span>
                    <span class="font-semibold">Rp 152.400.000</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600">Total Dana Disetujui</span>
                    <span class="font-semibold">Rp 138.750.000</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600">Total Dana Terealisasi</span>
                    <span class="font-semibold">Rp 125.300.000</span>
                </div>
                <div class="border-t pt-2">
                    <div class="flex justify-between">
                        <span class="text-gray-600">Efisiensi Anggaran</span>
                        <span class="font-semibold text-green-600">90.3%</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-md p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Kinerja Lembaga</h3>
            <div class="space-y-3">
                <div class="flex justify-between items-center">
                    <span class="text-gray-600">Himpunan Mahasiswa Informatika</span>
                    <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">85%</span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-gray-600">Badan Eksekutif Mahasiswa</span>
                    <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">92%</span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-gray-600">Himpunan Mahasiswa Sastra Inggris</span>
                    <span class="px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">65%</span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-gray-600">Himpunan Mahasiswa Ekonomi</span>
                    <span class="px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">45%</span>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-md p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Ekspor Data</h3>
            <div class="space-y-3">
                <button class="w-full bg-green-600 hover:bg-green-700 text-white px-4 py-3 rounded-lg transition duration-200 flex items-center justify-center">
                    <i class="fas fa-file-excel mr-2"></i> Export Excel (Semua Data)
                </button>
                <button class="w-full bg-red-600 hover:bg-red-700 text-white px-4 py-3 rounded-lg transition duration-200 flex items-center justify-center">
                    <i class="fas fa-file-pdf mr-2"></i> Export PDF (Semua Data)
                </button>
                <button class="w-full bg-blue-600 hover:bg-blue-700 text-white px-4 py-3 rounded-lg transition duration-200 flex items-center justify-center">
                    <i class="fas fa-print mr-2"></i> Cetak Laporan Bulanan
                </button>
            </div>
        </div>
    </div>
</main>

<!-- Modal Detail Kegiatan -->
<div id="detailModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
    <div class="bg-white rounded-xl p-6 w-full max-w-4xl max-h-[90vh] overflow-y-auto">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-semibold text-gray-800">Detail Kegiatan</h3>
            <button id="closeDetailModal" class="text-gray-500 hover:text-gray-700">
                <i class="fas fa-times"></i>
            </button>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <h4 class="font-semibold text-gray-700 mb-3">Informasi Proposal</h4>
                <div class="space-y-2">
                    <div class="flex justify-between">
                        <span class="text-gray-600">Nama Kegiatan:</span>
                        <span class="font-medium" id="detailNama">-</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Lembaga:</span>
                        <span class="font-medium" id="detailLembaga">-</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Tanggal Proposal:</span>
                        <span class="font-medium" id="detailProposalDate">-</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Dana Diajukan:</span>
                        <span class="font-medium" id="detailDanaAjukan">-</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Dana Disetujui:</span>
                        <span class="font-medium" id="detailDanaSetuju">-</span>
                    </div>
                </div>
            </div>
            
            <div>
                <h4 class="font-semibold text-gray-700 mb-3">Pelaksanaan Kegiatan</h4>
                <div class="space-y-2">
                    <div class="flex justify-between">
                        <span class="text-gray-600">Tanggal Mulai:</span>
                        <span class="font-medium" id="detailMulai">-</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Tanggal Selesai:</span>
                        <span class="font-medium" id="detailSelesai">-</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Batas LPJ:</span>
                        <span class="font-medium" id="detailBatasLPJ">-</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Status LPJ:</span>
                        <span class="font-medium" id="detailStatusLPJ">-</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Tanggal Penyetoran:</span>
                        <span class="font-medium" id="detailTglSetor">-</span>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="mt-6 flex justify-end space-x-3">
            <button class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-100">Tutup</button>
            <button class="px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 flex items-center">
                <i class="fas fa-print mr-2"></i> Cetak Laporan
            </button>
        </div>
    </div>
</div>

<script>
    // Mobile menu toggle
    document.getElementById('menuToggle').addEventListener('click', function() {
        document.querySelector('.sidebar').classList.toggle('active');
    });

    // Chart initialization
    const monthlyCtx = document.getElementById('monthlyChart').getContext('2d');
    const monthlyChart = new Chart(monthlyCtx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Des'],
            datasets: [{
                label: 'Jumlah Kegiatan',
                data: [8, 12, 15, 10, 18, 14, 16, 20, 22, 18, 12, 10],
                backgroundColor: 'rgba(102, 126, 234, 0.7)',
                borderColor: 'rgba(102, 126, 234, 1)',
                borderWidth: 1,
                borderRadius: 5
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 5
                    }
                }
            },
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    });

    const statusCtx = document.getElementById('statusChart').getContext('2d');
    const statusChart = new Chart(statusCtx, {
        type: 'doughnut',
        data: {
            labels: ['Sudah Disetor', 'Belum Disetor', 'Terlambat'],
            datasets: [{
                data: [35, 8, 5],
                backgroundColor: [
                    'rgba(72, 187, 120, 0.8)',
                    'rgba(246, 173, 85, 0.8)',
                    'rgba(245, 101, 101, 0.8)'
                ],
                borderColor: [
                    'rgba(72, 187, 120, 1)',
                    'rgba(246, 173, 85, 1)',
                    'rgba(245, 101, 101, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });

    // Modal elements
    const detailModal = document.getElementById('detailModal');
    const closeDetailModal = document.getElementById('closeDetailModal');

    // View detail buttons
    document.querySelectorAll('.view-detail').forEach(button => {
        button.addEventListener('click', function() {
            const kegiatanId = this.getAttribute('data-id');
            // Di sini akan diambil data dari backend berdasarkan ID
            // Untuk demo, kita isi dengan data dummy
            document.getElementById('detailNama').textContent = 'Seminar Kewirausahaan';
            document.getElementById('detailLembaga').textContent = 'Himpunan Mahasiswa Informatika';
            document.getElementById('detailProposalDate').textContent = '15 September 2025';
            document.getElementById('detailDanaAjukan').textContent = 'Rp 5.000.000';
            document.getElementById('detailDanaSetuju').textContent = 'Rp 4.500.000';
            document.getElementById('detailMulai').textContent = '10 Oktober 2025';
            document.getElementById('detailSelesai').textContent = '15 Oktober 2025';
            document.getElementById('detailBatasLPJ').textContent = '29 Oktober 2025';
            document.getElementById('detailStatusLPJ').textContent = 'Terlambat 5 hari';
            document.getElementById('detailTglSetor').textContent = '3 November 2025';
            
            detailModal.classList.remove('hidden');
        });
    });

    // Print laporan buttons
    document.querySelectorAll('.print-laporan').forEach(button => {
        button.addEventListener('click', function() {
            const kegiatanId = this.getAttribute('data-id');
            alert(`Mencetak laporan untuk kegiatan ID: ${kegiatanId}`);
            // Di sini akan diimplementasikan logika untuk mencetak laporan
        });
    });

    // Export buttons
    document.querySelectorAll('button.bg-green-600, button.bg-red-600').forEach(button => {
        button.addEventListener('click', function() {
            const format = this.classList.contains('bg-green-600') ? 'Excel' : 'PDF';
            alert(`Mengekspor data dalam format ${format}`);
            // Di sini akan diimplementasikan logika untuk ekspor data
        });
    });

    // Close modal
    closeDetailModal.addEventListener('click', function() {
        detailModal.classList.add('hidden');
    });

    // Close modal when clicking outside
    detailModal.addEventListener('click', function(e) {
        if (e.target === detailModal) {
            detailModal.classList.add('hidden');
        }
    });
</script>