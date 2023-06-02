<span>


 @if (Carbon::now()->addHours(3)->format('H:i A') >= Carbon::parse($resturant->open_at)->format('H:i A') and Carbon::now()->addHours(3)->format('H:i A') <= Carbon::parse($resturant->close_at)->format('H:i A') )
     
    <div class="">
        <div class="flex">

            <input type="number" wire:model="quantity" id="website-admin" min="0"
                class="rounded-none rounded-r-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5 "
                placeholder="أدخل الكمية">

            <button wire:click="addToCart()" title="إضافة الى السلة"
                class="inline-flex items-center px-3 text-sm text-white bg-main rounded-l-md border border-r-0 border-main">
                <i class=" fas fa-shopping-cart text-white text-lg"></i>
            </button>
        </div>
        @error('quantity')
        <p class="text-sm text-red-500">{{ $message }}</p>
        @enderror
    </div>
    @else
    <small class="text-red-500">المطعم مغلق الآن</small>
 @endif

</span>