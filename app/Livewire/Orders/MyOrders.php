<?php

namespace App\Livewire\Orders;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class MyOrders extends Component
{
    public function render()
    {
        $orders = Auth::user()->orders()->latest()->get();

        return view('livewire.orders.my-orders', [
            'orders' => $orders,
        ])->layout('layouts.app');
    }
}
