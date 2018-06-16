@extends('layouts.master')

@section('content')

    <div class="col my-2 py-1">
        Zaproszenia do Znajomych
        @foreach($invitations as $user)

                <div class="row">
                    <div class="col-4 my-3 border-bottom">
                        <a href="/profile/{{$user->id}}">
                            <img src="{{asset($user->gallery->avatar)}}" class="avatarSmall">
                            {{$user->data->name}} {{$user->data->surname}}
                        </a>
                    </div>
                    <div class="ml-auto">
                        <a href="/friend/{{$user->id}}/store">Przyjmij zaproszenie</a>
                        <a href="/friend/{{$user->id}}/destroy">Odrzuć zaproszenie</a>
                    </div>
                </div>

                @endforeach
            </div>
            <div class="col my-2 py-1">
                Twoje oczekujące zaproszenia
                @foreach($myInvitations as $user)

                        <div class="row my-3 border-bottom">
                            <div class="col-4">
                                <a href="/profile/{{$user->id}}">
                                    <img src="{{asset($user->gallery->avatar)}}" class="avatarSmall">
                                    {{$user->data->name}} {{$user->data->surname}}
                                </a>
                            </div>
                            <div class="ml-auto">
                                <a href="/friend/{{$user->id}}/destroy">Wycofaj zaproszenie</a>
                            </div>
                        </div>

                        @endforeach
                    </div>

                    <div class="col my-2 py-1">
                        Twoi znajomi:
                        @foreach($friends as $user)

                            <div class="row my-3 border-bottom">
                                <div class="col-4">
                                    <a href="/profile/{{$user->id}}">
                                        <img src="{{asset($user->gallery->avatar)}}" class="avatarSmall">
                                        {{$user->data->name}} {{$user->data->surname}}
                                    </a>
                                </div>
                                <div class="ml-auto">
                                    <a href="/friend/{{$user->id}}/destroy">Usuń znajomego</a>
                                </div>
                            </div>

                        @endforeach
                    </div>
@endsection