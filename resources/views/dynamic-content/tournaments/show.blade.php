<div class="col-md-12">
    <div class="jumbotron jumbotron-main-page">
        <div class="row justify-content-center">
            <div class="col">
                <div class="tile chosen">
                    <img class="cover-image" src='{{ asset('images/clubs/menu/football-grass.jpg') }}'>
                    <h1 class="text-header">
                        <span class="badge badge-pill my-color pull-right">
                            <i class="fa fa-star fa-fw" aria-hidden="true"></i>
                            {{ $tournament->tournament_points }}
                        </span>
                    </h1>
                    <br><br>
                    <h1 class="text-header text-center">
                        <i class="fa fa-trophy fa-4x fa-fw" aria-hidden="true"></i>
                    </h1>
                    <h1 class="text-header text-center">
                        {{ $tournament->name }}
                    </h1>
                    <h1 class="text-display text-center" style="margin-bottom: 30px">
                        <span class="badge badge-pill my-color-3">
                            <i class="fa fa-flag-o fa-fw" aria-hidden="true"></i>
                            {{ $tournament->country }} | {{ $tournament->city }}
                        </span>
                    </h1>
                    <div class="text-clubs text-center">
                        <h6 class="animate-text">
                            <i class="fa fa-users fa-fw" style="color: lightblue"></i>
                            Number of seats: {{ $tournament->number_of_seats }}
                        </h6>
                        <h6 class="animate-text">
                            <i class="fa fa-gamepad fa-fw" style="color: greenyellow"></i>
                            Game system: {{ $tournament->game_system }}
                        </h6>
                        <hr>
                        <h6 class="animate-text">
                            <i class="fa fa-users fa-fw" style="color: limegreen"></i>
                            Clubs remaining in the game: {{ $tournament->in_game_clubs }}
                        </h6>
                        <h6 class="animate-text">
                            <i class="fa fa-users fa-fw" aria-hidden="true" style="color: black"></i>
                            Eliminated clubs: {{ $tournament->eliminated_clubs }}
                        </h6>
                    </div>
                </div>
            </div>

            <div class="col">
                <ul class="nav nav-tabs">
                    @if(!$tournament->isOpen())
                        <li>
                            <a href="#tab-main-1" class="badge badge-pill tab-main active" data-toggle="tab">
                                <i class="fa fa-soccer-ball-o fa-fw" aria-hidden="true"></i>
                                Matches
                            </a>
                        </li>
                        <li>
                            <a href="#tab-main-2" class="badge badge-pill tab-main" data-toggle="tab">
                                <i class="fa fa-trophy fa-fw" aria-hidden="true"></i>
                                @if(Auth::user()->isOrganizer() && $tournament->isYourTournament())
                                    Tournament tree/Enter results
                                @else
                                    Tournament tree
                                @endif
                            </a>
                        </li>
                    @endif
                    <li>
                        <a href="#tab-main-3" class="badge badge-pill tab-main" data-toggle="tab">
                            <i class="fa fa-users fa-fw" aria-hidden="true"></i>
                            Clubs
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    @if(!$tournament->isOpen())
                        <div class="tab-pane active" id="tab-main-1">

                        </div>
                        <div class="tab-pane" id="tab-main-2">
                            @if(Auth::user()->isOrganizer() && $tournament->isYourTournament())
                            @else
                            @endif
                        </div>
                    @endif
                    <div class="tab-pane" id="tab-main-3">
                        <table id="clubs-table" class="table table-hover table-responsive" cellspacing="0" width="100%">
                            <thead class="my-color-2">
                            <tr>
                                <th><i class="fa fa-shield fa-fw"></i>Emblem</th>
                                <th><i class="fa fa-users fa-fw"></i>Name</th>
                                <th><i class="fa fa-star fa-fw"></i>Tournament points</th>
                                <th><i class="fa fa-trophy fa-fw"></i>Trophies</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($clubs as $club)
                                <tr href="{{ route('club-show', $club->id) }}" class="dynamic-content">
                                    <td>
                                        <img src="{{ asset($club->emblem_dir. $club->emblem) }}"
                                             width="25" height="25">
                                    </td>
                                    <td class="font-bold">{{ $club->name }}</td>
                                    <td class="font-bold">{{ $club->tournament_points }}</td>
                                    <td class="font-bold">{{ $club->won_trophies }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>