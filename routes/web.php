<?php

use App\Models\Order;
use App\Models\Support;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

// Auth routes
Route::get('/', function () {
    if(Auth::check()) {
        return redirect(\route('services'));
    }
})->name('auth.register');
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
    Route::get('support/ticket/add', [\App\Http\Controllers\TicketController::class, 'index'])->name('new.ticket');
    Route::get('support/tickets', [\App\Http\Controllers\TicketController::class, 'display'])->name('tickets');
    Route::post('ticket/post', [\App\Http\Controllers\TicketController::class, 'addTicket'])->name('add.ticket.post');
    Route::get('view/ticket/{id}', [\App\Http\Controllers\TicketController::class, 'viewTicket'])->name('view.ticket');
    Route::post('ticket/reply', [\App\Http\Controllers\TicketController::class, 'replyTicket'])->name('add.ticket.reply');
    Route::get('gifts', [\App\Http\Controllers\GiftsController::class, 'index'])->name('gifts');
});


// Admin routes
Route::middleware(['auth'])->prefix('admin')->group(function () {

    Route::get('subscribers', function () {
        $data = User::with('fund')->where('user_type', '<>', 'admin')->paginate(20);
        return view('admin.subscribers', ['data' => $data, 'balance' => 0.0]);
    })->name('admin.subscribers');

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

    Route::get('tickets', function () {
        $data = Ticket::orderBy('id', 'asc')->paginate(10);

        return view('admin.tickets', ['data' => $data, 'balance' => 0.0]);
    })->name('admin.tickets');

    Route::get('view/tickets/{id}', function (string $id) {
        $data = Support::with('ticket', 'user')->where('ticket_id', $id)->get();
        return view('admin.view-ticket', ['tid' => $id, 'data' => $data, 'balance' => 0.0]);
    })->name('admin.view.ticket');

    Route::post('reply/support', function (\Illuminate\Http\Request $request) {

        $request->validate([
            'msg' => 'required|max:500',
            'ticket_id' => 'required|exists:supports,ticket_id'
        ]);

        $support = new Support;

        $support->ticket_id = $request->ticket_id;
        $support->message = $request->msg;
        $support->user_id = Auth::user()->id;
        $support->save();

        return redirect()->back();

    })->name('admin.reply');

    Route::post('status/change', function (\Illuminate\Http\Request $request) {
        Ticket::where('id', $request->ticket_id)->update(['status' => $request->status]);

        return redirect(\route('admin.tickets'))->with('msg', 'Status changed to completed.');
    })->name('admin.ticket.status.change');

});

