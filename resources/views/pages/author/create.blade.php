@section('form')
    <form id="formSection" method="POST" action="{{ route('authors.store') }}">
        @csrf
        @include('pages.author.form')
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
@endsection
@extends('layout.base')
@section('layout')
    @include('layout.components.list_actions', [
        'title' => 'Autores',
        'actions' => ['list' => route('authors.index')],
    ])
    @include('layout.components.form_frame')
@endsection
