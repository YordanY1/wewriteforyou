<?php

namespace App\Livewire;

use Livewire\Component;

class CookieConsent extends Component
{
    public bool $show = true;

    public function mount()
    {
        $this->show = ! request()->cookie('cookie_consent') && ! request()->cookie('cookie_rejected');
    }

    public function accept()
    {
        // Accept – store positive consent for 1 year
        cookie()->queue(cookie('cookie_consent', true, 60 * 24 * 365));
        $this->show = false;
    }

    public function reject()
    {
        // Reject – store negative consent for 1 year (so banner doesn’t reappear)
        cookie()->queue(cookie('cookie_rejected', true, 60 * 24 * 365));
        $this->show = false;
    }

    public function render()
    {
        return view('livewire.cookie-consent');
    }
}
