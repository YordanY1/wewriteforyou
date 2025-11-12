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
            'title'       => 'Client Reviews & Feedback | BullWrite',
            'description' => 'Read authentic client feedback about BullWrite’s academic editing and feedback services. Trusted by students across the UK for improving clarity, structure, and originality.',
            'keywords'    => 'BullWrite reviews, academic editing feedback, UK student testimonials, writing improvement services',
        ])->layout('layouts.app');
    }
}
