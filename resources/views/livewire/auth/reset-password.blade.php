<div class="max-w-md mx-auto bg-white shadow-lg rounded-2xl p-8 space-y-6">
    <div class="text-center">
        <h2 class="text-3xl font-extrabold text-primary">Reset Your Password 🔑</h2>
        <p class="mt-2 text-gray-600">Enter your new password below and regain access to your account</p>
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

    <!-- Форма -->
    <form wire:submit.prevent="resetPassword" class="space-y-4">
        <!-- Email (read-only) -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
            <input type="email" wire:model="email" readonly
                class="w-full bg-gray-100 border-gray-300 rounded-lg shadow-sm p-3 text-gray-500 cursor-not-allowed">
        </div>

        <!-- New Password -->
        <div>
            <label for="password" class="block text-sm font-medium text-gray-700 mb-1">New Password</label>
            <input type="password" id="password" wire:model="password"
                class="w-full border-gray-300 focus:border-primary focus:ring focus:ring-primary/30 rounded-lg shadow-sm p-3"
                placeholder="Enter new password">
            @error('password')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Confirm Password -->
        <div>
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirm
                Password</label>
            <input type="password" id="password_confirmation" wire:model="password_confirmation"
                class="w-full border-gray-300 focus:border-primary focus:ring focus:ring-primary/30 rounded-lg shadow-sm p-3"
                placeholder="Repeat new password">
        </div>

        <!-- Submit -->
        <button type="submit"
            class="w-full bg-primary text-white font-bold py-3 rounded-lg shadow hover:bg-secondary hover:shadow-lg transition">
            Reset Password
        </button>
    </form>

    <!-- Back to login -->
    <p class="text-center text-sm text-gray-600">
        Remembered your password?
        <a wire:navigate href="{{ route('login') }}" class="text-primary font-semibold hover:underline">Login here</a>
    </p>
</div>
