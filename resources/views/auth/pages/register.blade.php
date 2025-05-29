@extends('auth.layout')
@section('title', 'Registrar - se')
@section('header')
    <h3 class="text-center font-weight-light mt-4">Bem-vindo</h3>
    <small>
        <p class="text-center font-weight-light ">
            Crie uma conta para gerenciar nossos livros.
        </p>
    </small>
@endsection
@section('body')
    <form method="POST" action="{{ route('register.store') }}">
        @csrf
        <div class="form-floating mb-3">
            <input class="form-control @error('name') is-invalid @enderror" id="name" name="name" type="text"
                placeholder="" aria-describedby="validationNameFeedback" value="{{ old('name') }}" />
            <label for="inputName">Nome </label>
            @error('name')
                <div id="validationNameFeedback" class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-floating mb-3">
            <input class="form-control @error('email') is-invalid @enderror" id="email" name="email" type="email"
                placeholder="nome@exemplo.com" aria-describedby="validationEmailFeedback" value="{{ old('email') }}" />
            <label for="inputEmail">Email </label>
            @error('email')
                <div id="validationNameFeedback" class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-floating mb-3">
            <input class="form-control @error('password') is-invalid @enderror" id="password" name="password"
                type="password" placeholder="Password" aria-describedby="validationPasswordFeedback" />
            <label for="inputPassword">Senha</label>
            @error('password')
                <div id="validationPasswordFeedback" class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-floating mb-3">
            <input class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation"
                name="password_confirmation" type="password" placeholder="password_confirmation"
                aria-describedby="validationpasswordConfirmationFeedback" />
            <label for="inputpassword_confirmation">Confirmação da senha</label>
            @error('password_confirmation')
                <div id="validationpasswordConfirmationFeedback" class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
            <a class="small" href="{{ route('login') }}">Já está cadastrado?
            </a>
            <button type="submit" class="btn btn-primary text-light">Registrar</a>
        </div>
    </form>
@endsection
