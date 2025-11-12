<div id="contact-form" class="container mx-auto px-6 py-20">
    <!-- Hero -->
    <h1 class="text-5xl font-extrabold text-primary text-center mb-6">
        Contact BullWrite
    </h1>
    <p class="text-lg text-gray-600 text-center max-w-2xl mx-auto mb-12 leading-relaxed">
        Have a question about our services?
        We’re here to help — reach out anytime and our support team will respond promptly.
    </p>

    <!-- Info -->
    <div class="flex justify-center">
        <div class="grid md:grid-cols-2 gap-10 mb-16 text-center max-w-4xl w-full">

            <!-- Email Card -->
            <div
                class="bg-gradient-to-br from-white to-gray-50 p-8 rounded-2xl shadow-lg border border-gray-100 hover:shadow-2xl transition transform hover:-translate-y-1">
                <div class="text-5xl mb-4 text-primary">📧</div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Email Us</h3>
                <p class="text-gray-600 mb-3">We reply within an hour.</p>
                <a href="mailto:bullwritecontacts@gmail.com"
                    class="inline-block bg-primary text-white px-6 py-2 rounded-lg font-semibold hover:bg-secondary transition">
                    bullwritecontacts@gmail.com
                </a>
            </div>

            <!-- Live Chat Card -->
            <div class="bg-gradient-to-br from-white to-gray-50 p-8 rounded-2xl shadow-lg border border-gray-100 hover:shadow-2xl transition transform hover:-translate-y-1 cursor-pointer"
                @auth
onclick="window.location='{{ route('dashboard') }}'" @endauth>
                <div class="text-5xl mb-4 text-secondary">💬</div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Live Chat</h3>
                <p class="text-gray-600 mb-3">Talk directly with our support team.</p>

                @auth
                    <span
                        class="inline-block bg-green-100 text-green-800 px-6 py-2 rounded-lg font-semibold hover:bg-green-200 transition">
                        Open in Dashboard →
                    </span>
                @else
                    <button wire:click="$dispatch('openRegisterModal')"
                        class="inline-block bg-gold text-black px-6 py-2 rounded-lg font-semibold hover:bg-secondary hover:text-white transition cursor-pointer">
                        Join to Access
                    </button>
                @endauth
            </div>


        </div>
    </div>


    <!-- Contact Form -->
    <div class="max-w-2xl mx-auto bg-white p-8 rounded-xl shadow">
        @if (session()->has('success'))
            <div class="mb-4 text-green-600 font-semibold">{{ session('success') }}</div>
        @endif

        <form wire:submit.prevent="send" class="space-y-6">
            <input type="hidden" id="recaptcha_response" name="g-recaptcha-response">
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

            <div class="text-center">
                <div class="g-recaptcha inline-block" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}"
                    data-callback="onRecaptchaSuccess" data-error-callback="onRecaptchaError">
                </div>
            </div>


            <button type="submit"
                class="bg-gold text-black px-6 py-3 rounded-lg font-bold shadow hover:bg-secondary hover:text-white transition cursor-pointer">
                Send Message
            </button>
        </form>
    </div>

    <!-- Note -->
    <div class="text-center mt-8 text-gray-500 text-sm">
        Average response time: <strong>under 1 hour</strong>.
        All messages are handled securely and confidentially.
    </div>
</div>
