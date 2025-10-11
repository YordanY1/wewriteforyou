<footer class="bg-dark text-light text-center py-10 mt-16 border-t border-gray-700">
    <div class="container mx-auto px-6 space-y-4">
        <!-- Brand -->
        <div>
            <p class="text-lg font-semibold">&copy; {{ date('Y') }} BullWrite</p>
            <p class="mt-1 text-sm text-gray-400">
                Trusted UK-based platform for <strong>academic editing</strong>, <strong>proofreading</strong>,
                and <strong>writing feedback</strong>.
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
            <!-- LinkedIn -->
            <a href="https://www.linkedin.com/company/bullwrite" target="_blank" rel="noopener noreferrer"
                aria-label="LinkedIn" class="hover:text-gold transition-colors">
                <i class="fa-brands fa-linkedin"></i>
            </a>

            <!-- Facebook -->
            <a href="https://www.facebook.com/bullwrite" target="_blank" rel="noopener noreferrer" aria-label="Facebook"
                class="hover:text-gold transition-colors">
                <i class="fa-brands fa-facebook"></i>
            </a>

            <!-- X (Twitter) -->
            <a href="https://x.com/bullwrite" target="_blank" rel="noopener noreferrer" aria-label="Twitter / X"
                class="hover:text-gold transition-colors">
                <i class="fa-brands fa-x-twitter"></i>
            </a>

            <!-- Instagram -->
            <a href="https://www.instagram.com/bullwrite" target="_blank" rel="noopener noreferrer"
                aria-label="Instagram" class="hover:text-gold transition-colors">
                <i class="fa-brands fa-instagram"></i>
            </a>

            <!-- Email -->
            <a href="mailto:support@bullwrite.com" aria-label="Email" class="hover:text-gold transition-colors">
                <i class="fa-solid fa-envelope"></i>
            </a>
        </div>


        <!-- Legal -->
        <p class="text-xs text-gray-500 mt-4">
            BullWrite® is a UK-registered educational editing brand. All materials are provided for
            <em>learning and reference purposes only</em>.
        </p>
    </div>
</footer>
