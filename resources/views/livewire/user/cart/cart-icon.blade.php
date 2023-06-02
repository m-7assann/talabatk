<a href="{{ route('cart') }}" class="relative">
    <i class="ml-3 fas fa-shopping-cart text-white text-lg"></i>
    @if ($count>0)
        
    <span class="absolute top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-blue-100 transform translate-x-1/2 -translate-y-1/2 bg-line rounded-full">{{$count}}</span>
    @endif

</a>
