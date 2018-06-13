@extends('layouts.master')
@section('contentR')


@endsection
@section('content')

    <div class="border-bottom mx-0 px-0">
        <h2 class="p-2">Edytuj post</h2>
    </div>
    <form action='/post/{{$post->id}}/edit' method="post">
        {{csrf_field()}}
        <div class="col-6">

            <div class="form-group ">
                <label for="body">Treść wpisu</label>
                <textarea type="text" class="form-control" id="body" name="body">{{$post->body}}</textarea>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Edytuj</button>
            </div>
        </div>
    </form>
@endsection

@section('contentL')
    @include('layouts.part.errors')
@endsection