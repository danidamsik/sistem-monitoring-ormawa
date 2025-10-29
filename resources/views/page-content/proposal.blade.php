@extends('app')

@section('content')
    <!-- Form Pengajuan Proposal -->
    <div class="bg-white form-card p-6 mb-6">
        <h2 class="text-xl font-bold text-gray-800 mb-6">Form Pengajuan Proposal</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Kolom Kiri -->
            <div class="space-y-6">
                <!-- Tanggal Proposal Diterima -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal Proposal Diterima</label>
                    <div class="flex items-center">
                        <input type="date"
                            class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                            value="2025-10-12">
                    </div>
                </div>

                <!-- Nama Kegiatan -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Nama Kegiatan</label>
                    <input type="text"
                        class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                        placeholder="Masukkan nama kegiatan">
                </div>

                <!-- Jumlah Dana Disetujui -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Jumlah Dana Disetujui</label>
                    <div class="relative">
                        <span class="absolute left-3 top-3 text-gray-500">Rp</span>
                        <input type="text"
                            class="w-full pl-10 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                            placeholder="0" value="5.000.000">
                    </div>
                </div>
            </div>

            <!-- Kolom Kanan -->
            <div class="space-y-6">
                <!-- Nama Lembaga Penyelenggara -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Nama Lembaga Penyelenggara</label>
                    <select
                        class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                        <option value="">Pilih Lembaga</option>
                        <option value="BEM FT" selected>BEM FT</option>
                        <option value="DEMA">DEMA</option>
                        <option value="HIMATIKA">HIMATIKA</option>
                        <option value="HIMASIP">HIMASIP</option>
                        <option value="BEM Universitas">BEM Universitas</option>
                    </select>
                </div>

                <!-- Jumlah Dana Diajukan -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Jumlah Dana Diajukan</label>
                    <div class="relative">
                        <span class="absolute left-3 top-3 text-gray-500">Rp</span>
                        <input type="text"
                            class="w-full pl-10 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                            placeholder="0" value="5.000.000">
                    </div>
                </div>

                <!-- Nomor HP Penyelenggara -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Nomor HP Penyelenggara</label>
                    <input type="text"
                        class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                        placeholder="08xxxxxxxxxx" value="081234567890">
                </div>
            </div>
        </div>

        <!-- Tombol Aksi -->
        <div class="flex justify-end space-x-4 mt-8">
            <button
                class="px-6 py-3 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition duration-200">
                Batal
            </button>
            <button class="px-6 py-3 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition duration-200">
                Simpan Proposal
            </button>
        </div>
    </div>

    <!-- Pencarian dan Tabel -->
    <div class="bg-white form-card p-6">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
            <h2 class="text-xl font-bold text-gray-800 mb-4 md:mb-0">Daftar Proposal</h2>

            <!-- Pencarian -->
            <div class="w-full md:w-auto">
                <label class="block text-sm font-medium text-gray-700 mb-2">Cari berdasarkan Nama Lembaga</label>
                <div class="relative">
                    <input type="text"
                        class="w-full md:w-64 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                        placeholder="Cari lembaga...">
                    <button class="absolute right-3 top-3 text-gray-500 hover:text-purple-600">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Tabel Proposal -->
        <div class="table-container">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama
                            Kegiatan</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal
                        </th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Dana
                            Diajukan</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Dana
                            Disetujui</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Lembaga
                        </th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-4 whitespace-nowrap text-sm font-medium text-gray-900">1</td>
                        <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-900">Penguatan Kegiatan</td>
                        <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500">12/10/2023</td>
                        <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-900">Rp 5.000.000</td>
                        <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-900">Rp 5.000.000</td>
                        <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-900">BEM FT</td>
                        <td class="px-4 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex space-x-2">
                                <button class="text-green-600 hover:text-green-900" title="Setujui">
                                    <i class="fas fa-check-circle"></i>
                                </button>
                                <button class="text-blue-600 hover:text-blue-900" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-4 whitespace-nowrap text-sm font-medium text-gray-900">2</td>
                        <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-900">Rumah Kilau</td>
                        <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500">05/11/2023</td>
                        <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-900">Rp 4.000.000</td>
                        <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-900">Rp 4.000.000</td>
                        <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-900">DEMA</td>
                        <td class="px-4 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex space-x-2">
                                <button class="text-green-600 hover:text-green-900" title="Setujui">
                                    <i class="fas fa-check-circle"></i>
                                </button>
                                <button class="text-blue-600 hover:text-blue-900" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <!-- Data tambahan untuk contoh -->
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-4 whitespace-nowrap text-sm font-medium text-gray-900">3</td>
                        <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-900">Seminar Nasional</td>
                        <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500">15/09/2023</td>
                        <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-900">Rp 7.500.000</td>
                        <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-900">Rp 6.000.000</td>
                        <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-900">HIMATIKA</td>
                        <td class="px-4 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex space-x-2">
                                <button class="text-green-600 hover:text-green-900" title="Setujui">
                                    <i class="fas fa-check-circle"></i>
                                </button>
                                <button class="text-blue-600 hover:text-blue-900" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="flex items-center justify-between mt-6">
            <div class="text-sm text-gray-700">
                Menampilkan 1 sampai 3 dari 3 entri
            </div>
            <div class="flex space-x-2">
                <button class="px-3 py-1 border border-gray-300 rounded-md text-gray-500 hover:bg-gray-50">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button class="px-3 py-1 bg-purple-600 text-white rounded-md">1</button>
                <button class="px-3 py-1 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50">2</button>
                <button class="px-3 py-1 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50">3</button>
                <button class="px-3 py-1 border border-gray-300 rounded-md text-gray-500 hover:bg-gray-50">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>
    </div>
@endsection
