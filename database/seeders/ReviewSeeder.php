<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Review;

class ReviewSeeder extends Seeder
{
    public function run(): void
    {
        $reviews = [
            [
                'author_name' => 'Emily R. (University of Sheffield)',
                'rating' => 5,
                'comment' => 'BullWrite has been a game-changer for my academic studies. The model essays are incredibly detailed and well-structured, and the accompanying notes helped me understand how to improve my own writing. I feel more confident tackling assignments now. Highly recommend for any student looking for a one-stop platform for learning and reference materials.',
                'is_public' => true,
            ],
            [
                'author_name' => 'James K. (University of Manchester)',
                'rating' => 5,
                'comment' => 'I submitted a draft for feedback, and the BullWrite team provided thorough, actionable comments that improved my essay significantly. The feedback was professional, clear, and very easy to apply. The turnaround was fast too! Perfect for students who want to refine their writing skills and submit polished work.',
                'is_public' => true,
            ],
            [
                'author_name' => 'Sarah L. (King’s College London)',
                'rating' => 5,
                'comment' => 'From start to finish, BullWrite delivers a professional and reliable service. The website is easy to use, payment is straightforward, and the support team is very responsive. I used multiple services – model essays, editing, and referencing advice – and it really felt like a one-stop solution for everything a student needs to succeed academically.',
                'is_public' => true,
            ],
            [
                'author_name' => 'Ahmed S. (University of Leeds)',
                'rating' => 5,
                'comment' => 'I had a tight deadline and wasn’t sure how to improve my essay. BullWrite delivered exactly what I needed within 24 hours, with detailed feedback and suggestions. The team is clearly experienced and knowledgeable. I will definitely use this service again for future assignments.',
                'is_public' => true,
            ],
            [
                'author_name' => 'Chloe T. (University of Edinburgh)',
                'rating' => 5,
                'comment' => 'BullWrite is trustworthy and professional – everything I ordered was delivered on time, and the quality exceeded my expectations. I love that the materials are educational, so I can learn from them and improve my own work rather than just getting answers. This is easily the best academic support platform I’ve used.',
                'is_public' => true,
            ],
        ];

        foreach ($reviews as $review) {
            Review::create($review);
        }
    }
}
