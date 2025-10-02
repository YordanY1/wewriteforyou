<div class="bg-white shadow rounded-lg p-6">
    <h2 class="text-xl font-semibold mb-4">📦 My Orders</h2>

    @if ($orders->count())
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50 text-gray-700 text-sm">
                    <th class="p-3 border-b">Topic</th>
                    <th class="p-3 border-b">Status</th>
                    <th class="p-3 border-b">Created</th>
                    <th class="p-3 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="p-3 font-medium">{{ $order->topic ?? 'Untitled' }}</td>
                        <td class="p-3">
                            <span
                                class="px-2 py-1 rounded-full text-xs font-semibold
                                @if ($order->status === 'completed') bg-green-100 text-green-700
                                @elseif($order->status === 'in_progress') bg-yellow-100 text-yellow-700
                                @elseif($order->status === 'awaiting_payment') bg-blue-100 text-blue-700
                                @elseif($order->status === 'revision_requested') bg-orange-100 text-orange-700
                                @else bg-gray-100 text-gray-700 @endif">
                                {{ ucfirst(str_replace('_', ' ', $order->status)) }}
                            </span>
                        </td>
                        <td class="p-3 text-sm text-gray-600">{{ $order->created_at->format('d M Y') }}</td>
                        <td class="p-3">
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
