@extends('layouts.master')

@section('content')

    <form action="/rejestracja" method="post">
        {{csrf_field()}}

        <div class="col-6">

            <div class="form-group ">
                <label for="email">Adres Email:</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>

            <div class="form-group ">
                <label for="name">Imie:</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>

            <div class="form-group ">
                <label for="surname">Nazwisko:</label>
                <input type="text" class="form-control" id="surname" name="surname">
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
