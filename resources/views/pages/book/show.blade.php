@extends('layout.base')
@section('layout')
    @include('layout.components.list_actions', [
        'title' => 'Livros',
        'actions' => [
            'edit' => route('books.edit', $book->id),
            'list' => route('books.index'),
        ],
    ])
    @include('layout.components.show', [
        'caption' => 'Detalhes do livro',
        'data' => [
            'Código' => $book->id,
            'Título' => $book->title,
            'Editora' => $book->publisher,
            'Edição' => $book->edition,
            'Ano publicação' => $book->year_publication,
            'Data criação' => (new DateTime($book->created_at))->format('d/m/Y H:i'),
            'Data edição' => (new DateTime($book->updated_at))->format('d/m/Y H:i'),
        ],
    ])
    @include('layout.components.table', [
        'caption' => 'Autores do livro',
        'header' => ['ID', 'Nome', 'Data vinculo'],
        'body' => $book->authors->map(function ($c) use ($book) {
            return [
                $c->id,
                $c->name,
                (new DateTime($c->pivot->updated_at))->format('d/m/Y H:i'),
                'actions' => [
                    'show' => route('authors.show', $c->id),
                    'remove' => route('books.authors.destroy', [$book->id, $c->id]),
                ],
            ];
        }),
    ])
    @include('layout.components.table', [
        'caption' => 'Assuntos do livro',
        'header' => ['ID', 'Descrição', 'Data vinculo'],
        'body' => $book->subjects->map(function ($c) use ($book) {
            return [
                $c->id,
                $c->description,
                (new DateTime($c->pivot->updated_at))->format('d/m/Y H:i'),
                'actions' => [
                    'show' => route('subjects.show', $c->id),
                    'remove' => route('books.subjects.destroy', [$book->id, $c->id]),
                ],
            ];
        }),
    ])
@endsection
