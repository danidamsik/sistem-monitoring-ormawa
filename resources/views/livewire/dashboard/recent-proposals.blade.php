<div>
    <div class="bg-white rounded-xl shadow-md p-6">
        <h2 class="text-xl font-bold text-gray-800 mb-4">Proposal Terbaru</h2>

        @if ($recentProposals && $recentProposals->count() > 0)
            <div class="space-y-4">
                @foreach ($recentProposals as $index => $proposal)
                    <div
                        class="flex items-center justify-between p-3 {{ $index < $recentProposals->count() - 1 ? 'border-b' : '' }}">
                        <div>
                            <p class="font-medium text-gray-800">{{ $proposal->nama_kegiatan }}</p>
                            <p class="text-sm text-gray-500">{{ $proposal->nama_lembaga }} - {{ $proposal->time_ago }}
                            </p>
                        </div>
                        <span class="{{ $proposal->status['class'] }} text-xs px-2 py-1 rounded-full font-medium">
                            {{ $proposal->status['text'] }}
                        </span>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-8">
                <i class="fas fa-inbox text-gray-300 text-4xl mb-3"></i>
                <p class="text-gray-500">Belum ada proposal terbaru</p>
            </div>
        @endif

        <!-- Link untuk melihat semua -->
        <div class="mt-6 pt-4 border-t">
            <a href="#"
                class="text-purple-600 hover:text-purple-700 text-sm font-medium flex items-center justify-center">
                Lihat Semua Proposal
                <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
    </div>
</div>
