@extends('app')

@section('content')
    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <!-- Total Proposal Kegiatan -->
        <div class="bg-white rounded-xl shadow-md p-6 card-hover">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-500 text-sm">Total Proposal Kegiatan</p>
                    <h3 class="text-3xl font-bold text-gray-800 mt-2">24</h3>
                </div>
                <div class="bg-purple-100 p-3 rounded-lg">
                    <i class="fas fa-file-alt text-purple-600 text-xl"></i>
                </div>
            </div>
            <div class="mt-4">
                <div class="flex items-center text-sm text-green-500">
                    <i class="fas fa-arrow-up mr-1"></i>
                    <span>2 baru minggu ini</span>
                </div>
            </div>
        </div>

        <!-- Menunggu LPJ -->
        <div class="bg-white rounded-xl shadow-md p-6 card-hover">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-500 text-sm">Menunggu LPJ</p>
                    <h3 class="text-3xl font-bold text-gray-800 mt-2">7</h3>
                </div>
                <div class="bg-yellow-100 p-3 rounded-lg">
                    <i class="fas fa-clock text-yellow-600 text-xl"></i>
                </div>
            </div>
            <div class="mt-4">
                <div class="flex items-center text-sm text-yellow-500">
                    <i class="fas fa-exclamation-circle mr-1"></i>
                    <span>Perlu tindakan</span>
                </div>
            </div>
        </div>

        <!-- LPJ Tersetor -->
        <div class="bg-white rounded-xl shadow-md p-6 card-hover">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-500 text-sm">LPJ Tersetor</p>
                    <h3 class="text-3xl font-bold text-gray-800 mt-2">12</h3>
                </div>
                <div class="bg-green-100 p-3 rounded-lg">
                    <i class="fas fa-check-circle text-green-600 text-xl"></i>
                </div>
            </div>
            <div class="mt-4">
                <div class="flex items-center text-sm text-green-500">
                    <i class="fas fa-arrow-up mr-1"></i>
                    <span>5 bulan ini</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart Section -->
    <div class="bg-white rounded-xl shadow-md p-6 mb-8">
        <h2 class="text-xl font-bold text-gray-800 mb-6">Statistik Kegiatan per Bulan</h2>
        <div class="h-80">
            <canvas id="activityChart"></canvas>
        </div>
    </div>

    <!-- Recent Activities -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Recent Proposals -->
        <div class="bg-white rounded-xl shadow-md p-6">
            <h2 class="text-xl font-bold text-gray-800 mb-4">Proposal Terbaru</h2>
            <div class="space-y-4">
                <div class="flex items-center justify-between p-3 border-b">
                    <div>
                        <p class="font-medium">Pekan Olahraga Mahasiswa</p>
                        <p class="text-sm text-gray-500">Himpunan A - 2 hari lalu</p>
                    </div>
                    <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full">Diajukan</span>
                </div>
                <div class="flex items-center justify-between p-3 border-b">
                    <div>
                        <p class="font-medium">Seminar Kewirausahaan</p>
                        <p class="text-sm text-gray-500">Himpunan B - 5 hari lalu</p>
                    </div>
                    <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full">Disetujui</span>
                </div>
                <div class="flex items-center justify-between p-3">
                    <div>
                        <p class="font-medium">Pelatihan Public Speaking</p>
                        <p class="text-sm text-gray-500">UKM C - 1 minggu lalu</p>
                    </div>
                    <span class="bg-yellow-100 text-yellow-800 text-xs px-2 py-1 rounded-full">Review</span>
                </div>
            </div>
        </div>

        <!-- Pending LPJ -->
        <div class="bg-white rounded-xl shadow-md p-6">
            <h2 class="text-xl font-bold text-gray-800 mb-4">LPJ Menunggu</h2>
            <div class="space-y-4">
                <div class="flex items-center justify-between p-3 border-b">
                    <div>
                        <p class="font-medium">Porseni Fakultas</p>
                        <p class="text-sm text-gray-500">BEM Fakultas - Jatuh tempo: 3 hari</p>
                    </div>
                    <span class="bg-red-100 text-red-800 text-xs px-2 py-1 rounded-full">Mendesak</span>
                </div>
                <div class="flex items-center justify-between p-3 border-b">
                    <div>
                        <p class="font-medium">Dies Natalis</p>
                        <p class="text-sm text-gray-500">Senat Mahasiswa - Jatuh tempo: 1 minggu</p>
                    </div>
                    <span class="bg-yellow-100 text-yellow-800 text-xs px-2 py-1 rounded-full">Prioritas</span>
                </div>
                <div class="flex items-center justify-between p-3">
                    <div>
                        <p class="font-medium">Pelatihan Kepemimpinan</p>
                        <p class="text-sm text-gray-500">Himpunan D - Jatuh tempo: 2 minggu</p>
                    </div>
                    <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full">Normal</span>
                </div>
            </div>
        </div>
    </div>
@endsection
