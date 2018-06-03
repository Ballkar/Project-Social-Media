<!doctype html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="Projekt w ramach nauki programowania" content="">
    <meta name="A.Latka" content="">

    <title>Social Media Project</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
          integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="{{asset('css/glowny.css')}}" rel="stylesheet">
</head>

<body>

@include('layouts.nav')


<div class="container-fluid">

    <div class="row min-size">

        <div class="col-10 m-0 border-right">
            @yield('content')
        </div>
        <div class="col-2 m-0  h-scroll">
            @include('layouts.sidebar')
        </div>


    </div>
    @include('layouts.footer')
</div>


</body>
</html>
