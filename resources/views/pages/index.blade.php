@extends("layouts/main")
@section('content')
<div class="container">
    <div class="content">
        <div class="main-content">
            <div class="main-content__title">
                <h1>Карбоновый калькулятор
                </h1>
            </div>
            <hr style="margin-top: 10px;">
            <div div class="main-content__description">
                <p>Добро пожаловать в калькулятор для оценки карбонового следа сельскохозяйственных предприятий. Данный калькулятор предоставляет помощь в оценке карбонового следа в
                    ..... Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias, explicabo?
                    В расчетах используются следующие методологии:</p>
                <ol>
                    <li><a href="/">ISO Lorem ipsum dolor sit amet.</a></li>
                    <li><a href="/">Приказ Lorem, sipsum dolor.</a></li>
                    <li><a href="/">Lorem ipsum dolor sit amet consectetur adipisicing.</a></li>
                </ol>

                <p>Подробнее о них вы можете прочитать в разделе <a class="nav-link" href="{{route('formulas')}}">Формулы расчета.</a></p>
            </div>
        </div>
    </div>
</div>
@endsection