@extends('layouts.master')
@section('contentR')
    Pola z <span class="text-danger">*</span> są wymagane.

@endsection
@section('content')

    <div class="border-bottom mx-0 px-0">
        <h2 class="p-2">Bardzo Proszę o uzupełnienie danych</h2>
    </div>
    <form action='/profile/{{auth()->id()}}/edit' method="post">
        {{csrf_field()}}
        <div class="col-6">


            <div class="form-group ">
                <label for="birthday">Data Urodzenia<span class="text-danger">*</span>:</label>
                <input type="date" class="form-control" id="birthday" name="birthday">
            </div>

            <div class="form-group ">
                <label for="home">Adres Zamieszkania:</label>
                <input type="text" class="form-control" id="home" name="home">
            </div>


            <div class="form-group">
                <button type="submit" class="btn btn-primary">Dodaj informacje</button>
            </div>
        </div>
    </form>
@endsection

@section('contentL')
    @include('layouts.part.errors')
@endsection