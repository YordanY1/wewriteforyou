<?php

namespace App\Livewire;

use Livewire\Component;

class PrivacyPolicyPage extends Component
{
    public function render()
    {
        $title = 'Privacy Policy | BullWrite';
        $description = 'Learn how BullWrite securely handles and protects your personal data in compliance with GDPR and UK data protection standards.';
        $keywords = 'privacy policy, GDPR compliance, UK data protection, BullWrite privacy, personal data security';
        $robots = 'index, follow';

        return view('livewire.privacy-policy-page', compact('title', 'description', 'keywords', 'robots'))
            ->layout('layouts.app');
    }
}
