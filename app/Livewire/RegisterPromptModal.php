<?php

namespace App\Livewire;

use Livewire\Component;

class RegisterPromptModal extends Component
{
    public bool $open = false;

    protected $listeners = ['openRegisterModal' => 'open'];

    public function open()
    {
        $this->open = true;
    }

    public function close()
    {
        $this->open = false;
    }

    public function redirectToRegister()
    {
        return redirect()->route('register');
    }

    public function render()
    {
        return view('livewire.register-prompt-modal');
    }
}
