@extends('layouts.master')
@section('contentR')


@endsection
@section('content')

    <div class="border-bottom mx-0 px-0">
        <h2 class="p-2">Podziel sie zdjeciami w swojej galerii!!</h2>
    </div>

    <form class="form-inline" action='/gallery/{{auth()->id()}}/edit' method="post"
          enctype="multipart/form-data">
        {{csrf_field()}}
        <input type="file" name="photo">
        <button type="submit" class="btn btn-primary mr-2">Dodaj zdjecie</button>
    </form>
@endsection

@section('contentL')
    @include('layouts.part.errors')
@endsection