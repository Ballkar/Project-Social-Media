@if(!auth()->check())
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow sticky-top">
        <h5 class="my-0 mr-md-auto font-weight-normal">Project Social-Media</h5>

        <div class="btn-group">
            <a class="btn btn-outline-primary" href="/login">Zaloguj się</a>
            <a class="btn btn-outline-primary" href="/register">Rejestracja</a>
        </div>
    </div>
@else
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow sticky-top">
        <h5 class="my-0 mr-md-auto font-weight-normal">Project Social-Media</h5>
        <nav class="my-2 my-md-0 mr-md-3">
            <div class="btn-group">
                <a class="p-2 text-dark" href="/profile/{{auth()->id()}}">@include('layouts.part.UserAvatarSmall') O Mnie</a>
                <a class="p-2 text-dark" href="#">Znajomi</a>
                <a class="p-2 text-dark" href="#">Grupy</a>
                <a class="p-2 text-dark" href="#">Wiadomości</a>
                <a class="p-2 text-dark" href="#">Powiadomienia</a>
            </div>
        </nav>
        <a class="btn btn-outline-primary" href="/logout">Wyloguj się</a>
    </div>
@endif