<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Review;

class ReviewsSection extends Component
{
    public function render()
    {
        $reviews = Review::query()
            ->where('is_public', true)
            ->latest()
            ->take(3)
            ->get();

        return view('livewire.reviews-section', compact('reviews'));
    }
}
