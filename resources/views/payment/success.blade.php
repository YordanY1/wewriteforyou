<x-layouts.payment>
    <div class="bg-white p-8 rounded-xl shadow-lg text-center">

        @if ($order)

            {{-- Google Ads PURCHASE conversion --}}
            @if (app()->environment('production'))
                <script>
                    if (typeof gtag === 'function') {
                        gtag('event', 'conversion', {
                            send_to: 'AW-17814106672/64NVCO2vhNYbELDktq5C',
                            value: {{ number_format($order->final_price, 2, '.', '') }},
                            currency: 'GBP',
                            transaction_id: '{{ $order->reference_code }}'
                        });
                    }
                </script>
            @endif

            {{-- Success Icon --}}
            <div class="flex justify-center mb-4">
                <div class="h-16 w-16 rounded-full bg-green-100 flex items-center justify-center animate-bounce">
                    <span class="text-3xl">✅</span>
                </div>
            </div>

            {{-- Success Message --}}
            <h1 class="text-3xl font-extrabold text-green-600 mb-2">
                Payment Successful
            </h1>

            <p class="text-gray-700 mb-6">
                Thank you, <strong>{{ $order->email }}</strong>!
                Your order has been confirmed and is now marked as <strong>paid</strong>.
            </p>

            {{-- Order Details --}}
            <div class="bg-gray-50 p-6 rounded-lg text-left shadow-inner">
                <h2 class="text-lg font-semibold mb-4 text-gray-800">
                    Order Details
                </h2>

                <ul class="space-y-2 text-gray-700">
                    <li>📌 <strong>Reference:</strong> {{ $order->reference_code }}</li>
                    <li>📖 <strong>Topic:</strong> {{ $order->topic }}</li>
                    <li>📚 <strong>Subject:</strong> {{ $order->subject?->name }}</li>
                    <li>✍️ <strong>Word Count:</strong> {{ $order->words }}</li>
                    <li>⏰ <strong>Deadline:</strong> {{ $order->deadline_option }}</li>
                    <li>💷 <strong>Total Paid:</strong> £{{ number_format($order->final_price, 2) }}</li>
                </ul>
            </div>
        @else
            {{-- Error State --}}
            <div class="flex justify-center mb-4">
                <div class="h-16 w-16 rounded-full bg-red-100 flex items-center justify-center animate-pulse">
                    <span class="text-3xl">⚠️</span>
                </div>
            </div>

            <h1 class="text-2xl font-bold mb-4 text-red-600">
                Order not found
            </h1>

            <p class="text-gray-600">
                We couldn’t find your order details.
            </p>

        @endif

        {{-- Back to home --}}
        <div class="mt-8">
            <a href="{{ route('home') }}"
                class="inline-block px-6 py-3 rounded-lg bg-blue-600 text-white font-semibold shadow hover:bg-blue-700 transition">
                ⬅ Back to Home
            </a>
        </div>

    </div>
</x-layouts.payment>
