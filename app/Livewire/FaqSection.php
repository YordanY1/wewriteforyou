<?php

namespace App\Livewire;

use Livewire\Component;

class FaqSection extends Component
{
    public array $faqs = [
        [
            'question' => 'How fast can I get my order?',
            'answer'   => 'Standard delivery starts from 3–7 days, but you can request urgent delivery within 24 hours for an additional fee.',
        ],
        [
            'question' => 'Do you guarantee plagiarism-free work?',
            'answer'   => 'Yes, every paper is written from scratch, checked with plagiarism detection tools, and comes with a free originality report upon request.',
        ],
        [
            'question' => 'What payment methods do you accept?',
            'answer'   => 'We accept Stripe, Apple Pay, and all major debit/credit cards in GBP for UK students.',
        ],
        [
            'question' => 'Can I track the progress of my order?',
            'answer'   => 'Absolutely! Log into your profile to see live updates on your order (new, in progress, completed).',
        ],
        [
            'question' => 'Are your writers qualified?',
            'answer'   => 'Yes, our writers hold UK university degrees (Bachelor’s, Master’s, or PhD) and are experts in their academic fields.',
        ],
        [
            'question' => 'Is my personal information safe?',
            'answer'   => 'We use secure encryption and never share your details with third parties. All orders are 100% confidential.',
        ],
    ];

    public function render()
    {
        return view('livewire.faq-section');
    }
}
