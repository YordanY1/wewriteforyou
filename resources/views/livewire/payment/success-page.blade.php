<section class="py-20 bg-green-50 text-center">
    <h1 class="text-3xl font-bold text-green-600 mb-4">🎉 Payment Successful!</h1>
    <p class="text-lg">
        Thank you! Your order has been paid and is now being processed.
    </p>

    @if ($reference)
        <p class="mt-4 text-sm text-gray-600">
            Order reference: <strong>{{ $reference }}</strong>
        </p>
    @endif

    <a href="{{ route('home') }}" class="mt-6 inline-block bg-primary text-white px-6 py-3 rounded-lg">
        Back to Home
    </a>
</section>
