<div class="p-6 space-y-8" x-data="{ tahun: @entangle('tahun') }">
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
                <select wire:model.live="tahun"
                    class="h-10 px-3 rounded-lg border border-gray-300 bg-white text-sm focus:outline-none focus:ring-2 focus:ring-blue-400">
                    <option value="2025">2025</option>
                    <option value="2024">2024</option>
                    <option value="2023">2023</option>
                    <option value="2022">2022</option>
                </select>
            </div>

            <!-- Export Buttons -->
            <div class="flex items-center gap-2">
                <!-- Tombol Excel -->
                <button wire:click="exportdataExcel"
                    class="flex items-center gap-2 h-10 px-4 rounded-lg bg-green-600 hover:bg-green-700 text-white text-sm font-medium shadow-sm transition disabled:opacity-50 disabled:cursor-not-allowed"
                    wire:loading.attr="disabled" wire:target="exportdataExcel">

                    <!-- Icon normal -->
                    <i class="fa-solid fa-file-excel" wire:loading.remove wire:target="exportdataExcel"></i>

                    <!-- Loading spinner -->
                    <svg class="animate-spin h-4 w-4 text-white" wire:loading wire:target="exportdataExcel"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                            stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor"
                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                        </path>
                    </svg>

                    <!-- Text normal -->
                    <span wire:loading.remove wire:target="exportdataExcel">Excel</span>

                    <!-- Text loading -->
                    <span wire:loading wire:target="exportdataExcel">Mengekspor...</span>
                </button>

                <!-- Tombol PDF -->
                <button wire:click="exportdataPdf"
                    class="flex items-center gap-2 h-10 px-4 rounded-lg bg-red-600 hover:bg-red-700 text-white text-sm font-medium shadow-sm transition disabled:opacity-50 disabled:cursor-not-allowed"
                    wire:loading.attr="disabled" wire:target="exportdataPdf">

                    <!-- Icon normal -->
                    <i class="fa-solid fa-file-pdf" wire:loading.remove wire:target="exportdataPdf"></i>

                    <!-- Loading spinner -->
                    <svg class="animate-spin h-4 w-4 text-white" wire:loading wire:target="exportdataPdf"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                            stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor"
                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                        </path>
                    </svg>

                    <!-- Text normal -->
                    <span wire:loading.remove wire:target="exportdataPdf">PDF</span>

                    <!-- Text loading -->
                    <span wire:loading wire:target="exportdataPdf">Mengekspor...</span>
                </button>
            </div>
        </div>
    </div>

    <!-- ======== Card Table ======== -->
    <div class="bg-white p-6 rounded-2xl shadow-md border border-gray-100 overflow-hidden">
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
                    @forelse($rekaptulasi as $index => $item)
                        @php
                            $badgePelaksanaan = $this->getStatusPelaksanaanBadge($item->status_pelaksanaan);
                            $badgeLpj = $this->getStatusLpjBadge($item->status_lpj);
                        @endphp
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-5 py-4 font-medium text-gray-800">
                                {{ $rekaptulasi->firstItem() + $index }}
                            </td>
                            <td class="px-5 py-4">{{ $item->nama_lembaga }}</td>
                            <td class="px-5 py-4">{{ $item->nama_kegiatan }}</td>
                            <td class="px-5 py-4">{{ \Carbon\Carbon::parse($item->tanggal_mulai)->format('d M Y') }}
                            </td>
                            <td class="px-5 py-4">{{ \Carbon\Carbon::parse($item->tanggal_selesai)->format('d M Y') }}
                            </td>
                            <td class="px-5 py-4 text-right">{{ $this->formatRupiah($item->dana_diajukan) }}</td>
                            <td class="px-5 py-4 text-right">{{ $this->formatRupiah($item->dana_disetujui) }}</td>
                            <td class="px-5 py-4 text-center">
                                <span
                                    class="inline-flex items-center gap-1 px-3 py-1 rounded-full {{ $badgePelaksanaan['class'] }} text-xs font-semibold">
                                    <i class="fa-solid {{ $badgePelaksanaan['icon'] }}"></i>
                                    {{ $badgePelaksanaan['text'] }}
                                </span>
                            </td>
                            <td class="px-5 py-4 text-center">
                                <span
                                    class="inline-flex items-center gap-1 px-3 py-1 rounded-full {{ $badgeLpj['class'] }} text-xs font-semibold">
                                    <i class="fa-solid {{ $badgeLpj['icon'] }}"></i>
                                    {{ $badgeLpj['text'] }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="px-5 py-12 text-center text-gray-500">
                                <div class="flex flex-col items-center gap-3">
                                    <i class="fa-solid fa-inbox text-4xl text-gray-300"></i>
                                    <p class="text-sm">Tidak ada data untuk tahun {{ $tahun }}</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-4">
         {{ $rekaptulasi->links('vendor.pagination.simple-tailwind') }}
    </div>
    </div>
</div>
