<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Mail\Mailable;

class OrderStatusUpdated extends Mailable
{
    public Order $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function build()
    {
        return $this->subject('📦 Your Order Status Has Been Updated')
            ->from('bullwritecontacts@gmail.com', 'BullWrite Orders')
            ->replyTo('bullwritecontacts@gmail.com', 'BullWrite Support')
            ->view('emails.client.status-updated')
            ->with([
                'order' => $this->order,
            ]);
    }
}
