<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMessageMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $messageText;

    public function __construct($name, $email, $messageText)
    {
        $this->name = $name;
        $this->email = $email;
        $this->messageText = $messageText;
    }

    public function build()
    {
        return $this->subject('New Contact Form Message')
            ->from('support@bullwrite.com', 'BullWrite Contact Form')
            ->replyTo($this->email, $this->name)
            ->view('emails.contact.contact-message');
    }
}
