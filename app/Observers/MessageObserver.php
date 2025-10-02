<?php

namespace App\Observers;

use App\Models\ChatMessage;
use Illuminate\Support\Facades\Mail;
use App\Mail\ClientChatMessageMail;
use App\Mail\AdminChatMessageMail;

class MessageObserver
{
    public function created(ChatMessage $message)
    {
        $order = $message->order;

        if (! $order) {
            return;
        }

        if ($message->sender_type === 'admin') {
            if ($order->email) {
                Mail::to($order->email)->send(new ClientChatMessageMail($message));
            }
        }

        if ($message->sender_type === 'client') {
            Mail::to(config('mail.admin_recipients'))
                ->send(new AdminChatMessageMail($message));
        }
    }
}
