@if(!auth()->check())
    <div class="row min-size ">
        <div class="col-8 m-0 justify-content-center align-items-center">
            @yield('content')
        </div>

        <div class="col-4 m-0 border-left">

            @include('layouts.part.errors')
        </div>
    </div>



@else
    <div class="row min-size">
        <div class="col-2 m-0">
            @yield('contentL')
        </div>

        <div class="col-8 m-0 p-0 border-right border-left">
            @yield('content')
        </div>

        <div class="col-2 m-0  h-scroll">
            @yield('contentR')
        </div>
    </div>



@endif