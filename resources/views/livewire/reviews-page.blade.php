<div class="container mx-auto px-6 py-20">
    <h1 class="text-5xl font-extrabold text-primary mb-12 text-center">
        What Students Say About BullWrite
    </h1>

    <p class="max-w-2xl mx-auto text-center text-gray-600 mb-16 leading-relaxed">
        See how our academic editing and feedback services have helped students across the UK
        improve their essays, reports, and dissertations.
        100% verified reviews from real clients.
    </p>

    <!-- Review Form -->
    <div class="max-w-2xl mx-auto mb-12">
        <h2 class="text-2xl font-bold mb-6 text-center text-primary">Share Your Experience</h2>
        @livewire('review-form')
    </div>

    <!-- Reviews List -->
    <div class="grid md:grid-cols-3 gap-10">
        @forelse ($reviews as $review)
            <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-2xl transition">
                <div class="flex justify-center mb-4 text-gold text-xl"
                    aria-label="Rating: {{ $review->rating }} out of 5 stars">
                    {{ str_repeat('⭐', $review->rating) }}
                </div>
                <p class="text-gray-700 italic">“{{ $review->comment }}”</p>
                <div class="mt-6 font-semibold text-primary">
                    — {{ $review->user?->name ?? $review->author_name }}
                </div>
            </div>
        @empty
            <p class="col-span-3 text-center text-gray-500">No reviews yet. Be the first to share your feedback!</p>
        @endforelse
    </div>

    <!-- CTA -->
    <div class="text-center mt-16">
        <a href="{{ route('contact') }}" wire:navigate
            class="bg-gold text-black px-8 py-3 rounded-lg font-bold shadow hover:bg-secondary hover:text-white transition">
            Contact Support
        </a>
        <p class="mt-4 text-gray-500 text-sm">We respond to all inquiries within one hour.</p>
    </div>
</div>

@php
    $aggregateRating = [
        '@type' => 'AggregateRating',
        'ratingValue' => number_format($reviews->avg('rating'), 1),
        'reviewCount' => $reviews->count(),
    ];

    $reviewSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'Organization',
        'name' => 'BullWrite Academic Editing',
        'url' => url('/reviews'),
        'aggregateRating' => $aggregateRating,
        'review' => $reviews
            ->map(function ($review) {
                return [
                    '@type' => 'Review',
                    'author' => [
                        '@type' => 'Person',
                        'name' => $review->user?->name ?? $review->author_name,
                    ],
                    'reviewBody' => $review->comment,
                    'reviewRating' => [
                        '@type' => 'Rating',
                        'ratingValue' => $review->rating,
                        'bestRating' => '5',
                    ],
                ];
            })
            ->take(10)
            ->toArray(),
    ];
@endphp

<script type="application/ld+json">
{!! json_encode($reviewSchema, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT) !!}
</script>
