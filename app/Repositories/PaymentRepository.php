<?php

namespace App\Repositories;

use App\Interfaces\PaymentRepositoryInterface;
use App\Models\Fund;

class PaymentRepository implements PaymentRepositoryInterface
{

    public function getAllPayments()
    {
        return Fund::all();
    }

    public function getPaymentById($paymentId)
    {
        return Fund::findOrFail($paymentId);
    }

    public function getPaymentBalanceByUserId($userId)
    {
        return Fund::where('user_id', $userId)->select('id','balance')->first();
    }

    public function deletePayment($paymentId)
    {
        Fund::destroy($paymentId);
    }

    public function createPayment(array $paymentDetails)
    {
        $fund = new Fund;
        $fund->user_id = $paymentDetails['user_id'];
        $fund->balance = $paymentDetails['balance'];
        $fund->save();

        return $fund->id;
    }

    public function updatePayment($paymentId, array $newDetails)
    {
        return Fund::whereId($paymentId)->update($newDetails);
    }

    public function getFulfilledPayments()
    {
        return Fund::where('is_fulfilled', true);
    }
}
