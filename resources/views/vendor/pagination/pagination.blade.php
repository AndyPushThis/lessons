@if ($paginator->hasPages())
<div class="pagination-container">
    @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <a class="current-page">{{ $page }}</a>
                @else
                    <a href="{{ $url }}">{{ $page }}</a>
                @endif
            @endforeach
        @endif
    @endforeach
{{--    <a href="#" class="prevposts-link"><i class="fa fa-chevron-left"></i></a>--}}
{{--    <a href="#">1</a>--}}
{{--    <a href="#" class="current-page">2</a>--}}
{{--    <a href="#">3</a>--}}
{{--    <a href="#">4</a>--}}
{{--    <a href="#" class="nextposts-link"><i class="fa fa-chevron-right"></i></a>--}}
</div>
@endif
