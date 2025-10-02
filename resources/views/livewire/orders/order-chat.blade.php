<div class="bg-white shadow rounded-lg p-6 space-y-4">
    <h2 class="text-lg font-semibold mb-2">💬 Chat with us about this order</h2>

    <!-- Messages -->
    <div class="space-y-3 max-h-80 overflow-y-auto border p-3 rounded-lg bg-gray-50">
        @forelse($messages as $msg)
            <div class="flex {{ $msg->sender_type === 'client' ? 'justify-end' : 'justify-start' }}">
                <div
                    class="max-w-xs px-3 py-2 rounded-lg text-sm
                    {{ $msg->sender_type === 'client'
                        ? 'bg-primary text-white rounded-br-none'
                        : 'bg-gray-200 text-gray-800 rounded-bl-none' }}">

                    <!-- Message text -->
                    <p>{{ $msg->message }}</p>

                    <!-- Timestamp -->
                    <span class="block text-xs opacity-75 mt-1">
                        {{ $msg->created_at->format('H:i d/m') }}
                    </span>
                    <!-- Read receipt for client messages -->
                    @if ($msg->sender_type === 'client')
                        <span class="block text-xs mt-1 {{ $msg->is_read ? 'text-green-300' : 'text-gray-300' }}">
                            {{ $msg->is_read ? '✓ Read' : '✓ Sent' }}
                        </span>
                    @endif
                </div>
            </div>
        @empty
            <p class="text-gray-500 text-sm">No messages yet.</p>
        @endforelse
    </div>

    <!-- Send message -->
    <form wire:submit.prevent="sendMessage" class="flex gap-2">
        <input type="text" wire:model="message" placeholder="Type your message..."
            class="flex-1 border-gray-300 focus:border-primary focus:ring focus:ring-primary/30 rounded-lg p-3">
        <button type="submit" class="bg-primary text-white px-4 py-2 rounded-lg shadow hover:bg-secondary transition">
            Send
        </button>
    </form>
</div>
