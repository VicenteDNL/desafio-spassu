@extends('auth.layout')
@section('title', 'Esqueci a senha')
@section('header')
    <h3 class="text-center font-weight-light mt-3">Esqueceu sua senha?</h3>
    <small>
        <p class="text-center font-weight-light ">
            Sem problemas. Basta nos informar seu endereço de e-mail e enviaremos por e-mail um
            link de redefinição de senha que permitirá que você escolha uma nova.
        </p>
    </small>
@endsection
@section('body')
    @if (session('status'))
        <div class="text-success">
            {{ session('message') }}
        </div>
        <div class="d-flex justify-content-end mt-4 mb-0">
            <a href="{{ route('login') }}" class="btn btn-primary">Voltar a pagina de login</a>
        </div>
    @else
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="form-floating mb-3">
                <input class="form-control @error('email') is-invalid @enderror" id="email" name="email" type="email"
                    placeholder="name@example.com" aria-describedby="validationEmailFeedback" value="{{ old('email') }}" />
                <label for="inputEmail">Email </label>
                @error('email')
                    <div id="validationPasswordFeedback" class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="d-flex justify-content-end mt-4 mb-0">
                <button type="submit" class="btn btn-primary text-light">Solicitar link de redefinição de
                    senha</a>
            </div>
        </form>
    @endif

@endsection
