<section id="resources" class="py-20 bg-gray-50">
    <div class="container mx-auto px-6 text-center">
        <h2 class="text-4xl font-extrabold text-primary mb-6">
            About Us & Client Rights
        </h2>
        <p class="max-w-2xl mx-auto text-gray-700 leading-relaxed mb-10">
            Discover who we are, our academic qualifications, and the guarantees we provide.
            Learn more about your rights as a client and how WeWriteForYou ensures trust, quality, and transparency
            for UK students.
        </p>

        <div class="flex justify-center space-x-6">
            <a href="{{ route('about') }}" wire:navigate
                class="bg-gold text-black px-6 py-3 rounded-lg font-bold shadow hover:bg-secondary hover:text-white transition cursor-pointer">
                Meet Our Team
            </a>
            <a href="{{ route('rights') }}" wire:navigate
                class="bg-primary text-white px-6 py-3 rounded-lg font-bold shadow hover:bg-dark transition cursor-pointer">
                Know Your Rights
            </a>
        </div>
    </div>
</section>
