<?php

namespace App\Livewire;

use Livewire\Component;

class CookieConsent extends Component
{
    public bool $show = true;

    public function mount()
    {
        $this->show = ! request()->cookie('cookie_consent');
    }

    public function accept()
    {
        cookie()->queue(cookie('cookie_consent', true, 60 * 24 * 365));
        $this->show = false;
    }

    public function render()
    {
        return view('livewire.cookie-consent');
    }
}
