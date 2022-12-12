<?php

namespace App\Http\Controllers;

use App\Interfaces\PaymentRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class GiftsController extends Controller
{
    private PaymentRepositoryInterface $paymentRepository;

    public function __construct(PaymentRepositoryInterface $paymentRepository)
    {
        $this->paymentRepository = $paymentRepository;
    }

    public function index()
    {
        return view('gifts.index', ['balance' => $this->paymentRepository->getPaymentBalanceByUserId(Auth::user()->id)]);
    }
}
