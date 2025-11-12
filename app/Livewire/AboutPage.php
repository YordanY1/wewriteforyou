<?php

namespace App\Livewire;

use Livewire\Component;

class AboutPage extends Component
{
    public function render()
    {
        return view('livewire.about-page', [
            'title'       => 'About BullWrite | Academic Editing & Feedback for UK Students',
            'description' => 'Learn more about BullWrite – a team of qualified academic editors providing professional feedback and writing improvement support for students across the UK.',
            'keywords'    => 'academic editing UK students, essay feedback experts, writing improvement, proofreading support, student writing help UK',
        ])->layout('layouts.app');
    }
}
