<div>
    <div class="d-flex align-items-center mt-5">
        @php
            $icons = [
                'edit' => 'fa-solid fa-pen-to-square',
                'create' => 'fa-solid fa-plus',
                'delete' => 'fa-solid fa-trash',
                'view' => 'fa-solid fa-eye',
                'list' => 'fa-solid fa-table',
            ];
            $titleAction = [
                'edit' => 'Editar',
                'create' => 'Novo',
                'delete' => 'Excluir',
                'view' => 'Visualizar',
                'list' => 'Todos',
            ];

            $class = [
                'edit' => 'btn btn-warning',
                'create' => 'btn btn-success',
                'delete' => 'btn btn-danger',
                'view' => 'btn btn-info',
                'list' => 'btn btn-secondary',
            ];
        @endphp

        <div class="d-flex justify-content-between w-100">
            <h5>{{ $title }}</h5>
            <div class="d-flex">
                @foreach ($actions as $key => $action)
                    @if ($key == 'delete')
                        <button type="button" class="{{ $class[$key] }} d-flex align-items-center shadow-sm ms-2"
                            data-bs-toggle="modal" data-bs-target="#{{ $action }}"
                            class="list-group-item list-group-item-action p-1 text-light-emphasis">
                            <small><i class="fa-solid fa-trash me-2"></i>Excluir</small>
                        </button>
                        @include('layout.components.modal_confirm_delete', [
                            'caption' => 'Realmente deseja excluir?',
                            'id' => $action,
                            'route' => $action,
                        ])
                    @else
                        <a class="{{ $class[$key] }} shadow-sm d-flex align-items-center ms-2"
                            href="{{ $action }}">
                            <i class="{{ $icons[$key] ?? '' }} me-1"></i> {{ $titleAction[$key] ?? '' }}
                        </a>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
