<?php

namespace App\Repositories;

use App\Interfaces\PaymentRepositoryInterface;
use App\Models\Transaction;

class PaymentRepository implements PaymentRepositoryInterface
{

    public function getAllPayments()
    {
        return Transaction::all();
    }

    public function getPaymentById($paymentId)
    {
        return Transaction::findOrFail($paymentId);
    }

    public function deletePayment($paymentId)
    {
        Transaction::destroy($paymentId);
    }

    public function createPayment(array $paymentDetails)
    {
        return Transaction::create($paymentDetails);
    }

    public function updatePayment($paymentId, array $newDetails)
    {
        return Transaction::whereId($paymentId)->update($newDetails);
    }

    public function getFulfilledPayments()
    {
        return Transaction::where('is_fulfilled', true);
    }
}
