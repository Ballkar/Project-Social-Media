@extends('layouts.master')
@section('content')
    <div class="row mx-3 ">
        <div class="border-bottom mx-0 px-0">
            <h2 class="p-2">Podziel sie zdjeciami w swojej galerii!!</h2>
        </div>
    </div>

    <a href="photo/{{$photo->id}}">
        <img src="{{asset($photo->path)}}" class="photo m-2">
    </a>
@endsection
