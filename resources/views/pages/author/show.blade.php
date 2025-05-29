@extends('layout.base', ['title' => 'Autor - criar'])
@section('layout')
    @include('layout.components.list_actions', [
        'title' => 'Autores',
        'actions' => [
            'edit' => route('authors.edit', $author->id),
            'delete' => route('authors.destroy', $author->id),
            'list' => route('authors.index'),
        ],
    ])
    @include('layout.components.show', [
        'caption' => 'Detalhes do Autor',
        'data' => [
            'Código' => $author->id,
            'Nome' => $author->name,
            'Data criação' => (new DateTime($author->created_at))->format('d/m/Y H:i'),
            'Data edição' => (new DateTime($author->updated_at))->format('d/m/Y H:i'),
        ],
    ])
    @include('layout.components.table', [
        'caption' => 'Livro do autor',
        'header' => ['#', 'Título', 'Editora', 'Edição', 'Ano publicação', 'Alteração'],
        'body' => $author->books->map(function ($c) use ($author) {
            return [
                $c->id,
                $c->title,
                $c->publisher,
                $c->edition,
                $c->year_publication,
                (new DateTime($c->pivot->updated_at))->format('d/m/Y H:i'),
                'actions' => [
                    'show' => route('books.show', $c->id),
                    'remove' => route('books.authors.destroy', [$c->id, $author->id]),
                ],
            ];
        }),
    ])
@endsection
