<section id="resources" class="py-20 bg-gray-50">
    <div class="container mx-auto px-6 text-center">
        <h2 class="text-4xl font-extrabold text-primary mb-6">
            About BullWrite & Client Confidence
        </h2>

        <p class="max-w-2xl mx-auto text-gray-700 leading-relaxed mb-10">
            Learn more about BullWrite’s mission, our team of academic editors, and the ethical standards we follow.
            We believe in clarity, trust, and transparency — helping UK students improve their writing with confidence.
        </p>

        <div class="flex justify-center space-x-6">
            <a href="{{ route('about') }}" wire:navigate
                class="bg-gold text-black px-6 py-3 rounded-lg font-bold shadow hover:bg-secondary hover:text-white transition cursor-pointer">
                Meet Our Editors
            </a>
            <a href="{{ route('rights') }}" wire:navigate
                class="bg-primary text-white px-6 py-3 rounded-lg font-bold shadow hover:bg-dark transition cursor-pointer">
                Client Protection & Policies
            </a>
        </div>
    </div>
</section>
