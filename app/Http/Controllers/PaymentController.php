<?php

namespace App\Http\Controllers;

use App\Services\StripePayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PaymentController extends Controller
{
    public function addFunds()
    {
        return view('payments.add-fund');
    }

    public function payment(StripePayment $stripePayment, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fullName' => 'required',
            'cardNumber' => 'required',
            'month' => 'required',
            'year' => 'required',
            'cvv' => 'required',
            '_amount' => 'required|numeric|min:10'
        ]);

        if ($validator->fails()) {
            $request->session()->flash('danger', $validator->errors()->first());
            return redirect()->back();
        }

        $token = $stripePayment->createToken($request);
        if (!empty($token['error'])) {
            $request->session()->flash('danger', $token['error']);
            return redirect()->back();
        }
        if (empty($token['id'])) {
            $request->session()->flash('danger', 'Payment failed.');
            return redirect()->back();
        }

        $charge = $stripePayment->createCharge($token['id'], $request->_amount*100);
        if (!empty($charge) && isset($charge['status']) == 'succeeded') {
            $request->session()->flash('success', 'Payment completed.');
        } else {
            $request->session()->flash('danger', 'Payment failed.');
        }
        return redirect()->back();
    }


}
