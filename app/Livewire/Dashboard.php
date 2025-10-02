<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\ChatMessage;

class Dashboard extends Component
{
    public $message;

    public function logout()
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();

        return redirect()->route('home');
    }

    public function render()
    {
        $user = Auth::user();

        $latestMessages = ChatMessage::whereIn('order_id', $user->orders->pluck('id'))
            ->latest()
            ->take(5)
            ->get();

        return view('livewire.dashboard', [
            'user' => $user,
            'latestMessages' => $latestMessages,
        ])->layout('layouts.app');
    }
}
