<div class="max-w-5xl mx-auto py-12 space-y-8">
    <!-- Welcome header -->
    <div>
        <h1 class="text-3xl font-bold mb-2">Welcome back, {{ $user->name }} 🎉</h1>
        <p class="text-gray-600">
            Here you can track your orders, check their status, and communicate with us directly.
        </p>
    </div>

    <livewire:orders.my-orders />

    {{-- <livewire:orders.order-chat /> --}}

    <!-- Logout -->
    <div class="text-right">
        <button wire:click="$dispatch('logout')" class="bg-red-600 text-white px-4 py-2 rounded shadow hover:bg-red-700 cursor-pointer">
            Logout
        </button>
    </div>
</div>
