@include('layout.dashboard.header')
<div class="dashboard rtl-dashboard" style="background:##e9edfb">
    @include('layout.dashboard.resturants.menu')
    <div class="dashboard-content ">
        @include('layout.dashboard.navbar')
        <div class="w-100 mx-0 p-3 mb-5 mt-5">
            @yield('content')
        </div>
    </div>
</div>
@include('layout.dashboard.footer')
