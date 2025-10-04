<?php

namespace App\Livewire;

use Livewire\Component;

class PrivacyPolicyPage extends Component
{
    public function render()
    {
        $title = 'Privacy Policy | WeWriteForYou UK';
        $description = 'Read our Privacy Policy to learn how WeWriteForYou handles your data under GDPR and UK law.';
        $keywords = 'privacy policy, GDPR, essay writing UK, WeWriteForYou data protection';

        return view('livewire.privacy-policy-page', compact('title', 'description', 'keywords'))
            ->layout('layouts.app');
    }
}
