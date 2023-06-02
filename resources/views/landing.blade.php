@extends('layout.users.master')
@section('css')
<style>

</style>
@endsection
@section('page-header')
{{-- Header --}}
<header class=" bg-second">

    <div class="p-10 flex content-center justify-start items-center ">
        <div class="w-full">
            <img class="mx-auto" src="{{ asset('image/eat.png') }}" alt="">
        </div>
        <div class="w-full justify-center flex flex-col  items-center">
            <h2 class="text-center mb-8 text-line xl:text-8xl md:text-6xl sm:text-4xl"> اللي بخاطرك واصلك</h2>
            <h2 class="text-center text-gray-500 xl:text-3xl md:text-2xl sm:text-2xl"> اطلب طعامك المفضل الان من اجود
                المطاعم</h2>
            <a href="#offers"
                class="mt-16 block border border-main text-main hover:bg-main hover:text-white hover:border hover:border-main  focus:ring-4 font-medium ease-linear duration-200 text-xl px-5 py-2.5 text-center w-40">
                أطلب الآن
            </a>
        </div>

    </div>
</header>
@endsection
@section('page-main')
{{-- أفضل عروضنا --}}
<section class="text-center py-20 px-2 sm:px-4 " id="offers">
    <h2 class="text-main text-3xl mb-10">أفضل عروضنا</h2>
    <div class="container mx-auto">
        <div class="grid grid-cols-5 justify-items-center  gap-4">
            @foreach ($offers as $offer)
            <div class="max-w-sm bg-white rounded-lg shadow-md ">
                <a href="{{ route('users.meal', $offer) }}" class="flex items-center justify-center">
                    <img class="p-8 rounded-t-lg" style="height: 200px" src="{{ asset('storage/' . $offer->image) }}"
                        alt="product image">
                </a>
                <div class="px-5 pb-5 ">
                    <a href="#">
                        <h3 class="text-xl font-semibold tracking-tight text-line mb-3">{{ $offer->name }}</h3>
                    </a>
                    <div class="flex">
                        <a href="{{ route('users.show.resturant',$offer->resturant) }}">
                            <span class="text-sm text-gray-400">
                                {{ ' ' . $offer->resturant->name }}</span></a>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-lg font-bold text-red-900 line-through">${{ $offer->price }}</span>
                        <span class="text-3xl font-bold text-gray-900 ">${{ $offer->price - $offer->discount }}</span>
                        
                    </div>
                    <div class="flex items-center mt-2.5 mb-5">
                        @for ($i=1 ; $i <=5 ; $i++) <svg
                            class="w-5 h-5 {{ $offer->rate >= $i?'text-yellow-300':'text-gray-300' }}"
                            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                            </path>
                            </svg>
                            @endfor

                            <span
                                class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded ml-3">{{
                                number_format($offer->rate,1) }}</span>
                    </div>
                    @auth('web')
                        @livewire('user.cart.add-cart', ['meal' => $offer], key($offer->id))
                        @endauth
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>
<section class="text-center py-20 px-2 sm:px-4">
    <h2 class="text-main text-3xl mb-10">أكثر الوجبات شراء</h2>
    <div class="container mx-auto">
        <div class="grid grid-cols-5 justify-items-center  gap-4">
            @foreach ($meals as $meal)
            <div class="max-w-sm bg-white rounded-lg shadow-md ">
                <a href="{{ route('users.meal', $meal) }}" class="flex items-center justify-center">
                    <img class="p-8 rounded-t-lg" style="height: 200px" src="{{ asset('storage/' . $meal->image) }}"
                        alt="product image">
                </a>
                <div class="px-5 pb-5 ">
                    <a href="#">
                        <h3 class="text-xl font-semibold tracking-tight text-line mb-3">{{ $meal->name }}</h3>
                    </a>
                    <div class="flex">
                        <a href="{{ route('users.show.resturant',$meal->resturant) }}">
                            <span class="text-sm text-gray-400">
                                {{ ' ' . $meal->resturant->name }}</span></a>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-lg font-bold text-black">${{ $meal->price }}</span>

                    </div>
                    <div class="flex items-center mt-2.5 mb-5">
                        @for ($i=1 ; $i <=5 ; $i++) <svg
                            class="w-5 h-5 {{ $meal->rate >= $i?'text-yellow-300':'text-gray-300' }}"
                            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                            </path>
                            </svg>
                            @endfor

                            <span
                                class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded ml-3">{{
                                number_format($meal->rate,1) }}</span>
                    </div>

                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<section class="text-center py-20 px-2 sm:px-4">
    <h2 class="text-main text-3xl mb-10">أفضل المطاعم</h2>
    <div class="container mx-auto">
        <div class="grid grid-cols-5 justify-items-center  gap-4">
            @foreach ($resturants as $resturant)
            <div class="max-w-sm bg-white rounded-lg shadow-md ">
                <a href="{{ route('users.show.resturant', $resturant) }}" class="flex items-center justify-center">
                    <img class="p-8 rounded-t-lg" style="height: 200px" src="{{ asset($resturant->photo) }}"
                        alt="product image">
                </a>
                <div class="px-5 pb-5 ">
                    <a href="{{ route('users.show.resturant', $resturant) }}">
                        <h3 class="text-xl font-semibold tracking-tight text-line mb-3">{{ $resturant->name }}</h3>
                    </a>
                    <div class="flex justify-center"><span class="text-sm text-gray-400">
                            {{$resturant->description }}</span></div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection