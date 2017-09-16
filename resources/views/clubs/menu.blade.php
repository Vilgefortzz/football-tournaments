@extends('layouts.app')

@section('content')

    <div class="container navbar-margin">
        <div class="row justify-content-center">
            <div class="wrap">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="tile">
                            <img class="cover-image" src='{{ asset('images/clubs/menu/football-grass.jpg') }}'>
                            <div class="text text-center">
                                <h1>Your club</h1>
                                <h1><i class="fa fa-users fa-2x"></i></h1>
                                <h2 class="animate-text">Go to your club</h2>
                                <p class="animate-text">See club details, footballers, tournaments,
                                    matches, showcase with trophies. </p>
                            </div>
                        </div>

                        <div class="tile">
                            <img class="cover-image" src='{{ asset('images/clubs/menu/football-grass.jpg') }}'>
                            <div class="text text-center">
                                <h1>Clubs</h1>
                                <h1><i class="fa fa-search fa-2x"></i></h1>
                                <h2 class="animate-text">Search or find your club</h2>
                                <p class="animate-text">Search, see clubs, see their stats, trophies, ratings.
                                    Try to join the club and become part of it. </p>
                            </div>
                        </div>

                        @if(Auth::user()->isFootballer())
                            <div class="tile">
                                <img class="cover-image" src='{{ asset('images/clubs/menu/football-grass.jpg') }}'>
                                <div class="text text-center">
                                    <h1>Start a new club</h1>
                                    <h1><i class="fa fa-hand-o-right fa-2x"></i></h1>
                                    <h2 class="animate-text">Set up your own club</h2>
                                    <p class="animate-text">Start a new club, become a president of the club, manage club,
                                        take part in tournaments, sign contracts with footballers. </p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection