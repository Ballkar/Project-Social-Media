@extends('layouts.master')
@section('contentR')

@endsection
@section('content')
    <div class="row mx-3 ">
        <div class="border-bottom mx-0 px-0">
            <h2 class="p-2">Podziel sie zdjeciami w swojej galerii!!</h2>
        </div>
        @if($user->id == auth()->user()->id)
            <div class="h-25 ml-auto">
                <a href="/gallery/{{$user->id}}/edit" class="btn-primary btn">Dodaj zdjęcie</a>
            </div>
        @endif
    </div>

    @foreach($user->gallery->photos as $photo)
        <img src="{{asset($photo->path)}}" class="photo m-2">
    @endforeach

@endsection

@section('contentL')
    @include('layouts.part.errors')
@endsection