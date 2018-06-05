
<div class="row mx-3 ">
    <img src="{{asset('storage/images.jpg')}}" class="rounded-circle avatar img-fluid">
    <h2 class="p-2 ">{{auth()->user()->data->name." ".auth()->user()->data->surname}}
        <small class="text-muted h6 font-weight-light">{{auth()->user()->data->birthday}}</small>
    </h2>
</div>