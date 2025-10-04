<div class="bg-white p-6 rounded-xl shadow">
    @if (session()->has('message'))
        <div class="mb-4 text-green-600 font-semibold">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="submit">
        @guest
            <div class="mb-4">
                <label class="block font-semibold mb-2">Your Name</label>
                <input type="text" wire:model="author_name" class="border rounded w-full px-3 py-2">
                @error('author_name')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>
        @endguest

        <div class="mb-4">
            <label class="block font-semibold mb-2">Rating</label>
            <select wire:model="rating" class="border rounded w-full px-3 py-2">
                <option value="5">⭐⭐⭐⭐⭐ (5)</option>
                <option value="4">⭐⭐⭐⭐ (4)</option>
                <option value="3">⭐⭐⭐ (3)</option>
                <option value="2">⭐⭐ (2)</option>
                <option value="1">⭐ (1)</option>
            </select>
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-2">Your Review</label>
            <textarea wire:model="comment" rows="4" class="border rounded w-full px-3 py-2"></textarea>
        </div>

        <button type="submit"
            class="bg-primary text-white px-6 py-2 rounded-lg font-semibold hover:bg-secondary transition cursor-pointer">
            Submit Review
        </button>
    </form>
</div>
