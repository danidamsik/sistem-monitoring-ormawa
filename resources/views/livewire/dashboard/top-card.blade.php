<div>
    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <!-- Total Proposal Kegiatan -->
        <div class="bg-white rounded-xl shadow-md p-6 card-hover">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-500 text-sm">Total Proposal Kegiatan</p>
                    <h3 class="text-3xl font-bold text-gray-800 mt-2">{{ $totalProposal }}</h3>
                </div>
                <div class="bg-purple-100 p-3 rounded-lg">
                    <i class="fas fa-file-alt text-purple-600 text-xl"></i>
                </div>
            </div>
            <div class="mt-4">
                <div class="flex items-center text-sm {{ $proposalBaru > 0 ? 'text-green-500' : 'text-gray-400' }}">
                    @if ($proposalBaru > 0)
                        <i class="fas fa-arrow-up mr-1"></i>
                        <span>{{ $proposalBaru }} baru minggu ini</span>
                    @else
                        <i class="fas fa-minus mr-1"></i>
                        <span>Tidak ada proposal baru</span>
                    @endif
                </div>
            </div>
        </div>

        <!-- Menunggu LPJ -->
        <div class="bg-white rounded-xl shadow-md p-6 card-hover">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-500 text-sm">Menunggu LPJ</p>
                    <h3 class="text-3xl font-bold text-gray-800 mt-2">{{ $menungguLpj }}</h3>
                </div>
                <div class="bg-yellow-100 p-3 rounded-lg">
                    <i class="fas fa-clock text-yellow-600 text-xl"></i>
                </div>
            </div>
            <div class="mt-4">
                <div class="flex items-center text-sm {{ $menungguLpj > 0 ? 'text-yellow-500' : 'text-green-500' }}">
                    @if ($menungguLpj > 0)
                        <i class="fas fa-exclamation-circle mr-1"></i>
                        <span>Perlu tindakan</span>
                    @else
                        <i class="fas fa-check-circle mr-1"></i>
                        <span>Semua LPJ tersetor</span>
                    @endif
                </div>
            </div>
        </div>

        <!-- LPJ Tersetor -->
        <div class="bg-white rounded-xl shadow-md p-6 card-hover">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-500 text-sm">LPJ Tersetor</p>
                    <h3 class="text-3xl font-bold text-gray-800 mt-2">{{ $lpjTersetor }}</h3>
                </div>
                <div class="bg-green-100 p-3 rounded-lg">
                    <i class="fas fa-check-circle text-green-600 text-xl"></i>
                </div>
            </div>
            <div class="mt-4">
                <div class="flex items-center text-sm {{ $lpjBulanIni > 0 ? 'text-green-500' : 'text-gray-400' }}">
                    @if ($lpjBulanIni > 0)
                        <i class="fas fa-arrow-up mr-1"></i>
                        <span>{{ $lpjBulanIni }} bulan ini</span>
                    @else
                        <i class="fas fa-minus mr-1"></i>
                        <span>Belum ada bulan ini</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
