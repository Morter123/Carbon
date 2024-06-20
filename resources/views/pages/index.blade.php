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
                <p style="text-align: center;">Добро пожаловать в калькулятор для оценки карбонового следа сельскохозяйственных предприятий. Данный калькулятор предоставляет помощь в оценке карбонового следа для сельскохозяйственных организаций в секторе растениеводства.
                    При расчетах углеродного следа используются следующие приказы и нормативные документы:</p><br>
                <ol>
                    <li><a href="https://carbonreg.ru/pdf/%D0%9E%D0%B1%D1%89%D0%B8%D0%B5%20%D0%9D%D0%9F%D0%90/%D0%9F%D1%80%D0%B8%D0%BA%D0%B0%D0%B7%20%D0%9C%D0%B8%D0%BD%D0%BF%D1%80%D0%B8%D1%80%D0%BE%D0%B4%D1%8B%20%D0%A0%D0%A4%20%D0%BE%D1%82%2027.05.2022%20N%20371.pdf">Приказ Минприроды России от 27.05.2022 N
                            371
                            "Об утверждении методик количественного
                            определения объемов выбросов парниковых
                            газов и поглощений парниковых газов"
                        </a></li>
                    <li><a href="https://base.garant.ru/403700582/">Постановление Правительства РФ от 14 марта 2022 г. N 355 "О критериях отнесения юридических лиц и индивидуальных предпринимателей к регулируемым организациям"</a></li>
                    <li><a href="https://docs.cntd.ru/document/1200181053"> Национальный стандарт Российской Федерации ГОСТ Р ИСО 14064 «Газы парниковые»</a></li>
                </ol>
                <p>Подробнее о них вы можете прочитать перейдя по ссылке. То, как они используются описано в <a class="nav-link" href="{{route('formulas')}}">Формулах расчета.</a></p>
            </div>
        </div>
    </div>
</div>
@endsection