<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Pricing;

class PricingPage extends Component
{
    public $pricings;
    public $standardPrice;
    public $expressPrice;
    public $urgentPrice;

    public function mount()
    {
        $this->pricings = Pricing::with('currency')->orderBy('words')->get();

        $this->standardPrice = $this->pricings->min('d7');
        $this->expressPrice = $this->pricings->min('d3');
        $this->urgentPrice  = $this->pricings->min('d1');
    }

    public function render()
    {
        return view('livewire.pricing-page', [
            'title' => 'Editing & Feedback Pricing – BullWrite UK',
            'description' => 'Transparent and affordable pricing for BullWrite editing and feedback services. View rates per word for standard and express turnaround options.',
            'keywords' => 'academic editing UK, proofreading cost, essay feedback price, writing improvement UK',
        ])->layout('layouts.app');
    }
}
