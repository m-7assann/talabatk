<div class="my-20">

    <div class="mb-10 flex justify-between">
        <h2 class="text-line text-4xl">عروض المطاعم</h2>
        <div class="">
            <div class="inline-flex rounded-md ">
                <button wire:click="getOffersByCategory({{ 0 }})"
                    class="{{ $category == null ? 'text-white bg-main' : '' }} py-2 px-4 text-sm font-medium text-main bg-white mx-3 rounded-full border border-main hover:bg-main hover:text-white transition ">
                    الكل
                </button>
            </div>
            @foreach ($categories as $cat)
                <div class="inline-flex rounded-md ">
                    <button wire:click="getOffersByCategory({{ $cat->id }})"
                        class=" {{ $category == $cat->id ? 'text-white bg-main' : '' }} py-2 px-4 text-sm font-medium text-main bg-white mx-3 rounded-full border border-main hover:bg-main hover:text-white transition">
                        {{ $cat->name }}
                    </button>
                </div>
            @endforeach
        </div>
    </div>
    <div class="grid grid-cols-5 gap-4">
        @if ($offers->count() > 0)
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
        @else
            لا يوجد عروض متوفرة الآن
        @endif
    </div>
</div>
