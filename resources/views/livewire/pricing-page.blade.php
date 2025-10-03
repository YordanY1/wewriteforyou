<div class="container mx-auto px-6 py-20">
    <h1 class="text-5xl font-extrabold text-primary mb-12 text-center">Our Pricing</h1>
    <p class="max-w-2xl mx-auto text-center text-gray-600 mb-16">
        Transparent, affordable pricing tailored for students in the UK.
        Prices vary depending on word count and urgency.
    </p>

    <!-- Pricing Table -->
    <div class="overflow-x-auto mb-20">
        <table class="w-full md:w-3/4 mx-auto border-collapse shadow-lg rounded-xl overflow-hidden">
            <thead>
                <tr class="bg-primary text-white text-lg">
                    <th class="px-6 py-4">Words</th>
                    <th class="px-6 py-4">7 Days</th>
                    <th class="px-6 py-4">3 Days</th>
                    <th class="px-6 py-4">2 Days</th>
                    <th class="px-6 py-4">1 Day</th>
                    <th class="px-6 py-4">12 Hours</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pricings as $pricing)
                    <tr class="bg-white hover:bg-gray-50 transition">
                        <td class="px-6 py-4 font-semibold">{{ $pricing->words }}</td>
                        <td class="px-6 py-4">{{ $pricing->currency->symbol }}{{ $pricing->d7 }}</td>
                        <td class="px-6 py-4">{{ $pricing->currency->symbol }}{{ $pricing->d3 }}</td>
                        <td class="px-6 py-4">{{ $pricing->currency->symbol }}{{ $pricing->d2 }}</td>
                        <td class="px-6 py-4">{{ $pricing->currency->symbol }}{{ $pricing->d1 }}</td>
                        <td class="px-6 py-4 text-red-600 font-bold">
                            {{ $pricing->currency->symbol }}{{ $pricing->h12 }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Packages -->
    <div class="grid md:grid-cols-3 gap-10">
        <!-- Standard -->
        <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-2xl transition text-center">
            <h3 class="text-2xl font-bold mb-4 text-primary">Standard</h3>
            <p class="text-gray-600 mb-6">Best for students who plan ahead. Delivery in 5–7 days.</p>
            <p class="text-3xl font-extrabold mb-6">
                From {{ $pricings->first()->currency->symbol }}{{ $standardPrice }}
            </p>
        </div>

        <!-- Express -->
        <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-2xl transition text-center border-2 border-gold">
            <h3 class="text-2xl font-bold mb-4 text-secondary">Express</h3>
            <p class="text-gray-600 mb-6">Tighter deadline? We deliver in 2–3 days with priority service.</p>
            <p class="text-3xl font-extrabold mb-6">
                From {{ $pricings->first()->currency->symbol }}{{ $expressPrice }}
            </p>
        </div>

        <!-- Urgent -->
        <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-2xl transition text-center">
            <h3 class="text-2xl font-bold mb-4 text-red-600">Urgent</h3>
            <p class="text-gray-600 mb-6">Need it within 24 hours? Our urgent service has you covered.</p>
            <p class="text-3xl font-extrabold mb-6">
                From {{ $pricings->first()->currency->symbol }}{{ $urgentPrice }}
            </p>
        </div>
    </div>
</div>
