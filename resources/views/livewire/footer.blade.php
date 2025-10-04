<footer class="bg-dark text-light text-center py-10 mt-16">
    <div class="container mx-auto px-6">
        <p class="text-lg font-semibold">&copy; {{ date('Y') }} WeWriteForYou</p>
        <p class="mt-2 text-sm text-gray-400">Trusted academic writing services – UK & International</p>
        <div class="flex justify-center space-x-6 mt-4">
            <a wire:navigate href="{{ route('reviews') }}" class="hover:text-gold transition">Reviews</a>
            <a wire:navigate href="{{ route('contact') }}" class="hover:text-gold transition">Contact</a>
            <a wire:navigate href="{{ route('about') }}" class="hover:text-gold transition">About</a>
            <a wire:navigate href="{{ route('pricing') }}" class="hover:text-gold transition">Pricing</a>
        </div>
    </div>
</footer>
