<div class="container mx-auto px-6 py-20">
    <h1 class="text-5xl font-extrabold text-primary mb-12 text-center">Client Reviews</h1>
    <p class="max-w-2xl mx-auto text-center text-gray-600 mb-16">
        We’re proud to share what students say about our services.
        Real feedback from real clients in the UK and worldwide.
    </p>

    <!-- Review Form -->
    <div class="max-w-2xl mx-auto mb-12">
        <h2 class="text-2xl font-bold mb-6 text-center">Leave Your Review</h2>
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
            <p class="col-span-3 text-center text-gray-500">No reviews yet.</p>
        @endforelse
    </div>
</div>
