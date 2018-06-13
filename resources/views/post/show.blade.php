@extends('layouts.master')

@section('contentL')

@endsection




@section('content')
    <div class="row mx-3 ">
        <div class="col-12 mb-2">
            <div class="row m-3 border-bottom">
                <img src="{{asset($user->gallery->avatar)}}" class="rounded-circle avatar img-fluid">
                <h4 class="m-3 mt-auto">{{$user->data->name." ".$user->data->surname}}</h4>
                @if($post->user->id == auth()->user()->id)
                    <div class="ml-auto">
                        <a href="/post/{{$post->id}}/edit"> Edytuj</a>
                        <a href="/post/{{$post->id}}/delete">Usuń post</a>
                    </div>
                @endif
            </div>
            <div class="row">
                <div class="col-12 text-center mt-3">
                    {{$post->body}}
                </div>
            </div>
        </div>
    </div>

    @include('layouts.part.comment')





@endsection
