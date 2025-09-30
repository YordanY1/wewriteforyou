<?php

namespace App\Livewire\Payment;

use Livewire\Component;

class SuccessPage extends Component
{
    public ?string $reference = null;

    public function mount()
    {
        $this->reference = request()->get('reference_code');
    }

    public function render()
    {
        return view('livewire.payment.success-page')->layout('layouts.app');
    }
}
