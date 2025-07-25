<div class="pagination-bx rounded-sm gray clearfix">
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="previous disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                <span aria-hidden="true"><i class="ti-arrow-left"></i> Prev</span>
            </li>
        @else
            <li class="previous">
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')"><i class="ti-arrow-left"></i> Prev</a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active" aria-current="page"><span>{{ $page }}</span></li>
                    @else
                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="next">
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">Next <i class="ti-arrow-right"></i></a>
            </li>
        @else
            <li class="next disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                <span aria-hidden="true">Next <i class="ti-arrow-right"></i></span>
            </li>
        @endif
    </ul>
</div>
