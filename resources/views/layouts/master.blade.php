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
@if(auth()->check())
    @include('layouts.nav')
@elseif(!auth()->check())
    @include('layouts.nav-guest')
@endif
<div class="container-fluid">
    @include('layouts.container')
</div>

@include('layouts.footer')

</body>
</html>
