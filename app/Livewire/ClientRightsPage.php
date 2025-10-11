<?php

namespace App\Livewire;

use Livewire\Component;

class ClientRightsPage extends Component
{
    public function render()
    {
        return view('livewire.client-rights-page', [
            'title'       => 'Client Rights & Policies | BullWrite UK',
            'description' => 'Understand your rights as a BullWrite client. We guarantee transparency, confidentiality, secure payments, and professional feedback you can trust.',
            'keywords'    => 'client rights UK, BullWrite refund policy, academic editing terms, confidentiality policy',
        ])->layout('layouts.app');
    }
}
