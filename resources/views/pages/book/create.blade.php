@section('form')
    <form id="formBook" method="POST" action="{{ route('books.store') }}">
        @csrf
        @include('pages.book.form')
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
@endsection
@extends('layout.base', ['title' => 'Livro - criar'])
@section('layout')
    @include('layout.components.list_actions', [
        'title' => 'Livros',
        'actions' => ['list' => route('books.index')],
    ])
    @include('layout.components.form_frame', ['caption' => 'Criar livro'])
@endsection
