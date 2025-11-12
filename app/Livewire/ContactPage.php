<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Mail\ContactMessageMail;
use Illuminate\Support\Facades\Http;

class ContactPage extends Component
{
    public $name;
    public $email;
    public $message;
    public $recaptchaToken;

    public function send()
    {
        $this->validate([
            'name'    => 'required|string|min:3',
            'email'   => 'required|email',
            'message' => 'required|string|min:10',
        ]);

        $captchaToken = $this->recaptchaToken;

        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret'   => env('RECAPTCHA_SECRET_KEY'),
            'response' => $captchaToken,
            'remoteip' => request()->ip(),
        ]);

        if (!($response->json('success') ?? false)) {
            session()->flash('error', 'reCAPTCHA verification failed. Please try again.');
            return;
        }

        $recipients = config('mail.admin_recipients', []);

        if (!empty($recipients)) {
            foreach ($recipients as $recipient) {
                try {
                    Mail::to($recipient)->send(
                        new ContactMessageMail($this->name, $this->email, $this->message)
                    );
                } catch (\Exception $e) {
                    Log::error("Contact form mail failed to {$recipient}: " . $e->getMessage());
                }
            }
        }

        session()->flash('success', '✅ Your message has been sent successfully!');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.contact-page', [
            'title'       => 'Contact BullWrite | Academic Editing & Feedback for UK Students',
            'description' => 'Reach out to BullWrite for academic editing, feedback, and writing improvement support for students across the UK. We’re available 24/7 to help you enhance your academic writing.',
            'keywords'    => 'contact BullWrite UK students, academic editing support, proofreading help UK, writing feedback service',
        ])->layout('layouts.app');
    }
}
