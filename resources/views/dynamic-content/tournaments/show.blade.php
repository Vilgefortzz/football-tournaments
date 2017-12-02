<div class="col-md-12">
    <div class="jumbotron jumbotron-main-page">
        <div class="row justify-content-center">
            <div class="col">
                <div class="tile chosen">
                    <img class="cover-image" src='{{ asset('images/clubs/menu/football-grass.jpg') }}'>
                    <h1 class="text-header pull-right">
                        <span class="badge badge-pill my-color pull-right">
                            <i class="fa fa-star fa-fw" aria-hidden="true"></i>
                            {{ $tournament->tournament_points }}
                        </span>
                    </h1>
                    @if($tournament->isOpen())
                        <h1 class="text-display">
                            <span class="badge badge-pill my-color">
                                <i class="fa fa-users fa-fw" style="color: cornflowerblue"></i>
                                {{ $tournament->number_of_seats }} |
                                <i class="fa fa-lock fa-fw" aria-hidden="true" style="color: black"></i>
                                {{ $tournament->number_of_occupied_seats }} |
                                <i class="fa fa-unlock fa-fw" aria-hidden="true" style="color: limegreen"></i>
                                {{ $tournament->number_of_available_seats }}
                            </span>
                        </h1>
                    @else
                        <h1 class="text-display">
                            <span class="badge badge-pill my-color">
                                <i class="fa fa-users fa-fw" style="color: limegreen"></i>
                                {{ $tournament->in_game_clubs }} |
                                <i class="fa fa-users fa-fw" aria-hidden="true" style="color: black"></i>
                                {{ $tournament->eliminated_clubs }}
                            </span>
                        </h1>
                    @endif
                    <br>
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
                        @if(Auth::user()->isClubPresident() && $tournament->isOpen())
                            <hr>
                            @if($tournament->isClubJoined())
                                <h6 class="animate-text">
                                    <button href="{{ route('tournament-leave', $tournament->id) }}" class="btn my-color leave-tournament">
                                        <i class="fa fa-sign-out fa-lg fa-fw"></i> Leave tournament
                                    </button>
                                </h6>
                            @else
                                <h6 class="animate-text">
                                    <button href="{{ route('tournament-join', $tournament->id) }}" class="btn my-color-3 join-tournament">
                                        <i class="fa fa-sign-in fa-lg fa-fw"></i> Join tournament
                                    </button>
                                </h6>
                            @endif
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <ul class="nav nav-tabs">
                    @if(!$tournament->isOpen())
                        <li>
                            <a href="#tab-main-1" class="badge badge-pill tab-main-matches active" data-toggle="tab">
                                <i class="fa fa-trophy fa-fw" aria-hidden="true"></i>
                                @if(Auth::user()->isOrganizer() && $tournament->isYourTournament())
                                    Tournament tree/Enter results
                                @else
                                    Tournament tree
                                @endif
                            </a>
                        </li>
                        <li>
                            <a id="tab-matches" href="#tab-main-2" class="badge badge-pill" data-toggle="tab">
                                <i class="fa fa-soccer-ball-o fa-fw" aria-hidden="true"></i>
                                Matches
                            </a>
                        </li>
                        <li>
                            <a href="#tab-main-3" class="badge badge-pill tab-main-matches" data-toggle="tab">
                                <i class="fa fa-users fa-fw" aria-hidden="true"></i>
                                Clubs
                            </a>
                        </li>
                    @else
                        <li>
                            <a href="#tab-main-3" class="badge badge-pill active" data-toggle="tab">
                                <i class="fa fa-users fa-fw" aria-hidden="true"></i>
                                Clubs
                            </a>
                        </li>
                    @endif
                </ul>
                <div class="tab-content text-center">
                    @if(!$tournament->isOpen())
                        <div class="tab-pane active tournament-tree-view" id="tab-main-1"
                             href="{{ route('tournaments-tree-view', $tournament->id) }}">
                            @if(Auth::user()->isOrganizer() && $tournament->isYourTournament())
                            @else
                                <div class="tournament-tree"></div>
                            @endif
                        </div>
                        <div class="tab-pane" id="tab-main-2">
                            <ul class="nav nav-tabs">
                                <li>
                                    <a id="tab-match-first-round" href="{{ route('tournament-matches-first-round', $tournament->id) }}"
                                       class="badge badge-pill tab-matches">
                                        1 round
                                    </a>
                                </li>
                                @if($numberOfRounds === 2)
                                    <li>
                                        <a href="{{ route('tournament-matches-second-round', $tournament->id) }}"
                                           class="badge badge-pill tab-matches">
                                            <i class="fa fa-star" style="color: gold"></i> Final round
                                        </a>
                                    </li>
                                @elseif($numberOfRounds === 3)
                                    <li>
                                        <a href="{{ route('tournament-matches-second-round', $tournament->id) }}"
                                           class="badge badge-pill tab-matches">
                                            2 round
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('tournament-matches-third-round', $tournament->id) }}"
                                           class="badge badge-pill tab-matches">
                                            <i class="fa fa-star" style="color: gold"></i> Final round
                                        </a>
                                    </li>
                                @elseif($numberOfRounds === 4)
                                    <li>
                                        <a href="{{ route('tournament-matches-second-round', $tournament->id) }}"
                                           class="badge badge-pill tab-matches">
                                            2 round
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('tournament-matches-third-round', $tournament->id) }}"
                                           class="badge badge-pill tab-matches">
                                            3 round
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('tournament-matches-fourth-round', $tournament->id) }}"
                                           class="badge badge-pill tab-matches">
                                            <i class="fa fa-star" style="color: gold"></i> Final round
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                        <div id="content-matches" class="text-center" style="margin-top: 15px">
                        </div>
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
                    @else
                        <div class="tab-pane active" id="tab-main-3">
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
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>