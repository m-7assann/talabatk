<div class="my-20 " wire:poll>
    

    <div class="mb-10 flex justify-between">
        <h2 class="text-line text-4xl">الإشعارات</h2>
    </div>
        <div class="bg-white p-3 rounded-2 shadow ">
            @forelse ($notifications as $noti )

            <div class="p-3 border-bottom">

                @if (Carbon::now()->diffInMinutes(Carbon::parse($noti->seen_at)) < 1) <span class="text-red-500 new">
                    جديد </span>
                    @endif
                    @if ($noti->link)
                    <a href="{{$noti->link }}">
                        @endif
                        <span class="text-main-color">{{ $noti->title }}:</span>
                        {{ $noti->body }}
                        @if ($noti->link)
                    </a>
                    @endif
            </div>
            @empty
            لا يوجد إشعارات
            @endforelse

        </div>
    </div>
