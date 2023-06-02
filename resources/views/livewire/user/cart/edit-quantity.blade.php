<input type="number" wire:change.lazy="updateQuantity()" min="1"
    class="rounded-none rounded-r-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0  text-sm border-gray-300 p-2.5  w-{{$width}}"
    wire:model.lazy="quantity">
