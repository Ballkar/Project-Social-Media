@extends('layouts.master')
@section('contentR')


@endsection
@section('content')

    <div class="border-bottom mx-0 px-0">
        <h2 class="p-2">Podziel sie zdjeciami w swojej galerii!!</h2>
    </div>

    <form class="form m-2" action='/photo/create' method="post"
          enctype="multipart/form-data">
        {{csrf_field()}}

        <div class="form-group ">
            <label for="photo">Wprowadź zdjęcie</label>
            <input type="file" name="photo">
        </div>

        <div class="form-group ">
            <label for="body">Opis:</label>
            <input type="text" name="body">
        </div>
        <div class="form-group ">
            <label for="avatar">Ustaw jako profilowe</label>
            <input type="checkbox" name="avatar">
        </div>

        <button type="submit" class="btn btn-primary mr-2">Dodaj zdjecie</button>
    </form>
@endsection

@section('contentL')
    @include('layouts.part.errors')
@endsection