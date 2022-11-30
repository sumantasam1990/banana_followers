<?php

namespace App\Services;

use App\Interfaces\PaymentRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Stripe\Exception\CardException;
use Stripe\StripeClient;
use Exception;

class StripePayment
{
    private $stripe;
    private PaymentRepositoryInterface $paymentRepository;
    public function __construct(PaymentRepositoryInterface $paymentRepository)
    {
        $this->stripe = new StripeClient(config('stripe.api_keys.secret_key'));
        $this->paymentRepository = $paymentRepository;
    }

    public function createToken($cardData)
    {
        $token = null;
        try {
            $token = $this->stripe->tokens->create([
                'card' => [
                    'number' => $cardData['cardNumber'],
                    'exp_month' => $cardData['month'],
                    'exp_year' => $cardData['year'],
                    'cvc' => $cardData['cvv']
                ]
            ]);
        } catch (CardException $e) {
            $token['error'] = $e->getError()->message;
        } catch (Exception $e) {
            $token['error'] = $e->getMessage();
        }
        return $token;
    }

    public function createCharge($tokenId, $amount)
    {
        $charge = null;
        try {
            $charge = $this->stripe->charges->create([
                'amount' => $amount,
                'currency' => 'inr',
                'source' => $tokenId,
                'description' => 'Banana followers - Add funds.'
            ]);
            $prevBalance = $this->paymentRepository->getPaymentBalanceByUserId(Auth::user()->id);
            $dataArray = [
                'user_id' => Auth::user()->id,
                'balance' => $prevBalance->balance + $amount/100,
            ];
            $this->paymentRepository->createPayment($dataArray);
        } catch (Exception $e) {
            $charge['error'] = $e->getMessage();
        }
        return $charge;
    }
}
