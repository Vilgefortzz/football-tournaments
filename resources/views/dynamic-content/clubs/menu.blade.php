@if(Auth::user()->haveClub())
    <div href="{{ route('clubs-club-menu', Auth::user()->club->id) }}" class="tile menu-card dynamic-content-card">
        <img class="cover-image" src='{{ asset('images/clubs/menu/football-grass.jpg') }}'>
        <br>
        <div class="text text-center">
            <h1>Your club</h1>
            <br>
            <h1><i class="fa fa-users fa-2x"></i></h1>
            <h2 class="animate-text">Go to your club</h2>
            <p class="animate-text">
                @if(Auth::user()->isClubPresident())
                    Manage the club.
                @endif
                See club details, footballers, tournaments, matches, showcase with trophies.
            </p>
        </div>
    </div>
@endif
<div id="clubs-list" href="{{ route('clubs-list-search') }}" class="tile menu-card">
    <img class="cover-image" src='{{ asset('images/clubs/menu/football-grass.jpg') }}'>
    <br>
    <div class="text text-center">
        <h1>Clubs</h1>
        <br>
        <h1>
            <i class="fa fa-users fa-2x"></i>
            <i class="fa fa-search fa-2x" style="color: gold"></i>
        </h1>
        <h2 class="animate-text">
            @if(Auth::user()->isFootballer())
                Search, find or join the club
            @elseif(Auth::user()->isClubPresident())
                Search the club
            @endif
        </h2>
        <p class="animate-text">
            See all clubs, search and find the right one, see their stats, trophies, tournament points.
            @if(Auth::user()->isFootballer())
                Try to join the club and become part of it.
            @endif
        </p>
    </div>
</div>
<div id="footballers-list" href="{{ route('footballers-list-search') }}" class="tile menu-card">
    <img class="cover-image" src='{{ asset('images/clubs/menu/football-grass.jpg') }}'>
    <br>
    <div class="text text-center">
        <h1>Footballers</h1>
        <br>
        <h1>
            <i class="fa fa-user fa-2x"></i>
            <i class="fa fa-search fa-2x" style="color: gold"></i>
        </h1>
        <h2 class="animate-text">
            Search footballer
        </h2>
        <p class="animate-text">
            @if(Auth::user()->isFootballer())
                See all footballers, search and find the right one, see their stats, goals, assists.
            @elseif(Auth::user()->isClubPresident())
                Try to sign the contracts, search footballer you want - by preferred positions and create
                the unbeatable team.
            @endif
        </p>
    </div>
</div>
@if(Auth::user()->isFootballer() && !Auth::user()->haveClub())
    <div href="{{ route('club-create') }}" class="tile menu-card dynamic-content-card">
        <img class="cover-image" src='{{ asset('images/clubs/menu/football-grass.jpg') }}'>
        <br>
        <div class="text text-center">
            <h1>Create club</h1>
            <h1><i class="fa fa-hand-o-right fa-2x"></i></h1>
            <h2 class="animate-text">Set up your own club</h2>
            <p class="animate-text">Start a new club, become a president of the club, manage club,
                take part in tournaments, sign contracts with footballers. </p>
        </div>
    </div>
@endif