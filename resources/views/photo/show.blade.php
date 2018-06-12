@extends('layouts.master')

@section('contentL')
    @if($photo->user->id == auth()->user()->id)
        <a href="/avatar/{{$photo->id}}" class="d-block">Ustaw jako zdjecie profilowe</a>
        <a href="/photo/{{$photo->id}}/edit" class="d-block">Edytuj</a>
        <a href="/photo/{{$photo->id}}/delete" class="d-block">Usuń zdjęcie</a>
    @endif
@endsection




@section('content')
    <div></div>
    <div class="row mx-3 ">
        <div class="m-0">
            <img src="{{asset($photo->path)}}" class="photoBig ">
        </div>
        <div class="col-lg-12 col-xl-5 bg-light m-0 ml-auto">
            <div class="row m-2 border-bottom">
                <img src="{{asset($photo->gallery->avatar)}}" class="rounded-circle avatar img-fluid">
                <h4 class="m-2 mt-auto">{{$photo->user->data->name." ".$photo->user->data->surname}}</h4>
            </div>
            <div class="col-12 text-center pt-2">
                {{$photo->body}}
            </div>
        </div>
    </div>



@endsection
