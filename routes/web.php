<?php

use Illuminate\Support\Facades\Route;

// Auth routes
Route::get('/auth/register', [\App\Http\Controllers\AuthController::class, 'register'])->name('auth.register');
Route::post('/auth/register/post', [\App\Http\Controllers\AuthController::class, 'registerPost'])->name('auth.register.post');
Route::get('/auth/login', [\App\Http\Controllers\AuthController::class, 'login'])->name('auth.login');
Route::post('/auth/login/post', [\App\Http\Controllers\AuthController::class, 'loginPost'])->name('auth.login.post');
Route::get('/auth/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('auth.logout');

// General routes
Route::middleware(['auth'])->prefix('u')->group(function () {
    Route::get('/', [\App\Http\Controllers\UserController::class, 'dashboard']);
    Route::get('add/funds', [\App\Http\Controllers\PaymentController::class, 'addFunds'])->name('add.funds');
    Route::post('add/funds/payment', [\App\Http\Controllers\PaymentController::class, 'payment'])->name('add.fund.payment');
});


