<div id="__next">

    <main class="profile-page">
        <section class="relative block" style="height:500px">
            <div class="absolute top-0 w-full h-full bg-center bg-cover"
                style="background-image:url(&#x27;https://images.unsplash.com/photo-1499336315816-097655dcfbda?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=2710&amp;q=80&#x27;)">
                <span id="blackOverlay" class="w-full h-full absolute opacity-50 bg-black"></span>
            </div>
            <div class="top-auto bottom-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden"
                style="height:70px"><svg class="absolute bottom-0 overflow-hidden" xmlns="http://www.w3.org/2000/svg"
                    preserveAspectRatio="none" version="1.1" viewBox="0 0 2560 100" x="0" y="0">
                    <polygon class="text-blueGray-200 fill-current" points="2560 0 2560 100 0 100"></polygon>
                </svg></div>
        </section>
        <section class="relative py-16 bg-blueGray-200">
            <div class="container mx-auto px-4">
                <div
                    class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-xl rounded-lg -mt-64">
                    <div class="px-6 pb-6">

                        <div class="flex flex-wrap justify-center">
                            <div class="w-full lg:w-3/12 px-4 lg:order-2 flex justify-center">
                                <div class="relative">
                                    <img src="{{ asset($resturant->photo) }}"
                                        class="shadow-xl rounded-full h-auto align-middle border-none absolute -m-16 -ml-20 lg:-ml-16"
                                        style="max-width: 150px">
                                </div>
                            </div>
                            <div class="w-full lg:w-4/12 px-4 lg:order-3">
                                <div class="flex justify-center py-4 lg:pt-4 pt-8">
                                    <div class="mr-4 p-3 text-center"><span
                                            class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">{{
                                            $resturant->meals_count }}</span><span class="text-sm text-blueGray-400">عدد
                                            الوجبات</span></div>
                                    <div class="mr-4 p-3 text-center"><span
                                            class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">{{
                                            $resturant->reviews_count }}</span><span
                                            class="text-sm text-blueGray-400">عدد
                                            التقييمات</span></div>
                                    <div class="lg:mr-4 p-3 text-center"><span
                                            class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">{{
                                            number_format($resturant->rate, 1) }}</span><span
                                            class="text-sm text-blueGray-400"><i class="fa fa-star"
                                                style="color: gold"></i></span></div>
                                </div>
                            </div>
                            <div class="w-full lg:w-4/12 px-4 lg:order-1 lg:text-right lg:self-center">
                                <div class="py-6 px-3 mt-32 sm:mt-0">
                                    <button
                                        class="bg-main active:bg-orange-400 uppercase text-white font-bold hover:shadow-md shadow text-xs px-4 py-2 rounded outline-none focus:outline-none sm:mr-2 mb-1 ease-linear transition-all duration-150"
                                        type="button" wire:click="change_show">قائمة الطعام</button>
                                </div>
                            </div>
                        </div>
                        @if ($details)

                        <div class="text-center mt-12">
                            <h3 class="text-4xl font-semibold leading-normal mb-2 text-blueGray-700 mb-2">
                                {{ $resturant->name }}</h3>
                            <div class="text-sm leading-normal mt-0 mb-2 text-gray-600 font-bold uppercase"><i
                                    class="fas fa-map-marker-alt mr-2 text-lg text-gray-600"></i>
                                {{ $resturant->address }}</div>

                            <div class="mb-2 ml-3 text-blueGray-600 mt-10 inline"><i
                                    class="fas fa-mobile-alt ml-2 text-lg text-blueGray-400"></i>{{ $resturant->mobile
                                }}
                            </div>
                            <div class="mb-2 text-blueGray-600 inline"><i
                                    class="fas fa-phone ml-2 text-lg text-blueGray-400"></i>{{ $resturant->telephone }}
                            </div>
                            <div class="mt-3">
                                <div class="mx-2 text-blueGray-600 inline">يفتح الساعة {{ Carbon::parse($resturant->open_at)->format('h:i A') }}
                                </div>
                                <div class="mb-2 text-blueGray-600 inline">يغلق الساعة {{ Carbon::parse($resturant->close_at)->format('h:i A') }}
                                </div>
                            </div>
                            <div class="mt-3 ">
                                @if(Carbon::now()->addHours(3)->format('H:i A') >= $resturant->open_at and
                                Carbon::now()->addHours(3)->format('H:i A') <= $resturant->close_at)
                                    <small class="text-green-400">
                                        المطعم مفتوح الآن
                                    </small>
                                    @else
                                    <small class="text-red-400">
                                        المطعم مغلق الآن
                                    </small>
                                    @endif
                            </div>
                        </div>
                        <div class="mt-10 py-10 border-t border-blueGray-200 text-center">
                            <div class="flex flex-wrap justify-center">
                                <div class="w-full lg:w-9/12 px-4">
                                    <p class="mb-4 text-lg leading-relaxed text-blueGray-700">
                                        {{ $resturant->description }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <hr class="mt-5 mb-10">
                        <div class="">
                            <h2 class="font-bold mb-10 text-xl">عروض المطعم</h2>
                            <div class="grid grid-cols-5 gap-5">
                                @foreach ($orders as $meal)
                                <a href="{{ route('users.meal', $meal) }}">
                                    <div class="flex flex-col items-center justify-center">
                                        <img class="rounded-full w-40 h-40 shadow-md mb-3"
                                            src="{{ asset('storage/' . $meal->image) }}" alt="">
                                        <h3 class="text-line">{{ $meal->name }}</h3>
                                    </div>
                                </a>
                                @endforeach
                            </div>
                        </div>
                        <hr class="mt-5 mb-10">
                        <div class="">
                            <h2 class="font-bold mb-10 text-xl">الوجبات الأكثر مبيعاً</h2>
                            <div class="grid grid-cols-5 gap-5">
                                @foreach ($best_meals as $meal)
                                <a href="{{ route('users.meal', $meal) }}">
                                    <div class="flex flex-col items-center justify-center">
                                        <img class="rounded-full w-40 h-40 shadow-md mb-3"
                                            src="{{ asset('storage/' . $meal->image) }}" alt="">
                                        <h3 class="text-line">{{ $meal->name }}</h3>
                                    </div>
                                </a>
                                @endforeach
                            </div>
                        </div>
                        @else
                        @include('livewire.user.resturants.mnue')
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>