<div class="bg-white rounded-xl p-6 shadow-md overflow-hidden">

    <!-- HEADER CARD -->
    <div class="px-6 py-4 border-b border-gray-200 bg-gradient-to-r from-orange-50 to-red-50">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-xl font-semibold text-gray-800 flex items-center">
                    <i class="fas fa-exclamation-triangle text-orange-500 mr-2"></i>
                    LPJ Terlambat
                </h2>
                <p class="text-gray-600 text-sm mt-1">
                    Daftar laporan pertanggungjawaban yang melebihi batas waktu
                </p>
            </div>

            <span class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded-full">
                <i class="fas fa-clock mr-1"></i>
                {{ $lpjTerlambat->total() }} Data
            </span>
        </div>
    </div>

    <!-- FILTER MODERN -->
    <div class="px-6 py-5 bg-white border-b border-gray-200">
        <div class="flex flex-col gap-4 md:flex-row md:items-end md:justify-between">

            <!-- Search -->
            <div class="w-full md:w-2/3">
                <label class="text-sm font-medium text-gray-700 mb-1 block">Cari</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                        <i class="fas fa-search"></i>
                    </span>
                    <input type="text" wire:model.live="search" placeholder="Cari nama kegiatan atau lembaga..."
                        class="w-full pl-10 pr-4 py-2.5 rounded-lg border border-gray-300 bg-gray-50 
                               focus:ring-2 focus:ring-red-400 focus:border-red-400 transition-all">
                </div>
            </div>

            <!-- Filter Nama Lembaga -->
            <div class="w-full md:w-1/3">
                <label class="text-sm font-medium text-gray-700 mb-1 block">
                    Filter Nama Lembaga
                </label>

                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-blue-500">
                        <i class="fas fa-building"></i>
                    </span>

                    <select wire:model.live="lembagaFilter"
                        class="w-full pl-10 pr-4 py-2.5 rounded-lg border border-gray-300 bg-gray-50
           focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition-all">
                        <option value="">Semua Lembaga</option>

                        @foreach ($lembagaList as $l)
                            <option value="{{ $l->id }}">{{ $l->nama_lembaga }}</option>
                        @endforeach
                    </select>

                </div>
            </div>
        </div>
    </div>

    <!-- TABEL -->
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>

                    <!-- ========== KOLUM NO (BARU DITAMBAHKAN) ========== -->
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        <i class="fas fa-hashtag mr-1"></i>
                        No
                    </th>

                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        <i class="fas fa-university mr-1"></i>
                        Nama Lembaga
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        <i class="fas fa-tasks mr-1"></i>
                        Nama Kegiatan
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        <i class="fas fa-calendar-day mr-1"></i>
                        Tanggal Selesai
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        <i class="fas fa-calendar-day mr-1"></i>
                        Tenggat Lpj
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        <i class="fas fa-hourglass-end mr-1"></i>
                        Terlambat
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        <i class="fas fa-cog mr-1"></i>
                        Action
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($lpjTerlambat as $index => $pelaksanaan)
                    <tr class="hover:bg-red-50 transition-colors border-l-4 border-red-500">

                        <!-- ========== NOMOR URUT (BARU DITAMBAHKAN) ========== -->
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            {{ $lpjTerlambat->firstItem() + $index }}
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">
                                        {{ $pelaksanaan->proposal->lembaga->nama_lembaga }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm font-medium text-gray-900">
                                {{ $pelaksanaan->proposal->nama_kegiatan }}
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">
                                {{ \Carbon\Carbon::parse($pelaksanaan->tanggal_selesai)->translatedFormat('d F Y') }}
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">
                                {{ \Carbon\Carbon::parse($pelaksanaan->tanggal_selesai->addWeek())->translatedFormat('d F Y') }}
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @php
                                $terlambat = now()->diffInDays($pelaksanaan->tanggal_selesai->addWeek());
                            @endphp
                            <span
                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                <i class="fas fa-clock mr-1"></i>
                                {{ $terlambat }} Hari
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <a href="/penyetoran-lpj/reminder-whatsapp/send-messege/{{ $pelaksanaan->id }}"
                                wire:navigate>
                                <button
                                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                                    <i class="fas fa-paper-plane mr-1"></i>
                                    Kirim Pesan
                                </button>
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="px-4 py-8 text-center text-gray-500">
                            <i class="fas fa-inbox text-4xl mb-2"></i>
                            <p>Tidak ada data pelaksanaan kegiatan</p>
                        </td>
                    </tr>
                @endforelse

            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $lpjTerlambat->links('vendor.pagination.simple-tailwind') }}
    </div>
</div>
