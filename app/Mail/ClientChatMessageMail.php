<?php

namespace App\Mail;

use App\Models\ChatMessage;
use Illuminate\Mail\Mailable;

class ClientChatMessageMail extends Mailable
{
    public ChatMessage $chatMessage;

    public function __construct(ChatMessage $chatMessage)
    {
        $this->chatMessage = $chatMessage;
    }

    public function build()
    {
        return $this->subject('New message from BullWrite Support')
            ->from('support@bullwrite.com', 'BullWrite Support')
            ->replyTo('support@bullwrite.com', 'BullWrite Support')
            ->view('emails.chat.client-message')
            ->with([
                'chatMessage' => $this->chatMessage,
            ]);
    }
}
