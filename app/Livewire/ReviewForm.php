<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class ReviewForm extends Component
{
    public $rating = 5;
    public $comment = '';
    public $author_name = '';

    public function submit()
    {
        if (!Auth::check() && empty($this->author_name)) {
            $this->addError('author_name', 'Please enter your name.');
            return;
        }

        Review::create([
            'user_id' => Auth::id(),
            'author_name' => Auth::check() ? Auth::user()->name : $this->author_name,
            'rating' => $this->rating,
            'comment' => $this->comment,
            'is_public' => true,
            'approved_at' => now(),
        ]);

        $this->reset(['rating', 'comment', 'author_name']);
        session()->flash('message', 'Thanks for your review!');
    }

    public function render()
    {
        return view('livewire.review-form');
    }
}
