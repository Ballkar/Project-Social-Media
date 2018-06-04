@extends('layouts.master')

@section('content')

    <div class="border-bottom mx-0 px-0">
        <h2 class="p-2">{{$user->name." ".$user->surname}}</h2>
        {{$user->data->birthday}}
    </div>
@endsection