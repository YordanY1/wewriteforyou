<section class="py-20 bg-red-50 text-center">
    <h1 class="text-3xl font-bold text-red-600 mb-4">❌ Payment Cancelled</h1>
    <p class="text-lg">
        Your order was cancelled and has been removed.
    </p>

    @if ($reference)
        <p class="mt-4 text-sm text-gray-600">
            Reference code: <strong>{{ $reference }}</strong>
        </p>
    @endif

    <a href="{{ route('home') }}" class="mt-6 inline-block bg-primary text-white px-6 py-3 rounded-lg">
        Try Again
    </a>
</section>
