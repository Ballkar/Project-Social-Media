@extends('layouts.master')

@section('content')

    Zaproszenia do Znajomych
    @foreach($invitations as $user)
        <div class="col my-2 py-1 border-bottom">
            <div class="row">
                <div class="col-4">
                    <a href="/profile/{{$user->id}}">
                        <img src="{{asset($user->gallery->avatar)}}" class="avatarSmall">
                        {{$user->data->name}} {{$user->data->surname}}
                    </a>
                </div>
                <div class="ml-auto">
                    <a href="/friends/{{$user->id}}/agree">Przyjmij zaproszenie</a>
                    <a href="/friends/{{$user->id}}/refuse">Odrzuć zaproszenie</a>
                </div>
            </div>
        </div>
    @endforeach
    Twoje oczekujące zaproszenia
    @foreach($myInvitations as $user)
        <div class="col my-2 py-1 border-bottom">
            <div class="row">
                <div class="col-4">
                    <a href="/profile/{{$user->id}}">
                        <img src="{{asset($user->gallery->avatar)}}" class="avatarSmall">
                        {{$user->data->name}} {{$user->data->surname}}
                    </a>
                </div>
                <div class="ml-auto">
                    <a href="/friends/{{$user->id}}/destroy">Wycofaj zaproszenie</a>
                </div>
            </div>
        </div>
    @endforeach
    Twoi znajomi
    @foreach($friends as $user)
        <div class="col my-2 py-1 border-bottom">
            <div class="row">
                <div class="col-4">
                    <a href="/profile/{{$user->id}}">
                        <img src="{{asset($user->gallery->avatar)}}" class="avatarSmall">
                        {{$user->data->name}} {{$user->data->surname}}
                    </a>
                </div>
            </div>
        </div>
    @endforeach
@endsection