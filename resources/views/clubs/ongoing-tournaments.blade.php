@extends('layouts.app')

@section('content')

    <div id="loading"></div>
    <div id="contract-sign-loading"></div>
    <div id="content-search" class="row justify-content-center"></div>
    <div id="content" class="row justify-content-center">
        @if($tournaments->isEmpty())
            @include('layouts.elements.tournaments.tournament-info')
        @else
            @foreach($tournaments as $tournament)
                <div id="tournament-{{$tournament->id}}" class="tile tile-tournaments tournament-card"
                     href="{{ route('tournament-show', $tournament->id) }}"
                     data-tournament-tree-url="{{ route('tournaments-tree-view', $tournament->id) }}">
                    <img class="cover-image" src='{{ asset('images/clubs/menu/football-grass.jpg') }}'>
                    <h1 class="text-header pull-right">
                        <span class="badge badge-pill my-color pull-right">
                            <i class="fa fa-star fa-fw" aria-hidden="true"></i>
                            {{ $tournament->tournament_points }}
                        </span>
                    </h1>
                    <h1 class="text-display">
                        <span class="badge badge-pill my-color">
                            {{ $tournament->status }}
                        </span>
                    </h1>
                    <h1 class="text-display" style="margin-bottom: 0">
                        <span class="badge badge-pill my-color-3">
                            <i class="fa fa-flag-o fa-fw" aria-hidden="true"></i>
                            {{ $tournament->country }} | {{ $tournament->city }}
                        </span>
                    </h1>
                    <h1 class="text-display" style="margin-bottom: 0">
                        <span class="badge badge-pill my-color-4">
                            <i class="fa fa-gamepad fa-fw" style="color: silver"></i>
                            {{ $tournament->game_system }}
                        </span>
                    </h1>
                    <h1 class="text-display" style="margin-bottom: 0">
                        <span class="badge badge-pill my-color">
                            <i class="fa fa-soccer-ball-o fa-fw" style="color: gold"></i>
                            {{ $tournament->completedMatches() }}%
                        </span>
                    </h1>
                    <h1 class="text-display">
                        <span class="badge badge-pill my-color">
                            <i class="fa fa-users fa-fw" style="color: limegreen"></i>
                            {{ $tournament->in_game_clubs }} |
                            <i class="fa fa-users fa-fw" aria-hidden="true" style="color: black"></i>
                            {{ $tournament->eliminated_clubs }}
                        </span>
                    </h1>
                    <br>
                    <h1 class="text-header text-center">
                        <i class="fa fa-trophy fa-4x fa-fw" aria-hidden="true"></i>
                    </h1>
                    <h1 class="text-header text-center">
                        {{ $tournament->name }}
                    </h1>
                    <h1 class="text-display text-center">
                        <span class="badge badge-pill my-color-2">
                            <i class="fa fa-clock-o fa-fw" aria-hidden="true" style="color: darkred"></i>
                            Start: {{ \Carbon\Carbon::parse($tournament->start_date)->format('d/m/Y') }}
                        </span>
                    </h1>
                </div>
            @endforeach
            <div class="container pagination-links" style="margin-top: 15px">
                <div class="row justify-content-center">
                    {{ $tournaments->links('layouts.pagination.tournaments.searchable-cards') }}
                </div>
            </div>
        @endif
    </div>

@endsection
