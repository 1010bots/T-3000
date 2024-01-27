@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-between">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <x-primitives.card :disabled="true" element="span" class="relative inline-flex items-center px-4 py-2 text-sm font-medium cursor-default leading-5 rounded-md">
                {!! __('pagination.previous') !!}
            </x-primitives.card>
        @else
            <x-primitives.card element="a" href="{{ $paginator->previousPageUrl() }}" class="relative inline-flex items-center px-4 py-2 text-sm font-medium cursor-default leading-5 rounded-md">
                {!! __('pagination.previous') !!}
            </x-primitives.card>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <x-primitives.card element="a" href="{{ $paginator->nextPageUrl() }}" class="relative inline-flex items-center px-4 py-2 text-sm font-medium cursor-default leading-5 rounded-md">
                {!! __('pagination.next') !!}
            </x-primitives.card>
        @else
            <x-primitives.card :disabled="true" element="span" class="relative inline-flex items-center px-4 py-2 text-sm font-medium cursor-default leading-5 rounded-md">
                {!! __('pagination.next') !!}
            </x-primitives.card>
        @endif
    </nav>
@endif
