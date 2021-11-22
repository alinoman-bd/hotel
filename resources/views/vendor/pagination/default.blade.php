@if ($paginator->hasPages())
    <ul class="page-navigation text-center">

            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="first" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <a href="javascript:void(0)"><i class="fa fa-arrow-left"></i></a>
                </li>
            @else
                <li class="first">
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')"><i class="fa fa-arrow-left"></i></a>
                </li>
            @endif

            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="current-page" aria-current="page">{{ $page }}</li>
                        @else
                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            @if ($paginator->hasMorePages())
                <li class="last">
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')"><i class="fa fa-arrow-right"></i></a>
                </li>
            @else
                <li class="last" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <a href="javascript:void(0)"><i class="fa fa-arrow-right"></i></a>
                </li>
            @endif
        </ul>
        @endif