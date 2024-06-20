@extends("layouts/main")
@section('content')
<div class="container">
    <div class="content">
        <div class="main-content__title">
            <h1>Расчет углеродного следа
            </h1>
        </div>
        <hr style="margin-top: 10px;">
        <div class="wrapper_calc">
            <input type="button" class="select choose" value="По организации">
            <!-- <input type="button" class="select" value="По культурам"> -->
        </div>

        <form action="{{ route('calculator') }}" method="post" class="calc_data">
            @CSRF
            <div id="forms_container">
                <div class="form-name">Форма 1</div>
                <div class="calculator-computed form_instance">
                    <div class="bl">
                        <div class="block">
                            <div class="block-name">Топливо</div>
                            <div class="field-input">
                                <input name="fuel_value" type="text" placeholder="Введите кол-во литров" autocomplete="off">
                                <div class="field-input__suffix">тыс. литров</div>
                            </div>
                        </div>
                    </div>
                    <div class="bl">
                        <div class="block">
                            <div class="block-name">Компостирование</div>
                            <div class="field-input">
                                <input name="compost_value" type="text" placeholder="Введите кол-во тыс/тонн" autocomplete="off">
                                <div class="field-input__suffix">тыс. тонн</div>
                            </div>
                        </div>
                    </div>
                    <div class="bl">
                        <div class="block">
                            <div class="block-name">Удобрение</div>
                            <select name="fertilizer_name">
                                <option selected value="fertilizer1">Удобрение 1</option>
                                <option value="fertilizer2">Удобрение 2</option>
                            </select>
                            <div class="field-input">
                                <input name="fertilizer_value" type="text" placeholder="Введите кол-во тыс/тонн" autocomplete="off">
                                <div class="field-input__suffix">тыс. тонн</div>
                            </div>

                        </div>
                    </div>
                    <div class="bl">
                        <div class="block">
                            <div class="block-name">Защита посевов</div>
                            <select name="def_name">
                                <option selected value="pesticides">Пестициды</option>
                                <option value="agrochemicals">Агрохимикаты</option>
                                <option value="pest_control">Ядохимикаты</option>
                            </select>
                            <div class="field-input">
                                <input name="def_value" type="text" placeholder="Введите кол-во тыс/тонн" autocomplete="off">
                                <div class="field-input__suffix">тыс. тонн</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="calculator-result">
                <input class="clear" type="button" id="clear_form" value="Очистить поля">
                <input class="result" type="button" id="add_form" value="Добавить">
                <input class="add-new" margin-top: 10px; width: 50%;" type="submit" value="Рассчитать">
            </div>


        </form>

        @if (!empty($result))
        <div id="chartData" data-values="{{ json_encode($result) }}"></div>
        <pre>{!! print_r($result) !!}</pre>
        <div class="graph">
            <canvas id="chart"></canvas>
            <canvas id="chart2"></canvas>
        </div>
        <div style="background-color: white; color: black; padding: 20px; font-size: 20px; text-align: center;">
            <?php
            $sum = array_sum($result);
            echo "Сумма углеродного следа вашей организации составляет: $sum CO₂-экв. тыс.";
            if ($sum >= 50) {
                echo " <br>В соответствии с законом, организации, чей выброс превышает 50 CO₂-экв. тыс. c 2024 года должны подавать отчетность <u>в обязательном порядке</u>. Подробнее на <a style='color: black' href='https://co2.gisee.ru/'>co2.gisee.ru</a>";
            } else {
                echo " <br>В соответствии с частью 4 статьи 14 Федерального закона от 02.07.2021 № 296-ФЗ, юридические лица и индивидуальные предприниматели, не относящиеся к регулируемым организациям (углеродный след ниже 50 CO₂-экв. тыс.), вправе представлять отчеты о выбросах парниковых газов <u>в добровольном порядке</u>.";
            }
            ?>
        </div>
        @endif

    </div>
</div>
@endsection