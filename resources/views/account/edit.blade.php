@extends('layouts.master')
@section('contentR')


@endsection
@section('content')

    <div class="border-bottom mx-0 px-0">
        <h2 class="p-2">Utrzymuj aktualne dane aby ludzie mogli cię poznać</h2>
    </div>
    <form action='/profile/{{auth()->id()}}/edit' method="post">
        {{csrf_field()}}
        <div class="col-6">

            <div class="form-group ">
                <label for="birthday">Data Urodzenia:</label>
                <input type="date" class="form-control" id="birthday" name="birthday">
            </div>

            <div class="form-group ">
                <label for="adres">Miejscowość:</label>
                <input type="text" class="form-control" id="adres" name="adres">
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