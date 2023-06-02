<div class=" p-5 rounded-t border-b border-t ">
    <h3 class="text-xl font-semibold text-gray-900 lg:text-2xl ">
        قائمة الطعام
    </h3>
    @foreach ($all_meals as $meal)
    <div class="p-2  sm:p-8">
        <div class="flow-root">
            <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                <li class="py-3 sm:py-4  border-b">
                    <div class="flex items-center ">
                        <div class="flex-shrink-0 ml-3">
                            <a href="{{ route('users.meal', $meal) }}">
                                <img class="w-20 h-20 rounded-full" src="{{ asset('storage/' . $meal->image) }}" alt="">
                            </a>
                        </div>
                        <div class="flex-1 min-w-0">
                            <a href="{{ route('users.meal', $meal) }}">
                                <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                    {{ $meal->name }}
                                </p>
                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                    {{ $meal->description }}
                                </p>
                            </a>
                        </div>
                        <div class="text-left text-base font-semibold text-gray-900 w-max">
                            <p>${{ $meal->price }}</p>
                            @auth('web')
                            @livewire('user.cart.add-cart', ['meal' => $meal], key($meal->id))
                            @endauth
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    @endforeach
    {{ $all_meals->links() }}
</div>