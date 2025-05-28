@section('form')
    <form id="formSubject" method="POST" action="{{ route('subjects.store') }}">
        @csrf
        @include('pages.subject.form')
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
@endsection
@extends('layout.base')
@section('layout')
    @include('layout.components.list_actions', [
        'title' => 'Assuntos',
        'actions' => ['list' => route('subjects.index')],
    ])
    @include('layout.components.form_frame', ['caption' => 'Criar assunto'])
@endsection
