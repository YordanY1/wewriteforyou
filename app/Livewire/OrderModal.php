<?php

namespace App\Livewire;

use Livewire\Component;

class OrderModal extends Component
{
    public $open = false;

    protected $listeners = ['openOrderForm' => 'show'];

    public function show()
    {
        $this->open = true;
    }

    public function close()
    {
        $this->open = false;
    }

    public function render()
    {
        return view('livewire.order-modal');
    }
}
