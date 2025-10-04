<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Review;

class ReviewsPage extends Component
{
    public function render()
    {
        $reviews = Review::query()
            ->where('is_public', true)
            ->latest()
            ->get();

        return view('livewire.reviews-page', [
            'reviews'     => $reviews,
            'title'       => 'Student Reviews | WeWriteForYou UK',
            'description' => 'Read genuine reviews from UK students about our essay and assignment writing services. Trusted, reliable, and top-rated academic support.',
            'keywords'    => 'student reviews UK, essay writing service reviews, WeWriteForYou testimonials',
        ])->layout('layouts.app');
    }
}
