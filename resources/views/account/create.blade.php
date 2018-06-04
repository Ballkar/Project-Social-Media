@extends('layouts.master')

@section('content')

    <form action="/register" method="post">
        {{csrf_field()}}

        <div class="col-6">

            <div class="form-group ">
                <label for="email">Adres Email:</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>


            <div class="form-group ">
                <label for="password">Hasło:</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="form-group ">
                <label for="password_confirmation">Powtórz hasło:</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
            </div>


            <div class="form-group">
                <button type="submit" class="btn btn-primary">Załóż Konto</button>
            </div>

        </div>
    </form>
@endsection
