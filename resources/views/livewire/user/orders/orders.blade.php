<div class="my-20">

    <div class="mb-10 flex justify-between">
        @if (is_null($order))
        <h2 class="text-line text-4xl">طلباتي</h2>
        @else
        <div class="flex justify-between w-full">
            <h2 class="text-line text-4xl">تفاصيل الطلب</h2>
            <button wire:click="showOrder" class="flex items-center  font-semibold text-main text-sm ">
                <i class="fas fa-arrow-right ml-2"></i>
                جميع الطلبات
            </button>
        </div>
        @endif
    </div>
    @if (is_null($order))
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        #
                    </th>
                    <th scope="col" class="px-6 py-3">
                        اسم الوجبة
                    </th>
                    <th scope="col" class="px-6 py-3">
                        السعر الإجمالي
                    </th>

                    <th scope="col" class="px-6 py-3">
                        حالة الطلب
                    </th>
                    <th scope="col" class="px-6 py-3">
                        حالة الدفع
                    </th>
                    <th scope="col" class="px-6 py-3">
                        تاريخ الطلب
                    </th>
                    <th scope="col" class="px-6 py-3">
                        الاجراءات
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($orders as $order)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">

                    <td class="px-6 py-4">
                        {{ $loop->index + 1 }}
                    </td>

                    <td class="px-6 py-4">
                        {{ $order->meal->name }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $order->total }} شيكل
                    </td>
                    <td class="px-6 py-4 text-right">
                        @if ($order->status == 'pending')
                        <span
                            class="bg-yellow-100 text-yellow-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-yellow-200 dark:text-yellow-900">في
                            الإنتظار</span>
                        @elseif($order->status == 'cancelled')
                        <span
                            class="bg-red-100 text-red-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-red-200 dark:text-red-900">ملغي</span>
                        @elseif($order->status == 'processing')
                        <span
                            class="bg-purple-100 text-purple-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded ">يتم
                            تحضير الطلب</span>
                        @elseif($order->status == 'shipped')
                        <span class="bg-pink-100 text-pink-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded">يتم
                            توصيل الطلب</span>
                        @elseif($order->status == 'completed')
                        <span
                            class="bg-green-100 text-green-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-green-200 dark:text-green-900">مكتمل</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-right">
                        @if ($order->payment_status == 'unpaid')
                        <span
                            class="bg-red-100 text-red-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-red-200 dark:text-red-900">غير
                            مدفوع</span>
                        @elseif($order->payment_status == 'paid')
                        <span
                            class="bg-green-100 text-green-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-green-200 dark:text-green-900">مدفوع</span>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        {{ $order->created_at->diffForHumans() }}
                    </td>
                    <td class="px-6 py-4">
                        <button type="submit"
                            class=" px-5 py-2 text-main bg-white rounded-md border border-1 border-mai font-semibold  hover:text-white hover:bg-main transition text-xs"
                            wire:click="showOrder({{ $order }})">تفاصيل
                            العرض</button>
                        @if ($order->status == 'pending')
                        <button type="submit"
                            class=" px-5 py-2 text-red-500 bg-white rounded-md border border-1 border-mai font-semibold  hover:text-white hover:bg-red-500 transition text-xs"
                            wire:click="cancelOrder({{ $order }})">إلغاء الطلب</button>
                        @endif
                    </td>
                </tr>

                @empty
                <tr>
                    <td>لا يوجد أي طلب</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $orders->links() }}
    </div>
    @else
    @include('livewire.user.orders.order')
    @endif
</div>