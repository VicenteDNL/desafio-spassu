@extends('layout.base')
@section('layout')
    @include('layout.components.list_actions', [
        'title' => 'Autores',
        'actions' => ['create' => route('authors.create')],
    ])
    @include('layout.components.table', [
        'caption' => 'Lista de Autores',
        'header' => ['#', 'Nome', 'Alteração'],
        'pagination' => \Closure::fromCallable([$authors, 'links']),
        'body' => array_map(function ($c) {
            return [
                $c->id,
                $c->name,
                (new DateTime($c->updated_at))->format('d/m/Y H:i'),
                'actions' => [
                    'show' => route('authors.show', $c->id),
                    'edit' => route('authors.edit', $c->id),
                    'delete' => route('authors.destroy', $c->id),
                ],
            ];
        }, $authors->items()),
    ])
@endsection
