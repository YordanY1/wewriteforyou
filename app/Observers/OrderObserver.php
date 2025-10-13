<?php

namespace App\Observers;

use App\Models\Order;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Mail\OrderStatusUpdated;

class OrderObserver
{
    public function updated(Order $order)
    {
        if ($order->isDirty('order_status')) {

            $oldStatus = $order->getOriginal('order_status');
            $newStatus = $order->order_status;

            if ($order->email) {
                try {
                    Mail::to($order->email)->send(new OrderStatusUpdated($order));

                    Log::info("Order status email sent to {$order->email} | {$oldStatus} → {$newStatus} | Ref: {$order->reference_code}");
                } catch (\Exception $e) {
                    Log::error("Failed to send order status mail to {$order->email} (Ref: {$order->reference_code}): " . $e->getMessage());
                }
            } else {
                Log::warning("OrderObserver: No email set for order {$order->reference_code} when status changed.");
            }
        }
    }
}
