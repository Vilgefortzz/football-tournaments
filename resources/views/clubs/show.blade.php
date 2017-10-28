@extends('layouts.app')

@section('content')

    <div id="loading"></div>
    <div id="contract-sign-loading"></div>
    <div id="content-search" class="row justify-content-center"></div>
    <div id="content" class="row justify-content-center">
        <div class="col-md-12">
            <div class="jumbotron jumbotron-main-page">
                <div class="row justify-content-center">
                    <div class="col">
                        <div class="tile chosen">
                            <img class="cover-image" src='{{ asset('images/clubs/menu/football-grass.jpg') }}'>
                            <h1 class="text-header pull-right">
                                <span class="badge badge-pill my-color">
                                    <i class="fa fa-star fa-fw" aria-hidden="true"></i>
                                    {{ $club->tournament_points }}
                                </span>
                            </h1>
                            <h1 class="text-display" style="margin-bottom: 0">
                                <span class="badge badge-pill my-color-3">
                                    <i class="fa fa-flag-o fa-fw" aria-hidden="true"></i>
                                    @if($club->haveCountryAndCity())
                                        {{ $club->country }} | {{ $club->city }}
                                    @elseif($club->haveCountry())
                                        {{ $club->country }}
                                    @elseif($club->haveCity())
                                        {{ $club->city }}
                                    @endif
                                </span>
                            </h1>
                            <br>
                            <h1 class="text-header text-center">
                                <img src="{{ asset($club->emblem_dir. $club->emblem) }}"
                                     width="150" height="150" class="img-fluid rounded-circle">
                            </h1>
                            <h1 class="text-header text-center" style="margin-bottom: 20px">
                                {{ $club->name }}
                            </h1>
                            <div class="text-clubs text-center">
                                <h6 class="animate-text">
                                    <i class="fa fa-star fa-fw" style="color: gold;"></i> Place on the leaderboard: {{ $club->placeOnTheLeaderboard() }}
                                </h6>
                                <h6 class="animate-text">
                                    <i class="fa fa-user fa-fw" style="color: cadetblue"></i> Founded by: {{ $club->founded_by }}
                                </h6>
                                <h6 class="animate-text">
                                    <i class="fa fa-address-card fa-fw"></i> Staff in club: {{ $club->number_of_footballers }}
                                </h6>
                                <h6 class="animate-text">
                                    <i class="fa fa-futbol-o"></i> All Goals: {{ $club->goals }}
                                </h6>
                                <h6 class="animate-text">
                                    <i class="fa fa-mail-forward"></i> All Assists: {{ $club->assists }}
                                </h6>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <ul class="nav nav-tabs">
                            <li>
                                <a href="#tab-main-1" class="badge badge-pill tab-remove-active active" data-toggle="tab">
                                    <i class="fa fa-users fa-fw" aria-hidden="true"></i>
                                    Staff
                                </a>
                            </li>
                            <li>
                                <a href="#tab-main-2" class="badge badge-pill tab-remove-active" data-toggle="tab">
                                    <i class="fa fa-bar-chart fa-fw" aria-hidden="true"></i>
                                    Stats
                                </a>
                            </li>
                            <li>
                                <a href="#tab-main-3" class="badge badge-pill tab-add-active" data-toggle="tab">
                                    <i class="fa fa-trophy fa-fw" aria-hidden="true"></i>
                                    Trophies
                                </a>
                            </li>
                            @if(Auth::user()->isClubPresident() && $club->isYourClub())
                                <li>
                                    <a href="#tab-main-4" class="badge badge-pill tab-remove-active" data-toggle="tab">
                                        <i class="fa fa-cog fa-fw" aria-hidden="true"></i> Settings
                                    </a>
                                </li>
                            @endif
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab-main-1">
                                <table id="footballers-table" class="table table-hover table-responsive" cellspacing="0" width="100%">
                                    <thead class="my-color-2">
                                    <tr>
                                        <th><i class="fa fa-users fa-fw"></i>Name</th>
                                        <th><i class="fa fa-shield fa-fw"></i>Avatar</th>
                                        <th><i class="fa fa-male fa-fw"></i>Main football position</th>
                                        <th><i class="fa fa-soccer-ball-o fa-fw"></i>Goals</th>
                                        <th><i class="fa fa-mail-forward fa-fw"></i>Assists</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="font-bold">
                                            <i class="fa fa-star fa-fw" style="color: gold;"></i>{{ $clubPresident->username }}
                                        </td>
                                        <td>
                                            <img src="{{ asset($clubPresident->avatar_dir. $clubPresident->avatar) }}"
                                                 width="25" height="25">
                                        </td>
                                        <td class="font-bold">{{ $clubPresident->main_football_position }}</td>
                                        <td class="font-bold">{{ $clubPresident->goals }}</td>
                                        <td class="font-bold">{{ $clubPresident->assists }}</td>
                                    </tr>
                                    @foreach($footballers as $footballer)
                                        <tr>
                                            <td class="font-bold">{{ $footballer->username }}</td>
                                            <td>
                                                <img src="{{ asset($footballer->avatar_dir. $footballer->avatar) }}"
                                                     width="25" height="25">
                                            </td>
                                            <td class="font-bold">{{ $footballer->main_football_position }}</td>
                                            <td class="font-bold">{{ $footballer->goals }}</td>
                                            <td class="font-bold">{{ $footballer->assists }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane" id="tab-main-2">
                                <h1 class="font-bold font-italic"><i class="fa fa-trophy fa-fw"></i>Tournaments:</h1>
                                <h4 class="font-italic">
                                    Tournament points: {{ $club->tournament_points }}</h4>
                                <h4 class="font-italic">
                                    Completed tournaments: {{ $club->completed_tournaments }}</h4>
                                <h4 class="font-italic">
                                    Won tournaments: {{ $club->won_tournaments }}</h4>
                                <h4 class="font-italic">
                                    Tournaments win rate: {{ $club->tournaments_win_rate }}</h4>

                                <h1 class="font-bold font-italic"><i class="fa fa-soccer-ball-o fa-fw"></i>Matches:</h1>
                                <h4 class="font-italic">
                                    Played matches: {{ $club->played_matches }}</h4>
                                <h4 class="font-italic">
                                    Won matches: {{ $club->won_matches }}</h4>
                                <h4 class="font-italic">
                                    Matches win rate: {{ $club->matches_win_rate }}</h4>
                            </div>
                            <div class="tab-pane" id="tab-main-3">
                                <h4 class="font-italic">
                                    Won trophies: {{ $club->won_trophies }}</h4>
                                <h4 class="font-italic">
                                    Trophies win rate: {{ $club->trophies_win_rate }}</h4>
                                <br>
                                <ul class="nav nav-tabs">
                                    <li>
                                        <a id="tab-trophy-first-place" href="#tab-trophies-first-place"
                                           class="badge badge-pill tab-trophies active" data-toggle="tab">
                                            For first place
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tab-trophies-second-place" class="badge badge-pill tab-trophies" data-toggle="tab">
                                            For second place
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tab-trophies-third-place" class="badge badge-pill tab-trophies" data-toggle="tab">
                                            For third place
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content">
                                <div class="tab-pane tab-pane-trophies" id="tab-trophies-first-place">
                                    @foreach($trophiesForFirstPlace as $trophyForFirstPlace)
                                        <img src="{{ asset('images/trophies/first_place.png') }}"
                                             width="70" height="70">
                                        {{ $trophyForFirstPlace->name }}
                                        <br>
                                    @endforeach
                                </div>
                                <div class="tab-pane tab-pane-trophies" id="tab-trophies-second-place">
                                    @foreach($trophiesForSecondPlace as $trophyForSecondPlace)
                                        <img src="{{ asset('images/trophies/second_place.png') }}"
                                             width="70" height="70">
                                        {{ $trophyForSecondPlace->name }}
                                        <br>
                                    @endforeach
                                </div>
                                <div class="tab-pane tab-pane-trophies" id="tab-trophies-third-place">
                                    @foreach($trophiesForThirdPlace as $trophyForThirdPlace)
                                        <img src="{{ asset('images/trophies/third_place.png') }}"
                                             width="70" height="70">
                                        {{ $trophyForThirdPlace->name }}
                                        <br>
                                    @endforeach
                                </div>
                            </div>
                            <div class="tab-pane" id="tab-main-4">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection