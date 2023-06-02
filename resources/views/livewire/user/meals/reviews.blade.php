<div class="col-span-2">
    <div id="reviews" class="bg-white col-span-2 shadow-lg rounded p-5 mb-5">
        <div class="row text-right bg-white p-4 shadow-sm">
            <h3 class="mb-4 mt-3 font-bold">المراجعات</h3>
            <hr />
            <div class="review-block ">
                <div class="flow-root">
                    @if ($reviews->count() > 0)
                        <ul role="list" class="divide-y divide-gray-200">
                            @foreach ($reviews as $review)
                                <li class="py-3 sm:py-4">
                                    <div class="flex items-center space-x-4">
                                        <div class="flex-shrink-0 ml-4">
                                            <img src="{{ asset($review->user->photo) }}" class="rounded-full h-14 w-14" alt="">
                                        </div>
                                        <div class="flex-1 min-w-0 ">
                                            <p class="text-sm font-medium text-line font-bold truncate">
                                                {{ $review->user->name }}
                                            </p>
                                            <p class="text-sm text-gray-500 truncate ">
                                                {{ $review->review }}
                                            </p>
                                        </div>
                                        <div class="">
                                            <div class="inline-flex items-center text-base font-semibold rating">
                                                @for ($i = 0; $i < $review->value; $i++)
                                                    <i class="fa fa-star"></i>
                                                @endfor
                                            </div>
                                            @if (auth('web')->id() == $review->user_id)
                                                <div class="flex justify-center mt-3">
                                                    <button wire:click="delete({{ $review }})"
                                                        class="text-red-500 bg-white hover:text-white hover:bg-red-500 border border-red-500 transition-all duration-150 px-2 py-1 text-sm shadow"><i
                                                            class="fas fa-trash"></i></button>
                                                    <button
                                                        class="mr-2 text-blue-500 bg-white hover:text-white hover:bg-blue-500 border border-blue-500 transition-all duration-150 px-2 py-1 text-sm shadow"
                                                        wire:click="edit({{ $review }})"><i
                                                            class="fas fa-edit"></i></button>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <div class="text-red-500 m-3">لا يوجد مراجعات على هذه الوجبة</div>
                    @endif
                </div>
                
            </div>
            
            <hr />
        </div>
        <div class="mt-4">
            {{ $reviews->links() }}
        </div>
    </div>
    
    @auth('web')
        <div id="add_review" class="bg-white col-span-2 shadow-lg rounded p-5">
            <h3 class="mb-4 mt-3 font-bold">أضف مراجعة</h3>
            <hr />
            <form class="form-contact"
                wire:submit.prevent="submit">
                <div class="clear-both float-right">
                    <div class="rating mb-5 ">
                        <h5 class="w-full block">تقييم الوجبة</h5>
                        <input type="radio" id="rating_cleanliness1" wire:model="value" value="5" /><label
                            for="rating_cleanliness1" title="ممتاز"></label>
                        <input type="radio" id="rating_cleanliness2" wire:model="value" value="4" /><label
                            for="rating_cleanliness2" title="جيد جدًا"></label>
                        <input type="radio" id="rating_cleanliness3" wire:model="value" value="3" /><label
                            for="rating_cleanliness3" title="متوسط"></label>
                        <input type="radio" id="rating_cleanliness4" wire:model="value" value="2" /><label
                            for="rating_cleanliness4" title="سيء"></label>
                        <input type="radio" id="rating_cleanliness5" wire:model="value" value="1" /><label
                            for="rating_cleanliness5" title="سيء للغاية"></label>

                        @error('value')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                </div>

                <div class="mt-4">
                    <div class="form-group">
                        <textarea class="border w-full" id="review" cols="30" rows="9" placeholder="أضف مراجعة" wire:model="review"></textarea>
                        @error('review')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <input class="form-control" id="place_id" type="hidden">
                    @if ($updateMode)
                    <button type="submit" class="mt-3 bg-main text-white rounded hover:bg-orange-400 px-4 py-2 focus:outline-none">تعديل</button>
                    @else
                    <button type="submit" class="mt-3 bg-main text-white rounded hover:bg-orange-400 px-4 py-2 focus:outline-none">حفظ</button>
                    @endif

                </div>
            </form>
        </div>
    @endauth
</div>
