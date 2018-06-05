
<div class="row mx-3 ">
    <img src="{{asset('storage/images.jpg')}}" class="rounded-circle avatar img-fluid">
    <h2 class="p-2 ">{{$user->data->name." ".$user->data->surname}}
        <small class="text-muted h6 font-weight-light">{{$user->data->birthday}}</small>
    </h2>
</div>