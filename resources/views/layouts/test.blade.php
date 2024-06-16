<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="public/assets/css/app.css">
    <title>Калькулятор для оценки карбонового следа сельскохозяйственных предприятий</title>
</head>

<body>

    <header>
        <nav class="navbar">
            <div class="navbar-logo">
                <a class="" href="{{route('/')}}"><img src="/public/assets/img/free-icon-leaf-892917.png" alt="" width="40" height="40">Carbon Calculator</a>
            </div>
            <div class="container-header">
                <a href="{{route('/')}}" class="nav-link">Главная</a>
                <a href="{{route('calculator')}}" class="nav-link">Калькулятор</a>
                <a href="{{route('formulas')}}" class="nav-link">Формулы расчета</a>
                <a href="{{route('api')}}" class="nav-link">API</a>
            </div>
            <div class="container-header">
                <a href="/">Вход</a>
                <a href="/">Регистрация</a>
            </div>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>

    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="public/assets/js/app.js"></script>
</body>

</html>