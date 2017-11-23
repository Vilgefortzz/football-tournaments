@extends('layouts.app')

@section('content')

    <div id="loading"></div>
    <div id="contract-sign-loading"></div>
    <div id="content-search" class="row justify-content-center"></div>
    <div id="content" class="row justify-content-center">
        <div id="organizer-create-tournament" href="{{ route('tournament-create') }}" class="tile menu-card">
            <img class="cover-image" src='{{ asset('images/clubs/menu/football-grass.jpg') }}'>
            <br>
            <div class="text text-center">
                <h1>Create tournament</h1>
                <h1>
                    <i class="fa fa-hand-o-right fa-2x"></i>
                    <i class="fa fa-trophy fa-2x" style="color: gold"></i>
                </h1>
                <h2 class="animate-text">Create new tournament</h2>
                <p class="animate-text">Create tournament, set rules - max number of teams, game system and prizes. </p>
            </div>
        </div>
        <div id="organizer-ongoing-tournaments" href="{{ route('user-tournaments-ongoing', Auth::user()->id) }}"
             class="tile menu-card">
            <img class="cover-image" src='{{ asset('images/clubs/menu/football-grass.jpg') }}'>
            <h1 class="text-header text-center pull-right">
                <span class="badge badge-pill my-color"
                      data-number-items="{{ Auth::user()->numberOfOngoingTournaments() }}">
                    <i class="fa fa-trophy fa-fw" aria-hidden="true"></i>
                    {{ Auth::user()->numberOfOngoingTournaments() }}
                </span>
            </h1>
            <br>
            <div class="text text-center">
                <h1>Ongoing tournaments</h1>
                <h1>
                    <i class="fa fa-trophy fa-lg" style="color: gold;"></i>
                    <img src="{{ asset(Auth::user()->avatar_dir. Auth::user()->avatar) }}"
                         width="100" height="100" class="img-fluid rounded-circle">
                    <i class="fa fa-trophy fa-lg" style="color: gold;"></i>
                </h1>
                <h2 class="animate-text">See all your ongoing tournaments</h2>
                <p class="animate-text">See details, enter results, monitor progress of the tournaments. </p>
            </div>
        </div>
        <div id="organizer-closed-tournaments" href="{{ route('user-tournaments-closed', Auth::user()->id) }}"
             class="tile menu-card">
            <img class="cover-image" src='{{ asset('images/clubs/menu/football-grass.jpg') }}'>
            <h1 class="text-header text-center pull-right">
                <span class="badge badge-pill my-color"
                      data-number-items="{{ Auth::user()->numberOfClosedTournaments() }}">
                    <i class="fa fa-trophy fa-fw" aria-hidden="true"></i>
                    {{ Auth::user()->numberOfClosedTournaments() }}
                </span>
            </h1>
            <br>
            <div class="text text-center">
                <h1>Finished tournaments</h1>
                <h1>
                    <i class="fa fa-check fa-2x"></i>
                    <i class="fa fa-trophy fa-2x" style="color: gold"></i>
                </h1>
                <h2 class="animate-text">See all your finished tournaments</h2>
                <p class="animate-text">See details, monitor progress of the finished tournaments. </p>
            </div>
        </div>
    </div>

@endsection
