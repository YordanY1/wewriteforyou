<div class="max-w-md mx-auto bg-white shadow-lg rounded-2xl p-8 space-y-6">
    <div class="text-center">
        <h2 class="text-3xl font-extrabold text-primary">Forgot your password? 🔑</h2>
        <p class="mt-2 text-gray-600">
            No worries! Enter your email and we’ll send you a reset link.
        </p>
    </div>

    <!-- Messages -->
    @if (session('message'))
        <div class="bg-green-100 text-green-700 px-4 py-2 rounded-lg text-sm">
            {{ session('message') }}
        </div>
    @endif

    @if (session('error'))
        <div class="bg-red-100 text-red-700 px-4 py-2 rounded-lg text-sm">
            {{ session('error') }}
        </div>
    @endif

    <form wire:submit.prevent="sendResetLink" class="space-y-4">
        <!-- Email -->
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
            <input type="email" id="email" wire:model="email"
                class="w-full border-gray-300 focus:border-primary focus:ring focus:ring-primary/30 rounded-lg shadow-sm p-3"
                placeholder="you@example.com">
            @error('email')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Submit -->
        <button type="submit"
            class="w-full bg-primary text-white font-bold py-3 rounded-lg shadow hover:bg-secondary hover:shadow-lg transition cursor-pointer">
            Send Reset Link
        </button>
    </form>

    <!-- Back to login -->
    <p class="text-center text-sm text-gray-600">
        Remembered your password?
        <a wire:navigate href="{{ route('login') }}" class="text-primary font-semibold hover:underline">Login here</a>
    </p>
</div>
