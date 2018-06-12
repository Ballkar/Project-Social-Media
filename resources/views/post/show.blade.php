@extends('layouts.master')

@section('contentL')

@endsection




@section('content')
    <div class="row mx-3 ">
        <div class="col-7 m-0">
            <div class="row m-3 border-bottom">
                <img src="{{asset($user->gallery->avatar)}}" class="rounded-circle avatar img-fluid">
                <h4 class="m-3 mt-auto">{{$user->data->name." ".$user->data->surname}}</h4>
                @if($post->user->id == auth()->user()->id)
                    <a href="/post/{{$post->id}}/delete" class="ml-auto">Usuń post</a>
                @endif
            </div>
            <div class="row">
                <div class="col-12 text-center mt-3">
                    {{$post->body}}
                </div>
            </div>
        </div>
        <div class="col-5 bg-light m-0">
            <div class="row m-2 border-bottom">
                Komentarze
            </div>
            <div class="col-12 text-center pt-2">

            </div>
        </div>
    </div>



@endsection
