<footer class="bg-dark text-light text-center py-10 mt-16">
    <div class="container mx-auto px-6">
        <p class="text-lg font-semibold">&copy; {{ date('Y') }} WeWriteForYou</p>
        <p class="mt-2 text-sm text-gray-400">Trusted academic writing services – UK & International</p>
        <div class="flex justify-center space-x-6 mt-4">
            <a wire:navigate href="{{ route('reviews') }}" class="hover:text-gold transition">Reviews</a>
            <a wire:navigate href="{{ route('contact') }}" class="hover:text-gold transition">Contact</a>
            <a wire:navigate href="{{ route('about') }}" class="hover:text-gold transition">About</a>
            <a wire:navigate href="{{ route('pricing') }}" class="hover:text-gold transition">Pricing</a>
            <a wire:navigate href="{{ route('terms') }}" class="hover:text-gold transition">Terms & Conditions</a>
            <a wire:navigate href="{{ route('privacy-policy') }}" class="hover:text-gold transition">Privacy Policy</a>
            <a wire:navigate href="{{ route('cookie.policy') }}" class="hover:text-gold transition">Cookie Policy</a>
        </div>
    </div>
</footer>
