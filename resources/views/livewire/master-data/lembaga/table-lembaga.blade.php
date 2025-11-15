<div
    class="bg-white/80 shadow-xl rounded-2xl p-8 border border-white/20 hover:shadow-2xl transition-all duration-300 mb-12">
    <!-- Header -->
    <div class="flex items-center justify-between mb-6">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Daftar Lembaga</h2>
            <p class="text-sm text-gray-500 mt-1">
                Total:
                <span class="font-semibold text-blue-600">{{ $lembaga->total() }} lembaga</span>
            </p>
        </div>

        <!-- Icon -->
        <div class="hidden md:block">
            <div
                class="w-12 h-12 bg-gradient-to-br from-blue-400 to-indigo-600 rounded-xl flex items-center justify-center shadow-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
            </div>
        </div>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto rounded-xl border border-gray-200">
        <table class="w-full">
            <thead>
                <tr class="bg-gradient-to-r from-gray-50 to-gray-100 text-gray-700 text-sm">
                    <th class="py-4 px-6 text-left font-semibold">No</th>
                    <th class="py-4 px-6 text-left font-semibold">Nama Lembaga</th>
                    <th class="py-4 px-6 text-left font-semibold">No HP</th>
                    <th class="py-4 px-6 text-left font-semibold">Email</th>
                    <th class="py-4 px-6 text-center font-semibold">Aksi</th>
                </tr>
            </thead>

            <tbody class="text-sm text-gray-700 divide-y divide-gray-100">
                @forelse ($lembaga as $index => $item)
                    <tr class="hover:bg-blue-50/40 transition-all duration-200 group">
                        <!-- Nomor Urut -->
                        <td class="py-4 px-6">
                            <div
                                class="w-8 h-8 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-lg flex items-center justify-center text-white font-bold shadow">
                                {{ $lembaga->firstItem() + $index }}
                            </div>
                        </td>

                        <!-- Nama -->
                        <td class="py-4 px-6 font-semibold text-gray-800 group-hover:text-blue-600 transition-colors">
                            {{ $item->nama_lembaga }}
                        </td>

                        <!-- No HP -->
                        <td class="py-4 px-6">
                            <div class="flex items-center gap-2">
                                <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
                                <span>{{ $item->nomor_hp }}</span>
                            </div>
                        </td>

                        <!-- Email -->
                        <td class="py-4 px-6">
                            <div class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-400" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                <span>{{ $item->email }}</span>
                            </div>
                        </td>

                        <!-- Tombol Aksi -->
                        <td class="py-4 px-6">
                            <div class="flex justify-center gap-3">
                                <!-- Edit -->
                                <button
                                    @click="$dispatch('edit', {
                                                id_lembaga: {{ $item->id }},
                                                nama_lembaga: '{{ $item->nama_lembaga }}',
                                                nomor_hp: '{{ $item->nomor_hp }}',
                                                email: '{{ $item->email }}'
                                            })" class="flex items-center gap-2 bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg shadow transition-all hover:scale-105">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                    <span>Edit</span>
                                </button>

                                <!-- Hapus -->
                                <button @click="$wire.id = {{ $item->id }}; $wire.modal= true"
                                    class="flex items-center gap-2 bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg shadow transition-all hover:scale-105">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                    <span>Hapus</span>
                                </button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-8">
                            <div class="flex flex-col items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 text-gray-300 mb-3"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                                </svg>
                                <p class="text-gray-500 font-medium">Belum ada data lembaga</p>
                                <p class="text-gray-400 text-sm mt-1">Data akan muncul di sini setelah ditambahkan</p>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $lembaga->links() }}
    </div>

    @include('components.modal-konfirmasi')
</div>
