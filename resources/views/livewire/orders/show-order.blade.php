<div class="max-w-4xl mx-auto bg-white shadow rounded-lg p-6 space-y-6">
    <h1 class="text-2xl font-bold mb-4">Order #{{ $order->reference_code }}</h1>

    <div class="space-y-2">
        <p><strong>Topic:</strong> {{ $order->topic }}</p>
        <p><strong>Status:</strong>
            <span
                class="px-2 py-1 rounded-full text-xs font-semibold
                @if ($order->status === 'completed') bg-green-100 text-green-700
                @elseif($order->status === 'in_progress') bg-yellow-100 text-yellow-700
                @else bg-gray-100 text-gray-700 @endif">
                {{ ucfirst(str_replace('_', ' ', $order->status)) }}
            </span>
        </p>
        <p><strong>Deadline:</strong> {{ $order->deadline_option }}</p>
        <p><strong>Instructions:</strong> {{ $order->instructions }}</p>
    </div>

    <div class="flex justify-end">
        <a wire:navigate href="{{ route('dashboard') }}" class="text-sm text-primary hover:underline">← Back to Dashboard</a>
    </div>

    <livewire:orders.order-chat :order="$order" />
</div>
