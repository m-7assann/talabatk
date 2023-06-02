<div class="my-20 ">
    <div class="py-12 ">
        <div class="text-center mt-5 p-5">
            <h1 class="text-2xl mb-2 font-bold">{{ $meal->name }}</h1>
        </div>
        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-3 gap-5 mt-5">
            <div class="col-span-2 bg-white shadow-lg rounded p-5">
                <h3 class="mb-4 mt-3 font-bold">معلومات عن الوجبة</h3>
                <hr />
                <div class="">
                    <h1 class="my-4 text-2xl ">وصف الوجبة</h1>
                    <p class="text-sm">{{ $meal->description }}</p>
                </div>
                <div class="mt-5 ">
                    <h3 class="mb-4 text-2xl">صورة الوجبة</h3>
                    <img src="{{ asset('storage/' . $meal->image) }}" alt="" width="500">
                </div>
            </div>

            <div class=" ">
                <div class="bg-white shadow-lg rounded p-4">
                    <h3 class="mb-4 mt-3 font-bold">معلومات عن المطعم</h3>
                    <hr />
                    <div class="p-2  ">
                        <div class="flow-root">
                            <ul role="list" class="divide-y divide-gray-200">
                                <li class="py-2 sm:py-4  border-b">
                                    <div class="flex items-center ">
                                        <div class="flex-shrink-0 ml-3">
                                            <a href="{{ route('users.show.resturant', $meal->resturant) }}">
                                                <img src="{{ asset($meal->resturant->photo) }}" class="w-20 h-20 rounded-full" alt="">
                                            </a>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <a href="{{ route('users.show.resturant', $meal->resturant) }}">
                                                <p class="text-sm font-medium text-gray-900 truncate">
                                                    {{ $meal->resturant->name }}
                                                </p>
                                                <p class="text-sm text-gray-500 truncate ">
                                                    {{ $meal->resturant->email }}
                                                </p>
                                            </a>
                                        </div>

                                    </div>
                                </li>
                                <hr>
                            </ul>
                        </div>
                    </div>
                </div>
                @auth('web')
                    <div class="mt-20 bg-white shadow-lg rounded p-4">
                        <h3 class="mb-4 mt-3 font-bold">أطلب الوجبة الآن</h3>
                        <hr />
                        <div class="p-2  ">
                            <div class="flow-root ">
                                <ul role="list" class="divide-y divide-gray-200 ">
                                    <li class="py-2 sm:py-4  border-b">
                                        @livewire('user.cart.add-cart', ['meal' => $meal], key($meal->id))

                                    </li>
                                </ul>

                            </div>
                        </div>
                    </div>
                @endauth

            </div>

            @include('livewire.user.meals.reviews')

        </div>
    </div>

</div>