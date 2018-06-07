@extends('layouts.master')
@section('contentR')

@endsection
@section('content')

    <div class="border-bottom mx-0 px-0">
        <h2 class="p-2">Podziel sie zdjeciami w swojej galerii!!</h2>
    </div>

    @foreach($user->gallery->photos as $photo)
        <img src="{{asset($photo->path)}}" class="avatar">
    @endforeach
@endsection

@section('contentL')
    @include('layouts.part.errors')
@endsection