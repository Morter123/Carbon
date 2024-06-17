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
            <input type="button" class="select" value="По культурам">
        </div>

        <form action="{{ route('calculator') }}" method="post" class="calc_data">
            @CSRF
            <div id="forms_container">
                <div class="form-name">Форма 1</div>
                <div class="calculator-computed form_instance">
                    <div class="bl">
                        <div class="block">
                            <div class="block-name">Топливо</div>
                            <input name="fuel_value" type="text" placeholder="Введите кол-во литров" autocomplete="off">
                        </div>
                    </div>
                    <div class="bl">
                        <div class="block">
                            <div class="block-name">Компостирование</div>
                            <input name="compost_value" type="text" placeholder="Введите кол-во тыс/тонн" autocomplete="off">
                        </div>
                    </div>
                    <div class="bl">
                        <div class="block">
                            <div class="block-name">Удобрение</div>
                            <select name="fertilizer_name">
                                <option selected value="fertilizer1">Удобрение 1</option>
                                <option value="fertilizer2">Удобрение 2</option>
                            </select>
                            <input name="fertilizer_value" type="text" placeholder="Введите кол-во тыс/тонн" autocomplete="off">
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
                            <input name="def_value" type="text" placeholder="Введите кол-во тыс/тонн" autocomplete="off">
                        </div>
                    </div>
                </div>
            </div>
            <div class="calculator-result">
                <!-- <input class="clear" type="button" id="clear_form" value="Очистить поля"> -->
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
        @endif
    </div>
</div>
@endsection

<!-- <div id="forms_container">
    <div class="form_instance">
        <div class="category">
            <h1>Топливо</h1>
            <label for="fuel_value">Укажите кол-во топлива:</label>
            <input name="forms[0][fuel_value]" type="text" placeholder="Введите кол-во тыс/тонн">
        </div>

        <div class="category">
            <h1>Компостирование</h1>
            <label for="compost_value">Укажите количество остатков:</label>
            <input name="forms[0][compost_value]" type="text" placeholder="Введите кол-во тыс/тонн">
        </div>

        <div class="category">
            <h1>Удобрение</h1>
            <label for="fertilizer_name">Выберите удобрение:</label>
            <select name="forms[0][fertilizer_name]">
                <option selected value="fertilizer1">Удобрение 1</option>
                <option value="fertilizer2">Удобрение 2</option>
            </select>
            <input name="forms[0][fertilizer_value]" type="text" placeholder="Введите кол-во тыс/тонн">
        </div>

        <div class="category">
            <h1>Защита посевов</h1>
            <label for="def_name">Выберите тип распылителей:</label>
            <select name="forms[0][def_name]">
                <option selected value="pesticides">Пестициды</option>
                <option value="agrochemicals">Агрохимикаты</option>
                <option value="pest_control">Ядохимикаты</option>
            </select>
            <input name="forms[0][def_value]" type="text" placeholder="Введите кол-во тыс/тонн">
        </div>
    </div>
</div>
<input style="padding: 5px 20px" type="button" id="add_form" value="Добавить еще одну форму">
<input style="padding: 5px 150px; margin-top: 10px; width: 50%;" type="submit" value="Рассчитать"> -->