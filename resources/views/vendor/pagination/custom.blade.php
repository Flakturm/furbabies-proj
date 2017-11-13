@if ($paginator->hasPages())
    <nav class="pagination d-none d-sm-block">
        {{-- Previous Page Link --}}
        @if (! $paginator->onFirstPage() )
            <a href="{{ $paginator->previousPageUrl() }}" class="fixed-nav transition pr-sm-2 prev" rel="prev"><i class="fa fa-5x fa-chevron-left" aria-hidden="true"></i></a>
        @endif

        {{-- Next Page Link --}}
        @if ( $paginator->hasMorePages() )
            <a href="{{ $paginator->nextPageUrl() }}" class="fixed-nav transition pl-sm-2 next" rel="next"><i class="fa fa-5x fa-chevron-right" aria-hidden="true"></i></a>
        @endif
    </nav>
@endif
