<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Mail\ContactMessageMail;

class ContactPage extends Component
{
    public $name;
    public $email;
    public $message;

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
                try {
                    Mail::to($recipient)->send(
                        new ContactMessageMail($this->name, $this->email, $this->message)
                    );

                    Log::info("Contact message sent successfully to {$recipient} from {$this->email}");
                } catch (\Exception $e) {
                    Log::error("Contact form mail failed to {$recipient}: " . $e->getMessage());
                }
            }
        } else {
            Log::warning('Contact form attempted send but no admin_recipients configured.');
        }

        session()->flash('success', '✅ Your message has been sent successfully!');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.contact-page', [
            'title'       => 'Contact BullWrite | Academic Editing & Support UK',
            'description' => 'Reach out to BullWrite for academic editing, feedback, and writing improvement support. Available 24/7 for UK students.',
            'keywords'    => 'academic editing contact UK, BullWrite support, proofreading help, writing improvement service',
        ])->layout('layouts.app');
    }
}
