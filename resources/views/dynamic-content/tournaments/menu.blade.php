@if(Auth::user()->haveClub())
    <div id="club-ongoing-tournaments" href="{{ route('club-tournaments-ongoing', Auth::user()->club->id) }}"
         class="tile menu-card">
        <img class="cover-image" src='{{ asset('images/clubs/menu/football-grass.jpg') }}'>
        <h1 class="text-header text-center pull-right">
            <span class="badge badge-pill my-color"
                  data-number-items="{{ Auth::user()->club->numberOfOngoingTournaments() }}">
                <i class="fa fa-trophy fa-fw" aria-hidden="true"></i>
                {{ Auth::user()->club->numberOfOngoingTournaments() }}
            </span>
        </h1>
        <br>
        <div class="text text-center">
            <h1>Ongoing tournaments</h1>
            <h1>
                <i class="fa fa-trophy fa-lg" style="color: gold;"></i>
                <img src="{{ asset(Auth::user()->club->emblem_dir. Auth::user()->club->emblem) }}"
                     width="100" height="100" class="img-fluid rounded-circle">
                <i class="fa fa-trophy fa-lg" style="color: gold;"></i>
            </h1>
            <h2 class="animate-text">See all club ongoing tournaments</h2>
            <p class="animate-text">See details, tournaments progress, stats and match results. </p>
        </div>
    </div>
    <div id="club-open-tournaments" href="{{ route('club-tournaments-open', Auth::user()->club->id) }}"
         class="tile menu-card">
        <img class="cover-image" src='{{ asset('images/clubs/menu/football-grass.jpg') }}'>
        <h1 class="text-header text-center pull-right">
            <span class="badge badge-pill my-color"
                  data-number-items="{{ Auth::user()->club->numberOfOpenTournaments() }}">
                <i class="fa fa-trophy fa-fw" aria-hidden="true"></i>
                {{ Auth::user()->club->numberOfOpenTournaments() }}
            </span>
        </h1>
        <br>
        <div class="text text-center">
            <h1>Open tournaments</h1>
            <h1>
                <i class="fa fa-trophy fa-lg" style="color: darkred;"></i>
                <img src="{{ asset(Auth::user()->club->emblem_dir. Auth::user()->club->emblem) }}"
                     width="100" height="100" class="img-fluid rounded-circle">
                <i class="fa fa-trophy fa-lg" style="color: darkred;"></i>
            </h1>
            <h2 class="animate-text">See all club open tournaments</h2>
            <p class="animate-text">See details.
                @if(Auth::user()->isClubPresident())
                    Leave tournaments.
                @endif
            </p>
        </div>
    </div>
@endif
<div id="tournaments-list" href="{{ route('tournaments-list-search') }}" class="tile menu-card">
    <img class="cover-image" src='{{ asset('images/clubs/menu/football-grass.jpg') }}'>
    <br>
    <div class="text text-center">
        <h1>Search tournaments</h1>
        <h1>
            <i class="fa fa-trophy fa-2x"></i>
            <i class="fa fa-search fa-2x" style="color: gold"></i>
        </h1>
        <h2 class="animate-text">
            Search tournament
        </h2>
        <p class="animate-text">
            See all tournaments, all details, search and find the right one.
            @if(Auth::user()->isClubPresident())
                Enter the team to the tournament.
            @endif
        </p>
    </div>
</div>