@if ($paginator->hasPages())
    @php
        $pagination_uiid = Str::random(6);

        $current = $paginator->currentPage();
        $last = $paginator->lastPage();
        $delta = 3; // 3 pages before and after the current page
        $startPage = max($current - $delta, 1);
        $endPage = min($current + $delta, $last);
    @endphp

    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">

            {{-- First and Previous Page Links --}}
            <li class="page-item {{ $paginator->onFirstPage() ? 'disabled' : '' }}"
                wire:key="paginator-page-{{ $pagination_uiid }}-first">
                <a class="page-link" href="{{ $paginator->onFirstPage() ? 'javascript:void(0)' : $paginator->url(1) }}"
                    aria-label="@lang('pagination.first')">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <li class="page-item {{ $paginator->onFirstPage() ? 'disabled' : '' }}"
                wire:key="paginator-page-{{ $pagination_uiid }}-previous">
                <a class="page-link"
                    href="{{ $paginator->onFirstPage() ? 'javascript:void(0)' : $paginator->previousPageUrl() }}"
                    aria-label="@lang('pagination.previous')">
                    <span aria-hidden="true">&lt;</span>
                </a>
            </li>

            {{-- Pagination Elements --}}
            @for ($page = $startPage; $page <= $endPage; $page++)
                <li class="page-item {{ $page == $current ? 'active' : '' }}"
                    wire:key="paginator-page-{{ $pagination_uiid }}-{{ $page }}">
                    <a class="page-link" href="{{ $paginator->url($page) }}">{{ $page }}</a>
                </li>
            @endfor

            {{-- Next and Last Page Links --}}
            <li class="page-item {{ !$paginator->hasMorePages() ? 'disabled' : '' }}"
                wire:key="paginator-page-{{ $pagination_uiid }}-next">
                <a class="page-link"
                    href="{{ $paginator->hasMorePages() ? $paginator->nextPageUrl() : 'javascript:void(0)' }}"
                    aria-label="@lang('pagination.next')">
                    <span aria-hidden="true">&gt;</span>
                </a>
            </li>

            <li class="page-item {{ $paginator->currentPage() == $paginator->lastPage() ? 'disabled' : '' }}"
                wire:key="paginator-page-{{ $pagination_uiid }}-last">
                <a class="page-link"
                    href="{{ $paginator->currentPage() == $paginator->lastPage() ? 'javascript:void(0)' : $paginator->url($paginator->lastPage()) }}"
                    aria-label="@lang('pagination.last')">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>

        </ul>
    </nav>
@endif
