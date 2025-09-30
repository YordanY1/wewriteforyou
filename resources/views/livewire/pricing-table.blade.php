<section id="pricing" class="py-20 bg-light">
    <div class="container mx-auto px-6 text-center">
        <h2 class="text-4xl font-extrabold text-primary mb-12">Pricing (per words/pages)</h2>

        <div class="overflow-x-auto">
            <table class="w-full md:w-2/3 mx-auto border-collapse shadow-lg rounded-lg overflow-hidden">
                <thead>
                    <tr class="bg-primary text-white text-lg">
                        <th class="px-6 py-4">Words</th>
                        <th class="px-6 py-4">Standard</th>
                        <th class="px-6 py-4">Urgent</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white hover:bg-gray-50 transition">
                        <td class="px-6 py-4 font-semibold">500</td>
                        <td class="px-6 py-4">£20</td>
                        <td class="px-6 py-4 text-red-600 font-medium">£30</td>
                    </tr>
                    <tr class="bg-gray-50 hover:bg-gray-100 transition">
                        <td class="px-6 py-4 font-semibold">1000</td>
                        <td class="px-6 py-4">£35</td>
                        <td class="px-6 py-4 text-red-600 font-medium">£50</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <a href="{{ route('pricing') }}" wire:navigate
            class="mt-10 inline-block bg-gold text-black px-8 py-4 rounded-lg font-bold shadow-lg hover:bg-secondary hover:text-white transition cursor-pointer">
            View Full Pricing
        </a>

    </div>
</section>
