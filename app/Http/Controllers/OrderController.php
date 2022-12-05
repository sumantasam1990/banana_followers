<?php

namespace App\Http\Controllers;

use App\Interfaces\PaymentRepositoryInterface;
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

    public function newOrder()
    {
        $response = Http::post(env('SMSFOLLOWES_API_URL'), [
            'key' => env('SMSFOLLOWES_API'),
            'action' => 'services',
        ]);

        return view('orders.new-order', ['data' => $response->json(), 'balance' => $this->paymentRepository->getPaymentBalanceByUserId(Auth::user()->id)]);
    }

    public function newOrderPost(Request $request)
    {
        $request->validate([
            'service' => 'required',
            'url' => 'required|url',
            'quantity' => 'required|numeric'
        ]);

        $service = explode('-', $request->service);

        $order = Http::post(env('SMSFOLLOWES_API_URL'), [
            'key' => env('SMSFOLLOWES_API'),
            'action' => 'add',
            'service' => $service[0],
            'link' => $request->url,
            'quantity' => $request->quantity
        ]);

        $order = $order->json();

        if(isset($order['error'])) {
            return redirect()->back()->with('err', $order['error']);
        }

        if(isset($order['order'])) {
            return redirect()->back()->with('msg', $order['order']);
        }

    }

    public function serviceCost($rate): \Illuminate\Http\JsonResponse
    {
        $rate = explode('-', $rate);
        return response()->json(['rate' => number_format($rate[1]*0.49, 2)]);
    }
}
