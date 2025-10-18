<section id="pricing" class="py-20 bg-light">
    <div class="container mx-auto px-6 text-center">
        <h2 class="text-4xl font-extrabold text-primary mb-4">
            Transparent Pricing for Every Student
        </h2>

        <p class="text-gray-700 mb-10 max-w-2xl mx-auto leading-relaxed">
            Whether you're refining your writing or developing new academic work,
            our transparent pricing ensures you always know what to expect.
            Choose between professional writing or editing plans designed to fit your schedule.
        </p>

        <div x-data="{ tab: 'writing' }" class="max-w-3xl mx-auto">
            <!-- Tabs -->
            <div class="flex justify-center gap-4 mb-10">
                <button @click="tab = 'writing'"
                    :class="tab === 'writing' ? 'bg-primary text-white shadow-lg' : 'bg-gray-200 text-gray-800'"
                    class="px-6 py-2 rounded-lg font-bold cursor-pointer transition">
                    ✍️ Writing Plans
                </button>
                <button @click="tab = 'editing'"
                    :class="tab === 'editing' ? 'bg-secondary text-white shadow-lg' : 'bg-gray-200 text-gray-800'"
                    class="px-6 py-2 rounded-lg font-bold cursor-pointer transition">
                    📝 Editing Plans
                </button>
            </div>

            <!-- ✍️ Writing Table -->
            <div x-show="tab === 'writing'">
                <table class="w-full border-collapse shadow-lg rounded-xl overflow-hidden">
                    <thead>
                        <tr class="bg-primary text-white text-lg">
                            <th class="px-6 py-4">Words</th>
                            <th class="px-6 py-4">
                                Standard<br><span class="text-sm font-normal">(5–7 Days)</span>
                            </th>
                            <th class="px-6 py-4">
                                Express<br><span class="text-sm font-normal">(24 Hours)</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($writingPricings as $index => $pricing)
                            <tr class="{{ $index % 2 === 0 ? 'bg-white' : 'bg-gray-50' }} hover:bg-gray-100 transition">
                                <td class="px-6 py-4 font-semibold">{{ number_format($pricing->words) }}</td>
                                <td class="px-6 py-4">£{{ $pricing->d7 }}</td>
                                <td class="px-6 py-4 text-red-600 font-bold">£{{ $pricing->h12 }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- 📝 Editing Table -->
            <div x-show="tab === 'editing'">
                <table class="w-full border-collapse shadow-lg rounded-xl overflow-hidden">
                    <thead>
                        <tr class="bg-secondary text-white text-lg">
                            <th class="px-6 py-4">Words</th>
                            <th class="px-6 py-4">
                                Standard<br><span class="text-sm font-normal">(5–7 Days)</span>
                            </th>
                            <th class="px-6 py-4">
                                Express<br><span class="text-sm font-normal">(24 Hours)</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($editingPricings as $index => $pricing)
                            <tr class="{{ $index % 2 === 0 ? 'bg-white' : 'bg-gray-50' }} hover:bg-gray-100 transition">
                                <td class="px-6 py-4 font-semibold">{{ number_format($pricing->words) }}</td>
                                <td class="px-6 py-4">£{{ $pricing->d7 }}</td>
                                <td class="px-6 py-4 text-red-600 font-bold">£{{ $pricing->h12 }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Trust / CTA Section -->
        <div class="mt-12 max-w-2xl mx-auto text-gray-600 leading-relaxed">
            <p>
                All plans include full quality assurance, formatting, and optional feedback from our academic review
                team.
                No subscriptions, no hidden costs — just clear, deadline-based pricing for every project.
            </p>
        </div>

        <a href="{{ route('pricing') }}" wire:navigate
            class="mt-10 inline-block bg-gold text-black px-8 py-4 rounded-lg font-bold shadow-lg hover:bg-secondary hover:text-white transition cursor-pointer">
            View Full Pricing
        </a>
    </div>
</section>
