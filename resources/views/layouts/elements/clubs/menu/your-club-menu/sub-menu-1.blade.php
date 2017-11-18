<div href="#" class="tile menu-card sub-menu-card dynamic-content">
    <img class="cover-image" src='{{ asset('images/clubs/menu/football-grass.jpg') }}'>
    <br>
    <div class="text text-center">
        <h1>Game schedule</h1>
        <h1><i class="fa fa-calendar fa-2x"></i></h1>
        <h2 class="animate-text">See upcoming matches</h2>
        <p class="animate-text">All upcoming matches, game schedule for near future </p>
    </div>
</div>
@if(Auth::user()->isClubPresident())
    <div id="requests-to-join-the-club" href="{{ route('club-join-requests', $club->id) }}" class="tile menu-card sub-menu-card">
        <img class="cover-image" src='{{ asset('images/clubs/menu/football-grass.jpg') }}'>
        <h1 class="text-header pull-right">
            <span class="badge badge-pill my-color"
                  data-number-footballer-requests="{{ $club->numberOfFootballerRequests() }}">
                    <i class="fa fa-user fa-fw" aria-hidden="true"></i>
                {{ $club->numberOfFootballerRequests() }}
            </span>
        </h1>
        <br>
        <div class="text text-center">
            <h1>Requests to join the club</h1>
            <h1><i class="fa fa-exclamation fa-2x"></i></h1>
            <h2 class="animate-text">See requests from footballers</h2>
            <p class="animate-text">Footballers who want to join the club -> reject or propose contract </p>
        </div>
    </div>
@elseif(Auth::user()->isFootballer() && Auth::user()->haveBindingContract())
    <div href="{{ route('user-contracts-binding', Auth::user()->id) }}" class="tile menu-card sub-menu-card dynamic-content">
        <img class="cover-image" src='{{ asset('images/clubs/menu/football-grass.jpg') }}'>
        <br>
        <div class="text text-center">
            <h1>Binding contract</h1>
            <h1><i class="fa fa-star fa-2x"></i></h1>
            <h2 class="animate-text">Your signed club contract</h2>
            <p class="animate-text">See details of your binding contract </p>
        </div>
    </div>
@endif