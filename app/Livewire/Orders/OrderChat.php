<?php

namespace App\Livewire\Orders;

use Livewire\Component;
use App\Models\Order;
use App\Models\ChatMessage;
use Illuminate\Support\Facades\Auth;
use App\Mail\AdminChatMessageMail;
use Illuminate\Support\Facades\Mail;

class OrderChat extends Component
{
    public Order $order;
    public $message;

    protected $rules = [
        'message' => 'required|string|min:2|max:2000'
    ];

    public function mount(Order $order)
    {
        $this->order = $order;

        ChatMessage::where('order_id', $this->order->id)
            ->where('sender_type', 'admin')
            ->where('is_read', false)
            ->update(['is_read' => true]);
    }

    public function sendMessage()
    {
        $this->validate();

        $message = ChatMessage::create([
            'order_id'   => $this->order->id,
            'user_id'    => Auth::id(),
            'sender_type' => 'client',
            'message'    => $this->message,
            'is_read'    => false,
        ]);

        Mail::to(config('mail.admin_address', 'admin@wewriteforyou.com'))
            ->send(new AdminChatMessageMail($message));

        $this->reset('message');

        $this->dispatch('$refresh');
    }

    public function render()
    {
        return view('livewire.orders.order-chat', [
            'messages' => $this->order->messages()->latest()->take(50)->get()->reverse(),
        ])->layout('layouts.app');
    }
}
