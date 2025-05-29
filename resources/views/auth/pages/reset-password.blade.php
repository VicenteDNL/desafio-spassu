@extends('auth.layout')
@section('title', 'Login')
@section('header')
    <h3 class="text-center font-weight-light my-4">Redefinir senha</h3>
@endsection
@section('body')
    <form method="POST" action="{{ route('password.store') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $request->route('token') }}">
        <div class="form-floating mb-3">
            <input class="form-control @error('email') is-invalid @enderror" id="email" name="email" type="email"
                placeholder="name@example.com" aria-describedby="validationEmailFeedback" value="{{ old('email') }}" />
            <label for="inputEmail">Email </label>
            @error('email')
                <div id="validationEmailFeedback" class="invalid-feedback">
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
                name="password_confirmation" type="password" placeholder=""
                aria-describedby="validationPasswordConfirmationFeedback" />
            <label for="inputPasswordConfirmation">Confirme sua senha
            </label>
            @error('password_confirmation')
                <div id="validationPasswordConfirmationFeedback" class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="d-flex align-items-center justify-content-end mt-4 mb-0">
            <button type="submit" class="btn btn-primary">
                Redefinir senha</a>
        </div>
    </form>
@endsection
