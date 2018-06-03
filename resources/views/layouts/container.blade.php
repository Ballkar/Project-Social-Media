@if(!auth()->check())
    <div class="row min-size ">
        <div class="col-8 m-0 justify-content-center align-items-center">
            @yield('content')
        </div>

        <div class="col-4 m-0 border-left">

            @include('layouts.sidebar.sidebarGuest')
        </div>
    </div>



@else
    <div class="row min-size">
        <div class="col-10 m-0 border-right">
            @yield('content')
        </div>
        <div class="col-2 m-0  h-scroll">

            @include('layouts.sidebar.sidebar')
        </div>
    </div>



@endif