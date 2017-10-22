@extends('layouts.app')

@section('content')

    <div id="loading"></div>
    <div id="contract-sign-loading"></div>
    <div id="content-search" class="row justify-content-center"></div>
    <div id="content" class="row justify-content-center">
        <div href="#" class="tile menu-card dynamic-content-card" style="margin-left: 20px; margin-right: 0">
            <img class="cover-image" src='{{ asset('images/clubs/menu/football-grass.jpg') }}'>
            <br>
            <div class="text text-center">
                <h1 style="color: #f8f4a0">Club details</h1>
                <h1><img src="{{ asset($club->emblem_dir. $club->emblem) }}"
                         width="150" height="150" class="img-fluid rounded-circle"></h1>
                <h2 class="animate-text">See club details</h2>
                <p class="animate-text">Get all information about the club</p>
            </div>
        </div>
        <div id="content-sub-menu" class="row justify-content-center" style="margin-left: 20px; margin-right: 0">
            @include('layouts.elements.clubs.menu.your-club-menu.sub-menu-1')
        </div>
        <div class="container">
            <div class="row justify-content-center pull-right">
                <a id="your-club-menu-next" href="{{ route('clubs-club-submenu-2', $club->id) }}" class="your-club-menu-nav">
                    <i class="fa fa-arrow-circle-o-right fa-3x fa-fw"></i>
                </a>
                <a id="your-club-menu-previous" href="{{ route('clubs-club-submenu-1', $club->id) }}" class="your-club-menu-nav">
                    <i class="fa fa-arrow-circle-o-left fa-3x fa-fw"></i>
                </a>
            </div>
        </div>
    </div>

@endsection