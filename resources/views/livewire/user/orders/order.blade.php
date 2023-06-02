<div class="my-20">



    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        تفاصيل الوجبة
                    </th>
                    <th scope="col" class="px-6 py-3">
                        الكمية
                    </th>
                    <th scope="col" class="px-6 py-3">
                        السعر
                    </th>
                    <th scope="col" class="px-6 py-3">
                        السعر الإجمالي
                    </th>
                    <th scope="col" class="px-6 py-3">
                        حالة الطلب
                    </th>
                    <th scope="col" class="px-6 py-3">
                        تاريخ الطلب
                    </th>
                </tr>
            </thead>
            <tbody>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">

                        <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap flex orders-center">
                            <div class="w-20">
                                <a href="{{ route('users.meal', $order->meal) }}">
                                    <img class="h-24" src="{{ asset('storage/' . $order->meal->image) }}"
                                        alt="">
                                </a>

                            </div>
                            <div class="flex flex-col  mr-3 flex-grow">
                                <a class="mb-2" href="{{ route('users.meal', $order->meal) }}">
                                    <span class="font-bold text-sm">{{ $order->meal->name }}</span>
                                </a>
                                <a href="{{ route('users.show.resturant', $order->resturant) }}">
                                    <span class="text-red-500 text-xs">{{ $order->resturant->name }}</span>
                                </a>

                            </div>
                        </td>

                        <td class="px-6 py-4">
                            {{ $order->quantity }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $order->price }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $order->total }} شيكل
                        </td>
                        <td class="px-6 py-4 text-right">
                            @if ($order->status == 'pending')
                                <span
                                    class="bg-yellow-100 text-yellow-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded">في
                                    الإنتظار</span>
                            @elseif($order->status == 'processing')
                                <span
                                    class="bg-purple-100 text-purple-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded ">يتم
                                    تحضير الطلب</span>
                            @elseif($order->status == 'shipped')
                                <span
                                    class="bg-pink-100 text-pink-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded">يتم
                                    توصيل الطلب</span>
                            @elseif($order->status == 'cancelled')
                                <span
                                    class="bg-red-100 text-red-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded">ملغي</span>
                            @elseif($order->status == 'completed')
                                <span
                                    class="bg-green-100 text-green-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded">مكتمل</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            {{ $order->created_at->diffForHumans() }}
                        </td>
                    </tr>



            </tbody>
        </table>
    </div>


    <div class="my-10 flex justify-between">
        <h2 class="text-line text-4xl">تتبع حالة الطلب</h2>
    </div>
    <ol class="orders-center sm:flex">
        <li class="relative mb-6 sm:mb-0 w-full">
            <div class="flex orders-center items-center">
                <div
                    class="flex z-10 justify-center orders-center w-14 h-14 bg-main rounded-full ring-0 ring-white sm:ring-8 shrink-0 items-center">
                    <i class="fas fa-check text-white fa-2x"></i>
                </div>
                <div class="hidden sm:flex w-full bg-main h-0.5"></div>

            </div>
            <div class="mt-3 sm:pr-8">
                <h3 class="text-lg font-semibold text-gray-900">تأكيد الطلب</h3>
            </div>
        </li>
        <li class="relative mb-6 sm:mb-0 w-full">
            <div class="flex orders-center items-center">
                <div
                    class="{{ $order->status == 'processing' || $order->status == 'shipped' || $order->status == 'completed'? 'bg-main': 'bg-blue-200' }} flex z-10 justify-center orders-center w-14 h-14  rounded-full ring-0 ring-white shrink-0 items-center">
                    <i class="fas fa-shopping-bag text-main fa-2x text-white"></i>
                </div>
                <div
                    class="{{ $order->status == 'processing' || $order->status == 'shipped' || $order->status == 'completed'? 'bg-main': 'bg-gray-200' }} hidden sm:flex w-full  h-0.5">
                </div>
            </div>
            <div class="mt-3 sm:pr-8">
                <h3 class="text-lg font-semibold text-gray-900 ">تحضير الطلب</h3>
            </div>
        </li>
        <li class="relative mb-6 sm:mb-0 w-full">
            <div class="flex orders-center items-center">
                <div
                    class="{{ $order->status == 'shipped' || $order->status == 'completed' ? 'bg-main' : 'bg-blue-200' }} flex z-10 justify-center orders-center w-14 h-14 rounded-full ring-0 ring-white shrink-0 items-center">
                    <i class="fas fa-truck fa-2x text-white"></i>

                </div>
                <div
                    class="{{ $order->status == 'shipped' || $order->status == 'completed' ? 'bg-main' : 'bg-gray-200' }} hidden sm:flex w-full  h-0.5">
                </div>
            </div>
            <div class="mt-3 sm:pr-8">
                <h3 class="text-lg font-semibold text-gray-900 ">توصيل الطلب</h3>
            </div>
        </li>
        <li class="relative mb-6 sm:mb-0 w-full">
            <div class="flex orders-center items-center">
                <div
                    class="{{ $order->status == 'completed' ? 'bg-main' : 'bg-blue-200' }}  flex z-10 justify-center orders-center w-14 h-14 rounded-full ring-0 ring-white shrink-0 items-center">
                    <i class="fas fa-hands-helping fa-2x text-white"></i>
                </div>
                <div
                    class="{{ $order->status == 'completed' ? 'bg-main' : 'bg-gray-200' }} hidden sm:flex w-full h-0.5 ">
                </div>
            </div>
            <div class="mt-3 sm:pr-8">
                <h3 class="text-lg font-semibold text-gray-900 ">استلام الطلب</h3>
            </div>
        </li>
    </ol>
</div>
