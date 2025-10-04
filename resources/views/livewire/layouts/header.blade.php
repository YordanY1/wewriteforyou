<header class="bg-white shadow sticky top-0 z-50" x-data="{ open: false }">
    <div class="container mx-auto px-6 py-4 flex justify-between items-center">
        <!-- Logo -->
        <a wire:navigate href="{{ route('home') }}" class="text-2xl font-extrabold text-primary tracking-tight">
            WeWrite<span class="text-secondary">ForYou</span>
        </a>

        <!-- Desktop Nav -->
        <nav class="hidden md:flex space-x-8 text-gray-700 font-medium">
            <a wire:navigate href="{{ route('how-it-works') }}" class="hover:text-primary transition">How it Works</a>
            <a wire:navigate href="{{ route('pricing') }}" class="hover:text-primary transition">Pricing</a>
            <a wire:navigate href="{{ route('reviews') }}" class="hover:text-primary transition">Reviews</a>
            <a wire:navigate href="{{ route('contact') }}" class="hover:text-primary transition">Contact</a>
        </nav>

        <!-- Desktop CTA + Auth -->
        <div class="hidden md:flex items-center space-x-4">
            @guest
                <a wire:navigate href="{{ route('login') }}" class="text-gray-700 hover:text-primary">Login</a>
                <a wire:navigate href="{{ route('register') }}" class="text-gray-700 hover:text-primary">Register</a>
            @endguest

            @auth
                <a wire:navigate href="{{ route('dashboard') }}" class="text-gray-700 hover:text-primary">Dashboard</a>
                @livewire('auth.logout')
            @endauth

            <button wire:click="$dispatch('openOrderForm')"
                class="bg-gold text-black px-4 py-2 rounded-lg font-bold shadow hover:bg-secondary hover:text-white transition cursor-pointer">
                Order Now
            </button>
        </div>

        <!-- Burger Button (mobile) -->
        <button @click="open = !open" class="md:hidden text-gray-700 focus:outline-none">
            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path :class="{ 'hidden': open, 'block': !open }" class="block" stroke-linecap="round"
                    stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                <path :class="{ 'hidden': !open, 'block': open }" class="hidden" stroke-linecap="round"
                    stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    <!-- Mobile Nav -->
    <nav x-show="open" x-transition class="md:hidden bg-white border-t border-gray-200 shadow">
        <div class="px-6 py-4 space-y-4 text-gray-700 font-medium">
            <a wire:navigate href="{{ route('how-it-works') }}" class="block hover:text-primary transition">How it
                Works</a>
            <a wire:navigate href="{{ route('pricing') }}" class="block hover:text-primary transition">Pricing</a>
            <a wire:navigate href="{{ route('reviews') }}" class="block hover:text-primary transition">Reviews</a>

            <!-- Dropdown in mobile -->
            <div x-data="{ drop: false }">
                <button @click="drop = !drop" class="flex justify-between w-full hover:text-primary transition">
                    Resources ▾
                </button>
                <div x-show="drop" x-transition class="ml-4 mt-2 space-y-2">
                    <a wire:navigate href="{{ route('about') }}"
                        class="block px-2 py-1 hover:bg-gray-100 rounded">About Us</a>
                    <a wire:navigate href="{{ route('rights') }}"
                        class="block px-2 py-1 hover:bg-gray-100 rounded">Client Rights</a>
                </div>
            </div>

            <a wire:navigate href="{{ route('contact') }}" class="block hover:text-primary transition">Contact</a>

            @guest
                <a wire:navigate href="{{ route('login') }}" class="block hover:text-primary transition">Login</a>
                <a wire:navigate href="{{ route('register') }}" class="block hover:text-primary transition">Register</a>
            @endguest

            @auth
                <a wire:navigate href="{{ route('dashboard') }}" class="block hover:text-primary transition">Dashboard</a>
                <form wire:submit.prevent="logout">
                    <button type="submit" class="w-full text-left px-4 py-2 text-red-600 hover:bg-gray-100 rounded">
                        Logout
                    </button>
                </form>
            @endauth

            <!-- CTA Mobile -->
            <button wire:click="$dispatch('openOrderForm')"
                class="block bg-gold text-black px-4 py-2 rounded-lg font-bold shadow hover:bg-secondary hover:text-white transition text-center cursor-pointer">
                Order Now
            </button>
        </div>
    </nav>
</header>
