<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalculatorController;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;

Route::view('/', 'pages/index')->name("/");
Route::get('/calculator', [CalculatorController::class, 'index'])->name("calculator");
Route::post('/calculator', [CalculatorController::class, 'calculate'])->name("calculator");
Route::view('/formulas', 'pages/formulas')->name("formulas");
Route::view('/api', 'pages/api')->name("api");