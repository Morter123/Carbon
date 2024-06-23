<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalculatorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;

Route::view('/', 'pages/index')->name("/");
Route::get('/calculator', [CalculatorController::class, 'index'])->name("calculator");
Route::post('/calculator', [CalculatorController::class, 'calculate'])->name("calculator");
Route::view('/formulas', 'pages/formulas')->name("formulas");



Route::middleware('guest')->group(function() {
    Route::get('register', [UserController::class, "create"])->name('register');
    Route::post('register', [UserController::class, "store"])->name('register');
    Route::get('login', [UserController::class, "login"])->name('login');
    Route::post('login', [UserController::class, "loginAuth"])->name('login');
});

Route::middleware('auth')->group(function() {
    Route::get('logout', [UserController::class, 'logout'])->name('logout');
    Route::get('profile', [ProfileController::class, 'index'])->name('profile');
    Route::delete('/profile/{id}', [ProfileController::class, 'destroy'])->name('profile/destroy');
    Route::post('profile/{id}', [ProfileController::class, 'show'])->name('profile/show');
    Route::get('profile/compare', [ProfileController::class, 'compare'])->name('profile/compare');
});