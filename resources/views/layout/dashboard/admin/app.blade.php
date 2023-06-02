@include('layout.dashboard.header')
<div class="dashboard rtl-dashboard">
    @include('layout.dashboard.admin.menu')
    <div class="dashboard-content ">
        @include('layout.dashboard.navbar')
        <div class="row w-100 mx-0 p-3 mb-5 mt-5">
            @yield('content')
        </div>
    </div>
</div>
@include('layout.dashboard.footer')
