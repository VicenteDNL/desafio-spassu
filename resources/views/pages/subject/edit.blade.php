@section('form')
    <form id="formSubject" method="POST" action="{{ route('subjects.update', $subject->id) }}">
        @csrf
        @method('PUT')
        @include('pages.subject.form')
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
@endsection

@extends('layout.base')
@section('layout')
    @include('layout.components.list_actions', [
        'title' => 'Assuntos',
        'actions' => [
            'create' => route('subjects.create'),
            'list' => route('subjects.index'),
        ],
    ])
    @include('layout.components.form_frame', ['caption' => 'Editar assunto'])
@endsection
