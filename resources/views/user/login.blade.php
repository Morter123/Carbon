@extends('layouts/main')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
@section('content')
<div class="container">
    @if (session('success'))
    <div class="alert alert-success"> {{ session('success') }}</div>
    @endif
    <div class="content">
        <div class="d-flex align-items-center justify-content-center" style="height: 60vh;">
            <div class="row justify-content-center w-100">
                <div class="col-md-6">
                    <h1 class="h2 text-center">Вход</h1>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form class="d-flex flex-column" action="{{route('login')}}" method="post">
                        @CSRF
                        <div class="mb-3">
                            <label for="login" class="form-label">Логин</label>
                            <input type="text" class="form-control" name="login" placeholder="Введите логин" value="{{ old('login') }}">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Пароль</label>
                            <input type="password" class="form-control" name="password" placeholder="Введите пароль">
                        </div>
                        <button type="submit" class="btn btn-success">Войти</button>
                        <a class="text-center pt-2" href=" {{ route('register') }}">Нет аккаунта?</a>
                        <a class="text-center pt-2" href=" {{ route('register') }}">Забыли пароль?</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection