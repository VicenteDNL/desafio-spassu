@section('form')
    <form id="formBook" method="POST" action="{{ route('books.update', $book->id) }}">
        @csrf
        @method('PUT')
        @include('pages.book.form')
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
@endsection

@extends('layout.base')
@section('layout')
    @include('layout.components.list_actions', [
        'title' => 'Livros',
        'actions' => [
            'view' => route('books.show', $book->id),
            'delete' => route('books.destroy', $book->id),
            'list' => route('books.index'),
        ],
    ])
    @include('layout.components.form_frame', ['caption' => 'Editar livro'])
@endsection
