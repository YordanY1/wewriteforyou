<?php

namespace App\Observers;

use App\Models\Order;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderStatusUpdated;

class OrderObserver
{
    public function updated(Order $order)
    {
        if ($order->isDirty('order_status')) { 
            if ($order->email) {
                Mail::to($order->email)->queue(new OrderStatusUpdated($order));
            }
        }
    }
}
