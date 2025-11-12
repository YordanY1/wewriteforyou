<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Mail\Mailable;

class OrderPaidMail extends Mailable
{
    public $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function build()
    {
        return $this->subject('✅ Your Order ' . $this->order->reference_code . ' Confirmation')
            ->from('bullwritecontacts@gmail.com', 'BullWrite Orders')
            ->replyTo('bullwritecontacts@gmail.com', 'BullWrite Support')
            ->to($this->order->email)
            ->view('emails.orders.paid')
            ->with([
                'order' => $this->order,
            ]);
    }
}
