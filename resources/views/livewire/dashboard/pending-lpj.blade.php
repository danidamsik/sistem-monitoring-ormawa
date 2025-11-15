<div>
    <div class="bg-white rounded-xl shadow-md p-6">
        <h2 class="text-xl font-bold text-gray-800 mb-4">LPJ Menunggu</h2>

        @if ($pendingLpjs && $pendingLpjs->count() > 0)
            <div class="space-y-4">
                @foreach ($pendingLpjs as $index => $lpj)
                    <div
                        class="flex items-center justify-between p-3 {{ $index < $pendingLpjs->count() - 1 ? 'border-b' : '' }}">
                        <div class="flex-1">
                            <p class="font-medium text-gray-800">{{ $lpj->nama_kegiatan }}</p>
                            <p class="text-sm text-gray-500">{{ $lpj->nama_lembaga }} - {{ $lpj->deadline_text }}</p>

                            @if ($lpj->days_remaining < 0)
                                <p class="text-xs text-red-600 mt-1">
                                    <i class="fas fa-exclamation-triangle"></i>
                                    Sudah melewati tenggat waktu
                                </p>
                            @endif
                        </div>
                        <span
                            class="{{ $lpj->priority['class'] }} text-xs px-2 py-1 rounded-full font-medium whitespace-nowrap ml-3">
                            {{ $lpj->priority['text'] }}
                        </span>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-8">
                <i class="fas fa-check-circle text-green-300 text-4xl mb-3"></i>
                <p class="text-gray-500">Semua LPJ sudah disetor</p>
                <p class="text-sm text-gray-400 mt-1">Tidak ada LPJ yang menunggu</p>
            </div>
        @endif
    </div>
</div>
