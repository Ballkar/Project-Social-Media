@extends('layouts.master')

@section('contentL')

@endsection




@section('content')

    <div class="col-12 border-bottom">
        <div class="row">
            <div class="col-6 mr-auto text-left">
                <img src="{{asset($user1->gallery->avatar)}}" class="rounded-circle avatar img-fluid">
                <h4 class="m-3 mt-auto">{{$user1->data->name." ".$user1->data->surname}}</h4>
            </div>
            <div class="col ml-auto text-right">
                <img src="{{asset($user2->gallery->avatar)}}" class="rounded-circle avatar img-fluid">
                <h4 class="m-3 mt-auto">{{$user2->data->name." ".$user2->data->surname}}</h4>
            </div>
        </div>
    </div>

    @include('layouts.part.message')

    <form action='/conversation/{{$conversation->id}}/message' method="post" class="form-inline mt-3 mx-2 ">
        {{csrf_field()}}
        <div class="form-group col-md-12 col-xl-10">
            <input type="text" class="form-control col" id="body" name="body">
        </div>
        <div class="form-group ml-auto">
            <button type="submit" class="btn btn-primary">Wyślij</button>
        </div>
    </form>





@endsection
