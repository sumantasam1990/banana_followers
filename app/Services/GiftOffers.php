<?php

namespace App\Services;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class GiftOffers
{
    public static function offerApplicable(float $cost): float
    {
        $order_count = Order::where('user_id', Auth::user()->id)->get();
        $total_spent = $order_count->sum('cost');
        if($total_spent > 20) // bonus when spent 20, get 10% discounts on next 3 orders.
        {
            $cost = $cost - ($cost * 10 / 100);
        }
        else
        {
            if(count($order_count) <= 3) // welcome bonus with 15% discounts on first 3 orders.
            {
                $cost = $cost - ($cost * 15 / 100);
            }
        }
        return $cost;
    }
}
