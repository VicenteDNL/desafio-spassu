@extends('auth.layout')
@section('title', 'Login')
@section('header')
    <h3 class="text-center font-weight-light my-4">Bem-vindo</h3>
@endsection
@section('body')
    <form method="POST" action="{{ route('login.store') }}">
        @csrf
        <div class="form-floating mb-3">
            <input class="form-control @error('authenticate') is-invalid @enderror" id="email" name="email" type="email"
                placeholder="name@example.com" aria-describedby="validationEmailFeedback" value="{{ old('email') }}" />
            <label for="inputEmail">Email </label>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control @error('authenticate') is-invalid @enderror" id="password" name="password"
                type="password" placeholder="Password" aria-describedby="validationPasswordFeedback" />
            <label for="inputPassword">Senha</label>
            @error('authenticate')
                <div id="validationPasswordFeedback" class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
            <a class="small" href="{{ route('password.request') }}">Esqueceu a senha?</a>
            <button type="submit" class="btn btn-primary ">Entrar</a>
        </div>
    </form>
@endsection
@section('footer')
    <div class="small">não possui conta? <a href="{{ route('register.create') }}">Registra-se</a>
    </div>
@endsection
