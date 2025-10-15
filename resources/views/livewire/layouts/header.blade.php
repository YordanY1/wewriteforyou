<header class="bg-white shadow-md sticky top-0 z-50" x-data="{ open: false }">
    <div class="container mx-auto px-6 py-4 flex justify-between items-center">
        <!-- Logo -->
        <a wire:navigate href="{{ route('home') }}"
            class="flex items-center gap-2 text-2xl font-extrabold tracking-tight text-primary hover:text-secondary transition">
            <img src="{{ asset('images/logo.jpg') }}" alt="BullWrite Logo" class="h-15 w-auto">
            <span>Bull<span class="text-secondary">Write</span></span>
        </a>


        <!-- Desktop Nav -->
        <nav class="hidden md:flex space-x-8 text-gray-700 font-medium">
            <a wire:navigate href="{{ route('how-it-works') }}" class="hover:text-primary transition">How it Works</a>
            <a wire:navigate href="{{ route('pricing') }}" class="hover:text-primary transition">Pricing</a>
            <a wire:navigate href="{{ route('reviews') }}" class="hover:text-primary transition">Reviews</a>
            <a wire:navigate href="{{ route('contact') }}" class="hover:text-primary transition">Contact</a>
            <!-- Dropdown for desktop -->
            <div class="relative" x-data="{ open: false }">
                <button @click="open = !open" class="hover:text-primary transition flex items-center gap-1"
                    aria-haspopup="true" :aria-expanded="open.toString()">
                    Resources <i class="fa-solid fa-chevron-down text-xs mt-1"></i>
                </button>

                <div x-show="open" x-transition.opacity.scale.95
                    class="absolute left-0 mt-2 w-48 bg-white border border-gray-200 rounded-lg shadow-lg text-left z-40"
                    @click.outside="open = false">
                    <a wire:navigate href="{{ route('about') }}"
                        class="block px-4 py-2 hover:bg-gray-50 transition">About Us</a>
                    <a wire:navigate href="{{ route('rights') }}"
                        class="block px-4 py-2 hover:bg-gray-50 transition">Client Rights</a>
                </div>
            </div>

        </nav>

        <!-- Desktop CTA + Auth -->
        <div class="hidden md:flex items-center space-x-4">
            @guest
                <a wire:navigate href="{{ route('login') }}" class="text-gray-700 hover:text-primary transition">Login</a>
                <a wire:navigate href="{{ route('register') }}"
                    class="text-gray-700 hover:text-primary transition">Register</a>
            @endguest

            @auth
                <a wire:navigate href="{{ route('dashboard') }}"
                    class="text-gray-700 hover:text-primary transition">Dashboard</a>
                @livewire('auth.logout')
            @endauth

            <button wire:click="$dispatch('openOrderForm')"
                class="bg-gold text-black px-5 py-2 rounded-lg font-bold shadow hover:bg-secondary hover:text-white transition cursor-pointer">
                Order Now
            </button>
        </div>

        <!-- Mobile Burger -->
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
    <nav x-show="open" x-transition class="md:hidden bg-white border-t border-gray-200 shadow-lg">
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
                @livewire('auth.logout')
            @endauth

            <button wire:click="$dispatch('openOrderForm')"
                class="block bg-gold text-black px-4 py-2 rounded-lg font-bold shadow hover:bg-secondary hover:text-white transition text-center cursor-pointer">
                Order Now
            </button>
        </div>
    </nav>
</header>
