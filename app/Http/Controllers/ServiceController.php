<?php

namespace App\Http\Controllers;

use App\Interfaces\PaymentRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class ServiceController extends Controller
{
    private PaymentRepositoryInterface $paymentRepository;

    public function __construct(PaymentRepositoryInterface $paymentRepository)
    {
        $this->paymentRepository = $paymentRepository;
    }

    public function index()
    {
        $response = Http::post(env('SMSFOLLOWES_API_URL'), [
            'key' => env('SMSFOLLOWES_API'),
            'action' => 'services',
        ]);

        $search = 'facebook';
        $collection = $response->collect()->filter(function ($item) use ($search) {
            return false !== stripos($item['category'], $search);
        });

        //$response_data = $response->collect()->where('category', 'like', '%Facebook%');

        return view('services.index', ['services' => $collection, 'balance' => $this->paymentRepository->getPaymentBalanceByUserId(Auth::user()->id)]);
    }
}
