<?php

namespace App\Livewire\Payment;

use Livewire\Component;

class CancelPage extends Component
{
    public ?string $reference = null;

    public function mount()
    {
        $this->reference = request()->get('reference_code');
    }

    public function render()
    {
        return view('livewire.payment.cancel-page')->layout('layouts.app');
    }
}
