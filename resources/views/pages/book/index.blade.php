@extends('layout.base')
@section('layout')
    @include('layout.components.list_actions', [
        'title' => 'Livros',
        'actions' => ['create' => route('books.create')],
    ])
    @include('layout.components.table', [
        'caption' => 'Lista de Autores',
        'header' => ['#', 'Título', 'Editora', 'Edição', 'Ano publicação'],
        'pagination' => \Closure::fromCallable([$books, 'links']),
        'body' => array_map(function ($c) {
            return [
                $c->id,
                $c->title,
                $c->publisher,
                $c->edition,
                $c->year_publication,
                (new DateTime($c->updated_at))->format('d/m/Y H:i'),
                'actions' => [
                    'show' => route('books.show', $c->id),
                    'edit' => route('books.edit', $c->id),
                    'delete' => route('books.destroy', $c->id),
                ],
            ];
        }, $books->items()),
    ])
@endsection
