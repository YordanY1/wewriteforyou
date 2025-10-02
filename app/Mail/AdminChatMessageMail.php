<?php

namespace App\Mail;

use App\Models\ChatMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdminChatMessageMail extends Mailable
{
    use Queueable, SerializesModels;

    public ChatMessage $chatMessage;

    public function __construct(ChatMessage $chatMessage)
    {
        $this->chatMessage = $chatMessage;
    }

    public function build()
    {
        return $this->subject('💬 New message from client')
            ->view('emails.chat.admin-message')
            ->with([
                'chatMessage' => $this->chatMessage,
            ]);
    }
}
