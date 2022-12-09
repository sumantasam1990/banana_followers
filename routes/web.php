<?php

use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

// Auth routes
Route::get('/', [\App\Http\Controllers\AuthController::class, 'register'])->name('auth.register');
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
    Route::get('new/order/{id?}', [\App\Http\Controllers\OrderController::class, 'newOrder'])->name('new.order');
    Route::post('new/order/post', [\App\Http\Controllers\OrderController::class, 'newOrderPost'])->name('new.order.post');
    Route::get('service/cost/{rate}', [\App\Http\Controllers\OrderController::class, 'serviceCost']);
    Route::get('services/{search?}/{sub?}', [\App\Http\Controllers\ServiceController::class, 'index'])->name('services');
    Route::post('services/search', [\App\Http\Controllers\ServiceController::class, 'search'])->name('services.search');
    Route::get('my/orders', [\App\Http\Controllers\OrderController::class, 'yourOrders'])->name('my.orders');
    Route::get('order/status/{id}', [\App\Http\Controllers\OrderController::class, 'orderStatus'])->name('order.status');
});

Route::middleware(['auth'])->prefix('admin')->group(function () {

    Route::get('subscribers', function () {
        $data = User::with('fund')->paginate(20);
        return view('admin.subscribers', ['data' => $data, 'balance' => 0.0]);
    });

    Route::get('subscribers/orders/{id}', function (string $id) {
        $data = Order::with('user.fund')->where('user_id', $id)->paginate(2);
        return view('admin.orders', ['data' => $data, 'balance' => 0.0]);
    })->name('subs.orders');

    Route::get('subscribers/{uid}/order/{orderId}/status', function (string $uid, string $orderId) {
        $response = Http::post(env('SMSFOLLOWES_API_URL'), [
            'key' => env('SMSFOLLOWES_API'),
            'action' => 'status',
            'order' => $orderId
        ]);

        $order = Order::where('user_id', $uid)->where('id', $orderId)->first();

        return view('orders.order-status', ['order' => $order, 'data' => $response->json(), 'balance' => 0.0]);
    })->name('admin.order.status');

});

