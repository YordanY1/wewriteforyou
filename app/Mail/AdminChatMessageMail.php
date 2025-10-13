<?php

namespace App\Mail;

use App\Models\ChatMessage;
use Illuminate\Mail\Mailable;

class AdminChatMessageMail extends Mailable
{
    public ChatMessage $chatMessage;

    public function __construct(ChatMessage $chatMessage)
    {
        $this->chatMessage = $chatMessage;
    }

    public function build()
    {
        return $this->subject('💬 New message from client')
            ->from('support@bullwrite.com', 'BullWrite Chat System')
            ->replyTo('support@bullwrite.com', 'BullWrite Support')
            ->view('emails.chat.admin-message')
            ->with([
                'chatMessage' => $this->chatMessage,
            ]);
    }
}
