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
            'title'       => 'Client Reviews & Feedback | BullWrite UK',
            'description' => 'Read authentic client feedback about BullWrite’s academic editing and feedback services. Trusted by UK students for clarity, structure, and originality advice.',
            'keywords'    => 'BullWrite reviews, academic editing feedback UK, student testimonials, writing improvement services',
        ])->layout('layouts.app');
    }
}
