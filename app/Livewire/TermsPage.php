<?php

namespace App\Livewire;

use Livewire\Component;

class TermsPage extends Component
{
    public function render()
    {
        $title = 'Terms & Conditions | WeWriteForYou UK';
        $description = 'Read the Terms & Conditions of WeWriteForYou – Academic writing services in the UK.';
        $keywords = 'terms and conditions, essay writing UK, WeWriteForYou legal';

        return view('livewire.terms-page', compact('title', 'description', 'keywords'))
            ->layout('layouts.app');
    }
}
