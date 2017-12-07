<div href="#" class="tile menu-card sub-menu-card">
    <img class="cover-image" src='{{ asset('images/clubs/menu/football-grass.jpg') }}'>
    <br>
    <div class="text text-center">
        <h1>Next match</h1>
        <h1><i class="fa fa-calendar fa-2x"></i></h1>
        <br>
        <h1 class="text-header">
            <span class="badge badge-pill my-color-3">
                <i class="fa fa-soccer-ball-o fa-fw" aria-hidden="true"></i>
                @if($nextMatch)
                    {{ \Carbon\Carbon::parse($nextMatch->start_date_and_time)->format('d/m/Y H:i') }}
                @else
                    ...
                @endif
            </span>
        </h1>
        @if($nextMatch)
            <hr>
            <h1 class="text-header">
                <i class="fa fa-trophy" style="color: gold"></i>
            </h1>
            <h1 class="text-header">
                {{ $nextMatch->tournament->name }}
            </h1>
            <h1 class="text-display">
            <span class="badge badge-pill my-color">
                <i class="fa fa-soccer-ball-o fa-fw" aria-hidden="true"></i>
                Round: {{ $nextMatch->round }}
            </span>
            </h1>
        @endif
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