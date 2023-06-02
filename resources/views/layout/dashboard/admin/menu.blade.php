<div class="menu bg-white shadow" style="overflow: auto;">
    <div class="menu-header m-0" style="background:#FF9F15">
        <img src="{{ asset('image/logo.png') }}" width="150">
    </div>

    <div class="d-flex align-items-center justify-content-center flex-column mt-3 mb-4">
  
        <img src="{{ asset(auth()->user()->photo) }}" alt="" class="mb-2" style="width:80px">
        <p>{{ auth()->user()->name }}</p>
    </div>
    <div class="menu-bar selected mt-5" style="height: calc(100% - 20px);">
        <ul class="menu-list list-unstyled">
            <a href="{{ route('admin.dashboard') }}"
                class="{{ request()->routeIs('admin.dashboard') ? ' text-white' : 'text-dark' }}">
                <li class=" {{ request()->routeIs('admin.dashboard') ? 'activate text-white' : '' }} change-page">
                    <i class="fa-solid fa-chart-line ml-2" style="font-size:20px"></i>
                    لوحة التحكم
                </li>
            </a>
            <a target="_blank" href="{{ route('landPage') }}"
                class="">
                <li class="change-page">
                    <i class="fa-solid fa-chart-line ml-2" style="font-size:20px"></i>
                    زيارة الموقع
                </li>
            </a>
            <a href="{{ route('admin.categories') }}"
                class="{{ request()->routeIs('admin.categories') ? ' text-white' : 'text-dark' }}">
                <li class=" {{ request()->routeIs('admin.categories') ? 'activate text-white' : '' }} change-page">
                    <i class="fa-solid fa-sitemap ml-2" style="font-size:20px"></i>
                    الأقسام
                </li>
            </a>
            <a href="{{ route('admin.resturants') }}"
                class="{{ request()->routeIs('admin.resturants') ? ' text-white' : 'text-dark' }}">
                <li class=" {{ request()->routeIs('admin.resturants') ? 'activate text-white' : '' }} change-page">

                    <i class="fa-solid fa-utensils ml-2" style="font-size:20px"></i>
                    المطاعم
                </li>
            </a>
            <a href="{{ route('admin.offers') }}"
                class="{{ request()->routeIs('admin.offers') ? ' text-white' : 'text-dark' }}">
                <li class=" {{ request()->routeIs('admin.offers') ? 'activate text-white' : '' }} change-page">
                    <i class="fa-solid fa-cheese ml-2"></i>
                    العروض
                </li>
            </a>
            <a href="{{ route('admin.users') }}"
                class="{{ request()->routeIs('admin.users') ? ' text-white' : 'text-dark' }}">
                <li class=" {{ request()->routeIs('admin.users') ? 'activate text-white' : '' }} change-page">
                    <i class="fa-solid fa-users ml-2" style="font-size:20px"></i>
                    المستخدمين
                </li>
            </a>
            <a href="{{ route('admin.resturant_request') }}"
                class="{{ request()->routeIs('admin.resturant_request') ? ' text-white' : 'text-dark' }}">
                <li class=" {{ request()->routeIs('admin.resturant_request') ? 'activate text-white' : '' }} change-page">
                    <i class="fa-solid fa-address-card ml-2" style="font-size:20px"></i>
                    طلبات تسجيل المطاعم
                </li>
            </a>
            <a href="{{ route('admin.orders') }}"
                class="{{ request()->routeIs('admin.orders') ? ' text-white' : 'text-dark' }}">
                <li class=" {{ request()->routeIs('admin.orders') ? 'activate text-white' : '' }} change-page">
                    <i class="fa-solid fa-gift ml-2" style="font-size:20px"></i>
                    الطلبات
                </li>
            </a>
            <a href="{{ route('admin.reports') }}"
                class="{{ request()->routeIs('admin.reports') ? ' text-white' : 'text-dark' }}">
                <li class=" {{ request()->routeIs('admin.reports') ? 'activate text-white' : '' }} change-page">
                    <i class="fa-solid fa-file-invoice-dollar ml-2" style="font-size:20px"></i>
                    التقارير
                </li>
            </a>
        </ul>
    </div>
</div>
