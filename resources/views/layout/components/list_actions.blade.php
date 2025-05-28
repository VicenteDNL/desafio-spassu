<div>
    <div class="d-flex align-items-center mt-5">
        @php
            $icons = [
                'edit' => 'fa-solid fa-pen-to-square',
                'create' => 'fa-solid fa-plus',
                'delete' => '',
                'view' => '',
                'list' => 'fa-solid fa-table',
            ];
            $titleAction = [
                'edit' => 'Editar',
                'create' => 'Novo',
                'delete' => '',
                'view' => '',
                'list' => 'Todos',
            ];
        @endphp

        <div class="d-flex justify-content-between w-100">
            <h5>{{ $title }}</h5>
            <div class="d-flex">
                @foreach ($actions as $key => $action)
                    <a class="btn btn-success shadow-sm d-flex align-items-center ms-2" href="{{ $action }}">
                        <i class="{{ $icons[$key] ?? '' }} me-1"></i> {{ $titleAction[$key] ?? '' }}
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
