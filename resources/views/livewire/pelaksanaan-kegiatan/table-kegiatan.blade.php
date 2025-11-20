<div class="bg-white rounded-2xl shadow-md border border-gray-100 p-6">

    <div class="flex flex-col sm:flex-row justify-between items-center mb-5">
        <h2 class="text-xl font-semibold text-gray-700 mb-3 sm:mb-0">Daftar Pelaksanaan Kegiatan</h2>
        <a href="/pelaksanaan-kegiatan/tambah" wire:navigate>
            <button
                class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-lg flex items-center gap-2 shadow-sm transition-all duration-150 ease-in-out">
                <i class="fas fa-plus"></i> Tambah Pelaksanaan
            </button>
        </a>
    </div>

    {{-- Search Box --}}
    <div class="mb-4">
        <input 
            type="text" 
            wire:model.live.debounce.300ms="search" 
            placeholder="Cari kegiatan, lembaga, lokasi..." 
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent"
        >
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full border border-gray-200 text-sm text-left">
            <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
                <tr>
                    <th class="px-4 py-3 border-b">#</th>
                    <th class="px-4 py-3 border-b">Nama Kegiatan</th>
                    <th class="px-4 py-3 border-b">Lembaga</th>
                    <th class="px-4 py-3 border-b">Tanggal Mulai</th>
                    <th class="px-4 py-3 border-b">Tanggal Selesai</th>
                    <th class="px-4 py-3 border-b">Lokasi</th>
                    <th class="px-4 py-3 border-b">Status</th>
                    <th class="px-4 py-3 border-b">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse($pelaksanaans as $index => $pelaksanaan)
                    @php
                        $statusBadge = $this->getStatusBadge($pelaksanaan->status);
                    @endphp
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-4 py-3">{{ $pelaksanaans->firstItem() + $index }}</td>
                        <td class="px-4 py-3 font-medium text-gray-700">{{ $pelaksanaan->nama_kegiatan }}</td>
                        <td class="px-4 py-3">{{ $pelaksanaan->nama_lembaga }}</td>
                        <td class="px-4 py-3">{{ \Carbon\Carbon::parse($pelaksanaan->tanggal_mulai)->format('d/m/Y') }}</td>
                        <td class="px-4 py-3">{{ \Carbon\Carbon::parse($pelaksanaan->tanggal_selesai)->format('d/m/Y') }}</td>
                        <td class="px-4 py-3">{{ $pelaksanaan->lokasi ?? '-' }}</td>
                        <td class="px-4 py-3">
                            <span class="{{ $statusBadge['class'] }} text-xs font-semibold px-2 py-1 rounded-full">
                                {{ $statusBadge['label'] }}
                            </span>
                        </td>
                        <td class="px-4 py-3 flex gap-2">
                            <a href="/pelaksanaan-kegiatan/detail/{{ $pelaksanaan->id }}" 
                               class="text-blue-600 hover:text-blue-800" 
                               title="Lihat Detail">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="/pelaksanaan-kegiatan/edit/{{ $pelaksanaan->id }}"  wire:navigate
                               class="text-yellow-500 hover:text-yellow-600" 
                               title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <button @click="$wire.modal=true; $wire.pelaksanaan_id={{ $pelaksanaan->id }}"
                                class="text-red-500 hover:text-red-700" 
                                title="Hapus">
                                <i class="fas fa-trash"></i>
                            </button>
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

    {{-- Pagination --}}
    <div class="mt-4">
         {{ $pelaksanaans->links('vendor.pagination.simple-tailwind') }}
    </div>

    @include('components.modal-konfirmasi')
</div>