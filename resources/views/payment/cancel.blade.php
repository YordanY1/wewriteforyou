<x-layouts.payment>
    <div class="bg-white p-8 rounded-xl shadow-lg text-center">
        <div class="flex justify-center mb-4">
            <div class="h-16 w-16 rounded-full bg-yellow-100 flex items-center justify-center animate-pulse">
                <span class="text-3xl">⚠️</span>
            </div>
        </div>

        <h1 class="text-3xl font-extrabold text-yellow-600 mb-2">Payment Cancelled</h1>
        <p class="text-gray-700 mb-6">Your payment was cancelled. No money has been taken from your account.</p>

        @if ($order)
            <div class="bg-gray-50 p-6 rounded-lg text-left shadow-inner">
                <h2 class="text-lg font-semibold mb-4 text-gray-800">Order Info</h2>
                <ul class="space-y-2 text-gray-700">
                    <li>📌 <strong>Reference:</strong> {{ $order->reference_code }}</li>
                    <li>📖 <strong>Topic:</strong> {{ $order->topic }}</li>
                    <li>📚 <strong>Subject:</strong> {{ $order->subject?->name }}</li>
                </ul>
                <p class="mt-4 text-sm text-gray-500 italic">This order has been removed from our system.</p>
            </div>
        @endif

        <div class="mt-8">
            <a href="{{ route('home') }}"
                class="inline-block px-6 py-3 rounded-lg bg-blue-600 text-white font-semibold shadow hover:bg-blue-700 transition">
                ⬅ Back to Home
            </a>
        </div>
    </div>
</x-layouts.payment>
