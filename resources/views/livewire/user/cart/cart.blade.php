    <div class="container mx-auto mt-10">
        <div class="flex shadow-md my-10">
            <div class="w-3/4 bg-white px-10 py-10">
                <div class="flex justify-between border-b pb-8">
                    <h1 class="font-semibold text-2xl">عربة التسوق</h1>
                    @if ($items->count()>0)
                        
                    <h2 class="font-semibold text-2xl">
                        <button
                            class="px-5 py-2 text-red-500 bg-white rounded-md border border-1 border-red-300 font-semibold  hover:text-white hover:bg-red-500 transition text-xs"
                            wire:click="delete_all()">تفريغ عربة الشراء</button>

                    </h2>
                    @endif

                </div>
                <div class="flex flex-col">
                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block py-2 min-w-full sm:px-6 lg:px-8">
                            <div class="overflow-hidden  sm:rounded-lg">
                                <table class="min-w-full">
                                    <thead class="bg-gray-50 ">
                                        <tr>
                                            <th scope="col"
                                                class="py-3 px-6 text-xs font-medium tracking-wider text-right text-gray-700 uppercase ">
                                                تفاصيل الوجبة
                                            </th>
                                            <th scope="col"
                                                class="py-3 px-6 text-xs font-medium tracking-wider text-right text-gray-700 uppercase ">
                                                الكمية
                                            </th>
                                            <th scope="col"
                                                class="py-3 px-6 text-xs font-medium tracking-wider text-right text-gray-700 uppercase ">
                                                السعر
                                            </th>
                                            <th scope="col"
                                                class="py-3 px-6 text-xs font-medium tracking-wider text-right text-gray-700 uppercase ">
                                                الاجمالي
                                            </th>
                                            <th scope="col"
                                                class="py-3 px-6 text-xs font-medium tracking-wider text-right text-gray-700 uppercase ">
                                                حذف
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (!Cart::isEmpty())
                                            @foreach ($items as $item)
                                                <!-- Product 1 -->
                                                <tr class="bg-white border-b">
                                                    <td
                                                        class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap flex items-center">
                                                        <div class="w-20">
                                                            <a
                                                                href="{{ route('users.meal', $item->associatedModel) }}">
                                                                <img class="h-24"
                                                                    src="{{ asset('storage/' . $item->attributes->image) }}"
                                                                    alt="">
                                                            </a>
                                                            
                                                        </div>
                                                        <div class="flex flex-col  mr-3 flex-grow">
                                                            <a class="mb-2"
                                                                href="{{ route('users.meal', $item->associatedModel) }}">
                                                                <span
                                                                    class="font-bold text-sm">{{ $item->name }}</span>
                                                            </a>
                                                            <a
                                                                href="{{ route('users.show.resturant', $item->associatedModel->resturant->slug) }}">
                                                                <span
                                                                    class="text-red-500 text-xs">{{ $item->associatedModel->resturant->name }}</span>
                                                            </a>

                                                        </div>
                                                    </td>
                                                    <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap w-14">
                                                        @livewire('user.cart.edit-quantity', ['item' => $item,'width'=>20],
                                                        key($item->id))
                                                    </td>
                                                    <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap ">
                                                        <span class="text-center w-1/5 font-semibold text-sm"
                                                            id="price">{{ $item->price }} شيكل</span>
                                                    </td>
                                                    <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap ">
                                                        <span class="text-center w-1/5 font-semibold text-sm"
                                                            id="total">{{ $item->quantity * $item->price }}
                                                            شيكل</span>
                                                    </td>
                                                    <td
                                                        class="py-4 px-6 text-sm font-medium text-right whitespace-nowrap">
                                                        <button type="submit"
                                                            class=" px-5 py-2 text-red-500 bg-white rounded-md border border-1 border-red-300 font-semibold  hover:text-white hover:bg-red-500 transition text-xs"
                                                            wire:click="delete_item({{ $item->id }})">حذف</button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="5">لا يوجد طلبات</td>
                                            </tr>
                                        @endif

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="{{ route('landPage') }}" class="flex items-center  font-semibold text-main text-sm mt-10">
                    <i class="fas fa-arrow-right ml-2"></i>
                    تابع التسوق
                </a>
            </div>

            <div id="summary" class="w-1/4 px-8 py-10">
                <h1 class="font-semibold text-2xl border-b pb-8">ملخص الطلبات</h1>
                <div class="flex justify-between mt-10 mb-5">
                    <span class="font-semibold text-sm uppercase">عدد الطلبات</span>
                    <span class="font-semibold text-sm">{{ $items->count() }} </span>
                </div>

                <div class="flex font-semibold justify-between py-6 text-sm uppercase">
                    <span>السعر الإجمالي</span>
                    <span>{{ Cart::getTotal() }} شيكل</span>
                </div>
                @if (!Cart::isEmpty())
                    <a href="{{route('checkout')}}"
                        class="bg-main font-semibold hover:bg-orange-400 py-3 text-sm text-white uppercase w-full block text-center">اكمال
                        عملية الشراء</a>
                @endif
            </div>
        </div>

    </div>
