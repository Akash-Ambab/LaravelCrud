@if ($records->lastPage() > 1)
<ul class="pagination">
    @if (!$records->onFirstPage())
        <li>
            <a href="{{ $records->url(1) }}">First Page</a>
        </li>
        <li>
            <a href="{{ $records->previousPageUrl() }}"><<</a>
        </li>
    @endif

    @if($records->currentPage() <= 2)
        @for ($i = 1; $i <= 5; $i++)
        <li class="{{ ($records->currentPage() == $i) ? ' active' : '' }}">
            <a href="{{ $records->url($i) }}">{{ $i }}</a>
        </li>
        @endfor

    @else

        @for ($i = 1; $i <= $records->lastPage(); $i++)
            @if($i >= $records->currentPage() - 2 && $i <= $records->currentPage() + 2)
                <li class="{{ ($records->currentPage() == $i) ? ' active' : '' }}">
                    <a href="{{ $records->url($i) }}">{{ $i }}</a>
                </li>
            @endif
        @endfor
    @endif

    @if ($records->currentPage() != $records->lastPage())
        <li>
            <a href="{{ $records->nextPageUrl() }}">>></a>
        </li>
        <li>
            <a href="{{ $records->url($records->lastPage()) }}">Last Page</a>
        </li>
    @endif
</ul>
@endif