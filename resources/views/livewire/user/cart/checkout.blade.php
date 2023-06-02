<div class="my-20">
    <div class="grid grid-cols-3 gap-20">
        <div class="col-span-2 bg-white rounde-md shadow-md py-10 px-8">
            <h3 class="text-xl font-bold tracking-tight text-gray-900 mb-7">بيانات صاحب الطلب</h3>

                <div class="relative z-0 mb-6 w-full group">
                    <input type="text" wire:model.defer="name"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  focus:outline-none focus:ring-0 focus:border-main peer"
                        placeholder=" " required />
                    <label for="floating_email"
                        class="absolute text-sm text-gray-500  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:right-0 peer-focus:text-main peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">الاسم</label>
                        @error('name')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <input type="text" wire:model.defer="mobile"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  focus:outline-none focus:ring-0 focus:border-main peer"
                        placeholder=" " required />
                    <label for="floating_email"
                        class="absolute text-sm text-gray-500  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:right-0 peer-focus:text-main peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">رقم
                        الهاتف</label>
                        @error('mobile')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <input type="text" wire:model.defer="address"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  focus:outline-none focus:ring-0 focus:border-main peer"
                        placeholder=" " required />
                    <label for="floating_email"
                        class="absolute text-sm text-gray-500  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:right-0 peer-focus:text-main peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">العنوان</label>
                        @error('address')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <textarea type="text" wire:model.defer="notes"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  focus:outline-none focus:ring-0 focus:border-main peer"
                        placeholder=" " required></textarea>
                    <label for="floating_email"
                        class="absolute text-sm text-gray-500  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:right-0 peer-focus:text-main peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">ملاحظات</label>
                        @error('notes')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                </div>

                <h3 class="text-xl font-bold tracking-tight text-gray-900 mt-10 mb-14">طريقة الدفع</h3>
                <div class="flex">
                    <div class="ml-7">
                        <input type="radio" id="type_delivery" wire:model="type" value="delivery"
                            class="peer hidden">
                        <label for="type_delivery"
                            class=" p-5 bg-white border border-gray-300 rounded-lg cursor-pointer focus:outline-none hover:bg-gray-50 peer-checked:border-main peer-checked:text-white peer-checked:bg-main peer-checked:shadow-md transition">عند
                            التوصيل</label>
                    </div>
                    <div class="">
                        <input type="radio" id="type_internet" wire:model="type" value="internet"
                            class="peer hidden">
                        <label for="type_internet"
                            class=" p-5 bg-white border border-gray-300 rounded-lg cursor-pointer focus:outline-none hover:bg-gray-50 peer-checked:border-main peer-checked:text-white peer-checked:bg-main peer-checked:shadow-md transition">بايبال</label>
                    </div>
                </div>
                    @error('type')
                            <p class="text-sm text-red-500 mt-10">{{ $message }}</p>
                        @enderror
                
            
        </div>
        <div class="bg-white rounde-md shadow-md py-10 px-8 h-min">
            <h3 class="text-xl font-bold tracking-tight text-gray-900  mb-7">ملخص الطلب</h3>
            @foreach ($items as $item)
                <div class="grid grid-cols-5 gap-5 mb-10 items-center">

                    <div class="col-span-1">
                        <a href="{{ route('users.meal', $item->associatedModel) }}">
                            <img class="h-24" src="{{ asset('storage/' . $item->attributes->image) }}"
                                alt="">
                        </a>
                    </div>
                    <div class="col-span-3">
                        <p>{{ $item->name }}</p>
                        <p>{{ $item->price }} شيكل</p>
                    </div>
                    <div class="col-span-1">
                        <div class="flex flex-col content-between h-max">
                            <div class="mb-5">
                                <button type="submit"
                                    class=" px-5 py-2 text-red-500 bg-white rounded-md border border-1 border-red-300 font-semibold  hover:text-white hover:bg-red-500 transition text-xs"
                                    wire:click="delete_item({{ $item->id }})">حذف</button>
                            </div>
                            <div class="">@livewire('user.cart.edit-quantity', ['item' => $item,'width'=>14],
                                key($item->id))</div>
                        </div>
                    </div>

                </div>
                <hr class="my-7">
            @endforeach
            <div class="flex justify-between mt-10 mb-5">
                <span class="font-semibold text-sm uppercase">عدد الطلبات</span>
                <span class="font-semibold text-sm">{{ $items->count() }} </span>
            </div>

            <div class="flex font-semibold justify-between py-6 text-sm uppercase">
                <span>السعر الإجمالي</span>
                <span>{{ Cart::getTotal() }} شيكل</span>
            </div>
            <div class="">
            <button type="submit"
                    class="w-full text-main border border-main bg-white hover:bg-main hover:text-white transition font-medium rounded-lg text-sm w-full mt-7 px-5 py-2.5 text-center" wire:click="create()">تأكيد الطلب</button>
                </div>
        </div>
    </div>
</div>
