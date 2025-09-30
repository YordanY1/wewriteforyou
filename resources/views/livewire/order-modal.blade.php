<div>
    @if ($open)
        <div class="fixed inset-0 flex items-center justify-center z-50" x-data
            x-on:order-created.window="$wire.call('close'); Swal.fire({
                icon: 'success',
                title: 'Order Created!',
                text: 'Your order has been placed successfully.',
                confirmButtonColor: '#3085d6',
             })">

            <!-- Overlay -->
            <div class="absolute inset-0 bg-black bg-opacity-50" wire:click="close"></div>

            <!-- Modal -->
            <div class="bg-white rounded-xl shadow-lg w-full max-w-2xl relative z-10 max-h-[90vh] overflow-y-auto">
                <!-- Header -->
                <div class="sticky top-0 bg-white border-b px-6 py-4 flex justify-between items-center z-20">
                    <h2 class="text-2xl font-bold text-primary">Place Your Order</h2>
                    <button class="text-gray-500 hover:text-gray-800 text-2xl leading-none"
                        wire:click="close">&times;</button>
                </div>

                <!-- Body -->
                <div class="p-6">
                    @livewire('order-form')
                </div>
            </div>
        </div>
    @endif
</div>
