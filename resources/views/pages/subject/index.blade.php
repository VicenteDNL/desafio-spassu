@extends('layout.base', ['title' => 'Assunto - listar'])
@section('layout')
    @include('layout.components.list_actions', [
        'title' => 'Assuntos',
        'actions' => ['create' => route('subjects.create')],
    ])
    @include('layout.components.table', [
        'caption' => 'Lista de assuntos',
        'header' => ['#', 'Descrição', 'Alteração'],
        'pagination' => \Closure::fromCallable([$subjects, 'links']),
        'body' => array_map(function ($c) {
            return [
                $c->id,
                $c->description,
                (new DateTime($c->updated_at))->format('d/m/Y H:i'),
                'actions' => [
                    'show' => route('subjects.show', $c->id),
                    'edit' => route('subjects.edit', $c->id),
                    'delete' => route('subjects.destroy', $c->id),
                ],
            ];
        }, $subjects->items()),
    ])
@endsection
