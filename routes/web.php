<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [\App\Http\Controllers\UserController::class, 'dashboard']);

Route::get('add/funds', [\App\Http\Controllers\PaymentController::class, 'addFunds'])->name('add.funds');
Route::post('add/funds/payment', [\App\Http\Controllers\PaymentController::class, 'payment'])->name('add.fund.payment');
