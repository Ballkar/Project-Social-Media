<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow sticky-top">
    <h5 class="my-0 mr-md-auto font-weight-normal">Project Social-Media</h5>
    <div class="col">
        <form class="form-inline col-12" method="get" action="/search">
            <input type="text"  class="m-0 p-0 col" name="query">
            <input type="submit" class="m-0 p-0 col-2" value="Wyszukaj">
        </form>
    </div>

    <nav class="my-2 my-md-0 mr-md-3">
        <div class="btn-group">
            <a class="p-2 text-dark" href="/profile/{{auth()->id()}}">@include('layouts.part.UserAvatarSmall') O
                Mnie</a>
            @if($invitations>0)
                <a class="p-2 text-danger" href="/friend/{{auth()->id()}}"><span
                            class="bg-danger text-black-50 rounded-circle px-2 mx-1">{{$invitations}}</span>Znajomi</a>
            @elseif($invitations==0)
                <a class="p-2 text-dark" href="/friend/{{auth()->id()}}">Znajomi</a>
            @endif
            <a class="p-2 text-dark" href="#">Grupy</a>
            <a class="p-2 text-dark" href="/conversation">Wiadomości</a>
            <a class="p-2 text-dark" href="#">Powiadomienia</a>
        </div>
    </nav>
    <a class="btn btn-outline-primary" href="/logout">Wyloguj się</a>
</div>
