<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalculatorController;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;

Route::view('/', 'pages/index')->name("/");
Route::match(['get', 'post'], '/calculator', [CalculatorController::class, 'calculate'])->name("calculator")->withoutMiddleware(VerifyCsrfToken::class);
Route::view('/formulas', 'pages/formulas')->name("formulas");
Route::view('/api', 'pages/api')->name("api");