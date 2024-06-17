<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=PT+Serif:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="public/assets/css/newcss.css">
    <title>Калькулятор для оценки карбонового следа сельскохозяйственных предприятий</title>
</head>

<body>

    <header>
        <div class="container">
            <div class="header-nav">
                <div class="logo">
                    <a class="" href="{{route('/')}}"><img src="/public/assets/img/free-icon-leaf-892917.png" alt="" width="40" height="40">
                        <div class="logo-name">
                            <p>Карбоновый</p>
                            <p>Калькулятор</p>
                        </div>
                    </a>
                </div>
                <nav class="nav">
                    <div class="nav__item">
                        <div class="nav__item-calc"><a href="{{ route('calculator') }}">Калькулятор</a></div>
                    </div>
                    <div class="nav__item">
                        <div class="nav__item-info"><a>FAQ</a></div>
                        <div class="info-menu">
                            <div><a href="{{ route('/') }}">Информация</a></div>
                            <div><a href="{{ route('formulas') }}">Формулы расчета</a></div>
                            <div><a href="{{ route('api') }}">API</a></div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>

    </footer>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.0/dist/chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-annotation/1.4.0/chartjs-plugin-annotation.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-autocolors"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="public/assets/js/app.js"></script>
    <script src="public/assets/js/chart.js"></script>
</body>

</html>