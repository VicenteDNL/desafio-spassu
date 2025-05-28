@php
    $currentPage = $paginator->currentPage();
    $totalPages = $paginator->lastPage();
    $range = 5;

    $start = max(1, $currentPage - 2);
    $end = min($totalPages, $start + $range - 1);

    if ($end - $start < $range - 1) {
        $start = max(1, $end - $range + 1);
    }

@endphp
@if ($paginator->hasPages())

    <div class="d-flex justify-content-between align-items-center mx-3">
        <div>
            Mostrando {{ $paginator->firstItem() }} a {{ $paginator->lastItem() }} de {{ $paginator->total() }}
        </div>
        <nav aria-label="Page navigation">
            <ul class="pagination mb-0">
                <li class="page-item {{ $paginator->onFirstPage() ? 'disabled' : '' }}">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}">
                        <i class="fa-solid fa-backward-step"></i> </a>
                </li>
                @for ($i = $start; $i <= $end; $i++)
                    @if ($i == $currentPage)
                        <li class="page-item active"><a class="page-link"
                                href="{{ $paginator->url($i) }}"><strong>{{ $i }}</strong></a></li>
                    @else
                        <li class="page-item"><a class="page-link"
                                href="{{ $paginator->url($i) }}"><strong>{{ $i }}</strong></a>
                        </li>
                    @endif
                @endfor
                <li class="page-item {{ $paginator->hasMorePages() ? '' : 'disabled' }}"><a class="page-link"
                        href="{{ $paginator->nextPageUrl() }}"><i class="fa-solid fa-forward-step"></i></a></li>
            </ul>
        </nav>
    </div>
@endif
