<?php

namespace App\Livewire;

use Livewire\Component;

class HowItWorksPage extends Component
{
    public function render()
    {
        return view('livewire.how-it-works-page', [
            'title' => 'How It Works – Academic Editing & Feedback | BullWrite',
            'description' => 'Learn how BullWrite helps UK students improve their essays and reports step by step — from uploading your draft to receiving expert feedback.',
            'keywords' => 'academic editing UK, essay feedback, writing improvement process, proofreading steps',
            'robots' => 'index, follow',
        ])->layout('layouts.app');
    }
}
