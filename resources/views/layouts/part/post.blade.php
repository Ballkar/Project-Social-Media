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
            <div class="row m-0 p-0">
                <div class="col-12 m-0 p-0 text-center">
                    <span class="h3 font-weight-light">{{$post->body}}</span>
                </div>
            </div>
        </div>
    </div>
@endforeach