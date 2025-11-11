<!-- 🟣 Card Summary: Pelaksanaan Kegiatan -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
    <!-- Total Kegiatan -->
    <div class="bg-white rounded-2xl shadow-md p-5 flex items-center justify-between card-hover border border-gray-100">
        <div>
            <p class="text-sm text-gray-500">Total Kegiatan</p>
            <h3 class="text-2xl font-bold text-purple-700 mt-1">{{ $totalKegiatan }}</h3>
        </div>
        <div class="bg-purple-100 p-3 rounded-xl">
            <i class="fas fa-layer-group text-purple-600 text-xl"></i>
        </div>
    </div>
    
    <!-- Sedang Berlangsung -->
    <div class="bg-white rounded-2xl shadow-md p-5 flex items-center justify-between card-hover border border-gray-100">
        <div>
            <p class="text-sm text-gray-500">Sedang Berlangsung</p>
            <h3 class="text-2xl font-bold text-blue-600 mt-1">{{ $sedangBerlangsung }}</h3>
        </div>
        <div class="bg-blue-100 p-3 rounded-xl">
            <i class="fas fa-calendar-day text-blue-600 text-xl"></i>
        </div>
    </div>
    
    <!-- Belum Setor LPJ -->
    <div class="bg-white rounded-2xl shadow-md p-5 flex items-center justify-between card-hover border border-gray-100">
        <div>
            <p class="text-sm text-gray-500">Belum Setor LPJ</p>
            <h3 class="text-2xl font-bold text-yellow-600 mt-1">{{ $belumSetorLpj }}</h3>
        </div>
        <div class="bg-yellow-100 p-3 rounded-xl">
            <i class="fas fa-exclamation-circle text-yellow-600 text-xl"></i>
        </div>
    </div>
    
    <!-- Sudah Setor LPJ -->
    <div class="bg-white rounded-2xl shadow-md p-5 flex items-center justify-between card-hover border border-gray-100">
        <div>
            <p class="text-sm text-gray-500">Sudah Setor LPJ</p>
            <h3 class="text-2xl font-bold text-green-600 mt-1">{{ $sudahSetorLpj }}</h3>
        </div>
        <div class="bg-green-100 p-3 rounded-xl">
            <i class="fas fa-check-circle text-green-600 text-xl"></i>
        </div>
    </div>
</div>