@foreach($requestsToJoinTheClub as $requestToJoinTheClub)
    <div id="request-to-join-the-club-{{$requestToJoinTheClub->id}}" class="tile request-to-join-the-club-card">
        <img class="cover-image" src='{{ asset('images/clubs/menu/football-grass.jpg') }}'>
        <h1 class="text-header pull-right">
            <span class="badge badge-pill my-color">
                <i class="fa fa-male" aria-hidden="true"></i>
                LW
            </span>
        </h1>
        <h1 class="text-display" style="margin-bottom: 0">
            <span class="badge badge-pill my-color-3">
                  <i class="fa fa-flag-o fa-fw" aria-hidden="true"></i>
                @if($requestToJoinTheClub->user->haveCountryAndCity())
                    {{ $requestToJoinTheClub->user->country }} | {{ $requestToJoinTheClub->user->city }}
                @elseif($requestToJoinTheClub->user->haveCountry())
                    {{ $requestToJoinTheClub->user->country }}
                @elseif($requestToJoinTheClub->user->haveCity())
                    {{ $requestToJoinTheClub->user->city }}
                @endif
            </span>
        </h1>
        <h1 class="text-display">
            <span class="badge badge-pill my-color">
                <i class="fa fa-soccer-ball-o fa-fw" aria-hidden="true"></i>
                {{ $requestToJoinTheClub->user->goals }} |
                <i class="fa fa-mail-forward fa-fw" aria-hidden="true"></i>
                {{ $requestToJoinTheClub->user->assists }}
            </span>
        </h1>
        <h1 class="text-display" style="margin-bottom: 0">
            <span class="badge badge-pill my-color-3">
                <i class="fa fa-male fa-fw" aria-hidden="true"></i>
                Preferred positions:
            </span>
        </h1>
        <h1 class="text-display">
            <span class="badge badge-pill my-color">
                LW | RW | AM
            </span>
        </h1>
        <br>
        <h1 class="text-header text-center">
            <img src="{{ asset($requestToJoinTheClub->user->avatar_dir. $requestToJoinTheClub->user->avatar) }}"
                 width="150" height="150">
        </h1>
        <h1 class="text-header text-center">
            {{ $requestToJoinTheClub->user->username }}
        </h1>
        <div class="text-contracts text-center">
            <h5 class="animate-text">
                <input type="text" id="username-contract-{{$requestToJoinTheClub->id}}" name="username">
                <label class="font-italic" for="username-contract-{{$requestToJoinTheClub->id}}">Make your signature</label>
                <div class="bar"></div>
            </h5>

            <h6 class="animate-text">
                <a href="{{ route('contract-sign', $requestToJoinTheClub->id) }}"
                   class="btn my-color sign-contract" data-contract-id="{{$requestToJoinTheClub->id}}">
                    <i class="fa fa-handshake-o fa-lg fa-fw"></i>  Sign contract
                </a>
            </h6>
        </div>
    </div>
@endforeach
<div class="container pagination-links">
    <div class="row justify-content-center">
        {{ $requestsToJoinTheClub->links('layouts.pagination.clubs.requests-to-join.default') }}
    </div>
</div>