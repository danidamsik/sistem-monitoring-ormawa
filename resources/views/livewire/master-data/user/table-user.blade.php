<div class="bg-white/80 shadow-xl rounded-2xl p-8 border border-white/20 hover:shadow-2xl transition-all duration-300">
    <div class="flex flex-col md:flex-row items-start md:items-center justify-between mb-6 gap-4">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Daftar User</h2>
            <p class="text-sm text-gray-500 mt-1">Total: <span class="font-semibold text-purple-600">{{ $users->total() }}
                    user</span>
            </p>
        </div>

        <!-- Search & Filter -->
        <div class="flex items-center gap-3 w-full md:w-auto">
            <!-- Search Box -->
            <div class="relative flex-1 md:w-64">
                <input type="text" wire:model.live.debounce.300ms="search"
                    class="w-full border-2 border-gray-200 rounded-xl px-4 py-2 pl-10 focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-300 outline-none bg-gray-50"
                    placeholder="Cari user...">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
            </div>

            <!-- Per Page Selector -->
            <select wire:model.live="perPage"
                class="border-2 border-gray-200 rounded-xl px-4 py-2 focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-300 outline-none bg-gray-50">
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
            </select>
        </div>
    </div>

    <div class="overflow-x-auto rounded-xl border border-gray-200">
        <table class="w-full">
            <thead>
                <tr class="bg-gradient-to-r from-gray-50 to-gray-100 text-gray-700 text-sm">
                    <th class="py-4 px-6 text-left font-bold">No</th>
                    <th class="py-4 px-6 text-left font-bold">
                        <button wire:click="sortBy('name')" class="flex items-center gap-2 hover:text-purple-600">
                            Nama
                            @if ($sortField === 'name')
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-4 h-4 {{ $sortDirection === 'asc' ? '' : 'rotate-180' }}" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 15l7-7 7 7" />
                                </svg>
                            @endif
                        </button>
                    </th>
                    <th class="py-4 px-6 text-left font-bold">
                        <button wire:click="sortBy('email')" class="flex items-center gap-2 hover:text-purple-600">
                            Email
                            @if ($sortField === 'email')
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-4 h-4 {{ $sortDirection === 'asc' ? '' : 'rotate-180' }}" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 15l7-7 7 7" />
                                </svg>
                            @endif
                        </button>
                    </th>
                    <th class="py-4 px-6 text-center font-bold">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-sm text-gray-700 divide-y divide-gray-100">
                @forelse ($users as $index => $user)
                    <tr class="hover:bg-purple-50/50 transition-all duration-200 group"
                        wire:key="user-{{ $user->id }}">
                        <td class="py-4 px-6">
                            <div
                                class="w-8 h-8 bg-gradient-to-br from-purple-500 to-pink-600 rounded-lg flex items-center justify-center text-white font-bold shadow-sm">
                                {{ $users->firstItem() + $index }}
                            </div>
                        </td>
                        <td class="py-4 px-6">
                            <div class="flex items-center gap-3">
                                <div
                                    class="w-10 h-10 bg-gradient-to-br from-purple-400 to-pink-500 rounded-full flex items-center justify-center text-white font-bold shadow-md">
                                    {{ strtoupper(substr($user->name, 0, 1)) }}
                                </div>
                                <div>
                                    <div
                                        class="font-semibold text-gray-800 group-hover:text-purple-600 transition-colors">
                                        {{ $user->name }}
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="py-4 px-6">
                            <div class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-400" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                <span>{{ $user->email }}</span>
                            </div>
                        </td>
                        <td class="py-4 px-6">
                            <div class="flex justify-center gap-3">

                                <!-- Edit Button -->
                                <button @click="$dispatch('edit-user', {
                                    'user_id': {{$user->id}},
                                    'user_name': '{{$user->name}}',
                                    'email': '{{$user->email}}'
                                })" type="button"
                                    class="group/btn relative flex items-center gap-2 bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white px-4 py-2 rounded-lg transition-all duration-300 shadow-md hover:shadow-lg transform hover:scale-105">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                    <span class="font-medium">Edit</span>
                                </button>

                                <!-- Delete Button -->
                                <button @click="$wire.modal=true; $wire.id={{ $user->id }}"
                                    class="group/btn relative flex items-center gap-2 bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white px-4 py-2 rounded-lg transition-all duration-300 shadow-md hover:shadow-lg transform hover:scale-105">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                    <span class="font-medium">Hapus</span>
                                </button>

                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="py-12 text-center">
                            <div class="flex flex-col items-center gap-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 text-gray-300" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                                </svg>
                                <p class="text-gray-500 font-medium">Tidak ada data user</p>
                                @if ($search)
                                    <p class="text-sm text-gray-400">Coba kata kunci pencarian lain</p>
                                @endif
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    @if ($users->hasPages())
        <div class="mt-6">
            {{ $users->links() }}
        </div>
    @endif
   @include('components.modal-konfirmasi')
</div>
