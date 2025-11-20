@if ($paginator->hasPages())
    <nav role="navigation" class="flex items-center justify-between mt-6 select-none">
        {{-- Info jumlah data --}}
        <div class="text-sm text-gray-600">
            Menampilkan {{ $paginator->firstItem() }}–{{ $paginator->lastItem() }}
            dari {{ $paginator->total() }} data
        </div>

        {{-- Pagination --}}
        <ul class="flex items-center gap-2">
            {{-- Tombol Previous --}}
            @if ($paginator->onFirstPage())
                <li class="px-3 py-1.5 rounded-lg bg-white border border-gray-200 text-gray-400 cursor-not-allowed">
                    <i class="fas fa-chevron-left"></i>
                </li>
            @else
                <li>
                    <button wire:click="previousPage"
                        class="px-3 py-1.5 rounded-lg bg-white border border-gray-300 text-gray-700 hover:bg-gray-100 transition">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                </li>
            @endif

            {{-- Nomor Halaman --}}
            @foreach ($elements as $element)
                @if (is_string($element))
                    <li class="px-3 py-1 text-gray-500">{{ $element }}</li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="px-3 py-1.5 rounded-lg bg-green-600 text-white font-semibold shadow-sm">
                                {{ $page }}
                            </li>
                        @else
                            <li>
                                <button wire:click="gotoPage({{ $page }})"
                                    class="px-3 py-1.5 rounded-lg bg-white border border-gray-300 text-gray-700 hover:bg-green-50 hover:border-green-400 hover:text-green-600 transition">
                                    {{ $page }}
                                </button>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Tombol Next --}}
            @if ($paginator->hasMorePages())
                <li>
                    <button wire:click="nextPage"
                        class="px-3 py-1.5 rounded-lg bg-white border border-gray-300 text-gray-700 hover:bg-gray-100 transition">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </li>
            @else
                <li class="px-3 py-1.5 rounded-lg bg-white border border-gray-200 text-gray-400 cursor-not-allowed">
                    <i class="fas fa-chevron-right"></i>
                </li>
            @endif
        </ul>
    </nav>
@endif
