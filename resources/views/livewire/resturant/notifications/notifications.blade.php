<div class="w-100 mb-5 mt-5" wire:poll>
    @section('title')
    الإشعارات
    @endsection
    <h4>الإشعارات</h4>
    <div class="row w-100 mx-0 p-3 mb-5 mt-5  bg-white">
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