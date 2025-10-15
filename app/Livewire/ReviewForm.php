<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;

class ReviewForm extends Component
{
    public $rating = 5;
    public $comment = '';
    public $author_name = '';

    public function submit()
    {

        $this->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:1000',
            'author_name' => Auth::check() ? 'nullable' : 'required|string|max:100',
        ]);


        Review::create([
            'user_id' => Auth::id(),
            'author_name' => Auth::user()?->name ?? $this->author_name,
            'rating' => $this->rating,
            'comment' => $this->comment,
            'is_public' => false,
            'approved_at' => null,
        ]);

        $this->reset(['rating', 'comment', 'author_name']);

        session()->flash('message', '✅ Thank you for your feedback!');
    }

    public function render()
    {
        if (Auth::check()) {
            $this->author_name = Auth::user()->name;
        }

        return view('livewire.review-form');
    }
}
