<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Pricing;

class PricingTable extends Component
{
    public $writingPricings;
    public $editingPricings;

    public function mount(): void
    {
        $this->writingPricings = Pricing::where('type', 'writing')
            ->orderBy('words')
            ->take(3)
            ->get();

        $this->editingPricings = Pricing::where('type', 'editing')
            ->orderBy('words')
            ->take(3)
            ->get();
    }

    public function render()
    {
        return view('livewire.pricing-table');
    }
}
