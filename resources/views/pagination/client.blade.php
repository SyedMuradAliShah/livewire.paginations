@if ($paginator->hasPages())
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">

            {{-- First and Previous Page Links --}}
            <li class="page-item {{ $paginator->onFirstPage() ? 'disabled' : '' }}">
                <a class="page-link" href="{{ $paginator->onFirstPage() ? 'javascript:void(0)' : $paginator->url(1) }}"
                    aria-label="@lang('pagination.first')">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <li class="page-item {{ $paginator->onFirstPage() ? 'disabled' : '' }}">
                <a class="page-link"
                    href="{{ $paginator->onFirstPage() ? 'javascript:void(0)' : $paginator->previousPageUrl() }}"
                    aria-label="@lang('pagination.previous')">
                    <span aria-hidden="true">&lt;</span>
                </a>
            </li>

            {{-- Pagination Elements --}}
            @php
                $current = $paginator->currentPage();
                $last = $paginator->lastPage();
                $delta = 3; // 3 pages before and after the current page
                $startPage = max($current - $delta, 1);
                $endPage = min($current + $delta, $last);
            @endphp

            @for ($page = $startPage; $page <= $endPage; $page++)
                <li class="page-item {{ $page == $current ? 'active' : '' }}">
                    <a class="page-link" href="{{ $paginator->url($page) }}">{{ $page }}</a>
                </li>
            @endfor

            {{-- Next and Last Page Links --}}
            <li class="page-item {{ !$paginator->hasMorePages() ? 'disabled' : '' }}">
                <a class="page-link"
                    href="{{ $paginator->hasMorePages() ? $paginator->nextPageUrl() : 'javascript:void(0)' }}"
                    aria-label="@lang('pagination.next')">
                    <span aria-hidden="true">&gt;</span>
                </a>
            </li>

            <li class="page-item {{ $paginator->currentPage() == $paginator->lastPage() ? 'disabled' : '' }}">
                <a class="page-link"
                    href="{{ $paginator->currentPage() == $paginator->lastPage() ? 'javascript:void(0)' : $paginator->url($paginator->lastPage()) }}"
                    aria-label="@lang('pagination.last')">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>

        </ul>
    </nav>
@endif
