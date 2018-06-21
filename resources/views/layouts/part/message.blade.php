<div class="col-12 m-0">
    @foreach($messages as $message)

        @if($message->user->id == auth()->id())
            <div class="col-5 p-3 mt-2 bg-primary rounded text-left ">
                {{$message->body}}
            </div>
        @elseif($message->user->id != auth()->id())
            <div class="col-5 p-3 mt-2 bg-light rounded ml-auto text-right text-truncate">

                {{$message->body}}

            </div>

        @endif
    @endforeach
</div>