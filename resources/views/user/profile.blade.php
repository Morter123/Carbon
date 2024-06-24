@extends('layouts/main')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
@section('content')
<div class="container">
    <div class="main-content">
        <div class="main-content__title">
            <h1>Профиль</h1>
        </div>
        <hr style="margin-top: 10px;">
        @if (session('success'))
        <div class="container">
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        </div>
        @endif

        <form action="{{ route('profile') }}" method="GET" class="mb-3">
            <div class="row justify-content-center">
                <div class="col-md-3">
                    <label for="start_date" class="form-label">Начальная дата</label>
                    <input type="date" name="start_date" class="form-control" value="{{ request('start_date') }}">
                </div>
                <div class="col-md-3">
                    <label for="end_date" class="form-label">Конечная дата</label>
                    <input type="date" name="end_date" class="form-control" value="{{ request('end_date') }}">
                </div>
                <div class="d-flex justify-content-center pt-3">
                    <div class="col-md-2 d-flex align-items-end">
                        <button type="submit" class="btn btn-primary w-100 m-2">Найти</button>
                        <a class="m-2" href="{{route('profile')}}"><button type="button" class="btn btn-danger">Сбросить</button></a>
                    </div>
                </div>
            </div>
        </form>

        <form action="{{ route('profile/compare') }}" method="get" class="mb-3">
            <div class="row">
                <div class="col-md-5">
                    <label for="calculation1" class="form-label">Расчет 1</label>
                    <select name="calculation1" class="form-control">
                        @foreach($calculations as $calculation)
                        <option value="{{ $calculation->id }}">Номер расчета: {{ $calculation->id }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-5">
                    <label for="calculation2" class="form-label">Расчет 2</label>
                    <select name="calculation2" class="form-control">
                        @foreach($calculations as $calculation)
                        <option value="{{ $calculation->id }}">Номер расчета: {{ $calculation->id }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary w-100">Сравнить</button>
                </div>
            </div>
        </form>

        <div class="row">
            <div class="container">
                <div class="col-12 mb-4">

                    @if($calculations->isEmpty())
                    @else
                    @foreach($calculations as $calculation)
                    <div class="card mb-1">
                        <div class="card-header d-flex justify-content-center align-items-center">
                            <div class="text-center">
                                <div class="col"><strong>Номер расчета: {{$calculation->id}}</strong></div>
                                <div><strong>Дата создания: {{$calculation->calculation_date}}</strong></div>
                            </div>
                        </div>
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div class="row">
                                <ol class="list-group-numbered">
                                    <li class="list-group-item">Топливо: {{ $calculation->calculation_data['fuel'] }}</li>
                                    <li class="list-group-item">Компостирование: {{ $calculation->calculation_data['compost'] }}</li>
                                    <li class="list-group-item">Удобрение: {{ $calculation->calculation_data['fertilizer'] }}</li>
                                    <li class="list-group-item">Защита посевов: {{ $calculation->calculation_data['def'] }}</li>
                                </ol>
                                <div class="list-group-item" style="padding-left: 12px"><strong>Сумма данных: {{ array_sum($calculation->calculation_data) }} CO₂-экв. тыс.тонн</strong></div>
                            </div>
                            <div class="d-flex">
                                <form action="{{ route('profile/show', $calculation->id) }}" method="post" class="d-flex p-1">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm">Посмотреть</button>
                                </form>
                                <form action="{{ route('profile/destroy', $calculation->id) }}" method="POST" class="d-flex p-1">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@if (!empty($calculationData))
<div class="container">
    <div id="chartData" data-values="{{ json_encode($calculationData) }}"></div>
    <div class="graph">
        <canvas id="chart"></canvas>
        <canvas id="chart2"></canvas>
    </div>
</div>
@endif

@if (!empty($calculationData1) && !empty($calculationData2))
<div class="container">
    <div class="graph">
        <canvas id="chart1"></canvas>
        <canvas id="chart2"></canvas>
    </div>
</div>
@endif
@endsection