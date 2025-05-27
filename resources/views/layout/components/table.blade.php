<div class="card shadow-sm my-5 pt-3">
    <div class="card-body px-0 pt-0">

        @if ((is_a($body, Illuminate\Support\Collection::class) && $body->isEmpty()) || empty($body))
            <div class="d-flex justify-content-center">
                <h6>Nenhum registro encontrado</h6>
            </div>
        @else
            <table class=" ps-4 table table-hover">
                <thead class="">
                    @foreach ($header as $h)
                        <td><strong>{{ mb_strtoupper($h, 'UTF-8') }}</strong></td>
                    @endforeach
                    <td><strong>AÇÃO</strong></td>
                </thead>
                <tbody>
                    @foreach ($body as $b)
                        <tr valign="middle">
                            @foreach ($b as $key => $item)
                                @php
                                    $idModal = uniqid();
                                @endphp
                                @if ($key == 'actions')
                                    <td>
                                        <a class="btn btn-sm btn-light" data-bs-toggle="dropdown">
                                            <i class="fa-solid fa-ellipsis-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end p-3 mx-3">
                                            <div class="list-group list-group-flush">
                                                @isset($item['show'])
                                                    <a href="{{ $item['show'] }}" type="button"
                                                        class="list-group-item list-group-item-action p-1 text-light-emphasis">
                                                        <small><i class="fa-solid fa-eye me-2 "></i>Visualizar</small>
                                                    </a>
                                                @endisset
                                                @isset($item['edit'])
                                                    <a href="{{ $item['edit'] }}" type="button"
                                                        class="list-group-item list-group-item-action p-1 text-light-emphasis">
                                                        <small><i class="fa-solid fa-pen-to-square me-2 "></i>Editar</small>
                                                    </a>
                                                @endisset
                                                @isset($item['delete'])
                                                    <button type="button" data-bs-toggle="modal"
                                                        data-bs-target="#{{ $idModal }}"
                                                        class="list-group-item list-group-item-action p-1 text-light-emphasis">
                                                        <small><i class="fa-solid fa-trash me-2"></i>Excluir</small>
                                                    </button>
                                                @endisset
                                            </div>
                                        </div>
                                        @isset($item['delete'])
                                            @include('layout.components.modal_confirm_delete', [
                                                'caption' => 'Realmente deseja excluir?',
                                                'id' => $idModal,
                                                'route' => $item['delete'],
                                            ])
                                        @endisset
                                    </td>
                                @else
                                    <td>{!! $item !!}</td>
                                @endif
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @isset($pagination)
                {{ $pagination() }}
            @endisset
        @endif
    </div>
</div>
