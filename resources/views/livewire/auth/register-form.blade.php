<div class="max-w-md mx-auto bg-white shadow-lg rounded-2xl p-8 space-y-6">
    <div class="text-center">
        <h2 class="text-3xl font-extrabold text-primary">Create Your Account</h2>
        <p class="mt-2 text-gray-600">Join us and make your study life easier 📚</p>
    </div>

    <ul class="bg-gray-50 border border-gray-200 rounded-lg p-4 text-sm text-gray-700 space-y-2">
        <li class="flex items-center gap-2">
            ✅ Get notified about special promotions & discounts for academic work
        </li>
        <li class="flex items-center gap-2">
            ✅ Easily track the progress and status of your coursework orders
        </li>
        <li class="flex items-center gap-2">
            ✅ Communicate directly with our team regarding your assignments
        </li>
        <li class="flex items-center gap-2">
            ✅ Keep all your essays, reports, and projects organized in one place
        </li>
    </ul>

    <form wire:submit.prevent="register" class="space-y-4">
        <!-- Name -->
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
            <input type="text" id="name" wire:model="name"
                class="w-full border-gray-300 focus:border-primary focus:ring focus:ring-primary/30 rounded-lg shadow-sm p-3">
            @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Email -->
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
            <input type="email" id="email" wire:model="email"
                class="w-full border-gray-300 focus:border-primary focus:ring focus:ring-primary/30 rounded-lg shadow-sm p-3">
            @error('email')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Password -->
        <div>
            <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
            <input type="password" id="password" wire:model="password"
                class="w-full border-gray-300 focus:border-primary focus:ring focus:ring-primary/30 rounded-lg shadow-sm p-3">
            @error('password')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Confirm Password -->
        <div>
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirm
                Password</label>
            <input type="password" id="password_confirmation" wire:model="password_confirmation"
                class="w-full border-gray-300 focus:border-primary focus:ring focus:ring-primary/30 rounded-lg shadow-sm p-3">
        </div>

        <!-- Submit -->
        <button type="submit"
            class="w-full bg-primary text-white font-bold py-3 rounded-lg shadow hover:bg-secondary hover:shadow-lg transition cursor-pointer">
            Register Now
        </button>
    </form>

    <!-- Login Redirect -->
    <p class="text-center text-sm text-gray-600">
        Already have an account?
        <a wire:navigate href="{{ route('login') }}" class="text-primary font-semibold hover:underline">Login here</a>
    </p>
</div>
