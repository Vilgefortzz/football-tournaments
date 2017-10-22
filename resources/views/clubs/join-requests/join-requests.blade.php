@extends('layouts.app')

@section('content')

    <div id="loading"></div>
    <div id="contract-sign-loading"></div>
    <div id="content-search" class="row justify-content-center"></div>
    <div id="content" class="row justify-content-center">
        @if($requestsToJoinTheClub->isEmpty())
            @include('layouts.elements.clubs.join-requests.join-request-info')
        @else
            @foreach($requestsToJoinTheClub as $requestToJoinTheClub)
                <div id="request-to-join-the-club-{{$requestToJoinTheClub->id}}"
                     class="tile tile-requests-to-join-the-club request-to-join-the-club-card">
                    <img class="cover-image" src='{{ asset('images/clubs/menu/football-grass.jpg') }}'>
                    <h1 class="text-header pull-right">
                <span class="badge badge-pill my-color">
                    <i class="fa fa-male" aria-hidden="true"></i>
                    @if($requestToJoinTheClub->user->haveMainFootballPosition())
                        {{ $requestToJoinTheClub->user->main_football_position }}
                    @else
                        ---
                    @endif
                </span>
                    </h1>
                    <h1 class="text-display" style="margin-bottom: 0">
                <span class="badge badge-pill my-color-3">
                    <i class="fa fa-flag-o fa-fw" aria-hidden="true"></i>
                    @if($requestToJoinTheClub->user->haveCountryAndCity())
                        {{ $requestToJoinTheClub->user->country }} | {{ $requestToJoinTheClub->user->city }}
                    @elseif($requestToJoinTheClub->user->haveCountry())
                        {{ $requestToJoinTheClub->user->country }}
                    @elseif($requestToJoinTheClub->user->haveCity())
                        {{ $requestToJoinTheClub->user->city }}
                    @endif
                </span>
                    </h1>
                    <h1 class="text-display">
                <span class="badge badge-pill my-color">
                    <i class="fa fa-soccer-ball-o fa-fw" aria-hidden="true"></i>
                    {{ $requestToJoinTheClub->user->goals }} |
                    <i class="fa fa-mail-forward fa-fw" aria-hidden="true"></i>
                    {{ $requestToJoinTheClub->user->assists }}
                </span>
                    </h1>
                    <h1 class="text-display" style="margin-bottom: 0">
                <span class="badge badge-pill my-color-3">
                    <i class="fa fa-male fa-fw" aria-hidden="true"></i>
                    Preferred positions:
                </span>
                    </h1>
                    <h1 class="text-display">
            <span class="badge badge-pill my-color">
                @if($requestToJoinTheClub->user->haveFootballPositions())
                    @php ($footballPositions = array())
                    @foreach($requestToJoinTheClub->user->footballPositions as $footballPosition)
                        @php($footballPositions[] = $footballPosition->name)
                    @endforeach
                    {{ implode(' | ', $footballPositions) }}
                @else
                    Not defined
                @endif
            </span>
                    </h1>
                    <h1 class="text-header text-center">
                        <img src="{{ asset($requestToJoinTheClub->user->avatar_dir. $requestToJoinTheClub->user->avatar) }}"
                             width="120" height="120" class="img-fluid rounded-circle">
                    </h1>
                    <h1 class="text-header text-center">
                        {{ $requestToJoinTheClub->user->username }}
                    </h1>
                    <h1 class="text-header text-center animate-text">
                        <a href="#" class="btn btn-circle my-color-3 propose-contract-request-to-join-the-club"
                           data-request-to-join-the-club-id="{{$requestToJoinTheClub->id}}" role="button">
                            <i class="fa fa-file-text"></i>
                        </a>
                        <a href="{{ route('request-to-join-the-club-destroy', $requestToJoinTheClub->id) }}"
                           class="btn btn-circle my-color delete-request-to-join-the-club" role="button">
                            <i class="fa fa-remove"></i></a>
                    </h1>
                    <div id="propose-contract-request-to-join-the-club-{{$requestToJoinTheClub->id}}"
                         class="text-join-requests propose-contract-section text-center animate-text">

                        Contract duration:
                        <div class="styled-select my-color rounded">
                            <select id="duration-request-to-join-the-club-{{$requestToJoinTheClub->id}}">
                                <option value="1" selected="selected">1 week</option>
                                <option value="2">2 weeks</option>
                                <option value="3">1 month</option>
                                <option value="4">2 months</option>
                            </select>
                        </div>

                        <input type="text" id="username-request-to-join-the-club-{{$requestToJoinTheClub->id}}">
                        <label class="font-italic"
                               for="username-request-to-join-the-club-{{$requestToJoinTheClub->id}}">Make your signature</label>
                        <div class="bar"></div>

                        <a href="{{ route('contract-store', $requestToJoinTheClub->user->id) }}"
                           class="btn btn-sm my-color-3 create-contract-request-to-join-the-club"
                           data-request-to-join-the-club-id="{{$requestToJoinTheClub->id}}">
                            <i class="fa fa-handshake-o fa-lg fa-fw"></i>  Propose the contract
                        </a>
                    </div>
                </div>
            @endforeach
            <div class="container pagination-links">
                <div class="row justify-content-center">
                    {{ $requestsToJoinTheClub->links('layouts.pagination.clubs.requests-to-join.default') }}
                </div>
            </div>
        @endif
    </div>

@endsection
