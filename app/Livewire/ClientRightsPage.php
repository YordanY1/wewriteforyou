<?php

namespace App\Livewire;

use Livewire\Component;

class ClientRightsPage extends Component
{
    public function render()
    {
        return view('livewire.client-rights-page', [
            'title'       => 'Client Rights & Policies | BullWrite for UK Students',
            'description' => 'Understand your rights as a BullWrite client. We provide transparency, confidentiality, secure payments, and professional academic feedback for students across the UK.',
            'keywords'    => 'client rights UK students, BullWrite refund policy, academic editing terms, confidentiality policy UK',
        ])->layout('layouts.app');
    }
}
