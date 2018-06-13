@foreach($posts as $post)


    <div class="row my-4 mx-1 bg-light post">
        <div class="col-12 p-3 ">
            <div class="row m-0 p-0">
                <a href="/profile/{{$post->user->id}}" class="text-black-50 col-10">
                    <img src="{{asset($post->user->gallery->avatar)}}" class="rounded-circle avatarSmall img-fluid">
                    {{$post->user->data->name." ".$post->user->data->surname}}
                </a>
                <span class="ml-auto my-0 small">
                    {{$post->created_at}}
                </span>
            </div>

            <hr>

            <div class="col-12 m-0 p-0 text-center">
                <span class="h3 font-weight-light mx-5">{{$post->body}}</span>
            </div>
            <div class="mt-2">
                <a href="/post/{{$post->id}}" class=" mx-1">Zobacz post</a>
                @if($post->user->id == auth()->user()->id)
                    <a href="/post/{{$post->id}}/edit" class=" mx-1">Edytuj</a>
                @endif
            </div>

        </div>
    </div>

@endforeach