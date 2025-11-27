<div class="bg-white rounded-2xl shadow-md border border-gray-100 p-6" x-data="{ 
    showDetail: false,
    selectedData: {
        nama_kegiatan: '',
        nama_lembaga: '',
        lokasi: '',
        tanggal_mulai: '',
        tanggal_selesai: '',
        penanggung_jawab: '',
        no_pj: '',
        dana_disetujui: '',
        status: '',
        keterangan: ''
    },
    
    openDetail(data) {
        this.selectedData = {
            nama_kegiatan: data.nama_kegiatan,
            nama_lembaga: data.nama_lembaga,
            lokasi: data.lokasi || '-',
            tanggal_mulai: data.tanggal_mulai,
            tanggal_selesai: data.tanggal_selesai,
            penanggung_jawab: data.penanggung_jawab,
            no_pj: data.no_pj,
            dana_disetujui: data.dana_disetujui,
            status: data.status,
            keterangan: data.keterangan || '-'
        };
        this.showDetail = true;
    },
    
    formatRupiah(angka) {
        return 'Rp ' + new Intl.NumberFormat('id-ID').format(angka);
    },
    
    formatTanggal(tanggal) {
        return tanggal; // Sudah diformat dari backend
    },
    
    getStatusDisplay(status) {
        const statusMap = {
            'belum_dimulai': { label: 'Belum Dimulai', class: 'bg-yellow-100 text-yellow-700', icon: 'fa-clock' },
            'sedang_berlangsung': { label: 'Sedang Berlangsung', class: 'bg-blue-100 text-blue-700', icon: 'fa-spinner' },
            'selesai': { label: 'Selesai', class: 'bg-green-100 text-green-700', icon: 'fa-check-circle' }
        };
        return statusMap[status] || { label: status, class: 'bg-gray-100 text-gray-700', icon: 'fa-circle' };
    }
}">

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
        <input type="text" wire:model.live.debounce.300ms="search" placeholder="Cari kegiatan, lembaga, lokasi..."
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">
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
                        <td class="px-4 py-3">
                            {{ \Carbon\Carbon::parse($pelaksanaan->tanggal_mulai)->translatedFormat('d F Y') }}</td>
                        <td class="px-4 py-3">
                            {{ \Carbon\Carbon::parse($pelaksanaan->tanggal_selesai)->translatedFormat('d F Y') }}</td>
                        <td class="px-4 py-3">{{ $pelaksanaan->lokasi ?? '-' }}</td>
                        <td class="px-4 py-3">
                            <span class="{{ $statusBadge['class'] }} text-xs font-semibold px-2 py-1 rounded-full">
                                {{ $statusBadge['label'] }}
                            </span>
                        </td>
                        <td class="px-4 py-3 flex gap-2">
                            <button @click="openDetail({
                                nama_kegiatan: '{{ $pelaksanaan->nama_kegiatan }}',
                                nama_lembaga: '{{ $pelaksanaan->nama_lembaga }}',
                                lokasi: '{{ $pelaksanaan->lokasi }}',
                                tanggal_mulai: '{{ \Carbon\Carbon::parse($pelaksanaan->tanggal_mulai)->translatedFormat("d F Y") }}',
                                tanggal_selesai: '{{ \Carbon\Carbon::parse($pelaksanaan->tanggal_selesai)->translatedFormat("d F Y") }}',
                                penanggung_jawab: '{{ $pelaksanaan->penanggung_jawab }}',
                                no_pj: '{{ $pelaksanaan->no_pj }}',
                                dana_disetujui: '{{ $pelaksanaan->dana_disetujui }}',
                                status: '{{ $pelaksanaan->status }}',
                                keterangan: '{{ $pelaksanaan->keterangan }}'
                            })" class="text-blue-600 hover:text-blue-800" title="Lihat Detail">
                                <i class="fas fa-eye"></i>
                            </button>
                            <a href="/pelaksanaan-kegiatan/edit/{{ $pelaksanaan->id }}" wire:navigate
                                class="text-yellow-500 hover:text-yellow-600" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <button @click="$wire.modal=true; $wire.pelaksanaan_id={{ $pelaksanaan->id }}"
                                class="text-red-500 hover:text-red-700" title="Hapus">
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
    @include('components.modal-detail-kegiatan')
</div>