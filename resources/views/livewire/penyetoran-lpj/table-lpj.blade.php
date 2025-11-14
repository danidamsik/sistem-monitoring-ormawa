<div class="bg-white rounded-xl shadow-md p-6">
    <!-- Header -->
    <div class="flex justify-between items-center mb-5">
        <h2 class="text-xl font-semibold text-gray-800 flex items-center gap-2">
            <i class="fa-solid fa-folder-open text-blue-600"></i>
            Daftar LPJ
        </h2>

        <a href="/penyetoran-lpj/tambah" wire:navigate
            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex items-center gap-2 shadow transition-all duration-200">
            <i class="fa-solid fa-plus"></i>
            <span>Setor LPJ</span>
        </a>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto rounded-lg border border-gray-200">
        <table class="min-w-full text-sm text-gray-700">
            <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
                <tr>
                    <th class="px-4 py-3 text-center border">No</th>
                    <th class="px-4 py-3 border text-left">Nama Kegiatan</th>
                    <th class="px-4 py-3 border text-left">Lembaga</th>
                    <th class="px-4 py-3 border text-left">Tanggal Selesai</th>
                    <th class="px-4 py-3 border text-left">Tenggat LPJ</th>
                    <th class="px-4 py-3 border text-left">Tanggal Disetor</th>
                    <th class="px-4 py-3 border text-left">Status LPJ</th>
                    <th class="px-4 py-3 border text-center">Diperiksa SPI</th>
                    <th class="px-4 py-3 border text-center">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($listLpj as $index => $lpj)
                    <tr class="border-b hover:bg-gray-50 transition">
                        <td class="px-4 py-3 text-center font-medium">
                            {{ $loop->iteration + ($listLpj->currentPage() - 1) * $listLpj->perPage() }}</td>
                        <td class="px-4 py-3">{{ $lpj->nama_kegiatan }}</td>
                        <td class="px-4 py-3">{{ $lpj->nama_lembaga }}</td>
                        <td class="px-4 py-3">{{ $lpj->tanggal_selesai }}</td>
                        <td class="px-4 py-3">{{ $lpj->tenggat_lpj }}</td>
                        <td class="px-4 py-3">{{ $lpj->tanggal_disetor ?? '-' }}</td>
                        <td
                            class="px-4 py-3 font-semibold
                            {{ $lpj->status_lpj === 'Di Setujui'
                                ? 'text-green-600'
                                : ($lpj->status_lpj === 'Menunggu Diperiksa'
                                    ? 'text-yellow-600'
                                    : 'text-red-600') }}">
                            {{ $lpj->status_lpj }}
                        </td>
                        <td class="px-4 py-3 text-center">
                            @if ($lpj->diperiksa_spi)
                                <i class="fa-solid fa-check text-green-500"></i>
                            @else
                                <i class="fa-solid fa-xmark text-red-500"></i>
                            @endif
                        </td>
                        <td class="px-4 py-3 text-center">
                            <div class="flex items-center justify-center space-x-2">
                                <!-- Tombol Edit -->
                                <a href="/penyetoran-lpj/edit/{{ $lpj->id }}" wire:navigate>
                                    <button
                                        class="inline-flex items-center justify-center w-8 h-8 rounded-md text-yellow-500 hover:text-yellow-600 hover:bg-yellow-50 transition">
                                        <i class="fa-solid fa-pen-to-square text-sm"></i>
                                    </button>
                                </a>

                                <!-- Tombol Hapus -->
                                <button @click="$wire.modal=true; $wire.lpjs_id = {{$lpj->id}}"
                                    class="inline-flex items-center justify-center w-8 h-8 rounded-md text-red-500 hover:text-red-600 hover:bg-red-50 transition">
                                    <i class="fa-solid fa-trash text-sm"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="px-4 py-6 text-center text-gray-500 italic">
                            Tidak ada data LPJ.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-5">
        {{ $listLpj->links('vendor.livewire.tailwind') }}
    </div>

    @include('component.modal-konfirmasi')
</div>
