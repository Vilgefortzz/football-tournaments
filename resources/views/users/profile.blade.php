@extends('layouts.app')

@section('content')

    <div href="{{ route('user-contracts-binding', Auth::user()->id) }}" class="contract-binding" hidden></div>
    <div href="{{ route('user-contracts-created', Auth::user()->id) }}" class="contracts-created" hidden></div>
    @if(Auth::user()->isClubPresident())
        <div href="{{ route('club-join-requests', Auth::user()->club->id) }}" class="requests-to-join-the-club" hidden></div>
        <div href="{{ route('footballers-list-search') }}" class="footballers-list" hidden></div>
    @endif

    <div id="loading"></div>
    <div id="contract-sign-loading"></div>
    <div id="content-search" class="row justify-content-center"></div>
    <div id="content" class="row justify-content-center">
        <div class="col-md-11">
            <div class="jumbotron jumbotron-main-page">
                <div class="row justify-content-center">
                    <div class="col">
                        <div class="tile tile-users chosen">
                            <img class="cover-image" src='{{ asset('images/clubs/menu/football-grass.jpg') }}'>
                            <h1 class="info-header">
                                <a id="delete-account" data-toggle="modal" data-target="#delete-account-modal"
                                   class="btn btn-circle btn-danger" role="button"><i class="fa fa-trash"></i></a>
                            </h1>
                            <div class="text-header text-center">
                                <h1>Your profile</h1>
                                <h1><img src="{{ asset($user->avatar_dir. $user->avatar) }}"
                                         width="100" height="100" class="img-fluid rounded-circle"></h1>
                                <h1 class="text-display font-italic">Since from: </h1>
                                <h6>{{ $user->created_at }}</h6>
                                <hr>
                                <h1 class="text-display font-italic">Current club: </h1>
                                @if($user->haveClub())
                                    <h6>
                                        <img src="{{ asset($user->club->emblem_dir. $user->club->emblem) }}"
                                             width="45" height="45" class="img-fluid rounded-circle">
                                    </h6>
                                    <h6>{{ $user->club->name }}</h6>
                                @else
                                    <h6>You don't belong to any club</h6>
                                @endif
                                <hr>
                                <h1 id="preferred-football-positions" class="text-display font-italic"
                                    data-number-football-positions="{{ $user->numberOfFootballPositions() }}">
                                    Preferred football positions:
                                </h1>
                                <h1 class="text-display font-italic">
                                    <span id="football-positions-added"></span>
                                    @foreach($userFootballPositions as $userFootballPosition)
                                        <a href="{{ route('user-football-position-delete',
                                         [Auth::user()->id, $userFootballPosition->id]) }}"
                                           data-football-position-id="{{$userFootballPosition->id}}"
                                           class="badge badge-pill my-color delete-football-position" role="button">
                                            <span>{{ $userFootballPosition->name }}</span>
                                            <i class="fa fa-remove"></i>
                                        </a>
                                    @endforeach
                                    @if(!$user->haveThreeFootballPositions())
                                        <a href="{{ route('user-football-position-add', Auth::user()->id) }}"
                                           class="btn btn-circle-position my-color-3 add-football-position-button" role="button">
                                            <i class="fa fa-plus"></i>
                                        </a>
                                        <select id="football-positions" class="search-select" href="{{ route('footballers-search') }}" name="#">
                                            <option value="0" selected="selected">---</option>
                                            @foreach($footballPositions as $footballPosition)
                                                <option value="{{$footballPosition->id}}">{{$footballPosition->name}}</option>
                                            @endforeach
                                        </select>
                                    @else
                                        <a href="{{ route('user-football-position-add', Auth::user()->id) }}"
                                           class="btn btn-circle-position my-color-3 add-football-position-button" role="button" style="display: none">
                                            <i class="fa fa-plus"></i>
                                        </a>
                                        <select id="football-positions" class="search-select" href="{{ route('footballers-search') }}" name="#">
                                            <option value="0" selected="selected">---</option>
                                            @foreach($footballPositions as $footballPosition)
                                                <option value="{{$footballPosition->id}}">{{$footballPosition->name}}</option>
                                            @endforeach
                                        </select>
                                    @endif
                                </h1>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <form id="profile-form" enctype="multipart/form-data" method="POST"
                              action="{{ route('user-update', $user->id) }}">

                            {{ csrf_field() }}
                            {{ method_field('PUT') }}

                            <div class="text-center">
                                <h4 class="font-italic my-color-2">Update profile image</h4>
                                <div class="form-group">
                                    <img src="{{ asset($user->avatar_dir. $user->avatar) }}"
                                         width="110" height="110" class="img-fluid rounded-circle">
                                    <input id="avatar" type="file" name="avatar">
                                </div>
                                <hr>
                                <h4 class="font-italic my-color-2">Change main football position</h4>
                                <div class="form-group">
                                    <div class="button-container">
                                        <div class="radio">
                                            @foreach($userFootballPositions as $userFootballPosition)
                                                <label id="football-main-position-{{$userFootballPosition->id}}" style="padding-left: 10px">
                                                    @if($userFootballPosition->id === $mainFootballPositionId)
                                                        <input type="radio" name="main_football_position" value="{{ $userFootballPosition->name }}" checked>
                                                    @else
                                                        <input type="radio" name="main_football_position" value="{{ $userFootballPosition->name }}">
                                                    @endif
                                                    <span class="cr"><i class="cr-icon fa fa-circle"></i></span>
                                                    {{ $userFootballPosition->name }}
                                                </label>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <h4 class="font-italic my-color-2">Change password</h4>

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <div class="input-container">
                                        <input type="password" id="password" name="password">
                                        <label for="password">Password</label>
                                        <div class="bar"></div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="input-container">
                                        <input type="password" id="password-confirm" name="password_confirmation">
                                        <label for="password-confirm">Confirm Password</label>
                                        <div class="bar"></div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button class="btn my-color" type="submit">Save changes</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.elements.delete-account-modal')

    </div>

@endsection