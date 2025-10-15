<div x-data="{ open: @entangle('open') }" x-cloak>
    <div x-show="open" class="fixed inset-0 flex items-center justify-center bg-black/60 z-50" x-transition.opacity>
        <div class="bg-white rounded-2xl shadow-xl p-8 max-w-md w-full text-center transform transition-all"
            x-show="open" x-transition.scale>

            <h2 class="text-2xl font-bold mb-4 text-primary">Create Your Free Account</h2>
            <p class="text-gray-600 mb-6">
                Live chat is available only for registered clients.<br>
                Create your free BullWrite account to access chat, track orders, and receive updates.
            </p>

            <div class="flex justify-center gap-4">
                <button wire:click="redirectToRegister"
                    class="bg-primary text-white px-6 py-2 rounded-lg hover:bg-secondary transition font-semibold">
                    Register Now
                </button>

                <button wire:click="close"
                    class="bg-gray-200 text-gray-700 px-6 py-2 rounded-lg hover:bg-gray-300 transition font-semibold">
                    Maybe Later
                </button>
            </div>
        </div>
    </div>
</div>
