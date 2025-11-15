<div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50 px-6 py-8">
    <!-- Header Section -->
    <div class="mb-8">
        <div class="flex items-center gap-3 mb-2">
            <div class="w-1 h-8 bg-gradient-to-b from-blue-600 to-indigo-600 rounded-full"></div>
            <h1 class="text-3xl font-bold bg-gradient-to-r from-gray-800 to-gray-600 bg-clip-text text-transparent">
                Master Data Lembaga
            </h1>
        </div>
        <p class="text-gray-500 ml-6">Kelola data lembaga dengan mudah dan efisien</p>
    </div>
    <!-- Card Table -->
    @livewire('master-data.lembaga.table-lembaga')
    <!-- Card Form Input - Dipindah ke atas -->
    @livewire('master-data.lembaga.form-lembaga')
</div>
