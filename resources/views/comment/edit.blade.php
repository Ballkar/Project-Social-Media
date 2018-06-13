@extends('layouts.master')

@section('contentL')
@endsection




@section('content')
    <div class="border-bottom mx-0 px-0">
        <h2 class="p-2">Edytuj Zdjęcie</h2>
    </div>
    <form action='/comment/{{$comment->id}}/edit' method="post">
        {{csrf_field()}}
        <div class="col-6">

            <div class="form-group ">
                <label for="body">Treść Komentarza</label>
                <textarea type="text" class="form-control" id="body" name="body">{{$comment->body}}</textarea>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Edytuj</button>
            </div>
        </div>
    </form>
@endsection
