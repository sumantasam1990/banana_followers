<?php

namespace App\Interfaces;

interface PaymentRepositoryInterface
{
    public function getAllPayments();
    public function getPaymentById($paymentId);
    public function deletePayment($paymentId);
    public function createPayment(array $paymentDetails);
    public function updatePayment($paymentId, array $newDetails);
    public function getFulfilledPayments();
}
