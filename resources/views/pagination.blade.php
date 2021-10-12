@if ($records->lastPage() > 1)
<ul class="pagination">
    @for ($i = 1; $i <= $records->lastPage(); $i++)
        <li class="{{ ($records->currentPage() == $i) ? ' active' : '' }}">
            <a href="{{ $records->url($i) }}">{{ $i }}</a>
        </li>
    @endfor
</ul>
@endif