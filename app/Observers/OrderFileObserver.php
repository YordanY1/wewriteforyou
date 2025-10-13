<?php

namespace App\Observers;

use App\Models\OrderFile;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Mail\ClientNewFile;

class OrderFileObserver
{
    public function created(OrderFile $file)
    {
        if ($file->type === 'final_delivery') {
            $order = $file->order;

            if ($order && $order->email) {
                try {
                    Mail::to($order->email)->send(new ClientNewFile($file));

                    Log::info("Final delivery mail sent to {$order->email} for order {$order->reference_code}");
                } catch (\Exception $e) {
                    Log::error("Failed to send final delivery mail to {$order->email}: " . $e->getMessage());
                }
            } else {
                Log::warning("OrderFileObserver: Missing order or email for file ID {$file->id}");
            }
        }
    }
}
