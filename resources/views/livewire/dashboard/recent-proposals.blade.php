<div>
    <div class="bg-white rounded-xl shadow-md p-6">
    <h2 class="text-xl font-bold text-gray-800 mb-4">Proposal Terbaru</h2>
    <div class="mb-4">
        <label class="text-gray-700 font-medium">Tampilkan:</label>
        <select wire:model.live="limit" class="border rounded p-1">
            <option value="5">5 Data</option>
            <option value="10">10 Data</option>
            <option value="15">15 Data</option>
            <option value="20">20 Data</option>
        </select>
    </div>

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
</div>
</div>
