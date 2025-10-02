<div class="max-w-4xl mx-auto bg-white shadow rounded-lg p-6 space-y-6">
    <h1 class="text-2xl font-bold mb-4">Order #{{ $order->reference_code }}</h1>

    <div class="space-y-2">
        <p><strong>Topic:</strong> {{ $order->topic }}</p>

        <!-- Payment Status -->
        <p><strong>Payment Status:</strong>
            <span
                class="px-2 py-1 rounded-full text-xs font-semibold
                @if ($order->payment_status === 'paid') bg-green-100 text-green-700
                @elseif($order->payment_status === 'awaiting') bg-yellow-100 text-yellow-700
                @elseif($order->payment_status === 'unpaid') bg-red-100 text-red-700
                @elseif($order->payment_status === 'refunded') bg-gray-200 text-gray-700
                @else bg-gray-100 text-gray-700 @endif">
                {{ ucfirst($order->payment_status) }}
            </span>
        </p>

        <!-- Order Status -->
        <p><strong>Order Status:</strong>
            <span
                class="px-2 py-1 rounded-full text-xs font-semibold
                @if ($order->order_status === 'completed') bg-green-100 text-green-700
                @elseif($order->order_status === 'in_progress') bg-blue-100 text-blue-700
                @elseif($order->order_status === 'revision_requested') bg-orange-100 text-orange-700
                @elseif($order->order_status === 'draft') bg-gray-200 text-gray-700
                @elseif($order->order_status === 'cancelled') bg-red-200 text-red-700
                @else bg-gray-100 text-gray-700 @endif">
                {{ ucfirst(str_replace('_', ' ', $order->order_status)) }}
            </span>
        </p>

        <p><strong>Deadline:</strong> {{ $order->deadline_option }}</p>
        <p><strong>Instructions:</strong> {{ $order->instructions }}</p>
    </div>

    <!-- Final Delivery Section -->
    @php
        $finalFiles = $order->files->where('type', 'final_delivery');
    @endphp

    @if ($finalFiles->count())
        <div class="mt-6">
            <h2 class="text-lg font-semibold mb-2">📂 Final Delivery Files</h2>
            <ul class="space-y-2">
                @foreach ($finalFiles as $file)
                    <li>
                        <a href="{{ Storage::disk('public')->url($file->path) }}" target="_blank"
                            class="inline-flex items-center px-3 py-1 bg-green-100 text-green-700 text-sm font-medium rounded hover:bg-green-200">
                            ⬇ {{ $file->original_name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="flex justify-end">
        <a wire:navigate href="{{ route('dashboard') }}" class="text-sm text-primary hover:underline">← Back to
            Dashboard</a>
    </div>

    <livewire:orders.order-chat :order="$order" />
</div>
