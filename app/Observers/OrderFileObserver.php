<?php

namespace App\Observers;

use App\Models\OrderFile;
use Illuminate\Support\Facades\Mail;
use App\Mail\ClientNewFile;

class OrderFileObserver
{
    public function created(OrderFile $file)
    {
        if ($file->type === 'final_delivery') {
            $order = $file->order;
            if ($order && $order->email) {
                Mail::to($order->email)->queue(new ClientNewFile($file));
            }
        }
    }
}
