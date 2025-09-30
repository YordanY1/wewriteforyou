<?php

namespace App\Livewire;

use Livewire\Component;

class ContactPage extends Component
{
    public $name, $email, $message;

    public function send()
    {
        $this->validate([
            'name' => 'required|string|min:3',
            'email' => 'required|email',
            'message' => 'required|string|min:10',
        ]);

        session()->flash('success', 'Your message has been sent successfully!');

        $this->reset();
    }

    public function render()
    {
        return view('livewire.contact-page')->layout('layouts.app');
    }
}
