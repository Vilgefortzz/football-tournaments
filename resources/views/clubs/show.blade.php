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
                        <div class="tabbable-line">
                            <ul class="nav nav-tabs">
                                <li>
                                    <a href="#tab-1" class="badge badge-pill active" data-toggle="tab">
                                        <i class="fa fa-users fa-fw" aria-hidden="true"></i>
                                        Staff
                                    </a>
                                </li>
                                <li>
                                    <a href="#tab-2" class="badge badge-pill" data-toggle="tab">
                                        <i class="fa fa-bar-chart fa-fw" aria-hidden="true"></i>
                                        Stats
                                    </a>
                                </li>
                                <li>
                                    <a href="#tab-3" class="badge badge-pill" data-toggle="tab">
                                        <i class="fa fa-trophy fa-fw" aria-hidden="true"></i>
                                        Trophies
                                    </a>
                                </li>
                                <li>
                                    <a href="#tab-4" class="badge badge-pill" data-toggle="tab">
                                        <i class="fa fa-cog fa-fw" aria-hidden="true"></i> Settings
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab-1">
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
                                <div class="tab-pane" id="tab-2">
                                </div>
                                <div class="tab-pane" id="tab-3">
                                </div>
                                <div class="tab-pane" id="tab-4">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection