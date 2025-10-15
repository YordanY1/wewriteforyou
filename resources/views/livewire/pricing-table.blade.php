<section id="pricing" class="py-20 bg-light">
    <div class="container mx-auto px-6 text-center">
        <h2 class="text-4xl font-extrabold text-primary mb-6">
            Writing Plans (by Word Count)
        </h2>

        <p class="text-gray-700 mb-10 max-w-2xl mx-auto leading-relaxed">
            Affordable and transparent pricing for writing, proofreading, and structure improvement.
            Choose a plan that fits your schedule.
        </p>

        <div class="overflow-x-auto">
            <table class="w-full md:w-2/3 mx-auto border-collapse shadow-lg rounded-lg overflow-hidden">
                <thead>
                    <tr class="bg-primary text-white text-lg">
                        <th class="px-6 py-4">Words</th>
                        <th class="px-6 py-4">
                            Standard Plan<br>
                            <span class="text-sm font-normal">(5–7 Days)</span>
                        </th>
                        <th class="px-6 py-4">
                            Express Plan<br>
                            <span class="text-sm font-normal">(24 Hours)</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pricings as $index => $pricing)
                        <tr class="{{ $index % 2 === 0 ? 'bg-white' : 'bg-gray-50' }} hover:bg-gray-100 transition">
                            <td class="px-6 py-4 font-semibold">{{ number_format($pricing->words) }}</td>
                            <td class="px-6 py-4">£{{ $pricing->d7 }}</td>
                            <td class="px-6 py-4 text-red-600 font-bold">£{{ $pricing->h12 }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <p class="text-gray-600 mt-8 md:w-2/3 mx-auto">
            More word counts and turnaround options are available on our detailed pricing page.
        </p>

        <a href="{{ route('pricing') }}" wire:navigate
            class="mt-8 inline-block bg-gold text-black px-8 py-4 rounded-lg font-bold shadow-lg hover:bg-secondary hover:text-white transition cursor-pointer">
            View Full Pricing
        </a>
    </div>
</section>
