<div class="max-w-md mx-auto bg-white shadow-lg rounded-2xl p-8 space-y-6">
    <div class="text-center">
        <h2 class="text-3xl font-extrabold text-primary">Welcome Back 👋</h2>
        <p class="mt-2 text-gray-600">Sign in to continue and manage your coursework orders</p>
    </div>

    <form wire:submit.prevent="login" class="space-y-4">
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

        <!-- Password -->
        <div>
            <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
            <input type="password" id="password" wire:model="password"
                class="w-full border-gray-300 focus:border-primary focus:ring focus:ring-primary/30 rounded-lg shadow-sm p-3"
                placeholder="********">
            @error('password')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Forgot Password -->
        <div class="flex justify-end">
            <a wire:navigate href="{{ route('password.request') }}" class="text-sm text-primary hover:underline">Forgot
                your password?</a>
        </div>

        <!-- Remember me -->
        <div class="flex items-center">
            <input id="remember" type="checkbox" wire:model="remember"
                class="h-4 w-4 text-primary border-gray-300 rounded focus:ring-primary">
            <label for="remember" class="ml-2 block text-sm text-gray-700">Remember me</label>
        </div>


        <!-- Submit -->
        <button type="submit"
            class="w-full bg-primary text-white font-bold py-3 rounded-lg shadow hover:bg-secondary hover:shadow-lg transition">
            Login
        </button>
    </form>

    <!-- Register Redirect -->
    <p class="text-center text-sm text-gray-600">
        Don’t have an account yet?
        <a wire:navigate href="{{ route('register') }}" class="text-primary font-semibold hover:underline">Register
            now</a>
    </p>
</div>
