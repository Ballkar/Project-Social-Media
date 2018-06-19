@extends('layouts.master')

@section('content')

    <div class="col my-2 py-1">
        Osoby
        @foreach($users as $userData)

                <div class="row">
                    <div class="col my-3 border-bottom">
                        <a href="/profile/{{$userData->id}}">
                            <img src="{{asset($userData->user->gallery->avatar)}}" class="avatar mb-2">
                            {{$userData->name}} {{$userData->surname}}
                        </a>
                    </div>
                </div>

                @endforeach
            </div>

@endsection