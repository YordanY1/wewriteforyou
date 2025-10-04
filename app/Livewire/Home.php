<?php

namespace App\Livewire;

use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        return view('livewire.home', [
            'title' => 'Essay Writing Services UK | WeWriteForYou',
            'description' => 'Trusted essay writing services in the UK. Affordable, reliable, and plagiarism-free academic writing tailored for students.',
            'keywords' => 'essay writing UK, assignment help UK, academic writing services, dissertation writing UK',
            'author' => 'WeWriteForYou Team',
            'robots' => 'index, follow',
        ])->layout('layouts.app');
    }
}
