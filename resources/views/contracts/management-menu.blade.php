@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="wrap">
            <div class="container">
                <div id="loading"></div>
                <div id="content" class="row justify-content-center">
                    @if(Auth::user()->isClubPresident())
                        <div href="#" class="tile menu-card">
                            <img class="cover-image" src='{{ asset('images/clubs/menu/football-grass.jpg') }}'>
                            <div class="text text-center">
                                <h1>Extend contracts</h1>
                                <h1><i class="fa fa-users fa-2x"></i></h1>
                                <h2 class="animate-text">Extend contracts with footballers</h2>
                                <p class="animate-text">See completed contracts which you want to extend, see all details </p>
                            </div>
                        </div>
                        <div href="#" id="footballers-list" class="tile menu-card">
                            <img class="cover-image" src='{{ asset('images/clubs/menu/football-grass.jpg') }}'>
                            <div class="text text-center">
                                <h1>Manage footballers</h1>
                                <h1><i class="fa fa-soccer-ball-o fa-2x"></i></h1>
                                <h2 class="animate-text">See list of footballers</h2>
                                <p class="animate-text">Manage footballers, see list, extend contracts, see all details </p>
                            </div>
                        </div>
                    @elseif(Auth::user()->isFootballer())
                        <div href="{{ route('user-contracts-binding', Auth::user()->id) }}" class="tile menu-card">
                            <img class="cover-image" src='{{ asset('images/clubs/menu/football-grass.jpg') }}'>
                            <div class="text text-center">
                                <h1>Binding contract</h1>
                                <h1><i class="fa fa-star fa-2x"></i></h1>
                                <h2 class="animate-text">Your signed contract</h2>
                                <p class="animate-text">See details of your binding contract </p>
                            </div>
                        </div>
                        <div href="{{ route('user-contracts-created', Auth::user()->id) }}" class="tile menu-card">
                            <img class="cover-image" src='{{ asset('images/clubs/menu/football-grass.jpg') }}'>
                            <div class="text text-center">
                                <h1>Waiting contracts</h1>
                                <h1><i class="fa fa-database fa-2x"></i></h1>
                                <h2 class="animate-text">Your waiting contracts</h2>
                                <p class="animate-text">See all your waiting contracts, sign it or reject </p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
