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
                    <th class="px-6 py-4">24 Hours</th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-white hover:bg-gray-50 transition">
                    <td class="px-6 py-4 font-semibold">500</td>
                    <td class="px-6 py-4">£20</td>
                    <td class="px-6 py-4">£25</td>
                    <td class="px-6 py-4 text-red-600 font-bold">£30</td>
                </tr>
                <tr class="bg-gray-50 hover:bg-gray-100 transition">
                    <td class="px-6 py-4 font-semibold">1000</td>
                    <td class="px-6 py-4">£35</td>
                    <td class="px-6 py-4">£45</td>
                    <td class="px-6 py-4 text-red-600 font-bold">£50</td>
                </tr>
                <tr class="bg-white hover:bg-gray-50 transition">
                    <td class="px-6 py-4 font-semibold">2000</td>
                    <td class="px-6 py-4">£60</td>
                    <td class="px-6 py-4">£75</td>
                    <td class="px-6 py-4 text-red-600 font-bold">£95</td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Packages -->
    <div class="grid md:grid-cols-3 gap-10">
        <!-- Standard -->
        <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-2xl transition text-center">
            <h3 class="text-2xl font-bold mb-4 text-primary">Standard</h3>
            <p class="text-gray-600 mb-6">Best for students who plan ahead. Delivery in 5–7 days.</p>
            <p class="text-3xl font-extrabold mb-6">From £20</p>
            {{-- <a href="{{ route('order') }}"
                class="bg-gold text-black px-6 py-3 rounded-lg font-bold shadow hover:bg-secondary hover:text-white transition cursor-pointer">
                Choose Standard
            </a> --}}
        </div>

        <!-- Express -->
        <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-2xl transition text-center border-2 border-gold">
            <h3 class="text-2xl font-bold mb-4 text-secondary">Express</h3>
            <p class="text-gray-600 mb-6">Tighter deadline? We deliver in 2–3 days with priority service.</p>
            <p class="text-3xl font-extrabold mb-6">From £45</p>
            {{-- <a href="{{ route('order') }}"
                class="bg-secondary text-white px-6 py-3 rounded-lg font-bold shadow hover:bg-gold hover:text-black transition cursor-pointer">
                Choose Express
            </a> --}}
        </div>

        <!-- Urgent -->
        <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-2xl transition text-center">
            <h3 class="text-2xl font-bold mb-4 text-red-600">Urgent</h3>
            <p class="text-gray-600 mb-6">Need it within 24 hours? Our urgent service has you covered.</p>
            <p class="text-3xl font-extrabold mb-6">From £50</p>
            {{-- <a href="{{ route('order') }}"
                class="bg-red-600 text-white px-6 py-3 rounded-lg font-bold shadow hover:bg-dark transition cursor-pointer">
                Choose Urgent
            </a> --}}
        </div>
    </div>
</div>
