@extends('layouts/main')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
@section('content')
<div class="container">
    <div class="content">
        <div class="row justify-content-center w-100">
            <div class="col-md-6">
                <h1 class="h2 text-center">Регистрация</h1>
                <form class="d-flex flex-column mb-2" action="{{ route('register') }}" method="post">
                    @CSRF
                    <div class="mb-3">
                        <label for="email" class="form-label">Почта</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Введите email" value="{{ old('email') }}">
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="login" class="form-label">Логин</label>
                        <input type="text" class="form-control @error('login') is-invalid @enderror" name="login" placeholder="Введите логин" value="{{ old('login') }}">
                        @error('login')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Пароль</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Введите пароль">
                        @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Повторите пароль</label>
                        <input type="password" class="form-control" name="password_confirmation" placeholder="Повторите пароль">
                    </div>
                    <button type="submit" class="btn btn-success">Зарегистрироваться</button>
                    <a class="text-center pt-2" href=" {{ route('login') }}">Уже есть аккаунт?</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection