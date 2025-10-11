<?php

namespace App\Livewire;

use Livewire\Component;

class TermsPage extends Component
{
    public function render()
    {
        $title = 'Terms & Conditions | BullWrite UK';
        $description = 'Read the official Terms & Conditions for using BullWrite — professional editing, feedback, and proofreading platform compliant with UK law.';
        $keywords = 'terms and conditions, BullWrite legal, UK terms, editing platform policy, refund policy';
        $robots = 'index, follow';

        return view('livewire.terms-page', compact('title', 'description', 'keywords', 'robots'))
            ->layout('layouts.app');
    }
}
