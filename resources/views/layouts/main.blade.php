<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=PT+Serif:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/public/assets/css/newcss.css">
    <title>Калькулятор для оценки карбонового следа сельскохозяйственных предприятий</title>
</head>

<body>

    <header>
        <div class="container">
            <div class="header-nav">
                <div class="logo">
                    <a class="" href="{{route('/')}}"><img style="box-sizing: content-box" src="/public/assets/img/free-icon-leaf-892917.png" alt="" width="40" height="40">
                        <div class="logo-name">
                            <p style="margin-bottom: 0px">Карбоновый</p>
                            <p style="margin-bottom: 0px">Калькулятор</p>
                        </div>
                    </a>
                </div>
                <nav class="nav">
                    <div class="nav__item">
                        <div class="nav__item-calc"><a href="{{ route('calculator') }}">Калькулятор</a></div>
                    </div>
                    @if (Route::has('login'))
                    @auth
                    <div class="nav__item">
                        <div class="nav__item-calc"><a href="{{ route('profile') }}">Профиль</a></div>
                    </div>
                    <div class="nav__item">
                        <div class="nav__item-calc"><a href="{{ route('logout') }}">Выйти</a></div>
                    </div>
                    @else
                    <div class="nav__item">
                        <div class="nav__item-calc"><a href="{{ route('login') }}">Вход</a></div>
                    </div>
                    <div class="nav__item">
                        <div class="nav__item-calc"><a href="{{ route('register') }}">Регистрация</a></div>
                    </div>
                    @endif
                    @endif
                    <div class="nav__item">
                        <div class="nav__item-info"><a>Меню</a></div>
                        <div class="info-menu">
                            <div><a href="{{ route('/') }}">Информация</a></div>
                            <div><a href="{{ route('formulas') }}">Формулы расчета</a></div>
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
    <script src="/public/assets/js/app.js"></script>
    <script src="/public/assets/js/chart.js"></script>
    @if (!empty($calculationData1) && !empty($calculationData2))
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const data1 = @json($calculationData1);
            const data2 = @json($calculationData2);
            const labels = Object.keys(data1);

            const data = {
                labels: ['Топливо', 'Компостирование', 'Удобрение', 'Опылители'],
                datasets: [{
                        label: 'Расчет 1',
                        data: Object.values(data1),
                        borderColor: 'rgb(75, 192, 192)',
                        tension: 0.1
                    },
                    {
                        label: 'Расчет 2',
                        data: Object.values(data2),
                        borderColor: 'rgb(255, 99, 132)',
                        tension: 0.1
                    }
                ]
            };

            const dataDifference = {
                labels: ['Топливо', 'Компостирование', 'Удобрение', 'Опылители'],
                datasets: [{
                    label: 'Разница',
                    data: labels.map((label, index) => Math.abs(data2[label] - data1[label])),
                    borderColor: 'rgb(54, 162, 235)',
                    tension: 0.1
                }]
            };

            const config1 = {
                type: 'line',
                data: data,
                options: {}
            };

            const config2 = {
                type: 'line',
                data: dataDifference,
                options: {}
            };

            var chart1 = new Chart(
                document.getElementById('chart1'),
                config1
            );

            var chart2 = new Chart(
                document.getElementById('chart2'),
                config2
            );
        });
    </script>
    @endif
</body>

</html>