<div class="container mx-auto px-6 py-20">
    <h1 class="text-5xl font-extrabold text-primary mb-12 text-center">
        Writing & Editing Prices for UK Students
    </h1>

    <p class="max-w-2xl mx-auto text-center text-gray-600 mb-16 leading-relaxed">
        Clear, transparent, and student-friendly pricing for our writing, editing, and feedback plans.
        All rates are in {{ optional($writingPricings->first()?->currency)->name ?? 'GBP' }} — no hidden fees, ever.
    </p>

    <!-- ✍️ Writing Prices -->
    <h2 class="text-3xl font-bold text-center text-primary mb-8">✍️ Writing Prices</h2>
    @if ($writingPricings->count() > 0)
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
                    @foreach ($writingPricings as $pricing)
                        <tr class="{{ $loop->even ? 'bg-gray-50' : 'bg-white' }} hover:bg-gray-100 transition">
                            <td class="px-6 py-4 font-semibold">{{ $pricing->words }}</td>
                            <td class="px-6 py-4">{{ optional($pricing->currency)->symbol }}{{ $pricing->d7 }}</td>
                            <td class="px-6 py-4">{{ optional($pricing->currency)->symbol }}{{ $pricing->d3 }}</td>
                            <td class="px-6 py-4">{{ optional($pricing->currency)->symbol }}{{ $pricing->d2 }}</td>
                            <td class="px-6 py-4">{{ optional($pricing->currency)->symbol }}{{ $pricing->d1 }}</td>
                            <td class="px-6 py-4 text-red-600 font-bold">
                                {{ optional($pricing->currency)->symbol }}{{ $pricing->h12 }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="text-center text-gray-500 mb-20">
            <p>No writing pricing data available at the moment.</p>
        </div>
    @endif

    <!-- 📝 Editing Prices -->
    <h2 class="text-3xl font-bold text-center text-secondary mb-8">📝 Editing Prices</h2>
    @if ($editingPricings->count() > 0)
        <div class="overflow-x-auto mb-20">
            <table class="w-full md:w-3/4 mx-auto border-collapse shadow-lg rounded-xl overflow-hidden">
                <thead>
                    <tr class="bg-secondary text-white text-lg">
                        <th class="px-6 py-4">Words</th>
                        <th class="px-6 py-4">7 Days</th>
                        <th class="px-6 py-4">3 Days</th>
                        <th class="px-6 py-4">2 Days</th>
                        <th class="px-6 py-4">1 Day</th>
                        <th class="px-6 py-4">12 Hours</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($editingPricings as $pricing)
                        <tr class="{{ $loop->even ? 'bg-gray-50' : 'bg-white' }} hover:bg-gray-100 transition">
                            <td class="px-6 py-4 font-semibold">{{ $pricing->words }}</td>
                            <td class="px-6 py-4">{{ optional($pricing->currency)->symbol }}{{ $pricing->d7 }}</td>
                            <td class="px-6 py-4">{{ optional($pricing->currency)->symbol }}{{ $pricing->d3 }}</td>
                            <td class="px-6 py-4">{{ optional($pricing->currency)->symbol }}{{ $pricing->d2 }}</td>
                            <td class="px-6 py-4">{{ optional($pricing->currency)->symbol }}{{ $pricing->d1 }}</td>
                            <td class="px-6 py-4 text-red-600 font-bold">
                                {{ optional($pricing->currency)->symbol }}{{ $pricing->h12 }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="text-center text-gray-500 mb-20">
            <p>No editing pricing data available at the moment.</p>
        </div>
    @endif
</div>
