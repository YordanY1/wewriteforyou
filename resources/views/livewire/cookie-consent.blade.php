<div x-data="{ visible: @entangle('show') }" x-show="visible" x-transition.duration.500ms
    class="fixed bottom-0 inset-x-0 bg-dark text-white p-4 shadow-lg z-50">

    <div class="container mx-auto flex flex-col md:flex-row items-center justify-between gap-4">
        <p class="text-sm">
            🍪 We use cookies to improve your experience. By continuing, you agree to our
            <a href="{{ route('cookie.policy') }}" class="underline hover:text-gold cursor-pointer">
                Cookie Policy
            </a>.
        </p>

        <div class="flex gap-2">
            <button wire:click="accept"
                class="bg-gold text-black font-semibold px-4 py-2 rounded-lg hover:bg-secondary hover:text-white transition">
                Accept
            </button>

            <button wire:click="reject"
                class="bg-gray-700 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition">
                Reject
            </button>
        </div>
    </div>
</div>
