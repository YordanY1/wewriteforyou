<?php

namespace App\Livewire\Orders;

use Livewire\Component;
use App\Models\Order;

class ShowOrder extends Component
{
    public Order $order;

    public function mount(Order $order)
    {
        $this->order = $order;
    }

    public function render()
    {
        return view('livewire.orders.show-order')->layout('layouts.app');
    }
}
