<?php

namespace App\Livewire;

use Livewire\Component;

class CookiePolicyPage extends Component
{
    public function render()
    {
        $title = 'Cookie Policy | WeWriteForYou UK';
        $description = 'Our Cookie Policy explains which cookies we use (essential, functional, analytics, marketing) and why.';
        $keywords = 'cookie policy, cookies, analytics, WeWriteForYou';

        return view('livewire.cookie-policy-page', compact('title', 'description', 'keywords'))
            ->layout('layouts.app');
    }
}
