@if ($paginator->hasPages())
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">

            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled" aria-disabled="true">
                    <a class="page-link" href="javascript:void(0)" aria-label="@lang('pagination.previous')">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link"
                        href="{{ str_replace(url()->current(), Livewire::originalUrl(), $paginator->previousPageUrl()) }}"
                        rel="prev" aria-label="@lang('pagination.previous')">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled" aria-disabled="true"><span
                            class="page-link">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active" wire:key="paginator-page-{{ $page }}"><a
                                    class="page-link" href="javascript:void(0)">{{ $page }}</a></li>
                        @else
                            <li class="page-item" wire:key="paginator-page-{{ $page }}"><a class="page-link"
                                    href="{{ str_replace(url()->current(), Livewire::originalUrl(), $url) }}"
                                    wire:navigate.hover>{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link"
                        href="{{ str_replace(url()->current(), Livewire::originalUrl(), $paginator->nextPageUrl()) }}"
                        rel="next" aria-label="@lang('pagination.next')">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            @else
                <li class="page-item disabled" aria-disabled="true">
                    <a class="page-link" href="javascript:void(0)" aria-label="@lang('pagination.next')">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            @endif
        </ul>
    </nav>
@endif
