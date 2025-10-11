<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Pricing;

class PricingTable extends Component
{
    public $pricings;

    public function mount(): void
    {
        $this->pricings = Pricing::orderBy('words')->take(3)->get();
    }

    public function render()
    {
        return view('livewire.pricing-table');
    }
}
