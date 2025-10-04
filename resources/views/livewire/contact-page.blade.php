<div class="container mx-auto px-6 py-20">
    <!-- Hero -->
    <h1 class="text-5xl font-extrabold text-primary text-center mb-6">Get in Touch</h1>
    <p class="text-lg text-gray-600 text-center max-w-2xl mx-auto mb-12">
        Have questions, feedback, or need help with an order?
        Reach out and we’ll respond as soon as possible.
    </p>

    <!-- Info -->
    <div class="grid md:grid-cols-3 gap-10 mb-16 text-center">
        <div class="bg-white p-6 rounded-lg shadow hover:shadow-md transition">
            <div class="text-3xl mb-3">📧</div>
            <p class="font-bold">Email</p>
            <a href="mailto:support@wewriteforyou.com" class="text-primary hover:underline"
                aria-label="Email support@wewriteforyou.com">
                support@wewriteforyou.com
            </a>
        </div>
        <div class="bg-white p-6 rounded-lg shadow hover:shadow-md transition">
            <div class="text-3xl mb-3">📱</div>
            <p class="font-bold">Phone</p>
            <p class="text-gray-600">+44 123 456 789</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow hover:shadow-md transition">
            <div class="text-3xl mb-3">💬</div>
            <p class="font-bold">Live Chat</p>

            @auth
                <p class="text-gray-600">Coming soon in your profile area</p>
            @else
                <p class="text-gray-600">Available for registered users only</p>
            @endauth
        </div>

    </div>

    <!-- Contact Form -->
    <div class="max-w-2xl mx-auto bg-white p-8 rounded-xl shadow">
        @if (session()->has('success'))
            <div class="mb-4 text-green-600 font-semibold">{{ session('success') }}</div>
        @endif

        <form wire:submit.prevent="send" class="space-y-6">
            <div>
                <label for="name" class="block text-left font-medium">Name</label>
                <input type="text" id="name" wire:model="name"
                    class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-primary focus:border-primary px-4 py-2" />
                @error('name')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="email" class="block text-left font-medium">Email</label>
                <input type="email" id="email" wire:model="email"
                    class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-primary focus:border-primary px-4 py-2" />
                @error('email')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="message" class="block text-left font-medium">Message</label>
                <textarea id="message" rows="5" wire:model="message"
                    class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-primary focus:border-primary px-4 py-2"></textarea>
                @error('message')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit"
                class="bg-gold text-black px-6 py-3 rounded-lg font-bold shadow hover:bg-secondary hover:text-white transition cursor-pointer">
                Send Message
            </button>
        </form>
    </div>
</div>
