<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Mail\Mailable;

class AdminOrderPaidMail extends Mailable
{
    public $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function build()
    {
        return $this->subject('💸 New Paid Order: ' . $this->order->reference_code)
            ->from('support@bullwrite.com', 'BullWrite Orders')
            ->replyTo('support@bullwrite.com', 'BullWrite Support')
            ->view('emails.admin.order-paid')
            ->with([
                'order' => $this->order,
            ]);
    }
}
