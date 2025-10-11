<?php

namespace App\Livewire;

use Livewire\Component;

class AboutPage extends Component
{
    public function render()
    {
        return view('livewire.about-page', [
            'title'       => 'About BullWrite | Academic Editing & Feedback Experts UK',
            'description' => 'Learn more about BullWrite – a team of qualified UK academic editors providing professional feedback and writing improvement support for students.',
            'keywords'    => 'academic editing UK, writing improvement team, essay feedback experts, proofreading support UK',
        ])->layout('layouts.app');
    }
}
