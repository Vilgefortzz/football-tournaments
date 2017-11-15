@foreach($tournaments as $tournament)
    <div id="tournament-{{$tournament->id}}" class="tile tile-tournaments tournament-card"
         href="#">
        <img class="cover-image" src='{{ asset('images/clubs/menu/football-grass.jpg') }}'>
        <h1 class="text-header pull-right">
            <span class="badge badge-pill my-color">
                <i class="fa fa-star fa-fw" aria-hidden="true"></i>
                {{ $tournament->tournament_points }}
            </span>
        </h1>
        <h1 class="text-display" style="margin-bottom: 0">
            <span class="badge badge-pill my-color-3">
                <i class="fa fa-flag-o fa-fw" aria-hidden="true"></i>
                {{ $tournament->country }} | {{ $tournament->city }}
            </span>
        </h1>
        <br>
        <h1 class="text-header text-center">
            <i class="fa fa-trophy fa-4x fa-fw" aria-hidden="true"></i>
        </h1>
        <h1 class="text-header text-center">
            {{ $tournament->name }}
        </h1>
    </div>
@endforeach
<div class="container pagination-links" style="margin-top: 15px">
    <div class="row justify-content-center">
        {{ $tournaments->links('layouts.pagination.tournaments.searchable-cards') }}
    </div>
</div>