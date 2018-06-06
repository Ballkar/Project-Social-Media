@extends('layouts.master')

@section('content')

    <div class="row mx-3 ">
        @include('layouts.part.ShowUser')

        @if($user->id == auth()->user()->id)
            <a href="/profile/{{$user->id}}/edit" class="btn-primary btn h-25 ml-auto">Edytuj Profil</a>
        @endif
    </div>


    <div class="col-12 pt-2">
        <form class="form-inline" action='/profile/{{auth()->id()}}/edit' method="post">
            {{csrf_field()}}
            <textarea type="text" class="form-control w-75 mr-2" rows="3" id="body" name="body"
                      placeholder="Napisz swój Post"></textarea>
            <button type="submit" class="btn btn-primary mr-2">Dodaj</button>
        </form>
    </div>
    <hr>
@endsection