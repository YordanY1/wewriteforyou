<div class="bg-white shadow rounded-lg p-6">
    <h2 class="text-xl font-semibold mb-4">📦 My Orders</h2>

    @if ($orders->count())
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50 text-gray-700 text-sm">
                    <th class="p-3 border-b">Topic</th>
                    <th class="p-3 border-b">Order Status</th>
                    <th class="p-3 border-b">Payment Status</th>
                    <th class="p-3 border-b">Created</th>
                    <th class="p-3 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr class="border-b hover:bg-gray-50">
                        {{-- Topic --}}
                        <td class="p-3 font-medium">{{ $order->topic ?? 'Untitled' }}</td>

                        {{-- Order Status --}}
                        <td class="p-3">
                            <span
                                class="px-2 py-1 rounded-full text-xs font-semibold
                                @if ($order->order_status === 'completed') bg-green-100 text-green-700
                                @elseif($order->order_status === 'in_progress') bg-yellow-100 text-yellow-700
                                @elseif($order->order_status === 'revision_requested') bg-orange-100 text-orange-700
                                @elseif($order->order_status === 'cancelled') bg-gray-200 text-gray-700
                                @else bg-gray-100 text-gray-700 @endif">
                                {{ ucfirst(str_replace('_', ' ', $order->order_status)) }}
                            </span>
                        </td>

                        {{-- Payment Status --}}
                        <td class="p-3">
                            <span
                                class="px-2 py-1 rounded-full text-xs font-semibold
                                @if ($order->payment_status === 'paid') bg-green-100 text-green-700
                                @elseif($order->payment_status === 'awaiting') bg-blue-100 text-blue-700
                                @elseif($order->payment_status === 'refunded') bg-purple-100 text-purple-700
                                @else bg-red-100 text-red-700 @endif">
                                {{ ucfirst($order->payment_status) }}
                            </span>
                        </td>

                        {{-- Created At --}}
                        <td class="p-3 text-sm text-gray-600">
                            {{ $order->created_at->format('d M Y') }}
                        </td>

                        {{-- Actions --}}
                        <td class="p-3 flex items-center gap-3">
                            {{-- View Order --}}
                            <a wire:navigate href="{{ route('orders.show', $order) }}"
                               class="text-primary hover:underline">View</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="text-gray-500">You don’t have any orders yet.</p>
    @endif
</div>
