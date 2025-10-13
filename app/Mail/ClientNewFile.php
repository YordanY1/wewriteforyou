<?php

namespace App\Mail;

use App\Models\OrderFile;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Storage;

class ClientNewFile extends Mailable
{
    public OrderFile $file;
    public bool $isGuest;

    public function __construct(OrderFile $file)
    {
        $this->file = $file;
        $this->isGuest = !$file->order?->user_id;
    }

    public function build()
    {
        $mail = $this->subject('📂 New File for Your Order')
            ->from('support@bullwrite.com', 'BullWrite Orders')
            ->replyTo('support@bullwrite.com', 'BullWrite Support')
            ->view('emails.client.new-file')
            ->with([
                'file' => $this->file,
                'isGuest' => $this->isGuest,
            ]);

        if ($this->isGuest) {
            $mail->attach(Storage::disk('public')->path($this->file->path), [
                'as'   => $this->file->original_name,
                'mime' => $this->file->mime_type,
            ]);
        }

        return $mail;
    }
}
