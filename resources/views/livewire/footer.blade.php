<footer class="bg-dark text-light text-center py-10 mt-16 border-t border-gray-700">
    <div class="container mx-auto px-6 space-y-4">
        <!-- Brand -->
        <div>
            <p class="text-lg font-semibold">&copy; {{ date('Y') }} BullWrite</p>
            <p class="mt-1 text-sm text-gray-400">
                Trusted platform supporting UK students with <strong>academic editing</strong>,
                <strong>proofreading</strong>, and <strong>writing feedback</strong>.
            </p>
        </div>

        <!-- Navigation -->
        <div class="flex flex-wrap justify-center gap-4 text-sm">
            <a wire:navigate href="{{ route('about') }}" class="hover:text-gold transition">About</a>
            <a wire:navigate href="{{ route('pricing') }}" class="hover:text-gold transition">Pricing</a>
            <a wire:navigate href="{{ route('reviews') }}" class="hover:text-gold transition">Reviews</a>
            <a wire:navigate href="{{ route('contact') }}" class="hover:text-gold transition">Contact</a>
            <a wire:navigate href="{{ route('terms') }}" class="hover:text-gold transition">Terms & Conditions</a>
            <a wire:navigate href="{{ route('privacy-policy') }}" class="hover:text-gold transition">Privacy Policy</a>
            <a wire:navigate href="{{ route('cookie.policy') }}" class="hover:text-gold transition">Cookie Policy</a>
        </div>

        <!-- Social Links -->
        <div class="flex justify-center space-x-5 mt-4 text-xl">
            <!-- Instagram -->
            <a href="https://www.instagram.com/bull.write/" target="_blank" rel="noopener noreferrer"
                aria-label="Instagram" class="hover:text-gold transition-colors">
                <i class="fa-brands fa-instagram"></i>
            </a>

            <!-- TikTok -->
            <a href="https://www.tiktok.com/@bullwrite" target="_blank" rel="noopener noreferrer" aria-label="TikTok"
                class="hover:text-gold transition-colors">
                <i class="fa-brands fa-tiktok"></i>
            </a>
        </div>

        <!-- Legal -->
        <p class="text-xs text-gray-500 mt-4">
            BullWrite® is a UK-registered educational editing brand. All materials are provided for
            <em>learning and reference purposes only</em>.
        </p>
    </div>
</footer>
