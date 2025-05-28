@section('form')
    <form id="formAuthor" method="POST" action="{{ route('authors.update', $author->id) }}">
        @csrf
        @method('PUT')
        @include('pages.author.form')
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
@endsection

@extends('layout.base')
@section('layout')
    @include('layout.components.list_actions', [
        'title' => 'Autores',
        'actions' => [
            'create' => route('authors.create'),
            'list' => route('authors.index'),
        ],
    ])
    @include('layout.components.form_frame', ['caption' => 'Editar autor'])
@endsection
