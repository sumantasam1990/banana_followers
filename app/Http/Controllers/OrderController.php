<?php

namespace App\Http\Controllers;

use App\Interfaces\PaymentRepositoryInterface;
use App\Models\Fund;
use App\Models\Order;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class OrderController extends Controller
{
    private PaymentRepositoryInterface $paymentRepository;

    public function __construct(PaymentRepositoryInterface $paymentRepository)
    {
        $this->paymentRepository = $paymentRepository;
    }

    public function newOrder(int $id = 0)
    {
        $response = Service::all();

        if ($id > 0) {
            $idRate = $response->collect()->firstWhere('_id', '=', $id);
            $idRate = $idRate['cost'] * 3.5;
        }

        return view('orders.new-order', ['id' => $id, 'idRate' => $idRate ?? '', 'data' => $response, 'balance' => $this->paymentRepository->getPaymentBalanceByUserId(Auth::user()->id)]);
    }

    public function newOrderPost(Request $request)
    {
        $request->validate([
            'service' => 'required',
            'url' => 'required|url',
            'quantity' => 'required|numeric'
        ]);

        try {
            $service = explode('-', $request->service);
            $cost = ($service[1] * 3.5) / 1000 * $request->quantity;

            $balance = $this->paymentRepository->getPaymentBalanceByUserId(Auth::user()->id);
            $balance = $balance == null ? 0 : $balance;

            if($balance->balance > $cost) {
                $order = Http::post(env('SMSFOLLOWES_API_URL'), [
                    'key' => env('SMSFOLLOWES_API'),
                    'action' => 'add',
                    'service' => $service[0],
                    'link' => $request->url,
                    'quantity' => $request->quantity
                ]);

                $order = $order->json();

                //add order table

                $order_save = new Order;
                $order_save->user_id = Auth::user()->id;
                $order_save->order_API_id = $order['order'];
                $order_save->url = $request->url;
                $order_save->quantity = $request->quantity;
                $order_save->cost = $cost;
                $order_save->save();

                //update fund table
                $fund = Fund::where('user_id', Auth::user()->id)->select('id', 'balance')->first();
                Fund::where('user_id', Auth::user()->id)->update(['balance' => $fund->balance - $cost]);

                if(isset($order['error'])) {
                    return redirect()->back()->with('err', $order['error']);
                }

                if(isset($order['order'])) {
                    return redirect()->back()->with('msg', $order['order']);
                }
            }
            else {
                return redirect()->back()->with('err', 'You do not have sufficient fund in your account. Please add more funds and then try again.');
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('err', 'Sorry! Something is wrong. Please try again after some time.');
        }
    }

    public function serviceCost($rate): \Illuminate\Http\JsonResponse
    {
        $rate = explode('-', $rate);
        return response()->json(['rate' => number_format($rate[1]*3.5, 2)]);
    }

    public function yourOrders()
    {
        $orders = Order::where('user_id', Auth::user()->id)->paginate(50);

        return view('orders.my-orders', ['data' => $orders, 'balance' => $this->paymentRepository->getPaymentBalanceByUserId(Auth::user()->id)]);
    }

    public function orderStatus(int $id)
    {
        $response = Http::post(env('SMSFOLLOWES_API_URL'), [
            'key' => env('SMSFOLLOWES_API'),
            'action' => 'status',
            'order' => $id
        ]);

        $order = Order::where('user_id', Auth::user()->id)->first();

        return view('orders.order-status', ['order' => $order, 'data' => $response->json(), 'balance' => $this->paymentRepository->getPaymentBalanceByUserId(Auth::user()->id)]);
    }
}
