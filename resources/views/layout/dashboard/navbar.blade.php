<div class='dashboard-card w-100 content-header shadow' style="background: #FF9F15">
    <div class='content-header-left'>
        <div class='menu-toggle-btn mt-1'>
            <label>
                <div class="bar"></div>
                <div class="bar"></div>
                <div class="bar"></div>
            </label>
        </div>

    </div>

    <div class='content-header-right'>
        @auth('resturant')
        @livewire('resturant.notifications.icon')
        @endauth
        <!-- <div class='dropdown notification-dropdown me-3'>
            <div class='dropdown-btn position-relative'>
                <i class="far fa-envelope fa-2x"></i>
                <span class="badge bg-danger" style="position: absolute; top: -3px; right: -11px;">0</span>
            </div>
            <div class='dropdown-content hide bg-white'>
                <ul>
                    <li>
                        <a href=''>
                            <span class='notification-image'>
                                <img src="" alt="Profile Image">
                            </span>
                            <span>
                                <span class="notification-sender translate">اشعار</span>
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href='' class='all-notification translate'>كل الرسائل</a>
                    </li>
                </ul>
            </div>
        </div> -->


        <div class='dropdown profile-dropdown'>
            <div class='dropdown-btn position-relative'>
                <span>

                    <a class="text-white" href=""
                        onclick="event.preventDefault();document.getElementById('logout-form').submit();"><span>خروج</span>
                        <i class="fas fa-sign-out-alt " style="vertical-align: sub;"></i></a>
                    <form action="{{route('logout')}}" method="POST" id="logout-form" style="display: none">
                        @csrf
                    </form>
                </span>

            </div>

        </div>
    </div>
</div>