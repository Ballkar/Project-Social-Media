@extends('layouts.master')

@section('content')

    <div class="row mx-3 ">
        @include('layouts.part.ShowUser')

        @if($user->id == auth()->user()->id)
            <div class="btn-group h-25 ml-auto">
                <a href="/profile/{{$user->id}}/edit" class="btn-primary btn mr-1">Edytuj Profil</a>
                <a href="/gallery/{{$user->id}}" class="btn-primary btn">Galeria</a>
            </div>
        @else
            <div class="btn-group h-25 ml-auto">
                @if($friend)
                    <a href="/conversation/{{$user->id}}" class="btn-primary btn mr-1">Napisz Wiadomość</a>
                @elseif($asked)
                    <a href="/friend/{{$user->id}}/store" class="btn-primary btn mr-1">Potwierdź znajomość</a>
                @elseif($noConnections)
                    <a href="/friend/{{$user->id}}/store" class="btn-primary btn mr-1">Dodaj do znajomych</a>
                @endif
                <a href="/gallery/{{$user->id}}" class="btn-primary btn">Galeria</a>
            </div>
        @endif
    </div>

    <div class="col-12 pt-2">
        <form class="form-inline" action='/post/{{$user->id}}' method="post">
            {{csrf_field()}}
            <textarea type="text" class="form-control w-75 mr-2" rows="3" id="body" name="body"
                      placeholder="Napisz swój Post"></textarea>
            <button type="submit" class="btn btn-primary mr-2">Dodaj</button>
        </form>
    </div>


    <hr>

    @include('layouts.part.post')
@endsection