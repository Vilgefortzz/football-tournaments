@if(Auth::user()->isClubPresident())
    <div id="requests-to-join-the-club" href="{{ route('user-join-requests', $club->id) }}" class="tile menu-card sub-menu-card">
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
            <br>
            <h1><i class="fa fa-exclamation fa-2x"></i></h1>
            <h2 class="animate-text">See requests from footballers</h2>
            <p class="animate-text">Footballers who want to join the club -> reject or propose contract </p>
        </div>
    </div>
@endif
<div href="#" class="tile menu-card sub-menu-card dynamic-content-card">
    <img class="cover-image" src='{{ asset('images/clubs/menu/football-grass.jpg') }}'>
    <br>
    <div class="text text-center">
        <h1>Showcase with trophies</h1>
        <br>
        <h1>
            <i class="fa fa-trophy fa-2x" style="color: gold"></i>
        </h1>
        <h2 class="animate-text">See schowcase with trophies</h2>
        <p class="animate-text">All trophies won by this club</p>
    </div>
</div>