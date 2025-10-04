<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMessageMail;

class ContactPage extends Component
{
    public $name, $email, $message;

    public function send()
    {
        $this->validate([
            'name'    => 'required|string|min:3',
            'email'   => 'required|email',
            'message' => 'required|string|min:10',
        ]);

        $recipients = config('mail.admin_recipients', []);

        if (!empty($recipients)) {
            foreach ($recipients as $recipient) {
                Mail::to($recipient)->send(
                    new ContactMessageMail($this->name, $this->email, $this->message)
                );
            }
        }

        session()->flash('success', '✅ Your message has been sent successfully!');

        $this->reset();
    }

    public function render()
    {
        return view('livewire.contact-page', [
            'title'       => 'Contact Us | WeWriteForYou UK',
            'description' => 'Get in touch with WeWriteForYou. Reach out via email, phone, or our secure contact form.',
            'keywords'    => 'contact essay help UK, WeWriteForYou support, academic writing contact',
        ])->layout('layouts.app');
    }
}
