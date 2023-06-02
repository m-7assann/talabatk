<nav class="bg-main border-gray-200 sm:px-10 md:px-20 lg:px-40 ">
    <div class="container flex flex-wrap justify-between items-center mx-auto">
        <a href="{{ route('landPage') }}">
            <img src="{{ asset('image/logo.png') }}" width="150">
        </a>
        <div class="flex items-center md:order-2 ">
            <button class="block border border-main text-white  focus:ring-4 font-medium text-sm  text-center ml-5"
                type="button" data-modal-toggle="searchModal">
                <i class="fas fa-search"></i>
            </button>
            <div id="searchModal" aria-hidden="true"
                class="hidden overflow-y-auto overflow-x-hidden fixed right-0 left-0 top-4 z-50 justify-center items-center h-modal md:h-full md:inset-0">
                <div class="relative px-4 w-full max-w-2xl h-full md:h-auto">
                    <div class="relative bg-white rounded-lg shadow ">
                        <div class=" p-5 rounded-t border-b">
                            <h3 class="text-xl font-semibold text-gray-900 lg:text-2xl ">
                                ابحث عن مطعم أو وجبة
                            </h3>
                            <div class=" mt-5">
                                <hr class="my-4">
                                <form action="{{ route('search') }}">
                                    <label for="website-admin"
                                        class="block mb-5 text-sm font-medium text-gray-900 ">أدخل اسم
                                        المطعم أو اسم الوجبة</label>
                                    <div class="flex">
                                        <input type="text" id="website-admin" name="key"
                                            class="rounded-none rounded-r-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5 "
                                            placeholder="ابحث ...">
                                        <button type="submit"
                                            class="inline-flex items-center px-3 text-sm text-white bg-main rounded-l-md border border-r-0 border-main">
                                            ابحث
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 ">
                            <button data-modal-toggle="searchModal" type="button"
                                class="shadow-lg text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">إلغاء</button>
                        </div>
                    </div>
                </div>
            </div>
            @auth(activeGuard())

            @auth('web')
            @livewire('user.cart.cart-icon')
            @endauth
            {{-- <a href="{{ route('notifications') }}">
                <i class="ml-5 fas fa-bell text-white text-lg"></i>
                {{ Auth::guard(activeGuard())->user()->unseen_notification_count }}
            </a> --}}
            @livewire('user.notifications.icon')
            <button type="button"
                class="flex mr-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300"
                id="user-menu-button" aria-expanded="false" data-dropdown-toggle="dropdown">
                <span class="sr-only">Open user menu</span>
                <img class="w-10 h-10 rounded-full" src="{{ asset(Auth::guard(activeGuard())->user()->photo) }}">

            </button>
            <div class="hidden z-50 my-4 text-base list-none bg-white rounded divide-y divide-gray-100 shadow"
                id="dropdown">
                <div class="py-3 px-4">
                    <span class="block text-sm text-gray-900">{{ Auth::guard(activeGuard())->user()->name }}</span>
                    <span class="block text-sm font-medium text-gray-500 truncate ">{{
                        Auth::guard(activeGuard())->user()->email }}</span>
                </div>
                <ul class="py-1" aria-labelledby="dropdown">
                    @if (activeGuard() == 'resturant' || activeGuard() == 'admin')
                    <li>
                        <a href="{{ activeGuard() == 'resturant' ? route('resturant.dashboard') : route('admin.dashboard') }}"
                            class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100">لوحة التحكم</a>
                    </li>
                    @endif
                    <li>
                        <a href="{{ route('user.profile') }}"
                            class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100">الملف الشخصي</a>
                    </li>
                    @auth('web')
                    <li>
                        <a href="{{route('my_orders')}}"
                            class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 ">طلباتي</a>
                    </li>
                    @endauth
                    <li>
                        <a class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100" href="{{ route('logout') }}"
                            onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i
                                class="text-danger ti-unlock"></i>تسجيل الخروج</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
            @else
            {{-- login & signup --}}
            <button
                class=" block border border-main text-white  focus:ring-4 font-medium text-sm px-5 py-2.5 text-center "
                type="button" data-modal-toggle="loginModal">
                تسجيل الدخول
            </button>
            <div id="loginModal" aria-hidden="true"
                class="hidden overflow-y-auto overflow-x-hidden fixed right-0 left-0 top-4 z-50 justify-center items-center h-modal md:h-full md:inset-0">
                <div class="relative px-4 w-full max-w-2xl h-full md:h-auto">

                    <div class="relative bg-white rounded-lg shadow ">

                        <div class=" p-5 rounded-t border-b ">
                            <h3 class="text-xl font-semibold text-gray-900 lg:text-2xl ">
                                تسجيل الدخول ك
                            </h3>
                            <div class="grid grid-cols-3 gap-4 mt-5">
                                <a class="shadow-lg p-10 border boder-gray-500 text-xl text-center hover:bg-main hover:text-white ease-out duration-200"
                                    href="{{ url('login') }}">زبون</a>
                                <a class="shadow-lg p-10 border boder-gray-500 text-xl text-center hover:bg-main hover:text-white ease-out duration-200"
                                    href="{{ url('resturant/login') }}">صاحب مطعم</a>
                                <a class="shadow-lg p-10 border boder-gray-500 text-xl text-center hover:bg-main hover:text-white ease-out duration-200"
                                    href="{{ url('admin/login') }}">مدير</a>
                            </div>
                        </div>



                        <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 ">
                            <button data-modal-toggle="loginModal" type="button"
                                class="shadow-lg text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">إلغاء</button>
                        </div>
                    </div>
                </div>
            </div>

            <button
                class=" block border border-white text-white hover:bg-white hover:text-main hover:border hover:border-main  focus:ring-4 font-medium ease-linear duration-200 text-sm px-5 py-2.5 text-center "
                type="button" data-modal-toggle="signupModal">
                التسجيل
            </button>
            <div id="signupModal" aria-hidden="true"
                class="hidden overflow-y-auto overflow-x-hidden fixed right-0 left-0 top-4 z-50 justify-center items-center h-modal md:h-full md:inset-0">
                <div class="relative px-4 w-full max-w-2xl h-full md:h-auto">

                    <div class="relative bg-white rounded-lg shadow ">

                        <div class=" p-5 rounded-t border-b">
                            <h3 class="text-xl font-semibold text-gray-900 lg:text-2xl ">
                                التسجيل ك
                            </h3>
                            <div class="grid grid-cols-2 gap-4 mt-5">
                                <a class="shadow-lg p-10 border boder-gray-500 text-xl text-center hover:bg-main hover:text-white ease-out duration-200"
                                    href="{{ url('register') }}">زبون</a>
                                <a class="shadow-lg p-10 border boder-gray-500 text-xl text-center hover:bg-main hover:text-white ease-out duration-200"
                                    href="{{ url('resturant/register') }}">صاحب مطعم</a>
                            </div>
                        </div>

                        <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 ">

                            <button data-modal-toggle="signupModal" type="button"
                                class="shadow-lg text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">إلغاء</button>
                        </div>
                    </div>
                </div>
            </div>
            @endauth
            {{-- ---------------------------------------------- البحث--------------------------------------- --}}

        </div>
        <button data-collapse-toggle="mobile-menu-2" type="button"
            class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200"
            aria-controls="mobile-menu-2" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-6 h-6" fill="white" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                    clip-rule="evenodd"></path>
            </svg>
            <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                    clip-rule="evenodd"></path>
            </svg>
        </button>
        <div class="hidden justify-between items-center w-full md:flex  md:w-auto md:order-1" id="mobile-menu-2">
            <ul class="flex text-xl w-full justify-center">
                <li class="ml-5">
                    <a href="{{ route('landPage') }}"
                        class="ease-linear duration-200 block py-2 pr-4 pl-3 text-white md:p-0  {{ request()->RouteIs('landPage') ? 'border-b-4' : 'hover:border-b-4' }}">الرئيسية</a>
                </li>
                <li class="ml-5">
                    <a href="{{ route('users.offers') }}"
                        class="ease-linear duration-200 block py-2 pr-4 pl-3 text-white md:p-0  {{ request()->RouteIs('users.offers') ? 'border-b-4' : 'hover:border-b-4' }}">العروض</a>
                </li>
                <li class="ml-5">
                    <a href="{{ route('users.resturants') }}"
                        class="ease-linear duration-200 block py-2 pr-4 pl-3 text-white md:p-0 {{ request()->RouteIs('users.resturants') ? 'border-b-4' : 'hover:border-b-4' }}">المطاعم</a>
                </li>

            </ul>
        </div>
    </div>
</nav>