<?php

namespace App\Livewire;

use Livewire\Component;

class FaqSection extends Component
{
    public array $faqs = [
        [
            'question' => 'How fast can I get my order?',
            'answer'   => 'Standard delivery starts from 3 days, but you can request urgent delivery within 24 hours for an additional fee.',
        ],
        [
            'question' => 'Do you guarantee plagiarism-free work?',
            'answer'   => 'Yes, every paper is written from scratch and checked with plagiarism detection tools.',
        ],
        [
            'question' => 'What payment methods do you accept?',
            'answer'   => 'We accept Stripe, Apple Pay, and all major debit/credit cards.',
        ],
        [
            'question' => 'Can I track the progress of my order?',
            'answer'   => 'Absolutely! Log into your profile to see the current status of your order (new, in progress, completed).',
        ],
    ];

    public function render()
    {
        return view('livewire.faq-section');
    }
}
