<section id="reviews" class="bg-gray-100 py-20">
    <div class="container mx-auto px-6 text-center">
        <h2 class="text-4xl font-extrabold text-primary mb-12">
            Student Reviews – Essay & Assignment Writing UK
        </h2>

        <div class="grid md:grid-cols-3 gap-8">
            @forelse ($reviews as $review)
                <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-xl transition">
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
                <p class="col-span-3 text-gray-500">No reviews yet. Be the first to share yours!</p>
            @endforelse
        </div>

        <!-- Call to action -->
        <div class="mt-12">
            <a href="{{ route('reviews') }}" wire:navigate
                class="bg-gold text-black px-8 py-3 rounded-lg font-bold shadow hover:bg-secondary hover:text-white transition">
                Write a Review
            </a>
        </div>
    </div>
</section>


@php
    $aggregateRating = [
        '@type' => 'AggregateRating',
        'ratingValue' => number_format($reviews->avg('rating'), 1),
        'reviewCount' => $reviews->count(),
    ];

    $reviewSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'Product',
        'name' => 'WeWriteForYou Academic Writing Services',
        'aggregateRating' => $aggregateRating,
    ];
@endphp

<script type="application/ld+json">
{!! json_encode($reviewSchema, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT) !!}
</script>
