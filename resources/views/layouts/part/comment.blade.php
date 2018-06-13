<div class="col-12 m-0">
    <div class="row m-2 border-bottom">
        Komentarze
    </div>

    <form action='{{$id}}/comment' method="post" class="form-inline mb-3">
        {{csrf_field()}}
        <div class="form-group col-md-12 col-xl-9">
            <label for="body" class="mr-2">Skomentuj:</label>
            <input type="text" class="form-control col" id="body" name="body">
        </div>
        <div class="form-group mx-3">
            <button type="submit" class="btn btn-primary">Dodaj Komentarz</button>
        </div>
    </form>
    @foreach($comments as $comment)
        <div class="col-12 pt-2  bg-light">
            <div class="row m-1">
                <img src="{{asset($comment->user->gallery->avatar)}}" class="rounded-circle avatarSmall img-fluid">
                <span class="m-3 mt-auto">{{$comment->user->data->name." ".$comment->user->data->surname}}</span>
                <small class="m-3 mt-auto">{{$comment->created_at}}</small>
                @if($comment->user->id == auth()->id())
                    <div class="ml-auto">
                        <a href="/comment/{{$comment->id}}/edit">Edytuj</a>
                        <a href="/comment/{{$comment->id}}/delete">Usuń</a>
                    </div>
                @endif
            </div>
            <div class="row m-1">
                <div class=" text-center ">
                    {{$comment->body}}
                </div>
            </div>
        </div>
    @endforeach
</div>