@extends('layouts.master')

@section('contentL')
    @if($photo->user->id == auth()->user()->id)
        <a href="/avatar/{{$photo->id}}" class="d-block">Ustaw jako zdjecie profilowe</a>
        <a href="/photo/{{$photo->id}}/edit" class="d-block">Edytuj</a>
        <a href="/photo/{{$photo->id}}/delete" class="d-block">Usuń zdjęcie</a>
    @endif
@endsection




@section('content')

    <div class="col-12">
        <div class="row m-2 border-bottom">
            <img src="{{asset($photo->gallery->avatar)}}" class="rounded-circle avatar img-fluid">
            <h4 class="m-2 mt-auto">{{$photo->user->data->name." ".$photo->user->data->surname}}</h4>
        </div>
        <div class="col-12 text-center pt-2 bg-light">
            {{$photo->body}}
        </div>
        <div class="col-12 text-center pt-2">
            <img src="{{asset($photo->path)}}" class="photoBig ">
        </div>

    </div>

    @include('layouts.part.comment')





@endsection
