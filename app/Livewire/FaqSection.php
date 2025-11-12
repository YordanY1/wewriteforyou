<?php

namespace App\Livewire;

use Livewire\Component;

class FaqSection extends Component
{
    public array $faqs = [
        [
            'question' => 'How quickly can I receive my edited document?',
            'answer'   => 'Standard feedback is delivered within 3–7 days, while express turnaround (within 24 hours) is available for shorter drafts.',
        ],
        [
            'question' => 'Do you check for originality?',
            'answer'   => 'Yes. Every document we review is analysed for originality, and we provide optional feedback on referencing and citation quality.',
        ],
        [
            'question' => 'What payment options are available?',
            'answer'   => 'You can pay securely through Stripe, Apple Pay, or any major debit/credit card in GBP.',
        ],
        [
            'question' => 'Can I follow the progress of my feedback?',
            'answer'   => 'Yes! You can log in at any time to see the current status of your review — from received to completed.',
        ],
        [
            'question' => 'Who provides the feedback?',
            'answer'   => 'All feedback is provided by qualified academic editors experienced in UK university writing and assessment standards.',
        ],

        [
            'question' => 'Is my personal information protected?',
            'answer'   => 'Absolutely. We use secure encryption, follow GDPR compliance, and never share client data with third parties.',
        ],
    ];

    public function render()
    {
        return view('livewire.faq-section');
    }
}
