<?php

namespace App\Livewire;

use Livewire\Component;

class CookiePolicyPage extends Component
{
    public function render()
    {
        $title = 'Cookie Policy | BullWrite UK';
        $description = 'Learn how BullWrite uses essential and functional cookies to enhance usability, security, and analytics for a better user experience.';
        $keywords = 'cookie policy UK, BullWrite cookies, website cookies, privacy and analytics';

        return view('livewire.cookie-policy-page', compact('title', 'description', 'keywords'))
            ->layout('layouts.app');
    }
}
