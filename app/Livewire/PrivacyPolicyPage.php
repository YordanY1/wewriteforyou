<?php

namespace App\Livewire;

use Livewire\Component;

class PrivacyPolicyPage extends Component
{
    public function render()
    {
        $title = 'Privacy Policy | BullWrite UK';
        $description = 'Learn how BullWrite securely handles and protects your personal data in full compliance with GDPR and UK Data Protection laws.';
        $keywords = 'privacy policy, GDPR compliance, data protection UK, BullWrite privacy, user information security';
        $robots = 'index, follow';

        return view('livewire.privacy-policy-page', compact('title', 'description', 'keywords', 'robots'))
            ->layout('layouts.app');
    }
}
