@extends('layouts.master')

@section('content')

    <form action="/login" method="post">
        {{csrf_field()}}

        <div class="col-10 col-md-5">

            <div class="form-group ">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>

            <div class="form-group ">
                <label for="password">Hasło:</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Zaloguj się</button>
            </div>

        </div>
    </form>
@endsection
