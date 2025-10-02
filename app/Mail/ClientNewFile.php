<?php

namespace App\Mail;

use App\Models\OrderFile;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class ClientNewFile extends Mailable
{
    use Queueable, SerializesModels;

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
            ->view('emails.client.new-file');

        if ($this->isGuest) {
            $mail->attach(Storage::disk('public')->path($this->file->path), [
                'as'   => $this->file->original_name,
                'mime' => $this->file->mime_type,
            ]);
        }

        return $mail;
    }
}
