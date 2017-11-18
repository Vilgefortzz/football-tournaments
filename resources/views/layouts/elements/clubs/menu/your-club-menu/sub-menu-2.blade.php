@if(Auth::user()->haveClub())
    <div id="club-closed-tournaments" href="{{ route('club-tournaments-closed', Auth::user()->club->id) }}"
         class="tile menu-card sub-menu-card">
        <img class="cover-image" src='{{ asset('images/clubs/menu/football-grass.jpg') }}'>
        <h1 class="text-header pull-right">
            <span class="badge badge-pill my-color"
                  data-number-items="{{ Auth::user()->club->numberOfClosedTournaments() }}">
                <i class="fa fa-trophy fa-fw" aria-hidden="true"></i>
                {{ Auth::user()->club->numberOfClosedTournaments() }}
            </span>
        </h1>
        <br>
        <div class="text text-center">
            <h1>Finished tournaments</h1>
            <h1>
                <i class="fa fa-check fa-2x"></i>
                <i class="fa fa-trophy fa-2x" style="color: gold"></i>
            </h1>
            <h2 class="animate-text">See all club finished tournaments</h2>
            <p class="animate-text">See details of already finished tournaments for the club. </p>
        </div>
    </div>
@endif
<div href="#" class="tile menu-card sub-menu-card dynamic-content">
    <img class="cover-image" src='{{ asset('images/clubs/menu/football-grass.jpg') }}'>
    <br>
    <div class="text text-center">
        <h1>Showcase with trophies</h1>
        <h1>
            <i class="fa fa-trophy fa-2x" style="color: gold"></i>
        </h1>
        <h2 class="animate-text">See schowcase with trophies</h2>
        <p class="animate-text">All trophies won by this club</p>
    </div>
</div>