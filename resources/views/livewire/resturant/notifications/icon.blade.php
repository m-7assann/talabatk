<div class='dropdown notification-dropdown' wire:poll >
    <div class='dropdown-btn position-relative'>
        <i class="far fa-bell fa-2x text-white"></i>
        <span class="badge bg-dark text-white" style="position: absolute; top: -3px; right: -11px;">{{
            Auth::guard(activeGuard())->user()->unseen_notification_count }}</span>
    </div>
    <div class='dropdown-content hide bg-white' wire:ignore.self>
        <ul>
            @foreach (Auth::guard(activeGuard())->user()->notifications as $noti )
            <li>
                <a href='{{  $noti->link }}'>
                    <div class="d-flex">
                        <div class='notification-image'>
                            <i class="fas fa-bell text-xl ml-2" style="color:#FF9F15"></i>
                        </div>
                        <div>
                            <div class=" text-sm mb-1.5"><span class="text-secondary">{{ $noti->title}} </span><span
                                    class="font-semibold text-gray-900">{{ $noti->body }}</div>
                            <div class="text-xs text-blue-600 ">{{ $noti->created_at->diffForHumans() }}</div>
                        </div>
                    </div>
                </a>
            </li>
            @endforeach
            <li>
                <a href='{{ route('resturant.notifications') }}' class='all-notification translate'>كل
                    الإشعارات</a>
            </li>
        </ul>
    </div>
</div>
