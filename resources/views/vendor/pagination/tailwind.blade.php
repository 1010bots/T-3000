@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center justify-between">
        <div class="flex justify-between flex-1 sm:hidden">
            @if ($paginator->onFirstPage())
                <x-primitives.card :disabled="true" element="span" class="relative inline-flex items-center px-4 py-2 text-sm font-medium cursor-default leading-5 rounded-md">
                    {!! __('pagination.previous') !!}
                </x-primitives.card>
            @else
                <x-primitives.card element="a" href="{{ $paginator->previousPageUrl() }}" class="relative inline-flex items-center px-4 py-2 text-sm font-medium cursor-default leading-5 rounded-md">
                    {!! __('pagination.previous') !!}
                </x-primitives.card>
            @endif

            @if ($paginator->hasMorePages())
                <x-primitives.card element="a" href="{{ $paginator->nextPageUrl() }}" class="relative inline-flex items-center px-4 py-2 text-sm font-medium cursor-default leading-5 rounded-md">
                    {!! __('pagination.next') !!}
                </x-primitives.card>
            @else
                <x-primitives.card :disabled="true" element="span" class="relative inline-flex items-center px-4 py-2 text-sm font-medium cursor-default leading-5 rounded-md">
                    {!! __('pagination.next') !!}
                </x-primitives.card>
            @endif
        </div>

        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
            <div>
                <p class="text-md leading-5">
                    {!! __('Showing') !!}
                    @if ($paginator->firstItem())
                        <span class="font-semibold">{{ $paginator->firstItem() }}</span>
                        {!! __('to') !!}
                        <span class="font-semibold">{{ $paginator->lastItem() }}</span>
                    @else
                        {{ $paginator->count() }}
                    @endif
                    {!! __('of') !!}
                    <span class="font-semibold">{{ $paginator->total() }}</span>
                    {!! __('results') !!}
                </p>
            </div>

            <div>
                <span class="relative z-0 inline-flex shadow-sm rounded-md">
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        <span aria-disabled="true" aria-label="{{ __('pagination.previous') }}">
                            <x-primitives.card :disabled="true" element="span" class="relative inline-flex items-center px-2 py-2 text-sm font-medium cursor-default rounded-l-md leading-5 border-r-0">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                            </x-primitives.card>
                        </span>
                    @else
                        <x-primitives.card element="a" href="{{ $paginator->previousPageUrl() }}" rel="prev" class="relative inline-flex items-center px-2 py-2 text-sm font-medium rounded-l-md leading-5" aria-label="{{ __('pagination.previous') }}">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                        </x-primitives.card>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <span aria-disabled="true">
                                <x-primitives.card :disabled="true" element="span" class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium cursor-default leading-5 border-x-0">{{ $element }}</x-primitives.card>
                            </span>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <span aria-current="page">
                                        <x-primitives.card element="span" class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium cursor-default leading-5">
                                            {{ $page }}
                                        </x-primitives.card>
                                    </span>
                                @else
                                    <x-primitives.card element="a" href="{{ $url }}" class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium cursor-default leading-5 bg-transparent dark:bg-transparent border-x-0" aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                        {{ $page }}
                                    </x-primitives.card>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <x-primitives.card element="a" href="{{ $paginator->nextPageUrl() }}" rel="prev" class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium rounded-r-md leading-5" aria-label="{{ __('pagination.next') }}">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            </svg>
                        </x-primitives.card>
                    @else
                        <span aria-disabled="true" aria-label="{{ __('pagination.next') }}">
                            <x-primitives.card :disabled="true" element="span" class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium cursor-default rounded-r-md leading-5 border-l-0">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                </svg>
                            </x-primitives.card>
                        </span>
                    @endif
                </span>
            </div>
        </div>
    </nav>
@endif
