@section('form')
    <form id="formSubject" method="POST" action="{{ route('subjects.update', $subject->id) }}">
        @csrf
        @method('PUT')
        @include('pages.subject.form')
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
@endsection

@extends('layout.base', ['title' => 'Assunto - editar'])
@section('layout')
    @include('layout.components.list_actions', [
        'title' => 'Assuntos',
        'actions' => [
            'view' => route('subjects.show', $subject->id),
            'delete' => route('subjects.destroy', $subject->id),
            'list' => route('subjects.index'),
        ],
    ])
    @include('layout.components.form_frame', ['caption' => 'Editar assunto'])
@endsection
