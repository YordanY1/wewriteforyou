<?php

namespace App\Livewire;

use Livewire\Component;

class HowItWorksPage extends Component
{
    public function render()
    {
        return view('livewire.how-it-works-page', [
            'title' => 'How It Works – Essay & Assignment Writing UK | WeWriteForYou',
            'description' => 'See how our essay writing service works in the UK. Step by step: submit requirements, pay securely, our writers get to work, and receive your completed paper.',
            'keywords' => 'how essay writing works UK, assignment process, order essay UK step by step',
            'robots' => 'index, follow',
        ])->layout('layouts.app');
    }
}
