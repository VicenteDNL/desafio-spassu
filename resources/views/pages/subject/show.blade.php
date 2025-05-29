@extends('layout.base', ['title' => 'Assunto - criar'])
@section('layout')
    @include('layout.components.list_actions', [
        'title' => 'Assuntos',
        'actions' => [
            'edit' => route('subjects.edit', $subject->id),
            'delete' => route('subjects.destroy', $subject->id),
            'list' => route('subjects.index'),
        ],
    ])
    @include('layout.components.show', [
        'caption' => 'Detalhes do Assunto',
        'data' => [
            'Código' => $subject->id,
            'Descrição' => $subject->description,
            'Data criação' => (new DateTime($subject->created_at))->format('d/m/Y H:i'),
            'Data edição' => (new DateTime($subject->updated_at))->format('d/m/Y H:i'),
        ],
    ])
    @include('layout.components.table', [
        'caption' => 'Livros com este assunto',
        'header' => ['#', 'Título', 'Editora', 'Edição', 'Ano publicação', 'Alteração'],
        'body' => $subject->books->map(function ($c) use ($subject) {
            return [
                $c->id,
                $c->title,
                $c->publisher,
                $c->edition,
                $c->year_publication,
                (new DateTime($c->pivot->updated_at))->format('d/m/Y H:i'),
                'actions' => [
                    'show' => route('books.show', $c->id),
                    'remove' => route('books.subjects.destroy', [$c->id, $subject->id]),
                ],
            ];
        }),
    ])
@endsection
