<div class="menu bg-white shadow" style="overflow: auto;">
    <div class="menu-header m-0" style="background:#FF9F15">
        <img src="{{ asset('image/logo.png') }}" width="150">
    </div>

    <div class="d-flex align-items-center justify-content-center flex-column mt-3 mb-4">
 
        <img src="{{ asset(auth()->user()->photo) }}" alt=""  style="width:80px">
        <p>{{ auth()->user()->name }}</p>
    </div>
    <div class="menu-bar selected mt-5" style="height: calc(100% - 20px);">
        <ul class="menu-list list-unstyled">
            <a href="{{ route('resturant.dashboard') }}"
                class="{{ request()->routeIs('resturant.dashboard') ? ' text-white' : 'text-dark' }}">
                <li class=" {{ request()->routeIs('resturant.dashboard') ? 'activate text-white' : '' }} change-page">
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
            <a href="{{ route('resturant.meals') }}"
                class="{{ request()->routeIs('resturant.meals') ? ' text-white' : 'text-dark' }}">
                <li class=" {{ request()->routeIs('resturant.meals') ? 'activate text-white' : '' }} change-page">
                    <i class="fa-solid fa-cheese ml-2"></i>
                    الوجبات
                </li>
            </a>
            <a href="{{ route('resturant.offers') }}"
                class="{{ request()->routeIs('resturant.offers') ? ' text-white' : 'text-dark' }}">
                <li class=" {{ request()->routeIs('resturant.offers') ? 'activate text-white' : '' }} change-page">
                    <i class="fa-solid fa-utensils ml-2" style="font-size:20px"></i>
                    العروض
                </li>
            </a>
            <a href="{{ route('resturant.orders') }}"
                class="{{ request()->routeIs('resturant.orders') ? ' text-white' : 'text-dark' }}">
                <li
                    class="w-100 {{ request()->routeIs('resturant.orders') ? 'activate text-white' : '' }} change-page">
                    <i class="fa-solid fa-gift ml-2" style="font-size:20px"></i>
                         الطلبات
                </li>
            </a>
            <a href="{{ route('resturant.reports') }}"
                class="{{ request()->routeIs('resturant.reports') ? ' text-white' : 'text-dark' }}">
                <li
                    class="w-100 {{ request()->routeIs('resturant.reports') ? 'activate text-white' : '' }} change-page">
                    <i class="fa-solid fa-file-invoice-dollar ml-2" style="font-size:20px"></i>
                    التقارير
                </li>
            </a>
        </ul>
    </div>
</div>
