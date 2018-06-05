@extends('layouts.master')

@section('content')

    @include('layouts.part.UserAvatar')

        <div class="col-12 pt-2">
            <form class="form-inline" action='/profile/{{auth()->id()}}/edit' method="post">
                {{csrf_field()}}
                <textarea type="text" class="form-control w-75 mr-2" rows="3" id="body" name="body" placeholder="Napisz swój Post"></textarea>
                <button type="submit" class="btn btn-primary mr-2">Dodaj</button>
            </form>
        <hr>
@endsection