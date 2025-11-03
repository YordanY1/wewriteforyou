<header class="bg-white/80 shadow-sm sticky top-0 z-50" x-data="{ open: false }">

    <div class="max-w-screen-xl mx-auto px-6 py-4 flex justify-between items-center">
        <!-- Logo -->
        <a wire:navigate href="{{ route('home') }}"
            class="flex items-center gap-2 text-2xl font-extrabold tracking-tight text-primary hover:text-secondary transition">
            <img src="{{ asset('images/logo.jpg?v=2') }}" alt="BullWrite Logo" class="h-10 w-auto rounded-lg">
            <span class="font-serif font-bold text-2xl tracking-tight">Bull<span
                    class="text-secondary">Write</span></span>
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
                    class="absolute left-0 mt-2 w-56 bg-white border border-gray-200 rounded-lg shadow-lg text-left z-40"
                    @click.outside="open = false">
                    <a wire:navigate href="{{ route('about') }}"
                        class="flex items-center gap-2 px-4 py-2 hover:bg-gray-50 transition">
                        <i class="fa-solid fa-circle-info text-gray-400 text-xs"></i> About Us
                    </a>
                    <a wire:navigate href="{{ route('rights') }}"
                        class="flex items-center gap-2 px-4 py-2 hover:bg-gray-50 transition">
                        <i class="fa-solid fa-scale-balanced text-gray-400 text-xs"></i> Client Rights
                    </a>
                </div>
            </div>
        </nav>

        <!-- Desktop CTA + Auth -->
        <div class="hidden md:flex items-center space-x-4">
            @guest
                <a wire:navigate href="{{ route('login') }}" class="text-gray-700 hover:text-primary transition">Login</a>
                <a wire:navigate href="{{ route('register') }}"
                    class="text-gray-700 hover:text-primary transition">Register</a>

                <!-- Google Login -->
                <a href="{{ route('google.redirect') }}"
                    class="flex items-center gap-2 border border-black/10 bg-white px-5 py-2 rounded-lg shadow-sm
                          hover:text-primary transition-colors duration-200 ease-in-out">
                    <i class="fa-brands fa-google text-[#DB4437] text-lg transition-colors duration-200 ease-in-out"></i>
                    <span class="text-sm font-medium text-gray-800">Continue with Google</span>
                </a>
            @endguest

            @auth
                <a wire:navigate href="{{ route('dashboard') }}"
                    class="text-gray-700 hover:text-primary transition">Dashboard</a>
                @livewire('auth.logout')
            @endauth

            <button wire:click="$dispatch('openOrderForm')"
                class="bg-gradient-to-r from-gold to-yellow-400 text-black px-5 py-2 rounded-lg font-bold shadow-sm
                           hover:opacity-90 transition cursor-pointer">
                Order Now
            </button>
        </div>

        <!-- Mobile Burger / X Button -->
        <button @click="open = !open" aria-label="Toggle menu"
            class="md:hidden text-3xl font-bold text-gray-700 focus:outline-none transition relative z-[60]">
            <span x-show="!open" class="block select-none">☰</span>
            <span x-show="open" class="block select-none">✕</span>
        </button>
    </div>

    <!-- Mobile Nav -->
    <nav x-show="open" x-transition class="md:hidden bg-white border-t border-gray-200 shadow-lg relative z-50">
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
                        class="flex items-center gap-2 px-2 py-1 hover:bg-gray-100 rounded">
                        <i class="fa-solid fa-circle-info text-gray-400 text-xs"></i> About Us
                    </a>
                    <a wire:navigate href="{{ route('rights') }}"
                        class="flex items-center gap-2 px-2 py-1 hover:bg-gray-100 rounded">
                        <i class="fa-solid fa-scale-balanced text-gray-400 text-xs"></i> Client Rights
                    </a>
                </div>
            </div>

            <a wire:navigate href="{{ route('contact') }}" class="block hover:text-primary transition">Contact</a>

            @guest
                <a wire:navigate href="{{ route('login') }}" class="block hover:text-primary transition">Login</a>
                <a wire:navigate href="{{ route('register') }}" class="block hover:text-primary transition">Register</a>

                <!-- Google Login -->
                <a href="{{ route('google.redirect') }}"
                    class="flex items-center justify-center gap-2 border border-black/10 bg-white px-5 py-2 rounded-lg shadow-sm
                          hover:text-primary transition-colors duration-200 ease-in-out">
                    <i class="fa-brands fa-google text-[#DB4437] text-lg"></i>
                    <span class="text-sm font-medium text-gray-800">Continue with Google</span>
                </a>
            @endguest

            @auth
                <a wire:navigate href="{{ route('dashboard') }}" class="block hover:text-primary transition">Dashboard</a>
                @livewire('auth.logout')
            @endauth

            <button wire:click="$dispatch('openOrderForm')"
                class="block bg-gradient-to-r from-gold to-yellow-400 text-black px-4 py-2 rounded-lg font-bold shadow-sm
                           hover:opacity-90 transition text-center cursor-pointer">
                Order Now
            </button>
        </div>
    </nav>

    <!-- Mobile Overlay (click to close) -->
    <div x-show="open" x-transition.opacity @click="open = false"
        class="fixed inset-0 bg-black/30 backdrop-blur-sm md:hidden z-40"></div>
</header>
