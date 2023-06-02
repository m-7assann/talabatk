@extends('layout.users.master')
@section('css')
    <style>

    </style>
@endsection
@section('page-main')
    <div class="my-20">
        @if ($meals->count() > 0 || $resturants->count() > 0 || $offers->count() > 0)
            @if ($offers->count() > 0)
            <div class="mb-8">
                <div class="mb-10">
                    <h2 class="text-line text-4xl">نتائج البحث عن العروض :</h2>
                </div>
                <div class="grid grid-cols-5 gap-4">
                    @foreach ($offers as $offer)
                        <div class="max-w-sm bg-white rounded-lg shadow-md ">
                            <a href="{{ route('users.meal', $offer) }}">
                                <img class="p-8 rounded-t-lg" src="{{ asset('storage/' . $offer->image) }}"
                                    alt="product image">
                            </a>
                            <div class="px-5 pb-5 ">
                                <a href="#">
                                    <h3 class="text-xl font-semibold tracking-tight text-line mb-3">{{ $offer->name }}</h3>
                                </a>
                                <div class="flex"><span class="text-sm text-gray-400">مطعم
                                        {{ '  ' . $offer->resturant->name }}</span></div>
                                <div class="flex items-center mt-2.5 mb-5">
                                    <svg class="w-5 h-5 text-yellow-300" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                        </path>
                                    </svg>
                                    <svg class="w-5 h-5 text-yellow-300" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                        </path>
                                    </svg>
                                    <svg class="w-5 h-5 text-yellow-300" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                        </path>
                                    </svg>
                                    <svg class="w-5 h-5 text-yellow-300" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                        </path>
                                    </svg>
                                    <svg class="w-5 h-5 text-yellow-300" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                        </path>
                                    </svg>
                                    <span
                                        class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded ml-3">5.0</span>
                                </div>
                                <div class="flex justify-between items-center mb-5">
                                    <span
                                        class="text-lg font-bold text-red-900 line-through">{{ $offer->price }}شيكل</span>
                                    <span
                                        class="text-2xl font-bold text-gray-900 ">{{ $offer->price - $offer->discount }}شيكل</span>

                                </div>
                                <a href="#"
                                    class="text-white bg-main hover:bg-orange-500 focus:ring-4 focus:ring-second font-medium rounded-lg text-sm px-5 py-2.5 text-center">إضافة
                                    الى السلة</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            @endif

            @if ($meals->count() > 0)
            <div class="mb-8">
                <div class="mb-10">
                    <h2 class="text-line text-4xl">نتائج البحث عن الوجبات :</h2>
                </div>
                <div class="grid grid-cols-5 gap-4">
                    @foreach ($meals as $meal)
                        <div class="max-w-sm bg-white rounded-lg shadow-md ">
                            <a href="{{ route('users.meal', $meal) }}">
                                <img class="p-8 rounded-t-lg" src="{{ asset('storage/' . $meal->image) }}"
                                    alt="product image">
                            </a>
                            <div class="px-5 pb-5 ">
                                <a href="#">
                                    <h3 class="text-xl font-semibold tracking-tight text-line mb-3">{{ $meal->name }}
                                    </h3>
                                </a>
                                <div class="flex"><span class="text-sm text-gray-400">مطعم
                                        {{ '  ' . $meal->resturant->name }}</span></div>
                                <div class="flex items-center mt-2.5 mb-5">
                                    <svg class="w-5 h-5 text-yellow-300" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                        </path>
                                    </svg>
                                    <svg class="w-5 h-5 text-yellow-300" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                        </path>
                                    </svg>
                                    <svg class="w-5 h-5 text-yellow-300" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                        </path>
                                    </svg>
                                    <svg class="w-5 h-5 text-yellow-300" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                        </path>
                                    </svg>
                                    <svg class="w-5 h-5 text-yellow-300" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                        </path>
                                    </svg>
                                    <span
                                        class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded ml-3">5.0</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-lg font-bold text-red-900 ">{{ $meal->price }} شيكل</span>
                                    <a href="#"
                                        class="text-white bg-main hover:bg-orange-500 focus:ring-4 focus:ring-second font-medium rounded-lg text-sm px-5 py-2.5 text-center">إضافة
                                        الى السلة</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            @endif

            @if ($resturants->count() > 0)
                <div class="mb-10">
                    <h2 class="text-line text-4xl">نتائج البحث عن المطاعم :</h2>
                </div>
                <div class="grid grid-cols-5 gap-4">
                    @foreach ($resturants as $rest)
                        <div class=" bg-white rounded-lg border border-gray-200 shadow-md ">
                            <a class="flex flex-col items-center py-10"
                                href="{{ route('users.show.resturant', $rest) }}">
 
                                <img src="{{ asset($rest->photo) }}" alt="" class="mb-3 w-40 h-40 rounded-full shadow-lg">
                                <h3 class="mb-1 text-xl font-medium text-gray-900 ">{{ $rest->name }}</h3>
                                <span class="text-sm text-gray-500 ">{{ $rest->description }}</span>

                            </a>
                        </div>
                    @endforeach
                </div>
            @endif
        @else
            لا يوجد نتائج بحث عن {{ $key }}
        @endif
    </div>
@endsection
