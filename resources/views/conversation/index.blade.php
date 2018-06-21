@extends('layouts.master')

@section('content')

    <div class="col my-2 py-1">
        Twoje rozmowy
        @foreach($conversations as $user)

            <div class="row">
                <div class="col py-3 border-bottom">
                    <a href="/conversation/{{$user->pivot->id}}/message">
                        <img src="{{asset($user->gallery->avatar)}}" class="avatar">
                        {{$user->data->name." ".$user->data->surname}}
                    </a>
                </div>
            </div>

        @endforeach
    </div>
@endsection