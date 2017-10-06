@foreach($clubs as $club)
    <div id="club-{{$club->id}}" class="tile tile-clubs club-card"
         href="#">
        <img class="cover-image" src='{{ asset('images/clubs/menu/football-grass.jpg') }}'>
        <h1 class="text-header pull-right">
            <span class="badge badge-pill my-color">
                <i class="fa fa-trophy fa-fw" aria-hidden="true"></i>
                {{ $club->tournament_points }}
            </span>
        </h1>
        <h1 class="text-locations">
            <span class="badge badge-pill my-color">
                  <i class="fa fa-flag-o fa-fw" aria-hidden="true"></i>
                {{ $club->city }}
            </span>
        </h1>
        <br>
        <h1 class="text-header text-center">
            <img src="{{ asset($club->emblem_dir. $club->emblem) }}"
                 width="150" height="150">
        </h1>
        <h1 class="text-header text-center">
            {{ $club->name }}
        </h1>
        <div class="text-clubs text-center">
            <h5 class="animate-text">
                <a href="#"
                   class="btn btn-sm my-color-3 request-join-club">
                    <i class="fa fa-users fa-lg fa-fw"></i>  Try to join the club
                </a>
            </h5>
            <h6 class="animate-text">
                <i class="fa fa-star fa-fw" style="color: gold;"></i> Place on the leaderboard: {{ $club->placeOnTheLeaderboard() }}
            </h6>
            <h6 class="animate-text">
               <i class="fa fa-address-card fa-fw"></i> Footballers in club: {{ $club->number_of_footballers }}
            </h6>
            <h6 class="animate-text">
                <i class="fa fa-futbol-o"></i> All Goals: {{ $club->goals }}
            </h6>
            <h6 class="animate-text">
                <i class="fa fa-mail-forward"></i> All Assists: {{ $club->assists }}
            </h6>
        </div>
    </div>
@endforeach
<div class="container pagination-links">
    <div class="row justify-content-center">
        {{ $clubs->links('layouts.pagination.clubs.searchable-cards') }}
    </div>
</div>