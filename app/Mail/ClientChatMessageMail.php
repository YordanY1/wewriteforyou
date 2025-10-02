<?php

namespace App\Mail;

use App\Models\ChatMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ClientChatMessageMail extends Mailable
{
    use Queueable, SerializesModels;

    public ChatMessage $chatMessage;

    public function __construct(ChatMessage $chatMessage)
    {
        $this->chatMessage = $chatMessage;
    }

    public function build()
    {
        return $this->subject('New message from WeWriteForYou Support')
            ->view('emails.chat.client-message')
            ->with([
                'chatMessage' => $this->chatMessage,
            ]);
    }
}
