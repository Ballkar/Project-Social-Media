@if(!auth()->check())
    <div class="row min-size">
        <div class="col-12 m-0">
            @yield('content')
        </div>
    </div>
@else
    <div class="row min-size">
        <div class="col-10 m-0 border-right">
            @yield('content')
        </div>
        <div class="col-2 m-0  h-scroll">

            @include('layouts.sidebar')
        </div>
    </div>
@endif