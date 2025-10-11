<?php

namespace App\Livewire;

use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        return view('livewire.home', [
            'title' => 'BullWrite – Academic Editing & Writing Support for UK Students',
            'description' => 'Boost your academic writing with BullWrite. Get expert feedback, proofreading, and structure support for essays and reports – trusted by students across the UK.',
            'keywords' => 'academic editing UK, essay proofreading, writing feedback, essay structure help, academic support UK',
            'author' => 'BullWrite Team',
            'robots' => 'index, follow',
        ])->layout('layouts.app');
    }
}
