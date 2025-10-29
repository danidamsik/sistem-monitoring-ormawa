@extends('app')

@section('content')
    <!-- Statistik Cepat -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        <div class="bg-white rounded-xl shadow-md p-6 card-hover">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-blue-100 text-blue-500 mr-4">
                    <i class="fas fa-file-invoice text-xl"></i>
                </div>
                <div>
                    <p class="text-gray-500 text-sm">Total LPJ Disetor</p>
                    <h3 class="text-2xl font-bold">24</h3>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-md p-6 card-hover">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-yellow-100 text-yellow-500 mr-4">
                    <i class="fas fa-clock text-xl"></i>
                </div>
                <div>
                    <p class="text-gray-500 text-sm">Menunggu Penyetoran</p>
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
                    <h3 class="text-2xl font-bold">3</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Filter dan Pencarian -->
    <div class="bg-white rounded-xl shadow-md p-6 mb-6">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div class="flex flex-col md:flex-row gap-4">
                <div class="relative">
                    <input type="text" placeholder="Cari nama kegiatan atau lembaga..."
                        class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent w-full md:w-64">
                    <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                </div>
                <select
                    class="border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                    <option value="">Semua Status</option>
                    <option value="sudah">Sudah Disetor</option>
                    <option value="belum">Belum Disetor</option>
                    <option value="terlambat">Terlambat</option>
                </select>
            </div>
            <button
                class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-lg transition duration-200 flex items-center">
                <i class="fas fa-print mr-2"></i> Cetak Laporan
            </button>
        </div>
    </div>

    <!-- Daftar Kegiatan untuk Penyetoran LPJ -->
    <div class="bg-white rounded-xl shadow-md overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200">
            <h2 class="text-lg font-semibold text-gray-800">Daftar Kegiatan - Status Penyetoran LPJ</h2>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama
                            Kegiatan</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Lembaga
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal
                            Selesai</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Batas LPJ
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <!-- Baris 1 -->
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">Seminar Kewirausahaan</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">Himpunan Mahasiswa Informatika</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">15 Oktober 2025</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">29 Oktober 2025</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="status-late">Terlambat 5 hari</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <button class="text-green-600 hover:text-green-900 mr-3 update-status" data-id="1"
                                data-status="sudah">
                                <i class="fas fa-check-circle"></i> ✔
                            </button>
                            <button class="text-red-600 hover:text-red-900 mr-3 update-status" data-id="1"
                                data-status="belum">
                                <i class="fas fa-times-circle"></i> ✗
                            </button>
                            <button class="text-blue-600 hover:text-blue-900 print-laporan" data-id="1">
                                <i class="fas fa-print"></i>
                            </button>
                        </td>
                    </tr>

                    <!-- Baris 2 -->
                    <tr class="bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">Pelatihan Public Speaking</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">Badan Eksekutif Mahasiswa</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">20 Oktober 2025</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">3 November 2025</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="status-on-time">✔ Sudah Disetor</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <button class="text-green-600 hover:text-green-900 mr-3 update-status" data-id="2"
                                data-status="sudah">
                                <i class="fas fa-check-circle"></i> ✔
                            </button>
                            <button class="text-red-600 hover:text-red-900 mr-3 update-status" data-id="2"
                                data-status="belum">
                                <i class="fas fa-times-circle"></i> ✗
                            </button>
                            <button class="text-blue-600 hover:text-blue-900 print-laporan" data-id="2">
                                <i class="fas fa-print"></i>
                            </button>
                        </td>
                    </tr>

                    <!-- Baris 3 -->
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">Lomba Debat Ilmiah</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">Himpunan Mahasiswa Sastra Inggris</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">25 Oktober 2025</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">8 November 2025</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="text-yellow-600 font-semibold">✗ Belum Disetor</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <button class="text-green-600 hover:text-green-900 mr-3 update-status" data-id="3"
                                data-status="sudah">
                                <i class="fas fa-check-circle"></i> ✔
                            </button>
                            <button class="text-red-600 hover:text-red-900 mr-3 update-status" data-id="3"
                                data-status="belum">
                                <i class="fas fa-times-circle"></i> ✗
                            </button>
                            <button class="text-blue-600 hover:text-blue-900 print-laporan" data-id="3">
                                <i class="fas fa-print"></i>
                            </button>
                        </td>
                    </tr>

                    <!-- Baris 4 -->
                    <tr class="bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">Workshop Kewirausahaan</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">Himpunan Mahasiswa Ekonomi</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">28 Oktober 2025</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">11 November 2025</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="status-late">Terlambat 2 hari</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <button class="text-green-600 hover:text-green-900 mr-3 update-status" data-id="4"
                                data-status="sudah">
                                <i class="fas fa-check-circle"></i> ✔
                            </button>
                            <button class="text-red-600 hover:text-red-900 mr-3 update-status" data-id="4"
                                data-status="belum">
                                <i class="fas fa-times-circle"></i> ✗
                            </button>
                            <button class="text-blue-600 hover:text-blue-900 print-laporan" data-id="4">
                                <i class="fas fa-print"></i>
                            </button>
                        </td>
                    </tr>

                    <!-- Baris 5 -->
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">Seminar Nasional Teknologi</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">Himpunan Mahasiswa Teknik</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">1 November 2025</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">15 November 2025</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="status-on-time">✔ Sudah Disetor</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <button class="text-green-600 hover:text-green-900 mr-3 update-status" data-id="5"
                                data-status="sudah">
                                <i class="fas fa-check-circle"></i> ✔
                            </button>
                            <button class="text-red-600 hover:text-red-900 mr-3 update-status" data-id="5"
                                data-status="belum">
                                <i class="fas fa-times-circle"></i> ✗
                            </button>
                            <button class="text-blue-600 hover:text-blue-900 print-laporan" data-id="5">
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
                Menampilkan 1 sampai 5 dari 32 kegiatan
            </div>
            <div class="flex space-x-2">
                <button class="px-3 py-1 rounded-md bg-gray-200 text-gray-700 hover:bg-gray-300">Sebelumnya</button>
                <button class="px-3 py-1 rounded-md bg-purple-600 text-white">1</button>
                <button class="px-3 py-1 rounded-md bg-gray-200 text-gray-700 hover:bg-gray-300">2</button>
                <button class="px-3 py-1 rounded-md bg-gray-200 text-gray-700 hover:bg-gray-300">3</button>
                <button class="px-3 py-1 rounded-md bg-gray-200 text-gray-700 hover:bg-gray-300">Selanjutnya</button>
            </div>
        </div>
    </div>
@endsection
