<?php

namespace App\Livewire;

use Livewire\Component;

class TermsPage extends Component
{
    public function render()
    {
        $title = 'Terms & Conditions | BullWrite';
        $description = 'Read the official Terms & Conditions for using BullWrite — a professional academic editing and feedback platform compliant with UK and EU regulations.';
        $keywords = 'terms and conditions, BullWrite legal, UK law compliance, editing platform policy, refund policy';
        $robots = 'index, follow';

        return view('livewire.terms-page', compact('title', 'description', 'keywords', 'robots'))
            ->layout('layouts.app');
    }
}
