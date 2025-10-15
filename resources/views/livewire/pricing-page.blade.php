<div class="container mx-auto px-6 py-20">
    <h1 class="text-5xl font-extrabold text-primary mb-12 text-center">
        Writing & Editing Prices for UK Students
    </h1>

    <p class="max-w-2xl mx-auto text-center text-gray-600 mb-16 leading-relaxed">
        Clear, transparent, and student-friendly pricing for our writing, editing, and feedback plans.
        All rates are in {{ optional($pricings->first()?->currency)->name ?? 'GBP' }} — no hidden fees, ever.
    </p>

    <!-- Pricing Table -->
    @if ($pricings->count() > 0)
        <div class="overflow-x-auto mb-20">
            <table class="w-full md:w-3/4 mx-auto border-collapse shadow-lg rounded-xl overflow-hidden">
                <thead>
                    <tr class="bg-primary text-white text-lg">
                        <th scope="col" class="px-6 py-4">Words</th>
                        <th scope="col" class="px-6 py-4">7 Days</th>
                        <th scope="col" class="px-6 py-4">3 Days</th>
                        <th scope="col" class="px-6 py-4">2 Days</th>
                        <th scope="col" class="px-6 py-4">1 Day</th>
                        <th scope="col" class="px-6 py-4">12 Hours</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pricings as $pricing)
                        <tr class="{{ $loop->even ? 'bg-gray-50' : 'bg-white' }} hover:bg-gray-100 transition">
                            <td class="px-6 py-4 font-semibold">{{ $pricing->words ?? '-' }}</td>
                            <td class="px-6 py-4">
                                {{ optional($pricing->currency)->symbol ?? '' }}{{ $pricing->d7 ?? '-' }}</td>
                            <td class="px-6 py-4">
                                {{ optional($pricing->currency)->symbol ?? '' }}{{ $pricing->d3 ?? '-' }}</td>
                            <td class="px-6 py-4">
                                {{ optional($pricing->currency)->symbol ?? '' }}{{ $pricing->d2 ?? '-' }}</td>
                            <td class="px-6 py-4">
                                {{ optional($pricing->currency)->symbol ?? '' }}{{ $pricing->d1 ?? '-' }}</td>
                            <td class="px-6 py-4 text-red-600 font-bold">
                                {{ optional($pricing->currency)->symbol ?? '' }}{{ $pricing->h12 ?? '-' }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="text-center text-gray-500 mb-20">
            <p>No pricing data available at the moment. Please check back later.</p>
        </div>
    @endif

    <!-- Packages -->
    <div class="grid md:grid-cols-3 gap-10">
        <!-- Standard -->
        <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-2xl transition text-center">
            <h3 class="text-2xl font-bold mb-4 text-primary">Standard</h3>
            <p class="text-gray-600 mb-6">Ideal for students planning ahead — delivery in 5–7 days.</p>
            <p class="text-3xl font-extrabold mb-6">
                From {{ optional($pricings->first()?->currency)->symbol ?? '' }}{{ $standardPrice ?? '' }}
            </p>
            <p class="text-sm text-gray-500">Most affordable option</p>
        </div>

        <!-- Express -->
        <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-2xl transition text-center border-2 border-gold">
            <h3 class="text-2xl font-bold mb-4 text-secondary">Express</h3>
            <p class="text-gray-600 mb-6">Fast turnaround – receive your paper within 2–3 days.</p>
            <p class="text-3xl font-extrabold mb-6">
                From {{ optional($pricings->first()?->currency)->symbol ?? '' }}{{ $expressPrice ?? '' }}
            </p>
            <p class="text-sm text-gray-500">Balanced speed & value</p>
        </div>

        <!-- Urgent -->
        <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-2xl transition text-center">
            <h3 class="text-2xl font-bold mb-4 text-red-600">Urgent</h3>
            <p class="text-gray-600 mb-6">Need it today? Get your order completed in 24 hours.</p>
            <p class="text-3xl font-extrabold mb-6">
                From {{ optional($pricings->first()?->currency)->symbol ?? '' }}{{ $urgentPrice ?? '' }}
            </p>
            <p class="text-sm text-gray-500">Priority service for tight deadlines</p>
        </div>
    </div>

    <!-- Trust Note -->
    <div class="text-center mt-10 text-gray-500 text-sm">
        All prices include taxes & fees. Payments are processed securely via Stripe, Apple Pay and Google Pay.

        <p class="mt-2 text-gray-500 text-sm">
            Every document is 100% plagiarism-free and written without AI assistance.
        </p>
    </div>
</div>
