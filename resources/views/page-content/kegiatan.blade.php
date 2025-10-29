@extends('app')

@section('content')
<!-- Statistik Cepat -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
    <div class="bg-white rounded-xl shadow-md p-6 card-hover">
        <div class="flex items-center">
            <div class="p-3 rounded-full bg-blue-100 text-blue-500 mr-4">
                <i class="fas fa-calendar-check text-xl"></i>
            </div>
            <div>
                <p class="text-gray-500 text-sm">Total Kegiatan</p>
                <h3 class="text-2xl font-bold">42</h3>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-md p-6 card-hover">
        <div class="flex items-center">
            <div class="p-3 rounded-full bg-green-100 text-green-500 mr-4">
                <i class="fas fa-running text-xl"></i>
            </div>
            <div>
                <p class="text-gray-500 text-sm">Sedang Berjalan</p>
                <h3 class="text-2xl font-bold">15</h3>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-md p-6 card-hover">
        <div class="flex items-center">
            <div class="p-3 rounded-full bg-purple-100 text-purple-500 mr-4">
                <i class="fas fa-flag-checkered text-xl"></i>
            </div>
            <div>
                <p class="text-gray-500 text-sm">Selesai</p>
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
                <p class="text-gray-500 text-sm">Akan Datang</p>
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
                <option value="akan-datang">Akan Datang</option>
                <option value="berjalan">Sedang Berjalan</option>
                <option value="selesai">Selesai</option>
            </select>
            <input type="month"
                class="border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
        </div>
        <button
            class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-lg transition duration-200 flex items-center">
            <i class="fas fa-plus mr-2"></i> Tambah Kegiatan
        </button>
    </div>
</div>

<!-- Daftar Kegiatan -->
<div class="bg-white rounded-xl shadow-md overflow-hidden mb-6">
    <div class="px-6 py-4 border-b border-gray-200">
        <h2 class="text-lg font-semibold text-gray-800">Daftar Pelaksanaan Kegiatan</h2>
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
                        Mulai</th>
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
                <!-- Baris 1 - Kegiatan Selesai -->
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium text-gray-900">Seminar Kewirausahaan</div>
                        <div class="text-sm text-gray-500">Dana: Rp 5.000.000</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">Himpunan Mahasiswa Informatika</div>
                        <div class="text-sm text-gray-500">081234567890</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">10 Okt 2025</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">15 Okt 2025</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">29 Okt 2025</div>
                        <div class="text-xs text-red-600 font-semibold">Terlambat 5 hari</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span
                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                            Selesai
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <button class="text-blue-600 hover:text-blue-900 mr-3 edit-kegiatan" data-id="1">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="text-red-600 hover:text-red-900 delete-kegiatan" data-id="1">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>

                <!-- Baris 2 - Sedang Berjalan -->
                <tr class="bg-gray-50">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium text-gray-900">Pelatihan Public Speaking</div>
                        <div class="text-sm text-gray-500">Dana: Rp 3.500.000</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">Badan Eksekutif Mahasiswa</div>
                        <div class="text-sm text-gray-500">081298765432</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">25 Okt 2025</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">28 Okt 2025</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">11 Nov 2025</div>
                        <div class="text-xs text-green-600 font-semibold">Reminder terkirim</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span
                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                            Berjalan
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <button class="text-blue-600 hover:text-blue-900 mr-3 edit-kegiatan" data-id="2">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="text-red-600 hover:text-red-900 delete-kegiatan" data-id="2">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>

                <!-- Baris 3 - Akan Datang -->
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium text-gray-900">Lomba Debat Ilmiah</div>
                        <div class="text-sm text-gray-500">Dana: Rp 7.200.000</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">Himpunan Mahasiswa Sastra Inggris</div>
                        <div class="text-sm text-gray-500">081345678901</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">5 Nov 2025</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">7 Nov 2025</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">21 Nov 2025</div>
                        <div class="text-xs text-gray-500">-</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span
                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                            Akan Datang
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <button class="text-blue-600 hover:text-blue-900 mr-3 edit-kegiatan" data-id="3">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="text-red-600 hover:text-red-900 delete-kegiatan" data-id="3">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>

                <!-- Baris 4 - Selesai -->
                <tr class="bg-gray-50">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium text-gray-900">Workshop Kewirausahaan</div>
                        <div class="text-sm text-gray-500">Dana: Rp 4.800.000</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">Himpunan Mahasiswa Ekonomi</div>
                        <div class="text-sm text-gray-500">081356789012</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">20 Okt 2025</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">22 Okt 2025</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">5 Nov 2025</div>
                        <div class="text-xs text-red-600 font-semibold">Terlambat 2 hari</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span
                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                            Selesai
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <button class="text-blue-600 hover:text-blue-900 mr-3 edit-kegiatan" data-id="4">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="text-red-600 hover:text-red-900 delete-kegiatan" data-id="4">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>

                <!-- Baris 5 - Sedang Berjalan -->
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium text-gray-900">Seminar Nasional Teknologi</div>
                        <div class="text-sm text-gray-500">Dana: Rp 12.500.000</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">Himpunan Mahasiswa Teknik</div>
                        <div class="text-sm text-gray-500">081367890123</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">28 Okt 2025</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">30 Okt 2025</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">13 Nov 2025</div>
                        <div class="text-xs text-green-600 font-semibold">Reminder terkirim</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span
                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                            Berjalan
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <button class="text-blue-600 hover:text-blue-900 mr-3 edit-kegiatan" data-id="5">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="text-red-600 hover:text-red-900 delete-kegiatan" data-id="5">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="px-6 py-4 border-t border-gray-200 flex items-center justify-between">
        <div class="text-sm text-gray-700">
            Menampilkan 1 sampai 5 dari 42 kegiatan
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

<!-- Jadwal Kegiatan Mendatang -->
<div class="bg-white rounded-xl shadow-md overflow-hidden">
    <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
        <h2 class="text-lg font-semibold text-gray-800">Kegiatan Mendatang</h2>
        <button class="text-purple-600 hover:text-purple-800 text-sm font-medium">
            Lihat Semua
        </button>
    </div>

    <div class="p-6">
        <div class="space-y-4">
            <!-- Kegiatan 1 -->
            <div class="flex items-center justify-between p-4 border border-gray-200 rounded-lg">
                <div class="flex items-center">
                    <div class="bg-blue-100 text-blue-600 p-3 rounded-lg mr-4">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-800">Lomba Debat Ilmiah</h4>
                        <p class="text-sm text-gray-600">Himpunan Mahasiswa Sastra Inggris</p>
                        <p class="text-xs text-gray-500">5-7 November 2025</p>
                    </div>
                </div>
                <span class="px-3 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">
                    3 hari lagi
                </span>
            </div>

            <!-- Kegiatan 2 -->
            <div class="flex items-center justify-between p-4 border border-gray-200 rounded-lg">
                <div class="flex items-center">
                    <div class="bg-green-100 text-green-600 p-3 rounded-lg mr-4">
                        <i class="fas fa-users"></i>
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-800">Pelatihan Kepemimpinan</h4>
                        <p class="text-sm text-gray-600">Badan Eksekutif Mahasiswa</p>
                        <p class="text-xs text-gray-500">10-12 November 2025</p>
                    </div>
                </div>
                <span class="px-3 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                    8 hari lagi
                </span>
            </div>

            <!-- Kegiatan 3 -->
            <div class="flex items-center justify-between p-4 border border-gray-200 rounded-lg">
                <div class="flex items-center">
                    <div class="bg-purple-100 text-purple-600 p-3 rounded-lg mr-4">
                        <i class="fas fa-laptop-code"></i>
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-800">Workshop Web Development</h4>
                        <p class="text-sm text-gray-600">Himpunan Mahasiswa Informatika</p>
                        <p class="text-xs text-gray-500">15 November 2025</p>
                    </div>
                </div>
                <span class="px-3 py-1 text-xs font-semibold rounded-full bg-purple-100 text-purple-800">
                    13 hari lagi
                </span>
            </div>
        </div>
    </div>
</div>
@endsection
