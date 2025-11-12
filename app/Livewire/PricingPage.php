<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Pricing;

class PricingPage extends Component
{
    public $writingPricings;
    public $editingPricings;

    public $standardPrice;
    public $expressPrice;
    public $urgentPrice;

    public function mount()
    {
        $this->writingPricings = Pricing::with('currency')
            ->where('type', 'writing')
            ->orderBy('words')
            ->get();

        $this->editingPricings = Pricing::with('currency')
            ->where('type', 'editing')
            ->orderBy('words')
            ->get();

        $this->standardPrice = $this->writingPricings->min('d7');
        $this->expressPrice  = $this->writingPricings->min('d3');
        $this->urgentPrice   = $this->writingPricings->min('d1');
    }

    public function render()
    {
        return view('livewire.pricing-page', [
            'title'       => 'Writing & Editing Prices | BullWrite for UK Students',
            'description' => 'Compare transparent, affordable writing and editing rates designed for UK students. Pricing is clear, deadline-based, and tailored to academic needs.',
        ])->layout('layouts.app');
    }
}
