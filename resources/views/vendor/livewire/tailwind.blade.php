@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-between mt-6">
        {{-- Previous Page Link --}}
        <div>
            @if ($paginator->onFirstPage())
                <span class="px-3 py-2 text-sm text-gray-400 bg-gray-100 rounded-lg cursor-default">
                    <i class="fa-solid fa-angle-left mr-1"></i> Sebelumnya
                </span>
            @else
                <button wire:click="previousPage" wire:loading.attr="disabled"
                    class="px-3 py-2 text-sm text-gray-700 bg-white border rounded-lg hover:bg-gray-100">
                    <i class="fa-solid fa-angle-left mr-1"></i> Sebelumnya
                </button>
            @endif
        </div>

        {{-- Pagination Numbers --}}
        <div class="hidden sm:flex space-x-1">
            @foreach ($elements as $element)
                @if (is_string($element))
                    <span class="px-3 py-2 text-sm text-gray-500">{{ $element }}</span>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span class="px-3 py-2 text-sm bg-blue-600 text-white rounded-lg">{{ $page }}</span>
                        @else
                            <button wire:click="gotoPage({{ $page }})"
                                class="px-3 py-2 text-sm text-gray-700 bg-white border rounded-lg hover:bg-blue-50 hover:text-blue-600">
                                {{ $page }}
                            </button>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </div>

        {{-- Next Page Link --}}
        <div>
            @if ($paginator->hasMorePages())
                <button wire:click="nextPage" wire:loading.attr="disabled"
                    class="px-3 py-2 text-sm text-gray-700 bg-white border rounded-lg hover:bg-gray-100">
                    Selanjutnya <i class="fa-solid fa-angle-right ml-1"></i>
                </button>
            @else
                <span class="px-3 py-2 text-sm text-gray-400 bg-gray-100 rounded-lg cursor-default">
                    Selanjutnya <i class="fa-solid fa-angle-right ml-1"></i>
                </span>
            @endif
        </div>
    </nav>
@endif
